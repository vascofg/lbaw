<?php
	// initialize
    include_once('../../../common/init.php');

	if (!isLoggedInAdmin())
		redirect('');
		
	else {
	
		// include needed database functions
		include_once($BASE_PATH . 'database/operators.php');

		// fetch data
		$operators = getAllOperatorsPage(0);
		
		// send data to smarty
		$smarty->assign('operators', $operators);
		$smarty->assign('numpages', ceil($operators[0]['count']/$pagesize));
		
		// display smarty template
		$smarty->display('manager/operators/list_operators.tpl');
	
	}
?>
