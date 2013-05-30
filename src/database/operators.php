<?php

  // Get all operators
  function getAllOperators() {
    global $db;
    $stmt = $db->prepare("SELECT * FROM pos_operator");
    $stmt->execute();
    return $stmt->fetchAll();
  }
  
  function getOperator($id) {
  	global $db;
    $stmt = $db->prepare("SELECT * FROM pos_operator where pos_operatorid = :id");
    $stmt->execute(array(id=>$id));
    $result = $stmt->fetch();
    return ($result);
  }
  
  function deleteOperator($id) {
    global $db;
    $stmt = $db->prepare("DELETE FROM pos_operator WHERE pos_operatorid = :id");
    $stmt->execute(array(id=>$id));
    return;
  }
  
  function register($username,$password,$fullname,$email) {
  	global $db;
  	try {
  		$stmt = $db->prepare("INSERT INTO pos_operator (username,password,fullname,email) values (:username,:password,:fullname,:email)");
  		$stmt->execute(array($username,$password,$fullname,$email));
  	}
  	catch (PDOException $e) {
  		if($e->getCode() == 23505)
  			echo "Duplicate email or username";
  		else
  			echo $e->getMessage();
  		die;
  	}
  	return intval($db->lastInsertId(pos_operator_pos_operatorid_seq));
  }
  
?>
