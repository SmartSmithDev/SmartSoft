<?php

namespace App\Http\Controllers\Taxes;
use Illuminate\Http\Request;
use App\Models\Tax\Gst as gsts;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Requests;

class Gst extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $gsts = gsts::get();
        return view('tax.gst.index' , compact('gsts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view ('tax.gst.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $rate=$request->input('rate');
        $cgst= $request->input('cgst');
        $sgst=$request->input('sgst');
        $ugst=$request->input('ugst');
        $igst=$request->input('igst');
        $description=$request->input('description');
         return $this->insert( $rate, $cgst, $sgst, $ugst,$igst, $description);
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
    public function edit(Gst $gst,$id)
    {  
         $gst = gsts::find($id);
        return view('tax.gst.edit',compact('gst')) ;
      
  
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
       
         gsts::find($id)->delete();
        $rate=$request->input('rate');
        $cgst= $request->input('cgst');
        $sgst=$request->input('sgst');
        $ugst=$request->input('ugst');
        $igst=$request->input('igst');
        $description=$request->input('description');
        return $this->insert($rate, $cgst, $sgst, $ugst,$igst, $description);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gst $gst)
    {
        $gst->delete();
        $message = trans('messages.success.deleted', ['type' => trans_choice('general.gsts', 1)]);

            flash($message)->success();
         return redirect('taxes/gst');
    }
    public function insert( $rate, $cgst, $sgst, $ugst,$igst, $description)
{
$gst=gsts::create(["rate"=>$rate,"cgst"=>$cgst,"sgst"=>$sgst,"ugst"=>$ugst,"igst"=>$igst,"description"=>$description]);
       return redirect("/taxes/gst");
    }
}
