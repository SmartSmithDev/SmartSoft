
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
    {!! Form::label('payment_date', __('payment_date'), ['class' => 'control-label']) !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('Payment_mode', __('Payment_mode'), ['class' => 'control-label']) !!}
    {!! Form::text('Payment_mode',  null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('payment_terms', __('payment_terms'), ['class' => 'control-label']) !!}
    {!! Form::text('payment_terms',  null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('payment_type', __('payment_type'), ['class' => 'control-label']) !!}
    {!! Form::password('payment_type', ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('company_account_id', __('company_account_id'), ['class' => 'control-label']) !!}
    {!! Form::password('company_account_id', ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('customer_account_id', __('customer_account_id'), ['class' => 'control-label']) !!}
    {!! Form::password('customer_account_id', ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('payment_reference', __('payment_reference'), ['class' => 'control-label']) !!}
    {!! Form::password('payment_reference', ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('payment_notes', __('payment_notes'), ['class' => 'control-label']) !!}
    {!! Form::password('payment_notes', ['class' => 'form-control']) !!}
</div>


{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}

           
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


