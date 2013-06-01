<?php
	// initialize
    include_once('../../../common/init.php');

	if (!isLoggedInAdmin())
		redirect('');
	
	else {

		// include needed database functions
		include_once($BASE_PATH . 'database/auth.php');

		$id = $_GET['id'];

		// fetch data
		$manager = getManager($id);

		// send data to smarty
		$smarty->assign('manager', $manager);

		// display smarty template
		$smarty->display('manager/managers/view_manager.tpl');
  
  }
?>
