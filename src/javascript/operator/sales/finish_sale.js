var customercard_number = -1;
var customercard_value = -1;
var card_number = -1;
var card_value = -1;
var cash_value = -1;

$('button#submit').click(function (evt) {
    $("form#form").append('<input type="hidden" name="customercard_number" value="'+customercard_number+'">\
    <input type="hidden" name="customercard_value" value="'+customercard_value+'">\
    <input type="hidden" name="card_number" value="'+parseInt($("input[name='card_number']").val())+'">\
    <input type="hidden" name="card_value" value="'+card_value+'">\
    <input type="hidden" name="cash_value" value="'+cash_value+'">');
    HTMLFormElement.prototype.submit.call($('#form')[0]);
});

$("input[name='customercard_number']").keyup(function(e) {
  if(e.which == 13) {
    $(this).blur();
    getCustomerCardBalance(parseInt($(this).val()));
	}
});

$("input[name='customercard_value']").keyup(function(e) {
	if(e.which == 13) {
    $(this).blur();
		if($(this).val()<0 || !$(this).val())
			$(this).val(0);
    var customercard_balance = parseFloat($("td.customer_card_balance>span.customer_card_balance").html());
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
      var span = $("td>span.customer_card");
      span.html(parseFloat($(this).val())+'€');
      span.parent().parent().show();
    }
    else
    {
      customercard_value = -1;
      var span = $("td>span.customer_card");
      span.html(0+'€');
      span.parent().parent().hide();
    }
	}
});

$("input[name='card_value']").keyup(function(e) {
	if(e.which == 13) {
    $(this).blur();
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
      
    var cardNumberElem = $("input[name='card_number']");
    if(parseFloat($(this).val())>0)
    {
      cardNumberElem.prop('disabled',false).val(0);
      card_value = parseFloat($(this).val());
      var span = $("td>span.card");
      span.html(parseFloat($(this).val())+'€');
      span.parent().parent().show();
    }
    else
    {
      cardNumberElem.prop('disabled',true);
      card_value = -1;
      var span = $("td>span.card");
      span.html(0+'€');
      span.parent().parent().hide();
    }
	}
});

$("input[name='cash_value']").keyup(function(e) {
	if(e.which == 13) {
    $(this).blur();
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
      var span = $("td>span.cash");
      span.html(parseFloat($(this).val())+'€');
      span.parent().parent().show();
    }
    else
    {
      cash_value = -1;
      var span = $("td>span.cash");
      span.html(parseFloat(0+'€'));
      span.parent().parent().hide();
    }
	}
});

function getCustomerCardBalance(number)
{
  var customercard_balancetd = $("td.customer_card_balance");
  var customercard_balancevalue;
	if(!number)
	{
		$("input[name='customercard_value']").val(0);
		$("input[name='customercard_value']").prop('disabled',true);
		customercard_balancetd.parent().hide();
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
			 			customercard_balancetd.html('Cartão inexistente').parent().parent().show();
			 			$("input[name='customercard_value']").val(0);
			 			$("input[name='customercard_value']").prop('disabled',true);
			 		}
			 		else
			 		{
			 			customercard_number = number;
			 			customercard_balancetd.html("Saldo do cartão cliente: <span class=\"customer_card_balance\"></span>");
            customercard_balancevalue = customercard_balancetd.children("span.customer_card_balance");
            customercard_balancevalue.html(output+'€').parent().parent().show();
			 			$("input[name='customercard_value']").prop('disabled',false);
			 		}
			 }
		});
	}
}

$(document).ready(function(){

});
