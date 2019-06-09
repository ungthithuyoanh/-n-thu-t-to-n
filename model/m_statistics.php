<?php
	require_once("connect/database.php");
	/**
	 * 
	 */
	class M_Statistics extends Database
	{
		
		function __construct()
		{
			parent::__construct();
		}
		function queryCountProducts(){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("SELECT count(id) as total FROM products LIMIT 1");
				$stmt->execute();
			}catch(PDOException $e){
				echo "queryCountProducts failed: " . $e->getMessage();
			}
		    if($stmt->rowCount() == 0){ //không có
		    	$stmt=null;
		    	$conn=null;
		    	return 0;
		    }else{ //có
		    	$data = $stmt->fetch(PDO::FETCH_ASSOC);
		    	$stmt=null;
		    	$conn=null;
		    	return $data['total'];
		    }
		}
		function queryCountTypesProducts(){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("SELECT count(id) as total FROM types_products LIMIT 1");
				$stmt->execute();
			}catch(PDOException $e){
				echo "queryCountTypesProducts failed: " . $e->getMessage();
			}
		    if($stmt->rowCount() == 0){ //không có
		    	$stmt=null;
		    	$conn=null;
		    	return 0;
		    }else{ //có
		    	$data = $stmt->fetch(PDO::FETCH_ASSOC);
		    	$stmt=null;
		    	$conn=null;
		    	return $data['total'];
		    }
		}
		function queryCountFoodShop(){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("SELECT count(id) as total FROM foodshop LIMIT 1");
				$stmt->execute();
			}catch(PDOException $e){
				echo "queryCountFoodShop failed: " . $e->getMessage();
			}
		    if($stmt->rowCount() == 0){ //không có
		    	$stmt=null;
		    	$conn=null;
		    	return 0;
		    }else{ //có
		    	$data = $stmt->fetch(PDO::FETCH_ASSOC);
		    	$stmt=null;
		    	$conn=null;
		    	return $data['total'];
		    }
		}
		function queryCountUsers(){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("SELECT count(id) as total FROM users LIMIT 1");
				$stmt->execute();
			}catch(PDOException $e){
				echo "queryCountUsers failed: " . $e->getMessage();
			}
		    if($stmt->rowCount() == 0){ //không có
		    	$stmt=null;
		    	$conn=null;
		    	return 0;
		    }else{ //có
		    	$data = $stmt->fetch(PDO::FETCH_ASSOC);
		    	$stmt=null;
		    	$conn=null;
		    	return $data['total'];
		    }
		}
		function queryCountAdminUsers(){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("SELECT count(id) as total FROM users WHERE role=1 LIMIT 1");
				$stmt->execute();
			}catch(PDOException $e){
				echo "queryCountAdminUsers failed: " . $e->getMessage();
			}
		    if($stmt->rowCount() == 0){ //không có
		    	$stmt=null;
		    	$conn=null;
		    	return 0;
		    }else{ //có
		    	$data = $stmt->fetch(PDO::FETCH_ASSOC);
		    	$stmt=null;
		    	$conn=null;
		    	return $data['total'];
		    }
		}
		function queryCountCustomerUsers(){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("SELECT count(id) as total FROM users WHERE role=0 LIMIT 1");
				$stmt->execute();
			}catch(PDOException $e){
				echo "queryCountCustomerUsers failed: " . $e->getMessage();
			}
		    if($stmt->rowCount() == 0){ //không có
		    	$stmt=null;
		    	$conn=null;
		    	return 0;
		    }else{ //có
		    	$data = $stmt->fetch(PDO::FETCH_ASSOC);
		    	$stmt=null;
		    	$conn=null;
		    	return $data['total'];
		    }
		}
		function queryCountShopUsers(){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("SELECT count(id) as total FROM users WHERE role=3 LIMIT 1");
				$stmt->execute();
			}catch(PDOException $e){
				echo "queryCountAdminUsers failed: " . $e->getMessage();
			}
		    if($stmt->rowCount() == 0){ //không có
		    	$stmt=null;
		    	$conn=null;
		    	return 0;
		    }else{ //có
		    	$data = $stmt->fetch(PDO::FETCH_ASSOC);
		    	$stmt=null;
		    	$conn=null;
		    	return $data['total'];
		    }
		}	
	}

?>