<?php
    // initialize
    include_once('../../common/init.php');
    if(!isLoggedInOperator())
      redirect("pages/operator/auth/login.php");
    else {
      $smarty->display("operator/index.tpl");
    }
?>
