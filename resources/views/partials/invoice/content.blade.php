<table class="table">
	<thead>
		<tr><th>Item Name</th>
		<th>HSN CODE</th>
		<th>Discount</th>
		<th>Qunatity</th>
		<th>Price</th>
		<th>Amount</th>
	</tr>
	</thead>
	<tbody>
<?php
$tquantity=0;
$tgst=$sale["sgst"]+$sale["cgst"]+$sale["ugst"]+$sale["igst"];
foreach($items as $item){
echo '<tr>
<td>'.$item['name'].'</td> 
<td>'.$item['hsn'].'</td>
<td>'.$item['discount'].'</td>
<td>'.$item['quantity'].'</td>
<td>'.$item['unit_price'].'</td>
<td>'.$item['taxable_value'].'</td>
</tr>';
$tquantity+=$item['quantity'];
}
?>
<tr>
	<td><b>Total</b></td>
	<td></td>
	<td>Discount : {{ $sale["total_discount"] }}</td>
	<td>Quantity: {{ $tquantity }}</td>
	<td></td>
	<td>Amount:  {{ $sale["total_taxable_value"] }}</td>
</tr>
	</tbody>
</table>
<div class="row tax-info">
	<div class="col-xs-6">
		<p><strong>Bank Details:</strong></p>
        <p>Building 6A, Shop No.5,Ashok Nagar,Bhiwandi,Mumbai, India</p>
	</div>
	
	<div class="col-xs-5">
		<p><strong>Total Value Before Tax:</strong>{{ $sale["total_taxable_value"] }}<p>
		<strong>GST :</strong><br>
         @if($sale["sgst"]>0)
         	<p><b>sgst</b> : {{ $sale["sgst"] }}</p>
         	@endif
         @if($sale["cgst"]>0)
         <p><b>cgst</b> : {{ $sale["cgst"] }}</p>
         @endif
         @if($sale["igst"]>0)
         <p><b>igst</b> : {{ $sale["igst"] }}</p>
         @endif
         @if($sale["ugst"]>0)
         <p><b>ugst</b> : {{ $sale["ugst"] }}</p>
		@endif
		<p><strong>Total GST :</strong>  {{ $tgst }}</p>
		<p><strong>Total Value After Tax :</strong>  {{ $sale["total_amount"] }}</p>
		<strong>Net Round Off Value:</strong>
		{{ $sale["round_off"]  }}
	</div>
</div>
