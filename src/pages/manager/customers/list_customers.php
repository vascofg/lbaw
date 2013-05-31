<?php
	// initialize
    include_once('../../../common/init.php');

	if (!isLoggedInAdmin())
		redirect('');
		
	else {
	
		// include needed database functions
		include_once($BASE_PATH . 'database/customers.php');

		// fetch data
		$customers = getAllCustomersPage(0);
		
		// send data to smarty
		$smarty->assign('customers', $customers);
		$smarty->assign('numpages', ceil($customers[0]['count']/$pagesize));
		
		// display smarty template
		$smarty->display('manager/customers/list_customers.tpl');
	
	}
?>
