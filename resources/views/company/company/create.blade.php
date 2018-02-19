@extends('layouts.admin')



@section('content')

  <ul class="nav nav-tabs">
    <li class="active"><a href="#">Company</a></li>
    <li><a href="#">Bank Accounts</a></li>
    <li><a href="#">Branches</a></li>
  </ul>
  <br>
  {!! Form::open(array('url' => '/companies/companies','class'=>'save_details')) !!}  
  <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save"></i>Save</button>&nbsp;
  <a href="{{ url('/companies/companies') }}" class="btn btn-default"><i class="fa fa-times-circle"></i>Cancel</a>
  <div id="company"  class="parts">
    <br>
    <br>
    {{ Form::textGroup('name', 'Company Name' , 'industry') }}
    {{ Form::textGroup('pan', 'PAN' , 'key') }}
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
          <th class="col-md-1 hidden">State</th>
          <th class="col-md-1 hidden">Country</th>
          <th class="col-md-1 hidden">Pin Code</th>
          <th class="col-md-1 text-center">actions</th>
        </tr>
     </thead>

      <tbody>

      </tbody>
    </table>
  </div>


  <textarea name="branches" class="hidden"></textarea>

  <textarea name="accounts" class="hidden"></textarea>
  {!! Form::close() !!}

  <!-- Modal for adding bank accounts  -->

  {!! General::modal('Add New Account','accountModal',[Form::textGroup('account_identifier', 'Account Identifier' , 'industry'),

    Form::textGroup('entity_name', 'Entity Name' , 'industry'),

    Form::textGroup('holder_name', 'Holder Name' , 'industry'),

    Form::textGroup('bank_name', 'Bank Name' , 'industry'),

    Form::textGroup('account_number', 'Account Number' , 'industry'),

    Form::textGroup('ifsc_code', 'Ifsc Code' , 'industry'),

    Form::textGroup('notes', 'Notes' , 'industry')],'Save','success','account_save')  !!}

  <!-- Modal for adding branches  -->


  {!! General::modal('Add New Branch','branchesModal',[Form::textGroup('gstin', 'GSTIN' , 'industry'),

    Form::textGroup('branch_name', 'Branch Name' , 'industry'),

    Form::textGroup('phone', 'Phone' , 'industry'),

    Form::emailGroup('email_id', 'Email' , 'industry'),

    Form::textareaGroup('address', 'Address'),

    Form::selectGroup('city', 'City' , 'industry',$city ),

    Form::selectGroup('state_id', 'State' , 'user',$states),

    Form::selectGroup('country_id', 'Country' , 'industry',$country),

    Form::textGroup('pin_code', 'Pin Code' , 'industry')],'Save','success','branch_save')  !!}

  {!! General::modal('Delete','deleteModal',['Are You Sure You Want Delete?'],'Delete','danger','delete_button')  !!}

  <!-- modal helper parameters (title of modal,id of modal,array of elements to insert in body of modal,text of footer button,class of footer button,id of footer button)  -->
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
    #company-bank-accounts tbody td:nth-child(1),
    #company-bank-accounts tbody td:nth-child(2),
    #company-bank-accounts tbody td:nth-child(7)
    {
      display:none;
    }
    #company-branches tbody td:nth-child(1),
    #company-branches tbody td:nth-child(7),
    #company-branches tbody td:nth-child(8),
    #company-branches tbody td:nth-child(9)
    {
      display:none;
    }
  </style>
@endsection

