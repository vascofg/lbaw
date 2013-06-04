{include file="operator/header.tpl" active="sales"}
<form method="post" action="{$BASE_URL}actions/operator/sales/action_save_sale.php" id="form">
<table class="ink-table ink-bordered">
	<thead>
		<tr>
			<th>Quantidade</th>
			<th>Marca</th>
			<th>Produto</th>
			<th>Preço unitário</th>
			<th>Preço</th>
		</tr>
	</thead>
	<tbody>
	{foreach $products as $id => $product}
		<tr>
			<td>{$product['quantity']}</td>
			<td>{stripslashes($product['brandname'])}</td> 
			<td>{stripslashes($product['name'])}</td>
			<td>{$product['price']}€</td>
			<td>{$product['quantity']*$product['price']}€</td>
		</tr>
		{assign var="sum" value=$sum+$product['quantity']*$product['price']}
		<input type="hidden" class="price" name="products[{$id}][price]" value="{$product['price']}">
		<input type="hidden" class="quantity" name="products[{$id}][quantity]" value="{$product['quantity']}">
	{foreachelse}
		{redirect("pages/operator/sales")}
	{/foreach}
	</tbody>
	<tfoot>
    <tr style="display:none;">
			<td colspan="5" class="customer_card_balance"><span class="customer_card_balance"></span></td>
		</tr>
		<tr>
			<td colspan="5" style="font-weight:bold;">Subtotal: <span class="subtotal">{$sum}€</span></td>
		</tr>
    <tr style="display:none;">
			<td colspan="5" style="font-weight:bold;">Cartão cliente: <span class="customer_card">0€</span></td>
		</tr>
    <tr style="display:none;">
			<td colspan="5" style="font-weight:bold;">Cartão: <span class="card">0€</span></td>
		</tr>
    <tr style="display:none;">
			<td colspan="5" style="font-weight:bold;">Dinheiro: <span class="cash">0€</span></td>
		</tr>
		<tr>
			<td colspan="5" style="font-weight:bold;">Total: <span class="total">{$sum}€</span></td>
		</tr>
	</tfoot>
</table>
<button type="button" class="ink-button success submit ink-vspace" id="submit" disabled>Finalizar compra</button>
</form>
<br>
<div class="ink-container" style="background-color:#ddd; padding:20px; width:auto;">
	<div class="ink-l33">
		<label for="customercard_number">Nº cartão cliente:</label><br>
		<input type='text' name='customercard_number'><br><br>
		<label for="customercard_value">Valor em cartão cliente:</label><br>
		<input type='text' name='customercard_value' disabled><br>
	</div>
	<div class="ink-l33">
		<label for="card_number">Nº cartão pagamento:</label><br>
		<input type='text' name='card_number' disabled><br><br>
		<label for="card_value">Valor em cartão de pagamento:</label><br>
		<input type='text' name='card_value'><br>
	</div>
	<div class="ink-l33">
		<label for="cash_value">Valor em dinheiro:</label><br>
		<input type='text' name='cash_value'><br>
	</div>
</div>

{include file="operator/footer.tpl"}
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="{$BASE_URL}javascript/operator/sales/finish_sale.js"></script>
