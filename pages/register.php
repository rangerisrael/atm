<?php
error_reporting(E_ALL ^ E_NOTICE);
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
 

</style>






	<script>
		$(document).ready(function(){

			function register(){
				var username = document.getElementById("username").value;
							var password =document.getElementById("pass").value;
							var id= document.getElementById('reg_id').value;
					
					$.ajax({
					type:'POST',
					url:'controller.php',
					data:{'request':'signup_code','user':username,'pass':password,'id':id},
						
					beforeSend:function(){
							$('#signup').hide();
							$('#wait').html("Creating you account");
					},
					success:function(data){
		           	$('#wait').html(data);
						if(data=='Done'){
							$('#wait').html("<p class='alertGreen'>Created Successfully</p>");
    setTimeout(' window.location.href = "index.php"; ',2000);
						}
						else{
							$('#signup').show();

						}
													
					},
					error:function(err){
						alert(err);
					}
					
				});
					
			}






				
		$('#signup').click(function(e){
                    	
					
			register();
					
			});
											
		
				
				
				
							
		 $('.field').keypress(function(e){
												
				if(e.keyCode==13){
						register();
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
						SIGN UP
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
			<input type="text" readonly="readonly" class="form-control" name="id" id="reg_id" value="<?php echo "USERID_",str_pad(rand(),8,'1',STR_PAD_LEFT); ?>"  />					
		 <br>
										<input type="text" id='username' class="form-control field" placeholder="USERNAME" required="" /><br>
									<input type="password" id='pass' class="form-control field" placeholder="PIN CODE" required="" />

										<span class="offset-md-7">
											<b>Show Pin</b>&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" onclick="show();"  ></input>
										</span>
										<span class="text-right"><a href="index.php"><h5>Already have account?</h5></a></span></input>
										<br>
										<input type="submit" class="btn-warning form-control" class='register' id="signup" value="REGISTER"></input>
										 
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