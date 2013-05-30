{include file="manager/header.tpl" active="operators"}
{*include file="search.tpl"*}
<table class="ink-table ink-zebra ink-hover operators">
  <thead>
  <tr>
    <th>Username</th>
    <th>Nome Completo</th>
    <th>Detalhes</th>
  </tr>
  </thead>
  <tbody>
{foreach $operators as $operator}
	<tr>
		<td>{$operator.username}</td>
		<td>{$operator.fullname}</td>
		<td><a href="{$BASE_URL}pages/manager/operators/view_operator.php?id={$operator.pos_operatorid}"><i class="icon-th-list"></i></a>
	</tr>
{foreachelse}
	<td colspan=3>Sem resultados...</td>
{/foreach}
  </tbody>
</table>
<div class="ink-vspace">
  <a href="{$BASE_URL}pages/manager/operators/register_operator.php"><button class="ink-button">Novo Operador</button></a>
</div>
{include file="manager/footer.tpl"}
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
