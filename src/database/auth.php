<?php

  // Check Manager Login
  function checkLoginManager($username,$password) {
    global $db;
    $stmt = $db->prepare("SELECT count(*) FROM system_manager where username = :username and password = :password");
    $stmt->execute(array($username,$password));
		$result = $stmt->fetch(PDO::FETCH_NUM);
    return ($result[0]>0);
  }

  // Check Operator Login
  function checkLoginOperator($username,$password) {
    global $db;
    $stmt = $db->prepare("SELECT pos_operatorid FROM pos_operator where username = :username and password = :password");
    $stmt->execute(array($username,$password));
		$result = $stmt->fetch(PDO::FETCH_NUM);
		if($result)
    	return ($result[0]);
    else
    	return (0);
  }
  
  function registerManager($username,$password,$fullname,$email) {
  	global $db;
  	try {
  		$stmt = $db->prepare("INSERT INTO system_manager (username,password,fullname,email) values (:username,:password,:fullname,:email)");
  		$stmt->execute(array($username,$password,$fullname,$email));
  	}
  	catch (PDOException $e) {
  		if($e->getCode() == 23505)
  			echo "Duplicate email or username";
  		else
  			echo $e->getMessage();
  		die;
  	}
  	return intval($db->lastInsertId(system_manager_system_managerid_seq));
  }

?>
