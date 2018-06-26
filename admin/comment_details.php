<?php session_start(); ?>
<?php include('../includes/config.php'); ?>
<?php include('includes/topbar.php'); ?>
<?php if(!isset($_SESSION['type'])){
    echo "<script>document.location='admin_login.php'</script>";
    //header('Location: admin_login.php');
} ?>
<?php if(!isset($_GET['id'])){
     echo "<script>document.location='manage_comments.php'</script>";
    }
?>

<?php
    if(isset($_POST['approve'])){
        $id = $_POST['approval_id'];
        $sql = "UPDATE tb_comments SET approval=1 WHERE id='$id'";
        $query = $db_config->query($sql);
        if($query===TRUE){
            echo "<script>alert('post approved')</script>";
        }
        else{
            echo "<script>alert('something went wrong please try again')</script>";
            }
    }
?>

<?php
    if(isset($_POST['dismiss'])){
        $id = $_POST['dismiss_id'];
        $sql = "UPDATE tb_comments SET approval=2 WHERE id='$id'";
        $query = $db_config->query($sql);
        if($query===TRUE){
            echo "<script>alert('post dismissed')</script>";
        }
        else{
            echo "<script>alert('something went wrong please try again')</script>";
            }
    }
?>

<?php
    if(isset($_POST['replay'])){
        $id = $_POST['comment_id'];
        $replay = $_POST['replay_message'];
        $sql = "UPDATE tb_comments SET replay='$replay' WHERE id='$id'";
        $query = $db_config->query($sql);
        if($query===TRUE){
            echo "<script>alert('successfully replied')</script>";
        }
        else{
            echo "<script>alert('something went wrong please try again')</script>";
            }
    }
?>
<?php
    if(isset($_POST['delete'])){
        $id = $_POST['delete_id'];
        $sql = "DELETE FROM tb_comments WHERE id='$id'";
        $run_sql = $db_config->query($sql);
        if($run_sql===TRUE){
            echo "<script>alert('post successfully deleted')</script>";
            echo "<script>document.location='manage_comments.php'</script>";
        }
        else{
            echo "<script>alert('something went wrong please try again')</script>";
        }
    }
?>


    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <?php include('includes/leftsidebar.php'); ?>
        <!-- #END# Left Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                           <a href="manage_posts.php" class="btn btn-info">All Posts</a>
                            <a href="create_post.php" class="btn btn-info">Create Post</a>

                            <a href="category_list.php" class="btn btn-info">Category List</a>
                            <a href="category_list.php" class="btn btn-info">Add Category</a>
                            <a href="manage_comments.php" class="btn btn-info">All Comments</a> 
                        </div>
                        <div class="body">
                            <table class="table table-stripped table-hover" id="replay_comment">
                                <?php
                                        $id = $_GET['id'];
                                        $sql = "SELECT tb_comments.id, tb_post.title, tb_post.subtitle, tb_post.body, tb_comments.message, tb_comments.name, tb_comments.email, tb_comments.approval, tb_comments.posting_date, tb_comments.replay FROM tb_post, tb_comments WHERE tb_post.id=tb_comments.post_id AND tb_comments.id='$id'";
                                        $query = $db_config->query($sql);
                                        $result = $query->fetch_object();
                                        if(empty($result)){
                                            echo "<script>document.location='manage_comments.php'</script>";
                                        }
                                    ?>
                                    <tr>
                                        <th>Comment ID</th>
                                        <td><?php echo $result->id  ; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Post Title</th>
                                        <td><?php echo $result->title; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Post Subtitle</th>
                                        <td><?php echo $result->subtitle; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Post Description</th>
                                        <td><?php echo $result->body; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Comment</th>
                                        <td><?php echo $result->message; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Replay</th>
                                        <td><?php if(!empty($result->replay)){ echo $result->replay;}else{echo "<span style='color:#F16C03'>unapproved comment</span>";} ?></td>
                                    </tr>
                                    <tr>
                                        <th>Commentator Name</th>
                                        <td><?php echo $result->name; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Commentator Email</th>
                                        <td><?php echo $result->email; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Comment Status</th>
                                        <td>
                                            <?php if($result->approval==0){
                                                echo "<span style='color:skyblue; font-weight:bold'>Pending</span>";
                                            } ?>
                                            <?php if($result->approval==1){
                                                echo "<span style='color:green; font-weight:bold'>Approved</span>";
                                            } ?>
                                            <?php if($result->approval==2){
                                                echo "<span style='color:red; font-weight:bold'>Dismissed</span>";
                                            } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php if($result->approval==1){ ?>
                                        <input type="hidden" name="" id="comment_id" value="<?php echo $result->id; ?>">
                                        <script type="text/javascript">
                                            function replay_comment(){
                                                jQuery.ajax({
                                                    url:"replay_comment.php",
                                                    method:"POST",
                                                    data:"comment="+$("#comment_id").val(),
                                                    success:function(data){$("#replay_form").html(data);
                                                }
                                                });
                                            }
                                        </script>
                                        <button onclick="replay_comment()" class="btn btn-info">Replay</button>
                                            <?php } ?>
                                        </td>
                                            <?php if($result->approval==0){ ?>
                                        <td>
                                            <form method="post">
                                                <input type="hidden" name="approval_id" value="<?php echo $result->id; ?>">
                                                <button type="submit" name="approve" class="btn btn-success" onclick="return confirm('Do you really want to approve the comment')">Approve</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form method="post">
                                                <input type="hidden" name="dismiss_id" value="<?php echo $result->id; ?>">
                                                <button type="submit" name="dismiss" class="btn btn-warning" onclick="return confirm('Do you really want to dismiss the comment')">Dismiss</button>
                                            </form>
                                        </td>
                                            <?php } ?>
                                            <?php if($result->approval==1){?>
                                        <td>
                                            <form method="post">
                                                <input type="hidden" name="dismiss_id" value="<?php echo $result->id; ?>">
                                                <button type="submit" name="dismiss" class="btn btn-warning" onclick="return confirm('Do you really want to dismiss the comment')">Dismiss</button>
                                            </form>
                                        </td>
                                        <?php } ?>
                                            <?php if($result->approval==2){?>
                                        <td>
                                            <form method="post">
                                                <input type="hidden" name="approval_id" value="<?php echo $result->id; ?>">
                                                <button type="submit" name="approve" class="btn btn-success" onclick="return confirm('Do you really want to approve the comment')">Approve</button>
                                            </form>
                                        </td>
                                        <?php } ?>

                                        <td>
                                            <form method="post">
                                                <input type="hidden" name="delete_id" value="<?php echo $result->id; ?>">
                                                <button type="submit" name="delete" class="btn btn-danger" onclick="return confirm('Do you really want to delete the comment')">Delete comment</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td id="replay_form">
                                            
                                        </td>
                                    </tr>
                                    
                            </table>
                        </div>
                    </div>
                </div>
            </div>
                
            
            <div class="row clearfix">
            </div>
        </div>
    </section>
    
    <?php include('includes/footer.php'); ?>
