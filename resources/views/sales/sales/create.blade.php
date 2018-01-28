@extends('layouts.entry')

@section('title', trans('general.title.new', ['type' => trans_choice('general.sales', 1)]))

@section('content')

<!-- Modal -->
<div id="customerModal" class="modal fade " style="z-index: 2500" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">New Customer Details</h4>
          
      </div>

      <div class="modal-body">
         
         {!! Form::open(array('action' => 'Sales\Customers@store1')) !!}

            {{ Form::textGroup('name', 'Name', 'id-card-o') }}
            
            {{ Form::selectGroup('customer_type','Customer Type','id-card-o', $customer_type) }}

            {{ Form::textGroup('gstin', 'GST No.', 'percent', []) }}
            
            {{ Form::textGroup('pan', 'PAN No.', 'id-badge', []) }}

            {{ Form::emailGroup('email_id', 'Email', 'envelope', []) }}

            {{ Form::textGroup('phone', 'Phone No.', 'phone', []) }}

            {{ Form::textareaGroup('address','Address') }}

            {{ Form::textGroup('city', 'City', 'home') }}

            {{ Form::selectGroup('state_id','State','home', $states) }}

            {{ Form::textGroup('country', 'Country', 'plane') }}

            {{ Form::textGroup('pin_code', 'Pin-Code', 'paperclip') }}

            {{ Form::textGroup('website', 'Website', 'globe',[]) }}

            {{ Form::selectGroup('business_type','Business Type','briefcase', $business_type) }}
   

      <div class="modal-footer">
       <!--  {{ Form::submit('Submit')}} -->

       <button type="submit" class="btn btn-success">Save</button>


        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="return false;">Close</button>
      </div>
      
        {!! Form::close() !!}

      </div>


    </div>

  </div>
</div>

<!-- Default box -->
  <div class="box box-success">
    {!! Form::open(['url' => 'sales/sales', 'files' => true, 'role' => 'form']) !!}

