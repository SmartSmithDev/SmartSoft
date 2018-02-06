@extends('layouts.admin')


@section('content')

  <ul class="nav nav-tabs">
    <li class="active"><a href="#">vendor</a></li>
    <li><a href="#">vendor Accounts</a></li>

   
  </ul>
  <br>
 {!! Form::open(array('url' => '/purchases/vendors')) !!}  
<button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save"></i>Save</button>&nbsp;
<a href="{{ url('/purchases/vendors') }}" class="btn btn-default"><i class="fa fa-times-circle"></i>Cancel</a>
  <div id="vendors"  class="parts">
     <br>
  <br>
       {{ Form::textGroup('name', trans('general.name'), 'id-card-o') }}
            {{ Form::emailGroup('email_id', 'Email', 'envelope', []) }}

            {{ Form::textGroup('phone', 'phone', 'id-badge', []) }}
           {{ Form::textGroup('vendor_type', 'vendor_type', 'id-badge', []) }}
          {{ Form::textGroup('business_type', 'business_type', 'id-badge', []) }}

  </div>
  <div id="vendor-accounts" class="parts">
    <br>
    <span class="new-button"><a href="#accountModal" class="btn btn-success btn-sm"  data-toggle="modal"><span class="fa fa-plus"></span> &nbsp;{{ trans('general.add_new') }}</a></span>
     <table class="table table-striped table-hover" id="tbl-items">
                <thead>
                    <tr>
                        <th class="col-md-1 ">beneficiary_name</th>
                        <th class="col-md-1 ">account_number</th>
                         <th class="col-md-1">beneficiary_address</th>
                         <th class="col-md-1">beneficiary_bank</th>
                        <th class="col-md-1">action</th>         
                    </tr>
                </thead>
                <tbody>
                  
                </tbody>
            </table>
  
  </div>

   {!! Form::close() !!}

  
<div id="accountModal" class="modal fade" role="dialog">
  <div class="modal-dialog">


    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Account</h4>
      </div>
      <div class="modal-body" style="overflow-y: hidden">

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
         
          {{ Form::textGroup('beneficiary_name','beneficiary_name', 'beneficiary_name') }}
         {{ Form::textGroup('account_number','account_number', 'account_number') }}
        {{ Form::textGroup('beneficiary_address','beneficiary_address', 'beneficiary_address') }}
             {{ Form::textGroup('beneficiary_bank','beneficiary_bank', 'beneficiary_bank') }}
                            

         
      </div>
      <div class="modal-footer">
         <button  class="btn btn-success" id="account_save">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/bootstrap-fancyfile.js') }}"></script>
    
    <link rel="stylesheet" href="{{ asset('dist/css/select2.min.css') }}">
    <script src="{{ asset('dist/js/select2.full.min.js') }}"></script>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-fancyfile.css') }}">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <style type="text/css">
         #vendor-accounts{
            display:none;
         
         }

         th{
          color:#3C8DBC;
         }

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


     </style>
@endsection

            $('#account_save').click(function(event){
            event.preventDefault(); 
            var beneficiary_name=$('#beneficiary_name').val();
            var account_number=$('#account_number').val();
            var beneficiary_address=$('#beneficiary_address').val();
            var beneficiary_bank=$('#beneficiary_bank').val();
            var beneficiary_bank_address=$('#beneficiary_bank_address').val();
            var ifsc_code=$('#ifsc_code').val();
            var bank_code=$('#bank_code').val();
            var branch_code=$('#branch_code').val();
            var account_type=$('#account_type').val();
           
            var htmlAccountRow=$('#vendor-accounts tbody').append(
				'<tr id="account-row-'+accountRow+'"><td id="col-md-1 hidden"><span>'+beneficiary_name+'<input type="hidden" name="accounts['+accountRow+'][beneficiary_name]" value="'+beneficiary_name+'" /></span></td><td id="col-md-1 hidden"><span>'+beneficiary_name+'<input type="hidden" name="accounts['+accountRow+'][beneficiary_name]" value="'+beneficiary_name+'" /></span></td><td id="col-md-1 hidden"><span>'+account_number+'<input type="hidden" name="accounts['+accountRow+'][account_number]" value="'+account_number+'" /></span></td><td id="col-md-1 hidden"><span>'+beneficiary_address+'<input type="hidden" name="accounts['+accountRow+'][beneficiary_address]" value="'+beneficiary_address+'" /></span></td><td id="col-md-1 hidden"><span>'+beneficiary_bank+'<input type="hidden" name="accounts['+accountRow+'][beneficiary_bank]" value="'+beneficiary_bank+'" /></span></td><td id="col-md-1 hidden"><span>'+beneficiary_bank_address+'<input type="hidden" name="accounts['+accountRow+'][beneficiary_bank_address]" value="'+beneficiary_bank_address+'" /></span></td><td id="col-md-1 hidden"><span>'+ifsc_code+'<input type="hidden" name="accounts['+accountRow+'][ifsc_code]" value="'+ifsc_code+'" /></span></td><td id="col-md-1 hidden"><span>'+bank_code+'<input type="hidden" name="accounts['+accountRow+'][bank_code]" value="'+bank_code+'" /></span></td><td id="col-md-1 hidden"><span>'+branch_code+'<input type="hidden" name="accounts['+accountRow+'][branch_code]" value="'+branch_code+'" /></span></td><td id="col-md-1 hidden"><span>'+account_type+'<input type="hidden" name="accounts['+accountRow+'][account_type]" value="'+account_type+'" /></span></td><td class="text-center"><div class="btn-group"><button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" data-toggle-position="left" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></button><ul class="dropdown-menu dropdown-menu-right"><li><a href="#" class="account-edit" >{{ "Edit" }}</a></li><li><button class="delete-link" title="Delete" onclick="$(this).parent().parent().parent().parent().parent().remove();">Delete</button></li></ul></div></td></tr>');


			console.log(htmlAccountRow[0]);
            accountRow++;
            $('#vendorAccountModal').modal('hide');
            $('#vendorAccountModal input').val("");
        });
    </script>
@endsection
