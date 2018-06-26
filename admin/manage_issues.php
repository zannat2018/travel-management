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
                                        <th>Issue Id</th>
                                        <th>Client Name</th>
                                        <th>Issue</th>
                                        <th>Description</th>
                                        <th>Posting Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if(isset($_GET['id'])){}
                                        $sql = "SELECT tb_issues.id, tb_issues.Description, tb_issues.PostingDate, tb_issues.AdminRemark, tb_subject.issue, clients.FullName FROM tb_issues, tb_subject, clients WHERE tb_issues.issue=tb_subject.id AND tb_issues.client_id=clients.id ORDER BY tb_issues.id DESC";
                                        $query = $db_config->query($sql);
                                        while($result = $query->fetch_object()){
                                    ?>
                                <tr>
                                    <td><?php echo $result->id  ; ?></td>
                                    <td><?php echo $result->FullName; ?></td>
                                    <td><?php echo $result->issue; ?></td>
                                    <td><?php echo $result->Description; ?></td>
                                    <td><?php echo $result->PostingDate; ?></td>
                                    <td>
                                        <?php
                                        if($result->AdminRemark!==NULL){
                                            $id = $result->id;
                                            echo "<a href='issue_details.php?id=$id'<span style='color:green'>SOLVED</span></a>";
                                        }
                                        else{?>
                                        <a href="issue_details.php?id=<?php echo $result->id; ?>"><button class="btn btn-info">Solve</button></a>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Issue Id</th>
                                        <th>Client Name</th>
                                        <th>Issue</th>
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
    