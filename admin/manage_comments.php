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
                          <a href="manage_posts.php" class="btn btn-info">All Posts</a>
                            <a href="create_post.php" class="btn btn-info">Create Post</a>

                            <a href="category_list.php" class="btn btn-info">Category List</a>
                            <a href="category_list.php" class="btn btn-info">Add Category</a>
                            <a href="manage_comments.php" class="btn btn-info">All Comments</a>
                            
                        </div>
                        <div class="body">
                            <table id="example" class="" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Comment</th>
                                        <th>Replay</th>
                                        <th>Post</th>
                                        <th>Commentator</th>
                                        <th>Email ID</th>
                                        <th>Approval</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sql = "SELECT tb_comments.id, tb_post.title, tb_comments.name, tb_comments.email, tb_comments.message, tb_comments.approval FROM tb_comments, tb_post WHERE tb_comments.post_id=tb_post.id ORDER BY tb_comments.id DESC";
                                        $query = $db_config->query($sql);
                                        while($result = $query->fetch_object()){
                                    ?>
                                <tr>
                                    <td><?php echo $result->id  ; ?></td>
                                    <td><?php echo $result->message; ?></td>
                                    <td><?php if(!empty($result->replay)){ echo $result->replay;}else{echo "<span style='color:#F16C03'>unapproved comment</span>";} ?></td>
                                    <td><?php echo $result->title; ?></td>
                                    <td><?php echo $result->name; ?></td>
                                    <td><?php echo $result->email; ?></td>
                                    <td>
                                        <?php
                                            if($result->approval==0){
                                                echo "<span style='color:skyblue'>PENDING</span>";
                                            }
                                            if($result->approval==1){
                                                echo "<span style='color:green'>Approved</span>";
                                            }
                                            if($result->approval==2){
                                                echo "<span style='color:red'>Dismissed</span>";
                                            }
                                        ?>
                                    </td>
                                    <td><a href="comment_details.php?id=<?php echo $result->id; ?>"><button class="btn btn-info">VIEW DETAILS</button></a>
                                    </td>
                                </tr>
                                <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Comment</th>
                                        <th>Replay</th>
                                        <th>Post</th>
                                        <th>Commentator</th>
                                        <th>Email ID</th>
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
    