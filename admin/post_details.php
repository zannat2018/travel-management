<?php session_start(); ?>
<?php include('../includes/config.php'); ?>
<?php include('includes/topbar.php'); ?>
<?php if(!isset($_SESSION['type'])){
    echo "<script>document.location='admin_login.php'</script>";
    //header('Location: admin_login.php');
} ?>
<?php if(!isset($_GET['id'])){
     echo "<script>document.location='manage_posts.php'</script>";
    }
?>

<?php
    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $category = $_POST['category'];
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $body = $_POST['body'];
        $feathered_image = $_FILES['feathered_image']['name'];
        $image_2 = $_FILES['image_2']['name'];
        $image_3 = $_FILES['image_3']['name'];
        $image_4 = $_FILES['image_4']['name'];
        $image_5 = $_FILES['image_5']['name'];
        $sql = "UPDATE tb_post SET category='$category', title='$title', subtitle='$subtitle', body='$body' WHERE id='$id'";
        $query = $db_config->query($sql);
        if(!empty($feathered_image)){
            move_uploaded_file($_FILES['feathered_image']['tmp_name'], '../images/post_images/'.$_FILES['feathered_image']['name']);
            $sql = "UPDATE tb_post SET feathered_image='$feathered_image' WHERE id='$id'";
        $query = $db_config->query($sql);
        }
        if(!empty($image_2)){
            move_uploaded_file($_FILES['image_2']['tmp_name'], '../images/post_images/'.$_FILES['image_2']['name']);
            $sql = "UPDATE tb_post SET image_2='$image_2' WHERE id='$id'";
        $query = $db_config->query($sql);
        }
        if(!empty($image_3)){
            move_uploaded_file($_FILES['image_3']['tmp_name'], '../images/post_images/'.$_FILES['image_3']['name']);
            $sql = "UPDATE tb_post SET image_3='$image_3' WHERE id='$id'";
        $query = $db_config->query($sql);
        }
        if(!empty($image_4)){
            move_uploaded_file($_FILES['image_4']['tmp_name'], '../images/post_images/'.$_FILES['image_4']['name']);
            $sql = "UPDATE tb_post SET image_4='$image_4' WHERE id='$id'";
        $query = $db_config->query($sql);
        }
        if(!empty($image_5)){
            move_uploaded_file($_FILES['image_5']['tmp_name'], '../images/post_images/'.$_FILES['image_5']['name']);
            $sql = "UPDATE tb_post SET image_5='$image_5' WHERE id='$id'";
        $query = $db_config->query($sql);
        }
        if($query===TRUE){
            echo "<script>alert('post updated successfully')</script>";
        }
        else{
            echo "<script>alert('something went wrong please try again')</script>";
            }
    }
?>

<?php
    if(isset($_POST['delete'])){
        $id = $_POST['delete_id'];
        $sql = "DELETE FROM tb_post WHERE id='$id'";
        $run_sql = $db_config->query($sql);
        if($run_sql===TRUE){
            echo "<script>alert('post successfully deleted')</script>";
            echo "<script>document.location='manage_posts.php'</script>";
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
                        <div class="body" id="edit_form">
                            <?php if(isset($_GET['id'])){ ?>
                            <table class="table table-stripped table-hover">
                                <?php
                                        $id = $_GET['id'];
                                        $sql = "SELECT tb_post.id, tb_post_category.category, tb_post.title, tb_post.subtitle, tb_post.body, tb_post.feathered_image, tb_post.image_2, tb_post.image_3, tb_post.image_4, tb_post.image_5 FROM tb_post, tb_post_category WHERE tb_post.category=tb_post_category.id AND tb_post.id='$id'";
                                        $query = $db_config->query($sql);
                                        $result = $query->fetch_object();
                                        if(empty($result)){
                                            echo "<script>document.location='manage_posts.php'</script>";
                                        }
                                    ?>
                                    <tr>
                                        <th>Post ID</th>
                                        <td><?php echo $result->id  ; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Category</th>
                                        <td><?php echo $result->category; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Title</th>
                                        <td><?php echo $result->title; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Subtitle</th>
                                        <td><?php echo $result->subtitle; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Body</th>
                                        <td><?php echo $result->body; ?></td>
                                    </tr>
                                    <?php if(!empty($result->feathered_image)){ ?>
                                    <tr>
                                        <th>Feathered Image</th>
                                        <td><img src="../images/post_images/<?php echo $result->feathered_image; ?>" height="300" width="300"></td>
                                    </tr>
                                    <?php } ?>

                                    <?php if(!empty($result->image_2)){ ?>
                                    <tr>
                                        <th>Optional Image</th>
                                        <td><img src="../images/post_images/<?php echo $result->image_2; ?>" height="300" width="300"></td>
                                    </tr>
                                    <?php } ?>

                                    <?php if(!empty($result->image_3)){ ?>
                                    <tr>
                                        <th>Optional Image</th>
                                        <td><img src="../images/post_images/<?php echo $result->image_3; ?>" height="300" width="300"></td>
                                    </tr>
                                    <?php } ?>

                                    <?php if(!empty($result->image_4)){ ?>
                                    <tr>
                                        <th>Optional Image</th>
                                        <td><img src="../images/post_images/<?php echo $result->image_4; ?>" height="300" width="300"></td>
                                    </tr>
                                    <?php } ?>

                                     <?php if(!empty($result->image_5)){ ?>
                                    <tr>
                                        <th>Optional Image</th>
                                        <td><img src="../images/post_images/<?php echo $result->image_5; ?>" height="300" width="300"></td>
                                    </tr>
                                    <?php } ?>

                                    <tr>
                                        <td>
                                        <input type="hidden" name="" id="post_id" value="<?php echo $result->id; ?>">
                                        <script type="text/javascript">
                                            function edit_post(){
                                                jQuery.ajax({
                                                    url:'edit_post.php',
                                                    method:'POST',
                                                    data:'id_post='+$('#post_id').val(),
                                                    success:function(data){$('#edit_form').html(data);
                                                }
                                                });
                                            }
                                        </script>
                                        <button onclick="edit_post()" class="btn btn-info">Edit Post</button>
                                        </td>
                                        <td>
                                            <form method="post">
                                                <input type="hidden" name="delete_id" value="<?php echo $result->id; ?>">
                                                <button type="submit" name="delete" class="btn btn-danger" onclick="return confirm('Do you really want to delete the post')">Delete Post</button>
                                            </form>
                                        </td>
                                    </tr>
                                    
                            </table>
                            <?php } ?>
                        </div>
                        <div class="body"></div>
                    </div>
                </div>
            </div>
                
            
            <div class="row clearfix">
            </div>
        </div>
    </section>
    
    <?php include('includes/footer.php'); ?>
