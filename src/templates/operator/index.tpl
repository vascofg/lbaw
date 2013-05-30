{include file="operator/header.tpl" active="home"}  
<div class="products ink-l60">
<h4>Produtos</h4>
{foreach $products as $product}
<div class="product" id="{$product.productid}" data-quantity="{$product.quantity}"><span class="picture"><img src="{if ($product.picture!='')}data:image/jpeg;base64, {$product.picture}{else}{$BASE_URL}img/img-not-available.png{/if}"><br></span><span class="brandname">{$product.brandname}</span> <span class="name">{$product.name}</span><br><span class="price">{$product.price}</span></div>
{/foreach}
</div>
<div class="cart ink-l40">
  <h4>Carrinho</h4>
  <div class="total">Total: <span class="total">0.00</span></div>
  <button class="ink-button success submit" id="submit" disabled>Submeter</button>
</div>
{include file="operator/footer.tpl"}
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="{$BASE_URL}javascript/operator/cart.js"></script>
