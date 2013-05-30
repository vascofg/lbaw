<?php
    // Setup Smarty
    include_once($BASE_PATH . 'lib/Smarty/Smarty.class.php');
    $smarty = new Smarty;
    $smarty->setTemplateDir($BASE_PATH . "templates/");    
    $smarty->setCompileDir($BASE_PATH . "templates_c/");

    // Send some common variables to Smarty
    $smarty->assign("BASE_URL", $BASE_URL);

    // Send error messages to Smarty and delete them
    $smarty->assign("s_error", $_SESSION['s_error']);
    $_SESSION['s_error'] = null;
    
    // Send ok messages to Smarty and delete them
    $smarty->assign("s_ok", $_SESSION['s_ok']);
    $_SESSION['s_ok'] = null;

    // Send form values to Smarty and PHP and delete them
    $smarty->assign("s_values", $_SESSION['s_values']);
    $_values = $_SESSION['s_values'];
    $_SESSION['s_values'] = null;

    // Send session variables to Smarty
    $smarty->assign("s_username", $_SESSION['s_username']);
    $smarty->assign("s_level", $_SESSION['s_level']);

    $cart_qty = 0;
    if (is_array($_SESSION['cart'])) {
      foreach ($_SESSION['cart'] as $item) 
        $cart_qty += $item['qty']; 
    }
    $smarty->assign('cart_qty', $cart_qty);
?>
