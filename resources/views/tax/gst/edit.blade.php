@extends('layouts.admin')

@section('title', 'GST')

@section('content')

<div class="box box-success">
    {!! Form::open(array('url' => 'taxes/gst/' .$gst->id ,'method'=>'PUT')) !!} 
    
    <div class="box-body">
        {{ Form::textGroup('rate', 'rate' , 'id-card-o') }}

        {{ Form::textGroup('cgst', 'cgst' ) }}

        {{ Form::textGroup('sgst', 'sgst' ) }}

        {{ Form::textGroup('ugst', 'ugst' ) }}

        {{ Form::textGroup('igst', 'igst' ) }}

        {{ Form::textareaGroup('description', 'description') }}

    </div>
   

    <div class="box-footer">
        {{ Form::saveButtons('tax/gst') }}
    </div>
   
    {!! Form::close() !!}

</div>
@endsection


@section('js')
    <script src="{{ asset('js/bootstrap-fancyfile.js') }}"></script>
  
    <link rel="stylesheet" href="{{ asset('dist/css/select2.min.css') }}">
    <script src="{{ asset('dist/js/select2.full.min.js') }}"></script>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-fancyfile.css') }}">
@endsection

