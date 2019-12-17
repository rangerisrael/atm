
<?php

session_start();


if(!isset($_SESSION['register_id'])){
	header('Location:index.php');
}




?>

<body>
			<h1>WELCOME TO ATM MACHINE</h1>
<?php

		echo $_SESSION['register_id'];
 ?>

		<div class="container">
			<a href="balance.php"><button>BALANCE</button></a>
			<a href="withdrawal.php"><button>WIDRAWAL</button></a>
			<a href="deposit.php"><button>DEPOSIT</button></a>

		</div>
				
			<a  href="logout.php">Logout</a>
</body>
</html>