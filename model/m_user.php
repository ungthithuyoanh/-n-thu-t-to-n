<?php 
require_once("connect/database.php");

class User extends Database
{

	public function __construct()
	{
		parent::__construct();
	}

	function queryUsername($_userName){
	    //kiem tra username trong database
		$_userName = trim($_userName);
		//cat khoang trang 2 dau
		$conn = parent::getConn();
		$stmt = null;
		try {
			$stmt = $conn->prepare("SELECT username FROM users WHERE username=:username");

			$stmt->bindValue(":username", $_userName);

			$stmt->execute();

		}catch(PDOException $e){
			echo "QueryUserName failed: " . $e->getMessage();
		}

	    if( $stmt->rowCount() == 0 ){ //không có
	    	$stmt=null;
	    	$conn=null;
	    	return 0;
	    }else{ //có
	    	$stmt=null;
	    	$conn=null;
	    	return 1;
	    }
	}
	function queryEmail( $_email ){
		//ktra email tồn tại hay chưa
		$_email = trim($_email);
		$conn = parent::getConn();
		$stmt = null;
		try {
			$stmt = $conn->prepare("SELECT email FROM users WHERE email=:email");
			$stmt->bindValue(":email", $_email);
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
	function queryUser($_login, $_pass){
		$_login = trim($_login);
		// $_pass = md5($_pass);
		
		$conn = parent::getConn();

		$sql = 'SELECT id,username,name,password,email, verified, role, crtime FROM users where ( username=:login OR email=:login ) AND password =:pass';

		$stmt = $conn->prepare($sql);

		$stmt->bindValue(':login', $_login);
		$stmt->bindValue(':pass', $_pass);

		$stmt -> execute();

		$row = $stmt->rowCount();

		if( $row == 0){
			$stmt=null;
			$conn=null;
			return 0;
		}else{
			$data = $stmt->fetch(PDO::FETCH_ASSOC);
			$stmt=null;
			$conn=null;
			return $data;
		}
	}
	function queryUserLimit($_sql){
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
	function queryVerified($_vkey){
		$conn = parent::getConn();
		$stmt = null;
		try {
			$stmt = $conn->prepare("SELECT vkey, verified FROM users WHERE vkey=:vkey AND verified=0 LIMIT 1");
			$stmt->bindValue(":vkey", $_vkey);
			$stmt->execute();
		}catch(PDOException $e){
			echo "QueryVirified failed: " . $e->getMessage();
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
	function queryToken($_token, $_email){
		$conn = parent::getConn();

		$sql = 'SELECT * FROM users where token=:token and email=:email';

		$stmt = $conn->prepare($sql);

		$stmt->bindValue(':token', $_token);
		$stmt->bindValue(':email', $_email);

		$stmt -> execute();

		$row = $stmt->rowCount();

		if( $row == 0){
			$stmt=null;
			$conn=null;
			return 0;
		}else{
			$stmt=null;
			$conn=null;
			return 1;
		}
	}
	function queryTotalUsers($_sql){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare($_sql);
				$stmt->execute();
			}catch(PDOException $e){
				echo "queryTotalUsers failed: " . $e->getMessage();
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
	function queryProfileAdmin($_id){
		$conn =parent::getConn();
		$stmt = null;
		try {
			$stmt = $conn->prepare('SELECT id, name, username, email, sex, birthday, phone, address, verified, role, crtime FROM users WHERE id = :id LIMIT 1');
			$stmt->bindValue(':id', $_id);
			$stmt->execute();
		}catch(PDOException $e){
			echo "queryProfileAdmin failed: " . $e->getMessage();
		}
		$row = $stmt->rowCount();
		if($row == 0 ){
			$stmt=null;
			$conn=null;
			return 0;
		}else{
			$data = $stmt->fetch(PDO::FETCH_ASSOC);
			$stmt=null;
			$conn=null;
			return $data;
		}
	}
	function queryProfile($_id){
		$conn =parent::getConn();
		$stmt = null;
		try {
			$stmt = $conn->prepare('SELECT name, username, email, sex, birthday, phone, address FROM users WHERE id=:id ');
			$stmt->bindValue(':id', $_id);
			$stmt->execute();
		}catch(PDOException $e){
	    	echo "Query failed: " . $e->getMessage();
	    }

	    $row = $stmt->rowCount();
	    
	    if($row == 0 ){
	    	$stmt=null;
	    	$conn=null;
	    	return 0;
	    }else{
	    	$data = $stmt->fetch(PDO::FETCH_ASSOC);
		    $stmt=null;
		    $conn=null;
		    return $data;
	    }
	}
	function queryPassword($_id, $_password){
		$conn = parent::getConn();
		$stmt = null;
		try {
			$stmt = $conn->prepare("SELECT id, password FROM users WHERE password=:password AND id=:id");
			$stmt->bindValue(':password', $_password);
			$stmt->bindValue(':id', $_id);
			$stmt->execute();
		}catch(PDOException $e){
	    	echo "Error query password: " . $e->getMessage();
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
	function updatePassword($_id, $_password){
		$conn = parent::getConn();
		$stmt = null;
		try {
			$stmt = $conn->prepare('UPDATE users SET password=:password WHERE id=:id ');
			$stmt->bindValue(':password', $_password);
			$stmt->bindValue(':id', $_id);
			$stmt->execute();
		}catch(PDOException $e){
	    	echo "Error update password: " . $e->getMessage();
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
	public function insertUser($userArr=array()){
		$conn = parent::getConn();
		$stmt = null;
		try {
			$stmt = $conn->prepare('INSERT INTO users (username, password, name, email, sex, birthday, phone, address,  vkey,role) VALUES ( ?, ?, N'.'?'.', ?, ?, ?, ?, ?, ?,?)');
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
	
	function updateVerified($_vkey){
		$conn = parent::getConn();
		$stmt = null;
		try {
			$stmt = $conn->prepare("UPDATE  users SET verified=1 WHERE vkey=:vkey LIMIT 1");
			$stmt->bindValue(":vkey", $_vkey);
			$stmt->execute();
		}catch(PDOException $e){
			echo "UpdateVerified failed: " . $e->getMessage();
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
	function updateToken($_token,$_email){
		$conn = parent::getConn();
		$stmt = null;
		try {
			$stmt = $conn->prepare("UPDATE  users SET token=:token WHERE email=:email LIMIT 1");
			$stmt->bindValue(":token", $_token);
			$stmt->bindValue(":email", $_email);
			$stmt->execute();
		}catch(PDOException $e){
			echo "updateToken failed: " . $e->getMessage();
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
	
	function updatePass($_pass,$_token,$_email){
		$conn = parent::getConn();
		$stmt = null;
		try {
			$stmt = $conn->prepare("UPDATE  users SET password=:password ,token =null WHERE email=:email LIMIT 1");
			$stmt->bindValue(":password", $_pass);
			$stmt->bindValue(":email", $_email);
			$stmt->execute();
		}catch(PDOException $e){
			echo "updateToken failed: " . $e->getMessage();
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
	
	function updateAdminUser($id, $role){
		$conn = parent::getConn();
		$stmt = null;
		try {
			$stmt = $conn->prepare('UPDATE users SET role=? WHERE id=? LIMIT 1');
			$stmt->bindValue(1, $role);
			$stmt->bindValue(2, $id);
			$stmt->execute();
		}catch(PDOException $e){
			echo "Lỗi updateAdminUser: " . $e->getMessage();
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
	function updateProfile($profileArr = array()){
		$conn = parent::getConn();
		$stmt = null;
		try {
			$stmt = $conn->prepare('UPDATE users SET name=N'.'?'.' , sex=? , birthday=? , phone=? , address=N'.'?'.' , verified=? WHERE id=? ');
			$stmt->execute($profileArr);
		}catch(PDOException $e){
			echo "Lỗi update: " . $e->getMessage();
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
	function deleteIdUser($idUser){
		$conn = parent::getConn();
		$stmt = null;
		try {
			$stmt = $conn->prepare("
				DELETE FROM products WHERE type_id=:id;
				DELETE FROM types_products WHERE shop_id=:id;
				DELETE FROM foodshop WHERE user_id=:id;  
				DELETE FROM users WHERE id=:id LIMIT 1");
			$stmt->bindValue(':id', $idUser);
			$stmt->execute();
		}catch(PDOException $e){
			echo "deleteIdUser failed: " . $e->getMessage();
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