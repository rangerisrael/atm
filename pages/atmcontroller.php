<?php
session_start();

error_reporting(E_ALL ^ E_NOTICE);


include('../classes/atm.class.php');

$request=htmlentities($_POST['response']);


switch ($request) {
	case 'withdraw':

			$amount=is_numeric(htmlentities($_POST['amount']));
			$desc=htmlentities($_POST['desc']);

			$test= new Bank();


				if(empty($amount)){
					Print 'Amount is no value';
					exit();
				}

				if($amount > $test->select()){

					Print 'Your balance  is not enough remaining ';
					echo "&#8369;";
					echo $test->select();



					exit();


				}
				
				else{
					$test->save(-(-$amount),$desc);



				Print 'done';
				}
				

	break;

			
	default:
		# code...
		break;
}







?>