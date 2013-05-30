<?php
	// initialize
  include_once('../../../common/init.php');

  if (!isLoggedInAdmin())
	redirect('');

  else {
	  
	  // display smarty template
	  $smarty->display('manager/customers/form_register_customer.tpl');
  }
?>
