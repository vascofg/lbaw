<!DOCTYPE HTML>
<html>
<head>
<meta charset='utf-8'>
<link href='{$BASE_URL}css/manager.css' rel="stylesheet" type="text/css">
<!-- INK -->
<!-- Stylesheets -->
<link rel="stylesheet" href="{$BASE_URL}lib/ink/css/ink.css">

<!--[if IE]>
	<link rel="stylesheet" href="{$BASE_URL}lib/ink/css/ink-ie.css" type="text/css" media="screen" title="no title" charset="utf-8">
<![endif]-->
<script type="text/javascript" src="http://js.sapo.pt/Bundles/Ink.js"></script>
<title>POS - Gestor de Sistema</title>
</head>
<body>
<header class="ink-container">
	<h1>POS - Gestor de Sistema</h1>
	<nav class="ink-navigation ink-collapsible">
		<ul class="menu horizontal blue">
			<li><a href='{$BASE_URL}'>Home externa</a></li>
      {if isLoggedInAdmin()}
			  <li class="{if $active=="home"}active{/if}"><a href='{$BASE_URL}pages/manager'><i class="icon-home"></i></a></li>
			  <li class="{if $active=="products"}active{/if}">
          <a href='{$BASE_URL}pages/manager/products/list_products.php'>Produtos</a>
          <ul class="submenu">
            <li><a href='{$BASE_URL}pages/manager/products/add_product.php'>Novo Produto</a></li>
          </ul>
        </li>
			  <li class="{if $active=="brands"}active{/if}"><a href='{$BASE_URL}pages/manager/brands/list_brands.php'>Marcas</a></li>
        <li class="{if $active=="operators"}active{/if}">
          <a href='{$BASE_URL}pages/manager/operators/list_operators.php'>Operadores</a>
          <ul class="submenu">
            <li><a href='{$BASE_URL}pages/manager/operators/register_operator.php'>Novo Operador</a></li>
          </ul>
        </li>
			  <li class="{if $active=="customers"}active{/if}">
          <a href='{$BASE_URL}pages/manager/customers/list_customers.php'>Clientes</a>
          <ul class="submenu">
            <li><a href='{$BASE_URL}pages/manager/customers/register_customer.php'>Novo Cliente</a></li>
          </ul>
        </li>
			  <li class="{if $active=="managers"}active{/if}">
          <a href='{$BASE_URL}pages/manager/managers/list_managers.php'>Gestores</a>
          <ul class="submenu">
            <li><a href='{$BASE_URL}pages/manager/auth/register.php'>Novo Gestor</a></li>
          </ul>
        </li>
       	<li class="{if $active=="stats"}active{/if}"><a href='{$BASE_URL}pages/manager/stats/view_stats.php'>Estatísticas</a></li>
			  <li style="float:right;"><a href='{$BASE_URL}actions/manager/auth/action_logout.php'><span style="font-weight:bold;">{$smarty.session.admin.username}</span>&nbsp;&nbsp;&nbsp;Logout</a></li>
      {/if}
		</ul>
	</nav>
</header>
<div class="ink-container ink-vspace">
