<?php session_start(); ?>
<?php if(!isset($_SESSION['type'])){
    header('Location: admin_login.php');
} ?>

<?php include('../includes/config.php'); ?>
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

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <table id="example" class="display nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>User Id</th>
                                        <th>User Name</th>
                                        <th>User Email</th>
                                        <th>User Type</th>
                                        <th>User Mobile</th>
                                        <th>User Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sql = "SELECT * FROM  users ORDER BY id DESC";
                                        $query = $db_config->query($sql);
                                        while($result = $query->fetch_object()){
                                    ?>
                                <tr>
                                    <td><?php echo $result->id; ?></td>
                                    <td><?php echo $result->name; ?></td>
                                    <td><?php echo $result->email; ?></td>
                                    <td><?php echo $result->type; ?></td>
                                    <td><?php echo $result->phone; ?></td>
                                    <td><a href="user_details.php?id=<?php echo $result->id; ?>"><button class="btn btn-info">VIEW DETAILS</button></a></td>
                                </tr>
                                <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>User Id</th>
                                        <th>User Name</th>
                                        <th>User Email</th>
                                        <th>User Type</th>
                                        <th>User Mobile</th>
                                        <th>User Action</th>
                                    </tr>
                                </tfoot>
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
    