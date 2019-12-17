<?php
error_reporting(E_ALL ^ E_NOTICE);
?>

<?php 
session_start();


if(isset($_SESSION['register_id'])){
	header('Location:home.php');
}


?>

<?php include('layout/header.php');?>


<style>
	.atm{
		position: relative;
		top: 15vh;
		left: 5vw;
	}

	   input:required:invalid {
    background-image: url(asset/error.png);
    background-position: right top;
    background-repeat: no-repeat;
  }
  input:required:valid {
    background-image: url(asset/check.png);
    background-position: right top;
    background-repeat: no-repeat;
  }
  
  .alertGreen{
	  position:fixed;
	  left:46vw;
	  top:65vh;
  }
  .loader{
	  position:fixed;
	  top:69vh;
	  left:52vw;
	  
  }
 

</style>






	<script>
		$(document).ready(function(){


			function user(){
				                    	var username = document.getElementById("username").value;
							var password =document.getElementById("pass").value;
					
					$.ajax({
					type:'POST',
					url:'controller.php',
					data:{'request':'login_code','user':username,'pass':password},
						
					beforeSend:function(){
							$('#signin').hide();
							
							
						    setTimeout($('#wait').html('Verify your login'),2000);
	
							
					},
					success:function(data){
							
						$('#wait').html(data);
						

						if(data=='Welcome'){
							$('.loader').show();
							$('#wait').html("<p class='alertGreen'>Please wait while loading.....</p>");
    setTimeout(' window.location.href = "home.php"; ',5000);
						}
						else{
							$('#signin').show();

						}





							
													
					},
					error:function(err){
						alert(err);
					}
				});

			}
				
		$('#signin').click(function(e){
					user();
				});
					
					
					
$('.field').keypress(function(e){
		if(e.keyCode==13){
			user();
		}
});
											
		
			
				
				
		});
	</script>




</head>
<body>
		<div class="container">
					<h1 class="text-center atm">ATM MACHINE</h1>
					<br><br><br><br><br>
				<div class="card col-md-5 offset-md-4 ">
					<h1 class="text-center card-header">
						LOGIN
					</h1>
						<div class="card-body">
							<div class="form-group">
										<!-- input type="text" class="form-control field" placeholder="USERNAME" required="" oninvalid="this.setCustomValidity('Username is empty')" name="username" oninput="setCustomValidity('')" title="At least Uppercase Letter and more than five character" id="username" pattern="(?=.*[a-z])(?=.*[A-Z]).{6,}"></input>
										<br>
										<input type="password" class="form-control field" name="password" id="pass" placeholder="PASSWORD" required="" oninvalid="this.setCustomValidity('Password is empty')" oninput="setCustomValidity('')" title="matches a string of six or more characters;
									that contains at least one digit (\d is shorthand for [0-9]);
									at least one lowercase character; and
									at least one uppercase character:" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}">


								<!-- matches a string of six or more characters;
									that contains at least one digit (\d is shorthand for [0-9]);
									at least one lowercase character; and
									at least one uppercase character: --> 								
										<input type="text" id='username' class="form-control field"  placeholder="USERNAME" required="" /><br>
									<input type="password" id='pass' class="form-control field" placeholder="PINCODE" required="" />

										<span class="offset-md-7">
											<b>Show Pin</b>&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" onclick="show();"  ></input>
										</span>
										<span class="text-right"><a href="register.php"><h5>Dont have account yet ?</h5></a></span></input>
										<br>
										<input type="submit" class="btn-success form-control"  id="signin" value="SIGN IN"></input>
										 <div class="loader" style='display:none' >
										   <img src="asset/spinner.gif"  alt="Loading..."/>
										   </div>
										  <p id="wait"></p>

									</div>
									<script>
										function show(){
												var x=document.getElementById('pass');

													if(x.type=='password'){
														x.type='text';
													}
													else{
														x.type='password'
													}


											}
											
											
											
									</script>

						</div>

				</div>

		</div>

</body>
</html>