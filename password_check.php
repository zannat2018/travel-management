<?php session_start(); ?>
<?php if(!isset($_SESSION['login'])){echo "<script>document.location='index.php'</script>";} ?>
<?php include('includes/config.php'); ?>
<?php

	if(isset($_POST['oldPassword'])){
		$id = $_SESSION['user_id'];
		$oldPassword = $_POST['oldPassword'];
		$sql= "SELECT Password FROM clients WHERE id='$id'";
		$run_sql = $db_config->query($sql);
		$result = $run_sql->fetch_object();
		if($result->Password===$oldPassword){
			echo "<span style='color:green'>password matched</span>";
			echo "<script>$('#submit').prop('disabled', false)</script>";
		}
		else{
			echo "<span style='color:red'>invalid password</span>";
			echo "<script>$('#submit').prop('disabled', true)</script>"; 
		}
	}

?>