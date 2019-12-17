<?php

include('../classes/register.class.php');
include('../classes/login.class.php');
$request = filter_var(htmlentities($_POST['request']),FILTER_SANITIZE_STRING);


switch ($request) {
	case 'signup_code':

	$username=htmlentities($_POST['user']);
	$pass=htmlentities($_POST['pass']);
	$id=htmlentities($_POST['id']);
	
	
	if(empty($username) && empty($password)){
		Print 'All Field is required'.'<br/>';
	}
	if(empty($username) && ($pass!='')){
		Print 'Username name field is empty'.'<br/>';
	}
	if(empty($pass) && ($username !='')){
		Print 'Password is missing'.'<br/>';

	}
	else{
		if(strlen($pass)<6){
			Print 'Password is short'.'<br/>';

		}
		if(strlen($pass)>6){
			Print 'Password is to long'.'<br/>';

		}
		if(!preg_match('/[0-9]$/', $pass)){
			Print 'Pin code is numeric or digit'.'<br/>';

		}
		else{

				// $test= new Database();


				// $stmts=$test->connect()->prepare('SELECT * FROM users WHERE username=:username');
				// $stmts->execute([':username' => $username] );

				// 		if($stmts->rowCount()>0){
				// 			echo 'Username is exist';
				// 		}
				// 		else{
				// 			$stmts=$test->connect()->prepare('INSERT INTO users(username,password,date_transaction) VALUES(:user,:pass,NOW())');
				// 			$stmts->execute([':user'=>$username,':pass'=>$pass]);

				// 					echo "<script>alert('Success')</script>";

			$data= new Register($id,$username,password_hash($pass,PASSWORD_DEFAULT));


			$data->register();
				



}
	


	}


			break;

	case 'login_code':
	
					$username=htmlentities($_POST['user']);
	$pass=htmlentities($_POST['pass']);
	
	
	if(empty($username) && empty($pass)){
		Print 'All Field is required'.'<br/>';
	}
	if(empty($username) && $pass !=''){
		Print 'Username name field is empty'.'<br/>';
	}
	if(empty($pass) && $username !=''){
		Print 'Password is missing'.'<br/>';
	}
	else{
		if(!preg_match('/[0-9]/', $pass)){
			Print 'Only digit is allowed'.'<br/>';
		}
		if(strlen($pass)<6){
			Print 'Pin code is exactly 6'.'<br/>';
		}
		if(strlen($pass)>6){
			Print 'Pin code is exist 6'.'<br/>';
		}
		else{
				// $test= new Database();


				// $stmts=$test->connect()->prepare('SELECT * FROM users WHERE username=:username');
				// $stmts->execute([':username' => $username] );

				// 		if($stmts->rowCount()>0){
				// 			echo 'Username is exist';
				// 		}
				// 		else{
				// 			$stmts=$test->connect()->prepare('INSERT INTO users(username,password,date_transaction) VALUES(:user,:pass,NOW())');
				// 			$stmts->execute([':user'=>$username,':pass'=>$pass]);

				// 					echo "<script>alert('Success')</script>";

			$data= new Login($username,$pass);

			$data->login();

}

}	




















			break;
	
	
}


?>