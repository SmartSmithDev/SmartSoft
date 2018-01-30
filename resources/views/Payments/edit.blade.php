@extends('layouts.admin')

@section('title', trans('general.title.edit', ['type' => trans_choice('general.Payments', 1)]))

@section('content')
 <h1>{{ __('Edit payments') }}</h1>

  {!! Form::open(array('url' => 'purchases/payments/'.$SalesPayment->id,'method'=>'PUT')) !!} 
  <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save"></i>Save</button>&nbsp;
<a href="{{ url('/purchases/payments') }}" class="btn btn-default"><i class="fa fa-times-circle"></i>Cancel</a>
    <div class="box-body">
<div class="form-group">
    {!! Form::label('id', __('id'), ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('sales_id', __('sales_id'), ['class' => 'control-label']) !!}
    {!! Form::text('sales_id', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('company_account_id', __('company_account_id'), ['class' => 'control-label']) !!}
    {!! Form::text('company_account_id',  null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('customer_account_id', __('customer_account_id'), ['class' => 'control-label']) !!}
     {!! Form::text('customer_account_id',  null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('payment_reference', __('payment_reference'), ['class' => 'control-label']) !!}
    {!! Form::text('payment_reference',  null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('payment_notes', __('payment_notes'), ['class' => 'control-label']) !!}
     {!! Form::text('payment_notes',  null, ['class' => 'form-control']) !!}
</div>




           
  </div>
   

    <div class="box-footer">
        {{ Form::saveButtons('index') }}
    </div>
   
    {!! Form::close() !!}

</div>




@section('js')
    <script src="{{ asset('js/bootstrap-fancyfile.js') }}"></script>
    
    <link rel="stylesheet" href="{{ asset('dist/css/select2.min.css') }}">
    <script src="{{ asset('dist/js/select2.full.min.js') }}"></script>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-fancyfile.css') }}">
@endsection



@stop
