<?php session_start(); ?>
<?php if(!isset($_SESSION['type'])){
    echo "<script>document.location='admin_login.php'</script>";
    //header('Location: admin_login.php');
} ?>
<?php if(!isset($_POST['comment'])){
     echo "<script>document.location='manage_comments.php'</script>";
    }
?>
<form method="post">
	<input type="hidden" name="comment_id" value="<?php echo $_POST['comment']; ?>">
	<textarea class="form-control" name="replay_message"></textarea><br>
	<input type="submit" name="replay" value="Replay" class="btn btn-info">
</form>