{include file="manager/header.tpl" active="managers"}
{include file="search.tpl"}
<table class="ink-table ink-zebra ink-hover managers">
  <thead>
  <tr>
    <th>Username</th>
    <th>Nome Completo</th>
    <th>Detalhes</th>
  </tr>
  </thead>
  <tbody>
{foreach $managers as $manager}
	<tr>
		<td>{stripslashes($manager.username)}</td>
		<td>{stripslashes($manager.fullname)}</td>
		<td><a href="{$BASE_URL}pages/manager/managers/view_manager.php?id={$manager.system_managerid}"><i class="icon-th-list"></i></a>
	</tr>
{foreachelse}
	<td colspan=3>Sem resultados...</td>
{/foreach}
  </tbody>
</table>
<nav class="ink-navigation managers-pagination ink-vspace" data-numpages={$numpages}></nav>
<div>
  <a href="{$BASE_URL}pages/manager/auth/register.php"><button class="ink-button">Novo Gestor</button></a>
</div>
{include file="manager/footer.tpl"}
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="{$BASE_URL}javascript/manager/managers/list_managers.js"></script>
