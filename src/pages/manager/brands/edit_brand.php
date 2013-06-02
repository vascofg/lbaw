<?php
	// initialize
    include_once('../../../common/init.php');

	if (!isLoggedInAdmin())
		redirect('');
		
	else {
	
		// include needed database functions
		include_once($BASE_PATH . 'database/brands.php');

		// fetch data
		$brand = getBrand($_GET['id']);
		
		// send data to smarty
		$smarty->assign('brand', $brand);
		// display smarty template
		$smarty->display('manager/brands/form_edit_brand.tpl');
	
	}
?>
