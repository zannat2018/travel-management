<?php include "includes/header.php"; ?>
<?php include('includes/config.php'); ?>
<?php
	if(!isset($_SESSION['login'])){
		echo "<script>document.location='404.php'</script>";
	}

	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$sql = "SELECT FromDate FROM tblbooking WHERE BookingId='$id'";
		$run_sql = $db_config->query($sql);
		$result = $run_sql->fetch_object();
		$today = date('Y-m-d');
		$fromday = $result->FromDate;
		$todate = date_create("$today");
		$fromdate = date_create("$fromday");
		$diff = date_diff($todate, $fromdate);
		if($diff->format("%a")>3){
		$sql = "UPDATE tblbooking SET status=2, cncl_cnfrm_by='user' WHERE BookingId=$id";
		$run_sql = $db_config->query($sql);
		if($run_sql===TRUE){
			echo "<script>document.location='tour_history.php'</script>";
		}
		}
		else{
			echo "<script>alert('You can cancel trip only before 72 hours')</script>";
		}

	}

?>		
		<div class="blog">
			<!-- container -->
			<div class="container">
				<div class="blog-heading">
					<h2 class="wow fadeInDown animated" data-wow-delay=".5s">My Tour History</h2>
				</div>
				<div class="blog-top-grids">
					<div class="col-md-12 blog-top-left-grid">
						<table class="table table-stripped table-hover">
							<thead>
								<th>Booking ID</th>
								<th>Transaction ID</th>
								<th>Package Name</th>
								<th>From</th>
								<th>To</th>
								<th>Comment</th>
								<th>Status</th>
								<th>Booking Date</th>
								<th>Action</th>
							</thead>
							<tfoot>
								<th>Booking ID</th>
								<th>Transaction ID</th>
								<th>Package Name</th>
								<th>From</th>
								<th>To</th>
								<th>Comment</th>
								<th>Status</th>
								<th>Booking Date</th>
								<th>Action</th>
							</tfoot>
							<tbody>
								<?php

									$id = $_SESSION['user_id'];
									$sql = "SELECT tblbooking.BookingId, tblbooking.transaction_id, tblbooking.FromDate, tblbooking.ToDate, tblbooking.Comment, tblbooking.RegDate, tblbooking.status, tblbooking.UpdationDate, tbltourpackages.PackageName FROM tblbooking, tbltourpackages Where tblbooking.client_id=$id AND tblbooking.PackageId=tbltourpackages.PackageId ORDER BY tblbooking.BookingId DESC";
									$run_sql = $db_config->query($sql);
									while($result = $run_sql->fetch_object()){
								?>
								<tr>
									<td><?php echo $result->BookingId; ?></td>
									<td><?php echo $result->transaction_id; ?></td>
									<td><?php echo $result->PackageName; ?></td>
									<td><?php echo $result->FromDate; ?></td>
									<td><?php echo $result->ToDate; ?></td>
									<td><?php echo $result->Comment; ?></td>
									<td>
										<?php

											if($result->status==2){
												echo "<span style='color:red'>CANCELLED</span>";
											}

											if($result->status==1){
												echo "<span style='color:green'>CONFIRMED</span>";
											}

											if($result->status==0 && $result->FromDate>date('Y-m-d') && $result->ToDate>date('Y-m-d')){
												echo "<span style='color:skyblue'>PENDING</span>";
											}

											if($result->status==0 && ($result->ToDate<date('Y-m-d')||$result->FromDate<date('Y-m-d'))){
												echo "<span style='color:red'>EXPIRED</span>";
											}
										?>
									</td>
									<td><?php echo $result->RegDate; ?></td>
									<td>
										<?php

										if($result->status==0 && $result->FromDate>date('Y-m-d') && $result->ToDate>date('Y-m-d')){?>
											<a href="tour_history.php?id=<?php echo $result->BookingId; ?>" class="btn btn-danger" onclick="return confirm('Do you really want to cancel your trip')">Cancel</a>
										<?php
										}

										if($result->status==2 && $result->cncl_cnfrm_by="user"){
												echo "<span>Cancelled by You on ".$result->UpdationDate."</span>";
										
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