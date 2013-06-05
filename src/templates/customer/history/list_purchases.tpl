{include file="customer/header.tpl" active="history"}
<table class="ink-table ink-bordered products">
  <thead>
    <tr>
	    <th>Nº compra</th>
	    <th>Data</th>
      <th>Valor</th>
    </tr>
  </thead>
	<tbody>
{foreach $purchases as $purchase}
		<tr>
      <td><a href="view_purchase.php?id={$purchase['saleid']}">{$purchase['saleid']}</a></td>
      <td>{$purchase['date']|date_format:"%d/%m/%Y %H:%M"}</td>
      <td>{$purchase['total']}€</td>
    </tr>
{foreachelse}
<tr><td colspan="3">Sem resultados...</td></tr>
{/foreach}
{include file="customer/footer.tpl"}
