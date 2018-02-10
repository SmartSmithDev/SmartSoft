@extends('layouts.admin')

<?php
$accountrow=0;

 ?>

@section('content')

  <ul class="nav nav-tabs">
    <li class="active"><a href="#">vendor</a></li>
    <li><a href="#">vendor Accounts</a></li>

   
  </ul>
  <br>
  {!! Form::open(array('url' => '/purchases/vendors')) !!}  
<button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save"></i>Save</button>&nbsp;
<a href="{{ url('/purchases/vendors/') }}" class="btn btn-default"><i class="fa fa-times-circle"></i>Cancel</a>
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
                        
                        <th class="col-md-1 text-center">action</th>     
                    </tr>
                </thead>
                <tbody>
                
                   @foreach($vendor_accounts as $account)

                  <tr>
          <td class="col-md-1 text-center">{{$account->beneficiary_name }}</td>
          <td class="col-md-1 text-center">{{ $account->account_number }}</td>
          <td class="col-md-1 text-center">{{ $account->beneficiary_address }}</td>
          <td class="col-md-1 text-center">{{ $account->payment_terms}}</td>
          <td class="col-md-1 text-center"><div class="btn-group"><button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" data-toggle-position="left" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></button><ul class="dropdown-menu dropdown-menu-right"><li><a href="#" class="account-edit">Edit</a></li><li><button class="delete-link" title="Delete" onclick="$(this).parent().parent().parent().parent().parent().remove();">Delete</button></li></ul></div></td>
        </tr>
       @endforeach
                 
                </tbody>
            </table>

  </div>

   {!! Form::close() !!}

<!-- Modal -->
<div id="accountModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
      <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New vendor  Account</h4>
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

@section('scripts')
    <script type="text/javascript">
    var tabno=0;
    var accountrow=0;
    var branch_row=0;
     var branch_edit_row=-1;
        var account_edit_row=-1;
        var text_yes = '{{ trans('general.goods') }}';
        var text_no = '{{ trans('general.service') }}';

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
var beneficiary_name=$('#beneficiary_name').val();
var account_number=$('#account_number').val();
var beneficiary_address=$('#beneficiary_address').val();
var beneficiary_bank=$('#beneficiary_bank').val();
var htmlaccountRow=$('#vendor-accounts tbody').append('<tr id="account-row-'+accountrow+'"><td class="col-md-1 hidden"><span>'+ beneficiary_name+'<input type="hidden" name="accounts['+accountrow+'][ beneficiary_name]" value='+ beneficiary_name+'></span></td><td class="col-md-1"><span>'+account_number+'<input type="hidden" name="accounts['+accountrow+'][account_number]" value='+account_number+'></span></td><td class="col-md-1"><span>'+beneficiary_address+'<input type="hidden" name="accounts['+accountrow+'][beneficiary_address]" value='+beneficiary_address+'></span></td><td class="col-md-1"><span>'+beneficiary_bank+'<input type="hidden" name="accounts['+accountrow+'][beneficiary_bank]" value='+beneficiary_bank+'></span></td><td class="text-center"><div class="btn-group"><button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" data-toggle-position="left" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></button><ul class="dropdown-menu dropdown-menu-right"><li><a href="#" class="account-edit" >{{ "Edit" }}</a></li><li><button class="delete-link" title="Delete" onclick="$(this).parent().parent().parent().parent().parent().remove();">Delete</button></li></ul></div></td></tr>');

accountrow++;
if(account_edit_row>-1){
 $('#account-row-'+account_edit_row).remove();
}

$('#accountModal').modal('hide');
$('#accountModal input').val("");
});


$('#accountModal').on('hidden.bs.modal',function(){
$('#accountModal input,#accountModal select,#accountModal textarea').val("");
account_edit_row=-1;

});

$('#vendor-accounts tbody').on('click','.account-edit',function(){
 var row=$(this).parent().parent().parent().parent().parent();
  console.log(row);
   account_edit_row=row;
var len=account_edit_row.children().length;
console.log(len);
for(var i=0;i<len;i++){
  var value=account_edit_row.children().eq(i).children().children().val();
  $('#accountModal .form-control').eq(i).val(value);
}  
$('#accountModal').modal('show');
});


});
 </script>

@endsection
