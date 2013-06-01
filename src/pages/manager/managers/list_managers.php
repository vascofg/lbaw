<?php
	// initialize
    include_once('../../../common/init.php');

	if (!isLoggedInAdmin())
		redirect('');
		
	else {
	
		// include needed database functions
		include_once($BASE_PATH . 'database/auth.php');

		// fetch data
		$managers = getAllManagersPage(0);
		
		// send data to smarty
		$smarty->assign('managers', $managers);
		$smarty->assign('numpages', ceil($managers[0]['count']/$pagesize));
		
		// display smarty template
		$smarty->display('manager/managers/list_managers.tpl');
	
	}
?>
