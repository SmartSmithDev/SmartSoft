@extends('layouts.admin')



@section('content')

  <ul class="nav nav-tabs">
    <li class="active"><a href="#">Company</a></li>
    <li><a href="#">Bank Accounts</a></li>
    <li><a href="#">Branches</a></li>
   
  </ul>
  <br>
  {!! Form::open(array('url' => '/company')) !!}  
<button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save"></i>Save</button>&nbsp;
<a href="{{ url('/company') }}" class="btn btn-default"><i class="fa fa-times-circle"></i>Cancel</a>
  <div id="company"  class="parts">
     <br>
  <br>
      {{ Form::textGroup('name', 'Company Name' , 'industry') }}
      {{ Form::textGroup('pan', 'PAN' , 'key') }}


      <div class="form-group col-md-6  ">
    <label for="type" class="control-label">Enabled</label>
    <div class="input-group">
        <div class="btn-group radio-inline" data-toggle="buttons">
            <label id="type_0" class="btn btn-default active">
                <input name="type" type="radio" value="yes" id="type">
                <span class="radiotext">Yes</span>
            </label>
            <label id="type_1" class="btn btn-default">
                <input name="type" type="radio" value="no" id="type">
                <span class="radiotext">No</span>
            </label>
        </div>
    </div>
    
</div>
  </div>
  <div id="company-bank-accounts" class="parts">
    <br>
    <span class="new-button"><a href="#accountModal" class="btn btn-success btn-sm"  data-toggle="modal"><span class="fa fa-plus"></span> &nbsp;{{ trans('general.add_new') }}</a></span>
     <table class="table table-striped table-hover" id="tbl-items">
                <thead>
                    <tr>
                        <th class="col-md-1 hidden">Account Identifier</th>
                        <th class="col-md-1 hidden">Entity Name</th>
                        <th class="col-md-1">Holder Name</th>
                         <th class="col-md-1">Bank Name</th>
                         <th class="col-md-1">Account Number</th>
                         <th class="col-md-1">Ifsc</th>
                         <th class="col-md-1 hidden">Notes</th>                
                        <th class="col-md-1 text-center">actions</th>
                    </tr>
                </thead>

                <tbody>
                   
                    
                </tbody>
            </table>
  
  </div>


  <div id="company-branches" class="parts">
    <br>
     <span class="new-button"><a href="#branchesModal" class="btn btn-success btn-sm"  data-toggle="modal"><span class="fa fa-plus"></span> &nbsp;{{ trans('general.add_new') }}</a></span>

      <table class="table table-striped table-hover" id="tbl-items">
                <thead>
                    <tr>
                         <th class="col-md-1 hidden">GstIn</th>
                        <th class="col-md-1">Branch Name</th>
                        <th class="col-md-1">Phone</th>
                        <th class="col-md-1">Email</th>
                        <th class="col-md-1">Address</th>
                        <th class="col-md-1">City</th>
                        <th class="col-md-1">State</th>
                        <th class="col-md-1 hidden">Country</th>
                        <th class="col-md-1 hidden">Pin Code</th>
                        <th class="col-md-1 text-center">actions</th>
                    </tr>
                </thead>

                <tbody>
                   
                       
                    
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
        <h4 class="modal-title">Add New Account</h4>
      </div>
      <div class="modal-body" style="overflow-y: hidden">
         
         {{ Form::textGroup('aci', 'Account Identifier' , 'industry') }}

         {{ Form::textGroup('en', 'Entity Name' , 'industry') }}

         {{ Form::textGroup('hn', 'Holder Name' , 'industry') }}

         {{ Form::textGroup('bn', 'Bank Name' , 'industry') }}

          {{ Form::textGroup('an', 'Account Number' , 'industry') }}

           {{ Form::textGroup('ifsc', 'Ifsc Code' , 'industry') }}

            {{ Form::textGroup('notes', 'Notes' , 'industry') }}


         
      </div>
      <div class="modal-footer">
         <button  class="btn btn-success" id="account_save">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<!-- Modal -->
<div id="branchesModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Branch</h4>
      </div>
      <div class="modal-body" style="overflow-y: hidden">
      

         {{ Form::textGroup('gstin', 'GSTIN' , 'industry') }}

         {{ Form::textGroup('brname', 'Branch Name' , 'industry') }}

         {{ Form::textGroup('phone', 'Phone' , 'industry') }}

          {{ Form::emailGroup('email', 'Email' , 'industry') }}

           {{ Form::textareaGroup('address', 'Address') }}

             {{ Form::selectGroup('city', 'City' , 'industry',$city ) }}

            {{ Form::selectGroup('state', 'State' , 'user',$states) }}

             {{ Form::selectGroup('country', 'Country' , 'industry',$country) }}

              {{ Form::textGroup('pincode', 'Pin Code' , 'industry') }}
               
                            

      </div>
      <div class="modal-footer">
        <button  class="btn btn-success" id="branch_save">Save</button>
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
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <style type="text/css">
         #company-bank-accounts,#company-branches,#company-gstin{
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
var accnt_id=$('#aci').val();
var entity_name=$('#en').val();
var holder_name=$('#hn').val();
var bank_name=$('#bn').val();
var account_number=$('#an').val();
var ifsc_code=$('#ifsc').val();
var notes=$('#notes').val();
var htmlaccountRow=$('#company-bank-accounts tbody').append('<tr id="account-row-'+accountrow+'"><td class="col-md-1 hidden"><span>'+accnt_id+'<input type="hidden" name="accounts['+accountrow+'][account_identifier]" value='+accnt_id+'></span></td><td class="col-md-1 hidden"><span>'+entity_name+'<input type="hidden" name="accounts['+accountrow+'][entity_name]" value='+entity_name+'></span></td><td class="col-md-1"><span>'+holder_name+'<input type="hidden" name="accounts['+accountrow+'][holder_name]" value='+holder_name+'></span></td><td class="col-md-1"><span>'+bank_name+'<input type="hidden" name="accounts['+accountrow+'][bank_name]" value='+bank_name+'></span></td><td class="col-md-1"><span>'+account_number+'<input type="hidden" name="accounts['+accountrow+'][account_number]" value='+account_number+'></span></td><td class="col-md-1"><span>'+ifsc_code+'<input type="hidden" name="accounts['+accountrow+'][ifsc_code]" value='+ifsc_code+'></span></td><td class="col-md-1 hidden"><span>'+notes+'<input type="hidden" name="accounts['+accountrow+'][notes]" value='+notes+'></span></td><td class="text-center"><div class="btn-group"><button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" data-toggle-position="left" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></button><ul class="dropdown-menu dropdown-menu-right"><li><a href="#" class="account-edit" >{{ "Edit" }}</a></li><li><button class="delete-link" title="Delete" onclick="$(this).parent().parent().parent().parent().parent().remove();">Delete</button></li></ul></div></td></tr>');

