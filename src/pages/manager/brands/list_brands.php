<?php
	// initialize
    include_once('../../../common/init.php');

	if (!isLoggedInAdmin())
		redirect('');
		
	else {
	
		// include needed database functions
		include_once($BASE_PATH . 'database/brands.php');

		// fetch data
		$brands = getAllBrandsUsage();
		
		// send data to smarty
		$smarty->assign('brands', $brands);
		
		// display smarty template
		$smarty->display('manager/brands/list_brands.tpl');
	
	}
?>
