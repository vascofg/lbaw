{include file="manager/header.tpl" active="managers"}
<div class="manager">
	<div class="picture-column">
		<img src="{if ($manager.picture!='')}data:image/jpeg;base64, {$manager.picture}{else}{$BASE_URL}img/img-not-available.png{/if}">
	</div>
	<div>
    {stripslashes($manager.username)}<br>
    {stripslashes($manager.fullname)}<br>
    {stripslashes($manager.email)}<br>
    <br>
    <a href="{$BASE_URL}actions/manager/managers/action_delete_manager.php?id={$manager.system_managerid}">Remover</a>  
  </div>
</div>
{include file="manager/footer.tpl"}