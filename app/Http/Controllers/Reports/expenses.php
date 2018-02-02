<?php

namespace App\Http\Controllers\Reports;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer\Customer;
use App\Models\Sale\Sale;
use App\Models\Sale\SalesPayment;
use App\Models\Vendor\Vendor;
use App\Models\Vendor\VendorAccount;
class expenses extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
//       
    return view('reports.reports.expenses');
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $req)//expenses_modal
    {
        $pname = $req->input('party_name');
        //return json_encode($pname);
        if( empty($req->input('pdate1')) && empty($req->input('pdate2'))) {
            $ss =Vendor::where('name','=',$pname)->get();
                foreach($ss as $sale)   {
                    $sale->vendor=VendorAccount::where('vendor_id','=', $sale->id )->pluck('id');
                    $sale->cname=SalesPayment::where('customer_account_id','=',$sale->vendor)->get();
                }
        return json_encode($sale->cname);
        }
        else
        {   $fDate = explode("/",$req->input('pdate1'));
            $tDate = explode("/",$req->input('pdate2'));
            $fromDate = "$fDate[2]-$fDate[0]-$fDate[1]";
            $toDate = "$tDate[2]-$tDate[0]-$tDate[1]";
            $ss =Vendor::where('name','=',$pname)->get();
            foreach($ss as $sale){
                $sale->vendor=VendorAccount::where('vendor_id','=', $sale->id )->pluck('id');
            
                $sale->cname=SalesPayment::where('customer_account_id','=',$sale->vendor)->whereBetween('payment_date', array($fromDate, $toDate))->get();
            // dd($sale->cname);
            }
    
        return json_encode($sale->cname);
        }
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

}
