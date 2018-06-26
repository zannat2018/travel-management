<?php include('includes/config.php'); ?>
	<?php include "includes/header.php"; ?>
	<?php
if(isset($_POST['signin']))
{
$email=$_POST['email'];
$password=$_POST['password'];
$sql ="SELECT * FROM clients WHERE EmailId='$email' and Password='$password'";
$query= $db_config->query($sql);

if($query->num_rows > 0)
{
$result = $query->fetch_object();
$_SESSION['login']=$result->EmailId;
$_SESSION['user_id']=$result->id;
echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
} else{
	
	echo "<script>alert('Invalid Details');</script>";

}

}

?>
	
	<!-- login -->
	<div class="login">
		<div class="container">
			<div class="login-body">
				<div class="login-heading">
					<h1>Login</h1>
				</div>
				<div class="login-info">
					<form method="post">
						<input type="text" class="user" name="email" placeholder="Email" required="">
						<input type="password" name="password" class="lock" placeholder="Password">
						<div class="forgot-top-grids">
							<div class="forgot-grid">
								<ul>
									<li>
										<input type="checkbox" id="brand1" value="">
										<label for="brand1"><span></span>Remember me</label>
									</li>
								</ul>
							</div>
							<div class="forgot">
								<a href="#">Forgot password?</a>
							</div>
							<div class="clearfix"> </div>
						</div>
						<input type="submit" name="signin" value="signin">
						<div class="signup-text">
							<a href="signup.php">Don't have an account? Create one now</a>
						</div>
						<hr>
						<h2>or login with</h2>
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