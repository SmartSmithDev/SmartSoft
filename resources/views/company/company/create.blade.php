@extends('layouts.admin')

@section('title', 'Add Company')

@section('content')
  <!-- Tabs -->

  <ul class="nav nav-tabs">
    <li class="active"><a href="#company" data-toggle="tab" aria-expanded="true">Company</a></li>
    <li><a href="#accounts" data-toggle="tab" aria-expanded="false">Bank Accounts</a></li>
    <li><a href="#branches" data-toggle="tab" aria-expanded="false">Branches</a></li>
  </ul>


  <!-- Default box -->
  <div class="box box-success">
    {!! Form::open(['action' => 'Companies\Companies@store', 'files' => true, 'role' => 'form']) !!}
      <div class="box-body">
        <div class="tab-content">

          <!-- Company Tab -->
          <div id="company"  class="tab-pane tab-margin active">
            {{ Form::textGroup('name', 'Company Name' , 'fas fa-building') }}
            {{ Form::textGroup('pan', 'PAN Number' , 'fas fa-envelope') }}
            {{ Form::textGroup('email', 'E-Mail' , 'fas fa-envelope') }}
            {{ Form::textGroup('phone', 'Phone Number' , 'fas fa-envelope') }}
            {{ Form::textGroup('website', 'Website' , 'fas fa-envelope') }}
            {{ Form::fileGroup('picture', trans('general.picture')) }}
          </div>

          <!-- Company Accounts Tab -->
          <div id="accounts"  class="tab-pane tab-margin">
            <span class="new-button"><a href="#accountModal" class="btn btn-success btn-sm"  data-toggle="modal"><span class="fa fa-plus"></span> &nbsp;{{ trans('general.add_new') }}</a></span>

            <table class="table table-striped table-hover" id="tbl-accounts">
              <thead>
                <tr>
                  <th class="col-md-1">Account Name</th>
                  <th class="col-md-1">Account Number</th>
                  <th class="col-md-1">Holder Name</th>
                  <th class="col-md-1">Bank Name</th>
                  <th class="col-md-1 text-center">actions</th>
                </tr>
              </thead>
              <tbody>
                <!-- TODO -->
              </tbody>
            </table>
          </div>
          <!-- /.Company Accounts Tab -->

          <!-- Company Branches Tab -->
          <div id="branches"  class="tab-pane tab-margin">
            <span class="new-button"><a href="#branchesModal" class="btn btn-success btn-sm"  data-toggle="modal"><span class="fa fa-plus"></span> &nbsp;{{ trans('general.add_new') }}</a></span>

            <table class="table table-striped table-hover" id="tbl-items">
              <thead>
                <tr>
                  <th class="col-md-1 hidden">GstIn</th>
                  <th class="col-md-1">Branch Name</th>
                  <th class="col-md-1">Phone</th>
                  <th class="col-md-1">Address</th>
                  <th class="col-md-1">City</th>
                  <th class="col-md-1">State</th>
                  <th class="col-md-1 text-center">actions</th>
                </tr>
              </thead>
              <tbody>
                <!-- TODO -->
              </tbody>
            </table>
          </div>
          <!-- /.Company Branches Tab -->

        </div>
        <!-- /.Tab Contents -->   
      </div> 
      <br>
      <!-- /.box-body -->

      <div class="box-footer">
        {{ Form::saveButtons('companies/companies') }}
      </div>
      <!-- /.box-footer -->
    {!! Form::close() !!} 
  </div>

@endsection




@push('js')
  <!-- Select2 -->
  <script src="{{ asset('plugins/select2/select2.full.min.js') }}"></script>
  <!-- jquery-ui v1.12.1 -->
  <script src="{{ asset('plugins/jquery/jquery-ui/jquery-ui.min.js') }}"></script> 
  <script type="text/javascript" src="{{ asset('js/common.js') }}"></script>  
@endpush

@push('css')
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css') }}">
  <!-- jquery-ui v1.12.1 -->
  <link rel="stylesheet" href="{{ asset('plugins/jquery/jquery-ui/jquery-ui.min.css') }}"> 

@endpush


@push('scripts')
  
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
      </script>
@endpush


