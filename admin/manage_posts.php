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
                            <h3>All posts</h3>                  
                        </div>
                        <div class="body">
                            <table id="example" class="" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Post Id</th>
                                        <th>Category</th>
                                        <th>Title</th>
                                        <th>Subtitle</th>
                                        <th>Body</th>
                                        <th>feathered</th>
                                        <th>Posting Date</th>
                                        <th>Updation Date</th>
                                        <th>Posted By</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sql = "SELECT tb_post.id, tb_post_category.category, tb_post.title, tb_post.subtitle, tb_post.body, tb_post.feathered_image, tb_post.posting_date, tb_post.posted_by, tb_post.updation_date FROM tb_post, tb_post_category WHERE tb_post.category=tb_post_category.id ORDER BY tb_post.id DESC";
                                        $query = $db_config->query($sql);
                                        while($result = $query->fetch_object()){
                                    ?>
                                <tr>
                                    <td><?php echo $result->id  ; ?></td>
                                    <td><?php echo $result->category; ?></td>
                                    <td><?php echo $result->title; ?></td>
                                    <td><?php echo $result->subtitle; ?></td>
                                    <td><?php echo $result->body; ?></td>
                                    <td><img src="../images/post_images/<?php echo $result->feathered_image; ?>" height="50" width="100" alt="feathered image"></td>
                                    <td><?php echo $result->posting_date; ?></td>
                                    <td><?php if($result->updation_date=="0000-00-00 00:00:00"){
                                            echo " ";
                                        }
                                        else{
                                            echo "Updated on ".$result->updation_date;
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo $result->posted_by; ?></td>
                                    <td><a href="post_details.php?id=<?php echo $result->id; ?>"><button class="btn btn-info">VIEW DETAILS</button></a>
                                    </td>
                                </tr>
                                <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Post Id</th>
                                        <th>Category</th>
                                        <th>Title</th>
                                        <th>Subtitle</th>
                                        <th>Body</th>
                                        <th>feathered</th>
                                        <th>Posting Date</th>
                                        <th>Updation Date</th>
                                        <th>Posted By</th>
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
    