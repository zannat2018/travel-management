<?php include('includes/config.php'); ?>
	<?php include "includes/header.php"; ?>
	<?php
if(isset($_POST['submit']))
{
$name = $_POST['name'];
$email=$_POST['email'];
$phone = $_POST['phone'];
$password=$_POST['password'];
$image=$_FILES['image']['name'];
move_uploaded_file($_FILES['image']['tmp_name'], 'images/clients/'.$_FILES['image']['name']);
//echo $name.$email.$phone.$password;
$sql ="INSERT INTO clients (FullName, MobileNumber, EmailId, Password, image) VALUES('$name', '$phone', '$email', '$password', '$image')";
$query= $db_config->query($sql);

if($query===TRUE)
{ 
echo "<script type='text/javascript'> document.location = 'flashMessage.php?message=signup1'; </script>";
} else{
	
	echo "<script type='text/javascript'> document.location = 'flashMessage.php?message=signup0'; </script>";

}

}

?>
<script type="text/javascript">
	function checkAvailability(){
		jQuery.ajax({
		url : "check_availability.php",
		data : "email_id="+$('#email').val(),
		type : 'POST',
		success:function(data){
			$("#checkAvailabilityStatus").html(data);
		}
		});
	}
</script>
	
	<!-- login -->
	<div class="login">
		<div class="container">
			<div class="login-body">
				<div class="login-heading">
					<h1>Sign Up</h1>
				</div>
				<div class="login-info">
					<form method="post" enctype="multipart/form-data">
						<input type="text" class="user" name="name" placeholder="name" required="">
						<input type="text" class="user" id="email" name="email" placeholder="Email" required="" onblur="checkAvailability()">
						<span id="checkAvailabilityStatus"  style="font-size: 15px;"></span>
						<input type="text" class="user" name="phone" placeholder="phone" required="">
						<input type="password" name="password" class="lock" placeholder="Password" required="">
						Photo<input type="file" name="image">
						<div class="forgot-top-grids">
							<div class="forgot-grid">
								<ul>
									<li>
										
									</li>
								</ul>
							</div>
							<div class="forgot">
								<a href="#"></a>
							</div>
							<div class="clearfix"> </div>
						</div>
						<input type="submit" id="submit" name="submit" value="signup">
						<div class="signup-text">
							<a href="signup.html"></a>
						</div>
						<hr>
						<h2></h2>
						<div class="login-icons">
							<ul>
								<li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#" class="google"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#" class="dribbble"><i class="fa fa-dribbble"></i></a></li>
							</ul>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- //login -->
	
	<!-- footer -->
	<?php include "includes/footer.php"; ?>
	<!-- //footer -->
</body>	
</html>