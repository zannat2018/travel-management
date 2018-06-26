<?php include "includes/header.php"; ?>
<?php include('includes/config.php'); ?>
<?php

	if(isset($_POST['submit_image'])){
		$id = $_SESSION['user_id'];
		$image = $_FILES['image']['name'];
		move_uploaded_file($_FILES['image']['tmp_name'], 'images/clients/'.$_FILES['image']['name']);
		$sql = "UPDATE clients SET image='$image' WHERE id=$id";
		$run_sql = $db_config->query($sql);
		if($run_sql===TRUE){
			echo "<script>document.location='client_profile.php'</script>";
		}

	}

?>

<?php

	if(isset($_POST['submit_password'])){
		$id = $_SESSION['user_id'];
		$new_password = $_POST['new_password'];
		$sql = "UPDATE clients SET Password='$new_password' WHERE id=$id";
		$run_sql = $db_config->query($sql);
		if($run_sql===TRUE){
			echo "<script>alert('Password successfully changed')</script>";
		}

	}

?>
		
		<!-- blog -->
		<div class="blog">
			<!-- container -->
			<div class="container">
				<div class="blog-top-grids">
					<div class="col-md-4 blog-top-right-grid">
						<div class="Categories wow fadeInUp animated" data-wow-delay=".5s">
									<?php

										$id = $_SESSION['user_id'];
										$sql = "SELECT * FROM clients WHERE id='$id'";
										$run_sql = $db_config->query($sql);
										$result = $run_sql->fetch_object();

									?>
							<img src="images/clients/<?php echo $result->image; ?>" height="300" width="200"><br><br>
							<ul>
								<li class="dropdown">
									<a href="#" data-toggle="dropdown" class="btn btn-info">Change Image</a>
									<ul class="dropdown-menu">
										<li>
											<form method="post" enctype="multipart/form-data">
											<input type="file" name="image" class="btn btn-info"><br>
											<input type="submit" name="submit_image" value="Proceed" class="btn btn-info">
											</form>
										</li>
									</ul>
								</li>
							</ul>
						</div>					
					</div>

					<div class="col-md-8 blog-top-left-grid">
						<div class="left-blog">
							<div class="blog-left">
								<div class="blog-left-right wow fadeInUp animated" data-wow-delay=".5s">
									<table class="table">
										<tr>
											<th>Full Name :</th><td><?php echo $result->FullName; ?></td>
										</tr>
										<tr>
											<th>Email Address :</th><td><?php echo $result->EmailId; ?></td>
										</tr>
										<tr>
											<th>Phone No :</th><td><?php echo $result->MobileNumber; ?></td>
										</tr>
										<tr>
											<th>Password :</th>
											<td>
												<?php echo $result->Password; ?>
											</td>
											<td>
												<ul>
													<li class="dropdown">
														<button class="btn btn-info dropdown" data-toggle="dropdown">Change Password</button>
														<ul class="dropdown-menu">
															<li>
																<form method="post">
																	<script type="text/javascript">
																		function check_availability(){
																			jQuery.ajax({
																				url:"password_check.php",
																				data:"oldPassword="+$('#old_password').val(),
																				method:"post",
																				success:function(data){
																					$('#password_availability').html(data)
																				}

																			});
																		}
																	</script>
																<div class="input-group input-group-sm">
						<span class="input-group-addon" id="sizing-addon3"></span>
						<input type="text" id="old_password" class="form-control" placeholder="old password" aria-describedby="sizing-addon3" required onblur="check_availability()">
						<span id="password_availability"></span>
					</div>
																<div class="input-group input-group-sm">
						<span class="input-group-addon" id="sizing-addon3"></span>
						<input type="text" name="new_password" class="form-control" placeholder="old password" aria-describedby="sizing-addon3">
					</div>
																<input type="submit" id="submit" name="submit_password" value="Proceed" class="btn btn-info">
																</form>
															</li>
														</ul>
													</li>
												</ul>
											</td>
										</tr>
									</table>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
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