accountrow++;
if(account_edit_row>-1){
  $('#account-row-'+account_edit_row).remove();
}
$('#accountModal').modal('hide');
$('#accountModal input').val("");
});

$('#branch_save').click(function(){
var gstin=$('#gstin').val();
var b_name=$('#brname').val();
var phone=$('#phone').val();
var email=$('#email').val();
var address=$('#address').val();
var city_id=$('#city').val();
var city=$('#city')[0].options[$('#city')[0].selectedIndex].innerHTML;
var state_id=$('#state').val();
var state=$('#state')[0].options[$('#state')[0].selectedIndex].innerHTML;
var country_id=$('#country').val();
var country=$('#country')[0].options[$('#country')[0].selectedIndex].innerHTML;
var pincode=$('#pincode').val();
var html=$('#company-branches tbody').append(' <tr id="branch-row-'+branch_row+'"><td class="col-md-1 hidden"><span>'+gstin+'<input type="hidden" name="branch['+branch_row+'][gstin]" value='+gstin+'></span></td><td class="col-md-1"><span>'+b_name+'<input type="hidden" name="branch['+branch_row+'][branch_name]" value='+b_name+'></span></td><td class="col-md-1"><span>'+phone+'<input type="hidden" name="branch['+branch_row+'][phone]" value='+phone+'></span></td><td class="col-md-1"><span>'+email+'<input type="hidden" name="branch['+branch_row+'][email_id]" value='+email+'></span></td><td class="col-md-1"><span>'+address+'<input type="hidden" name="branch['+branch_row+'][address]" value='+address+'></span></td><td class="col-md-1"><span>'+city+'<input type="hidden" name="branch['+branch_row+'][city]" value='+city_id+'></span></td><td class="col-md-1"><span>'+state+'<input type="hidden" name="branch['+branch_row+'][state_id]" value='+state_id+'></span></td><td class="col-md-1 hidden"><span>'+country+'<input type="hidden" name="branch['+branch_row+'][country]" value='+country_id+'></span></td><td class="col-md-1 hidden"><span>'+pincode+'<input type="hidden" name="branch['+branch_row+'][pin_code]" value='+pincode+'></span></td><td class="text-center"><div class="btn-group"><button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" data-toggle-position="left" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></button><ul class="dropdown-menu dropdown-menu-right"><li><a href="#" class="branch-edit">{{ "Edit" }}</a></li><li><button class="delete-link" title="Delete" onclick="$(this).parent().parent().parent().parent().parent().remove();">Delete</button></li></ul></div></td></tr>');
branch_row++;
if(branch_edit_row>-1){
  $('#branch-row-'+branch_edit_row).remove();
}
$('#branchesModal').modal('hide');
$('#branchesModal input').val("");
});

$('#branchesModal,#accountModal').on('hidden.bs.modal',function(){
$('#branchesModal input,#branchesModal select,#branchesModal textarea').val("");
$('#accountModal input,#accountModal select,#accountModal textarea').val("");
});

$('#company-bank-accounts tbody').on('click','.account-edit',function(){
  var row=$(this).parent().parent().parent().parent().parent().attr('id').split("-")[2];
  console.log(row);
  account_edit_row=row;

var len=$('#company-bank-accounts table tbody')[0].rows[row].cells.length-1;
console.log(len);
for(var i=0;i<len;i++){
  var value=$('#company-bank-accounts tbody tr').eq(row).children().eq(i).children().children().val();
  $('#accountModal input').eq(i).val(value);
}  
$('#accountModal').modal('show');
});

$('#company-branches tbody').on('click','.branch-edit',function(){
  var row=$(this).parent().parent().parent().parent().parent().attr('id').split("-")[2];
  console.log(row);
    branch_edit_row=row;
var len=$('#company-branches table tbody')[0].rows[row].cells.length-1;
console.log(len);
for(var i=0;i<len;i++){
  var value=$('#company-branches tbody tr').eq(row).children().eq(i).children().children().val();
  $('#branchesModal .form-control').eq(i).val(value);
}  
$('#branchesModal').modal('show');
});

});



    </script>
@endsection
