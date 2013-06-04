{include file="customer/header.tpl" active="history"}
{foreach $purchases as $purchase}
		<a href="view_purchase.php?id={$purchase['saleid']}"><h4>Compra nº {$purchase['saleid']}</h4></a>
		{$purchase['date']}
{foreachelse}
Sem resultados...
{/foreach}
{include file="customer/footer.tpl"}
