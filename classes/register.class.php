<?php
include('../configuration/database.php');

class Register extends Database{


		private $username;
		private $password;
		private $id;


		public function __construct($id,$username,$password){
			$this->username=$username;
			$this->password=$password;
			$this->id=$id;
		}


public function register(){

				$stmts=$this->connect()->prepare('SELECT * FROM users WHERE username=:username');
				$stmts->execute([':username' => $this->username] );

				 		if($stmts->rowCount()>0){
							echo 'Username is exist';
						}
						else{
							$stmts=$this->connect()->prepare('INSERT INTO users(register_id,username,password,date_transaction) VALUES(:id,:user,:pass,NOW())');
			 			$stmts->execute([
			 				':id'=>$this->id,
			 				':user'=>$this->username,
			 				':pass'=>$this->password

			 				]);

			 			Print 'Done';



		
	}
	return $stmts;
}

}