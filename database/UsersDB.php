<?php
class UsersDB{
    static public function login($data){
		$username = $data['username'];
		try{
			$query = 'SELECT * FROM users WHERE username=:username';
			$stmt = DB::connect()->prepare($query);
			$stmt->execute(array(":username" => $username));
			$user = $stmt->fetch(PDO::FETCH_OBJ);
			return new Users($user->id,$user->fullname,$user->username,$user->password);
		}catch(PDOException $ex){
			echo 'erreur' . $ex->getMessage();
		}
	}
    static public function createUser($data):bool{
		$stmt = DB::connect()->prepare('INSERT INTO users (fullname,username,password)
			VALUES (:fullname,:username,:password)');
		$stmt->bindParam(':fullname',$data['fullname']);
		$stmt->bindParam(':username',$data['username']);
		$stmt->bindParam(':password',$data['password']);

		if($stmt->execute()){
			$stmt = null;
			return true;
		}else{
			$stmt = null;
			return false;
		}
		
	}
}
?>