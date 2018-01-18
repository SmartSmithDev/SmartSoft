<?php

namespace App\Http\Controllers\Items;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tax\Hsn;
use App\Models\Setting\Unit;
use App\Models\Item\Item;
use Illuminate\Support\Facades\DB;
use App\libraries\GstCalculator;
use App\Models\Tax\Gst;
use Illuminate\Support\Collection;

class Items extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = DB::table('items')->get();
        return view('items.items.index' , compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hsn = Hsn::all()->pluck('hsn' , 'hsn');
        $units = Unit::all()->pluck ('unit' , 'id');
        return view ('items.items.create' , compact('hsn' , 'units'));
        //return view ('Items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        Item::create($request->all());
        return redirect('items');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
        $hsn = Hsn::all()->pluck('hsn' , 'hsn');
        $units = Unit::all()->pluck ('unit' , 'id');

        return view('items.items.edit', compact('item' , 'hsn' , 'units'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Item $item , Request $request)
    {
        //
        $item->update($request->input());

        $message = trans('messages.success.updated', ['type' => trans_choice('general.items', 1)]);
        
        flash($message)->success();
        return redirect('items');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
        $item->delete();
        $message = trans('messages.success.deleted', ['type' => trans_choice('general.items', 1)]);

            flash($message)->success();
        return redirect('items');
    }


    public function itemCalculate() {

        $input_items = request('item');
        $supply_state_id = request('supply_state_id');
        $discountType = request('discountType');
        $rateType=request('rateType');
        //$discountType = 1;

        $json = new \stdClass;
 
        $totalCgst = 0;
        $totalSgst = 0;
        $totalIgst = 0;
        $totalUgst = 0;
        $totalCess = 0;
        $totalDiscount = 0;
        $totalTaxableValue = 0;
        $sub_total = 0;
        $tax_total = 0;

        $items = array();


        //Process each Item data
        if ($input_items) {
            foreach ($input_items as $key => $item) {
                $item_sub_total = ($item['price'] * $item['quantity']);
               $itemTotal=0;
               $itemTotalTax=0;
                //Get GST ID and Data from Database
                $GstID = $item['gst_id'];
                $CessId = $item['cess_id'];
                //$GstRates = Gst::find($GstID);

                if($discountType == 1)
                {
                    $discountRate = $item['discount'];
                    $itemDiscount = ($item_sub_total /100 ) * $discountRate;
                }
                else
                    $itemDiscount = $item['discount'];

                $itemTaxableValue = $item_sub_total - $itemDiscount ;


                $gstCalculator = new GstCalculator();
                $taxData = array();
                if($rateType==1){  //for amount with inclusive gst
                $taxData = $gstCalculator->getReverseTax($supply_state_id , 27 , $GstID , $CessId , $itemTaxableValue);
               $itemTotalTax = $taxData['Total Tax'];
               $totalTaxableValue += $taxData['Tax Exclusive'];
               $itemTaxableValue=$taxData['Tax Exclusive'];  
                }
                else{
                $taxData = $gstCalculator->getTax($supply_state_id , 27 , $GstID , $CessId , $itemTaxableValue);
              $itemTotalTax = $taxData['Total Tax'];
                 $itemTaxableValue = $item_sub_total - $itemDiscount;
                $totalTaxableValue += $itemTaxableValue ;
                
                  }
                //$itemTotalTax = ($itemTaxableValue / 100) * 500 ;
                //$itemTotalTax = ($itemTaxableValue / 100) * $GstRates['rate'];


                //print_r('fvsdfv');

                 $itemCgst = $taxData['CGST'] ;
                 $itemSgst = $taxData['SGST'] ;
                 $itemIgst = $taxData['IGST'] ;
                 $itemUgst = $taxData['UGST'] ;
                 $itemCess = $taxData['Cess'] ;
                $itemTotal = $itemTaxableValue + $itemTotalTax;
                  
                

                //Total Calculations
                 $totalCgst += $itemCgst ;
                 $totalSgst += $itemSgst ;
                 $totalIgst += $itemIgst ;
                 $totalUgst += $itemUgst ;
                 $totalCess += $itemCess ;
                $totalDiscount += $itemDiscount ;
                
                $tax_total += $itemTotalTax ;

                //Set ItemData Attributes
                $itemData['discount'] = round($itemDiscount , 2) ;
                $itemData['cgst'] = $itemCgst ;
                $itemData['sgst'] = $itemSgst ;
                $itemData['igst'] = $itemIgst ;
                $itemData['ugst'] = $itemUgst ;
                $itemData['cess'] = round($itemCess , 2) ; ;
                $itemData['subTotal'] = round($item_sub_total , 2) ;
                $itemData['taxableValue'] = round($itemTaxableValue , 2) ;
                $itemData['totalTax'] = round($itemTotalTax , 2) ;
                $itemData['total'] = round($itemTotal , 2) ;

                //$itemData['total'] = $GstID;

                //Pass all itemData to items array
                $items[$key] = $itemData;
            }
        }

        $json->items = $items; //Items Data

        $json->sub_total = round($totalTaxableValue , 2);

        $json->tax_total = round($tax_total , 2);

        $grand_total = $totalTaxableValue + $tax_total;

        $json->grand_total = round($grand_total , 2);
        //Return Data in JSON Format
        return response()->json($json);
    }


    public function hsn(Request $req){
    
         $hsn_code=$req->input('hsn_code');
         $data=HSN::where('hsn',$hsn_code)->get()->toArray();
         //$data=$data->only(['gst_id','cess_id','item_type']) 
        
        return json_encode($data);

    }

    public function ajaxStore(Request $req){
        $item=Item::create($req->all());
        $hsn_row=HSN::where('hsn','=',$item->hsn)->pluck('gst_id','cess_id')->toArray();
        $gst_id=array_values($hsn_row);
         $cess_id=array_keys($hsn_row);
        $item->gst=$gst_id[0];
        $item->cess=$cess_id[0];
        return json_encode($item);
    }
}
