@extends('layouts.admin')

@section('title','Hsn')

@section('content')

@section('new_button')
<span class="new-button"><a href="{{url('taxes/hsn/create')}}" class="btn btn-success btn-sm"><span class="fa fa-plus"></span> &nbsp;{{ trans('general.add_new') }}</a></span>
@endsection

    <div class="box-body">
        
      <table class="table table-striped table-hover" id="tbl-hsn">
        <thead>
          <tr>
            <th class="col-md-1">@sortablelink('hsn', 'Hsn')</th>
            <th class="col-md-1">@sortablelink('hsn->item_type', 'Item type')</th>
            <th class="col-md-1">@sortablelink('hsn->description', 'Hsn Description')</th>
            <th class="col-md-1">@sortablelink('gst_rate', 'Gst Rate')</th>
            <th class="col-md-1">@sortablelink('gst_d','Gst Description')</th>
            <th class="col-md-1">@sortablelink('cess_rate', 'Cess Rate')</th>
            <th class="col-md-1">@sortablelink('cess_d', 'Cess Description')</th>
            <th class="col-md-1 text-center">{{ trans('general.actions') }}</th>
          </tr>
        </thead>

        <tbody>
          @foreach($hsns as $Hsn)

            <tr>
              <td class="col-md-1">{{ $Hsn->hsn}}</td>
              <td class="col-md-1">{{ $Hsn->item}}</td>
              <td class="col-md-1">{{ $Hsn->hsn_d }}</td>
              <td class="col-md-1">{{ $Hsn->gst_rate}}</td>
              <td class="col-md-1">{{ $Hsn->gst_d}}</td>
              <td class="col-md-1">{{ $Hsn->cess_rate}}</td>
              <td class="col-md-1">{{ $Hsn->cess_d}}</td>
              <td class="text-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" data-toggle-position="left" aria-expanded="false">
                    <i class="fa fa-ellipsis-h"></i>
                  </button>

                  <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="{{ url('hsn/' . $Hsn->hsn . '/edit') }}">{{ 'Edit' }}</a></li>
                    
                    <li>{!! Form::deleteLink($Hsn, '/hsn') !!}</li>
                  </ul>
                </div>
              </td>
            </tr>
          @endforeach
                            
                    
        </tbody>
      </table>
        
    </div>

@endsection

@section('css')
<style type="text/css">
    button[title="Delete"]{
        border:none;
        background:none;
        width:100%;
        color:grey;
    }

    button[title="Delete"]:hover{
        background-color:#E1E3E9;
        color:black;
    }

    .dropdown-menu >li >a{
        text-align: center;
    }

    .dropdown-menu li{
        z-index: 50;
    }

    

</style>






























