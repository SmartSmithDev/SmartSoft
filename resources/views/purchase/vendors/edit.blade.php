@extends('layouts.admin')

@section('title', trans('general.title.edit', ['type' => trans_choice('general.vendors', 1)]))
<?php 
    $accountRow=0;
?>

@section('content')
<!-- Default box -->

<ul class="nav nav-tabs">
        <li class="active"><a href="#">Vendors</a></li>
        <li><a href="#">Vendor Accounts</a></li>
</ul>
<br>
<br>
<div class="box box-success">
    {!! Form::model($vendor, [
        'method' => 'PATCH',
        'files' => true,
        'url' => ['purchases/vendors', $vendor->id],
        'role' => 'form'
    ]) !!}

    <div class="box-body parts">
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


    <div class="box-body parts" id="vendor_accounts">
        
            <table class="table table-striped table-hover" id="tbl-vendors_accounts">
                <thead>
                    <tr>
                        <th class="col-md-3">@sortablelink('beneficiary_name', trans('general.beneficiary_name'))</th>
                        <th class="col-md-3 hidden-xs">@sortablelink('account_number', trans('general.account_number'))</th>
                        <th class="col-md-2">@sortablelink('address', trans('general.address'))</th>
                        <th class="col-md-2">@sortablelink('beneficiary_bank', trans('general.beneficiary_bank'))</th>
                    </tr>
                </thead>

                <tbody>
                    <?php 
                        foreach ($vendorAccounts as $vendorAccount) {
                            echo '<tr id="account-row-'.$accountRow.'"><td class="col-md-3"><span>'.$vendorAccount->beneficiary_name.'<input type="hidden" name="accounts['.$accountRow.'][beneficiary_name]" value="'.$vendorAccount->beneficiary_name.'" /></span><td class="col-md-3"><span>'.$vendorAccount->account_number.'<input type="hidden" name="accounts['.$accountRow.'][account_number]" value="'.$vendorAccount->account_number.'" /></span></td><td class="col-md-2"><span>'.$vendorAccount->beneficiary_address.'<input type="hidden" name="accounts['.$accountRow.'][beneficiary_address]" value="'.$vendorAccount->beneficiary_address.'" /></span></td><td class="col-md-2"><span>'.$vendorAccount->beneficiary_bank.'<input type="hidden" name="accounts['.$accountRow.'][beneficiary_bank]" value="'.$vendorAccount->beneficiary_bank.'" /></span></td><td class="col-md-1 hidden"><span>'.$vendorAccount->beneficiary_bank_address.'<input type="hidden" name="accounts['.$accountRow.'][beneficiary_bank_address]" value="'.$vendorAccount->beneficiary_bank_address.'" /></span></td><td class="col-md-1 hidden"><span>'.$vendorAccount->ifsc_code.'<input type="hidden" name="accounts['.$accountRow.'][ifsc_code]" value="'.$vendorAccount->ifsc_code.'" /></span></td><td class="col-md-1 hidden"><span>'.$vendorAccount->bank_code.'<input type="hidden" name="accounts['.$accountRow.'][bank_code]" value="'.$vendorAccount->bank_code.'" /></span></td><td class="col-md-1 hidden"><span>'.$vendorAccount->branch_code.'<input type="hidden" name="accounts['.$accountRow.'][branch_code]" value="'.$vendorAccount->branch_code.'" /></span></td><td class="col-md-1 hidden"><span>'.$vendorAccount->account_type.'<input type="hidden" name="accounts['.$accountRow.'][account_type]" value="'.$vendorAccount->account_type.'" /></span></td><td class="text-center"><div class="btn-group"><button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" data-toggle-position="left" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></button><ul class="dropdown-menu dropdown-menu-right"><li><a href="#" class="account-edit" >Edit</a></li><li><button class="delete-link" title="Delete" onclick="$(this).parent().parent().parent().parent().parent().remove();">Delete</button></li></ul></div></td></tr>';
                            $accountRow++;
                        }
                    ?>
                </tbody>
            </table>
        
    </div>

    <div class="box-footer">
        {{ Form::saveButtons('purchases/vendors') }}
    </div>
    <!-- /.box-footer -->
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

</div>
@endsection


@section('js')
    <script src="{{ asset('js/bootstrap-fancyfile.js') }}"></script>
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('dist/css/select2.min.css') }}">
    <script src="{{ asset('dist/js/select2.full.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            var tabno=0;
            var accountRow='{{ $accountRow }}';
            var account_edit_row=-1;
            $('.nav-tabs').on('click','li',function(){
                $(this).addClass('active');
                $('.parts').eq(tabno).css({display:"none"});
                $('.nav-tabs li').eq(tabno).removeClass('active');
                tabno=$(this).index();
                $('.parts').eq(tabno).css({display:"block"});
            });

            $('#vendor_accounts tbody').on('click','.account-edit',function(){
            var row=$(this).parent().parent().parent().parent().parent();
            //console.log(row);
            account_edit_row=row.attr("id").split("-")[2];
            //console.log(account_edit_row);
            var len=row.children().length;
            //console.log(length);
            for(var i=0;i<len;i++){
                var value=row.children().eq(i).children().children().val();
                $('#vendorAccountModal input').eq(i).val(value);
            }
            $('#vendorAccountModal').modal('show');
        })
        });
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-fancyfile.css') }}">
    <style type="text/css">
    button[title="Delete"]{
        border:none;
        background:none;
        width:100%;
        color:grey;
    }
    button[title="Delete"]:hover{
        background-color:#E1E3E9;
        color:black;
    }
    .dropdown-menu >li >a{
        text-align: center;
    }
    .dropdown-menu li{
        z-index: 50;
    }
    #vendor_accounts {
        display: none;
    }
    .hidden {
        display: none;
    }
</style>
@endsection