{include file="manager/header.tpl" active="products"}
<div class="product">
	<p>{$product.brandname} | {$product.name} | {$product.price}€ | {$product.quantity} em stock  
		<a href="{$BASE_URL}actions/manager/products/action_delete_product.php?id={$product.productid}">X</a>  
	</p>
</div>
{include file="manager/footer.tpl"}
