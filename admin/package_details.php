<?php session_start(); ?>
<?php if(!isset($_SESSION['type'])){
    header('Location: admin_login.php');
} ?>

<?php include('../includes/config.php'); ?>
<?php
  
 
    if(isset($_POST['update'])){
        $id = $_GET['id'];
        $name = $_POST['name'];
        $type = $_POST['type'];
        $location = $_POST['location'];
        $price = $_POST['price'];
        $fetures = $_POST['fetures'];
        $details = $_POST['details'];
        $duration = $_POST['duration'];
        $sql = "UPDATE tbltourpackages SET PackageName='$name', PackageType='$type', PackageLocation='$location', PackagePrice='$price', PackageFetures='$fetures', PackageDetails='$details', duration='$duration' WHERE PackageId='$id'";
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
                                PACKAGE DETAILS
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
                                <label>Package Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="name" class="form-control" placeholder="Enter package name" value="<?php echo $result->PackageName; ?>">
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
                                        <input type="text" name="location" class="form-control" placeholder="Enter package location" value="<?php echo $result->PackageLocation; ?>">
                                    </div>
                                </div>

                                <label>Package Price</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="price" class="form-control" placeholder="Enter package price" value="<?php echo $result->PackagePrice; ?>">
                                    </div>
                                </div>

                                <label>Package Fetures</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea name="fetures" class="form-control" placeholder="Enter package fetures"><?php echo $result->PackageFetures; ?></textarea>
                                    </div>
                                </div>

                                <label>Package Details</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea name="details" class="form-control" placeholder="Enter package details">value="<?php echo $result->PackageDetails; ?>"</textarea>
                                    </div>
                                </div>

                                <label>Package Image</label>
                                <div class="form-group">
                                    <img src="../images/<?php echo $result->PackageImage; ?>" width='300' alt="image">
                                    <a href="change_image.php?id=<?php echo $result->PackageId; ?>"><button class="btn btn-danger m-t-15 waves-effect">CHANGE IMAGE</button></a>
                                </div>

                                <label>Package Duration</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="duration" class="form-control" placeholder="Enter package duration" value="<?php echo $result->duration; ?> Days">
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
