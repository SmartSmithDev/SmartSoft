@extends('layouts.admin')

@section('title', trans_choice('general.vendors',2))

@section('content')

@section('new_button')
<span class="new-button"><a href="{{url('purchases/vendors/create')}}" class="btn btn-success btn-sm"><span class="fa fa-plus"></span> &nbsp;{{ trans('general.add_new') }}</a></span>
@endsection

    <div class="box-body">
        
            <table class="table table-striped table-hover" id="tbl-vendors">
                <thead>
                    <tr>
                        <th class="col-md-3">@sortablelink('name', trans('general.name'))</th>
                        <th class="col-md-3 hidden-xs">@sortablelink('email', trans('general.email'))</th>
                        <th class="col-md-2">@sortablelink('phone', trans('general.phone'))</th>
                        <th class="col-md-2">@sortablelink('vendor_type', trans('general.vendor_type'))</th>
                        <th class="col-md-2">@sortablelink('business_type', trans('general.business_type'))</th>
                        <th class="col-md-1 text-center">{{ trans('general.actions') }}</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($vendors as $vendor)
                        <tr>
                            <td class="col-md-3">{{ $vendor->name }}</td>
                            <td class="col-md-3">{{ $vendor->email_id }}</td>
                            <td class="col-md-2">{{ $vendor->phone }}</td>
                            <td class="col-md-2">{{ $vendor->vendor_type }}</td>
                            <td class="col-md-2">{{ $vendor->business_type }}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" data-toggle-position="left" aria-expanded="false">
                                        <i class="fa fa-ellipsis-h"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                       <li><a href="{{ url('purchases/vendors/' . $vendor->id . '/edit') }}">{{ 'Edit' }}</a></li>
                                        
                                        <li>{!! Form::deleteLink($vendor, '/purchases/vendors') !!}</li>
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