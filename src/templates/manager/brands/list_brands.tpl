{include file="manager/header.tpl" active="brands"}
{include file="search.tpl"}
<table class="ink-table ink-zebra ink-hover brands">
  <thead>
  <tr>
    <th>Marca</th>
    <th>Utilizações</th>
    <th>Eliminar</th>
    <th>Editar</th>
  </tr>
  </thead>
  <tbody>
{foreach $brands as $brand}
	<tr>
		<td width="70%">{stripslashes($brand.name)}</td>
		<td width="10%">{$brand.usage}</td>
		<td width="10%">
		{if $brand.usage==0}
				<a href="{$BASE_URL}actions/manager/brands/action_delete_brand.php?id={$brand.brandid}">
		{/if}
		<i class="icon-remove"></i>
		{if $brand.usage==0}
				</a>
		{/if}
		</td>
		<td width="10%">
			<a href="{$BASE_URL}pages/manager/brands/edit_brand.php?id={$brand.brandid}"><i class="icon-edit"></i></a>
		</td>
	</tr>
{foreachelse}
	<tr><td colspan=3>Sem resultados...</td></tr>
{/foreach}
  </tbody>
</table>
<nav class="ink-navigation brands-pagination ink-vspace" data-numpages={$numpages}></nav>
{include file="manager/footer.tpl"}
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="{$BASE_URL}javascript/manager/brands/list_brands.js"></script>
