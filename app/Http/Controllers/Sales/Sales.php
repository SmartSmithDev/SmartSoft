<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Models\Tax\Hsn;
use App\Models\Setting\Unit;
use App\Models\Setting\State;
use App\Models\Vendor\Vendor;
use App\Models\Tax\Gst;
use App\Models\Item\Item;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

use Illuminate\Http\Request;

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
        $hsn = Hsn::all()->pluck('hsn' , 'hsn');
        $units = Unit::all()->pluck ('unit' , 'id');
        $vendors = Vendor::all()->pluck ('name' , 'id');
        $gst = Gst::all()->pluck ('description' , 'id');
        $states = State::all()->pluck ('name' , 'id');
        $items=DB::table('items')->pluck('name');
        $items=$items->toArray();
        $vendor_type= Sales::getEnumValues('vendors','vendor_type');
        $business_type= Sales::getEnumValues('vendors','business_type');

        //dd($items);
        return view('sales.sales' , compact('gst' , 'vendors' , 'hsn' , 'units' , 'states','items','vendor_type','business_type'));
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
         $user = Vendor::create($request->all());
        // return redirect()->route('/sales');
        // return view('sales.sales');
             return redirect("sales");
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

//autoFill() returns the item details using item name
      public function autoFill(Request $req)
    {
        $data=$req->item;  //item is the get data from url
        //var_dump($data);
        $item_details=Item::where('name','=',$data)->get()->toArray();
        
        //dd(json_encode($item_details[0]));
       
        return json_encode($item_details[0]);
       
    }

    public function vendorInfo(Request $req){
        $vendor_id=$req->input('vendor_id');
        $vendor_state=Vendor::where('id',$vendor_id)->pluck('state_id')->toArray();
        return json_encode($vendor_state);
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

    public function save_data(Request $request){     

    }


}
