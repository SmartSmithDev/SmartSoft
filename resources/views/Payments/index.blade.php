@extends('layouts.admin')
@section('title','All payments')


@section('content')

    

<div class="box-body">
  <div class="table table-responsive" style="overflow-y: hidden">
    <table class="table table-striped table-hover"  class="ui-responsive" id="myTable">
      <thead>
        <tr>
 <th class="col-md-1 text-center" >@sortablelink('id', 'Id')</th>
       <th class="col-md-1 text-center" >@sortablelink('payment_date', 'Payment date')</th>
          <th class="col-md-1 text-center" >@sortablelink('Payment_mode', 'Payment mode')</th>
          <th class="col-md-1 text-center" >@sortablelink('payment_terms', 'Payment term')</th>
          <th class="col-md-1 text-center" >@sortablelink('payment_type', 'Payment Mode')</th>
           <th class="col-md-1 text-center" >@sortablelink('company_account_id', 'company account id')</th>
          <th class="col-md-1 text-center" >@sortablelink('customer_account_id', 'customer id')</th>
          <th class="col-md-1 text-center">@sortablelink('payment_reference', 'References')</th>
          <th class="col-md-1 text-center">@sortablelink('payment_notes', 'Notess')</th>
             <th class="col-md-1 text-center">{{ trans('general.actions') }}</th>
         
</tr>
    </thead>
       <tbody id = "table">
      @foreach($d as $Sale)
        <tr>
          <td class="col-md-1 text-center">{{ $Sale->id }}</td>
          <td class="col-md-1 text-center">{{ $Sale->payment_date }}</td>
          <td class="col-md-1 text-center">{{ $Sale->payment_mode }}</td>
          <td class="col-md-1 text-center">{{ $Sale->payment_terms}}</td>
          <td class="col-md-1 text-center">{{ $Sale->payment_type}}</td>
        <td class="col-md-1 text-center">{{ $Sale->company_account_id}}</td>
          <td class="col-md-1 text-center">{{ $Sale->customer_account_id}}</td>
          <td class="col-md-1 text-center">{{ $Sale->payment_reference}}</td>
          <td class="col-md-1 text-center">{{ $Sale->payment_notes}}</td>
           <td class="text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" data-toggle-position="left" aria-expanded="false">
                                        <i class="fa fa-ellipsis-h"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="{{ url('purchases/payments/' . $Sale->id . '/edit') }}">{{ 'Edit' }}</a></li>
                                       
                                    </ul>
                                </div>
                            </td>
        
          
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
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
     
  