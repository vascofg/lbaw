<?php
    // initialize
    include_once('../../../common/init.php');
    if(!isLoggedInAdmin())
      redirect("pages/manager/auth/login.php");
    else {
    	include_once($BASE_PATH . 'database/sales.php');
    	$smarty->assign('graph',getAllSalesGraph());
      $smarty->display("manager/stats/view_stats.tpl");
    }
?>
