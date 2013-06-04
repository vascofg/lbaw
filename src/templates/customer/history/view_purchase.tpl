{include file="customer/header.tpl" active="history"}
{assign var="total" value=0}
<h4>Compra nº {$products[0]['saleid']}</h4>
<table class="ink-table ink-bordered ink-hover products">
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
    <td>{$product['brandname']}</td>
    <td>{$product['name']}</td>
    <td>{$product['price']}€</td>
    <td>{$product['total']}€</td>
  </tr>
  {assign var="total" value=$total+$product['total']}
{foreachelse}
  <tr>
    <td colspan="5">Sem resultados...</td>
  </tr>
{/foreach}
  </tbody>
  {if $total > 0}
    <tfoot>
      <tr>
        <td colspan = 5 style="font-weight:bold">Total: {$total}</td>
      </tr>
    </tfoot>
  {/if}
</table>
{include file="customer/footer.tpl"}
