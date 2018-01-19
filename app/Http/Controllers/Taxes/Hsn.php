<?php

namespace App\Http\Controllers\Taxes;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tax\Hsn as h;
use App\Http\Controllers\Controller;

class Hsn extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
        $hsns = h::
        select('hsn.hsn as hsn','hsn.item_type as item','hsn.description as hsn_d','gst.rate as gst_rate','gst.description as gst_d','cess.rate as cess_rate','cess.description as cess_d')
          ->join('gst', 'hsn.gst_id', '=', 'gst.id')
          ->join('cess', 'hsn.cess_id', '=', 'cess.id')
          ->get();
            return view('tax.hsn.index',compact('hsns'));
      
       
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
