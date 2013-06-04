<?php
	// initialize
  include_once('../../../common/init.php');

  if (isLoggedInCustomer())
	redirect('pages/customer');

  else {
  
	  // display smarty template
	  $smarty->display('customer/auth/login.tpl');
  }
?>
