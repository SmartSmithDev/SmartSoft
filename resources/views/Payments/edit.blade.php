@extends('layouts.admin')

@section('title', trans('general.title.edit', ['type' => trans_choice('general.Payments', 1)]))

@section('content')
 <h1>{{ __('Edit payments') }}</h1>

    {!! Form::open([
        'method' => 'PATCH',
        'files' => true,
      'url' => ['purchases/payments'],
        'role' => 'form'
    ]) !!}

 
    @include('Payments.form', ['submitButtonText' =>  __('Update payments')])

    {!! Form::close() !!}

@stop
