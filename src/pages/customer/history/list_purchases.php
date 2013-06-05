<?php
    // initialize
    include_once('../../../common/init.php');
    if(!isLoggedInCustomer())
      redirect("pages/customer/auth/login.php");
    else {
    	include_once($BASE_PATH . 'database/sales.php');
    	$purchases = getCustomerSales($_SESSION['customer']['id']);
    	$smarty->assign('purchases',$purchases);
      $smarty->display("customer/history/list_purchases.tpl");
    }
?>
