<!DOCTYPE HTML>
<html>
<head>
<meta charset='utf-8'>
<title>POS - Operador</title>
<link href='{$BASE_URL}css/operator.css' rel="stylesheet" type="text/css">
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
	<h1>POS - Operador</h1>
	<nav class="ink-navigation ink-collapsible">
		<ul class="menu horizontal blue">
			<li><a href='{$BASE_URL}'>Home externa</a></li>
      {if isLoggedInOperator()}
        <li class="{if $active=="home"}active{/if}"><a href='{$BASE_URL}pages/operator'><i class="icon-home"></i></a></li>
        <li class="{if $active=="sales"}active{/if}"><a href='{$BASE_URL}pages/operator/sales'>Venda</a></li>
        <li style="float:right;"><a href='{$BASE_URL}actions/operator/auth/action_logout.php'><span style="font-weight:bold;">{$smarty.session.operator.username}</span>&nbsp;&nbsp;&nbsp;Logout</a></li>
      {/if}
    </ul>
  </nav>
</header>
<div class="ink-container ink-vspace">
