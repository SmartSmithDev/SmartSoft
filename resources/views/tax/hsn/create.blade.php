@extends('layouts.admin')

@section('title', 'Create Hsn')

@section('content')
<!-- Default box -->
<div class="box box-success">
    {!! Form::open(['action' => 'Taxes\Hsn@store']) !!}

    <div class="box-body">
     
        {{ Form::textGroup('hsn', 'HSN Code' , 'barcode') }}
        
        {{ Form::selectGroup('item_type','Item Type','id-card-o', $item_type) }}
        
        
        
        
        
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
        {{ Form::saveButtons('tax/hsn') }}
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


