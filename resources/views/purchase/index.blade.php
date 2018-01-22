@extends('layouts.admin')

@section('content')


<div class="box-body">
  <div id = "#div1" class="table table-responsive">
      <table id = "mytable"   class="table table-striped table-hover">
        
        <thead>
          <tr>
                <!--DropDown of Month-->      
            {!! Form::open(['url' => 'purchase\purchasedis', 'role' => 'form', 'method' => 'GET']) !!}
              <div class="pull-right">
                  {{ Form::select('month',$month,$defaultMonth,['class'=>'display']) }}
              </div>
            {!! Form::close() !!}
                 <!--DropDown of Year-->      
            {!! Form::open(['url' => 'purchase\purchasedis', 'role' => 'form', 'method' => 'GET']) !!}
              <div class="pull-right">
                {!! Form::select('year', $years,$defaultYear,['class' => 'display']) !!}
              </div>
            {!! Form::close() !!}
              

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
              $(document).on('change','.display',function()
              {
                var t = document.getElementsByName('year')[0].value; 
                var y = document.getElementsByName('year')[0][t].innerHTML;  //Get year
                var m = document.getElementsByName('month')[0].value;        //Get Month Value
                m++;
                // document.getElementById("demo").innerHTML = "" +m+""+y;
                var xhttp = new XMLHttpRequest();
                xhttp.open("GET", "purchasedis?month="+m+"&year="+y, true);   //send Request
                xhttp.send();
                xhttp.onreadystatechange = function() 
                {
                  if (this.readyState == 4 && this.status == 200) 
                  {
                    var json=JSON.parse(this.responseText);
                      $("#table").empty();
                      var tr;
                      for (var i = 0; i < json.length; i++) 
                      { //Dispaly Data
                        tr = $('<tr/>');
                        tr.append("<td>" + json[i].invoice_date + "</td>");
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