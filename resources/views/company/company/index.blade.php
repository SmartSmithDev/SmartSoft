@extends('layouts.admin')

@section('title', 'Company')

@section('content')

@section('new_button')
<span class="new-button"><a href="{{ url('companies/companies/create') }}" class="btn btn-success btn-sm"><span class="fa fa-plus"></span> &nbsp;{{ trans('general.add_new') }}</a></span>
@endsection

    <div class="box-body">
       
            <table class="table table-striped table-hover" id="tbl-items">
                <thead>
                    <tr>
                        <th class="col-md-1">@sortablelink('id', 'ID')</th>
                        <th class="col-md-1">@sortablelink('name', 'Name')</th>
                        <th class="col-md-1">PAN</th>
                       
                        <th class="col-md-1 text-center">actions</th>
                    </tr>
                </thead>

                <tbody>
                   @foreach($companies as $company)
                        <tr>
                            <td class="col-md-1">{{ $company->id }}</td>
                            <td class="col-md-1">{{ $company->name }}</td>
                            <td class="col-md-1">{{ $company->pan }}</td>
                            
                            
                            <td class="text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" data-toggle-position="left" aria-expanded="false">
                                        <i class="fa fa-ellipsis-h"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="{{ url('companies/companies' . $company->id . '/edit') }}">{{ 'Edit' }}</a></li>
                                        <li>{!! Form::deleteLink($company, '/companies/companies') !!}</li>
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
/* below css for correcting delete button in actions list */
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


</style>