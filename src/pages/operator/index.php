<?php
    // initialize
    include_once('../../common/init.php');
    if(!isLoggedInOperator())
      redirect("pages/operator/auth/login.php");
    else {
      include_once($BASE_PATH . 'database/products.php');
      $products = getAllProductsPage(0);
      $smarty->assign('products',$products);
      $smarty->assign('numpages', ceil($products[0]['count']/$pagesize));
      $smarty->display("operator/index.tpl");
    }
?>