<div class="box-body">
        {{ Form::selectGroup('customer_id', 'Party Name', 'user', $customers) }}
         
         {{ Form::selectGroup('bank_branch', 'Bank Branch', 'university', $bank_branch) }} 
         <!--  params(id,label,favicon-name,array for foreach)  -->
        {{ Form::selectGroup('bank_account', 'Bank Account', 'university', $bank_accounts) }}

        {{ Form::textGroup('invoice_date', 'Invoice Date', 'calendar',['id' => 'invoice_date', 'class' => 'form-control datepicker', 'required' => 'required', 'data-inputmask' => '\'alias\': \'yyyy/mm/dd\'', 'data-mask' => ''], null) }}

        {{ Form::textGroup('order_date', 'Order Date', 'calendar',['id' => 'order_date', 'class' => 'form-control datepicker', 'required' => 'required', 'data-inputmask' => '\'alias\': \'yyyy/mm/dd\'', 'data-mask' => ''], null) }}

        {{ Form::textGroup('invoice_number', 'Invoice Number', 'file-text-o',[],$new_invoice_id) }}

        {{ Form::textGroup('order_id', 'Order ID', 'shopping-cart',[]) }}

        {{ Form::selectGroup('supply_state_id', 'Place of Supply', 'user', $states) }}
       

        <div class="form-group col-md-12">
            {!! Form::label('items', 'Items', ['class' => 'control-label']) !!}
            <div class="table-responsive">
                <table class="table table-bordered" style="font-size: 13px;" id="items">
                    <thead>
                        <tr style="background-color: #f9f9f9;">
                        
                            <th  colspan="1" rowspan="2" class="text-center">{{ 'Actions' }}</th>
                            <th   colspan="1" rowspan="2" class="text-center">{{ 'Name' }}</th>
                            <th  colspan="1" rowspan="2" class="text-center">{{ 'Extra Info' }}</th>
                                   
                            <th  colspan="1" rowspan="2" class="text-center">{{ 'Quantity' }}</th>
                            
                            <th  colspan="1" rowspan="1" class="text-center" >{{ 'Rate' }}</th>
                            <th  rowspan="1" colspan="1" class="text-center">{{ 'Discount' }}</th>
                            
                            <th  colspan="1" rowspan="2" class="text-center">{{ 'Tax Amount' }}</th>
                            <th  colspan="1" rowspan="2" class="text-center">{{ 'Total Amount' }}</th>
                            
                        </tr>
                        <tr style="background-color: #f9f9f9;">
                           <th colspan="1"  class="text-center">
                                <span style="float:left"> {{ Form::radio('rateType', '0' , true) }} Exc. GST</span>
                                <span style="float:right"> {{ Form::radio('rateType', '1') }} Inc. GST</span>
                            </th>



                            <th colspan="1" >
                               <span style="float:left"> {{ Form::radio('discountType', '0' , true) }}  "Rs" </span>
                                <span style="float:right">{{ Form::radio('discountType', '1') }} "%" </span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $item_row = 0; ?>
                        <tr id="item-row-{{ $item_row }}" class="item-row">

                            <!-- Delete Button -->
                            <td class="text-center" style="vertical-align: middle;">
                                <button type="button" onclick="$(this).tooltip('destroy'); $('#item-row-{{ $item_row }}').remove();rowsDetails[0]=null;itemCalculate();" data-toggle="tooltip" title="{{ trans('general.delete') }}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                            </td>

                            <!-- Item Name -->
                            <td>
                                <!-- <input class="form-control typeahead" required="required" placeholder="{{ 'Enter Item Name' }}" name="item[{{ $item_row }}][name]" type="text" id="item-name-{{ $item_row }}">
                                <input name="item[{{ $item_row }}][item_id]" type="hidden" id="item-id-{{ $item_row }}"> -->
                              <select id="item-name-{{ $item_row }}"  name="item[{{ $item_row }}][name]"  id="item-name-{{ $item_row }}" class="select2 items-dropdown">
                                <option disabled selected>Select Item</option>
                                 <?php
                                 foreach($items as $item){
                                    
                                   echo "<option value='".$item."'>".$item."</option>";
                                 }
                                 ?>
                                 
                                </select>
                                

                             
                            </td>

                            <!-- HSN Code -->
                            <td class="text-center">
                                 <span id="item-extra-info-0" class="extra-info-popup" data-toggle="popover" data-trigger="click" tabindex="0" data-placement="bottom" data-content='<button type="button" class="btn extra-info-modal" style="width:100%;background-color:#3C8DBC;color:white"  data-row="{{ $item_row }}">Edit</button><br><br>' data-html="true"><i style="font-size:1.5vw;color:blue" class="fa fa-cog fa-spin fa-3x fa-fw" aria-hidden="true"></i></span>
                                
                                
                            </td>

                            <!-- Item Type -->
                            

                            <!-- Quantity -->
                            <td>
                                <input class="form-control text-center quantity-class" required="required" name="item[{{ $item_row }}][quantity]" type="text" id="item-quantity-{{ $item_row }}">
                            </td>


                            <!-- Unit -->
                            

                            <!-- Rate -->
                            <td>
                                <input class="form-control text-right" required="required" name="item[{{ $item_row }}][price]" type="text" id="item-price-{{ $item_row }}">
                            </td>

                            <!-- Discount -->
                            <td>
                                <input class="form-control typeahead" required="required" placeholder="{{ 'Discount' }}" name="item[{{ $item_row }}][discount]" type="text" id="item-discount-{{ $item_row }}">
                                <input name="item[{{ $item_row }}][item_id]" type="hidden" id="item-id-{{ $item_row }}">
                            </td>
                            
                            <!-- GST ID -->
                            
   
                            <!-- Total Tax -->
                            <td class="text-right" style="vertical-align: middle;">
                                 <span id="item-tax-info-0" class="item-tax-info" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Please Select All Options First" data-html="true" style="float:left"><i style="font-size:1.5vw;color:blue" class="fa">&#xf129;</i></span>
                                <span id="item-total-tax-{{ $item_row }}">0</span>
                            </td>

                            <!-- Product Total -->
                            <td class="text-right" style="vertical-align: middle;">
                                <span id="item-total-{{ $item_row }}">0</span>
                                <input type="hidden" name="item[{{ $item_row }}][gst_id]" class="hidden-gst-id"/>
                                <input type="hidden" name="item[{{ $item_row }}][cess_id]" class="hidden-cess-id"/>
                            </td>

                       

                        </tr>

                        <?php $item_row++; ?>
                        <!-- Add Item Button -->
                        <tr id="addItem">
                            <td class="text-center"><button type="button" onclick="addItem();" data-toggle="tooltip" title="{{ trans('general.add') }}" class="btn btn-xs btn-primary" data-original-title="{{ trans('general.add') }}"><i class="fa fa-plus"></i></button></td>

                            <td class="text-right" colspan="7"></td>
                        </tr>

                        <tr>
                            <td class="text-right" colspan="7"><strong>{{ 'Total Taxable Value' }}</strong></td>

                            <td class="text-right"><span id="sub-total">0</span></td>
                        </tr>
                        <tr>
                            <td class="text-right" colspan="7"><strong>{{ 'Total Tax Amount' }}</strong></td>

                            <td class="text-right"><span id="tax-total">0</span></td>
                        </tr>
                        <tr>
                            <td class="text-right" colspan="7"><strong>{{ 'Total Invoice Amount' }}</strong></td>

                            <td class="text-right"><span id="grand-total">0</span></td>
                        </tr>
                    </tbody>
                        
                </table>
            </div>
        </div>
        {{ Form::textareaGroup('notes', trans_choice('general.notes', 2)) }}

        {{ Form::fileGroup('attachment', trans('general.attachment')) }}
        <input type="hidden" name="table-object" id="table-object">
        <input type="hidden" name="common-object" id="common-object">

    </div>
    <!-- /.box-body -->
     
    <div class="box-footer">
        &nbsp; &nbsp; &nbsp;<input type="checkbox" name="payment_status" value="1" />
      <label>Payment Complete</label><br><br>
        {{ Form::saveButtons('sales/sales') }}
    </div>
    <!-- /.box-footer -->

    {!! Form::close() !!}


    <!-- Modal -->
