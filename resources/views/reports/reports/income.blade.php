@extends('layouts.admin')

@section('content')
<!-- bootstrap datepicker -->
<script src="../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<div class="box-body">
  <div id = "#div1" class="table table-responsive">
      <table id = "mytable"   class="table table-striped table-hover">
        
        <thead>
          <!-- Trigger the modal with a button -->
          <div class="pull-right">
            <button type="button" class="btn btn-success btn-sm"  data-toggle="modal" data-target="#myModal">Search by</button>
          </div>
             <!-- Modal -->  
          <div class="modal fade" id="myModal">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <h4 class="modal-title">Income Report</h4>
                </div>
                <div class="modal-body">
                {!! Form::open(['url' => 'Reports\Reports@index', 'role' => 'form', 'method' => 'GET']) !!}
                 <!--  <p id = "demo">11</p> -->
                  <div class="pull-left">
                    {{ Form::textGroup('Customer_Name', 'Party Name' , 'id-card-o',["id" => "customer"]) }}
                    <br> <br> <br>
                    <!-- Date -->
                    <div class="form-group pull-left">
                      {{ Form::label('from','From :')}}

                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="datepicker">
                      </div>
                      <!-- /.input group -->
                    </div>
                    <div class="form-group pull-left">
                      {{ Form::label('to','To :')}}
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="datepicker1">
                      </div>
                      <!-- /.input group -->
                    </div>
                  </div>
                          {!! Form::close() !!}
                </div>
                
                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                  <div class = "pull-right" >
                        <!--  {{ Form::Submit('Search')}} -->
                    {{ Form::button('search',array('class' => 'btn btn-primary','id' => 'search'))}}
                  
                  </div>
                </div>
              </div>
            <!-- /.modal-content -->
            </div>
          <!-- /.modal-dialog -->
          </div>
  
 
          <tr>
            <div class="container">
  
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
              //Date picker
            $('#datepicker').datepicker({
              autoclose: true
            })
            $('#datepicker1').datepicker({
              autoclose: true
            })

            $(document).ready(function(){
              $("#search").click(function()
              { //alert("The paragraph was clicked.");
                var t = document.getElementById('customer').value; 
                var in1 = document.getElementById('datepicker').value; 
                var in2 = document.getElementById('datepicker1').value; 
                //document.getElementById("demo").innerHTML = ""+t+""+in1+""+in2;
                var xhttp = new XMLHttpRequest();
                xhttp.open("GET", "{{ url('Reports') }}?party_name="+t+"&invoice1="+in1+"&invoice2="+in2, true);   //send Request
                xhttp.send();
                xhttp.onreadystatechange = function() 
                {
                  if (this.readyState == 4 && this.status == 200) 
                  {
                    var json=JSON.parse(this.responseText);
                    //console.log(json);
                      $("#table").empty();
                      var tr;
                      for (var i = 0; i < json.length; i++) 
                      { //Dispaly Data
                        tr = $('<tr/>');
                        
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