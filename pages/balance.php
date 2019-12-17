<?php include('../classes/builder.class.php');?>
<?php

session_start();


if(!isset($_SESSION['register_id'])){
	header('Location:index.php');
}




?>

<body>
			<h1>WELCOME TO ATM MACHINE</h1>
			<a href="home.php">Click here to go back</a>
			<br>
			<br>
<?php
	

	$test= new builder();

	echo "BALANCE &#8369;".$test->valuedb();
	


	

  ?>

		
				<br>
			<a  href="logout.php">Logout</a>
</body>
</html>