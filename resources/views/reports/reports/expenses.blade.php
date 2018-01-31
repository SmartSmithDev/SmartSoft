@extends('layouts.admin')

@section('content')


<div class="box-body">
  <div id = "#div1" class="table table-responsive">
      <table id = "mytable"   class="table table-striped table-hover">
        
        <thead>
          
  
  <!-- Trigger the modal with a button -->
  <div class="pull-right">
  <button type="button" class="btn  btn-lg"  data-toggle="modal" data-target="#myModal">Open Modal</button>
   </div>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
     
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-title ">Expense Report</h2>
        </div>
        <div class="modal-body">
          {!! Form::open(['url' => 'Reports\expenses@index', 'role' => 'form', 'method' => 'GET']) !!}
          <!--  <p id = "demo">11</p> -->
              <div class="pull-left">
                  {{ Form::label('name','Vendor Name :') }}
                  {{ Form::text('Customer_Name',"SmartSmith",["id" => "customer"])}}
                 
                  <br> <br> <br>
                  {{ Form::label('payment','Payment Date :')}}
                  <br>
                  {{ Form::label('from','From :')}}
                  {{ Form::text('pDate1',"2018-01-15",["id" => "pdate1"])}}
                  {{ Form::label('to','To :')}}
                  {{ Form::text('pdate2',"2018-01-20",["id" => "pdate2"])}}
                  <br>
                  <div class = "pull-right">
                  <!--  {{ Form::Submit('Search')}} -->
                  {{ Form::button('Search',["class" => "search"])}}
                  
                 </div>
              </div>
              
            {!! Form::close() !!}
      
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-default" data-dismiss="modal"></button> -->
        </div>
      </div>
      
    </div>
  </div>
  
</div>
<tr>
             <div class="container">
            <th class="col-md-1 text-center">@sortablelink('sales_id','Sales ID ')</th>
              <th class="col-md-1 text-center">@sortablelink('company_account_id','Company Account ID ')</th>
              
              <th class="col-md-1 text-center">@sortablelink('customer_account_id','Customer Account ID')</th>
               <th class="col-md-1 text-center">@sortablelink('payment_date','Payment Date')</th>
                <th class="col-md-1 text-center">@sortablelink('payment_mode','Payment Mode')</th>
                 <th class="col-md-1 text-center">@sortablelink('paid_amount','Paid Amount')</th>
              <th class="col-md-1 text-center">@sortablelink('payment_terms',   'Payment Terms ')</th>
              <th class="col-md-1 text-center">@sortablelink('payment_type', 'Payment Type')</th>
              <th class="col-md-1 text-center">@sortablelink('payment_reference', 'Payment Reference')</th>
              <th class="col-md-1 text-center">@sortablelink('payment_notes', 'Payment Notes')</th>
                 
                            
          </tr>
        </thead>
        <tbody id = "table" >
         
          <script>
        
            $(document).ready(function(){
              $(".search").click(function()
              { //alert("The paragraph was clicked.");
                var t = document.getElementById('customer').value; 
                var in1 = document.getElementById('pdate1').value; 
                var in2 = document.getElementById('pdate2').value; 
                // document.getElementById("demo").innerHTML = ""+t+""+in1+""+in2;
                var xhttp = new XMLHttpRequest();
                xhttp.open("GET", "{{ url('Expenses') }}?party_name="+t+"&pdate1="+in1+"&pdate2="+in2, true);   //send Request
                xhttp.send();
                xhttp.onreadystatechange = function() 
                {
                  if (this.readyState == 4 && this.status == 200) 
                  {
                    var json=JSON.parse(this.responseText);
                    console.log(json);
                      $("#table").empty();
                      var tr;
                      for (var i = 0; i < json.length; i++) 
                      { //Dispaly Data
                        tr = $('<tr/>');
                        tr.append("<td>" + json[i].sales_id + "</td>");
                        tr.append("<td>" + json[i].company_account_id + "</td>");
                        tr.append("<td>" + json[i].customer_account_id + "</td>");
                        tr.append("<td>" + json[i].payment_date + "</td>");
                        tr.append("<td>" + json[i].payment_mode + "</td>");
                        tr.append("<td>" + json[i].paid_amount + "</td>");
                        tr.append("<td>" + json[i].payment_terms + "</td>");
                        tr.append("<td>" + json[i].payment_type + "</td>");
                        tr.append("<td>" + json[i].payment_reference + "</td>");
                        tr.append("<td>" + json[i].payment_notes + "</td>");
                        $('table tbody').append(tr);
                      }
                  }
                };
              });

            });
          </script> 

      </tbody>
       
    </table>
  </div>
</div>
@endsection