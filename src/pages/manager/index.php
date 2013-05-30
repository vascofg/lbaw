<?php
	// initialize
  include_once('../../common/init.php');

  if(!isLoggedInAdmin())
	redirect("pages/manager/auth/login.php");
  else
  {
   	$smarty->display("manager/index.tpl"); 	
  }
?>