<div id="add-item-Modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Item</h4>
      </div>
      <div class="modal-body">
        <form class="add-item-form">
            <div class="box-body">
                {{ Form::textGroup('name', 'Item Name' , 'id-card-o') }}

                {{ Form::textGroup('sku', 'Item SKU' , 'key') }}

                {{ Form::selectGroup('hsn', 'HSN Code' , 'barcode', $hsn, '00000000' , []) }}

                {{ Form::selectGroup('unit_id', 'Unit' , 'balance-scale', $units, '59', []) }}

                {{ Form::itemTypeGroup('type', 'Item Type' ) }}

                 <div class="col-md-6">
                 <input type="checkbox" name="manage_inventory" value="1" />&nbsp;<label>Manage Inventory</label>
                     
                 </div>

                {{ Form::textareaGroup('details', 'Item Details') }}
                <div style="float:right">
             <input type="submit" name="submit" value="Save" class="btn btn-success"/>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>
             
        </form>
      </div>
      
    </div>

  </div>
</div>


    <!-- Modal -->
<div id="item-details-Modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Item Details</h4>
      </div>
      <div class="modal-body">
        <form>
            <div class="box-body">
              {!! Form::select('item[' . $item_row . '][tax_id]', $hsn , 'HSN Code', ['class' => 'select2 hsn-code', 'placeholder' => 'Select HSN']) !!} 
              <br>
              <br>
               <select class="select2 item-type-class no-ajax" required="required"  name="type">
                                    
                                    <option value="Goods">Goods</option>
                                    <option value="Services">Services</option>
                </select>
                   <br>
                   <br>
                  {!! Form::select('unit_modal', $units , 'UNIT', ['class' => 'select2 unit-class no-ajax', 'placeholder' => 'Select Unit']) !!}

                     <br>
                     <br>
                   {!! Form::select('gst', $gst , 'GST', ['class' => 'select2 gst-type no-ajax', 'placeholder' => 'Select GST']) !!}
                     <br>
                      <br>

                    {!! Form::select('cess', $cess , 'Cess', ['class' => 'select2 cess-type no-ajax', 'placeholder' => 'Select CESS']) !!}


             
            </div>
             </form>
           <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Done</button>
            </div>
      </div>
      
    </div>

  </div>
</div>


   
@endsection



@section('js')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Select2 -->
    <script src="{{ asset('dist/js/select2.full.min.js') }}"></script>
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('js/bootstrap-datepicker.min.js') }}">
    <script src="{{ asset('js/bootstrap-fancyfile.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
@endsection

@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-fancyfile.css') }}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<style type="text/css">
.input-group .select2-container,#item-details-Modal .select2-container,td .select2-container  {
  width:100% !important;  
}
.item-row td:nth-child(2){
  width:30%;
}
   #item-details-Modal input.form-control,td input.form-control{
        border-radius: 4%;
        height:4.2vh;
        border-color: grey;

    }

    th{
        font-size: 1.8vh;
    }
    th[rowspan]{
    vertical-align: top !important;
}

