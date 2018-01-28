@extends('layouts.admin')

@section('scripts')

<script type="text/javascript">
    console.log('lol2');
</script>
@endsection

@section('content')
    <ul class="nav nav-tabs">
        <li class="active"><a href="#">Vendors</a></li>
        <li><a href="#">Vendor Accounts</a></li>
    </ul>

@section('new_button')
<span class="new-button"><a href="{{url('purchases/vendors/create')}}" class="btn btn-success btn-sm"><span class="fa fa-plus"></span> &nbsp;{{ trans('general.add_new') }}</a></span>
@endsection

    <div class="box-body parts" id="vendors"> 
        
            <table class="table table-striped table-hover" id="tbl-vendors">
                <thead>
                    <tr>
                        <th class="col-md-3">@sortablelink('name', trans('general.name'))</th>
                        <th class="col-md-3 hidden-xs">@sortablelink('email', trans('general.email'))</th>
                        <th class="col-md-2">@sortablelink('phone', trans('general.phone'))</th>
                        <th class="col-md-2">@sortablelink('vendor_type', trans('general.vendor_type'))</th>
                        <th class="col-md-2">@sortablelink('business_type', trans('general.business_type'))</th>
                        <th class="col-md-1 text-center">{{ trans('general.actions') }}</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($vendors as $vendor)
                        <tr>
                            <td class="col-md-3">{{ $vendor->name }}</td>
                            <td class="col-md-3">{{ $vendor->email_id }}</td>
                            <td class="col-md-2">{{ $vendor->phone }}</td>
                            <td class="col-md-2">{{ $vendor->vendor_type }}</td>
                            <td class="col-md-2">{{ $vendor->business_type }}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" data-toggle-position="left" aria-expanded="false">
                                        <i class="fa fa-ellipsis-h"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                       <li><a href="{{ url('purchases/vendors/' . $vendor->id . '/edit') }}">{{ 'Edit' }}</a></li>
                                        
                                        <li>{!! Form::deleteLink($vendor, '/purchases/vendors') !!}</li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        
    </div>

    <div class="box-body parts" id="vendor_accounts">
        
            <table class="table table-striped table-hover" id="tbl-vendors_accounts">
                <thead>
                    <tr>
                        <th class="col-md-3">@sortablelink('beneficiary_name', trans('general.beneficiary_name'))</th>
                        <th class="col-md-3 hidden-xs">@sortablelink('account_number', trans('general.account_number'))</th>
                        <th class="col-md-2">@sortablelink('address', trans('general.address'))</th>
                        <th class="col-md-2">@sortablelink('beneficiary_bank', trans('general.beneficiary_bank'))</th>
                        <th class="col-md-1 text-center">{{ trans('general.actions') }}</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($vendorAccounts as $vendorAccount)
                        <tr>
                            <td class="col-md-3">{{ $vendorAccount->beneficiary_name }}</td>
                            <td class="col-md-3">{{ $vendorAccount->account_number }}</td>
                            <td class="col-md-2">{{ $vendorAccount->beneficiary_address }}</td>
                            <td class="col-md-2">{{ $vendorAccount->beneficiary_bank }}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" data-toggle-position="left" aria-expanded="false">
                                        <i class="fa fa-ellipsis-h"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                       <li><a href="{{ url('purchases/vendors/' . $vendorAccount->id . '/edit') }}">{{ 'Edit' }}</a></li>
                                        
                                        <li>{!! Form::deleteLink($vendor, '/purchases/vendors') !!}</li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        
    </div>



@endsection

@section('js')
    <script src="{{ asset('js/bootstrap-fancyfile.js') }}"></script>
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('dist/css/select2.min.css') }}">
    <script src="{{ asset('dist/js/select2.full.min.js') }}"></script>

     <script type="text/javascript" >
  console.log('lol');
        $(document).ready(function(){
            //alert("clicked");
            var tabno=0;
            $('.nav-tabs').on('click','li',function(){
                $(this).addClass('active');
                $('.parts').eq(tabno).css({display:"none"});
                $('.nav-tabs li').eq(tabno).removeClass('active');
                tabno=$(this).index();
                $('.parts').eq(tabno).css({display:"block"});
            });
        });
    </script>
@endsection

@section('css')
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
</style>
@endsection

