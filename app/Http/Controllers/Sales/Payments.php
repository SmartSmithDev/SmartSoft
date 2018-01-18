<?php

namespace App\Http\Controllers\Sales;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sale\SalesPayment;
use DB;
use App\Models\Vendor\Vendor;
use App\Models\Vendor\VendorAccount;
use App\Models\Company\Company;
use App\Models\Company\CompanyBankAccount;
use App\Models\Sale\Sale;


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
        $vendors=DB::table('vendors')->get();
        return view('payments.payments.index',compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $sales = Sale::all()->pluck('id');
        $vendor_accounts = VendorAccount::all()->pluck('account_number','id');
        $company_accounts=CompanyBankAccount::all()->pluck('account_number','id');
        $payment_mode=Payments::getEnumValues('sales_payments','payment_mode');
        $payment_type=Payments::getEnumValues('sales_payments','payment_type');
        return view('payments.payments.create',compact('vendor_accounts','company_accounts','payment_mode','payment_type'));

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
        SalesPayment::create($request->all());
        // $payment=SalesPayment::updateOrCreate($request->all());
        // $payment->paid_amount=$payment->paid_amount+$request->input('paid_amount');
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
    public function edit(SalesPayment $payment)
    {
        // $sales = Sale::all()->pluck('id');
        $vendor_accounts = VendorAccount::all()->pluck('account_number','id');
        $company_accounts=CompanyBankAccount::all()->pluck('account_number','id');
        $payment_mode=Payments::getEnumValues('sales_payments','payment_mode');
        $payment_type=Payments::getEnumValues('sales_payments','payment_type');
        return view('payments.payments.edit',compact('vendor','vendor_accounts','company_accounts','payment_mode','payment_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SalesPayment $payment,Request $request)
    {
        $payment->update($request->input());
        $message = trans('messages.success.updated', ['type' => trans_choice('general.payments', 1)]);
        flash($message)->success();
        return redirect('payments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment->delete();
        $message = trans('messages.success.deleted', ['type' => trans_choice('general.payments', 1)]);
        flash($message)->success();
        return redirect('payments');
    }

     //to retrieve enum values from  database as an array
    public static function getEnumValues($table, $column) {
      $type = DB::select(DB::raw("SHOW COLUMNS FROM $table WHERE Field = '{$column}'"))[0]->Type ;
      preg_match('/^enum\((.*)\)$/', $type, $matches);
      $enum = array();
      foreach( explode(',', $matches[1]) as $value )
      {
        $v = trim( $value, "'" );
        $enum = array_add($enum, $v, $v);
      }
      return $enum;
    }
}
