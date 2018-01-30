<?php

namespace App\Http\Controllers\Purchases;
use App\Http\Controllers\Purchases;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sale\SalesPayment;
use DB;
use App\Http\Requests;
use App\Models\Vendor\Vendor;
use App\Models\Vendor\VendorAccount;
use App\Models\Company\Company;
use App\Models\Company\CompanyBankAccount;
use App\Models\Sale\Sale;
use  App\Models\Customer\Customer;
use App\Models\Customer\CustomerAccounts;


class Payments extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       //Display the payments
        /*$d =Sale::select('sales.invoice_type as invoice_type','sales.order_date as order_date','sales.total_taxable_value as total_taxable_value','sales.total_discount as total_discount ','sales.total_tax_amount as total_tax_amount','sales.shipping_cost as shipping_cost','sales.round_off as round_off','sales.total_amount as total_amount','sales.reverse_charge as reverse_chargep','sales.payment_status as status','sales_payments.payment_date as payment_date','sales_payments.payment_mode as payment_mode','sales_payments.paid_amount as paid_amount','sales_payments.payment_type as payment_type')
          ->join('sales_payments', 'sales.id', '=', 'sales_payments.sales_id')
          ->get();
        $status = array('Paid','Unpaid');
        return view('Payments.payments',compact('d','status'));*/
         $d=DB::table('sales_payments')->get();
         return view('Payments.index',compact('d'));
       

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $sales = Sale::all()->pluck('id');
        $sales=Sale::pluck('order_id','id');
        $customer_accounts=CustomerAccounts::all()->pluck('account_number','id');
        $vendor_accounts = VendorAccount::all()->pluck('account_number','id');
        $company_accounts=CompanyBankAccount::all()->pluck('account_number','id');
        $payment_mode=Payments::getEnumValues('sales_payments','payment_mode');
        $payment_type=Payments::getEnumValues('sales_payments','payment_type');
        return view('Payments.create',compact('vendor_accounts','company_accounts','payment_mode','payment_type','sales','customer_accounts'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests $request)
    {
        //dd($request->all());
        //$sales_id=$request['sales_id'];
        //dd($sales_id);
       /* $sale=Sale::find($request->sales_id)->pluck('company_account_id','customer_id')->toArray();
        //dd($sale);
        $company_account_id=array_values($sale)[0];
        $customer_id=array_keys($sale)[0];
        SalesPayment::insert(['sales_id'=>$request['sales_id'], 'payment_date'=>$request['payment_date'], 'payment_mode'=>$request['payment_mode'], 'paid_amount'=>$request['paid_amount'], 'payment_terms'=>$request['payment_terms'], 'payment_type'=>$request['payment_type'], 'company_account_id'=>$company_account_id, 'customer_account_id'=>$customer_id, 'payment_reference'=>$request['payment_reference'], 'payment_notes'=>$request['payment_notes'] ]);


        // $payment=SalesPayment::updateOrCreate($request->all());
        // $payment->paid_amount=$payment->paid_amount+$request->input('paid_amount');*/
$id=$request->input('id');
        $company_account_id=$request->input('company_account_id');
        $customer_account_id= $request->input('customer_account_id');
        $payment_reference=$request->input('payment_reference');
        $payment_notes=$request->input('payment_notes');
        
         return $this->insert($id,$company_account_id, $customer_account_id, $payment_reference, $payment_notes);





    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $req) {
        $status = $req->input('status');
        if($status == 0) {
        //if status is complete
            $d =Sale::select('sales.invoice_type as invoice_type','sales.order_date as order_date','sales.total_taxable_value as total_taxable_value','sales.total_discount as total_discount ','sales.total_tax_amount as total_tax_amount','sales.shipping_cost as shipping_cost','sales.round_off as round_off','sales.total_amount as total_amount','sales.reverse_charge as reverse_chargep','sales.payment_status as status','sales_payments.payment_date as payment_date','sales_payments.payment_mode as payment_mode','sales_payments.paid_amount as paid_amount','sales_payments.payment_type as payment_type')
          ->join('sales_payments', 'sales.id', '=', 'sales_payments.sales_id')->where('status','=','Completed')
          ->get();
        }
       else {
        //if status is incomplete
            $d =Sale::select('sales.invoice_type as invoice_type','sales.order_date as order_date','sales.total_taxable_value as total_taxable_value','sales.total_discount as total_discount ','sales.total_tax_amount as total_tax_amount','sales.shipping_cost as shipping_cost','sales.round_off as round_off','sales.total_amount as total_amount','sales.reverse_charge as reverse_chargep','sales.payment_status as status','sales_payments.payment_date as payment_date','sales_payments.payment_mode as payment_mode','sales_payments.paid_amount as paid_amount','sales_payments.payment_type as payment_type')
          ->join('sales_payments', 'sales.id', '=', 'sales_payments.sales_id')->where('status','=','Pending')
          ->get();
        }
        return json_encode($d);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
          $SalesPayment=SalesPayment::find($id);
          return view('Payments.edit',compact('SalesPayment')) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
          
          SalesPayment::find($id)->delete();
         $id=$request->input('id');
        $company_account_id=$request->input('company_account_id');
        $customer_account_id= $request->input('customer_account_id');
        $payment_reference=$request->input('payment_reference');
        $payment_notes=$request->input('payment_notes');
         return $this->insert($id,$company_account_id, $customer_account_id, $payment_reference, $payment_notes);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
          $SalesPayment->delete();
           $message = trans('messages.success.deleted', ['type' => trans_choice('general.payments', 1)]);
        flash($message)->success();
        return redirect('purchases/payments');
    }
public function insert($id,$company_account_id, $customer_account_id, $payment_reference, $payment_notes)
{
         $SalesPayment=SalesPayment::create(["id"=>$id,"company_account_id"=>$company_account_id]);
       return redirect("/purchases/payments");
    }
    
    
}
