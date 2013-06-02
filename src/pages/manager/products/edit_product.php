<?php
	// initialize
    include_once('../../../common/init.php');

	if (!isLoggedInAdmin())
		redirect('');
		
	else {
	
		// include needed database functions
		include_once($BASE_PATH . 'database/brands.php');
		include_once($BASE_PATH . 'database/products.php');
		
		// fetch data
		$brands = getAllBrands();
		$product = getproduct($_GET['id']);
		
		// send data to smarty
		$smarty->assign('brands', $brands);
		$smarty->assign('product', $product);
		// display smarty template
		$smarty->display('manager/products/form_edit_product.tpl');
	
	}
?>
