<?php session_start(); ?>
<?php if(!isset($_SESSION['type'])){
    header('Location: admin_login.php');
} ?>

<?php include('../includes/config.php'); ?>
<?php
  
 
    if(isset($_POST['update'])){
        $id = $_GET['id'];
        $image = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], '../images/'.$_FILES['image']['name']);
        $sql = "UPDATE tbltourpackages SET PackageImage='$image' WHERE PackageId='$id'";
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
                            <h2>
                                CHANGE IMAGE
                            </h2>   
                        </div>
                        <div class="body">
                            <?php 
                            $id = $_GET['id'];
                            $sql = "SELECT * FROM tbltourpackages WHERE PackageId = '$id'";
                            $query = $db_config->query($sql);
                            $result = $query->fetch_object();
                             ?>
                            <form method="post" enctype="multipart/form-data">
                                
                                <label>Package Image</label>
                                <div class="form-group">
                                    <img src="../images/<?php echo $result->PackageImage; ?>" width='300' alt="image">
                                </div>

                                <label>New Image</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" name="image" class="form-control" required><br>
                                    </div>
                                </div>
                                
                                <br>
                                <button type="submit" name="update" class="btn btn-primary m-t-15 waves-effect">UPDATE</button>
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
