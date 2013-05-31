<?php
	// initialize
    include_once('../../../common/init.php');

	if (!isLoggedInAdmin())
		redirect('');
		
	else {
	
		// include needed database functions
		include_once($BASE_PATH . 'database/brands.php');

		// fetch data
		$brands = getAllBrandsUsagePage(0);
		
		// send data to smarty
		$smarty->assign('brands', $brands);
		$smarty->assign('numpages', ceil($brands[0]['count']/$pagesize));
		
		// display smarty template
		$smarty->display('manager/brands/list_brands.tpl');
	
	}
?>
