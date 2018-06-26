<?php session_start(); ?>
<?php if(!isset($_SESSION['type'])){
    header('Location: admin_login.php');
} ?>

<?php include('../includes/config.php'); ?>
<?php
  
 
    if(isset($_POST['create'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $type = $_POST['type'];
        $image = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], '../images/users/'.$_FILES['image']['name']);
        $sql = "INSERT INTO users (name, email, password, type, image) VALUES('$name', '$email', '$password', '$type', '$image')";
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
                                CREATE USER
                            </h2>
                            
                        </div>
                        <div class="body">
                            <form method="post" enctype="multipart/form-data">
                                <label>User Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="name" class="form-control" placeholder="Enter user name" required>
                                    </div>
                                </div>

                                <label>User Email</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="email" class="form-control" placeholder="Enter user email" required>
                                    </div>
                                </div>

                                <label>User Password</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="password" class="form-control" placeholder="Enter user password" required>
                                    </div>
                                </div>

                                <label>User Type</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select name="type" class="form-control" required>
                                            <option value="" hidden>select package type</option>
                                            <option value="suAdmin">Super Admin</option>
                                            <option value="admin">Admin</option>
                                            <option value="employee">Employee</option>
                                        </select>
                                    </div>
                                </div>

                                <label>User Image</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" name="image" class="form-control" required><br>
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
