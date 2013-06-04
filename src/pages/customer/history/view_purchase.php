<?php
    // initialize
    include_once('../../../common/init.php');
    if(!isLoggedInCustomer())
      redirect("pages/customer/auth/login.php");
    elseif(isset($_GET['id'])) {
    	include_once($BASE_PATH . 'database/sales.php');
    	$saleID = $_GET['id'];
    	$products = getSaleByID($saleID);
    	$smarty->assign('products',$products);
      $smarty->display("customer/history/view_purchase.tpl");
    }
    else
      redirect("pages/customer/history/list_purchases.php");
?>
