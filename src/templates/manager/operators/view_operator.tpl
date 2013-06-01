{include file="manager/header.tpl" active="operators"}
<div class="operator">
	<div class="picture-column">
		<img src="{if ($operator.picture!='')}data:image/jpeg;base64, {$operator.picture}{else}{$BASE_URL}img/img-not-available.png{/if}">
	</div>
	<div>
    {$operator.username}<br>
    {$operator.fullname}<br>
    {$operator.email}<br>
    <br>
    <a href="{$BASE_URL}actions/manager/operators/action_delete_operator.php?id={$operator.pos_operatorid}">Remover</a>  
  </div>
</div>
{include file="manager/footer.tpl"}