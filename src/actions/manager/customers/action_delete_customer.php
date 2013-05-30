<?php
	// initialize
    include_once('../../../common/init.php');

	if (!isLoggedInAdmin())
		redirect('');
	
	else{
		
		// include needed database functions
		include_once($BASE_PATH . 'database/customers.php');    

		$id = $_GET['id'];
		if(!empty($id))
		  deleteCustomer($id);
		redirect('pages/manager/customers/list_customers.php');
	}
?>
