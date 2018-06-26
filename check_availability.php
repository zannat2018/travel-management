<?php include("includes/config.php");
	if(!empty($_POST['email_id'])){
		$email = $_POST['email_id'];
		if(filter_var($email, FILTER_VALIDATE_EMAIL)===false){
			echo "<span style='color:red'>You didn't enter a valid email</span>";
		}
		else{
			$sql = "SELECT * FROM clients WHERE EmailId = '$email'";
			$query = $db_config->query($sql);
			if($query->num_rows>0){
				echo "<span style='color:red'>Email already exists</span>";
				echo "<script>$('#submit').prop('disabled', true)</script>";
			}
			else{
				echo "<span style='color:green'>Email available for registration</span>";
				echo "<script>$('#submit').prop('disabled', false)</script>";
			}
		}
	}
?>