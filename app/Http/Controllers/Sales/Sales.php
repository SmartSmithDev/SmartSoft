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
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
use App\Models\Customer\Customer;
use App\Models\Company\Company;
>>>>>>> 143ced183f1c01a32a51b2061f77843978a41f65
use App\Models\Company\CompanyBranch;
>>>>>>> 584330e6ac067f87a67e7f3544037033f28f5bf4
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use PDF;
use Illuminate\Http\Request; //for Request class
use Exception;//for exception handling

class Sales extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function index()     {
        
        $hsn = Hsn::all()->pluck('hsn' , 'hsn');
        $units = Unit::all()->pluck ('unit' , 'id');
        $vendors = Vendor::all()->pluck ('name' , 'id');
        $gst = Gst::all()->pluck ('description' , 'id');
        $states = State::all()->pluck ('name' , 'id');
        $items=Item::pluck('name');
        $items=$items->toArray();

         $vendor_type= Sales::getEnumValues('vendors','vendor_type');
        $business_type= Sales::getEnumValues('vendors','business_type');
        $cess=Cess::all()->pluck ('description' , 'id');
        //dd($items);
        return view('sales.sales' , compact('gst' , 'vendors' , 'hsn' , 'units' , 'states','items','vendor_type','business_type','cess'));
=======
    public function index()
    {
        //
<<<<<<< HEAD
        
>>>>>>> 584330e6ac067f87a67e7f3544037033f28f5bf4
=======
        $sales=Sale::all(); 
        foreach($sales as $sale){
            $sale->customer=Customer::find($sale->customer_id)->name;
            $sale->company=Company::find($sale->company_id)->name;
        }
        return view('sales.sales.index',compact('sales'));
>>>>>>> 143ced183f1c01a32a51b2061f77843978a41f65

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
<<<<<<< HEAD

=======
        $hsn = Hsn::all()->pluck('hsn' , 'hsn');
        $units = Unit::all()->pluck ('unit' , 'id');
        $vendors = Vendor::all()->pluck ('name' , 'id');
        $gst = Gst::all()->pluck ('description' , 'id');
        $states = State::all()->pluck ('name' , 'id');
        $items=Item::pluck('name');
        $items=$items->toArray();
        $bank_branch=CompanyBranch::all()->pluck('branch_name','id');
        $vendor_type= Sales::getEnumValues('vendors','vendor_type');
        $business_type= Sales::getEnumValues('vendors','business_type');
        $cess=Cess::all()->pluck ('description' , 'id');
        //dd($items);
        return view('sales.sales.create' , compact('gst' , 'vendors' , 'hsn' , 'units' , 'states','items','bank_branch','vendor_type','business_type','cess'));
>>>>>>> 584330e6ac067f87a67e7f3544037033f28f5bf4
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function store(Request $request) {  
        try {
              $sale_table=Sale::create(json_decode($request->input('common-object'),true));
         
    
              $sale_id=$sale_table->id;
                $items_table=json_decode($request->input('table-object'),true);
                foreach($items_table as $item_row) {
                    //dd($item_row);
                    if(!empty($item_row)) {
                        SalesItem::insert(['sales_id'=>$sale_id,'item_id'=>$item_row['id'],'hsn'=>$item_row['hsn'],'item_type'=>$item_row['type'],'unit_price'=>$item_row['unit_price'],'quantity'=>$item_row['quantity'],'unit_id'=>$item_row['unit_id'],'discount'=>$item_row['discount'],'taxable_value'=>$item_row['taxable_value'],'gst_id'=>$item_row['gst'],'cgst'=>$item_row['cgst'],'sgst'=>$item_row['sgst'],'igst'=>$item_row['igst'],'ugst'=>$item_row['ugst'],'cess_id'=>$item_row['cess'],'tax_amount'=>$item_row['tax_amount'],'total_product_amount'=>$item_row['total_amount'],'cess_amount'=>$item_row['cess_amount']]);
                    }
                }
            }
            catch (Exception $e) {
                    $errorCode = $e->errorInfo[1];          
                    if($errorCode == 1062) {
                        return redirect('sales');
                    }
            }


    
                //$sale_table=json_decode($request->input('common-object'),true);
                // //dd($sale_table);
                // $items_table=json_decode($request->input('table-object'),true);
                $vendor=$sale_table->vendor()->pluck('address','gstin')->toArray();
                $state=$sale_table->supplyState()->pluck('state_tax_code')->toArray()[0];
                $sale_table["gstin"]=array_keys($vendor)[0];
                $sale_table["address"]=array_values($vendor)[0];
                $sale_table["state"]=$state;
                //dd($items_table);
                $pdf = PDF::loadView("sales_invoice",["sale"=>$sale_table,"items"=>$items_table]);

                return $pdf->download('items.pdf');

                //return view("sales_invoice",["sale"=>$sale_table,"items"=>$items_table]);
=======
    public function store(Request $request) {
        try {
            $sale_table=Sale::create(json_decode($request->input('common-object'),true));
            $sale_id=$sale_table->id;
            $items_table=json_decode($request->input('table-object'),true);
            
            foreach($items_table as $item_row){
                 //dd($item_row);
                if(!empty($item_row)) {
                    SalesItem::insert(['sales_id'=>$sale_id,'item_id'=>$item_row['id'],'hsn'=>$item_row['hsn'],'item_type'=>$item_row['type'],'unit_price'=>$item_row['unit_price'],'quantity'=>$item_row['quantity'],'unit_id'=>$item_row['unit_id'],'discount'=>$item_row['discount'],'taxable_value'=>$item_row['taxable_value'],'gst_id'=>$item_row['gst'],'cgst'=>$item_row['cgst'],'sgst'=>$item_row['sgst'],'igst'=>$item_row['igst'],'ugst'=>$item_row['ugst'],'cess_id'=>$item_row['cess'],'tax_amount'=>$item_row['tax_amount'],'total_product_amount'=>$item_row['total_amount'],'cess_amount'=>$item_row['cess_amount']]);
                }
            }
        }
        catch (Exception $e) {
=======

    public function store(Request $request)
    {  
    try{
          
        $sale_table=Sale::create(json_decode($request->input('common-object'),true));
        $bank_branch_id=$request->input('bank_branch'); 
        $sale_id=$sale_table->id;
        $company=Company::find($bank_branch_id);
        $company_id=$company->id;
        $account_id=$company->companyBankAccount()->first()->id;
     $items_table=json_decode($request->input('table-object'),true);
        foreach($items_table as $item_row){
             //dd($item_row);
             if(!empty($item_row)){
             SalesItem::insert(['sales_id'=>$sale_id,'item_id'=>$item_row['id'],'hsn'=>$item_row['hsn'],'item_type'=>$item_row['type'],'unit_price'=>$item_row['unit_price'],'quantity'=>$item_row['quantity'],'unit_id'=>$item_row['unit_id'],'discount'=>$item_row['discount'],'taxable_value'=>$item_row['taxable_value'],'gst_id'=>$item_row['gst'],'cgst'=>$item_row['cgst'],'sgst'=>$item_row['sgst'],'igst'=>$item_row['igst'],'ugst'=>$item_row['ugst'],'cess_id'=>$item_row['cess'],'tax_amount'=>$item_row['tax_amount'],'total_product_amount'=>$item_row['total_amount'],'cess_amount'=>$item_row['cess_amount'],"company_branch_id"=>$bank_branch_id,"company_id"=>$company_id,"company_account_id"=>$account_id]);
         }
     }

$vendor=$sale_table->vendor()->pluck('address','gstin')->toArray();
$state=$sale_table->supplyState()->pluck('state_tax_code')->toArray()[0];
$sale_table["gstin"]=array_keys($vendor)[0];
$sale_table["address"]=array_values($vendor)[0];
$sale_table["state"]=$state;
//dd($items_table);
$pdf = PDF::loadView("sales_invoice",["sale"=>$sale_table,"items"=>$items_table]);

return $pdf->download('items.pdf');
   }
     catch (Exception $e) {
>>>>>>> 143ced183f1c01a32a51b2061f77843978a41f65
            $errorCode = $e->errorInfo[1];          
           return "Some error occured";
        }
    }


    


<<<<<<< HEAD
        //return view("sales_invoice",["sale"=>$sale_table,"items"=>$items_table]);
>>>>>>> 584330e6ac067f87a67e7f3544037033f28f5bf4
=======
>>>>>>> 143ced183f1c01a32a51b2061f77843978a41f65

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

<<<<<<< HEAD
//autoFill() returns the item details using item name
    public function autoFill(Request $req) {
=======
    //autoFill() returns the item details using item name
    public function autoFill(Request $req)
    {
>>>>>>> 584330e6ac067f87a67e7f3544037033f28f5bf4
        $data=$req->item;  //item is the get data from url
        //var_dump($data);
        $item_details=Item::where('name','=',$data)->get()->toArray();
        $hsn_row=HSN::where('hsn','=',$item_details[0]['hsn'])->pluck('gst_id','cess_id')->toArray();//returns an associative array with key as cess_id and value as gst_id of each row
<<<<<<< HEAD
         $gst_id=array_values($hsn_row);
         $cess_id=array_keys($hsn_row);
         $item_details[0]['gst']=$gst_id[0];
         $item_details[0]['cess']=$cess_id[0];

        
        //dd(json_encode($item_details[0]));
       
=======
        $gst_id=array_values($hsn_row);
        $cess_id=array_keys($hsn_row);
        $item_details[0]['gst']=$gst_id[0];
        $item_details[0]['cess']=$cess_id[0];


        //dd(json_encode($item_details[0]));

>>>>>>> 584330e6ac067f87a67e7f3544037033f28f5bf4
        return json_encode($item_details[0]);
       
    }

<<<<<<< HEAD
    public function vendorInfo(Request $req) {
=======
    public function vendorInfo(Request $req){
>>>>>>> 584330e6ac067f87a67e7f3544037033f28f5bf4
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

<<<<<<< HEAD
//     public function domPdf(){
//         //$dompdf=new Dompdf();
//         //$dompdf->set_option('chroot', '/path/to/document/root');
       
//        $sale_table=[
//   "total_discount" => 20,
//   "cgst" => 0,
//   "ugst" => 0,
//   "sgst" => 0,
//   "igst" => 0,
//   "cess" => 146,
//   "ecommerce_vendor_id" => 0,
//   "vendor_id" => "1",
//   "invoice_date" => "2018-01-22",
//   "invoice_number" => "11111111",
//   "order_id" => "2222222222",
//   "supply_state_id" => "11",
//   "total_taxable_value" => "4873",
//   "total_tax_amount" => "146.19",
//   "total_amount" => "5019.19",
//   "notes" => "dom",
//   "round_off" => 5019,
//   "shipping_cost" => 0,
//   "order_date" => "2018-01-24",
//   "updated_at" => "2018-01-12 12:08:47",
//   "created_at" => "2018-01-12 12:08:47",
//   "id" => 58,
//   "gstin" => "52974ahgjaja",
//   "address" => "Building 6A, Shop No.5,Ashok Nagar,Bhiwandi,Mumbai, India|+91 8080568008",
//   "state" => "11-Sikkim"
// ];

// $items_table= [0 =>[
//     "id" => 1,
//     "sku" => "kaflalglja",
//     "name" => "jlejlsgllsjg",
//     "type" => "Goods",
//     "hsn" => "00000000",
//     "unit_id" => 59,
//     "details" => "ljsjglslgj",
//     "created_at" => "2018-01-09 15:34:02",
//     "updated_at" => "2018-01-09 15:34:02",
//     "deleted_at" => null,
//     "gst" => 1,
//     "cess" => 2,
//     "cgst" => 0,
//     "sgst" => 0,
//     "ugst" => 0,
//     "igst" => 0,
//     "cess_amount" => 146.19,
//     "unit_price" => 21,
//     "discount" => 20,
//     "quantity" => "233",
//     "tax_amount" => "146.19",
//     "total_amount" => "5019.19",
//     "taxable_value" => 4873,
//   ],
//    1=>[
//     "id" => 1,
//     "sku" => "kaflalglja",
//     "name" => "jlejlsgllsjg",
//     "type" => "Goods",
//     "hsn" => "00000000",
//     "unit_id" => 59,
//     "details" => "ljsjglslgj",
//     "created_at" => "2018-01-09 15:34:02",
//     "updated_at" => "2018-01-09 15:34:02",
//     "deleted_at" => null,
//     "gst" => 1,
//     "cess" => 2,
//     "cgst" => 0,
//     "sgst" => 0,
//     "ugst" => 0,
//     "igst" => 0,
//     "cess_amount" => 146.19,
//     "unit_price" => 21,
//     "discount" => 20,
//     "quantity" => "233",
//     "tax_amount" => "146.19",
//     "total_amount" => "5019.19",
//     "taxable_value" => 4873,
//   ],
//   2=>[
//     "id" => 1,
//     "sku" => "kaflalglja",
//     "name" => "jlejlsgllsjg",
//     "type" => "Goods",
//     "hsn" => "00000000",
//     "unit_id" => 59,
//     "details" => "ljsjglslgj",
//     "created_at" => "2018-01-09 15:34:02",
//     "updated_at" => "2018-01-09 15:34:02",
//     "deleted_at" => null,
//     "gst" => 1,
//     "cess" => 2,
//     "cgst" => 0,
//     "sgst" => 0,
//     "ugst" => 0,
//     "igst" => 0,
//     "cess_amount" => 146.19,
//     "unit_price" => 21,
//     "discount" => 20,
//     "quantity" => "233",
//     "tax_amount" => "146.19",
//     "total_amount" => "5019.19",
//     "taxable_value" => 4873,
//   ],
//   3 =>[
//     "id" => 1,
//     "sku" => "kaflalglja",
//     "name" => "jlejlsgllsjg",
//     "type" => "Goods",
//     "hsn" => "00000000",
//     "unit_id" => 59,
//     "details" => "ljsjglslgj",
//     "created_at" => "2018-01-09 15:34:02",
//     "updated_at" => "2018-01-09 15:34:02",
//     "deleted_at" => null,
//     "gst" => 1,
//     "cess" => 2,
//     "cgst" => 0,
//     "sgst" => 0,
//     "ugst" => 0,
//     "igst" => 0,
//     "cess_amount" => 146.19,
//     "unit_price" => 21,
//     "discount" => 20,
//     "quantity" => "233",
//     "tax_amount" => "146.19",
//     "total_amount" => "5019.19",
//     "taxable_value" => 4873,
//   ],
//   4 =>[
//     "id" => 1,
//     "sku" => "kaflalglja",
//     "name" => "jlejlsgllsjg",
//     "type" => "Goods",
//     "hsn" => "00000000",
//     "unit_id" => 59,
//     "details" => "ljsjglslgj",
//     "created_at" => "2018-01-09 15:34:02",
//     "updated_at" => "2018-01-09 15:34:02",
//     "deleted_at" => null,
//     "gst" => 1,
//     "cess" => 2,
//     "cgst" => 0,
//     "sgst" => 0,
//     "ugst" => 0,
//     "igst" => 0,
//     "cess_amount" => 146.19,
//     "unit_price" => 21,
//     "discount" => 20,
//     "quantity" => "233",
//     "tax_amount" => "146.19",
//     "total_amount" => "5019.19",
//     "taxable_value" => 4873,
//   ],
//   5 =>[
//     "id" => 1,
//     "sku" => "kaflalglja",
//     "name" => "jlejlsgllsjg",
//     "type" => "Goods",
//     "hsn" => "00000000",
//     "unit_id" => 59,
//     "details" => "ljsjglslgj",
//     "created_at" => "2018-01-09 15:34:02",
//     "updated_at" => "2018-01-09 15:34:02",
//     "deleted_at" => null,
//     "gst" => 1,
//     "cess" => 2,
//     "cgst" => 0,
//     "sgst" => 0,
//     "ugst" => 0,
//     "igst" => 0,
//     "cess_amount" => 146.19,
//     "unit_price" => 21,
//     "discount" => 20,
//     "quantity" => "233",
//     "tax_amount" => "146.19",
//     "total_amount" => "5019.19",
//     "taxable_value" => 4873,
//   ],
//   6 =>[
//     "id" => 1,
//     "sku" => "kaflalglja",
//     "name" => "jlejlsgllsjg",
//     "type" => "Goods",
//     "hsn" => "00000000",
//     "unit_id" => 59,
//     "details" => "ljsjglslgj",
//     "created_at" => "2018-01-09 15:34:02",
//     "updated_at" => "2018-01-09 15:34:02",
//     "deleted_at" => null,
//     "gst" => 1,
//     "cess" => 2,
//     "cgst" => 0,
//     "sgst" => 0,
//     "ugst" => 0,
//     "igst" => 0,
//     "cess_amount" => 146.19,
//     "unit_price" => 21,
//     "discount" => 20,
//     "quantity" => "233",
//     "tax_amount" => "146.19",
//     "total_amount" => "5019.19",
//     "taxable_value" => 4873,
//   ],
//   7 =>[
//     "id" => 1,
//     "sku" => "kaflalglja",
//     "name" => "jlejlsgllsjg",
//     "type" => "Goods",
//     "hsn" => "00000000",
//     "unit_id" => 59,
//     "details" => "ljsjglslgj",
//     "created_at" => "2018-01-09 15:34:02",
//     "updated_at" => "2018-01-09 15:34:02",
//     "deleted_at" => null,
//     "gst" => 1,
//     "cess" => 2,
//     "cgst" => 0,
//     "sgst" => 0,
//     "ugst" => 0,
//     "igst" => 0,
//     "cess_amount" => 146.19,
//     "unit_price" => 21,
//     "discount" => 20,
//     "quantity" => "233",
//     "tax_amount" => "146.19",
//     "total_amount" => "5019.19",
//     "taxable_value" => 4873,
//   ],
//   8 =>[
//     "id" => 1,
//     "sku" => "kaflalglja",
//     "name" => "jlejlsgllsjg",
//     "type" => "Goods",
//     "hsn" => "00000000",
//     "unit_id" => 59,
//     "details" => "ljsjglslgj",
//     "created_at" => "2018-01-09 15:34:02",
//     "updated_at" => "2018-01-09 15:34:02",
//     "deleted_at" => null,
//     "gst" => 1,
//     "cess" => 2,
//     "cgst" => 0,
//     "sgst" => 0,
//     "ugst" => 0,
//     "igst" => 0,
//     "cess_amount" => 146.19,
//     "unit_price" => 21,
//     "discount" => 20,
//     "quantity" => "233",
//     "tax_amount" => "146.19",
//     "total_amount" => "5019.19",
//     "taxable_value" => 4873,
//   ],
//   9 =>[
//     "id" => 1,
//     "sku" => "kaflalglja",
//     "name" => "jlejlsgllsjg",
//     "type" => "Goods",
//     "hsn" => "00000000",
//     "unit_id" => 59,
//     "details" => "ljsjglslgj",
//     "created_at" => "2018-01-09 15:34:02",
//     "updated_at" => "2018-01-09 15:34:02",
//     "deleted_at" => null,
//     "gst" => 1,
//     "cess" => 2,
//     "cgst" => 0,
//     "sgst" => 0,
//     "ugst" => 0,
//     "igst" => 0,
//     "cess_amount" => 146.19,
//     "unit_price" => 21,
//     "discount" => 20,
//     "quantity" => "233",
//     "tax_amount" => "146.19",
//     "total_amount" => "5019.19",
//     "taxable_value" => 4873,
//   ],
//   ];

//   $pdf = PDF::loadView("sales_invoice",["sale"=>$sale_table,"items"=>$items_table]);

// return $pdf->download('items.pdf');
//   //return view('sales_invoice',["sale"=>$sale_table,"items"=>$items_table]);          
//     }

=======
>>>>>>> 584330e6ac067f87a67e7f3544037033f28f5bf4
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
<<<<<<< HEAD
    }   

=======
    }
>>>>>>> 584330e6ac067f87a67e7f3544037033f28f5bf4
}