@section('scripts')
  <script type="text/javascript">
    var tabno=0;   //represents the top tabs
    var accountrow=0; //used for assigning id to each row while appending a row in bank accounts
    var branch_row=0; //used for assigning id to each row while appending a row in branches
    var branch_edit_row=-1; //used to identify modal is opened for which row while editing the branch 
    var account_edit_row=-1; //used to identify modal is opened for which row while editing the account
    var accountList={};
    var branchList={};
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

    //used to display which div  to display on clicking different tabs 
        
    $(document).ready(function(){
      $('.nav-tabs').on('click','li',function(){
        $(this).addClass('active');
        $('.parts').eq(tabno).css({display:"none"});
        $('.nav-tabs li').eq(tabno).removeClass('active');
        tabno=$(this).index();
        $('.parts').eq(tabno).css({display:"block"});
      });
      //function to save the modal details of bank account to the table as a row i.e appending a row with modal details 
      $('#account_save').click(function(){
        //fetching all the values entered by user in modal fields
        var accnt_id=$('#account_identifier').val();
        var entity_name=$('#entity_name').val();
        var holder_name=$('#holder_name').val();
        var bank_name=$('#bank_name').val();
        var account_number=$('#account_number').val();
        var ifsc_code=$('#ifsc_code').val();
        var notes=$('#notes').val();
        if(account_edit_row==-1){

          accountList[accountrow]={};
          accountList[accountrow].account_identifier=accnt_id;
          accountList[accountrow].entity_name=entity_name;
          accountList[accountrow].holder_name=holder_name;
          accountList[accountrow].bank_name=bank_name;
          accountList[accountrow].account_number=account_number;
          accountList[accountrow].ifsc_code=ifsc_code;
          accountList[accountrow].notes=notes;


          //appending a row containing all the details entered by users in modal
          // var htmlaccountRow=$('#company-bank-accounts tbody').append('<tr id="account-row-'+accountrow+'"><td class="col-md-1 hidden"><span>'+accnt_id+'<input type="hidden" name="accounts['+accountrow+'][account_identifier]" value="'+accnt_id+'"></span></td><td class="col-md-1 hidden"><span>'+entity_name+'<input type="hidden" name="accounts['+accountrow+'][entity_name]" value="'+entity_name+'"></span></td><td class="col-md-1"><span>'+holder_name+'<input type="hidden" name="accounts['+accountrow+'][holder_name]" value="'+holder_name+'"></span></td><td class="col-md-1"><span>'+bank_name+'<input type="hidden" name="accounts['+accountrow+'][bank_name]" value="'+bank_name+'"></span></td><td class="col-md-1"><span>'+account_number+'<input type="hidden" name="accounts['+accountrow+'][account_number]" value="'+account_number+'"></span></td><td class="col-md-1"><span>'+ifsc_code+'<input type="hidden" name="accounts['+accountrow+'][ifsc_code]" value="'+ifsc_code+'"></span></td><td class="col-md-1 hidden"><span>'+notes+'<input type="hidden" name="accounts['+accountrow+'][notes]" value="'+notes+'"></span></td><td class="text-center"><div class="btn-group"><button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" data-toggle-position="left" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></button><ul class="dropdown-menu dropdown-menu-right"><li><a href="#" class="account-edit" >{{ "Edit" }}</a></li><li><button class="delete-link" title="Delete">Delete</button></li></ul></div></td></tr>');

          $('#company-bank-accounts tbody').append('<tr id="account-row-'+accountrow+'"></tr>');
          save(accountList,accountrow,'#account-row-'+accountrow);
          accountrow++;
        }
        else{
          accountList[account_edit_row].account_identifier=accnt_id;
          accountList[account_edit_row].entity_name=entity_name;
          accountList[account_edit_row].holder_name=holder_name;
          accountList[account_edit_row].bank_name=bank_name;
          accountList[account_edit_row].account_number=account_number;
          accountList[account_edit_row].ifsc_code=ifsc_code;
          accountList[account_edit_row].notes=notes;

          save(accountList,account_edit_row,'#account-row-'+account_edit_row);
        }
        $('#accountModal').modal('hide');
        $('#accountModal input').val("");
      });
      //function to save the modal details of branch to the table as a row i.e appending a row with modal details 
      $('#branch_save').click(function(){
        //fetching all the values entered by user in modal fields
        var gstin=$('#gstin').val();
        var b_name=$('#branch_name').val();
        var phone=$('#phone').val();
        var email=$('#email_id').val();
        var address=$('#address').val();
        var city=$('#city').val();
        var state_id=$('#state_id').val();
        var country_id=$('#country_id').val();
        var pincode=$('#pin_code').val();
        if(branch_edit_row==-1){

          branchList[branch_row]={};
          branchList[branch_row].gstin=gstin;
          branchList[branch_row].branch_name=b_name;
          branchList[branch_row].phone=phone;
          branchList[branch_row].email_id=email;
          branchList[branch_row].address=address;
          branchList[branch_row].city=city;
          branchList[branch_row].state_id=state_id;
          branchList[branch_row].country_id=country_id;
          branchList[branch_row].pin_code=pincode;

          //appending a row containing all the details entered by users in modal

          // var html=$('#company-branches tbody').append('<tr id="branch-row-'+branch_row+'"><td class="col-md-1 hidden"><span>'+gstin+'<input type="hidden" name="branch['+branch_row+'][gstin]" value="'+gstin+'"></span></td><td class="col-md-1"><span>'+b_name+'<input type="hidden" name="branch['+branch_row+'][branch_name]" value="'+b_name+'"></span></td><td class="col-md-1"><span>'+phone+'<input type="hidden" name="branch['+branch_row+'][phone]" value="'+phone+'"></span></td><td class="col-md-1"><span>'+email+'<input type="hidden" name="branch['+branch_row+'][email_id]" value="'+email+'"></span></td><td class="col-md-1"><span>'+address+'<input type="hidden" name="branch['+branch_row+'][address]" value="'+address+'"></span></td><td class="col-md-1"><span>'+city+'<input type="hidden" name="branch['+branch_row+'][city]" value="'+city+'"></span></td><td class="col-md-1"><span>'+state+'<input type="hidden" name="branch['+branch_row+'][state_id]" value="'+state_id+'"></span></td><td class="col-md-1 hidden"><span>'+country+'<input type="hidden" name="branch['+branch_row+'][country]" value="'+country_id+'"></span></td><td class="col-md-1 hidden"><span>'+pincode+'<input type="hidden" name="branch['+branch_row+'][pin_code]" value="'+pincode+'"></span></td><td class="text-center"><div class="btn-group"><button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" data-toggle-position="left" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></button><ul class="dropdown-menu dropdown-menu-right"><li><a href="#" class="branch-edit">{{ "Edit" }}</a></li><li><button class="delete-link" title="Delete">Delete</button></li></ul></div></td></tr>');

          $('#company-branches tbody').append('<tr id="branch-row-'+branch_row+'"></tr>');
          save(branchList,branch_row,'#branch-row-'+branch_row);

          branch_row++;
        }
        else{
          branchList[branch_edit_row].gstin=gstin;
          branchList[branch_edit_row].branch_name=b_name;
          branchList[branch_edit_row].phone=phone;
          branchList[branch_edit_row].email_id=email;
          branchList[branch_edit_row].address=address;
          branchList[branch_edit_row].city=city;
          branchList[branch_edit_row].state_id=state_id;
          branchList[branch_edit_row].country_id=country_id;
          branchList[branch_edit_row].pin_code=pincode;
          save(branchList,branch_edit_row,'#branch-row-'+branch_edit_row);
        }
            
        $('#branchesModal').modal('hide');
        $('#branchesModal input').val("");
      });
      $('#branchesModal,#accountModal').on('hidden.bs.modal',function(){
        $('#branchesModal input,#branchesModal select,#branchesModal textarea').val("");
        $('#accountModal input,#accountModal select,#accountModal textarea').val("");
        account_edit_row=-1;
        branch_edit_row=-1;
      });
      //function to open the modal with filled details as the user clicks on edit on any row of bank accounts
      $('#company-bank-accounts tbody').on('click','.account-edit',function(){
        var row=$(this).parent().parent().parent().parent().parent();
        account_edit_row=row.attr("id").split("-")[2];
        $.each(accountList[account_edit_row],function(key,value){
          $('#accountModal #'+key).val(value);
        });
        $('#accountModal').modal('show');
      });
      //function to open the modal with filled details as the user clicks on edit on any row of branches
      $('#company-branches tbody').on('click','.branch-edit',function(){

        var row=$(this).parent().parent().parent().parent().parent();
        console.log(row);
        branch_edit_row=row.attr("id").split("-")[2];

        $.each(branchList[branch_edit_row],function(key,value){
          $('#branchesModal #'+key).val(value);
        }); 
        $('#branchesModal').modal('show');
      });
      //function to popup delete modal on clicking delete on any row of table by assigning the id of that row to the remove() method 
      $('.parts').on('click','.delete-link',function(event){
        event.preventDefault();
        var elem=$(this).parent().parent().parent().parent().parent().attr("id");
        var row=elem.split("-")[2];
        if(elem.split("-")[0]=="account"){
          $('#delete_button').attr("onclick","$('#"+elem+"').remove();$('#deleteModal').modal('hide');accountList["+row+"]=undefined");
        }
        else{
          $('#delete_button').attr("onclick","$('#"+elem+"').remove();$('#deleteModal').modal('hide');branchList["+row+"]=undefined");
        }
        $('#deleteModal').modal('show');
      });

      $('.save_details').submit(function(event){      
        $('textarea[name="branches"]').val(JSON.stringify(branchList));
        $('textarea[name="accounts"]').val(JSON.stringify(accountList));
      });
    });
    function save(list,row,id){
      if($(id).children().length==0){
        $.each(list[row],function(key,value){
          $(id).append('<td>'+value+'</td>');
        });
        var className=id.split("-")[0].substring(1);
        $(id).append('<td class="text-center"><div class="btn-group"><button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" data-toggle-position="left" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></button><ul class="dropdown-menu dropdown-menu-right"><li><a href="#" class="'+className+'-edit" >{{ "Edit" }}</a></li><li><button class="delete-link" title="Delete">Delete</button></li></ul></div></td>');  
      }

      else{

        var i=0;
        $.each(list[row],function(key,value){
          $(id).children().eq(i).text(value);
          i++;
        });
      }
    }
  </script>
@endsection
