<?php
	// initialize
    include_once('../../../common/init.php');

	if (!isLoggedInAdmin())
		redirect('');
		
	else {
	
		// include needed database functions
		include_once($BASE_PATH . 'database/products.php');
    
		// fetch data
		$products = getAllProductsPage(0);
		
		// send data to smarty
		$smarty->assign('products', $products);
    $smarty->assign('numpages', ceil($products[0]['count']/$pagesize));
		
		// display smarty template
		$smarty->display('manager/products/list_products.tpl');
	
	}
?>
