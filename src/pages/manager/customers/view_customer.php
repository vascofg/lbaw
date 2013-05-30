<?php
	// initialize
    include_once('../../../common/init.php');

	if (!isLoggedInAdmin())
		redirect('');
	
	else {

		// include needed database functions
		include_once($BASE_PATH . 'database/customers.php');

		$id = $_GET['id'];

		// fetch data
		$customer = getCustomer($id);

		// send data to smarty
		$smarty->assign('customer', $customer);

		// display smarty template
		$smarty->display('manager/customers/view_customer.tpl');
  
  }
?>
