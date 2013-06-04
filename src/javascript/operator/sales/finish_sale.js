var customercard_number = -1;
var customercard_value = -1;
var card_number = -1;
var card_value = -1;
var cash_value = -1;

$('button#submit').click(function (evt) {
    $(this).append('<input type="hidden" name="customercard_number" value="'+customercard_number+'">\
    <input type="hidden" name="customercard_value" value="'+customercard_value+'">\
    <input type="hidden" name="card_number" value="'+parseInt($("input[name='card_number']").val())+'">\
    <input type="hidden" name="card_value" value="'+card_value+'">\
    <input type="hidden" name="cash_value" value="'+cash_value+'">');
    HTMLFormElement.prototype.submit.call($('#form')[0]);
});

$("input[name='customercard_number']").keyup(function(e) {
  if(e.which == 13) {
    jQuery(this).blur();
    getCustomerCardBalance(parseInt($(this).val()));
	}
});

$("input[name='customercard_value']").keyup(function(e) {
	if(e.which == 13) {
		if($(this).val()<0 || !$(this).val())
			$(this).val(0);
    var customercard_balance = parseFloat($("span.customercard_balance").html());
		if(parseFloat($(this).val())>customercard_balance)
			$(this).val(customercard_balance.toFixed(2));
		var otherVals = 
    ($("input[name='card_value']").val()?parseFloat($("input[name='card_value']").val()):0)
    + ($("input[name='cash_value']").val()?parseFloat($("input[name='cash_value']").val()):0);
    var total = parseFloat($("span.total").html());
    var subtotalElem = $("span.subtotal");
		if(total-(parseFloat($(this).val())+otherVals)>0)
			subtotalElem.html((total-(parseFloat($(this).val())+otherVals)).toFixed(2)+'€');
		else
		{
			$(this).val((total-otherVals).toFixed(2));
			subtotalElem.html(0+'€');
		}
    var submitButton = document.getElementById("submit");
    var subtotal = parseFloat(subtotalElem.html());
		if(subtotal===0)
			submitButton.disabled=false;
		else
			submitButton.disabled=true;
    
    if(parseFloat($(this).val())>0)
    {
      customercard_value = parseFloat($(this).val());
    }
    else
    {
      customercard_value = -1;
    }
	}
});

$("input[name='card_value']").keyup(function(e) {
	if(e.which == 13) {
		if($(this).val()<0 || !$(this).val())
			$(this).val(0);
		var otherVals = 
    ($("input[name='customercard_value']").val()?parseFloat($("input[name='customercard_value']").val()):0)
    + ($("input[name='cash_value']").val()?parseFloat($("input[name='cash_value']").val()):0);
    var total = parseFloat($("span.total").html());
    var subtotalElem = $("span.subtotal");
		if(total-(parseFloat($(this).val())+otherVals)>0)
			subtotalElem.html((total-(parseFloat($(this).val())+otherVals)).toFixed(2)+'€');
		else
		{
			$(this).val((total-otherVals).toFixed(2));
			subtotalElem.html(0+'€');
		}
    var submitButton = document.getElementById("submit");
    var subtotal = parseFloat(subtotalElem.html());
		if(subtotal===0)
			submitButton.disabled=false;
		else
			submitButton.disabled=true;
      
    if(parseFloat($(this).val())>0)
    {
      $("input[name='card_number']").prop('disabled',false);
      card_value = parseFloat($(this).val());
    }
    else
    {
      $("input[name='card_number']").prop('disabled',true);
      card_value = -1;
      card_number = -1;
    }
	}
});

$("input[name='cash_value']").keyup(function(e) {
	if(e.which == 13) {
		if($(this).val()<0 || !$(this).val())
			$(this).val(0);
		var otherVals = 
    ($("input[name='customercard_value']").val()?parseFloat($("input[name='customercard_value']").val()):0)
    + ($("input[name='card_value']").val()?parseFloat($("input[name='card_value']").val()):0);
    var total = parseFloat($("span.total").html());
    var subtotalElem = $("span.subtotal");
		if(total-(parseFloat($(this).val())+otherVals)>0)
			subtotalElem.html((total-(parseFloat($(this).val())+otherVals)).toFixed(2)+'€');
		else
		{
			$(this).val((total-otherVals).toFixed(2));
			subtotalElem.html(0+'€');
		}
    var submitButton = document.getElementById("submit");
    var subtotal = parseFloat(subtotalElem.html());
		if(subtotal===0)
			submitButton.disabled=false;
		else
			submitButton.disabled=true;
      
    if(parseFloat($(this).val())>0)
    {
      cash_value = parseFloat($(this).val());
    }
    else
    {
      cash_value = -1;
    }
	}
});

function getCustomerCardBalance(number)
{
	if(!number)
	{
		$("input[name='customercard_value']").val(0);
		$("input[name='customercard_value']").prop('disabled',true);
		$("span.customercard_balance").html('');
		customercard_number=-1;
	}
	else
	{
		$.ajax({ url: '../../../ajax/sales/ajax_get_customer_card.php',
			 data: {cardnumber:number},
			 type: 'post',
			 success: function(output) {
			 		output = parseFloat(output).toFixed(2);
			 		if(output==-1)
			 		{
			 			customercard_number=-1;
			 			$("span.customercard_balance").html('Cartão inexistente');
			 			$("input[name='customercard_value']").val(0);
			 			$("input[name='customercard_value']").prop('disabled',true);
			 		}
			 		else
			 		{
			 			customercard_number = number;
			 			$("span.customercard_balance").html(output);
			 			$("input[name='customercard_value']").prop('disabled',false);
			 		}
			 }
		});
	}
}

$(document).ready(function(){

});
