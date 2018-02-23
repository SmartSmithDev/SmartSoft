@extends('layouts.admin')

<?php
  $accountrow=0;
  $branch_row=0;
?>

@section('content')

  <ul class="nav nav-tabs">
    <li class="active"><a href="#">Company</a></li>
    <li><a href="#">Bank Accounts</a></li>
    <li><a href="#">Branches</a></li> 
  </ul>
  <br>
  {!! Form::open(array('url' => '/companies/companies/'.$company->id,'method'=>'PUT','class'=>'save_details')) !!}  
  <button type="submit" name="submit" class="btn btn-success "><i class="fa fa-save"></i>Save</button>&nbsp;
  <a href="{{ url('/companies/companies/') }}" class="btn btn-default"><i class="fa fa-times-circle"></i>Cancel</a>
  <div id="company"  class="parts">
    <br>
    <br>
    {{ Form::textGroup('name', 'Company Name' , 'industry',['required'=>'required'],$company->name) }}
    {{ Form::textGroup('pan', 'PAN' , 'key',['required'=>'required'],$company->pan) }}   
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
        <?php
          foreach($company_accounts as $account){  
            echo '<tr id="account-row-'. $accountrow.'"><td class="col-md-1 hidden"><span>'.$account->account_identifier.'<input type="hidden" name="accounts['. $accountrow.'][account_identifier]" value='.$account->account_identifier.'></span></td><td class="col-md-1 hidden"><span>'.$account->entity_name.'<input type="hidden" name="accounts['. $accountrow.'][entity_name]" value='.$account->entity_name.'></span></td><td class="col-md-1"><span>'.$account->holder_name.'<input type="hidden" name="accounts['. $accountrow.'][holder_name]" value='.$account->holder_name.'></span></td><td class="col-md-1"><span>'.$account->bank_name.'<input type="hidden" name="accounts['. $accountrow.'][bank_name]" value='.$account->bank_name.'></span></td><td class="col-md-1"><span>'.$account->account_number.'<input type="hidden" name="accounts['. $accountrow.'][account_number]" value='.$account->account_number.'></span></td><td class="col-md-1"><span>'.$account->ifsc_code.'<input type="hidden" name="accounts['. $accountrow.'][ifsc_code]" value='.$account->ifsc_code.'></span></td><td class="col-md-1 hidden"><span>'.$account->notes.'<input type="hidden" name="accounts['. $accountrow.'][notes]" value='.$account->notes.'></span></td><td class="text-center"><div class="btn-group"><button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" data-toggle-position="left" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></button><ul class="dropdown-menu dropdown-menu-right"><li><a href="#" class="account-edit" >Edit</a></li><li><button class="delete-link" title="Delete">Delete</button></li></ul></div></td></tr>';
            $accountrow++;
          }
        ?>
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
          <th class="col-md-3">Address</th>
          <th class="col-md-1">City</th>
          <th class="col-md-1 hidden">State</th>
          <th class="col-md-1 hidden">Country</th>
          <th class="col-md-1 hidden">Pin Code</th>
          <th class="col-md-1 text-center">actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
          foreach($company_branches as $branch){  
            echo '<tr id="branch-row-'.$branch_row.'"><td class="col-md-1 hidden"><span>'.$branch->gstin.'<input type="hidden" name="branch['.$branch_row.'][gstin]" value='.$branch->gstin.'></span></td><td class="col-md-1"><span>'.$branch->branch_name.'<input type="hidden" name="branch['.$branch_row.'][branch_name]" value='.$branch->branch_name.'></span></td><td class="col-md-1"><span>'.$branch->phone.'<input type="hidden" name="branch['.$branch_row.'][phone]" value='.$branch->phone.'></span></td><td class="col-md-1"><span>'.$branch->email_id.'<input type="hidden" name="branch['.$branch_row.'][email_id]" value='.$branch->email_id.'></span></td><td class="col-md-3"><span>'.$branch->address.'<input type="hidden" name="branch['.$branch_row.'][address]" value="'.$branch->address.'"></span></td><td class="col-md-1"><span>'.$branch->city.'<input type="hidden" name="branch['.$branch_row.'][city]" value='.$branch->city.'></span></td><td class="col-md-1 hidden"><span>'.$branch->state.'<input type="hidden" name="branch['.$branch_row.'][state_id]" value='.$branch->state_id.'></span></td><td class="col-md-1 hidden"><span>'.$branch->country.'<input type="hidden" name="branch['.$branch_row.'][country]" value='.$branch->country_id.'></span></td><td class="col-md-1 hidden"><span>'.$branch->pin_code.'<input type="hidden" name="branch['.$branch_row.'][pin_code]" value='.$branch->pin_code.'></span></td><td class="text-center"><div class="btn-group"><button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" data-toggle-position="left" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></button><ul class="dropdown-menu dropdown-menu-right"><li><a href="#" class="branch-edit">Edit</a></li><li><button class="delete-link" title="Delete">Delete</button></li></ul></div></td></tr>';
            $branch_row++;
          }
        ?>
      </tbody>
    </table>
  </div>

  <textarea name="branches" class="hidden"></textarea>

  <textarea name="accounts" class="hidden"></textarea>
  {!! Form::close() !!}

@endsection

