@extends('layouts.admin')

@section('title','Sales')

@section('content')

@section('new_button')
<span class="new-button"><a href="{{url('sales/sales/create')}}" class="btn btn-success btn-sm"><span class="fa fa-plus"></span> &nbsp;{{ trans('general.add_new') }}</a></span>
@endsection

    <div class="box-body">
        
            <table class="table table-striped table-hover" id="tbl-sales">
                <thead>
                    <tr>
                        <th class="col-md-2">@sortablelink('order_id','Order Id')</th>
                        <th class="col-md-2 hidden-xs">@sortablelink('company','Company')</th>
                        <th class="col-md-2">@sortablelink('invoice_number','Invoice Number')</th>
                        <th class="col-md-2">@sortablelink('invoice_date','Invoice Date')</th>
                        <th class="col-md-2">@sortablelink('order_date', 'Order Date')</th>
                        <th class="col-md-2">@sortablelink('customer', 'Customer')</th>
                        <th class="col-md-1 text-center">{{ trans('general.actions') }}</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($sales as $sale)
                        <tr>
                            <td class="col-md-2">{{ $sale->order_id }}</td>
                            <td class="col-md-2">{{ $sale->company }}</td>
                            <td class="col-md-2">{{ $sale->invoice_number }}</td>
                            <td class="col-md-2">{{ $sale->invoice_date }}</td>
                            <td class="col-md-2">{{ $sale->order_date }}</td>
                            <td class="col-md-2">{{ $sale->customer }}</td>
                            <td class="text-center col-md-1">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" data-toggle-position="left" aria-expanded="false">
                                        <i class="fa fa-ellipsis-h"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                       <li><a href="{{ url('sales/sales/' . $sale->id . '/edit') }}">{{ 'Edit' }}</a></li>
                                        <li><a href="{{  url('download/'.$sale->id)  }}">{{ 'Download Invoice' }}</a></li>
                                        <li>{!! Form::deleteLink($sale, 'sales/sales') !!}</li>
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