@push('scripts')
  <script type="text/javascript">
    $(document).ready(function(){
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

        
        {{-- checks whether the modal is opened for adding new row or editing an existing row  --}}
        
        if(account_edit_row==-1){// this condition is for new row
          accountList[accountrow]={};
          accountList[accountrow].account_identifier=accnt_id;
          accountList[accountrow].entity_name=entity_name;
          accountList[accountrow].holder_name=holder_name;
          accountList[accountrow].bank_name=bank_name;
          accountList[accountrow].account_number=account_number;
          accountList[accountrow].ifsc_code=ifsc_code;
          accountList[accountrow].notes=notes;

          {{-- creating new row --}}
          var id= '#account-row-'+accountrow; //new row id
          $('#company-bank-accounts tbody').append('<tr id='+id+'></tr>');
          save(accountList,accountrow,id);
          accountrow++;
        }
        else{ // for editing a existing row
          accountList[account_edit_row].account_identifier=accnt_id;
          accountList[account_edit_row].entity_name=entity_name;
          accountList[account_edit_row].holder_name=holder_name;
          accountList[account_edit_row].bank_name=bank_name;
          accountList[account_edit_row].account_number=account_number;
          accountList[account_edit_row].ifsc_code=ifsc_code;
          accountList[account_edit_row].notes=notes;
          save(accountList,account_edit_row,'#account-row-'+account_edit_row);
        }
        //opening modal
        $('#accountModal').modal('hide');
        $('#accountModal input').val("");//resetting values
      });

        //resetting values of edit_row 
        $('#branchesModal,#accountModal').on('hidden.bs.modal',function(){
          $('#branchesModal input,#branchesModal select,#branchesModal textarea').val("");
          $('#accountModal input,#accountModal select,#accountModal textarea').val("");
          account_edit_row=-1;
          branch_edit_row=-1;
        });

      $('.save_details').submit(function(event){
        //event.preventDefault(); 
        $('textarea[name="branches"]').val(JSON.stringify(branchList));
        $('textarea[name="accounts"]').val(JSON.stringify(accountList));
      }); 

    


    //adding or updating a row 
    function save(list,row,id){
      if($(id).children().length==0){ // no childs= new row 
        $.each(list[row],function(key,value){
          $(id).append('<td>'+value+'</td>');
        });
        var className=id.split("-")[0].substring(1); //creating a class with given id ex- #account-row-0 to account-row
        
        {{-- list containing edit,delete button   --}}
        var listHtml='<td class="text-center"><div class="btn-group">';
        
        {{-- creating dotted list dropdown button --}}
        listHtml+='<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" data-toggle-position="left" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></button>';
        listHtml+='<ul class="dropdown-menu dropdown-menu-right">';
        {{-- creating edit button --}}
        listHtml+='<li><a href="#" class="'+className+'-edit" >{{ "Edit" }}</a></li>';
        
        {{-- creating delete button --}}
        listHtml+='<li><button class="delete-link" title="Delete">Delete</button></li>';
        
        listHtml+='</ul></div></td>';
        $(id).append(listHtml);  
      }

      else{ //updating a row
        var i=0;
        $.each(list[row],function(key,value){
          $(id).children().eq(i).text(value);// updating innerHTML of each td in for updating
          i++;
        });
      } 
    }


     //function to open the modal with filled details as the user clicks on edit button on any row of bank accounts
          $('#company-bank-accounts tbody').on('click','.account-edit',function(){
            var row=$(this).parent().parent().parent().parent().parent();
            console.log(row);
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
        
  </script>
@endpush








@push('modals')
  {{-- Account Add Modal --}}
  {!! Modal::modal('Add New Account','accountModal',[
    Form::textGroup('account_identifier', 'Account Name' , 'industry'),
    Form::textGroup('entity_name', 'Entity Name' , 'industry'),
    Form::textGroup('holder_name', 'Holder Name' , 'industry'),
    Form::textGroup('bank_name', 'Bank Name' , 'industry'),
    Form::textGroup('account_number', 'Account Number' , 'industry'),
    Form::textGroup('ifsc_code', 'Ifsc Code' , 'industry'),
    Form::textGroup('bank_address', 'bank address' , 'industry'),
    Form::textGroup('notes', 'Notes' , 'industry')], 
    'Save','success','account_save')  
  !!}
@endpush


@push('modals')
  {{-- Add Branch Modal --}}
  {!! Modal::modal('Add New Branch','branchesModal',[
    Form::textGroup('gstin', 'GST Number' , 'industry'),
    Form::textGroup('brname', 'Branch Name' , 'industry'),
    Form::textGroup('phone', 'Phone' , 'industry'),
    Form::emailGroup('email', 'Email' , 'industry'),
    Form::textareaGroup('address', 'Address'),
    Form::textGroup('city', 'City' , 'industry'),
    Form::selectGroup('state', 'State' , 'user',$states),
    Form::selectGroup('country', 'Country' , 'industry',$countries),
    Form::textGroup('pincode', 'Pin Code' , 'industry')],'Save','success','branch_save')  
  !!}
@endpush