@push('modal')
   <!-- Modal for adding bank accounts  -->

  {!! General::modal('Add New Account','accountModal',[Form::textGroup('account_identifier', 'Account Identifier' , 'industry'),

    Form::textGroup('entity_name', 'Entity Name' , 'industry'),

    Form::textGroup('holder_name', 'Holder Name' , 'industry'),

    Form::textGroup('bank_name', 'Bank Name' , 'industry'),

    Form::textGroup('account_number', 'Account Number' , 'industry'),

    Form::textGroup('ifsc_code', 'Ifsc Code' , 'industry'),

    Form::textGroup('notes', 'Notes' , 'industry')],'Save','success','account_save')  
  !!}
  <!-- modal helper parameters (title of modal,id of modal,array of elements to insert in body of modal,text of footer button,class of footer button,id of footer button)  -->
  <script type="text/javascript">
    var accountrow={{ $accountrow }}; //used for assigning id to each row while appending a row in bank accounts 
    var account_edit_row=-1; //used to identify modal is opened for which row while editing the account
    var taccountList={!! $company_accounts !!};
    var accountList={};

    //loop through the object and get required fields
    $.each(taccountList,function(key,value){
      accountList[key]={};

      accountList[key].account_identifier=taccountList[key].account_identifier;
      accountList[key].entity_name=taccountList[key].entity_name;
      accountList[key].holder_name=taccountList[key].holder_name;
      accountList[key].bank_name=taccountList[key].bank_name;
      accountList[key].account_number=taccountList[key].account_number;
      accountList[key].ifsc_code=taccountList[key].ifsc_code;
      accountList[key].notes=taccountList[key].notes;
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

        var i=0;
        var elementObject={};
        var rowObject=$(document.createElement("tr")).attr({"id":"account-row-"+accountrow,"class":"account-row"});
        var className="account-row";
        $.each(accountList[i],function(key,value){
          elementObject[i]={etype:"span",innerHTML:value};
          i++;
        });

        //Creates an object of all the rows of account table to be added
        elementObject[i]={etype:"div",innerHTML:'<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" data-toggle-position="left" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></button><ul class="dropdown-menu dropdown-menu-right"><li><a href="#" class="'+className+'-edit" >{{ "Edit" }}</a></li><li><button class="delete-link" title="Delete">Delete</button></li></ul>'};
        rowObject=addTableRow(elementObject,rowObject);
        $('#items tbody #addItem').append(rowObject);

        $('#company-bank-accounts tbody').append('<tr id="account-row-'+accountrow+'"></tr>');
        save(accountList,accountrow,'#account-row-'+accountrow);
        accountrow++;

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
    $('#accountModal').on('hidden.bs.modal',function(){
      $('#accountModal input,#accountModal select,#accountModal textarea').val("");
      account_edit_row=-1;
    });
    //function to open the modal with filled details as the user clicks on edit on any row of bank accounts
      $('#company-bank-accounts tbody').on('click','.account-edit',function(){
        var row=$(this).parent().parent().parent().parent().parent();
        console.log(row);
        account_edit_row=row.attr("id").split("-")[2];


        $.each(accountList[account_edit_row],function(key,value){
          $('#accountModal #'+key).val(value);
        });
        $('#accountModal').modal('show');
      });
  </script>
@endpush

@push('modal')
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

  <script type="text/javascript">
    var branch_row={{ $branch_row }}; //used for assigning id to each row while appending a row in branches
    var branch_edit_row=-1; //used to identify modal is opened for which row while editing the branch 
    var tbranchList={!! $company_branches !!};
    var branchList={};

    //loop through the object and get required fields
    $.each(tbranchList,function(key,value){
      branchList[key]={};
      branchList[key].gstin=tbranchList[key].gstin;
      branchList[key].branch_name=tbranchList[key].branch_name;
      branchList[key].phone=tbranchList[key].phone;
      branchList[key].email_id=tbranchList[key].email_id;
      branchList[key].address=tbranchList[key].address;
      branchList[key].city=tbranchList[key].city;
      branchList[key].state_id=tbranchList[key].state_id;
      branchList[key].country_id=tbranchList[key].country_id;
      branchList[key].pin_code=tbranchList[key].pin_code;
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


        var i=0;
        var elementObject={};
        var rowObject=$(document.createElement("tr")).attr({"id":"branch-row-"+branch_row,"class":"branch-row"});
        var className="branch-row";
        $.each(branchList[i],function(key,value){
          elementObject[i]={etype:"span",innerHTML:value};
          i++;
        });

        //Creates an object of all the rows of branch table to be added
        elementObject[i]={etype:"div",innerHTML:'<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" data-toggle-position="left" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></button><ul class="dropdown-menu dropdown-menu-right"><li><a href="#" class="'+className+'-edit" >{{ "Edit" }}</a></li><li><button class="delete-link" title="Delete">Delete</button></li></ul>'};
        rowObject=addTableRow(elementObject,rowObject);
        $('#items tbody #addItem').append(rowObject);

        $('#company-branches tbody').append('<tr id="branch-row-'+branch_row+'"></tr>');
        save(branchList,branch_row,'#branch-row-'+branch_row);

        branch_row++;

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
    $('#branchesModal').on('hidden.bs.modal',function(){
      $('#branchesModal input,#branchesModal select,#branchesModal textarea').val("");
      branch_edit_row=-1;
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
  </script>
@endpush

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
    var accountrow={{ $accountrow }}; //used for assigning id to each row while appending a row in bank accounts
    var branch_row={{ $branch_row }}; //used for assigning id to each row while appending a row in branches
    var branch_edit_row=-1; //used to identify modal is opened for which row while editing the branch 
    var account_edit_row=-1; //used to identify modal is opened for which row while editing the account
    var taccountList={!! $company_accounts !!};
    var tbranchList={!! $company_branches !!};
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
        $('textarea[name="branches"]').text(JSON.stringify(branchList));
        $('textarea[name="accounts"]').text(JSON.stringify(accountList));
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
