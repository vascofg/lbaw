{include file="operator/header.tpl" active="sales"}
<form method="post" action="{$BASE_URL}actions/operator/sales/action_save_sale.php">
{foreach $products as $id => $product}
	{$id} - {stripslashes($product['brandname'])} {stripslashes($product['name'])} {$product['price']} x{$product['quantity']} = {$product['quantity']*$product['price']}<br>
	{assign var="sum" value=$sum+$product['quantity']*$product['price']}
	<input type="hidden" class="price" name="products[{$id}][price]" value="{$product['price']}">
	<input type="hidden" class="quantity" name="products[{$id}][quantity]" value="{$product['quantity']}">
{foreachelse}
	{redirect("pages/operator/sales")}
{/foreach}
<input type="submit" class="ink-button success submit ink-vspace" id="submit" value="Continuar" disabled>
</form>
<br>Total: <span class="total">{$sum}</span>
<br>Subtotal: <span class="subtotal">{$sum}</span><br><br>
<label for="customercard_number">Nº cartão cliente:</label>
<input type='text' name='customercard_number'><span class='customercard_balance'></span><br>
<label for="customercard_value">Cartão cliente:</label>
<input type='text' name='customercard_value' disabled><br>
<label for="card_value">Cartão crédito / débito:</label>
<input type='text' name='card_value'><br>
<label for="cash_value">Dinheiro:</label>
<input type='text' name='cash_value'><br>
{include file="operator/footer.tpl"}
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="{$BASE_URL}javascript/operator/sales/finish_sale.js"></script>