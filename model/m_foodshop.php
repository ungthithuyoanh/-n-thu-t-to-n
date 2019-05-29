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

	 //    function queryFoodShop($diachi){

	 //    	$conn = parent::getConn();
	 //    	$stmt = null;
	 //    	if($diachi == null){
	 //    		$diachi = '1=1';
	 //    	}
	 //    	try {
	 //    		$stmt = $conn->prepare("SELECT * FROM foodshop  WHERE ".$diachi);
	 //    		$stmt->execute();
	 //    	} catch (PDOException $e) {
	 //    		echo "No foodshop: ".$e->getMessage();
	 //    	}

	 //    	if( $stmt->rowCount() == 0 ){ //không có
	 //    		$stmt=null;
	 //    		$conn=null;
	 //    		return 0;
		//     }else{ //có
		//     	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		//     	$stmt=null;
		//     	$conn=null;
		//     	return $data;
		//     }
		// }
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
		function updateProducts($productArr = array()){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("UPDATE foodshop SET name=N"."?"." , gender=N"."?"." , types=N"."?"." , cost=? , img=?, describes=N"."?"." , updateTime=now() WHERE id=? LIMIT 1");
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

		function queryFoodShop($_sql){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare($_sql);
				$stmt->execute();
			}catch(PDOException $e){
				echo "queryProducts failed: " . $e->getMessage();
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
		function queryNameUsers($_iduser){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("SELECT name FROM users  WHERE id=:id LIMIT 1");
				$stmt->bindValue(":id",$_iduser);
				$stmt->execute();
			}catch(PDOException $e){
				echo "queryTotalProducts failed: " . $e->getMessage();
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
		function queryTotalFoodShop($_sql){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare($_sql);
				$stmt->execute();
			}catch(PDOException $e){
				echo "queryTotalProducts failed: " . $e->getMessage();
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
				$stmt = $conn->prepare("DELETE FROM carts WHERE idproduct=:id LIMIT 1; DELETE FROM orders WHERE idproduct=:id LIMIT 1; DELETE FROM shoesProducts WHERE id=:id LIMIT 1");
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