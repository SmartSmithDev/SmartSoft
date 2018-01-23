<?php

namespace App\Http\Controllers\Purchases;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Purchase\Purchase;
 use Carbon\Carbon;
 
class Purchases extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items =Purchase::get();
       $defaultMonth = Carbon::now()->format('m');
       $defaultYear = Carbon::now()->format('y'); 
       $month = array("January","February","March","April","May","June","July","August","September","October","November","December");
        $ss = Purchase::pluck('invoice_date');
         $ss=$ss->toArray();
        $stt=array();
   
    // dd(sizeof($ss));
    for($i=0;$i<sizeof($ss);$i++)
    {
        $date_array=explode('-',$ss[$i]);
        // $s[$i]=$date_array[0];
        // echo" ".$date_array[0];
        $stt[$i]=$date_array[0]; 

    }

   $unique_data = array_unique($stt);
    $k = 0;
    $years = array();
  foreach($unique_data as $val) {
      $years[$k++] = $val;
       }
// print_r($unique_data);
      // $years = array(2017,2018);
       
       return view('purchase.index',compact('items','years','month','defaultMonth','defaultYear'));
        //
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
    {  $yr = $req->input('year');

      //  $yr = $req->input('year');
        $i = $req->input('month');
                $sales=array();

$start=Carbon::create($yr,$i,1);
$end = Carbon::create($yr,$i,31);
$qq=Purchase::whereBetween('invoice_date',array($start->toDateTimeString(),$end->toDateTimeString()))
->get();
//$sales[$i]=$qq;
//$items = collect($qq)->groupBy('invoice_date')->toArray();
return json_encode($qq);
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
