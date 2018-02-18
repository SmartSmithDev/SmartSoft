@extends('layouts.admin')

@section('title','Gst')

@section('content')

@section('new_button')
<span class="new-button"><a href="{{url('gst/create')}}" class="btn btn-success btn-sm"><span class="fa fa-plus"></span> &nbsp;{{ trans('general.add_new') }}</a></span>
@endsection

    <div class="box-body">
        
      <table class="table table-striped table-hover" id="tbl-gst">
        <thead>
          <tr>
            <th class="col-md-2">@sortablelink('rate', 'rate')</th>
            <th class="col-md-2">@sortablelink('cgst', 'cgst')</th>
            <th class="col-md-2">@sortablelink('sgst', 'sgst')</th>
            <th class="col-md-2">@sortablelink('ugst', 'ugst')</th>
            <th class="col-md-2">@sortablelink('igst', 'igst')</th>
            <th class="col-md-2">@sortablelink('description','description')</th>
            <th class="col-md-1 text-center">{{ trans('general.actions') }}</th>
          </tr>
        </thead>

        <tbody>
          @foreach($gsts as $gst)

            <tr>
              <td class="col-md-2">{{ $gst->rate}}</td>
              <td class="col-md-2">{{ $gst->cgst}}</td>
              <td class="col-md-2">{{ $gst->sgst}}</td>
              <td class="col-md-2">{{ $gst->ugst}}</td>
              <td class="col-md-2">{{ $gst->igst}}</td>
              <td class="col-md-2">{{ $gst->description}}</td>
              <td class="text-center">
              <div class="btn-group">
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" data-toggle-position="left" aria-expanded="false">
                    <i class="fa fa-ellipsis-h"></i>
                  </button>

                  <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="{{ url('taxes/gst/' . $gst->id . '/edit') }}">{{ 'Edit' }}</a></li>
                    
                    <li>{!! Form::deleteLink($gst, '/gst') !!}</li>
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