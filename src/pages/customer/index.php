<?php
    // initialize
    include_once('../../common/init.php');
    if(!isLoggedInCustomer())
      redirect("pages/customer/auth/login.php");
    else {
      include_once($BASE_PATH . 'database/sales.php');
      $balance = getCardBalance($_SESSION['customer']['id']);
      $smarty->assign('balance',$balance);
      $smarty->display("customer/index.tpl");
    }
?>
