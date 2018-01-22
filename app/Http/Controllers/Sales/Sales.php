<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Models\Tax\Hsn;
use App\Models\Setting\Unit;
use App\Models\Setting\State;
use App\Models\Vendor\Vendor;
use App\Models\Tax\Gst;
use App\Models\Tax\Cess;
use App\Models\Item\Item;
use App\Models\Sale\Sale;
use App\Models\Sale\SalesItem;
use App\Models\Customer\Customer;
use App\Models\Company\Company;
use App\Models\Company\CompanyBranch;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use PDF;
use Illuminate\Http\Request; //for Request class
use Exception;//for exception handling
use Illuminate\Support\Facades\Storage;


class Sales extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sales=Sale::all(); 
        foreach($sales as $sale){
            $sale->customer=Customer::find($sale->customer_id)->name;
            $sale->company=Company::find($sale->company_id)->name;
        }
        return view('sales.sales.index',compact('sales'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $hsn = Hsn::all()->pluck('hsn' , 'hsn');
        $units = Unit::all()->pluck ('unit' , 'id');
        $vendors = Vendor::all()->pluck ('name' , 'id');
        $customers=Customer::all()->pluck ('name' , 'id');
        $gst = Gst::all()->pluck ('description' , 'id');
        $states = State::all()->pluck ('name' , 'id');
        $items=Item::pluck('name');
        $items=$items->toArray();
        $bank_branch=CompanyBranch::all()->pluck('branch_name','id');
        $customer_type= Sales::getEnumValues('customers','customer_type');
        $business_type= Sales::getEnumValues('vendors','business_type');
        $cess=Cess::all()->pluck ('description' , 'id');
        //dd($items);
        return view('sales.sales.create' , compact('gst' , 'customers' , 'hsn' , 'units' , 'states','items','bank_branch','customer_type','business_type','cess'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {  
        
          $file=$request->file('attachment'); 
            
          $sale_table=json_decode($request->input('common-object'),true);
          $bank_branch_id=$request->input('bank_branch');
          $user_id=0; 
            
          $company=Company::find($bank_branch_id);
          $company_id=$company->id;
          $account_id=$company->companyBankAccount()->first()->id;
            
          $sale_table["company_branch_id"]=$bank_branch_id;
          $sale_table["company_id"]=$company_id;
          $sale_table["company_account_id"]=$account_id;
        
          $sale_table=Sale::create($sale_table);
          $sale_id=$sale_table->id;
            
          $items_table=json_decode($request->input('table-object'),true);
          $file_table=DB::table('sales_files')->insert(['user_id'=>$user_id,'sales_id'=>$sale_id,'path'=>$file->storeAs('invoices','sales_invoice'.$user_id.$sale_id)]);

          foreach($items_table as $item_row){
             //dd($item_row);
             if(!empty($item_row)){
                 SalesItem::insert(['sales_id'=>$sale_id,'item_id'=>$item_row['id'],'hsn'=>$item_row['hsn'],'item_type'=>$item_row['type'],'unit_price'=>$item_row['unit_price'],'quantity'=>$item_row['quantity'],'unit_id'=>$item_row['unit_id'],'discount'=>$item_row['discount'],'taxable_value'=>$item_row['taxable_value'],'gst_id'=>$item_row['gst'],'cgst'=>$item_row['cgst'],'sgst'=>$item_row['sgst'],'igst'=>$item_row['igst'],'ugst'=>$item_row['ugst'],'cess_id'=>$item_row['cess'],'tax_amount'=>$item_row['tax_amount'],'total_product_amount'=>$item_row['total_amount'],'cess_amount'=>$item_row['cess_amount']]);
             }
         }

         $vendor=$sale_table->customer()->pluck('address','gstin')->toArray();
         $state=$sale_table->supplyState()->pluck('state_tax_code')->toArray()[0];
         $sale_table["gstin"]=array_keys($vendor)[0];
         $sale_table["address"]=array_values($vendor)[0];
         $sale_table["state"]=$state;
//dd($items_table);
         $pdf = PDF::loadView("sales.invoice.invoice",["sale"=>$sale_table,"items"=>$items_table]);

         return $pdf->download('items.pdf');
     
    //  catch (Exception $e) {
    //     $errorCode = $e->errorInfo[1];          
    //     return "Some error occured";
    // }
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //autoFill() returns the item details using item name
    public function autoFill(Request $req)
    {
        $data=$req->item;  //item is the get data from url
        //var_dump($data);
        $item_details=Item::where('name','=',$data)->get()->toArray();
        $hsn_row=HSN::where('hsn','=',$item_details[0]['hsn'])->pluck('gst_id','cess_id')->toArray();//returns an associative array with key as cess_id and value as gst_id of each row
        $gst_id=array_values($hsn_row);
        $cess_id=array_keys($hsn_row);
        $item_details[0]['gst']=$gst_id[0];
        $item_details[0]['cess']=$cess_id[0];


        //dd(json_encode($item_details[0]));

        return json_encode($item_details[0]);
       
    }

    public function vendorInfo(Request $req){
        $vendor_id=$req->input('vendor_id');
        $vendor_state=Vendor::where('id',$vendor_id)->pluck('state_id')->toArray();
        return json_encode($vendor_state);
    }

    //to retrieve enum values from  database as an array
    public static function getEnumValues($table, $column) {
        $type = DB::select(DB::raw("SHOW COLUMNS FROM $table WHERE Field = '{$column}'"))[0]->Type ;
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $enum = array();
        foreach( explode(',', $matches[1]) as $value ) {
            $v = trim( $value, "'" );
            $enum = array_add($enum, $v, $v);
        }
        return $enum;
    }

    public function checkExist(Request $req) {
        $id=$req->input('id');
        $value=$req->input('val');
        if($id=="invoice_number") {
            $count=Sale::where("invoice_number",'=',$value)->count();
            return $count;//return count of rows for matching invoice number
        }
        else {
            $count=Sale::where("order_id",'=',$value)->count();
            return $count;
        }
    }
}
