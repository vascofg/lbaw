<?php
	// initialize
    include_once('../../../common/init.php');

	if (!isLoggedInAdmin())
		redirect('');
		
	else {
	
		// include needed database functions
		include_once($BASE_PATH . 'database/customers.php');

		// fetch data
		$customers = getAllCustomers();
		
		// send data to smarty
		$smarty->assign('customers', $customers);
		
		// display smarty template
		$smarty->display('manager/customers/list_customers.tpl');
	
	}
?>
