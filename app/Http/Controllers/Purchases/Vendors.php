<?php

namespace App\Http\Controllers\Purchases;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreGstIn;
use Illuminate\Foundation\Validation\ValidatesRequests;
use DB;
use App\Models\Vendor\Vendor;
use App\Models\Setting\State;
use App\Models\Vendor\VendorAccount;


class Vendors extends Controller
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
        $vendorAccounts=VendorAccount::all();
        //dd($vendorAccounts);
        return view('purchase.vendors.index',compact('vendors','vendorAccounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $states = State::all()->pluck ('name' , 'id');
        $vendor_type= Vendors::getEnumValues('vendors','vendor_type');
        $business_type= Vendors::getEnumValues('vendors','business_type');
        return view('purchase.vendors.create',compact('vendor_type','business_type','states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $query=Vendor::create($request->except(['accounts']));
        $id=$query->id;
        if($request->input('accounts')){
            $vendorAccounts=$request->input('accounts');
            foreach ($vendorAccounts as $vendorAccount) {
                $vendorAccount['vendor_id']=$id;
                VendorAccount::create($vendorAccount);
            }
            
        }
        return redirect("/purchases/vendors");
    }

    public function store1(Request $request)
    {
          // $this->validate($request , [
          //   'gstin' => 'unique:vendors|max:15|min:15'
          //   ],['gstin.min:15' => 'The gst must have 15 characters '
          //       ]);
            Vendor::create($request->all());
          return redirect("purchases/purchases/create");
            
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
    public function edit(Vendor $vendor)
    {
        $states = State::all()->pluck ('name' , 'id');
        $vendor_type= Vendors::getEnumValues('vendors','vendor_type');
        $business_type= Vendors::getEnumValues('vendors','business_type');
        return view('purchase.vendors.edit',compact('vendor','vendor_type','business_type','states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Vendor $vendor,Request $request)
    {
        //
        $vendor->update($request->input());
        $message = trans('messages.success.updated', ['type' => trans_choice('general.vendors', 1)]);
        flash($message)->success();
        return redirect('purchases/vendors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendor $vendor)
    {
        //
       $vendor->delete();
       $message = trans('messages.success.deleted', ['type' => trans_choice('general.vendors', 1)]);

       flash($message)->success();
       return redirect('purchases/vendors');
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
