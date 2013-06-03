<?php
	// initialize
  include_once('../../../common/init.php');

  if (!isLoggedInAdmin())
	redirect('');

  else {
	  
	  // include needed database functions
		include_once($BASE_PATH . 'database/auth.php');

		// fetch data
		$manager = getManager($_GET['id']);
		
		// send data to smarty
		$smarty->assign('manager', $manager);

	  // display smarty template
	  $smarty->display('manager/auth/form_edit.tpl');
  }
?>
