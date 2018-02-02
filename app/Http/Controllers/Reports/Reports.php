<?php

namespace App\Http\Controllers\Reports;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer\Customer;
use App\Models\Sale\Sale;

class Reports extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $r) {
//       $name = $r->input('Customer_Name');
//         $fromDate = $r->input('invoice1');
//         $toDate = $r->input('invoice2');
//         $ss =Customer::where('name','=',$name)->get();
// foreach($ss as $sale){

//             $sale->customer=Sale::find($sale->id)->whereBetween('invoice_date', array($fromDate, $toDate))->get();
//             // dd($sale->customer);
//         }
//         $incomes = $sale->customer;
    return view('reports.reports.income');
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
    public function show(Request $req)
    {
        $pname = $req->input('party_name');
        
    
        // return json_encode($fromDate);
        if( empty($req->input('invoice1')) && empty($req->input('invoice2'))){
        $ss =Customer::where('name','=',$pname)->get();
        foreach($ss as $sale){
            $sale->customer=Sale::where('customer_id','=',$sale->id)->get();
            // dd($sale->customer);
        }
    return json_encode($sale->customer);
    }
        else
        {
        $fDate = explode("/",$req->input('invoice1'));
        $tDate = explode("/",$req->input('invoice2'));
        $fromDate = "$fDate[2]-$fDate[0]-$fDate[1]";
        $toDate = "$tDate[2]-$tDate[0]-$tDate[1]";
           $ss =Customer::where('name','=',$pname)->get();
            foreach($ss as $sale){

            $sale->customer=Sale::where('customer_id','=',$sale->id)->whereBetween('invoice_date', array($fromDate, $toDate))->get();
            // dd($sale->customer);
        }
    
        return json_encode($sale->customer);
        
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
