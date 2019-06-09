<?php 
require_once('connect/database.php');
	/**
	 * summary
	 */
	class FoodShop extends Database
	{
	    /**
	     * summary
	     */
	    public function __construct()
	    {
	    	parent::__construct();
	    }

	    public function insertShop($userArr=array()){
	    	$conn = parent::getConn();
	    	$stmt = null;
	    	try {
	    		$stmt = $conn->prepare('INSERT INTO foodshop (name, shop_types, address, open_time, cost, img,  user_id) VALUES ( N'.'?'.', N'.'?'.', N'.'?'.', ?, ?, ?, ?)');
	    		$stmt->execute( $userArr );
	    		$stmt=null;
	    		$conn=null;
	    		return true;
	    	}catch(PDOException $e){
	    		echo "Lỗi insert: " . $e->getMessage();
	    	}
	    	$stmt=null;
	    	$conn=null;
	    	return false;
	    }
	    function countRowFoodShop(){
	    	$conn = parent::getConn();
	    	$stmt = null;

	    	try {
	    		$stmt = $conn->prepare("SELECT count(id) as total FROM foodshop");
	    		$stmt->execute();
	    	} catch (PDOException $e) {
	    		echo "No foodshop: ".$e->getMessage();
	    	}

	    	if( $stmt->rowCount() == 0 ){ //không có
	    		$stmt=null;
	    		$conn=null;
	    		return 0;
		    }else{ //có
		    	$data = $stmt->fetch(PDO::FETCH_ASSOC);
		    	$stmt=null;
		    	$conn=null;
		    	return $data;
		    }
		}
		function queryLimitFoodShop($sql,$diachi){
			$conn = parent::getConn();
			$stmt = null;
			if($diachi == null){
				$diachi = " 1 = 1 ";
			}
			else {
				$diachi = 'address like "%N'.$diachi.'%" ';
			}
			$sql= "SELECT * FROM foodshop WHERE".$diachi . $sql;
			try {
				$stmt = $conn->prepare($sql);
				$stmt->execute();
			} catch (PDOException $e) {
				echo "No foodshop: ".$e->getMessage();
			}
			$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	    	if( $stmt->rowCount() == 0 ){ //không có
	    		$stmt=null;
	    		$conn=null;
	    		return $data;
		    }else{ //có
		    	$stmt=null;
		    	$conn=null;
		    	return $data;
		    }
		}
		function queryDetailsFoodShop($id){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("SELECT fs.*, users.name as nameuser FROM foodshop fs , users WHERE fs.id =:id and fs.user_id = users.id");
				$stmt->bindValue(":id",$id);
				$stmt->execute();
			} catch (PDOException $e) {
				echo 'queryDetails failed: '.$e.getMessage();
			}
			$data = $stmt->fetch(PDO::FETCH_ASSOC);
			if( $stmt->rowCount() == 0 ){ //không có
				$stmt=null;
				$conn=null;
				return $data;
		    }else{ //có
		    	
		    	$stmt=null;
		    	$conn=null;
		    	return $data;
		    }
		}
		function updateProducts($productArr = array()){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("UPDATE foodshop SET name=N"."?"." , shop_types=N"."?"." , address=N"."?"." ,open_time = ? ,cost=? ,user_id=? , updateTime=now() WHERE id = ? ");
				$stmt->execute($productArr);
			}catch(PDOException $e){
				echo "Lỗi updateProducts: " . $e->getMessage();
			}
			if($stmt->rowCount() > 0){
				$stmt=null;
				$conn=null;
				return true;
			}
			$stmt=null;
			$conn=null;
			return false;
		}
		function queryNameShop($_nameShop){
	    //kiem tra nameShop trong database
			$_nameShop = trim($_nameShop);
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("SELECT name, branch_id FROM foodshop WHERE name=:name");

				$stmt->bindValue(":name", $_nameShop);

				$stmt->execute();

			}catch(PDOException $e){
				echo "QueryUserName failed: " . $e->getMessage();
			}

		    if( $stmt->rowCount() == 0 ){ //không có
		    	$stmt=null;
		    	$conn=null;
		    	return 0;
		    }else{ //có
		    	$data = $stmt->fetch(PDO::FETCH_ASSOC);
		    	$stmt=null;
		    	$conn=null;
		    	return $data;
		    }
		}
		function queryAddress( $_address ){
		//ktra qAddress tồn tại hay chưa
			$_address = trim($_address);
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("SELECT address FROM foodshop WHERE address=:address");
				$stmt->bindValue(":address", $_address);
				$stmt->execute();
				
			}catch(PDOException $e){
				echo "QueryEmail failed: " . $e->getMessage();
			}
		    if($stmt->rowCount() == 0){ //không có
		    	$stmt=null;
		    	$conn=null;
		    	return 0;
		    }else{ //có
		    	$stmt=null;
		    	$conn=null;
		    	return 1;
		    }
		}
		function queryFoodShop($_sql){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare($_sql);
				$stmt->execute();
			}catch(PDOException $e){
				echo "queryFoodShop failed: " . $e->getMessage();
			}
		    if($stmt->rowCount() == 0){ //không có
		    	$stmt=null;
		    	$conn=null;
		    	return 0;
		    }else{ //có
		    	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    	$stmt=null;
		    	$conn=null;
		    	return$data;
		    }
		}
		function queryTotalFoodShop($_sql){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare($_sql);
				$stmt->execute();
			}catch(PDOException $e){
				echo "queryTotalFoodShop failed: " . $e->getMessage();
			}
		    if($stmt->rowCount() == 0){ //không có
		    	$stmt=null;
		    	$conn=null;
		    	return 0;
		    }else{ //có
		    	$data = $stmt->fetch(PDO::FETCH_ASSOC);
		    	$stmt=null;
		    	$conn=null;
		    	return $data;
		    }
		}
		function queryUserShop($id){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("SELECT * FROM foodshop  WHERE id=:id LIMIT 1");
				$stmt->bindValue(":id",$id);
				$stmt->execute();
			} catch (PDOException $e) {
				echo 'queryDetails failed: '.$e.getMessage();
			}
			if( $stmt->rowCount() == 0 ){ //không có
				$stmt=null;
				$conn=null;
				return $data;
		    }else{ //có
		    	$data = $stmt->fetch(PDO::FETCH_ASSOC);
		    	$stmt=null;
		    	$conn=null;
		    	return $data;
		    }
		}
		function deleteIdFoodShop($idProduct){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("DELETE FROM types_products WHERE shop_id=:id; DELETE FROM foodshop WHERE id=:id");
				$stmt->bindValue(':id', $idProduct);
				$stmt->execute();
			}catch(PDOException $e){
				echo "deleteIdCart failed: " . $e->getMessage();
			}
			if($stmt->rowCount() > 0){
				$stmt=null;
				$conn=null;
				return true;
			}else{
				$stmt=null;
				$conn=null;
				return false;
			}
		}
	}
	?>