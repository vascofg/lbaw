<?php

	function saveSale($products)
	{
		try{
			global $db;
		  $stmt = $db->prepare("INSERT INTO sale (date, pos_operatorid) VALUES (CURRENT_TIMESTAMP, :id)");
		  $stmt->execute(array(id=>$_SESSION['operator']['id']));
			$saleID = intval($db->lastInsertId(sale_saleid_seq));
			foreach($products as $product)
			{
				$stmt = $db->prepare("INSERT INTO joinsaletoproduct (price, quantity, productid, saleid) VALUES (:price, :quantity, :productid, :saleid)");
				$stmt->execute(array(price=>$product['price'], quantity=>$product['quantity'], productid=>$product['id'], saleid=>$saleID));
		  }
		}
    catch (PDOException $e) {
      echo $e->getMessage();
      die;
    }
	}
	
?>
