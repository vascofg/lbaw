{include file="customer/header.tpl" active="home"}
<h4>Bem-vindo {$smarty.session.customer.username}</h4>
O seu saldo é: {$balance}€
{include file="customer/footer.tpl"}
