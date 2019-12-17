<?php

include('../configuration/database.php');

class bank extends Database{

 public $balance=0.00;
public $description;

// public function __construct($balance,$desc){
// 	$this->balance=$balance;
// 	$this->description=$desc;


// }



public function select(){
	$stmt=$this->connect()->prepare('SELECT SUM(balance) as balance FROM deposit WHERE register_id=:id');
	$stmt->execute(

			[

				':id' =>$_SESSION['id']

			]

		);

	while($row=$stmt->fetch()){
		return $row->balance;
	}


}

public function getpin(){
	$test=$this->connect()->prepare('SELECT * FROM users where register_id=:id');
	$test->execute(
				[

					':id' =>$_SESSION['register_id']


				]


		);

	while($row=$test->fetch()){
		$reg =$row->register_id;
	}
	return  $reg;
}

public function save($amount,$desc){
	$stmt=$this->connect()->prepare('INSERT into deposit(balance,register_id,description) VALUES(:balance,:id,:descr) ');
	$stmt->execute([

			':balance' =>-$amount,
			':id' =>$_SESSION['id'],
			':descr' =>$desc

		]);
}


	





}





?>