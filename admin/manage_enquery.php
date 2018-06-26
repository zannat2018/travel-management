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
                            
                        </div>
                        <div class="body">
                            <table id="example" class="" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Enquery Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile No.</th>
                                        <th>Subject</th>
                                        <th>Description</th>
                                        <th>Posting Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if(isset($_GET['id'])){}
                                        $sql = "SELECT * FROM tb_enquery";
                                        $query = $db_config->query($sql);
                                        while($result = $query->fetch_object()){
                                    ?>
                                <tr>
                                    <td><?php echo $result->id  ; ?></td>
                                    <td><?php echo $result->FullName; ?></td>
                                    <td><?php echo $result->EmailId; ?></td>
                                    <td><?php echo $result->MobileNumber; ?></td>
                                    <td><?php echo $result->Subject; ?></td>
                                    <td><?php echo $result->Description; ?></td>
                                    <td><?php echo $result->PostingDate; ?></td>
                                    <td><?php if($result->Status!==NULL){
                                            $id = $result->id;
                                            echo "<a href='enquery_details.php?id=$id'<span style='color:green'>Replied</span>";
                                        }
                                        else{?><a href="enquery_details.php?id=<?php echo $result->id; ?>"><button class="btn btn-info">Replay</button></a>
                                        <?php } ?>
                                    </td>
                                    <td>
                                    </td>
                                    
                                </tr>
                                <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Enquery Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile No.</th>
                                        <th>Subject</th>
                                        <th>Description</th>
                                        <th>Posting Date</th>
                                        <th>Status</th>
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
    