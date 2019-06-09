<?php 
	require_once("../model/m_foodshop.php");

	$m_foodshop = new FoodShop();

	$sqlTotal= "SELECT count(id) as total FROM foodshop WHERE 1=1";
	$countTotal = $m_foodshop->queryTotalFoodShop($sqlTotal);
	echo $countTotal;
	$startNew = $countTotal['total']-1;

	$sql = "SELECT *  FROM foodshop WHERE 1=1 LIMIT ".$startNew.", 1";
	$dataNew = $m_foodshop->queryFoodShop($sql);

	require_once("../view/v_foodshop.php");


 ?>