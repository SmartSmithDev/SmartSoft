@extends('layouts.admin')

@section('title','Purchase Payments')

@section('content')

@section('new_button')
<span class="new-button"><a href="{{url('purchases/payments/create')}}" class="btn btn-success btn-sm"><span class="fa fa-plus"></span> &nbsp;{{ trans('general.add_new') }}</a></span>
@endsection

    <div class="box-body">
        
      <table class="table table-striped table-hover" id="tbl-hsn">
        <thead>
          <tr>
            <th class="col-md-1">@sortablelink('payment_date', 'Date')</th>
            <th class="col-md-1">@sortablelink('payment_mode', 'Payment Mode')</th>
            <th class="col-md-1">@sortablelink('paid_amount', 'Amount')</th>
            <th class="col-md-1">@sortablelink('payment_terms','Terms')</th>
            <th class="col-md-1">@sortablelink('payment_type', 'Type')</th>
            <th class="col-md-1">@sortablelink('company_account', 'Company Account')</th>
            <th class="col-md-1">@sortablelink('vendor_account', 'Vendor Account')</th>
            <th class="col-md-1">@sortablelink('ref', 'Reerence')</th>
            <th class="col-md-1">@sortablelink('notes', 'Notes')</th>
            <th class="col-md-1 text-center">{{ trans('general.actions') }}</th>
          </tr>
        </thead>

        <tbody>
          @foreach($payments as $payment)

            <tr>
              <td class="col-md-1">{{ $payment->payment_date}}</td>
              <td class="col-md-1">{{ $payment->payment_mode}}</td>
              <td class="col-md-1">{{ $payment->paid_amount }}</td>
              <td class="col-md-1">{{ $payment->payment_terms}}</td>
              <td class="col-md-1">{{ $payment->payment_type}}</td>
              <td class="col-md-1">{{ $payment->company->name}}</td>
              <td class="col-md-1">{{ $payments->vendor->name}}</td>
              <td class="col-md-1">{{ $payment->payment_reference}}</td>
              <td class="col-md-1">{{ $payment->payment_notes}}</td>
              <td class="text-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" data-toggle-position="left" aria-expanded="false">
                    <i class="fa fa-ellipsis-h"></i>
                  </button>

                  <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="{{ url('payment/' . $payment->id . '/edit') }}">{{ 'Edit' }}</a></li>
                    
                    <li>{!! Form::deleteLink($payments, '/payments') !!}</li>
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






























