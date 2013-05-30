<?php
	// initialize
  include_once('../../../common/init.php');

  if (isLoggedInOperator())
	redirect('pages/operator');

  else {
  
	  // display smarty template
	  $smarty->display('operator/auth/login.tpl');
  }
?>
