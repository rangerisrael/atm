<?php

include('config.php');
class Database{


		//visibility encaptulation
		private $pdo;
	


		

		public function connect(){
			try {


      // $this->pdo = new PDO('mysql:host='.SERVER.';dbname='.DATA, ROOT, '');
// connection path
$dns= 'mysql:host='.SERVER.';dbname='.DATA.';charset='.CH.'';

$this->pdo= new PDO($dns,ROOTS,'');
 
 //setting error mode
$this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
$this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);

return $this->pdo;





    } catch(PDOException $e) {
      die('Connection Refuse'.$e->getMessage());
    }
		}

}

// $test= new Database();
// $test->connect();

// $stmt=$test->connect()->prepare('SELECT * FROM deposit');

// $stmt->execute();

// while($row=$stmt->fetch()){
// 	echo $row->deposit_id . '<br/>';
// }



