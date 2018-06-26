	<?php include "includes/header.php"; ?>

	
	<!-- login -->
	<div class="login">
		<div class="container">
			<div class="login-body">

				<?php if($_GET['message']=='signup1'){ ?>
				<div class="login-heading">					
					<h1>user successfully added</h1>
					<div class="login-info">
					</div>
				</div>
				<?php } ?>


				<?php if($_GET['message']=='signup0'){ ?>
				<div class="login-heading">					
					<h1>!!! OOPS Something Went Wrong</h1>
					<div class="login-info">
						<h3>Please try again later</h3>
					</div>
				</div>
				<?php } ?>


				<?php if($_GET['message']=='booking1'){ ?>
				<div class="login-heading">					
					<h1>Your booking request has been received successfully</h1>
					<div class="login-info">
						<h3>A confermation email will be sent as soon as your booking will be confirmed</h3>

					</div>
				</div>
				<?php } ?>


				<?php if($_GET['message']=='booking0'){ ?>
				<div class="login-heading">					
					<h1>!!! OOPS Something Went Wrong</h1>
					<div class="login-info">
						<h2>Please try again later</h2>
					</div>
				</div>
				<?php } ?>
				
			</div>
		</div>
	</div>
	<!-- //login -->
	
	<!-- footer -->
	<?php include "includes/footer.php"; ?>
	<!-- //footer -->
</body>	
</html>