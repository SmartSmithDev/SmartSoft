function addTableRow(elements,row){

	$.each(elements,function(key,value){
		var td=$(document.createElement("td")).attr({"style":"vertical-align:middle","class":"text-center"});
		if(value[0]){
			$.each(value,function(innerkey,innervalue){
				td.append(objectToElement(innervalue));
			});
		}
		else{
			td.append(objectToElement(value));
			}
		row.append(td);
	});
	return row;
}


function objectToElement(attributesObject){
	var element=$(document.createElement(attributesObject["etype"]));
	$.each(attributesObject,function(key,value){
		if(key=="innerHTML"){
			element.html(value);
		}
		else if(key!="etype"){
			element.attr(key,value);
		}
	})
	return element;
}

function initPopover(selectors){
var length=selectors.length;
$(document).ready(function() {
   for(var i=0;i<length;i++){ 
     
     $(selectors[i]).popover();
}
});
}

function initSelect(selectors){
var length=selectors.length;
$(document).ready(function() {
   for(var i=0;i<length;i++){ 
     
     $(selectors[i]).select2();
}
     
    

});
}