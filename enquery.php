<?php include "includes/header.php"; ?>
<?php include('includes/config.php'); ?>
<?php
	if(isset($_SESSION['login'])){
		echo "<script>document.location='404.php'</script>";
	}
	if(isset($_POST['submit'])){
		$FullName = $_POST['name'];
		$EmailId = $_POST['email'];
		$MobileNumber = $_POST['mobile'];
		$Subject = $_POST['subject'];
		$Description = $_POST['description'];
		$sql = "INSERT INTO tb_enquery (FullName, EmailId, MobileNumber, Subject, Description) VALUES('$FullName', '$EmailId', '$MobileNumber', '$Subject', '$Description')";
		$run_sql = $db_config->query($sql);
		if($run_sql===TRUE){
			echo "<script>alert('Your will be answered shortly')</script>";
			echo "<script>document.location='enquery.php'</script>";
		}
	}


?>		
		<div class="blog">
			<!-- container -->
			<div class="container">
				<div class="blog-heading">
					<h2 class="wow fadeInDown animated" data-wow-delay=".5s">How can we help you</h2>
				</div>
				<div class="blog-top-grids">
					<div class="col-md-12 blog-top-left-grid">
						<form class="wow fadeInUp animated" data-wow-delay=".5s" method="post">
							<div class="col-md-4">
								<label>Full Name : </label>
							</div>
							<div class="col-md-8">								
									<input type="text" name="name" class="form-control" placeholder="type full name">
							</div>
							<br><br><br>

							<div class="col-md-4">
								<label>Email ID : </label>
							</div>
							<div class="col-md-8">								
									<input type="email" name="email" class="form-control" placeholder="type email">	
							</div>
							<br><br><br>

							<div class="col-md-4">
								<label>Mobile No : </label>
							</div>
							<div class="col-md-8">								
									<input type="text" name="mobile" class="form-control" placeholder="type mobile no">	
							</div>
							<br><br><br>

							<div class="col-md-4">
								<label>Subject : </label>
							</div>
							<div class="col-md-8">								
									<input type="text" name="subject" class="form-control" placeholder="type email">	
							</div>
							<br><br><br>

							<div class="col-md-4">
								<label>Description : </label>
							</div>
							<div class="col-md-8">								
									<textarea name="description" class="form-control" placeholder="type description"></textarea>	
							</div>
							<br><br><br>


							<div class="col-md-offset-4 col-md-8"><br>							
									<input type="submit" name="submit" value="submit" class="btn btn-primary">
								
							</div>
						</form>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<!-- //container -->
		</div>
	<!-- //blog -->
	
	<!-- footer -->
	<?php include('includes/footer.php'); ?>
	<!-- //footer -->
</body>	
</html>