<?php include('includes/config.php'); ?>
<?php include "includes/header.php"; ?>
		
		<!-- blog -->
		<div class="blog">
			<!-- container -->
			<div class="container">
				<div class="blog-heading">
					<h2 class="wow fadeInDown animated" data-wow-delay=".5s">Travel Blog</h2>
					<p class="wow fadeInUp animated" data-wow-delay=".5s">Vivamus efficitur scelerisque nulla nec lobortis. Nullam ornare metus vel dolor feugiat maximus.Aenean nec nunc et metus volutpat dapibus ac vitae ipsum. Pellentesque sed rhoncus nibh</p>
				</div>
				<div class="blog-top-grids">
					<div class="col-md-8 blog-top-left-grid">
						<div class="left-blog">
							<div class="blog-left">
								<?php  
									$sql = "SELECT * FROM tb_post";
									$run_sql = $db_config->query($sql);
									while($result=$run_sql->fetch_object()){
									?>
								<div class="blog-left-left wow fadeInUp animated" data-wow-delay=".5s">
									<?php
									$sql_2 = "SELECT post_id FROM tb_comments WHERE post_id=$result->id";
									$run_sql_2 = $db_config->query($sql);
									if($run_sql_2->num_rows>0){
										$comment = $run_sql_2->num_rows;
									}
									else{$comment = 0;}
									?>
									<p>Posted By <a href=""><?php $result->posted_by; ?></a> &nbsp;&nbsp; on <?php echo $result->posting_date; ?> &nbsp;&nbsp; <a href="">Comments (<?php echo $comment; ?>)</a></p>
									<a href="single.php"><img src="images/post_images/<?php echo $result->image_2; ?>" alt="" height="300" width="400"></a>
								</div>
								<div class="blog-left-right wow fadeInUp animated" data-wow-delay=".5s">
									<a href="single.php?id=<?php echo $result->id; ?>"><h3><?php echo $result->title; ?></h3> </a>
									<p><b><?php echo $result->subtitle; ?></b></p>
									<p><?php echo $result->body; ?>. 
								</p>
								<a href="single.php?id=<?php echo $result->id; ?>"><button class="btn pull-right" style="background-color: #2DCB74; color: white">show more...</button></a>
								</div>
								<div class="clearfix"> </div>
								<?php } ?>
							</div>
						</div>
						<nav>
							<ul class="pagination wow fadeInUp animated" data-wow-delay=".5s">
								<li>
									<a href="#" aria-label="Previous">
										<span aria-hidden="true">«</span>
									</a>
								</li>
								<li><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">5</a></li>
								<li>
									<a href="#" aria-label="Next">
										<span aria-hidden="true">»</span>
									</a>
								</li>
							</ul>
						</nav>
					</div>
					<div class="col-md-4 blog-top-right-grid">
						<div class="Categories wow fadeInUp animated" data-wow-delay=".5s">
							<h3>Categories</h3>
							<ul>
								<li><a href="#">Phasellus sem leo, interdum quis risus</a></li>
								<li><a href="#">Nullam egestas nisi id malesuada aliquet </a></li>
								<li><a href="#"> Donec condimentum purus urna venenatis</a></li>
								<li><a href="#">Ut congue, nisl id tincidunt lobor mollis</a></li>
								<li><a href="#">Cum sociis natoque penatibus et magnis</a></li>
								<li><a href="#">Suspendisse nec magna id ex pretium</a></li>
							</ul>
						</div>
						<div class="Categories wow fadeInUp animated" data-wow-delay=".5s">
							<h3>Archive</h3>
							<ul class="marked-list offs1">
								<li><a href="#">May 2016 (7)</a></li>
								<li><a href="#">April 2016 (11)</a></li>
								<li><a href="#">March 2016 (12)</a></li>
								<li><a href="#">February 2016 (14)</a> </li>
								<li><a href="#">January 2016 (10)</a></li>    
								<li><a href="#">December 2016 (12)</a></li>
								<li><a href="#">November 2016 (8)</a></li>
								<li><a href="#">October 2016 (7)</a> </li>
								<li><a href="#">September 2016 (8)</a></li>
								<li><a href="#">August 2016 (6)</a></li>                          
							</ul>
						</div>
						<div class="comments">
							<h3 class="wow fadeInUp animated" data-wow-delay=".5s">Recent Comments</h3>
							<div class="comments-text wow fadeInUp animated" data-wow-delay=".5s">
								<div class="col-md-3 comments-left">
									<img src="images/t1.jpg" alt="" />
								</div>
								<div class="col-md-9 comments-right">
									<h5>Admin</h5>
									<a href="#">Phasellus sem leointerdum risus</a> 
									<p>March 16,2016 6:09:pm</p>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="comments-text wow fadeInUp animated" data-wow-delay=".5s">
								<div class="col-md-3 comments-left">
									<img src="images/t2.jpg" alt="" />
								</div>
								<div class="col-md-9 comments-right">
									<h5>Admin</h5>
									<a href="#">Phasellus sem leointerdum risus</a> 
									<p>March 16,2016 6:09:pm</p>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="comments-text wow fadeInUp animated" data-wow-delay=".5s">
								<div class="col-md-3 comments-left">
									<img src="images/t3.jpg" alt="" />
								</div>
								<div class="col-md-9 comments-right">
									<h5>Admin</h5>
									<a href="#">Phasellus sem leointerdum risus</a> 
									<p>March 16,2016 6:09:pm</p>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<!-- //container -->
		</div>
	<!-- //blog -->
	
	<!-- footer -->
	<?php include('includes/footer.php'); ?>