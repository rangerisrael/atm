<?php
session_start();

error_reporting(E_ALL ^ E_NOTICE);


include('../classes/builder.class.php');
$request=htmlentities($_POST['response']);


switch ($request) {
	case 'withdraw':

			$amount=htmlentities($_POST['amount']);
			$desc=htmlentities($_POST['desc']);
	$test= new builder();
		


			if(empty($amount)){
				Print 'Amount cannot be empty';
				exit();
			}
			if($amount <100){
				Print 'Amount can hadle only ';
					echo "&#8369;";
					echo '100 above';
					exit();

			}

			if($amount > $test->valuedb() ){
				Print 'Your balance  is not enough your remaining balance ';
					echo "&#8369;";
					echo $test->valuedb();
					exit();

			}



			else
			{
			$test->add((int) $test->valuedb());
			$test->minus((int)$amount);
		
			$test->updateamountdb();
			$test->setvalue($amount);
			$test->getvalue();
			$test->setdesc($desc);
			$test->getdesc();
			$test->gettransaction_minus();
			
			Print '';
			}


				
			

	break;


	case 'deposit':

			$amount=htmlentities($_POST['amount']);
			$desc=htmlentities($_POST['desc']);
	$test= new builder();
		


			if(empty($amount)){
				Print 'Amount cannot be empty';
				exit();
			}
			if($amount <100){
				Print 'Amount can hadle only ';
					echo "&#8369;";
					echo '100 above';
					exit();

			}

			if($amount > 1000000 ){
				Print 'Balance available is dont exist  ';
					echo "&#8369;";
					echo '1,000,000';
					exit();

			}



			else
			{
			$test->add((int) $test->valuedb());
			$test->add((int)$amount);
			
			$test->updateamountdb();
			$test->setvalue($amount);
			$test->getvalue();
			$test->setdesc($desc);
			$test->getdesc();
			$test->getadd();
			
				Print '';
			
			}





		break;

			
	default:
		# code...
		break;
			
}







?>