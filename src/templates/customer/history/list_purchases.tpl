{include file="customer/header.tpl" active="history"}
{assign var="saleID" value="-1"}
{foreach $purchases as $purchase}
	{if $purchase['saleid'] neq $saleID}
		{if $saleID neq -1}
			</tbody>
			</table>
		{/if}
		{assign var="saleID" value=$purchase['saleid']}
		<h4>Venda nº {$saleID}</h4>
		{$purchase['date']}
		<table class="ink-table ink-zebra ink-hover products">
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
	{/if}
	<tr>
		<td>{$purchase['brandname']}</td>
		<td>{$purchase['name']}</td>
		<td>{$purchase['price']}</td>
		<td>{$purchase['quantity']}</td>
		<td>{$purchase['total']}</td>
	</tr>
{foreachelse}
Sem resultados...
{/foreach}
{if $saleID neq -1}
	</tbody>
	</table>
{/if}
{include file="customer/footer.tpl"}
