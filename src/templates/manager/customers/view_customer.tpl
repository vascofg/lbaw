{include file="manager/header.tpl" active="customers"}
<div class="customer">
	<p>{$customer.username} - {$customer.fullname}   
		<a href="{$BASE_URL}actions/manager/customers/action_delete_customer.php?id={$customer.frequent_customerid}">X</a>  
	</p>
</div>
{include file="manager/footer.tpl"}
