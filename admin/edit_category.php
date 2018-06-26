<?php session_start(); ?>
<?php if(!isset($_SESSION['type'])){
    header('Location: admin_login.php');
} ?>
<?php
	if(!isset($_POST['edit_id'])){
		echo "<script>document.location='category_list.php'</script>";
	}
?>

<?php include('../includes/config.php'); ?>

<?php if(!empty($_POST['edit_id'])){
                                    $id = $_POST['edit_id'];
                                    $sql = "SELECT category FROM tb_post_category WHERE id='$id'";
                                    $run_sql = $db_config->query($sql);                                
                                    $result = $run_sql->fetch_object();
                                    ?>
                                <form method="post">
                                	<input type="hidden" name="edit_id" value="<?php echo $id; ?>">
                                    <caption><h3 align="center">Edit Category</h3></caption><hr><br>

                                    <label>Category Name</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="name" class="form-control" value="<?php echo $result->category; ?>">
                                        </div>
                                    </div>                            
                                    <br>
                                    <button type="submit" name="update" class="btn btn-primary m-t-15 waves-effect">UPDATE</button>
                                    <button type="reset" class="btn btn-danger m-t-15 waves-effect">RESET</button>
                                </form>
                                <?php } ?>