{include file="customer/header.tpl" active="history"}
<h4>Compra nº {$products[0]['saleid']}</h4>
<table class="ink-table ink-bordered products">
  <thead>
    <tr>
	    <th>Marca</th>
	    <th>Produto</th>
	    <th>Preço</th>
	    <th>Quantidade</th>
	    <th>Total</th>
    </tr>
  </thead>
	<tbody>
{foreach $products as $product}
  <tr>
    <td>{$product['brandname']}</td>
    <td>{$product['name']}</td>
    <td>{$product['price']}€</td>
    <td>{$product['quantity']}</td>
    <td>{$product['total']}€</td>
  </tr>
{foreachelse}
  <tr>
    <td colspan="5">Sem resultados...</td>
  </tr>
{/foreach}
  </tbody>
</table>
<a href="list_purchases.php"><button class="ink-button ink-vspace">Voltar</button></a>
{include file="customer/footer.tpl"}
