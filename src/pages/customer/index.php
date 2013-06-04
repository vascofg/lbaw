<?php
    // initialize
    include_once('../../common/init.php');
    if(!isLoggedInOperator())
      redirect("pages/customer/auth/login.php");
    else {
      $smarty->display("customer/index.tpl");
    }
?>
