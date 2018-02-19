<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Models\Tax\Hsn;
use App\Models\Setting\Unit;
use App\Models\Setting\State;
use App\Models\Setting\Country;
use App\Models\Tax\Gst;
use App\Models\Tax\Cess;
use App\Models\Item\Item;
use App\Models\Sale\Sale;
use App\Models\Sale\SalesItem;
use App\Models\Customer\Customer;
use App\Models\Company\Company;
use App\Models\Company\CompanyBranch;
use App\Models\Company\CompanyBankAccount;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use PDF;
use Illuminate\Http\Request; //for Request class
use Exception;//for exception handling
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;


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
        $customers = Customer::all()->pluck ('name' , 'id');
        $customers=Customer::all()->pluck ('name' , 'id');
        $gst = Gst::all()->pluck ('description' , 'id');
        $states = State::all()->pluck ('name' , 'id');
        $countries=Country::all()->pluck ('name' , 'id');
        $items=Item::all()->pluck('name','id');
        $items=$items->toArray();
        $bank_branch=CompanyBranch::all()->pluck('branch_name','id');
        $customer_type= Sales::getEnumValues('customers','customer_type');
        $business_type= Sales::getEnumValues('customers','business_type');
        $cess=Cess::all()->pluck ('description' , 'id');
        $bank_accounts=CompanyBankAccount::all()->pluck('account_number','id');
        

        $statement = DB::select("SHOW TABLE STATUS LIKE 'sales'"); //for getting the next value auto increment id
        $new_invoice_id = $statement[0]->Auto_increment;
        return view('sales.sales.create' , compact('gst' , 'customers' , 'hsn' , 'units' , 'states','countries','items','bank_branch','customer_type','business_type','cess','new_invoice_id','bank_accounts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {  

          //dd($request->all());
      
          $file=$request->file('attachment'); 
            
          $sale_table=json_decode($request->input('common-object'),true);
          $sale_table['payment_status']="Pending";
          if($request->input('payment_status')){
            $sale_table['payment_status']="Completed";
          }
          $bank_branch_id=$request->input('bank_branch');
          $user_id=Auth::id(); 
            
          $company=CompanyBranch::find($bank_branch_id);
          $company_id=$company->company_id;
          $account_id=$request->input('bank_account');
            
          $sale_table["company_branch_id"]=$bank_branch_id;
          $sale_table["company_id"]=$company_id;
          $sale_table["company_account_id"]=$account_id;

          $sale_table=Sale::create($sale_table);
          $sale_id=$sale_table->id;
            
          $items_table=json_decode($request->input('table-object'),true);
          if(!empty($file)){
          $file_table=DB::table('sales_files')->insert(['user_id'=>$user_id,'sales_id'=>$sale_id,'path'=>$file->storeAs('files','sales_files'.$user_id.$sale_id)]);
           }
          foreach($items_table as $item_row){
             //dd($item_row);
               if(!empty($item_row)){
                   $sales_item=SalesItem::create(['sales_id'=>$sale_id,'item_id'=>$item_row['id'],'hsn'=>$item_row['hsn'],'item_type'=>$item_row['type'],'unit_price'=>$item_row['unit_price'],'quantity'=>$item_row['quantity'],'unit_id'=>$item_row['unit_id'],'discount'=>$item_row['discount'],'taxable_value'=>$item_row['taxable_value'],'gst_id'=>$item_row['gst'],'cgst'=>$item_row['cgst'],'sgst'=>$item_row['sgst'],'igst'=>$item_row['igst'],'ugst'=>$item_row['ugst'],'cess_id'=>$item_row['cess'],'tax_amount'=>$item_row['tax_amount'],'total_product_amount'=>$item_row['total_amount'],'cess_amount'=>$item_row['cess_amount']]);
                   $item_row["name"]=$sales_item->item()->first()->name;

                  
               }
           }
           $sale_table["money_in_words"]=$this->displaywords($sale_table["round_off"]);
           $customer=$sale_table->customer()->pluck('address','gstin')->toArray();
           $state=$sale_table->supplyState()->pluck('state_tax_code')->toArray()[0];
           $sale_table["gstin"]=array_keys($customer)[0];
           $sale_table["address"]=array_values($customer)[0];
           $sale_table["state"]=$state;
           $pdf = PDF::loadView("sales.invoice.invoice",["sale"=>$sale_table,"items"=>$items_table]);

           DB::table('sales_invoices')->insert(['user_id'=>$user_id,'sales_id'=>$sale_id,'path'=>'invoices/invoice'.$user_id.$sale_id.'.pdf']);

           Storage::put('invoices/invoice'.$user_id.$sale_id.'.pdf', $pdf->output());
           return redirect("sales/sales");
         
       
   
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
        $hsn = Hsn::all()->pluck('hsn' , 'hsn');
        $units = Unit::all()->pluck ('unit' , 'id');
        $customers = Customer::all()->pluck ('name' , 'id');
        $gst = Gst::all()->pluck ('description' , 'id');
        $states = State::all()->pluck ('name' , 'id');
        $items=Item::pluck('name','id');
        $items=$items->toArray();
        $bank_accounts=CompanyBankAccount::all()->pluck('account_number','id');
        $bank_branch=CompanyBranch::all()->pluck('branch_name','id');
        $customer_type= Sales::getEnumValues('customers','customer_type');
        $business_type= Sales::getEnumValues('customers','business_type');
        $cess=Cess::all()->pluck ('description' , 'id');
        $sale=Sale::find($id);
        $countries=Country::all()->pluck ('name' , 'id');
        $sales_items=$sale->salesItems()->get();
        $item_row=0;
        foreach($sales_items as $item){
            $item->item_name=Item::find($item->item_id)->name;
            $newRowDetails[$item_row]['gst']= $item->gst_id;
            $newRowDetails[$item_row]['cess']= $item->cess_id;
            $newRowDetails[$item_row]['hsn']= $item->hsn;
            $newRowDetails[$item_row++]['type']= $item->item_type;
        }


        $newRowDetails=json_encode($newRowDetails);
        

        return view('sales.sales.edit',compact('sale','sales_items','items','hsn','units','customers','gst','states','bank_branch','customer_type','business_type','cess','newRowDetails','bank_accounts','countries'));
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
       
       Sale::find($id)->delete();

        try {
          $file=$request->file('attachment'); 
            
          $sale_table=json_decode($request->input('common-object'),true);
          $sale_table['payment_status']="Pending";
          if($request->input('payment_status')){
            $sale_table['payment_status']="Completed";
          }
          $bank_branch_id=$request->input('bank_branch');
          $user_id=Auth::id(); 
            
          $company=CompanyBranch::find($bank_branch_id);
          $company_id=$company->company_id;
          $account_id=$request->input('bank_account');
            
          $sale_table["company_branch_id"]=$bank_branch_id;
          $sale_table["company_id"]=$company_id;
          $sale_table["company_account_id"]=$account_id;

          $sale_table=Sale::create($sale_table);
          $sale_id=$sale_table->id;
            
          $items_table=json_decode($request->input('table-object'),true);
          if(!empty($file)){
          $count=DB::table('sales_files')->where('sales_id',$sale_id)->where('user_id',$user_id)->count();
          $file_table=DB::table('sales_files')->insert(['user_id'=>$user_id,'sales_id'=>$sale_id,'path'=>$file->storeAs('files','sales_files'.$count.$user_id.$sale_id)]);
        }

          foreach($items_table as $key=>$item_row){
             //dd($item_row);
               if(!empty($item_row)){
                   $sales_item=SalesItem::create(['sales_id'=>$sale_id,'item_id'=>$item_row['id'],'hsn'=>$item_row['hsn'],'item_type'=>$item_row['type'],'unit_price'=>$item_row['unit_price'],'quantity'=>$item_row['quantity'],'unit_id'=>$item_row['unit_id'],'discount'=>$item_row['discount'],'taxable_value'=>$item_row['taxable_value'],'gst_id'=>$item_row['gst'],'cgst'=>$item_row['cgst'],'sgst'=>$item_row['sgst'],'igst'=>$item_row['igst'],'ugst'=>$item_row['ugst'],'cess_id'=>$item_row['cess'],'tax_amount'=>$item_row['tax_amount'],'total_product_amount'=>$item_row['total_amount'],'cess_amount'=>$item_row['cess_amount']]);
                   $items_table[$key]["name"]=$sales_item->item()->first()->name;
                   
               }
           }
           $sale_table["money_in_words"]=$this->displaywords($sale_table["round_off"]);
           $customer=$sale_table->customer()->pluck('address','gstin')->toArray();
           $state=$sale_table->supplyState()->pluck('state_tax_code')->toArray()[0];
           $sale_table["gstin"]=array_keys($customer)[0];
           $sale_table["address"]=array_values($customer)[0];
           $sale_table["state"]=$state;
           $pdf = PDF::loadView("sales.invoice.invoice",["sale"=>$sale_table,"items"=>$items_table]);

           DB::table('sales_invoices')->insert(['user_id'=>$user_id,'sales_id'=>$sale_id,'path'=>'invoices/invoice'.$user_id.$sale_id.'.pdf']);

           Storage::put('invoices/invoice'.$user_id.$sale_id.'.pdf', $pdf->output());
           return redirect("sales/sales");

       }
       catch (Exception $e) {
                 
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
        Sale::find($id)->delete();
        return redirect("sales/sales");
    }

    //autoFill() returns the item details using item name
    public function autoFill(Request $req)
    {
        $data=$req->id;  //item is the get data from url
        //var_dump($data);
        $item_details=Item::where('id','=',$data)->get()->toArray();
        $hsn_row=HSN::where('hsn','=',$item_details[0]['hsn'])->pluck('gst_id','cess_id')->toArray();//returns an associative array with key as cess_id and value as gst_id of each row
        $gst_id=array_values($hsn_row);
        $cess_id=array_keys($hsn_row);
        $item_details[0]['gst']=$gst_id[0];
        $item_details[0]['cess']=$cess_id[0];


        //dd(json_encode($item_details[0]));

        return json_encode($item_details[0]);
       
    }

    public function customerInfo(Request $req){
        $customer_id=$req->input('customer_id');
        $customer_state=Customer::where('id',$customer_id)->pluck('state_id')->toArray();
        return json_encode($customer_state);
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


    public function download($id){
        $user=1;
        $path=DB::table('sales_invoices')->where('sales_id','=',$id)->where('user_id','=',$user)->pluck('path')->toArray();
        if(!empty($path)){
        return response()->download(storage_path('app/'.$path[0]),explode('/',$path[0])[1]);
    }
        return "Some Error Occured";
    }


    public function quantity(Request $req){
        $quantity=$req->input('quantity');
        $sku=$req->input('sku');
        $inventory=DB::table('inventory')->where('sku','=',$sku);
        if($inventory->count()>0){
            if($inventory->pluck('quantity')[0]>=$quantity)
                return "Ok";
            else
                return $inventory->pluck('quantity')[0];
        }
        else
            return "-1";
    }


    function displaywords($number){
     $decimal = round($number - ($no = floor($number)), 2) * 100;
     $hundred = null;
     $digits_length = strlen($no);
     $i = 0;
     $str = array();
     $words = array(0 => '', 1 => 'one', 2 => 'two',
      3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
      7 => 'seven', 8 => 'eight', 9 => 'nine',
      10 => 'ten', 11 => 'eleven', 12 => 'twelve',
      13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
      16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
      19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
      40 => 'forty', 50 => 'fifty', 60 => 'sixty',
      70 => 'seventy', 80 => 'eighty', 90 => 'ninety');
     $digits = array('', 'hundred','thousand','lakh', 'crore');
     while( $i < $digits_length ) {
      $divider = ($i == 2) ? 10 : 100;
      $number = floor($no % $divider);
      $no = floor($no / $divider);
      $i += $divider == 10 ? 1 : 2;
      if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
      } else $str[] = null;
    }
    $Rupees = implode('', array_reverse($str));
    $paise = ($decimal) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
    return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise;

  }

}
