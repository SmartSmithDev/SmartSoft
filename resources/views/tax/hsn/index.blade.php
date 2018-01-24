@extends('layouts.admin')

@section('content')
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

<div class="box-body">
        <div class="table table-responsive">
            <table class="table table-striped table-hover" data-role="table" data-mode="columntoggle" class="ui-responsive" id="myTable">
      <thead>
        <tr>
       
          <th class="col-md-1 text-center">@sortablelink('hsn', 'Hsn')</th>
    <th class="col-md-1 text-center" data-priority="1">@sortablelink('hsn->item_type', 'Item type')</th>
          <th class="col-md-1 text-center" data-priority="2">@sortablelink('hsn->description', 'Hsn Description')</th>
          <th class="col-md-1 text-center" data-priority="3">@sortablelink('gst_rate', 'Gst Rate')</th>
          <th class="col-md-1 text-center" data-priority="4">@sortablelink('gst_d','Gst Description')</th>
          <th class="col-md-1 text-center" data-priority="5">@sortablelink('cess_rate', 'Cess Rate')</th>
          <th class="col-md-1 text-center" data-priority="6">@sortablelink('cess_d', 'Cess Description')</th>
          
        
        </tr>
      </thead>
            	
              
<tbody>
                   @foreach($hsns as $Hsn)
                        <tr>
                            <td class="col-md-1 text-center">{{ $Hsn->hsn}}</td>
                            <td class="col-md-1 text-center">{{ $Hsn->item}}</td>
                            <td class="col-md-1 text-center">{{ $Hsn->hsn_d }}</td>
                            <td class="col-md-1 text-center">{{ $Hsn->gst_rate}}</td>
                            <td class="col-md-1 text-center">{{ $Hsn->gst_d}}</td>
                            <td class="col-md-1 text-center">{{ $Hsn->cess_rate}}</td>
                            <td class="col-md-1 text-center">{{ $Hsn->cess_d}}</td>
                           
                            </tr>
                    @endforeach


                
                </tbody>
            </table>
        </div>
    </div>



 



@endsection