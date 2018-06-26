<?php include('../includes/config.php'); ?>
<?php session_start(); ?>
<?php if(!isset($_SESSION['type'])){
    header('Location: admin_login.php');
} ?>
<?php if(!isset($_POST['id_post'])){
     echo "<script>document.location='404.php'</script>";
    }
?>
                                <?php
                                        $id = $_POST['id_post'];
                                        $sql = "SELECT tb_post.id, tb_post.category,tb_post.title, tb_post.subtitle, tb_post.body, tb_post.feathered_image, tb_post.image_2, tb_post.image_3, tb_post.image_4, tb_post.image_5 FROM tb_post, tb_post_category WHERE tb_post.category=tb_post_category.id AND tb_post.id='$id'";
                                        $query = $db_config->query($sql);
                                        $result = $query->fetch_object();
                                        $a = $result->category;
                                    ?>
                            <form method="post" enctype="multipart/form-data">
                            	<input type="hidden" name="id" value="<?php echo $id; ?>">
                                <label>Category</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select name="category" class="form-control">
                                            <?php
                                            $sql = "SELECT * FROM tb_post_category";
                                            $run_sql = $db_config->query($sql);
                                            while($results = $run_sql->fetch_object()){
                                            ?>
                                            <option value="<?php echo $results->id; ?>" <?php $b = $results->id; if($a==$b){echo "selected";} ?>><?php echo $results->category; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <label>Title</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="title" class="form-control" placeholder="Enter title" value="<?php echo $result->title; ?>">
                                    </div>
                                </div>

                                <label>Subtitle</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="subtitle" class="form-control" placeholder="Enter subtitle" value="<?php echo $result->subtitle; ?>">
                                    </div>
                                </div>

                                <label>Body</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea name="body" class="form-control" placeholder="Enter body" value="<?php echo $result->body; ?>"><?php echo $result->body; ?></textarea>
                                    </div>
                                </div>

                                <label>Feathered Image</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" name="feathered_image" class="form-control"><br>
                                    </div>
                                </div>

                                <label>Optional Image</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" name="image_2" class="form-control"><br>
                                    </div>
                                </div>

                                <label>Optional Image</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" name="image_3" class="form-control"><br>
                                    </div>
                                </div>

                                <label>Optional Image</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" name="image_4" class="form-control"><br>
                                    </div>
                                </div>

                                <label>Optional Image</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" name="image_5" class="form-control"><br>
                                    </div>
                                </div>
                                
                                <br>
                                <button type="submit" name="update" class="btn btn-primary m-t-15 waves-effect">UPDATE</button>
                                <button type="reset" class="btn btn-danger m-t-15 waves-effect">RESET</button>
                            </form>