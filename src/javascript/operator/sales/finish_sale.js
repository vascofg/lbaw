var cardnumber = -1;

$("input[name='customercard_number']").keyup(function(e) {
  if(e.which == 13) {
    jQuery(this).blur();
    getCustomerCardBalance(parseInt($(this).val()));
	}
});

$("input[name='customercard_value']").keyup(function(e) {
	if(e.which == 13) {
		if($(this).val()<0)
			$(this).val(0);
		if(parseFloat($(this).val())>parseFloat($("span.customercard_balance").html()))
			$(this).val(parseFloat($("span.customercard_balance").html()).toFixed(2));
		var otherVals = ($("input[name='card_value']").val()?parseFloat($("input[name='card_value']").val()):0) + ($("input[name='cash_value']").val()?parseFloat($("input[name='cash_value']").val()):0);
		if(parseFloat($("span.total").html())-(parseFloat($(this).val())+otherVals)>0)
			$("span.subtotal").html((parseFloat($("span.total").html())-(parseFloat($(this).val())+otherVals)).toFixed(2));
		else
		{
			$(this).val((parseFloat($("span.total").html())-otherVals).toFixed(2));
			$("span.subtotal").html(0);
		}
		if(parseFloat($("span.subtotal").html())==0)
			document.getElementById("submit").disabled=false;
		else
			document.getElementById("submit").disabled=true;
	}
});

$("input[name='card_value']").keyup(function(e) {
	if(e.which == 13) {
		if($(this).val()<0)
			$(this).val(0);
		var otherVals = ($("input[name='customercard_value']").val()?parseFloat($("input[name='customercard_value']").val()):0) + ($("input[name='cash_value']").val()?parseFloat($("input[name='cash_value']").val()):0);
		if(parseFloat($("span.total").html())-(parseFloat($(this).val())+otherVals)>0)
			$("span.subtotal").html((parseFloat($("span.total").html())-(parseFloat($(this).val())+otherVals)).toFixed(2));
		else
		{
			$(this).val((parseFloat($("span.total").html())-otherVals).toFixed(2));
			$("span.subtotal").html(0);
		}
		if(parseFloat($("span.subtotal").html())==0)
			document.getElementById("submit").disabled=false;
		else
			document.getElementById("submit").disabled=true;
	}
});

$("input[name='cash_value']").keyup(function(e) {
	if(e.which == 13) {
		if($(this).val()<0)
			$(this).val(0);
		var otherVals = ($("input[name='customercard_value']").val()?parseFloat($("input[name='customercard_value']").val()):0) + ($("input[name='card_value']").val()?parseFloat($("input[name='card_value']").val()):0);
		if(parseFloat($("span.total").html())-(parseFloat($(this).val())+otherVals)>0)
			$("span.subtotal").html((parseFloat($("span.total").html())-(parseFloat($(this).val())+otherVals)).toFixed(2));
		else
		{
			$(this).val((parseFloat($("span.total").html())-otherVals).toFixed(2));
			$("span.subtotal").html(0);
		}
		if(parseFloat($("span.subtotal").html())==0)
			document.getElementById("submit").disabled=false;
		else
			document.getElementById("submit").disabled=true;
	}
});

function getCustomerCardBalance(number)
{
	if(!number)
	{
		$("input[name='customercard_value']").val(0);
		$("input[name='customercard_value']").prop('disabled',true);
		$("span.customercard_balance").html('');
		cardnumber=-1;
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
			 			cardnumber=-1;
			 			$("span.customercard_balance").html('Cartão inexistente');
			 			$("input[name='customercard_value']").val(0);
			 			$("input[name='customercard_value']").prop('disabled',true);
			 		}
			 		else
			 		{
			 			cardnumber = number;
			 			$("span.customercard_balance").html(output);
			 			$("input[name='customercard_value']").prop('disabled',false);
			 		}
			 }
		});
	}
}

$(document).ready(function(){

});
