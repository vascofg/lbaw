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
        $stmt = $db->prepare("UPDATE customer_card SET balance = balance - :value WHERE customer_cardid = :id");
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
	
	function getCustomerSales($userID)
	{
		global $db;
		if(!$userID)
			$userID = $_SESSION['customer']['id'];
		$stmt = $db->prepare("select sale.saleid, extract(epoch from date_trunc('minute',sale.date)) as date, sum(payment.ammount) as total from sale left join payment on (sale.saleid = payment.saleid) where payment.customer_cardid = :id group by sale.saleid ORDER BY sale.saleid DESC");
	  $stmt->execute(array(id=>$userID));
		return $stmt->fetchAll();
	}
	
	function getOperatorSales($userID)
	{
		global $db;
		$stmt = $db->prepare("select sale.saleid, extract(epoch from date_trunc('minute',sale.date)) as date, sum(payment.ammount) as total from sale left join payment on (sale.saleid = payment.saleid) where sale.pos_operatorid = :id group by sale.saleid ORDER BY sale.saleid DESC");
	  $stmt->execute(array(id=>$userID));
		return $stmt->fetchAll();
	}
	
	function getAllSales()
	{
		global $db;
		$stmt = $db->prepare("select sale.saleid, extract(epoch from date_trunc('minute',sale.date)) as date, sum(payment.ammount) as total from sale left join payment on (sale.saleid = payment.saleid) group by sale.saleid ORDER BY sale.saleid DESC");
	  $stmt->execute();
		return $stmt->fetchAll();
	}
	
	function getSaleByID($saleid)
	{
		global $db;
		$userID = $_SESSION['customer']['id'];
		$stmt = $db->prepare("select brand.name as brandname, product.name, sale.saleid, joinsaletoproduct.price, joinsaletoproduct.quantity, joinsaletoproduct.price*joinsaletoproduct.quantity as product_total, sum(payment.ammount) as total from sale left join joinsaletoproduct on (sale.saleid = joinsaletoproduct.saleid) left join product on (joinsaletoproduct.productid = product.productid) left join payment on (sale.saleid = payment.saleid) left join brand on (brand.brandid = product.brandid) where sale.saleid = :saleid and payment.customer_cardid = :userid group by joinsaletoproduct.productid, brand.name, product.name, sale.saleid, joinsaletoproduct.price, joinsaletoproduct.quantity order by brand.name, product.name");
	  $stmt->execute(array(saleid=>$saleid, userid=>$userID));
		return $stmt->fetchAll();
	}
	
	function getCustomerSalesGraph($id)
	{
		$sales = getCustomerSales($id);
		return json_encode(array(width=>800,height=>400,padding=>array(top=>10,left=>100,bottom=>20,right=>10),data=>array(array(name=>"table",values=>$sales)),scales=>array(array(name=>"x", type=>"ordinal", range=>"width", domain=>array(data=>"table", field=>"data.saleid")),array(name=>"y", range=>"height", domain=>array(data=>"table", field=>"data.total"))),axes=>array(array(type=>"x", scale=>"x"),array(type=>"y", scale=>"y")), marks=>array(array(type=>"rect", from=> array(data=>"table"), properties=>array(enter=>array(x=>array(scale=>"x", field=>"data.saleid"), width=>array(scale=>"x", band=>true, offset=>-1), y=>array(scale=>"y", field=>"data.total"), y2=>array(scale=>"y", value=>0)), update=>array(fill=>array(value=>"#156ba1")), hover=>array(fill=>array(value=>"#1b88ce")))))));
	}
	
	function getOperatorSalesGraph($id)
	{
		$sales = getOperatorSales($id);
		return json_encode(array(width=>800,height=>400,padding=>array(top=>10,left=>100,bottom=>20,right=>10),data=>array(array(name=>"table",values=>$sales)),scales=>array(array(name=>"x", type=>"ordinal", range=>"width", domain=>array(data=>"table", field=>"data.saleid")),array(name=>"y", range=>"height", domain=>array(data=>"table", field=>"data.total"))),axes=>array(array(type=>"x", scale=>"x"),array(type=>"y", scale=>"y")), marks=>array(array(type=>"rect", from=> array(data=>"table"), properties=>array(enter=>array(x=>array(scale=>"x", field=>"data.saleid"), width=>array(scale=>"x", band=>true, offset=>-1), y=>array(scale=>"y", field=>"data.total"), y2=>array(scale=>"y", value=>0)), update=>array(fill=>array(value=>"#156ba1")), hover=>array(fill=>array(value=>"#1b88ce")))))));
	}
	
	function getAllSalesGraph()
	{
		$sales = getAllSales();
		return json_encode(array(width=>800,height=>400,padding=>array(top=>10,left=>100,bottom=>20,right=>10),data=>array(array(name=>"table",values=>$sales)),scales=>array(array(name=>"x", type=>"ordinal", range=>"width", domain=>array(data=>"table", field=>"data.saleid")),array(name=>"y", range=>"height", domain=>array(data=>"table", field=>"data.total"))),axes=>array(array(type=>"x", scale=>"x"),array(type=>"y", scale=>"y")), marks=>array(array(type=>"rect", from=> array(data=>"table"), properties=>array(enter=>array(x=>array(scale=>"x", field=>"data.saleid"), width=>array(scale=>"x", band=>true, offset=>-1), y=>array(scale=>"y", field=>"data.total"), y2=>array(scale=>"y", value=>0)), update=>array(fill=>array(value=>"#156ba1")), hover=>array(fill=>array(value=>"#1b88ce")))))));
	}
?>
