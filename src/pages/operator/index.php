<?php
    // initialize
    include_once('../../common/init.php');
    if(!isLoggedInOperator())
      redirect("pages/operator/auth/login.php");
    else {
      include_once($BASE_PATH . 'database/products.php');
      $products = getAllProducts();
      $smarty->assign('products',$products);
      $smarty->display("operator/index.tpl");
    }
?>
