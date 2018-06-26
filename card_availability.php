<?php
	
	if(!empty($_POST['card_no'])){
		$card_no = $_POST['card_no'];

		$num_length = strlen($card_no);
		if($num_length == 10) {
		    echo "<span style='color:green; background-color:white;'>Card number is available for payment</span>";
		    echo "<script>$('#submit').prop('disabled', false)</script>";
		} else {
		    echo "<span style='color:red; background-color:white;'>Invalid card number</span>";
		    echo "<script>$('#submit').prop('disabled', true)</script>";
		}
	}
?>