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
                                        <th>Package Id</th>
                                        <th>Package Name</th>
                                        <th>Package Type</th>
                                        <th>Package Location</th>
                                        <th>Package Price</th>
                                        <th>Package Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sql = "SELECT * FROM  tbltourpackages ORDER BY PackageId DESC";
                                        $query = $db_config->query($sql);
                                        while($result = $query->fetch_object()){
                                    ?>
                                <tr>
                                    <td><?php echo $result->PackageId; ?></td>
                                    <td><?php echo $result->PackageName; ?></td>
                                    <td><?php echo $result->PackageType; ?></td>
                                    <td><?php echo $result->PackageLocation; ?></td>
                                    <td><?php echo $result->PackagePrice; ?></td>
                                    <td><a href="package_details.php?id=<?php echo $result->PackageId; ?>"><button class="btn btn-info">VIEW DETAILS</button></a></td>
                                </tr>
                                <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Package Id</th>
                                         <th>Package Name</th>
                                        <th>Package Type</th>
                                        <th>Package Location</th>
                                        <th>Package Price</th>
                                        <th>Package Action</th>
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
    