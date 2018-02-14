<?php

namespace App\Http\Controllers\Sales;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Customer\Customer;
use App\Models\Setting\State;
use App\Models\Setting\Country;

class Customers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $customers=DB::table('customers')->get();
        return view('sales.customers.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $states = State::all()->pluck('name' , 'id');
        $customer_type= Customers::getEnumValues('customers','customer_type');
        $business_type= Customers::getEnumValues('customers','business_type');
        $countries=Country::all()->pluck ('name' , 'id');
        return view('sales.customers.create',compact('customer_type','business_type','states','countries'));
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
        Customer::create($request->all());
          return redirect("sales/customers"); 
    }

     public function store1(Request $request)
    {
        //
          Customer::create($request->all());
          return redirect("sales/sales/create");
            
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
    public function edit(Customer $customer)
    {
        //
        $states = State::all()->pluck ('name' , 'id');
        $countries=Country::all()->pluck ('name' , 'id');
        $customer_type= Customers::getEnumValues('customers','customer_type');
        $business_type= Customers::getEnumValues('customers','business_type');
        return view('sales.customers.edit',compact('customer','customer_type','business_type','states','countries'));
    }

      /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Customer $customer, Request $request)
    {
        //
        $customer->update($request->input());
        $message = trans('messages.success.updated', ['type' => trans_choice('general.customers', 1)]);
        flash($message)->success();
        return redirect('sales/customers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
         $customer->delete();
        $message = trans('messages.success.deleted', ['type' => trans_choice('general.customers', 1)]);
        flash($message)->success();
        return redirect('sales/customers');
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
