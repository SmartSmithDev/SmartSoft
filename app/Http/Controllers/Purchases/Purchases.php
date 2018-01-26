<?php

namespace App\Http\Controllers\Purchases;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Purchase\Purchase;
use App\Models\Purchase\PurchaseItem;
use Illuminate\Support\Facades\DB;
use App\Models\Tax\Hsn;
use App\Models\Setting\Unit;
use App\Models\Setting\State;
use App\Models\Tax\Gst;
use App\Models\Tax\Cess;
use App\Models\Item\Item;
use App\Models\Company\Company;
use App\Models\Company\CompanyBranch;
use App\Models\Company\CompanyBankAccount;
use App\Models\Vendor\Vendor;
 use Carbon\Carbon;
 
class Purchases extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases=Purchase::all(); 
        foreach($purchases as $purchase){
            $purchase->customer=Vendor::find($purchase->vendor_id)->name;
            $purchase->company=Company::find($purchase->company_id)->name;
        }
        return view('purchase.purchases.index',compact('purchases'));
        //
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
        $gst = Gst::all()->pluck ('description' , 'id');
        $states = State::all()->pluck ('name' , 'id');
        $items=Item::pluck('name');
        $items=$items->toArray();
        $bank_branch=CompanyBranch::all()->pluck('branch_name','id');
        $customer_type= Purchases::getEnumValues('customers','customer_type');
        $business_type= Purchases::getEnumValues('customers','business_type');
        $cess=Cess::all()->pluck ('description' , 'id');
        $bank_accounts=CompanyBankAccount::all()->pluck('account_number','id');
        //dd($items);

        $new_invoice_id=Purchase::max('id')+1;
        return view('purchase.purchases.create' , compact('gst' , 'vendors' , 'hsn' , 'units' , 'states','items','bank_branch','customer_type','business_type','cess','new_invoice_id','bank_accounts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try {
          $file=$request->file('attachment'); 
            
          $purchase_table=json_decode($request->input('common-object'),true);
          $purchase_table['payment_status']="Pending";
          if($request->input('payment_status')){
            $purchase_table['payment_status']="Completed";
          }
          $bank_branch_id=$request->input('bank_branch');
          $user_id=0; 
            
          $company=CompanyBranch::find($bank_branch_id);
          $company_id=$company->company_id;
          $company_gstin=find($company->gstin_id)->gstin;
          $account_id=$request->input('bank_account');
            
          $purchase_table["company_branch_id"]=$bank_branch_id;
          $purchase_table["company_id"]=$company_id;
          $purchase_table["company_account_id"]=$account_id;

          $purchase_table=Purchase::create($purchase_table);
          $sale_id=$purchase_table->id;
            
          $items_table=json_decode($request->input('table-object'),true);
          // if(!empty($file)){
          // $file_table=DB::table('sales_files')->insert(['user_id'=>$user_id,'sales_id'=>$sale_id,'path'=>$file->storeAs('files','sales_files'.$user_id.$sale_id)]);
          //  }
          foreach($items_table as $item_row){
             //dd($item_row);
               if(!empty($item_row)){
                   PurchaseItem::insert(['purchase_id'=>$sale_id,'item_id'=>$item_row['id'],'hsn'=>$item_row['hsn'],'item_type'=>$item_row['type'],'unit_price'=>$item_row['unit_price'],'quantity'=>$item_row['quantity'],'unit_id'=>$item_row['unit_id'],'discount'=>$item_row['discount'],'taxable_value'=>$item_row['taxable_value'],'gst_id'=>$item_row['gst'],'cgst'=>$item_row['cgst'],'sgst'=>$item_row['sgst'],'igst'=>$item_row['igst'],'ugst'=>$item_row['ugst'],'cess_id'=>$item_row['cess'],'tax_amount'=>$item_row['tax_amount'],'total_product_amount'=>$item_row['total_amount'],'cess'=>$item_row['cess_amount']]);

                   DB::table('inventory')->increment('quantity',$item_row['quantity'],['sku'=>$item_row['sku']]);
               }
           }

           return redirect("purchases/purchases");

       }
       catch (Exception $e) {
        $errorCode = $e->errorInfo[1];          
        return "Some error occured : " .$e ;
    }
}
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show(Request $req)
    {  $yr = $req->input('year');

      //  $yr = $req->input('year');
        $i = $req->input('month');
                $sales=array();

$start=Carbon::create($yr,$i,1);
$end = Carbon::create($yr,$i,31);
$qq=Purchase::whereBetween('invoice_date',array($start->toDateTimeString(),$end->toDateTimeString()))
->get();
//$sales[$i]=$qq;
//$items = collect($qq)->groupBy('invoice_date')->toArray();
return json_encode($qq);
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
        $hsn = Hsn::all()->pluck('hsn' , 'hsn');
        $units = Unit::all()->pluck ('unit' , 'id');
        $vendors = Vendor::all()->pluck ('name' , 'id');
        $gst = Gst::all()->pluck ('description' , 'id');
        $states = State::all()->pluck ('name' , 'id');
        $items=Item::pluck('name');
        $items=$items->toArray();
        $bank_accounts=CompanyBankAccount::all()->pluck('account_number','id');
        $bank_branch=CompanyBranch::all()->pluck('branch_name','id');
        $vendor_type= Purchases::getEnumValues('customers','customer_type');
        $business_type= Purchases::getEnumValues('customers','business_type');
        $cess=Cess::all()->pluck ('description' , 'id');
        $purchase=Purchase::find($id);
        $purchase_items=$purchase->purchaseItems()->get();
        $item_row=0;
        foreach($purchase_items as $item){
            $item->item_name=Item::find($item->item_id)->name;
            $newRowDetails[$item_row]['gst']= $item->gst_id;
            $newRowDetails[$item_row]['cess']= $item->cess_id;
            $newRowDetails[$item_row]['hsn']= $item->hsn;
            $newRowDetails[$item_row++]['type']= $item->item_type;
        }


        $newRowDetails=json_encode($newRowDetails);
        

        return view('purchase.purchases.edit',compact('purchase','purchase_items','items','hsn','units','vendors','gst','states','bank_branch','vendor_type','business_type','cess','newRowDetails','bank_accounts'));
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
        Purchase::find($id)->delete();
         try {
          $file=$request->file('attachment'); 
            
          $purchase_table=json_decode($request->input('common-object'),true);
          $purchase_table['payment_status']="Pending";
          if($request->input('payment_status')){
            $purchase_table['payment_status']="Completed";
          }
          $bank_branch_id=$request->input('bank_branch');
          $user_id=0; 
            
          $company=CompanyBranch::find($bank_branch_id);
          $company_id=$company->company_id;
          $company_gstin=find($company->gstin_id)->gstin;
          $account_id=$request->input('bank_account');
            
          $purchase_table["company_branch_id"]=$bank_branch_id;
          $purchase_table["company_id"]=$company_id;
          $purchase_table["company_account_id"]=$account_id;

          $purchase_table=Purchase::create($purchase_table);
          $sale_id=$purchase_table->id;
            
          $items_table=json_decode($request->input('table-object'),true);
          // if(!empty($file)){
          // $file_table=DB::table('sales_files')->insert(['user_id'=>$user_id,'sales_id'=>$sale_id,'path'=>$file->storeAs('files','sales_files'.$user_id.$sale_id)]);
          //  }
          foreach($items_table as $item_row){
             //dd($item_row);
               if(!empty($item_row)){
                   PurchaseItem::insert(['purchase_id'=>$sale_id,'item_id'=>$item_row['id'],'hsn'=>$item_row['hsn'],'item_type'=>$item_row['type'],'unit_price'=>$item_row['unit_price'],'quantity'=>$item_row['quantity'],'unit_id'=>$item_row['unit_id'],'discount'=>$item_row['discount'],'taxable_value'=>$item_row['taxable_value'],'gst_id'=>$item_row['gst'],'cgst'=>$item_row['cgst'],'sgst'=>$item_row['sgst'],'igst'=>$item_row['igst'],'ugst'=>$item_row['ugst'],'cess_id'=>$item_row['cess'],'tax_amount'=>$item_row['tax_amount'],'total_product_amount'=>$item_row['total_amount'],'cess'=>$item_row['cess_amount']]);

                   DB::table('inventory')->increment('quantity',$item_row['quantity'],['sku'=>$item_row['sku']]);
               }
           }

           return redirect("purchases/purchases");

       }
       catch (Exception $e) {
        $errorCode = $e->errorInfo[1];          
        return "Some error occured : " .$e ;
    }

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
        Purchase::find($id)->delete();
        redirect("purchases/purchases");
    }



    public function index1(Request $req){
        $items =Purchase::get();
       $defaultMonth = Carbon::now()->format('m');
       $defaultYear = Carbon::now()->format('y'); 
       $month = array("January","February","March","April","May","June","July","August","September","October","November","December");
        $ss = Purchase::pluck('invoice_date');
         $ss=$ss->toArray();
        $stt=array();
   
    // dd(sizeof($ss));
    for($i=0;$i<sizeof($ss);$i++)
    {
        $date_array=explode('-',$ss[$i]);
        // $s[$i]=$date_array[0];
        // echo" ".$date_array[0];
        $stt[$i]=$date_array[0]; 

    }

   $unique_data = array_unique($stt);
    $k = 0;
    $years = array();
  foreach($unique_data as $val) {
      $years[$k++] = $val;
       }
// print_r($unique_data);
      // $years = array(2017,2018);
       
       return view('purchase.index',compact('items','years','month','defaultMonth','defaultYear'));
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


     public function vendorInfo(Request $req){
        $vendor_id=$req->input('vendor_id');
        $vendor_state=Vendor::where('id',$vendor_id)->pluck('state_id')->toArray();
        return json_encode($vendor_state);
    }
}
