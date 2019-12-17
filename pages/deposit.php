<?php include('layout/header.php');?>

<script>
		
		$(document).ready(function(){

				function deposit(){

					var amount=document.getElementById('amount').value;
					var desc=document.getElementById('desc').value;
					

					$.ajax({

						type:'POST',
						url:'builder.controller.php',
						data:{'response':'deposit','amount':amount,'desc':desc},

						beforeSend:function(){
							$('#deposit').hide();
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
								$('#deposit').show();
							}
						},
						error:function(err){
							alert(err);
						}



					});
				}
				

				$('#deposit').click(function(){
					deposit();
				});

				$('.field').keypress(function(e){
						if(keyCode==13){
							deposit();
						}
				});


		});



</script>





<body>

		<a href="home.php">Click here to go back</a>
		<br>
		<br>
		How much do you like to deposit:<br><input type="number" placeholder='&#8369;AMOUNT' class="field" id="amount" placeholder="amount"></input>
		<br>		Add some details:<br><textarea class="field" id="desc"></textarea>
		<br>
		<input type="submit" value="Deposit Money" id="deposit" ></input>
		<p class="wait"></p>
</body>
</html

