// elements- array of elements
// row- row object
function addToRow(elements,row){
	var td;
	$(elements).each(function(i,e){
		td=$(document.createElement("td")).attr("class","text-center");
		if(e.length>1){
			$(e).each(function(i1,e1){
				td.append(e1);
			});
		}
		else{
			td.append(e);
		}
		row.append(td);
	});

	return  row;
		
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
	});
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


//content- innerText(optional)
function button(content){
	var button=$(document.createElement("button"));
	if(content){
		button.html(content);
	}
	return button;
}

//optionsCollection- object containing options value attribute as key and innertext as value(optional)
function select2(placeholder,optionsCollection){
	var select=$(document.createElement("select")).attr({"class":"form-control select2"});
	select.append("<option disabled selected>"+placeholder+"</option>");
	if(optionsCollection){
		$.each(optionsCollection,function(key,value){
			select.append("<option value='"+key+"'>"+value+"</option>");
		});
	}
	return select;
}

//type- type of input
//placeholder- optional
function input(type,placeholder=""){
	var input=$(document.createElement("input")).attr({"type":type,"placeholder":placeholder,"class":"form-control"});
	return input;
}

//icon_name- name of font awesome icon
function icon(icon_name){
	var icon=$(document.createElement("i")).attr({"class":"fa fa-"+icon_name,"style":'font-size:1.5vw',"aria-hidden":"true"});
	return icon;
}

//content -(optional)
function span(content){
	var span=$(document.createElement("span"));
	if(content){
		span.html(content);
	}
	return span;
}


//trigger- event to open popup eg:click
//placement-top,bottom,right,left
//iconType- name of font awesome icon
//innerElement- element inside popup
//innerElementText- text of innerElement
//innerElementAttributes- attributes of inner element (object) (optional)
function popup(trigger,placement,iconType,innerElement,innerElementText,innerElementAttributes){	
	var popupElement=$(document.createElement(innerElement));
	popupElement.text(innerElementText);
	if(innerElementAttributes){
		$.each(innerElementAttributes,function(key,value){
			popupElement.attr(key,value);
		});
	}
	var spanElement=span().attr({"data-toggle":"popover", "data-trigger":trigger, "tabindex":"0", "data-placement":placement,"data-html":"true","data-content":popupElement[0].outerHTML});
	
	var iconElement=icon(iconType);
	return spanElement.append(iconElement);
}


function textArea(placeholder){
	var textarea=$(document.createElement("textarea")).attr({"placeholder":placeholder,"class":"form-control"});
	return textarea;	
}

//attributesObject- key value pairs of elements attributes eg:{id:"idName",class:"className"}
function addAttributes(attributesObject,element){
	$.each(attributesObject,function(key,value){
		if(key=="class" && element.attr(key) ){
			element.attr(key,element.attr(key)+" "+value);
		}
		else{
			element.attr(key,value);
		}
	});
	return element;
}


