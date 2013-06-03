<?php
	// initialize
  include_once('../../../common/init.php');

  if (!isLoggedInAdmin())
	redirect('');

  else {
	  
	include_once($BASE_PATH . 'database/customers.php');
	// fetch data
	$customer = getCustomer($_GET['id']);

	// send data to smarty
	$smarty->assign('customer', $customer);

	// display smarty template
	$smarty->display('manager/customers/form_edit_customer.tpl');
  }
?>
