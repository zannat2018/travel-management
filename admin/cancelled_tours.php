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
                        <div class="header">
                          <a href="upcomming_tours.php" class="btn btn-info">Upcomming</a>

                          <a href="ongoing_tours.php" class="btn btn-info">Ongoing</a>

                          <a href="cancelled_tours.php" class="btn btn-info">Cancelled</a>

                          <a href="upcomming_tours.php" class="btn btn-info">Expired</a>

                          <a href="pending_tours.php" class="btn btn-info">Pending</a>
                            
                        </div>
                        <div class="body">
                            <table id="example" class="" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Booking Id</th>
                                        <th>Package Name</th>
                                        <th>Client Name</th>
                                        <th>Client Email</th>
                                        <th>Transaction ID</th>
                                        <th>Duration</th>
                                        <th>Tour Status</th>
                                        <th>Booking Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $date = date('m/d/Y');
                                        $sql = "SELECT tblbooking.BookingId, tblbooking.transaction_id , tblbooking.FromDate, tblbooking.ToDate, tblbooking.UpdationDate, tbltourpackages.PackageName, tbltourpackages.duration, clients.FullName, clients.EmailId, tblbooking.status, tblbooking.cncl_cnfrm_by FROM  tblbooking JOIN tbltourpackages ON tblbooking.PackageId=tbltourpackages.PackageId JOIN clients ON tblbooking.client_id=clients.id WHERE tblbooking.status=2 ORDER BY tblbooking.BookingId DESC";
                                        $query = $db_config->query($sql);
                                        while($result = $query->fetch_object()){
                                    ?>
                                <tr>
                                    <td><?php echo $result->BookingId  ; ?></td>
                                    <td><?php echo $result->PackageName; ?></td>
                                    <td><?php echo $result->FullName; ?></td>
                                    <td><?php echo $result->EmailId; ?></td>
                                    <td><?php echo $result->transaction_id; ?></td>
                                    <td><?php echo $result->duration; ?> Days</td>
                                    <td><?php if($result->FromDate>date('m/d/Y')){echo '<span style="color:skyblue">Upcomming</span>';}else if($result->ToDate<date('m/d/Y')){echo '<span style="color:red">Expired</span>';}else{echo '<span style="color:green">Ongoing</span>';} ?></td>
                                    <td><?php if($result->status == 0){echo "<span style='color:skyblue'>PENDING</span>";}
                                                if($result->status == 1){echo "<span style='color:green'>CONFIRMED<br>by ".$result->cncl_cnfrm_by." at ".$result->UpdationDate."</span>";}
                                                if($result->status == 2){echo "<span style='color:red'>CANCELLED<br>by ".$result->cncl_cnfrm_by." at ".$result->UpdationDate."</span>";}
                                        ?>    
                                    </td>
                                    <td><a href="booking_details.php?id=<?php echo $result->BookingId; ?>"><button class="btn btn-info">VIEW DETAILS</button></a>
                                    </td>
                                </tr>
                                <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Booking Id</th>
                                        <th>Package Name</th>
                                        <th>Client Name</th>
                                        <th>Client Email</th>
                                        <th>Transaction ID</th>
                                        <th>Duration</th>
                                        <th>Tour Status</th>
                                        <th>Booking Status</th>
                                        <th>Action</th>
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
    