.select2-results a:hover{
background-color:#5897FB !important;
color:white;

}

.fa-cog:hover{
    font-size: 2vw !important;
    cursor:pointer;
}

.invoice_number,.order_id{
  display:none;
 
}









</style>

@endsection



@section('scripts')
    <script type="text/javascript">
        var item_row = '{{ $item_row }}';
        console.log(item_row);
        var itemsArray=new Array();

        var ogRow;
        var visible=-1;
        var rowsDetails={};
//console.log(rowsDetails);

        function addItem() {
            html  = '<tr id="item-row-'+item_row+'" class="item-row"><td class="text-center" style="vertical-align: middle;"><button type="button" onclick="$(this).tooltip(\'destroy\'); $(\'#item-row-'+item_row+'\').remove();rowsDetails['+item_row+']=null;itemCalculate();" data-toggle="tooltip" title=\'{{ trans("general.delete") }}\' class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button></td><td><select id="item-name-'+item_row+'"  name="item['+item_row+'][name]"  id="item-name-'+item_row+'" class="select2 items-dropdown"><option disabled selected>Select Item</option></select></td><td class="text-center"><span id="item-extra-info-'+item_row+'" class="extra-info-popup" data-toggle="popover" data-trigger="click" tabindex="0" data-placement="bottom" data-content=\'<button type="button" class="btn extra-info-modal" style="width:100%;background-color:#3C8DBC;color:white"  data-row="'+item_row+'">Edit</button><br><br>\' data-html="true"><i style="font-size:1.5vw;color:blue" class="fa fa-cog fa-spin fa-3x fa-fw" aria-hidden="true"></i></span></td><td><input class="form-control text-center quantity-class" required="required" name="item['+item_row+'][quantity]" type="text" id="item-quantity-'+item_row+'"></td><td><input class="form-control text-right" required="required" name="item['+item_row+'][price]" type="text" id="item-price-'+item_row+'"></td><td><input class="form-control typeahead" required="required" placeholder=\'{{ "Discount" }}\' name="item['+item_row+'][discount]" type="text" id="item-discount-'+item_row+'"><input name="item['+item_row+'][item_id]" type="hidden" id="item-id-'+item_row+'"></td><td class="text-right" style="vertical-align: middle;"><span id="item-tax-info-'+item_row+'" class="item_tax-info" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Please Select All Options First" data-html="true" style="float:left"><i style="font-size:1.5vw;color:blue" class="fa">&#xf129;</i></span><span id="item-total-tax-'+item_row+'">0</span></td><td class="text-right" style="vertical-align: middle;"><span id="item-total-'+item_row+'">0</span><input type="hidden" name="item['+item_row+'][gst_id]" class="hidden-gst-id"/><input type="hidden" name="item['+item_row+'][cess_id]" class="hidden-cess-id"/></td></tr>';
            $('#items tbody #addItem').before(html);

                       $(document).ready(function() {
    console.log("bind");
    $('td .select2').select2();
     $("#item-tax-info-"+item_row).popover();
     $('#item-extra-info-'+item_row).popover();

});
            item_row++;
        }



       $(document).ready(function(){
            //Date picker

     var initialLength=$('#item-name-0')[0].options.length;
    for(var i=0;i<initialLength;i++){
      itemsArray.push($('#item-name-0')[0].options[i].value);
    }

    console.log(itemsArray);



            $('.datepicker').datepicker({
                dateFormat: 'yy-mm-dd',
                autoclose: true
            });


            //$('#vendor_id').select2($("<option value=\"add_item\"><b>Add Vendor</b></option>"));

            
            //Select2 For Vendor ID
            $('#customer_id').select2({
                placeholder: "{{ 'Select Customer' }}",
            })
            .on("select2:select", function(e) { 
                   // what you would like to happen
                   // if($(this).val() == "add_item")
                   //    alert("Here it IS!");

                  $.ajax({
                url: '{{ url("sales/customerInfo") }}',
                type: 'POST',
                dataType: 'JSON',
                data: {'customer_id':$(this).val()},
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                success: function(data) {
                     
                    if (data) {
                        //$('#supply_state_id').select2("val", data[0]);
                        $('#supply_state_id').val(data[0]).trigger('change.select2');// for changing the values in select2 tag
                        //console.log(data[0]);

                       itemCalculate();
                    }
                }
            });


            })
            .on('select2:open', () => {
                    $(".select2-results:not(:has(a))").append('<a href="" data-toggle="modal" data-target="#customerModal" style="padding: 6px;height: 20px;display: inline-table;width:100%">Add New</a>');
            });



            //Select2 For State ID
            $('#supply_state_id').select2({
                placeholder: "{{ 'Select Supply State' }}",
            }).on("select2:select", function(e) { 
                   // what you would like to happen
                   var selectedOption = ($(e.currentTarget).val());
                   //console.log(selectedOption);
                   itemCalculate();
            });

            //$(document).on('click', '#add, #select2-results-2, .select2-results,.select2-drop', function(){
            //    alert();
            //});
            


            $(document).on('click', '.form-control.typeahead', function() {
                input_id = $(this).attr('id').split('-');

                item_id = parseInt(input_id[input_id.length-1]);

                itemCalculate();

                $(this).typeahead({
                    minLength: 3,
                    displayText:function (data) {
                        return data.name;
                    },
                    source: function (query, process) {
                        $.ajax({
                            url: autocomplete_path,
                            type: 'GET',
                            dataType: 'JSON',
                            data: 'query=' + query + '&type=invoice&currency_code=' + $('#currency_code').val(),
                            success: function(data) {
                                return process(data);
                            }
                        });
                    },
                    afterSelect: function (data) {
                        $('#item-id-' + item_id).val(data.item_id);
                        $('#item-quantity-' + item_id).val('1');
                        $('#item-price-' + item_id).val(data.sale_price);
                        $('#item-tax-' + item_id).val(data.tax_id);

                        // This event Select2 Stylesheet
                        $('#item-tax-' + item_id).trigger('change');

                        $('#item-total-' + item_id).html(data.total);

                        itemCalculate();
                    }
                });
            });

            //When any Item data is changed
            $(document).on('keyup', '#items tbody .form-control', function(){
                itemCalculate();
            });

          

            $(document).on('change', '#customer_id', function (e) {
                $.ajax({
                    url: '{{ url("sales/customers") }}',
                    type: 'GET',
                    dataType: 'JSON',
                    data: 'customer_id=' + $(this).val(),
                    success: function(data) {
                        $('#currency_code').val(data.currency_code);

                        // This event Select2 Stylesheet
                        $('#currency_code').trigger('change');
                    }
                });
            });
        });

       $(document).on('click','input[name="rateType"],input[name="discountType"]',function(){
        itemCalculate();
       });


       function itemCalculate() {
        var row;
            $.ajax({
                url: '{{ url("items/items/itemCalculate") }}',
                type: 'POST',
                dataType: 'JSON',
                data: $('#supply_state_id, input[name=\'discountType\']:checked, #items input[type=\'text\'],#items input[type=\'hidden\'], #items textarea,input[name=\'rateType\']:checked'),
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                success: function(data) {
                    if (data) {
                         console.log(data);
                        $.each( data.items, function( key, itemData ) {
                            $.each( itemData , function (attr , subvalue) {
                                if(attr == 'total')
                                    $('#item-total-' + key).html(subvalue);
                                if(attr == 'totalTax')
                                    $('#item-total-tax-' + key).html(subvalue);
                            //$('#item-total-tax-' + key).html(subvalue);
                            //$('#item-total-' + key).html(subvalue);
                      
                             
                            });
                       rowsDetails[key].cgst=data.items[key].cgst;
                       rowsDetails[key].sgst= data.items[key].sgst;
                       rowsDetails[key].ugst=data.items[key].ugst; 
                       rowsDetails[key].igst=data.items[key].igst;
                       rowsDetails[key].cess_amount=data.items[key].cess;
                       rowsDetails[key].unit_price=(parseInt(data.items[key].taxableValue)+parseInt(data.items[key].discount));
                       rowsDetails[key].discount=parseInt(data.items[key].discount);  
                      $("#item-tax-info-"+key).attr("data-content","Taxable<br>Value:"+data.items[key].taxableValue+"<br>CGST:"+data.items[key].cgst+"<br>SGST:"+data.items[key].sgst+"<br>IGST:"+data.items[key].igst+"<br>UGST:"+data.items[key].ugst+"<br>Cess:"+data.items[key].cess).data('bs.popover').setContent();      
                            
                        });
                        
                        $('#sub-total').html(data.sub_total);
                        $('#tax-total').html(data.tax_total);
                        $('#grand-total').html(data.grand_total);
                         //used for reinitializing the popover element after changing content
                        //console.log(rowsDetails[0]);
                    }
                }
            });
        }
     


