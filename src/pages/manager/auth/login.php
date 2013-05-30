<?php
	// initialize
  include_once('../../../common/init.php');

  if (isLoggedInAdmin())
	redirect('pages/manager');

  else {
  
	  // display smarty template
	  $smarty->display('manager/auth/login.tpl');
  }
?>
