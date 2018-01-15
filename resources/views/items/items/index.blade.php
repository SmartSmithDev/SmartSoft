@extends('layouts.admin')

@section('title', 'Items')

@section('content')

@section('new_button')

<span class="new-button"><a href="{{ url('items/create') }}" class="btn btn-success btn-sm"><span class="fa fa-plus"></span> &nbsp;{{ trans('general.add_new') }}</a></span>

@endsection

    <div class="box-body">
       
        <table class="table table-striped table-hover" id="tbl-items">
            <thead>
                <tr>
                    <th class="col-md-1">@sortablelink('sku', trans('items.sku'))</th>
                    <th class="col-md-1">@sortablelink('name', trans('items.name'))</th>
                    <th class="col-md-1">@sortablelink('type', trans('items.items_type'))</th>
                    <th class="col-md-1">@sortablelink('hsn', trans('general.hsn'))</th>
                    <th class="col-md-1 text-center">Details</th>
                    <th class="col-md-1 text-center">actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td class="col-md-1">{{ $item->sku }}</td>
                        <td class="col-md-1">{{ $item->name }}</td>
                        <td class="col-md-1">{{ $item->type }}</td>
                        <td class="col-md-1">{{ $item->hsn }}</td>
                        <td class="col-md-1">{{ $item->details }}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" data-toggle-position="left" aria-expanded="false">
                                        <i class="fa fa-ellipsis-h"></i>
                                </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="{{ url('items/' . $item->id . '/edit') }}">{{ 'Edit' }}</a></li>
                                        <li>{!! Form::deleteLink($item, '/items') !!}</li>
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
    button[title="Delete"]  {
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


</style>