<?php
	// initialize
    include_once('../../../common/init.php');

	if (!isLoggedInAdmin())
		redirect('');
	
	else {

		// include needed database functions
		include_once($BASE_PATH . 'database/products.php');

		$id = $_GET['id'];

		// fetch data
		$product = getProduct($id);

		// send data to smarty
		$smarty->assign('product', $product);

		// display smarty template
		$smarty->display('manager/products/view_product.tpl');
  
  }
?>
