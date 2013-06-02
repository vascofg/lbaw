<?php
    // initialize
    include_once('../../../common/init.php');
    if(!isLoggedInOperator())
      redirect("pages/operator/auth/login.php");
    else {
      $products = $_POST['products'];
      $smarty->assign('products',$products);
      $smarty->display("operator/sales/finish_sale.tpl");
    }
?>
