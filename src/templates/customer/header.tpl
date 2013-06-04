<!DOCTYPE HTML>
<html>
<head>
<meta charset='utf-8'>
<title>POS - Cliente</title>
<link href='{$BASE_URL}css/customer.css' rel="stylesheet" type="text/css">
<!-- INK -->
<!-- Stylesheets -->
<link rel="stylesheet" href="{$BASE_URL}lib/ink/css/ink.css">

<!--[if IE]>
	<link rel="stylesheet" href="{$BASE_URL}lib/ink/css/ink-ie.css" type="text/css" media="screen" title="no title" charset="utf-8">
<![endif]-->
<script type="text/javascript" src="http://js.sapo.pt/Bundles/Ink.js"></script>
</head>
<body>
<header class="ink-container">
	<h1>POS - Cliente</h1>
	<nav class="ink-navigation ink-collapsible">
		<ul class="menu horizontal blue">
			<li><a href='{$BASE_URL}'>Home externa</a></li>
      {if isLoggedInCustomer()}
        <li class="{if $active=="home"}active{/if}"><a href='{$BASE_URL}pages/customer'><i class="icon-home"></i></a></li>
        <li class="{if $active=="history"}active{/if}"><a href='{$BASE_URL}pages/customer/history/list_purchases.php'>Histórico</a></li>
        <li style="float:right;"><a href='{$BASE_URL}actions/customer/auth/action_logout.php'><span style="font-weight:bold;">{$smarty.session.customer.username}</span>&nbsp;&nbsp;&nbsp;Logout</a></li>
      {/if}
    </ul>
  </nav>
</header>
<div class="ink-container ink-vspace">
