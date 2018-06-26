<?php session_start(); ?>
<?php if(!isset($_SESSION['type'])){
    header('Location: admin_login.php');
} ?>

<?php include('../includes/config.php'); ?>
<?php
  
 
    if(isset($_POST['create'])){
        $name = $_POST['name'];
        $type = $_POST['type'];
        $location = $_POST['location'];
        $price = $_POST['price'];
        $fetures = $_POST['fetures'];
        $details = $_POST['details'];
        $duration = $_POST['duration'];
        $image = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], '../images/'.$_FILES['image']['name']);
        $sql = "INSERT INTO tbltourpackages (PackageName, PackageType, PackageLocation, PackagePrice, PackageFetures, PackageDetails, PackageImage, duration) VALUES('$name', '$type', '$location', '$price', '$fetures', '$details', '$image', '$duration')";
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
                                CREATE PACKAGE
                            </h2>
                            
                        </div>
                        <div class="body">
                            <form method="post" enctype="multipart/form-data">
                                <label>Package Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="name" class="form-control" placeholder="Enter package name" required>
                                    </div>
                                </div>

                                <label>Package Type</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select name="type" class="form-control" required>
                                            <option value="" hidden>select package type</option>
                                            <option value="family">Family</option>
                                            <option value="couple">Couple</option>
                                            <option value="group">Group</option>
                                        </select>
                                    </div>
                                </div>

                                <label>Package Location</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="location" class="form-control" placeholder="Enter package location" required>
                                    </div>
                                </div>

                                <label>Package Price</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="price" class="form-control" placeholder="Enter package price" required>
                                    </div>
                                </div>

                                <label>Package Fetures</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea name="fetures" class="form-control" placeholder="Enter package fetures" required></textarea>
                                    </div>
                                </div>

                                <label>Package Details</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea name="details" class="form-control" placeholder="Enter package details" required></textarea>
                                    </div>
                                </div>

                                <label>Package Image</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" name="image" class="form-control" required><br>
                                    </div>
                                </div>

                                <label>Package Duration</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="duration" class="form-control" placeholder="Enter package duration" required>
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
