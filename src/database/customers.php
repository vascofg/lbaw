<?php

  // Get all customers
  function getAllCustomers() {
    global $db;
    $stmt = $db->prepare("SELECT * FROM frequent_customer");
    $stmt->execute();
    return $stmt->fetchAll();
  }
  
  function getCustomer($id) {
  	global $db;
    $stmt = $db->prepare("SELECT * FROM frequent_customer where frequent_customerid = :id");
    $stmt->execute(array(id=>$id));
    $result = $stmt->fetch();
    return ($result);
  }
  
  function deleteCustomer($id) {
    global $db;
    $stmt = $db->prepare("DELETE FROM frequent_customer WHERE frequent_customerid = :id");
    $stmt->execute(array(id=>$id));
    return;
  }
  
  function register($username,$password,$fullname,$email) {
  	global $db;
  	try {
  		$stmt = $db->prepare("INSERT INTO frequent_customer (username,password,fullname,email) values (:username,:password,:fullname,:email)");
  		$stmt->execute(array($username,$password,$fullname,$email));
  	}
  	catch (PDOException $e) {
  		if($e->getCode() == 23505)
  			echo "Duplicate email or username";
  		else
  			echo $e->getMessage();
  		die;
  	}
  	return intval($db->lastInsertId(frequent_customer_frequent_customerid_seq));
  }
  
?>
