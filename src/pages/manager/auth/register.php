<?php
	// initialize
  include_once('../../../common/init.php');

  if (!isLoggedInAdmin())
	redirect('');

  else {
	  
	  // display smarty template
	  $smarty->display('manager/auth/form_register.tpl');
  }
?>