//This method uses element having class:'item-name-class' and autofills the item information 
//It is the first input of every row in items html table
  


     $(document).ready(function(){
        
     $(".item-tax-info").popover();
     $('.extra-info-popup').popover();
});

$(document).on('change','.hsn-code',function(){

rowsDetails[ogRow].hsn=$(this).val();


$.ajax({
                url: '{{ url("items/hsn") }}',
                type: 'POST',
                dataType: 'JSON',
                data: {'hsn_code':$(this).val()},
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                success: function(data) {
                     
                    if (data) {
                        console.log(data);
                       
                      $('#item-details-Modal select')[1].value=data[0]['item_type'];
                      $('#item-details-Modal select')[3].value=data[0]['gst_id'];
                      $('#item-details-Modal select')[4].value=data[0]['cess_id'];
                      $('input[name="item['+ogRow+'][gst_id]"]').val(data[0]['gst_id']);
                      $('input[name="item['+ogRow+'][cess_id]"]').val(data[0]['cess_id']);
                      rowsDetails[ogRow].gst=data[0]['gst_id'];
                      rowsDetails[ogRow].cess=data[0]['cess_id'];
                      rowsDetails[ogRow].type=data[0]['item_type'];
                      //console.log(data);
                      //console.log(rowsDetails);
                       $('#item-details-Modal .select2').trigger('change.select2');

                       itemCalculate();
                    }
                }
            });

});  
   

$(document).ready(function() {
    $('#item-details-Modal .select2').select2();
    $('td .select2').select2();
    $('#bank_branch,#company_name,#bank_account').select2();
});



$(document).ready(function() {
    $('#items').on('select2:select','.items-dropdown',function(){
  
   var row = $(this).parent().parent().attr('id').split("-");
   row=row[row.length-1];
    
    var itemName=$("#item-name-"+row).val();
    //console.log(itemName);
   

    var xml=new XMLHttpRequest();
     xml.onreadystatechange=function(){
      if(this.readyState==4 && this.status==200){
        var item_details=JSON.parse(this.responseText);
        console.log(item_details);
        if(Object.keys(item_details).length>0){// Object.keys(item_details).length used to calculate length of object 
         rowsDetails[row]=item_details;
         $('input[name="item['+row+'][gst_id]"]').val(rowsDetails[row]['gst']);
         $('input[name="item['+row+'][cess_id]"]').val(rowsDetails[row]['cess']);
         //console.log(row);
         //console.log(rowsDetails);
        itemCalculate();


               
      }
      }        
     };
     xml.open("GET","{{  url('sales/autofill')  }}?item="+itemName,true);
     xml.send();


    });
});


$(document).on('submit','.add-item-form',function(event){
event.preventDefault();
$.ajax({
                url: '{{ url("/items/ajaxStore") }}',
                type: 'POST',
                dataType: 'JSON',
                data: $('input[name="name"],input[name="sku"],#hsn,#unit_id,input[name="type"]:checked,#details,input[name="manage_inventory"]'),
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                success: function(data) {
                     
                    if (data) {
                      //console.log(data);

                    rowsDetails[ogRow]=data;
               
          itemsArray.push(data.name);         
        
         var option = new Option(data.name,data.name, true, true);  // Option(innerHTML,value,selected,actual Selection)
         $('#item-name-'+globalRow).append(option);

          $('.select2').trigger('change.select2'); //for updating select2 selected option
          $('#add-item-Modal').modal('hide');
          itemCalculate();
                    }
                }
            });
});

$(document).ready(function(){ //function for adding a "Add new Button in options of select2"
$('#items').on('select2:open','.items-dropdown', () => {
  //console.log("first");
        $(".select2-results:not(:has(a))").append("<a href='#' data-row="+ogRow+" class='add-new-item' style='padding: 2px;height: 20px;display: inline-table;width:100%'>Add new item</a>");
});

});


$(document).on('click','.add-new-item',function(){


        globalRow=$(this).attr("data-row");
        console.log(globalRow);
        $('#add-item-Modal form').trigger('reset'); //for resetting values
        $('#type_1').css({"background-color":"#E7E7E7","color":"black"});
        $('#type_0').css({"background-color":"#E7E7E7","color":"black"}); //for resetting the radio button in modal
        $('#type_0').removeClass("active");
        $('#type_1').removeClass("active");
        $('#item-name-'+globalRow).select2('close');
        $('#add-item-Modal').modal();
        ogRow=globalRow; //for accessing the unique row number in modal
        
        
    

});

$(document).ready(function(){
$(".item-type-class").select2({
    minimumResultsForSearch: Infinity,
    placeholder:"Select Type",  
});
});

$(document).ready(function(){
$('.radio-inline').on('click','label',function(){
if($(this).attr('id')=="type_0"){
  $(this).css({"background-color":"#398439","color":"white"});
  $('#type_1').css({"background-color":"#E7E7E7","color":"black"});
}
else{
$(this).css({"background-color":"#3C8DBC","color":"white"});
  $('#type_0').css({"background-color":"#E7E7E7","color":"black"});
}
});
});

$(document).on('mouseover','.add-new-item',function(){
    //console.log("lol");
$('.select2-results__option').removeClass('select2-results__option--highlighted');
});







$(document).on('click','.extra-info-modal',function(){


        globalRow=$(this).attr("data-row");
        $('#item-details-Modal .select2').val("").trigger('change.select2'); //for resetting values
        //console.log("modal");
        if(!rowsDetails[globalRow]){
      alert("Please Select Item First");
      return;
        }
        $('#item-details-Modal').modal();
        //$('#item-extra-info-'+globalRow).trigger('click');
       
        if(rowsDetails[globalRow]){
            //console.log("if")
          $('#item-details-Modal select')[0].value=rowsDetails[globalRow].hsn;
          $('#item-details-Modal select')[1].value=rowsDetails[globalRow].type;
          $('#item-details-Modal select')[2].value=rowsDetails[globalRow].unit_id;
          $('#item-details-Modal select')[3].value=rowsDetails[globalRow].gst;
          $('#item-details-Modal select')[4].value=rowsDetails[globalRow].cess;
          $('#item-details-Modal select').trigger('change.select2');
        }

        ogRow=globalRow;// tells modal opened for which row in table
        //console.log(ogRow);
        
    

});
$(document).ready(function(){
$('#items').on('shown.bs.popover','.extra-info-popup', function () {
  // do something…
  console.log("popup");
  
   var row=$(this).parent().parent().attr("id").split("-");
   row=row[row.length-1];
   visible=row;
    //console.log(rowsDetails[row]);
        if(rowsDetails[row]){
          var unit=$('select[name="unit_modal"]')[0].options[parseInt(rowsDetails[row].unit_id)+1].innerHTML;
          var gst=$('select[name="gst"]')[0].options[parseInt(rowsDetails[row].gst)+1].innerHTML;
          var cess=$('select[name="cess"]')[0].options[parseInt(rowsDetails[row].cess)+1].innerHTML;

       $(this).attr("data-content",'SKU:'+rowsDetails[row].sku+'<br>HSN:'+rowsDetails[row].hsn+'<br>Type:'+rowsDetails[row].type+'<br>Unit:'+unit+'<br>GST Type:'+gst+'<br>Cess Type:'+cess+'<br><br><button type="button" class="btn extra-info-modal" style="width:100%;background-color:#3C8DBC;color:white"  data-row='+row+'>Edit</button>').data('bs.popover').setContent();

        }
   
});
});

$(document).on('change','#item-details-Modal .no-ajax',function(){
rowsDetails[ogRow][$(this).attr("name")]=$(this).val();//changing values of changed element in extra info modal in rowsDetails using their name attributes 
//console.log(rowsDetails);
if($(this).attr("name")=="gst"){
    $('input[name="item['+ogRow+'][gst_id]"]').val(rowsDetails[ogRow]['gst']);
}
else if($(this).attr("name")=="cess"){
$('input[name="item['+ogRow+'][cess_id]"]').val(rowsDetails[ogRow]['cess']);
}
itemCalculate();
});


$(document).ready(function(){
$('#items').on('select2:opening','.items-dropdown',function(){
    var row = $(this).parent().parent().attr('id').split('-');
   row=row[row.length-1];
   ogRow=row;
   var selected=$(this).val();
   //console.log(row);
   $(this).html("");
   var len=itemsArray.length;
   for(var i=0;i<len;i++){
    $(this).append('<option value="'+itemsArray[i]+'" >'+itemsArray[i]+'</option>');
   }

   $(this).val(selected);
   $(this).trigger('change.select2');

});


$('.box-success>form').on('click','button[type="submit"]',function(event){
//event.preventDefault();

commonDetails={total_discount:0,cgst:0,ugst:0,sgst:0,igst:0,cess:0};
var nrows=Object.keys(rowsDetails).length;
for(var i=0;i<(nrows);i++){
  if(rowsDetails[i+""]==null){
    continue;
  }
  rowsDetails[i+""].quantity=$('#item-row-'+i)[0].cells[3].children[0].value;
  rowsDetails[i+""].unit_price=(rowsDetails[i+""].unit_price*1.0)/rowsDetails[i+""].quantity;
//   if($('input[name="discountType"]:checked')[0].value==0){
//   rowsDetails[i+""].discount=$('#item-row-'+i)[0].cells[5].children[0].value;
// }
// else{

//  rowsDetails[i+""].discount=(parseInt($('#item-row-'+i)[0].cells[5].children[0].value)/100.0)*rowsDetails[i+""].unit_price*rowsDetails[i+""].quantity; 

// }
  rowsDetails[i+""].tax_amount=$('#item-total-tax-'+i).text();
  rowsDetails[i+""].name=$('#item-name-'+i).val();
  rowsDetails[i+""].total_amount=$('#item-total-'+i).text();
  rowsDetails[i+""].taxable_value=parseInt(rowsDetails[i+""].quantity)*parseInt(rowsDetails[i+""].unit_price)-rowsDetails[i+""].discount;
  commonDetails['total_discount']+=parseInt(rowsDetails[i+""].discount);
  commonDetails['cgst']+=parseInt(rowsDetails[i+""].cgst);
  commonDetails['ugst']+=parseInt(rowsDetails[i+""].ugst);
  commonDetails['sgst']+=parseInt(rowsDetails[i+""].sgst);
  commonDetails['igst']+=parseInt(rowsDetails[i+""].igst);
  commonDetails['cess']+=parseInt(rowsDetails[i+""].cess_amount);
  commonDetails['ecommerce_vendor_id']=0;
}

//console.log(rowsDetails);



commonDetails['customer_id']=$('#customer_id').val();
commonDetails['invoice_date']=$('#invoice_date').val();
commonDetails['invoice_number']=$('#invoice_number').val();
commonDetails['order_id']=$('#order_id').val();
commonDetails['supply_state_id']=$('#supply_state_id').val();
commonDetails['total_taxable_value']=$('#sub-total').text();
commonDetails['total_tax_amount']=$('#tax-total').text();
commonDetails['total_amount']=$('#grand-total').text();
commonDetails['notes']=$('#notes').val();
commonDetails['round_off']=Math.round(parseFloat($('#grand-total').text()));
commonDetails['shipping_cost']=0;
commonDetails['order_date']=$('#order_date').val();
//console.log(commonDetails);
//console.log(rowsDetails);
$('#common-object').val(JSON.stringify(commonDetails));
$('#table-object').val(JSON.stringify(rowsDetails));
//console.log($('#common-object').val());
//console.log($('#table-object').val());
});


//below function for managing the hiding of popup on clicking anywhere
$(document).click(function(){
  if(visible>-1){
    var tvisible=visible;
    visible=-1;
    $('#item-extra-info-'+tvisible).trigger('click');
     
  }
});

$('tbody').on('click','.extra-info-popup',function(event){
  console.log("called");
  if(visible>-1){
    var tvisible=visible;
    visible=-1;
   $('#item-extra-info-'+tvisible).trigger('click');
      
  }
 event.stopPropagation();
});


$('input[name="invoice_number"],input[name="order_id"]').blur(function(){
  var id=$(this).attr('id');
  var val=$(this).val();
$.ajax({
  url:'{{ url("sales/invoice_order_check")  }}',
  type:"POST",
  data:{'id':id,'val':val},
  dataType:"text",
  headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
  success:function(data){
  //console.log(data);
  if(data==1){
   $('.'+id).css({display:'inline',color:'red'});
  }
  else{
    $('.'+id).css({display:'none'});
  }
  }
});
});

$('#items').on('blur','.quantity-class',function(){
  var elem=$(this);
  var quantity=$(this).val();
  var row=$(this).parent().parent().attr('id').split('-')[2];
$.ajax({
url:'{{ url("sales/quantity") }}',
type:'GET',
dataType:"text",
data:{'quantity':quantity,'sku':rowsDetails[row].sku},
success:function(data){
if(data=='-1'){
  elem.val("");
  alert("Item Does Not Exist In Inventory!");
}
else if(data!='Ok'){
  elem.val("");
  alert("Only "+data+" Units Remaining!");
}
}
});


});



  });



    </script>
@endsection