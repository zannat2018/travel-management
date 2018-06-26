<?php include "includes/header.php"; ?>
<?php 

/*$date1 = date("Y-m-d");
$date2 = "2018-06-25";
$diff = date_diff(date_create($date1), date_create($date2));
echo $diff->format("%a");*/

?>

<?php
	/*$name = "nahhme";
	echo "his name is $name and is";*/
?>
<!-- <select>
	<option>dfdfd</option>
	<option selected>papon</option>
	<option >sazzad</option>
</select> -->
<?php $first_page_offset="first_page_offset"; $package_per_page="package_per_page";  ?>
<script type="text/javascript">
					function show_packages(){
						jQuery.ajax({
							url:'practice_helper.php',
							method:'GET',
							data:{first:"<?php echo $first_page_offset; ?>", second:"<?php echo $package_per_page; ?>"},
							success:function(data){$('#show').html(data);}
						});
					}
				</script>
				<div><button onclick="show_packages()">show</button></div>
				<div id="show"></div>