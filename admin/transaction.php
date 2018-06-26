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
                            <h2>
                                All Transaction
                            </h2>
                            
                        </div>
                        <div class="body">
                            <table id="example" class="" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Transaction Id</th>
                                        <th>Client ID</th>
                                        <th>Client Name</th>
                                        <th>Client Email</th>
                                        <th>Amount</th>
                                        <th>Card No.</th>
                                        <th>Package_id</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sql = "SELECT transaction.transaction_id, transaction.client_id, clients.FullName, clients.EmailId, transaction.amount, transaction.card_no, transaction.package_id FROM transaction, clients where transaction.client_id=clients.id";
                                        $query = $db_config->query($sql);
                                        while($result = $query->fetch_object()){
                                    ?>
                                <tr>
                                    <td><?php echo $result->transaction_id; ?></td>
                                    <td><?php echo $result->client_id; ?></td>
                                    <td><?php echo $result->FullName; ?></td>
                                    <td><?php echo $result->EmailId; ?></td>
                                    <td><?php echo $result->amount; ?> &#2547;</td>
                                    <td><?php echo $result->card_no; ?></td>
                                    <td><?php echo $result->package_id; ?></td>
                                </tr>
                                <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Transaction Id</th>
                                        <th>Client ID</th>
                                        <th>Client Name</th>
                                        <th>Client Email</th>
                                        <th>Amount</th>
                                        <th>Card No.</th>
                                        <th>Package_id</th>
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
    