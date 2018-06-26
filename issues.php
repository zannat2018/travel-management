<?php include "includes/header.php"; ?>
<?php include('includes/config.php'); ?>
<?php
	if(!isset($_SESSION['login'])){
		echo "<script>document.location='404.php'</script>";
	}
	if(isset($_POST['submit'])){
		$description = $_POST['description'];
		$client_id = $_SESSION['user_id'];
		$issue = $_POST['issue'];
		$sql = "INSERT INTO tb_issues (client_id, Issue, Description) VALUES('$client_id', '$issue', '$description')";
		$run_sql = $db_config->query($sql);
		if($run_sql===TRUE){
			echo "<script>alert('Your issue will be solved shortly')</script>";
			echo "<script>document.location='issues.php'</script>";
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
								<label>Select Issue : </label>
							</div>
							<div class="col-md-8">								
									<select name="issue" class="form-control">
										<option value="" hidden="">select one</option>
										<?php $sql = "SELECT * FROM tb_subject ORDER BY id DESC";
												$run_sql = $db_config->query($sql);
												while($result = $run_sql->fetch_object()){
										?>
										<option value="<?php echo $result->id; ?>"><?php echo $result->issue; ?></option>
										<?php } ?>
									</select>
								
							</div>
							<br><br><br>

							<div class="col-md-4">
								<label>Description : </label>
							</div>
							<div class="col-md-8">								
									<textarea name="description" class="form-control" placeholder="type your ussue in detail"></textarea>
								
							</div>


							<div class="col-md-offset-4 col-md-8"><br>							
									<input type="submit" name="submit" value="submit" class="btn btn-primary">
								
							</div>
						</form>
					</div>
					<div class="clearfix"> </div>
				</div>

				<div class="blog-heading">
					<h3 class="wow fadeInUp animated" data-wow-delay=".5s">All your issues</h3>
				</div>

				<div class="blog-top-grids">
					<div class="col-md-12 blog-top-left-grid">
						<table class="table table-stripped table-hover">
							<thead>
								<th>Issue</th>
								<th>Description</th>
								<th>Posting Date</th>
								<th>Consideration</th>
							</thead>
							<tfoot>
								<th>Issue</th>
								<th>Description</th>
								<th>Posting Date</th>
								<th>Consideration</th>
							</tfoot>
							<tbody>
								<?php

									$id = $_SESSION['user_id'];
									$sql = "SELECT * FROM tb_issues WHERE client_id='$id'";
									$run_sql = $db_config->query($sql);
									while($result = $run_sql->fetch_object()){
								?>
								<tr>
									<td><?php echo $result->Issue; ?></td>
									<td><?php echo $result->Description; ?></td>
									<td><?php echo $result->PostingDate; ?></td>
									<td><?php if($result->AdminRemark!==NULL){
										 echo $result->AdminRemark;
										}
										else{
											echo "<span style='color:skyblue'>PENDING</span>";
										}
										 ?>
										
										 	
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
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