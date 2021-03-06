{include file="operator/header.tpl" active="sales"}
{include file="search.tpl"}
<div class="ink-l70">
	<h4>Produtos</h4>
	<div class="products">
	{foreach $products as $product}
	<div class="product" id="{$product.productid}" data-quantity="{$product.quantity}"><span class="picture"><img src="{if ($product.picture!='')}data:image/jpeg;base64, {$product.picture}{else}{$BASE_URL}img/img-not-available.png{/if}"><br></span><span class="brandname">{stripslashes($product.brandname)}</span> <span class="name">{stripslashes($product.name)}</span><br><span class="price">{$product.price}€</span></div>
	{foreachelse}
	Sem resultados...
	{/foreach}
	</div>
	<nav class="ink-navigation products-pagination ink-vspace" data-numpages={$numpages}></nav>
</div>
<div class="ink-l30">
	<div class="cart">
		<form action="{$BASE_URL}pages/operator/sales/finish_sale.php" method="post">
			<h4>Carrinho</h4>
			<div class="total">Total: <span class="total">0.00€</span></div>
			<input type="submit" class="ink-button success submit" id="submit" value="Continuar" disabled>
		</form>
	</div>
</div>
{include file="operator/footer.tpl"}
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="{$BASE_URL}javascript/functions.js"></script>
<script src="{$BASE_URL}javascript/operator/sales/cart.js"></script>
