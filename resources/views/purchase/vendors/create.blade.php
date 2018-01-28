@extends('layouts.admin')

@section('title', 'Create Vendor')

@section('content')
    <ul class="nav nav-tabs">
        <li class="active"><a href="#">Vendors</a></li>
        <li><a href="#">Vendor Accounts</a></li>
    </ul>
    <!-- Default box -->
        <div class="box box-success">
            {!! Form::open(['action' => 'Purchases\Vendors@store']) !!}

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
            {{ Form::saveButtons('vendors') }}
        </div>
        <!-- /.box-footer -->




        {!! Form::close() !!}
    </div>

    <div id="company-bank-accounts" class="parts">
        <br>
        <span class="new-button"><a href="#vendorAccountModal" class="btn btn-success btn-sm"  data-toggle="modal"><span class="fa fa-plus"></span> &nbsp;{{ trans('general.add_new') }}</a></span>
        <table class="table table-striped table-hover" id="tbl-items">
            <thead>
                <tr>
                    <th class="col-md-1 hidden">Account Identifier</th>
                    <th class="col-md-1 hidden">Entity Name</th>
                    <th class="col-md-1">Beneficiary Name</th>
                    <th class="col-md-1">Account Number</th>
                    <th class="col-md-1">Address</th>
                    <th class="col-md-1">Beneficiary Bank</th>                
                    <th class="col-md-1 text-center">actions</th>
                </tr>
            </thead>

            <tbody>
                   
                    
            </tbody>
        </table>
    </div>

    <div id="vendorAccountModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add New Vendor Account</h4>
                </div>
                <div class="modal-body" style="overflow-y: hidden">
         
                    {{ Form::textGroup('beneficiary_name', 'Beneficiary Name') }}

                    {{ Form::textGroup('account_number', 'Account Number') }}

                    {{ Form::textGroup('beneficiary_address', 'Beneficiary Address') }}

                    {{ Form::textGroup('beneficiary_bank', 'Beneficiary Bank') }}

                    {{ Form::textGroup('beneficiary_bank_address', 'Beneficiary Bank Address') }}

                    {{ Form::textGroup('ifsc_code', 'Ifsc Code') }}

                    {{ Form::textGroup('bank_code', 'Bank Code') }}

                    {{ Form::textGroup('branch_code', 'Branch Code') }}

                    {{ Form::textGroup('account_type', 'Account Type') }}
                </div>
                <div class="modal-footer">
                    <button  class="btn btn-success" id="account_save">Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">

        // $(document).ready(function(){
        //     $('#name').focus();
        // });
        var tabno=0;
    var accountrow=0;
    var branch_row=0;
     var branch_edit_row=-1;
        var account_edit_row=-1;
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
$(this).css({"background-color":"red","color":"white"});
  $('#type_0').css({"background-color":"#E7E7E7","color":"black"});
}
});

$('.nav-tabs').on('click','li',function(){

$(this).addClass('active');
$('.parts').eq(tabno).css({display:"none"});
$('.nav-tabs li').eq(tabno).removeClass('active');
tabno=$(this).index();
$('.parts').eq(tabno).css({display:"block"});


});

        $('#account_save').click(function(){
            alert("clicked");
            // var beneficiary_name=$('#beneficiary_name').val();
            // var account_number=$('#account_number').val();
            // var beneficiary_address=$('#beneficiary_address').val();
            // var beneficiary_bank_address=$('#beneficiary_bank_address').val();
            // var ifsc_code=$('#ifsc_code').val();
            // var bank_code=$('#bank_code').val();
            // var branch_code=$('#branch_code').val();
            // var account_type=$('#account_type').val();
            // alert("test");
        });
    </script>
@endsection
