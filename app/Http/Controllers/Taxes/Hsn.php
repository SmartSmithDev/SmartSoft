<?php

namespace App\Http\Controllers\Taxes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreGstIn;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\DB;
use App\Models\Tax\Hsn as hsns;
use App\Models\Tax\Gst;
use App\Models\Tax\Cess;

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
         $hsns = hsns::
        select('hsn.hsn as hsn','hsn.item_type as item','hsn.description as hsn_d','gst.rate as gst_rate','gst.description as gst_d','cess.rate as cess_rate','cess.description as cess_d')
          ->join('gst', 'hsn.gst_id', '=', 'gst.id')
          ->join('cess', 'hsn.cess_id', '=', 'cess.id')
          ->get();
        return view('tax.hsn.index' , compact('hsns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $item_type = Hsn::getEnumValues('hsn','item_type');
        // $gst_description = Hsn::getEnumValues('gst','description');
      
        
        return view('tax.hsn.create',compact('item_type'));
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
        Hsn::create($request->all());
        //   if(!empty($request->input('gst_rate'))){
        //   DB::table('gst')->insert(['rate'=>$request->input('gst_rate'),'description'=>$request->input('gst_d')]);  
        // DB::table('cess')->insert(['rate'=>$request->input('cess_rate'),'description'=>$request->input('cess_d')]); 
        //   }
        return redirect('tax/hsn');
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
