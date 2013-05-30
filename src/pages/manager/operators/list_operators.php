<?php
	// initialize
    include_once('../../../common/init.php');

	if (!isLoggedInAdmin())
		redirect('');
		
	else {
	
		// include needed database functions
		include_once($BASE_PATH . 'database/operators.php');

		// fetch data
		$operators = getAllOperators();
		
		// send data to smarty
		$smarty->assign('operators', $operators);
		
		// display smarty template
		$smarty->display('manager/operators/list_operators.tpl');
	
	}
?>
