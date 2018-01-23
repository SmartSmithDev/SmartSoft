@extends('layouts.admin')

@section('title', trans('general.title.edit', ['type' => trans_choice('general.items', 1)]))

@section('content')
<!-- Default box -->
<div class="box box-success">
    {!! Form::model($item, [
        'method' => 'PATCH',
        'files' => true,
        'url' => ['items/items', $item->id],
        'role' => 'form'
    ]) !!}

    <div class="box-body">
        {{ Form::textGroup('name', 'Item Name' , 'id-card-o') }}

        {{ Form::textGroup('sku', 'Item SKU' , 'key') }}

        {{ Form::selectGroup('hsn', 'HSN Code' , 'barcode', $hsn, null , []) }}

        {{ Form::selectGroup('unit_id', 'Unit' , 'balance-scale', $units, null, []) }}

        {{ Form::itemTypeGroup('type', 'Item Type' ) }}

        {{ Form::textareaGroup('details', 'Item Details') }}

    </div>
    <!-- /.box-body -->

    <div class="box-footer">
        {{ Form::saveButtons('items/items') }}
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

@section('scripts')
    <script type="text/javascript">
        var text_yes = '{{ trans('general.goods') }}';
        var text_no = '{{ trans('general.service') }}';

        $(document).ready(function(){
            $('#type_0').trigger('click');

            $('#name').focus();

            $("#unit_id").select2({
                placeholder: "{{ trans('general.form.select.field', ['field' => trans_choice('general.unit' , 2)]) }}"
            });

            $("#hsn_id").select2({
                placeholder: "{{ trans('general.form.select.field', ['field' => trans('general.hsn')]) }}"
            });

        });


    </script>
@endsection
