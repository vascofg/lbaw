{include file="customer/header.tpl" active="history"}
<h4>Compra nº {$products[0]['saleid']}</h4>
<table class="ink-table ink-bordered products">
  <thead>
    <tr>
	    <th>Quantidade</th>
	    <th>Marca</th>
	    <th>Produto</th>
	    <th>Preço Unitário</th>
	    <th>Preço</th>
    </tr>
  </thead>
	<tbody>
{foreach $products as $product}
  <tr>
    <td>{$product['quantity']}</td>
    <td>{if isset($product['brandname'])}{$product['brandname']}{else}<span style="font-style:italic;">Eliminado</span>{/if}</td>
    <td>{if isset($product['name'])}{$product['name']}{else}<span style="font-style:italic;">Eliminado</span>{/if}</td>
    <td>{$product['price']}€</td>
    <td>{$product['product_total']}€</td>
  </tr>
{foreachelse}
  <tr>
    <td colspan="5">Sem resultados...</td>
  </tr>
{/foreach}
  </tbody>
  {if isset($products[0]['total'])}
    <tfoot>
      <tr>
        <td colspan = 5 style="font-weight:bold">Total: {$products[0]['total']}€</td>
      </tr>
    </tfoot>
  {/if}
</table>
<a href="list_purchases.php"><button class="ink-button ink-vspace">Voltar</button></a>
{include file="customer/footer.tpl"}
