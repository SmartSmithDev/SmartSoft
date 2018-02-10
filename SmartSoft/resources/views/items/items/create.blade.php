@extends('layouts.admin')

@section('title', 'Create Items')

@section('content')
    <!-- Default box -->
        <div class="box box-success">
            {!! Form::open(['action' => 'Items\Items@store']) !!}

            <div class="box-body">
                {{ Form::textGroup('name', 'Item Name' , 'id-card-o') }}

                {{ Form::textGroup('sku', 'Item SKU' , 'key') }}

                {{ Form::selectGroup('hsn', 'HSN Code' , 'barcode', $hsn, '00000000' , []) }}

                {{ Form::selectGroup('unit_id', 'Unit' , 'balance-scale', $units, '59', []) }}

                {{ Form::itemTypeGroup('type', 'Item Type' ) }}

                {{ Form::textareaGroup('details', 'Item Details') }}
                 
                 <div class="col-md-6">
                 <input type="checkbox" name="manage_inventory" value="1" />&nbsp;<label>Manage Inventory</label>
                     
                 </div>
                
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

            $("#hsn").select2({
                placeholder: "{{ trans('general.form.select.field', ['field' => trans('general.hsn')]) }}"
            });

        });


$(document).ready(function(){
$('.radio-inline label').removeClass('active');
$('.radio-inline').on('click','label',function(){
if($(this).attr('id')=="type_0"){
  $(this).css({"background-color":"#398439","color":"white"});
  $('#type_1').css({"background-color":"#E7E7E7","color":"black"});
}
else{
$(this).css({"background-color":"#3C8DBC","color":"white"});
  $('#type_0').css({"background-color":"#E7E7E7","color":"black"});
}
});
});

    </script>
@endsection
