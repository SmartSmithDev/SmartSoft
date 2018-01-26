@extends('layouts.admin')

@section('content')
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

<div class="box-body">
  <div class="table table-responsive" style="overflow-y: hidden">
    <table class="table table-striped table-hover"  class="ui-responsive" id="myTable">
      <thead>
        <tr>
        {!! Form::open(['url' => 'Payments\Payments', 'role' => 'form', 'method' => 'GET']) !!}
          <div class="pull-right">
            {{ Form::select('status',$status,'Paid') }}
          </div>
            {!! Form::close() !!}
          
          <th class="col-md-1 text-center" >@sortablelink('invoice_type', 'Invoice type')</th>
          <th class="col-md-1 text-center" >@sortablelink('order_date', 'order date')</th>
          <!-- <th class="col-md-1 text-center" >@sortablelink('sales_type', 'sales type')</th> -->
          <th class="col-md-1 text-center" >@sortablelink('total_taxable_value', 'Total taxable value')</th>
          <th class="col-md-1 text-center" >@sortablelink('total_discount', 'Total discount')</th>
          <th class="col-md-1 text-center" >@sortablelink('total_tax_amount', 'Total tax amount')</th>
          <th class="col-md-1 text-center" >@sortablelink('shipping_cost', 'shipping cost')</th>
          <!-- <th class="col-md-1 text-center" >@sortablelink('roundoff', 'Roundoff')</th> -->
          <!-- <th class="col-md-1 text-center" >@sortablelink('total_amount', 'Total amount')</th> -->
          <!-- <th class="col-md-1 text-center" >@sortablelink('reverse_charge', 'Reverse charge')</th> -->
          <th class="col-md-1 text-center" >@sortablelink('payment_date', 'Payment date')</th>
          <th class="col-md-1 text-center" >@sortablelink('payment_mode', 'Payment Mode')</th>
          <!-- <th class="col-md-1 text-center" >@sortablelink('reverse_chargep', 'Reverse charge')</th> -->
          <th class="col-md-1 text-center" >@sortablelink('paid_amount', 'Paid Amount')</th>
          <th class="col-md-1 text-center" >@sortablelink('payment_type', 'Payment Type')</th>
          <th class="col-md-1 text-center">@sortablelink('payment_status', 'Status')</th>
        </tr>
      </thead>
            	
      <tbody id = "table">
        <!-- <p id = "demo"></p> -->
        <script>

        $(document).ready(function(){
          $(document).on('change','select[name="status"]',function(){
            var t = document.getElementsByName('status')[0].value;
            // document.getElementById("demo").innerHTML = "" +t;
            var xhttp = new XMLHttpRequest();
            xhttp.open("GET", "Payments?status="+t, true);
            xhttp.send();
            xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              var json=JSON.parse(this.responseText);
              //console.log(json);
              $("#table").empty();   //Empty Table
              var tr;
              for (var i = 0; i < json.length; i++) {
                //Display Data
                tr = $('<tr/>');
                tr.append("<td>" + json[i].invoice_type + "</td>");
                tr.append("<td>" + json[i].order_date + "</td>");
                // tr.append("<td>" + json[i].sales_type + "</td>");
                tr.append("<td>" + json[i].total_taxable_value + "</td>");
                tr.append("<td>" + json[i].total_discount + "</td>");
                tr.append("<td>" + json[i].total_tax_amount + "</td>");
                tr.append("<td>" + json[i].shipping_cost + "</td>");
                // tr.append("<td>" + json[i].round_off + "</td>");
                // tr.append("<td>" + json[i].total_amount + "</td>");
                // tr.append("<td>" + json[i].reverse_chargep + "</td>");
                tr.append("<td>" + json[i].payment_date + "</td>");
                tr.append("<td>" + json[i].payment_mode + "</td>");
                // tr.append("<td>" + json[i].reverse_charge+ "</td>");
                tr.append("<td>" + json[i].paid_amount + "</td>");
                tr.append("<td>" + json[i].payment_type + "</td>");
                tr.append("<td>" + json[i].payment_status + "</td>");
                //tr.append('</tr>'
                $('table tbody').append(tr);
              }
            }     
          }
        });
      });
    </script>
    
    <!--Display View-->
    @foreach($d as $Sale)
      <tr>
        <td class="col-md-1 text-center">{{ $Sale->invoice_type }}</td>
        <td class="col-md-1 text-center">{{ $Sale->order_date }}</td>
        <!-- <td class="col-md-1 text-center">{{ $Sale->sales_type }}</td> -->
        <td class="col-md-1 text-center">{{ $Sale->total_taxable_value }}</td>
        <td class="col-md-1 text-center">{{ $Sale->total_discount }}</td>
       
        <td class="col-md-1 text-center">{{ $Sale->total_tax_amount}}</td>
        <td class="col-md-1 text-center">{{ $Sale->shipping_cost}}</td>
        <!-- <td class="col-md-1 text-center">{{ $Sale->round_off}}</td>
        <td class="col-md-1 text-center">{{ $Sale->total_amount}}</td>
        <td class="col-md-1 text-center">{{ $Sale->reverse_chargep}}</td> -->
        <td class="col-md-1 text-center">{{ $Sale->payment_date}}</td>
        <td class="col-md-1 text-center">{{ $Sale->payment_mode}}</td>
        <!-- <td class="col-md-1 text-center">{{ $Sale->reverse_charge}}</td> -->
        <td class="col-md-1 text-center">{{ $Sale->paid_amount}}</td>
        <td class="col-md-1 text-center">{{ $Sale->payment_type}}</td>
        <td class="col-md-1 text-center">{{ $Sale->payment_status}}</td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection