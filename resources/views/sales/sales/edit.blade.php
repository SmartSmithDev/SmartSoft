@extends('layouts.admin')

@section('title', trans('general.title.edit', ['type' => trans_choice('general.sales', 1)]))

@section('content')

<?php 

$item_row=0;


?>



<!-- Modal -->
{!! Form::open(array('action' => 'Sales\Customers@store1')) !!}
 
{!! General::modal('New Customer Details','customerModal',[
        
         Form::textGroup('name', 'Name', 'id-card-o'),
        
         Form::selectGroup('customer_type','Customer Type','id-card-o', $customer_type),
        
         Form::textGroup('gstin', 'GST No.', 'percent', []),  
        
         Form::textGroup('pan', 'PAN No.', 'id-badge', []),

         Form::emailGroup('email_id', 'Email', 'envelope', []),

         Form::textGroup('phone', 'Phone No.', 'phone', []),

         Form::textareaGroup('address','Address'),

         Form::textGroup('city', 'City', 'home'),

         Form::selectGroup('state_id','State','home', $states),

         Form::selectGroup('country', 'Country', 'plane', $countries),

         Form::textGroup('pin_code', 'Pin-Code', 'paperclip'),

         Form::textGroup('website', 'Website', 'globe',[]),

         Form::selectGroup('business_type','Business Type','briefcase', $business_type)],'Save','success','new_customer')  !!}

{!! Form::close() !!}

<!-- Default box -->
  <div class="box box-success">
    {!! Form::open(['url' => 'sales/sales/'.$sale->id, 'files' => true, 'role' => 'form','method'=>'PUT']) !!}

<div class="box-body">
        {{ Form::selectGroup('customer_id', 'Party Name', 'user', $customers,$sale->customer_id) }}
         
         {{ Form::selectGroup('bank_branch', 'Bank Branch', 'university', $bank_branch,$sale->company_branch_id) }} 
         <!--  params(id,label,favicon-name,array for foreach)  -->

         {{ Form::selectGroup('bank_account', 'Bank Account', 'university', $bank_accounts,$sale->company_account_id) }}
        
        {{ Form::textGroup('invoice_date', 'Invoice Date', 'calendar',['id' => 'invoice_date', 'class' => 'form-control datepicker', 'required' => 'required', 'data-inputmask' => '\'alias\': \'yyyy/mm/dd\'', 'data-mask' => ''],$sale->invoice_date) }}

        {{ Form::textGroup('order_date', 'Order Date', 'calendar',['id' => 'order_date', 'class' => 'form-control datepicker', 'required' => 'required', 'data-inputmask' => '\'alias\': \'yyyy/mm/dd\'', 'data-mask' => ''],$sale->order_date) }}

        {{ Form::textGroup('invoice_number', 'Invoice Number', 'file-text-o',[],$sale->invoice_number) }}

        {{ Form::textGroup('order_id', 'Order ID', 'shopping-cart',[],$sale->order_id) }}

        {{ Form::selectGroup('supply_state_id', 'Place of Supply', 'user', $states,$sale->supply_state_id) }}
       

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
                        @foreach($sales_items as $item)
                        <tr id="item-row-{{ $item_row }}" class="item-row">

                            <!-- Delete Button -->
                            <td class="text-center" style="vertical-align: middle;">
                                <button type="button" onclick="$(this).tooltip('destroy'); $('#item-row-{{ $item_row }}').remove();rowsDetails[0]=null;itemCalculate();" data-toggle="tooltip" title="{{ trans('general.delete') }}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                            </td>

                            <!-- Item Name -->
                            <td class="text-center">
                            
                              <select id="item-name-{{ $item_row }}"  name="item[{{ $item_row }}][name]"  id="item-name-{{ $item_row }}" class="select2 items-dropdown">
                                <option >Select Item</option>
                                 <?php
                                 foreach($items as $id=>$name){
                                   if($name==$item->item_name){
                                    echo "<option value='".$id."' selected>".$name."</option>";
                                   } 
                                   else{
                                   echo "<option value='".$id."'>".$name."</option>";
                                    }
                                 }
                                 ?>
                                 
                                </select>
                                
                              
                               
                            </td>

                            <!-- HSN Code -->
                            <td class="text-center">
                                 <span id="item-extra-info-{{ $item_row }}" class="extra-info-popup" data-toggle="popover" data-trigger="click" tabindex="0" data-placement="bottom" data-content='<button type="button" class="btn extra-info-modal" style="width:100%;background-color:#3C8DBC;color:white"  data-row="{{ $item_row }}">Edit</button><br><br>' data-html="true"><i style="font-size:1.5vw;color:blue" class="fa fa-cog fa-spin fa-3x fa-fw" aria-hidden="true"></i></span>
                                
                                
                            </td>

                            <!-- Item Type -->
                            

                            <!-- Quantity -->
                            <td>
                                <input class="form-control text-center quantity-class" required="required" name="item[{{ $item_row }}][quantity]" type="text" id="item-quantity-{{ $item_row }}" value="{{ $item->quantity }}">
                            </td>


                            <!-- Unit -->
                            

                            <!-- Rate -->
                            <td>
                                <input class="form-control text-right" required="required" name="item[{{ $item_row }}][price]" type="text" id="item-price-{{ $item_row }}"
                                value="{{ $item->unit_price }}">
                            </td>

                            <!-- Discount -->
                            <td>
                                <input class="form-control typeahead" required="required" placeholder="{{ 'Discount' }}" name="item[{{ $item_row }}][discount]" type="text" id="item-discount-{{ $item_row }}" value="{{ $item->discount }}" >
                                <input name="item[{{ $item_row }}][item_id]" type="hidden" id="item-id-{{ $item_row }}">
                            </td>
                            
                            <!-- GST ID -->
                            
   
                            <!-- Total Tax -->
                            <td class="text-right" style="vertical-align: middle;">
                                 <span id="item-tax-info-{{$item_row }}" class="item-tax-info" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Please Select All Options First" data-html="true" style="float:left"><i style="font-size:1.5vw;color:blue" class="fa">&#xf129;</i></span>
                                <span id="item-total-tax-{{ $item_row }}">0</span>
                            </td>

                            <!-- Product Total -->
                            <td class="text-right" style="vertical-align: middle;">
                                <span id="item-total-{{ $item_row }}">0</span>
                                <input type="hidden" name="item[{{ $item_row }}][gst_id]" class="hidden-gst-id" value="{{ $item->gst_id }}" />
                                <input type="hidden" name="item[{{ $item_row++ }}][cess_id]" class="hidden-cess-id" value="{{ $item->cess_id }}"/>
                            </td>

                       

                        </tr>
                         
                       

                         
                         @endforeach
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
        {{ Form::textareaGroup('notes', trans_choice('general.notes', 2), $sale->notes) }}

        {{ Form::fileGroup('attachment', trans('general.attachment')) }}
        <input type="hidden" name="table-object" id="table-object">
        <input type="hidden" name="common-object" id="common-object">

    </div>
    <!-- /.box-body -->
     
    <div class="box-footer">
        &nbsp; &nbsp; &nbsp;<input type="checkbox" name="payment_status" value="1" <?php if($sale->payment_status=="Completed"){ echo "checked"; }  ?> />
      <label>Payment Complete</label><br><br>
        {{ Form::saveButtons('sales/sales') }}
    </div>
    <!-- /.box-footer -->

    {!! Form::close() !!}


    <!-- Modal -->
  <form class="add-item-form">
{!! General::modal('Add Item',"add-item-Modal",[  Form::textGroup('name', 'Item Name' , 'id-card-o'),

             Form::textGroup('sku', 'Item SKU' , 'key'),

             Form::selectGroup('hsn', 'HSN Code' , 'barcode', $hsn, '00000000' , []),

             Form::selectGroup('unit_id', 'Unit' , 'balance-scale', $units, '59', []),

             Form::itemTypeGroup('type', 'Item Type' ),
             "&nbsp&nbsp".Form::checkBox("manage_inventory","1"),
             Form::label("inv_label","Manage Inventory")."<br>",
             Form::textareaGroup('details', 'Item Details')],'Save','success','new_item') !!}
</form>

    <!-- Modal -->
   {!! General::modal('Item Details',"item-details-Modal",[Form::selectGroup('item[' . $item_row . '][tax_id]','HSN  Code','exchange', $hsn ,null,['required'=>'required','class' => 'select2 hsn-code', 'placeholder' => 'Select HSN']), 
              
               Form::selectGroup('type','Item Type','exchange', ['Goods'=>'Goods','Services'=>'Services'] ,null,['required'=>'required','class' => 'select2 item-type-class no-ajax', 'placeholder' => 'Select Type']),

               Form::selectGroup('unit_modal','Unit','exchange', $units ,null,['required'=>'required','class' => 'select2 unit-class no-ajax', 'placeholder' => 'Select Unit']), 
             
               Form::selectGroup('gst','Gst','exchange', $gst ,null,['required'=>'required','class' => 'select2 gst-type no-ajax', 'placeholder' => 'Select GST']),

               Form::selectGroup('cess','Cess','exchange', $cess ,null,['required'=>'required','class' => 'select2 cess-type no-ajax', 'placeholder' => 'Select Cess']) ],'Done','success','item_check',0) !!}


<input type="hidden" id="newRowDetails" value=<?php echo $newRowDetails; ?> />


   
@endsection



@section('js')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Select2 -->
    <script src="{{ asset('dist/js/select2.full.min.js') }}"></script>
    <!-- Date Picker -->
    <script type="text/javascript" src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-fancyfile.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="{{ asset('js/common.js') }}"></script>
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
        
        height:3.8vh;
        border-color:#d2d6de ;

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

[class^='select2'] {
  border-radius: 0px !important;
  border-color: #d2d6de !important;
}








</style>

@endsection



@section('scripts')
    <script type="text/javascript">
        var item_row = '{{ $item_row }}';
        console.log(item_row+"second");
        var itemsArray={};
        var initial=1; //for initial ajax call for items table
        var count=0;
        var noOfItems=$('.items-dropdown').length;
        var ogRow;
        var visible=-1;
        var rowsDetails={};


        function addItem() {
            var elementsObject={};
            elementsObject[0]={etype:"button",id:"item-row-"+item_row,class:"btn btn-xs btn-danger",onclick:"$(this).tooltip('destroy');$('#item-row-"+item_row+"').remove();rowsDetails["+item_row+"]=null;itemCalculate();","data-toggle":"tooltip",title:"{{ trans('general.delete') }}",innerHTML:"<i class='fa fa-trash'></i>"};
            
            elementsObject[1]={etype:"select",id:"item-name-"+item_row,name:"item["+item_row+"][name]", class:"select2 items-dropdown", innerHTML:"<option  selected>Select Item</option>"};
            
            elementsObject[2]={etype:"span",id:"item-extra-info-"+item_row, class:"extra-info-popup", "data-toggle":"popover", "data-trigger":"click", tabindex:"0", "data-placement":"bottom", "data-content":"<button type='button' class='btn extra-info-modal' style='width:100%;background-color:#3C8DBC;color:white' data-row="+item_row+">Edit</button><br><br>","data-html":"true",innerHTML:"<i style='font-size:1.5vw;color:blue' class='fa fa-cog fa-spin fa-3x fa-fw' aria-hidden='true'></i>"};

            elementsObject[3]={etype:"input",class:"form-control text-center quantity-class", required:"required", name:"item["+item_row+"][quantity]", type:"text", id:"item-quantity-"+item_row};

            elementsObject[4]={etype:"input",class:"form-control text-right", required:"required", name:"item["+item_row+"][price]", type:"text", id:"item-price-"+item_row};

            elementsObject[5]={ 0:{etype:"input",class:"form-control typeahead", required:"required", placeholder:"Discount", name:"item["+item_row+"][discount]", type:"text", id:"item-discount-"+item_row},
             1:{  etype:"input",name:"item["+item_row+"][item_id]", type:"hidden", id:"item-id-"+item_row }
             };

            elementsObject[6]={ 0:{etype:"span",id:"item-tax-info-"+item_row, class:"item_tax-info", "data-toggle":"popover", "data-trigger":"hover", "data-placement":"bottom", "data-content":"Please Select All Options First","data-html":"true",style:"float:left",innerHTML:"<i style='font-size:1.5vw;color:blue' class='fa'>&#xf129;</i>"},

              1:{ etype:"span",id:"item-total-tax-"+item_row, innerHTML:0,style:"float:right"}
             };

             elementsObject[7]={ 0:{ etype:"span",id:"item-total-"+item_row, innerHTML:0,style:"float:right" },
             1:{ etype:"input",type:"hidden", name:"item["+item_row+"][gst_id]", class:"hidden-gst-id" },
             2:{ etype:"input",type:"hidden", name:"item["+item_row+"][cess_id]", class:"hidden-cess-id" }

             };

            var rowObject=$(document.createElement("tr")).attr({"id":"item-row-"+item_row,"class":"item-row"});
            
            rowObject=addTableRow(elementsObject,rowObject);

            $('#items tbody #addItem').before(rowObject);

            $('td .select2').select2();
            initPopover(["#item-tax-info-"+item_row,'#item-extra-info-'+item_row]);

            item_row++;
        }


 $(document).ready(function(){

            var initialLength=$('#item-name-0')[0].options.length;
            for(var i=1;i<initialLength;i++){
                itemsArray[$('#item-name-0')[0].options[i].value]=$('#item-name-0')[0].options[i].innerHTML;
            }

   

            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true
            });

            //Select2 For Vendor ID
            $('#customer_id').on("select2:select", function(e) { 
                  $.ajax({
                url: '{{ url("sales/customerInfo") }}',
                type: 'POST',
                dataType: 'JSON',
                data: {'customer_id':$(this).val()},
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                success: function(data) {
                     
                    if (data) {
                        
                        $('#supply_state_id').val(data[0]).trigger('change.select2');// for changing the values in select2 tag
                        

                       itemCalculate();
                    }
                }
            });


            })
            .on('select2:open', () => {
                    $(".select2-results:not(:has(a))").append('<a href="" data-toggle="modal" data-target="#customerModal" style="padding: 6px;height: 20px;display: inline-table;width:100%">Add New</a>');
            });


            //When any Item data is changed
            $(document).on('keyup', '#items tbody .form-control', function(){
                itemCalculate();
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
                            });
                            console.log("key="+key);
                       rowsDetails[key].cgst=data.items[key].cgst;
                       rowsDetails[key].sgst= data.items[key].sgst;
                       rowsDetails[key].ugst=data.items[key].ugst; 
                       rowsDetails[key].igst=data.items[key].igst;
                       rowsDetails[key].cess_amount=data.items[key].cess;
                       rowsDetails[key].unit_price=(parseInt(data.items[key].taxableValue)+parseInt(data.items[key].discount));
                       rowsDetails[key].discount=parseInt(data.items[key].discount);  
                      $("#item-tax-info-"+key).attr("data-content","Taxable<br>Value:"+data.items[key].taxableValue+"<br>CGST:"+data.items[key].cgst+"<br>SGST:"+data.items[key].sgst+"<br>IGST:"+data.items[key].igst+"<br>UGST:"+data.items[key].ugst+"<br>Cess:"+data.items[key].cess).data('bs.popover').setContent();      
                         //used for reinitializing the popover element after changing content    
                        });
                        
                        $('#sub-total').html(data.sub_total);
                        $('#tax-total').html(data.tax_total);
                        $('#grand-total').html(data.grand_total);
                        
                        
                    }
                },
                complete:function(){
                  if(initial){
                    update(); //for updating the extra info of each item updated by user during creation 
                    initial=0;
                  }
                }
            });
        }


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


//This method uses element having class:'item-name-class' and autofills the item information 
//It is the first input of every row in items html table

   
$(document).ready(function() {
    $('#items').on('select2:select','.items-dropdown',function(){
  
   var row = $(this).parent().parent().attr('id').split("-");
   row=row[row.length-1];
    
    var itemId=$("#item-name-"+row).val();
  
    var xml=new XMLHttpRequest();
     xml.onreadystatechange=function(){
      if(this.readyState==4 && this.status==200){
        var item_details=JSON.parse(this.responseText);
        console.log(item_details);
        if(Object.keys(item_details).length>0){// Object.keys(item_details).length used to calculate length of object 
         rowsDetails[row]=item_details;
         $('input[name="item['+row+'][gst_id]"]').val(rowsDetails[row]['gst']);
         $('input[name="item['+row+'][cess_id]"]').val(rowsDetails[row]['cess']);
         count++;
         console.log(count);
        if(count>=noOfItems){ 
        itemCalculate();
      }         
      }
      }        
     };
     xml.open("GET","{{  url('sales/autofill')  }}?id="+itemId,true);
     xml.send();


    });
});

$(document).on('submit','.add-item-form',function(event){
event.preventDefault();
$.ajax({
                url: '{{ url("/items/ajaxStore") }}',
                type: 'POST',
                dataType: 'JSON',
                data: $('input[name="name"],input[name="sku"],#hsn,#unit_id,input[name="type"]:checked,#details'),
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                success: function(data) {
                     
                    if (data) {

                    rowsDetails[ogRow]=data;
               
          itemsArray[data.id]=data.name;       
         var option = new Option(data.name,data.id, true, true);  // Option(innerHTML,value,selected,actual Selection)
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
$('.select2-results__option').removeClass('select2-results__option--highlighted');
});



$(document).on('click','.extra-info-modal',function(){
        globalRow=$(this).attr("data-row");
        $('#item-details-Modal .select2').val("").trigger('change.select2'); //for resetting values
        if(!rowsDetails[globalRow]){
      alert("Please Select Item First");
      return;
        }
        $('#item-details-Modal').modal();
        if(rowsDetails[globalRow]){
          $('#item-details-Modal select')[0].value=rowsDetails[globalRow].hsn;
          $('#item-details-Modal select')[1].value=rowsDetails[globalRow].type;
          $('#item-details-Modal select')[2].value=rowsDetails[globalRow].unit_id;
          $('#item-details-Modal select')[3].value=rowsDetails[globalRow].gst;
          $('#item-details-Modal select')[4].value=rowsDetails[globalRow].cess;
          $('#item-details-Modal select').trigger('change.select2');
        }

        ogRow=globalRow;// tells modal opened for which row in table
});


$(document).ready(function(){
  $('#items').on('shown.bs.popover','.extra-info-popup', function () {
  var row=$(this).parent().parent().attr("id").split("-");
  row=row[row.length-1];
  visible=row;
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

    $(this).html("");
   //console.log(itemsArray);
   $(this).html("<option value='Select Item'>Select Item</option>");
   
   $.each(itemsArray,function(key,value){

    $('#item-name-'+row).append('<option value="'+key+'" >'+value+'</option>');
  });

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
  //commonDetails['ecommerce_vendor_id']=0;
}

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
$('#common-object').val(JSON.stringify(commonDetails));
$('#table-object').val(JSON.stringify(rowsDetails));
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

// $('#items').on('blur','.quantity-class',function(){
//   var elem=$(this);
//   var quantity=$(this).val();
//   var row=$(this).parent().parent().attr('id').split('-')[2];
// $.ajax({
// url:'{{ url("sales/quantity") }}',
// type:'GET',
// dataType:"text",
// data:{'quantity':quantity,'sku':rowsDetails[row].sku},
// success:function(data){
// if(data=='-1'){
//   elem.val("");
//   alert("Item Does Not Exist In Inventory!");
// }
// else if(data!='Ok'){
//   elem.val("");
//   alert("Only "+data+" Units Remaining!");
// }
// }
// });



// });
initPopover([".item-tax-info",'.extra-info-popup']);
initSelect(['#item-details-Modal .select2','td .select2','#customer_id']);

$('.items-dropdown').trigger('select2:select');

});


function update(){
  var newRowDetails=document.getElementById('newRowDetails').value;
  newRowDetails=JSON.parse(newRowDetails);
  for(var i=0;i<Object.keys(newRowDetails).length;i++){
    rowsDetails[i]['hsn']=newRowDetails[i]['hsn'];
    rowsDetails[i]['gst']=newRowDetails[i]['gst'];
    rowsDetails[i]['cess']=newRowDetails[i]['cess'];
    rowsDetails[i]['type']=newRowDetails[i]['type'];
    $('input[name="item['+i+'][gst_id]"]').val(rowsDetails[i]['gst']);
    $('input[name="item['+i+'][cess_id]"]').val(rowsDetails[i]['cess']);
    itemCalculate(); 

  }

}

});

    </script>
@endsection