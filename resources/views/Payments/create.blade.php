@extends('layouts.admin')

@section('title', trans('general.title.new', ['type' => trans_choice('general.payments', 1)]))

@section('content')
    <!-- Default box -->
    <div class="box box-success">
        {!! Form::open(['url' => '/purchases/payments','role' => 'form']) !!}

        <div class="box-body">
            {{ Form::selectGroup('sales_id','Sales','home', $sales) }}
            {{ Form::textGroup('payment_date', 'Payment Date', 'calendar',['id' => 'payment_date', 'class' => 'form-control datepicker', 'required' => 'required', 'data-inputmask' => '\'alias\': \'yyyy/mm/dd\'', 'data-mask' => ''], null) }}
            {{ Form::selectGroup('payment_mode','Payment Mode','home', $payment_mode) }}
            {{ Form::textGroup('paid_amount', 'Paid Amount', '') }}
            {{ Form::selectGroup('payment_type','Payment Type','home', $payment_type) }}
            {{ Form::selectGroup('customer_account_id','Customer Account','home', $customer_accounts) }}
            {{ Form::textGroup('payment_reference', 'Payment Reference', '') }}
            {{ Form::textGroup('payment_terms', 'Payment Terms', '') }}
            {{ Form::textareaGroup('payment_notes', 'Payment Notes', '') }}

           
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            {{ Form::saveButtons('/purchases/payments') }}
        </div>
        <!-- /.box-footer -->

        {!! Form::close() !!}
    </div>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{ asset('js/bootstrap-fancyfile.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  
 
  <script>
  $(document).ready(function(){
    $('.datepicker').datepicker({
                dateFormat: 'yy-mm-dd',
                autoclose: true
            });
});
  </script>

@endsection


@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-fancyfile.css') }}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

@endsection

@section('scripts')

<script type="text/javascript">
    $(document).ready(function){
        $('#sale_id').onchange(function(){
             $.ajax({
                            url: "{{ url('/payment_accounts') }}",
                            type: 'GET',
                            dataType: 'JSON',
                            data: 'id='+$('#sale_id').val(),
                            success: function(data) {
                                data=JSON.parse(data);
                                var sale_select=$('#sale_id');
                                for(var key in data){
                                    sale_select.append('<option value='+key'>'+data.key+'</option>');
                                }
                                console.log(data);

                            }
                        });

        });
     
    }
</script>
@endsection