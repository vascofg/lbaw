{include file="manager/header.tpl" active="brands"}
<table class="ink-table ink-zebra ink-hover brands">
  <thead>
  <tr>
    <th>Marca</th>
    <th>Utilizações</th>
    <th>Eliminar</th>
  </tr>
  </thead>
  <tbody>
{foreach $brands as $brand}
	<tr>
		<td width="80%">{$brand.name}</td>
		<td width="10%">{$brand.usage}</td>
		<td width="10%">
		{if $brand.usage==0}
				<a href="{$BASE_URL}actions/manager/brands/action_delete_brand.php?id={$brand.brandid}"><i class="icon-remove"></i></a> 
		{else}
		  <i class="icon-remove"></i>
		{/if}	
		</td>
	</tr>
{foreachelse}
	<tr><td colspan=3>Sem resultados...</td></tr>
{/foreach}
  </tbody>
</table>
{include file="manager/footer.tpl"}
