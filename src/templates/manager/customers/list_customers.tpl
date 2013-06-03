{include file="manager/header.tpl" active="customers"}
{include file="search.tpl"}
<table class="ink-table ink-zebra ink-hover customers">
  <thead>
  <tr>
    <th>Username</th>
    <th>Nome Completo</th>
    <th>Detalhes</th>
  </tr>
  </thead>
  <tbody>
{foreach $customers as $customer}
	<tr>
		<td>{stripslashes($customer.username)}</td>
		<td>{stripslashes($customer.fullname)}</td>
		<td><a href="{$BASE_URL}pages/manager/customers/view_customer.php?id={$customer.frequent_customerid}"><i class="icon-th-list"></i></a>
	</tr>
{foreachelse}
	<td colspan=3>Sem resultados...</td>
{/foreach}
  </tbody>
</table>
<nav class="ink-navigation customers-pagination ink-vspace" data-numpages={$numpages}></nav>
<div>
  <a href="{$BASE_URL}pages/manager/customers/register_customer.php"><button class="ink-button">Novo Cliente</button></a>
</div>
{include file="manager/footer.tpl"}
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="{$BASE_URL}javascript/functions.js"></script>
<script src="{$BASE_URL}javascript/manager/customers/list_customers.js"></script>
