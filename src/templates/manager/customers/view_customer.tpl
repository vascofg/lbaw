{include file="manager/header.tpl" active="customers"}
<div class="customer">
	<div class="picture-column">
		<img src="{if ($customer.picture!='')}data:image/jpeg;base64, {$customer.picture}{else}{$BASE_URL}img/img-not-available.png{/if}">
	</div>
	<div>
    {$customer.username}<br>
    {$customer.fullname}<br>
    {$customer.email}<br>
    <br>
    <a href="{$BASE_URL}actions/manager/customers/action_delete_customer.php?id={$customer.frequent_customerid}">Remover</a>  
  </div>
</div>
{include file="manager/footer.tpl"}
