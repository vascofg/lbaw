<?php
	// initialize
	include_once('common/init.php');
	echo "<a href=".$BASE_URL."pages/manager>Gestor de Sistema</a><br>";
	echo "<a href=".$BASE_URL."pages/operator>Operador</a>";
	echo "<a href=".$BASE_URL."pages/customer>Cliente</a>";
	/*if(isLoggedInAdmin())
		redirect('pages/products/list_products.php');
	else
		redirect('pages/auth/login.php');*/
?>
