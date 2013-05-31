{include file="manager/header.tpl" active="products"}
<div class="ink-grid">
	 <div class="column-group half-gutters">
        <div class="large-80">
        	<div class="large-100 medium-100 small-100">
        		<h3>{$product.brandname}</h3>
        		<h4>{$product.name}</h4>
        		<div>
        			{$product.description}
        		</div>
        	</div>
        </div>
        <div class="large-20">
        	 {$product.price}€ 
        	 {$product.quantity} em stock
        	 <br>
        	 <a href="{$BASE_URL}actions/manager/products/action_delete_product.php?id={$product.productid}">Apagar</a>  
        </div>
    </div>
</div>
{include file="manager/footer.tpl"}
