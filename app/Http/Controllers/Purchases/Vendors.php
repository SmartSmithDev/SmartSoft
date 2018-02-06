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
use App\Models\Setting\Country;


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
        return view('purchase.vendors.index',compact('vendors','vendorAccounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
        return view('purchase.vendors.create');

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

        $cname=$request->input('name');
        $email_id=$request->input('email_id');
        $bn=$request->input('beneficiary_name');
         return $this->insert($cname,$email_id,$bn);
            
            
       
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
    public function edit(Request $request,$id)
    {
        //

       
      
          $vendors = Vendor::find($id);
       //$vendorAccounts=VendorAccount::find($id);
           $vendor_accounts=Vendor::find($id)->vendorAccounts()->get();
       
            return view('purchase.vendors.edit',compact('vendors','vendor_accounts'));

       
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
        /*$vendor->update($request->input());
        $message = trans('messages.success.updated', ['type' => trans_choice('general.vendors', 1)]);
        flash($message)->success();
        return redirect('purchases/vendors');*/
        //Vendor::find($id)->vendorAccounts()->delete();
        Vendor::find($id)->delete();
        VendorAccount::find($id)->delete();
        $cname=$request->input('name');
        $email_id=$request->input('email_id');
        $bn=$request->input('beneficiary_name');
        return $this->insert($cname,$email_id,$bn);
            
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
        /* $vendor->delete();
        $message = trans('messages.success.deleted', ['type' => trans_choice('general.vendors', 1)]);

            flash($message)->success();
        return redirect('purchases/vendors');*/
    
         $VendorAccount->delete();
        $Vendor->delete();
     $message = trans('messages.success.deleted', ['type' => trans_choice('general.vendors', 1)]);
    flash($message)->success();
        return redirect('purchases/vendors');
    }

    
     public function insert($cname,$pan,$bn){
         $vendor=Vendor::create(["name"=>$cname]);
    
          return redirect("/purchases/vendors");
    }
}
