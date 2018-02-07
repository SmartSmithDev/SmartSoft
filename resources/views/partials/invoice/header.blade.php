
<header>
		<h3 class="invoice-header">Tax Invoice</h3>
<div class="company-info">
	<h1>Smart Smith</h1>
	<p class="address">Building 6A, Shop No.5,Ashok Nagar,Bhiwandi,Mumbai, India|<span class="phoneno">+91 8080568008</span></p>
	<p class="email"><strong>Email Id :</strong>contact@smartsmith.in</p>
</div>
<div class="seller-info row">
	<p class="col-xs-3"><strong>GSTIN: 3827595789259237</strong></p>
	<p class="col-xs-3"><strong>PAN NO. : AAD2424242G</strong></p>
	<p class="col-xs-3"><strong>STATE : Maharashtra</strong></p>
</div>	
<div class="row general-info">
<div class="col-xs-6 order-details">
<p><b>Reverse Charge: No</b></p>
<p><b>Invoice No: </b>{{ $sale['invoice_number'] }}</p>
<p><b>Invoice Date: </b>{{ $sale['invoice_date']  }}</p>
<p><b>Order No :  </b>{{ $sale['order_id'] }}</p>
<p><b>Order Date :  </b>{{ $sale['order_date'] }}</p>
</div>
<div class="col-xs-5 transport-details">
	<p><b>Transport Name:</b></p>
	<p><b>Weight:</b></p>
	<p><b>Place Of Supply:</b></p>
</div>
</div>
</header>
