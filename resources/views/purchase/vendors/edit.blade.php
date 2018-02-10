@extends('layouts.admin')

@section('title', trans('general.title.edit', ['type' => trans_choice('general.vendors', 1)]))

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
                    <p> Vendor acoounts</p>
                </tbody>
            </table>
        
    </div>

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
    <script type="text/javascript">
        $(document).ready(function(){
            alert("Clicked");
            var tabno=0;
            $('.nav-tabs').on('click','li',function(){
                $(this).addClass('active');
                $('.parts').eq(tabno).css({display:"none"});
                $('.nav-tabs li').eq(tabno).removeClass('active');
                tabno=$(this).index();
                $('.parts').eq(tabno).css({display:"block"});
            });
        })
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-fancyfile.css') }}">
@endsection