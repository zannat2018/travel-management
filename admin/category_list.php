<?php session_start(); ?>
<?php if(!isset($_SESSION['type'])){
    header('Location: admin_login.php');
} ?>

<?php include('../includes/config.php'); ?>
<?php
  
 
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $sql = "INSERT INTO tb_post_category (category) VALUES('$name')";
        $query = $db_config->query($sql);
        if($query===true){
             echo "<script>document.location='category_list.php'</script>";
        }
        else{
            echo "<script>alert('failed')</script>";
            echo "<script>document.location='category_list.php'</script>";
            }

    
  }

?>

<?php
    if(isset($_POST['update'])){
        $id = $_POST['edit_id'];
        $name = $_POST['name'];
        $sql = "UPDATE tb_post_category SET category='$name' WHERE id='$id'";
        $run_sql = $db_config->query($sql);
        if($run_sql===TRUE){
            echo "<script>alert('Category successfully updated')</script>";
        
        }
        else{
            echo "<script>alert('failed')</script>";
             echo "<script>document.location='category_list.php'</script>";
            }

    }
?>

<?php
    if(isset($_GET['delete_id'])){
        $id = $_GET['delete_id'];
        $sql = "DELETE FROM tb_post_category WHERE id='$id'";
        $run_sql = $db_config->query($sql);
        if($run_sql===true){
            echo "<script>document.location='category_list.php'</script>";
        }
        else{
            echo "<script>alert('failed')</script>";
             echo "<script>document.location='category_list.php'</script>";
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

                        </div>
                        <div class="body">
                            <div class="row">
                            <div class="col-md-6">
                                <h3>All categories</h3>
                                <table id="example" class="" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Category Id</th>
                                        <th>Category Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php
                                        $sql = "SELECT * FROM tb_post_category";
                                        $query = $db_config->query($sql);
                                        while($result = $query->fetch_object()){
                                    ?>
                                <tr>
                                    <td><?php echo $result->id  ; ?></td>
                                    <td><?php echo $result->category; ?></td>
                                    <td>
                                        <script type="text/javascript">
                                            function edit_category(){
                                                jQuery.ajax({
                                                    url:"edit_category.php",
                                                    method:"POST",
                                                    data:"edit_id="+"<?php echo $result->id;?>",
                                                    success:function(data){
                                                        $('#edit_form').html(data);
                                                    }
                                                });
                                            }
                                        </script>
                                       <button class="glyphicon glyphicon-pencil btn btn-info" onclick="edit_category()"></button>
                                        <a href="category_list.php?delete_id=<?php echo $result->id; ?>" class="btn btn-danger" onclick="return confirm('Do you really want to delete this category!!!')"><span class="glyphicon glyphicon-trash"></span></a>
                                    </td>
                                    
                                </tr>
                                <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Category Id</th>
                                        <th>Category Name</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                            </div>

                            <div class="col-md-6" id="edit_form">
                               <form method="post">
                                <caption><h3 align="center">Add a new category</h3></caption><hr><br>

                                <label>Category Name</label><span style="color:red; font-size: 20px;">*</span>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="name" class="form-control" placeholder="Enter category name" required>
                                    </div>
                                </div>
                                                               
                                <br>
                                <button type="submit" name="submit" class="btn btn-primary m-t-15 waves-effect">CREATE</button>
                                <button type="reset" class="btn btn-danger m-t-15 waves-effect">RESET</button>
                            </form>
                            </div>
                            </div>
                            
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
