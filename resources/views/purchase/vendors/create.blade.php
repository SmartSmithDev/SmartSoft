@extends('layouts.admin')

@section('title', 'Create Vendor')

@section('content')
    <ul class="nav nav-tabs">
        <li class="active"><a href="#">Vendors</a></li>
        <li><a href="#">Vendor Accounts</a></li>
    </ul>
      {!! Form::open(['action' => 'Purchases\Vendors@store']) !!}
    <!-- Default box -->
       <div class="box-footer">
            {{ Form::saveButtons('vendors') }}
        </div>
        <div class="box box-success parts" id="vendors">
          



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

        <!-- /.box-footer -->




    </div>

    <div id="vendor-accounts" class="parts" style="display: none">
        <br>
        <span class="new-button"><a href="#vendorAccountModal" class="btn btn-success btn-sm"  data-toggle="modal"><span class="fa fa-plus"></span> &nbsp;{{ trans('general.add_new') }}</a></span>
        <table class="table table-striped table-hover" id="tbl-items">
            <thead>
                <tr>
                    <th class="col-md-1">Beneficiary Name</th>
                    <th class="col-md-1">Account Number</th>
                    <th class="col-md-1">Beneficiary Address</th>
                    <th class="col-md-1">Beneficiary Bank</th>
                    <th class="col-md-1">Bank Address</th>
                    <th class="col-md-1">IFSC Code</th> 
                    <th class="col-md-1">Bank Code</th> 
                    <th class="col-md-1">Branch Code</th>
                    <th class="col-md-1">Account Type</th>                 
                    <th class="col-md-1 text-center">actions</th>
                </tr>
            </thead>

            <tbody>
                   
                    
            </tbody>
        </table>
    </div>


    {!! Form::close() !!}

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

                    {{ Form::textGroup('ifsc_Code', 'Ifsc Code') }}

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
    <script type="text/javascript">
        var accountRow=0;
        var tabno=0;
        $(document).ready(function(){
            $('.nav-tabs').on('click','li',function(){
                $(this).addClass('active');
                $('.parts').eq(tabno).css({display:"none"});
                $('.nav-tabs li').eq(tabno).removeClass('active');
                tabno=$(this).index();
                $('.parts').eq(tabno).css({display:"block"});
            });
            $('#account_save').click(function(event){
            event.preventDefault(); 
            var beneficiary_name=$('#beneficiary_name').val();
            var account_number=$('#account_number').val();
            var beneficiary_address=$('#beneficiary_address').val();
            var beneficiary_bank=$('#beneficiary_bank').val();
            var beneficiary_bank_address=$('#beneficiary_bank_address').val();
            var ifsc_Code=$('#ifsc_Code').val();
            var bank_code=$('#bank_code').val();
            var branch_code=$('#branch_code').val();
            var account_type=$('#account_type').val();
           
            var htmlAccountRow=$('#vendor-accounts tbody').append('<tr id="account-row-'+accountRow+'"><td id="col-md-1 hidden"><span>'+beneficiary_name+'<input type="hidden" name="accounts['+accountRow+'][beneficiary_name]" value="'+beneficiary_name+'" /></span></td><td id="col-md-1 hidden"><span>'+account_number+'<input type="hidden" name="accounts['+accountRow+'][account_number]" value="'+account_number+'" /></span></td><td id="col-md-1 hidden"><span>'+beneficiary_address+'<input type="hidden" name="accounts['+accountRow+'][beneficiary_address]" value="'+beneficiary_address+'" /></span></td><td id="col-md-1 hidden"><span>'+beneficiary_bank+'<input type="hidden" name="accounts['+accountRow+'][beneficiary_bank]" value="'+beneficiary_bank+'" /></span></td><td id="col-md-1 hidden"><span>'+beneficiary_bank_address+'<input type="hidden" name="accounts['+accountRow+'][beneficiary_bank_address]" value="'+beneficiary_bank_address+'" /></span></td><td id="col-md-1 hidden"><span>'+ifsc_Code+'<input type="hidden" name="accounts['+accountRow+'][ifsc_code]" value="'+ifsc_Code+'" /></span></td><td id="col-md-1 hidden"><span>'+bank_code+'<input type="hidden" name="accounts['+accountRow+'][bank_code]" value="'+bank_code+'" /></span></td><td id="col-md-1 hidden"><span>'+branch_code+'<input type="hidden" name="accounts['+accountRow+'][branch_code]" value="'+branch_code+'" /></span></td><td id="col-md-1 hidden"><span>'+account_type+'<input type="hidden" name="accounts['+accountRow+'][account_type]" value="'+account_type+'" /></span></td><td class="text-center"><div class="btn-group"><button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" data-toggle-position="left" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></button><ul class="dropdown-menu dropdown-menu-right"><li><a href="#" class="account-edit" >{{ "Edit" }}</a></li><li><button class="delete-link" title="Delete" onclick="$(this).parent().parent().parent().parent().parent().remove();">Delete</button></li></ul></div></td></tr>');
            console.log(htmlAccountRow[0]);
            accountRow++;
            $('#vendorAccountModal').modal('hide');
            $('#vendorAccountModal input').val("");
        });
        });
    </script>
@endsection