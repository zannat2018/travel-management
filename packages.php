	<?php include('includes/config.php'); ?>
	<?php include "includes/header.php"; ?>

	<div class="banner-inner wow fadeInDown animated" style="margin-bottom: -100px;">
		<div class="banner-inner-dott wow fadeInDown animated" data-wow-delay=".5s">       
		    <!--banner-info-->
			<div class="">
			  <h1 class="wow fadeInLeft animated" data-wow-delay="1.1s" style="margin-top: 0px; color: white; padding-top: 10px; font-weight: bold; font-size: 50px;">Choose yours</h1>
			    <h2 class="wow fadeInRight animated" data-wow-delay="1.1s" style="margin-top: 0px; color: white; padding-top: 10px;">from a huge collection!</h2>			     
			</div>
		<!--//banner-info-->	
		</div>
	 </div>

	<!-- gallery -->
		<div class="gallery" >
			<div class="container" >
							
				<div class="gallery-grids">
				<?php
					$package_per_page = 6;
					$sql_tmp = "SELECT * FROM tbltourpackages";
					$query_tmp = $db_config->query($sql_tmp);
					$number_of_data = $query_tmp->num_rows;
					$number_of_pages = ceil($number_of_data/$package_per_page);
					if(!isset($_GET['page'])){
						$page = 1;
					}
					else{
						if($_GET['page']>$number_of_pages){
						$page = $number_of_pages;
						}
					else if($_GET['page']<1){
						$page = 1;
						}
					else{
						$page = $_GET['page'];
						}
					}
					
					$first_page_offset = ($page-1)*$package_per_page;

				?>
				<script type="text/javascript">
					function show_packages(){
						jQuery.ajax({
							url:'packages_helper.php',
							method:'post',
							data:"first_page_offset="+<?php $first_page_offset; ?>, +"package_per_page="+<?php $package_per_page ?>,
							success:function(data){jQuery('#id').html(data);}
						});
					}
				</script>
				<?php $sql = "SELECT * from tbltourpackages LIMIT ".$first_page_offset.",".$package_per_page;
						$run_sql = $db_config->query($sql);
						
						while($row = $run_sql->fetch_object()){
				?>	

					<div class="col-md-4 gallery-grid wow fadeInUp animated" data-wow-delay=".5s">
						<div class="grid">
							<figure class="effect-apollo">
								<a class="example-image-link" href="package_book.php?id=<?php echo $row->PackageId; ?>" style="text-decoration: none; color: #999999;">
									<img src="images/tms/<?php echo $row->PackageImage; ?>" alt="image" height="150" />
									<figcaption>
										<h4>click for detail</h4>
									</figcaption>
									<div class="row" style="font-weight: normal; color: white; background-color: #9575CD; padding-left: 20px; padding-right: 20px;">
										<div class="pull-left">										
											<h4 style="margin: 10px;"><span class="fa fa-clock-o"></span>&nbsp;&nbsp;&nbsp;<?php echo $row->duration; ?> days</h4>
										</div>
										<div class="pull-right">
											<h4>starts from</h4>
											<h3>&#2547;&nbsp;&nbsp;&nbsp;<?php echo $row->PackagePrice; ?></h3>
										</div>
									</div>
										<h4 align="left"><span class="fa fa-map-marker"></span>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row->PackageLocation; ?></h4><hr>									
								</a>
							</figure>
						</div>
					</div>

					<?php } ?>
					<div align="center">
						<nav aria-label="Page navigation example">
						  <ul class="pagination">
						  	<li class="page-item"><a class="page-link" href="packages.php?page=<?php echo $page-1; ?>">Previous</a></li>

						  	<?php for($i=1; $i<=$number_of_pages; $i++){ ?>	

						    <li class="page-item"><a class="page-link" href="packages.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>	

						    <?php } ?>

						    <li class="page-item"><a class="page-link" href="packages.php?page=<?php echo $page+1; ?>">Next</a></li>
						  </ul>
						</nav>
					</div>
					<div class="clearfix"> </div>
					<script src="js/lightbox-plus-jquery.min.js"> </script>
				</div>
			</div>
		</div>
	<!-- //gallery -->
	
	<?php include "includes/footer.php"; ?>