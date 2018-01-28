@extends('layouts.admin')

@section('title', trans('general.title.edit', ['type' => trans_choice('general.vendors', 1)]))

@section('content')
<!-- Default box -->
<div class="box box-success">
    {!! Form::model($vendor, [
        'method' => 'PATCH',
        'files' => true,
        'url' => ['purchases/vendors', $vendor->id],
        'role' => 'form'
    ]) !!}

    <div class="box-body">
         {{ Form::textGroup('name', trans('general.name'), 'id-card-o') }}
            
            {{ Form::selectGroup('vendor_type', trans('general.vendor_type'),'id-card-o', $vendor_type) }}

            {{ Form::textGroup('gstin', 'GST No.', 'percent', []) }}
            
            {{ Form::textGroup('pan', 'PAN No.', 'id-badge', []) }}

            {{ Form::emailGroup('email_id', 'Email', 'envelope', []) }}

            {{ Form::textGroup('phone', 'Phone No.', 'phone', []) }}

            {{ Form::textareaGroup('address','Address') }}

            {{ Form::textGroup('city', 'City', 'home') }}

            {{ Form::selectGroup('state_id','State','home', $states) }}

            {{ Form::textGroup('country', 'Country', 'plane') }}

            {{ Form::textGroup('pin_code', 'Pin-Code', 'paperclip') }}

            {{ Form::textGroup('website', 'Website', 'globe',[]) }}

            {{ Form::selectGroup('business_type',trans('general.business_type'),'briefcase', $business_type) }}

    </div>
    <!-- /.box-body -->

    <div class="box-footer">
        {{ Form::saveButtons('purchases/vendors') }}
    </div>
    <!-- /.box-footer -->
    {!! Form::close() !!}

</div>
@endsection


@section('js')
    <script src="{{ asset('js/bootstrap-fancyfile.js') }}"></script>
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('dist/css/select2.min.css') }}">
    <script src="{{ asset('dist/js/select2.full.min.js') }}"></script>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-fancyfile.css') }}">
@endsection


