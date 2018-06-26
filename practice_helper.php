<?php
if(!isset($_GET['first'])){echo "failed";}

$data_1=$_GET['first'];
$data_2=$_GET['second'];

?>
<table border="1" class="wow fadeInUp animated" data-wow-delay=".5s" style="background-color: red">
	<tr>
		<th>data_1</th>
		<td><?php echo $data_1; ?></td>
	</tr>
	<tr>
		<th>data_2</th>
		<td><?php echo $data_2; ?></td>
	</tr>
</table>