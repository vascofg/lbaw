{include file="manager/header.tpl" active="products"}
<div class="product">
  <div class="picture-column">
    <img src="{if ($product.picture!='')}data:image/jpeg;base64, {$product.picture}{else}{$BASE_URL}img/img-not-available.png{/if}">
  </div>
  <div>
    {stripslashes($product.brandname)}<br>
    {stripslashes($product.name)}<br>
    {stripslashes($product.description)}<br>
    {$product.price}€<br>
    {$product.quantity} em stock<br>
    <br>
    <a href="{$BASE_URL}pages/manager/products/edit_product.php?id={$product.productid}">Editar</a><br>
    <a href="{$BASE_URL}actions/manager/products/action_delete_product.php?id={$product.productid}">Eliminar</a>
    
  </div>
</div>
{include file="manager/footer.tpl"}
