<?php

	function saveSale($products)
	{
		try{
			global $db;
		  $stmt = $db->prepare("INSERT INTO sale (date, pos_operatorid) VALUES (CURRENT_TIMESTAMP, :id)");
		  $stmt->execute(array(id=>$_SESSION['operator']['id']));
			$saleID = intval($db->lastInsertId(sale_saleid_seq));
			foreach($products as $id => $product)
			{
				$stmt = $db->prepare("INSERT INTO joinsaletoproduct (price, quantity, productid, saleid) VALUES (:price, :quantity, :productid, :saleid)");
				$stmt->execute(array(price=>$product['price'], quantity=>$product['quantity'], productid=>$id, saleid=>$saleID));
		  }
		}
    catch (PDOException $e) {
      echo $e->getMessage();
      die;
    }
	}
	
	function getCardBalance($cardnumber)
	{
		global $db;
	  $stmt = $db->prepare("SELECT balance from customer_card WHERE customer_cardid = :id");
	  $stmt->execute(array(id=>$cardnumber));
		$result = $stmt->fetch(PDO::FETCH_NUM);
		if($result)
    	return ($result[0]);
    else
    	return (-1);
	}
	
?>
