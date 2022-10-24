<?php 

class UserController {

	

	public static function auth(){
		// le formulaire a été posté
		if(isset($_POST['submit']))
		{
			$data['username'] = $_POST['username'];
			$result = UsersDB::login($data);
			if($result->getusername() === $_POST['username'] && password_verify($_POST['password'],$result->getpassword())){

				$_SESSION['logged'] = true;
				$_SESSION['username'] = $result->getusername();
				Redirect::to('home');

			}else{
				Session::set('error','Pseudo ou mot de passe est incorrect');
				Redirect::to('login');
			}
		}
		else
		{
			// il faut afficher le formulaire
			include('views/login.php');
		}
	}
	
	public static function register(){
		// le formulaire a été posté
		if(isset($_POST['submit']))
		{
			$options = [
				'cost' => 12
			];
			$password = password_hash($_POST['password'],PASSWORD_BCRYPT,$options);
			$data = array(
				'fullname' => filter_var($_POST['fullname'], FILTER_SANITIZE_STRING),
				'username' => filter_var($_POST['username'], FILTER_SANITIZE_STRING),
				'password' => $password,
			);
			$result = UsersDB::createUser($data);
			if($result){
				Session::set('success','Compte crée');
				Redirect::to('login');
			}else{
				echo $result;
			}
		}
		else
		{
			// il faut afficher le formulaire
			include('views/register.php');

		}
	}

	static public function logout(){
		session_destroy();
		include('views/login.php');
	}


}