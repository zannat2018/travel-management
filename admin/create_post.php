<?php session_start(); ?>
<?php if(!isset($_SESSION['type'])){
    header('Location: admin_login.php');
} ?>

<?php include('../includes/config.php'); ?>
<?php
  
 
    if(isset($_POST['create'])){
        $category = $_POST['category'];
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $body = $_POST['body'];
        $posted_by = $_SESSION['type'];
        $feathered_image = $_FILES['feathered_image']['name'];
        $image_2 = $_FILES['image_2']['name'];
        $image_3 = $_FILES['image_3']['name'];
        $image_4 = $_FILES['image_4']['name'];
        $image_5 = $_FILES['image_5']['name'];
        move_uploaded_file($_FILES['feathered_image']['tmp_name'], '../images/post_images/'.$_FILES['feathered_image']['name']);
        move_uploaded_file($_FILES['image_2']['tmp_name'], '../images/post_images/'.$_FILES['image_2']['name']);
        move_uploaded_file($_FILES['image_3']['tmp_name'], '../images/post_images/'.$_FILES['image_3']['name']);
        move_uploaded_file($_FILES['image_4']['tmp_name'], '../images/post_images/'.$_FILES['image_4']['name']);
        move_uploaded_file($_FILES['image_5']['tmp_name'], '../images/post_images/'.$_FILES['image_5']['name']);
        $sql = "INSERT INTO tb_post (category, title, subtitle, body, feathered_image, image_2, image_3, image_4, image_5, posted_by) VALUES('$category', '$title', '$subtitle', '$body', '$feathered_image', '$image_2', '$image_3', '$image_4', '$image_5', '$posted_by')";
        $query = $db_config->query($sql);
        if($query==true){
            echo "<script>alert('successful')</script>";
        }
        else{
            echo "<script>alert('failed')</script>";
            }

    
  }

?>
<?php include('includes/topbar.php'); ?>
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

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <a href="manage_posts.php" class="btn btn-info">All Posts</a>
                            <a href="create_post.php" class="btn btn-info">Create Post</a>

                            <a href="category_list.php" class="btn btn-info">Category List</a>
                            <a href="category_list.php" class="btn btn-info">Add Category</a>
                            <a href="manage_comments.php" class="btn btn-info">All Comments</a>
                            <h3>Create a new post</h3>
                            
                        </div>
                        <div class="body">
                            <form method="post" enctype="multipart/form-data">
                                <label>Category</label><span style="color:red; font-size: 20px;">*</span>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select name="category" class="form-control" required>
                                            <option value="" hidden>select category</option>
                                            <?php
                                            $sql = "SELECT * FROM tb_post_category";
                                            $run_sql = $db_config->query($sql);
                                            while($result = $run_sql->fetch_object()){
                                            ?>
                                            <option value="<?php echo $result->id; ?>"><?php echo $result->category; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <label>Title</label><span style="color:red; font-size: 20px;">*</span>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="title" class="form-control" placeholder="Enter title" required>
                                    </div>
                                </div>

                                <label>Subtitle</label><span style="color:red; font-size: 20px;">*</span>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="subtitle" class="form-control" placeholder="Enter subtitle" required>
                                    </div>
                                </div>

                                <label>Body</label><span style="color:red; font-size: 20px;">*</span>
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea name="body" class="form-control" placeholder="Enter body" required></textarea>
                                    </div>
                                </div>

                                <label>Feathered Image</label><span style="color:red; font-size: 20px;">*</span>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" name="feathered_image" class="form-control" required><br>
                                    </div>
                                </div>

                                <label>Optional Image</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" name="image_2" class="form-control"><br>
                                    </div>
                                </div>

                                <label>Optional Image</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" name="image_3" class="form-control"><br>
                                    </div>
                                </div>

                                <label>Optional Image</label><
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" name="image_4" class="form-control"><br>
                                    </div>
                                </div>

                                <label>Optional Image</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" name="image_5" class="form-control"><br>
                                    </div>
                                </div>
                                
                                <br>
                                <button type="submit" name="create" class="btn btn-primary m-t-15 waves-effect">CREATE</button>
                                <button type="reset" class="btn btn-danger m-t-15 waves-effect">RESET</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
            <div class="row clearfix">
            </div>
        </div>
    </section>
    
    <?php include('includes/footer.php'); ?>
