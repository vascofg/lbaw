{include file="operator/header.tpl" active="sales"}
<form method="post" action="{$BASE_URL}actions/operator/sales/action_save_sale.php">
{foreach $products as $id => $product}
	{$id} - {$product['brandname']} {$product['name']} {$product['price']} x{$product['quantity']} = {$product['quantity']*$product['price']}<br>
	{assign var="sum" value=$sum+$product['quantity']*$product['price']}
	<input type="hidden" class="price" name="products[{$id}][price]" value="{$product['price']}">
	<input type="hidden" class="quantity" name="products[{$id}][quantity]" value="{$product['quantity']}">
{foreachelse}
	{redirect("pages/operator/sales")}
{/foreach}
	<input type="submit" class="ink-button success submit ink-vspace" id="submit" value="Continuar">
	<br>Total: {$sum}
{include file="operator/footer.tpl"}
