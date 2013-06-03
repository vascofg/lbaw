<?php

	function saveSale($products, $customercard_number, $customercard_value, $card_number, $card_value, $cash_value)
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
      if($customercard_number<=0)
        $customercard_number=null;
      if($card_number<=0)
        $card_number=null;  
      if($customercard_value>0 && $customercard_number)
      {
        $stmt = $db->prepare("UPDATE customer_card SET balance = balance - :value WHERE customer_cardid = :id)");
				$stmt->execute(array(value=>$customercard_value, id=>$customercard_number));
        $stmt = $db->prepare("INSERT INTO payment (ammount, customer_cardid, saleid) values (:ammount, :customer_cardid, :saleid)");
				$stmt->execute(array(ammount=>$customercard_value, customer_cardid=>$customercard_number, saleid=>$saleID));
      }
      if($card_value>0 && $card_number)
      {
        $stmt = $db->prepare("SELECT credit_debit_cardid from credit_debit_card where card_number = :card_number");
				$stmt->execute(array(card_number=>$card_number));
        $result = $stmt->fetch(PDO::FETCH_NUM);
        if($result[0]>0)
        {
          $card_id = $result[0];
        }
        else
        {
          $stmt = $db->prepare("INSERT INTO credit_debit_card (card_number) VALUES (:card_number)");
          $stmt->execute(array(card_number=>$card_number));
          $card_id = intval($db->lastInsertId(credit_debit_card_credit_debit_cardid_seq));
        }
        $stmt = $db->prepare("INSERT INTO payment (ammount, credit_debit_cardid, customer_cardid, saleid) values (:ammount, :credit_debit_cardid, :customer_cardid, :saleid)");
        $stmt->execute(array(ammount=>$card_value, credit_debit_cardid=>$card_id, customer_cardid=>$customercard_number, saleid=>$saleID));
      }
      if($cash_value>0)
      {
        $stmt = $db->prepare("INSERT INTO payment (ammount, change, customer_cardid, saleid) values (:ammount, :change, :customer_cardid, :saleid)");
				$stmt->execute(array(ammount=>$cash_value, change=>0, customer_cardid=>$customercard_number, saleid=>$saleID));
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
