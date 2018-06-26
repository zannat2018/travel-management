	<?php include('includes/config.php'); ?>
	<?php include('includes/header.php'); ?>


	<?php

		$id = $_GET['id'];
		$sql = "SELECT * from tbltourpackages where PackageId='$id'";
		$run_sql = $db_config->query($sql);
						
		$row = $run_sql->fetch_object();
	 ?>
	
	<div class="banner-inner wow fadeInDown animated">
		<img src="images/tms/<?php echo $row->PackageImage; ?>" height="300" width=100% style="">
	 </div>

	<!-- gallery -->
		<div class="gallery">
			<div class="container">				
				<div class="gallery-grids">
					<div class="col-md-6 gallery-grid wow fadeInUp animated" data-wow-delay=".5s" style="margin-top: -250px; border: 1px solid #BFBFBF; background-color: white;
   						 box-shadow: 0px 1px 1px #aaaaaa;">
						<div class="grid">
							<figure class="">
								<div class="example-image-link" href="" style="text-decoration: none; color: #999999">
									<img src="images/tms/<?php echo $row->PackageImage; ?>" alt="" height="200" />
									<div class="row" style="font-weight: normal; color: white; background-color: #9575CD; padding-left: 20px; padding-right: 20px;">
										<div class="pull-left">										
											<h4 style="margin: 10px;"><span class="fa fa-clock-o"></span>&nbsp;&nbsp;&nbsp;<?php echo $row->duration; ?> days</h4>
										</div>
										<div class="pull-right">
											<h4>starts from</h4>
											<h3>&#2547;&nbsp;&nbsp;&nbsp;<?php echo $row->PackagePrice; ?></h3>
										</div>
									</div>
										<h4 align="left"><span class="fa fa-map-marker"></span>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row->PackageLocation; ?></h4><hr>
										<h5 align="left"><?php echo $row->PackageType; ?></h5><hr>
										<h4 align="left">Package Fetures</h4>
										<h5 align="left"><?php echo $row->PackageFetures; ?></h5><hr>
										<h4 align="left">Package Details</h4>
										<h5 align="left"><?php echo $row->PackageDetails; ?></h5><hr>

								</div>
							</figure>
						</div>
					</div>
					<?php if(isset($_POST['submit'])){
						if(isset($_SESSION['login'])){
							$package_id = $id;
							$client_id = $_SESSION['user_id'];
							$user_email = $_SESSION['login'];
							$from_date = $_POST['from'];
							$to_date = $_POST['to'];
							$comment = $_POST['comment'];
							$amount = $_POST['amount'];
							$card_no = $_POST['card_no'];
							$status = 0;

							$sql_2 = "INSERT INTO transaction (client_id, package_id, amount, card_no) VALUES('$client_id', '$package_id', '$amount', '$card_no')";
							$query_2 = $db_config->query($sql_2);
							$transaction_id = mysqli_insert_id($db_config);

							$sql = "INSERT INTO tblbooking (PackageId, client_id, transaction_id, FromDate, ToDate, Comment,status) VALUES('$package_id', '$client_id', '$transaction_id', '$from_date', '$to_date', '$comment', '$status')";
							$query = $db_config->query($sql);
							
							if($query===true && $query_2===true){
								echo "<script>document.location='flashMessage.php?message=booking1'</script>";
							}
							else{echo "<script>document.location='flashMessage.php?message=booking0'</script>";}
							
						}
						else {echo "<script type='text/javascript'>document.location='login.php'</script>";}
						
					} ?>
					<div class="col-md-1"></div>
					<div class="col-md-5 gallery-grid wow fadeInUp animated" data-wow-delay=".5s" style="margin-top: -70px; border: 1px solid #BFBFBF; background-color: #9575CD;
   						 box-shadow: 0px 1px 1px #aaaaaa; color: white;">
						<div class="grid" >
							<form class="form-horizontal" method="post">
								<caption><h3 align="center">Booking details</h3></caption>
							    <div class="form-group">
							      <label class="control-label col-sm-2" for="email">Name:</label>
							      <div class="col-sm-10">
							        <input type="text" class="form-control" placeholder="Enter full name" name="name" required>
							      </div>
							    </div>
							    <script type="text/javascript">
									jQuery(function() {
									jQuery( "#datepicker,#datepicker1, #datepicker2" ).datepicker();
									});
								</script>
							    <div class="form-group">
							      <label class="control-label col-sm-2" for="email">From:</label>
							      <div class="col-sm-10">
							        <input type="text" class="form-control date" id="datepicker" placeholder="mm/dd/yyyy" name="from" required>
							      </div>
							    </div>

							    <div class="form-group">
							      <label class="control-label col-sm-2" for="email">To:</label>
							      <div class="col-sm-10" >
							        <input type="text" class="form-control date" id="datepicker1" placeholder="mm/dd/yyyy" name="to" required>
							      </div>
							    </div>

							    <div class="form-group">
							      <label class="control-label col-sm-2" for="email">Comment:</label>
							      <div class="col-sm-10" >
							        <textarea class="form-control" placeholder="type your comment" name="comment" required></textarea>
							      </div>
							    </div>

							    <div class="form-group">
							      <label class="control-label col-sm-2" for="email">Amount:</label>
							      <div class="col-sm-10">
							        <input type="text" class="form-control" name="amount" value="<?php echo $row->PackagePrice.' '.'&#2547;'; ?>" disabled>
							      </div>
							    </div>
							    <script type="text/javascript">
							    	function check_availability(){
							    		jQuery.ajax({
							    			url:"card_availability.php",
							    			data:"card_no="+$("#card_no").val(),
							    			method:"POST",
							    			success:function(data){
							    				$("#card_availability").html(data);
							    			}
							    		});
							    	}
							    </script>
							    <div class="form-group">
							    	PAYMENT
							      <label class="control-label col-sm-2"></label>
							      <div class="col-sm-offset-2 col-sm-10">
							        <input type="text" class="form-control" id="card_no" placeholder="Enter card number" name="card_no" required onblur="check_availability()">
							        <span id="card_availability"></span>
							      </div>
							    </div>

							    <div class="form-group">
							      DATE OF EXPIRATION
							      <label class="control-label col-sm-2"></label>
							      <div class="col-sm-offset-2 col-sm-10">
							        <input type="text" class="form-control date" placeholder="Enter card expiration date" name="name" required id="datepicker2">
							      </div>
							    </div>
							    <div class="form-group">        
							      <div class="col-sm-offset-2 col-sm-10">
							        <input type="submit" id="submit" name=submit value="Book Now" class="btn btn-info">
							      </div>
							    </div>
							 </form>
						</div>
					</div>
				</div>
			</div>
	<!-- //gallery -->	
	<?php include "includes/footer.php"; ?>