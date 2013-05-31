{include file="manager/header.tpl" active="products"}
{include file="search.tpl"}
<table class="ink-table ink-zebra ink-hover products">
  <thead>
  <tr>
    <th>Marca</th>
    <th>Produto</th>
    <th>Preço</th>
    <th>Stock</th>
    <th>Detalhes</th>
  </tr>
  </thead>
  <tbody>
{foreach $products as $product}
	  <tr>
		  <td>{$product.brandname}</td>
		  <td>{$product.name}</td>
		  <td>{$product.price}€</td>
		  <td>{$product.quantity}</td>
		  <td><a href="{$BASE_URL}pages/manager/products/view_product.php?id={$product.productid}"><i class="icon-th-list"></i></a></td>
	  </tr>
{foreachelse}
  <tr><td colspan=5>Sem resultados...</td></tr>
{/foreach}
</tbody>
</table>
<nav class="ink-navigation products-pagination ink-vspace" data-numpages={$numpages}></nav>
<div>
  <a href="{$BASE_URL}pages/manager/products/add_product.php"><button class="ink-button">Novo Produto</button></a>
</div>
{include file="manager/footer.tpl"}
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="{$BASE_URL}javascript/manager/products/list_products.js"></script>
