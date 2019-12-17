<?php include('layout/header.php');?>

<script>
		
		$(document).ready(function(){

				function withdraw(){

					var amount=document.getElementById('amount').value;
					var desc=document.getElementById('desc').value;
					

					$.ajax({

						type:'POST',
						url:'builder.controller.php',
						data:{'response':'withdraw','amount':amount,'desc':desc},

						beforeSend:function(){
							$('#withdraw').hide();
							$('.wait').html('Loading........');
						},
						success:function(data){
							$('.wait').html(data);

							if(data==''){


						swal('', {
							title: "Transaction Done!",
 					 text: "Please wait while Loading....",
  					icon: "success",
  button: false,
});

		
								$('#wait').html("<p class='alertGreen'>Please wait while loading.....</p>");
								setTimeout(' window.location.href = "home.php"; ',5000);
	
							}
							else{
								$('#withdraw').show();
							}
						},
						error:function(err){
							alert(err);
						}



					});
				}
				

				$('#withdraw').click(function(){
					withdraw();
				});

				$('.field').keypress(function(e){
						if(keyCode==13){
							withdraw();
						}
				});


		});



</script>





<body>

		<a href="home.php">Click here to go back</a>
		<br>
		<br>
		How much do you like to withdraw:<br><input type="number" placeholder='&#8369;AMOUNT' class="field" id="amount" placeholder="amount"></input>
		<br>		Add some details:<br><textarea class="field" id="desc"></textarea>
		<br>
		<input type="submit" value="Withdraw Money" id="withdraw" ></input>
		<p class="wait"></p>
</body>
</html

