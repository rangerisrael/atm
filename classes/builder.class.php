<?php

include('../configuration/database.php');

class builder extends Database{


	private $balance=0.00;
	private $description;

	private $amount;





	public function minus($counter=0.00){
		$this->balance -= $counter;
	}

	public function add($counter=0.00){
		$this->balance += $counter;
	}

	public function getvalue(){
		return $this->amount;
	}

	public function setvalue($amount){
		$this->amount=$amount;
	}



	public function getbal(){
		return $this->balance;
	}

	public function valuedb(){
			$stmt=$this->connect()->prepare('SELECT amount,date_transaction from oop_builder WHERE register_id=:id');
			$stmt->execute(
						[
							':id' =>$_SESSION['id']

						]

				);
			while($row=$stmt->fetch()){
				return $row->amount;
			}
	}

	public function updateamountdb(){
		$stmt= $this->connect()->prepare('UPDATE  oop_builder SET amount=:amount,date_transaction=NOW()  WHERE register_id=:id');

		$stmt->execute([

				':amount' => $this->getbal(),
				':id' =>$_SESSION['id']



			]);
	}

public function setdesc($description){
	$this->description=$description;
}
public function getdesc(){
	return $this->description;
}



	public function gettransaction_minus(){
		$stmt=$this->connect()->prepare('INSERT INTO transaction_log(description,withdraw_amount,deposit_amount,register_id,date_transaction) VALUES(:descs,:amt,"",:id,NOW())');

		$stmt->execute([
				':descs' =>$this->getdesc(),
				':amt' =>$this->getvalue(),
				':id' => $_SESSION['id']
			]);

		
	}



	public function getadd(){
		$stmt=$this->connect()->prepare('INSERT INTO transaction_log(description,withdraw_amount,deposit_amount,register_id,date_transaction) VALUES(:descs,"",:amt,:id,NOW())');

		$stmt->execute([
				':descs' =>$this->getdesc(),
				':amt' =>$this->getvalue(),
				':id' => $_SESSION['id']
			]);
	}


}

// $thi= new builder();
// $thi->add(8000);
// $thi->minus(1000);
// $thi->minus(2000);
// echo $thi->getbal();
