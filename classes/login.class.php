<?php

	session_start();

class Login extends Database{

	private $username;
	private $password;

		public function __construct($username,$password){
			$this->username=$username;
			$this->password=$password;
		}

	public function login(){

			$stmt=$this->connect()->prepare('SELECT * FROM users WHERE username=:username');
			$stmt->execute([':username' => $this->username] );

        
					

				 		if($stmt->rowCount()>0){
							while($row=$stmt->fetch()){
										$passcode=$row->password;
										$username=$row->username;
										$id=$row->register_id;
										$ids=$row->id;

								}
								$hashing=password_verify($this->password,$passcode);

								if($hashing==$passcode){
									Print 'Welcome';

								

										
									$_SESSION['register_id']=$id;
									$_SESSION['id']=$ids;
									$_SESSION['name']=$username;
									$_SESSION['name']=$username;
										
									
								}
								else{
									Print 'Password is incorrect';
								}
						}
						else{


							Print 'Username does not exist';
								




							}

			   return $stmt;

	}


	



}