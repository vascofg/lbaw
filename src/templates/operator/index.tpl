{include file="operator/header.tpl" active="home"}  
<div class="products ink-l60">
<h4>Produtos</h4>
{foreach $products as $product}
<div class="product" id="{$product.productid}" data-quantity="{$product.quantity}"><span class="picture"><img src="{$BASE_URL}img/img-not-available.png"><br></span><span class="brandname">{$product.brandname}</span> <span class="name">{$product.name}</span><br><span class="price">{$product.price}</span></div>
{/foreach}
</div>
<div class="cart ink-l40">
  <h4>Carrinho</h4>
  <button class="ink-button success submit" id="submit" disabled>Submeter</button>
</div>
{include file="operator/footer.tpl"}
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="{$BASE_URL}javascript/operator/cart.js"></script>
