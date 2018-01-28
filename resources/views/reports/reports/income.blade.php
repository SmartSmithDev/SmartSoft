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
          <h2 class="modal-title ">Sales Report</h2>
        </div>
        <div class="modal-body">
          {!! Form::open(['url' => 'Reports\Reports@index', 'role' => 'form', 'method' => 'GET']) !!}
           <p id = "demo">11</p>
              <div class="pull-left">
                  {{ Form::label('name','Party Name :') }}
                  {{ Form::text('Customer_Name',"SmartSmith",["id" => "customer"])}}
                 
                  <br> <br> <br>
                  {{ Form::label('invoice','Invoice Date :')}}
                  <br>
                  {{ Form::label('from','From :')}}
                  {{ Form::text('invoice1',"2018-01-15",["id" => "invoice1"])}}
                  {{ Form::label('to','To :')}}
                  {{ Form::text('invoice2',"2018-01-20",["id" => "invoice2"])}}
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
  
              <th class="col-md-1 text-center">@sortablelink('company_id','Company ID ')</th>
              <th class="col-md-1 text-center">@sortablelink('customer_id','Customer ID ')</th>
              <th class="col-md-1 text-center">@sortablelink('ecommerce_vendor_id','Ecommerce Vendor ID')</th>
               <th class="col-md-1 text-center">@sortablelink('supplier_state_id','Supplier State ID')</th>
                <th class="col-md-1 text-center">@sortablelink('supply_state_id','Supply State ID')</th>
                 <th class="col-md-1 text-center">@sortablelink('order_id','Order ID')</th>
              <th class="col-md-1 text-center">@sortablelink('invoice_date',   'Invoice date ')</th>
              <th class="col-md-1 text-center">@sortablelink('total_taxable_value', 'Total taxable value')</th>
              <th class="col-md-1 text-center">@sortablelink('total_discount', 'Total discount')</th>
              <th class="col-md-1 text-center">@sortablelink('cess', 'cess')</th>
              <th class="col-md-1  text-center">@sortablelink('total_tax_amount', 'Total tax amount')</th>
              <th class="col-md-1 text-center">@sortablelink('roundoff', 'Roundoff')</th>
              <th class="col-md-1 text-center">@sortablelink('total_amount', 'Total amount')</th>
              <th class="col-md-1 text-center">@sortablelink('reverse_charge', 'Reverse charge')</th>
              <th class="col-md-1 text-center">@sortablelink('notes', 'notes')</th>     
                            
          </tr>
        </thead>
        <tbody id = "table" >
         
          <script>
        
            $(document).ready(function(){
              $(".search").click(function()
              { //alert("The paragraph was clicked.");
                var t = document.getElementById('customer').value; 
                var in1 = document.getElementById('invoice1').value; 
                var in2 = document.getElementById('invoice2').value; 
                document.getElementById("demo").innerHTML = ""+t+""+in1+""+in2;
                var xhttp = new XMLHttpRequest();
                xhttp.open("GET", "{{ url('Reports') }}?party_name="+t+"&invoice1="+in1+"&invoice2="+in2, true);   //send Request
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
                        tr.append("<td>" + json[i].company_id + "</td>");
                        tr.append("<td>" + json[i].customer_id + "</td>");
                        tr.append("<td>" + json[i].ecommerce_vendor_id + "</td>");
                        tr.append("<td>" + json[i].supplier_state_id + "</td>");
                        tr.append("<td>" + json[i].supply_state_id + "</td>");
                        tr.append("<td>" + json[i].order_id + "</td>");
                        tr.append("<td>" + json[i].total_taxable_value + "</td>");
                        tr.append("<td>" + json[i].total_discount + "</td>");
                        tr.append("<td>" + json[i].cess + "</td>");
                        tr.append("<td>" + json[i].total_tax_amount + "</td>");
                        tr.append("<td>" + json[i].round_off + "</td>");
                        tr.append("<td>" + json[i].total_amount + "</td>");
                        tr.append("<td>" + json[i].reverse_charge + "</td>");
                        tr.append("<td>" + json[i].notes + "</td>");
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