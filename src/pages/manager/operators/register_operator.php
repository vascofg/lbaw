<?php
	// initialize
  include_once('../../../common/init.php');

  if (!isLoggedInAdmin())
	redirect('');

  else {
	  
	  // display smarty template
	  $smarty->display('manager/operators/form_register_operator.tpl');
  }
?>
