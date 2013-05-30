{include file="manager/header.tpl" active="operators"}
<div class="operator">
	<p>{$operator.username} - {$operator.fullname}   
		<a href="{$BASE_URL}actions/manager/operators/action_delete_operator.php?id={$operator.pos_operatorid}">X</a>  
	</p>
</div>
{include file="manager/footer.tpl"}
