<?php include('../includes/config.php'); ?>
<?php include('includes/topbar.php'); ?>
<?php if(!isset($_SESSION['type'])){
    header('Location: admin_login.php');
} ?>
<?php if(!isset($_GET['id'])){
     echo "<script>document.location='404.php'</script>";
    }
?>
<?php if(isset($_POST['submit'])){
    $id = $_GET['id'];
    $solve = $_POST['solve'];
    $sql = "UPDATE tb_issues SET AdminRemark='$solve' WHERE id='$id'";
    $run_sql= $db_config->query($sql);
    if($run_sql===TRUE){
        echo "<script>document.location='issue_details.php?id=$id'</script>";
    }
}


?>


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
                            <table class="table table-stripped table-hover">
                                <?php
                                        $id = $_GET['id'];
                                        $sql = "SELECT tb_issues.id, tb_issues.Description, tb_issues.PostingDate, tb_issues.AdminRemark, tb_issues.AdminremarkDate,  tb_subject.issue, clients.FullName FROM tb_issues, tb_subject, clients WHERE tb_issues.issue=tb_subject.id AND tb_issues.client_id=clients.id AND tb_issues.id='$id'";
                                        $query = $db_config->query($sql);
                                        $result = $query->fetch_object();
                                    ?>
                                    <tr>
                                        <th>Issue Id</th>
                                        <td><?php echo $result->id  ; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Client Name</th>
                                        <td><?php echo $result->FullName; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Issue</th>
                                        <td><?php echo $result->issue; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td><?php echo $result->Description; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Posting Date</th>
                                        <td><?php echo $result->PostingDate; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                        <?php
                                        if($result->AdminRemark!==NULL){
                                            echo "<span style='color:green'>SOLVED</span> on ".$result->AdminremarkDate;
                                        }
                                        else{echo "<span style='color:skyblue'>PENDING</span>";}
                                        ?>
                                        </td>
                                    </tr>
                                    <?php if($result->AdminRemark==NULL){ ?>
                                    <tr>
                                        <th>Solve</th>
                                        <td>
                                            <form method="post">
                                                <textarea name="solve" class="form-control"></textarea><br>
                                                <input type="submit" name="submit" value="submit" class="btn btn-info">
                                            </form>
                                        </td>
                                    </tr>
                                    <?php } else{?>
                                    <tr>
                                        <th>Replay</th>
                                        <td><?php echo $result->AdminRemark; ?></td>
                                    </tr>
                                    <?php } ?>
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
    