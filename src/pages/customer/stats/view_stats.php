<?php
    // initialize
    include_once('../../../common/init.php');
    if(!isLoggedInCustomer())
      redirect("pages/customer/auth/login.php");
    else {
    	include_once($BASE_PATH . 'database/sales.php');
    	$smarty->assign('graph',getCustomerSalesGraph($_SESSION['customer']['id']));
      $smarty->display("customer/stats/view_stats.tpl");
    }
?>
