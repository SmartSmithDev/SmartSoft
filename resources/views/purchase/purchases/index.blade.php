@extends('layouts.admin')

@section('title','Purchases')

@section('content')

@section('new_button')
<span class="new-button"><a href="{{url('purchases/purchases/create')}}" class="btn btn-success btn-sm"><span class="fa fa-plus"></span> &nbsp;{{ trans('general.add_new') }}</a></span>
@endsection

    <div class="box-body">
        
            <table class="table table-striped table-hover" id="tbl-sales">
                <thead>
                    <tr>
                        <th class="col-md-2">@sortablelink('id','Id')</th>
                        <th class="col-md-2 hidden-xs">@sortablelink('company','Company')</th>
                        <th class="col-md-2">@sortablelink('invoice_number','Invoice Number')</th>
                        <th class="col-md-2">@sortablelink('invoice_date','Invoice Date')</th>
                        
                        <th class="col-md-2">@sortablelink('customer', 'Customer')</th>
                        <th class="col-md-1 text-center">{{ trans('general.actions') }}</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($purchases as $purchase)
                        <tr>
                            <td class="col-md-2">{{ $purchase->id }}</td>
                            <td class="col-md-2">{{ $purchase->company }}</td>
                            <td class="col-md-2">{{ $purchase->invoice_number }}</td>
                            <td class="col-md-2">{{ $purchase->invoice_date }}</td>
                           
                            <td class="col-md-2">{{ $purchase->customer }}</td>
                            <td class="text-center col-md-1">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" data-toggle-position="left" aria-expanded="false">
                                        <i class="fa fa-ellipsis-h"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                       <li><a href="{{ url('purchases/purchases/' . $purchase->id . '/edit') }}">{{ 'Edit' }}</a></li>
                                        <!-- <li><a href="{{  url('download/'.$purchase->id)  }}">{{ 'Download Invoice' }}</a></li> -->
                                        <li>{!! Form::deleteLink($purchase, 'purchases/purchases') !!}</li>
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
@endsection