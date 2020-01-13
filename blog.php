<!DOCTYPE html>
<?php
session_start();
include("config.php");
include("check_student.php");


if ($_GET[q] == 'all_type') {
	$q = '';
}else if ($_GET[q] == 'farmland') {
	$q = 'เกษตร';
}else if ($_GET[q] == 'technology') {
	$q = 'เทคโนโลยี';
}else if ($_GET[q] == 'villager') {
	$q = 'ชาวบ้าน';
}else if ($_GET[q] == 'business') {
	$q = 'ธุรกิจ';
}

$sql_block = pg_query("SELECT * from block a inner join student b on a.id_user = b.id_no where tag_block like '%$q%' order by a.date_block desc limit 50 ;");


?>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="description" content="GEOJOBs GISTDA GISTNU JOB GIST GIS GEOINFOMETIC">
		<meta name="author" content="GISTNU by Teerayoot injun Teerayoot5056@gmail.com">
		<meta name="keyword" content="GEOJOBs,GISTDA,GISTNU,JOB,GIST,GIS,GEOINFOMETIC">
		<!-- Shareable -->
		<meta property="og:title" content="GEOJOBs GISTDA GISTNU JOB GIST GIS GEOINFOMETIC" />
		<meta property="og:type" content="article" />
		<meta property="og:url" content="http://www.cgistln.nu.ac.th" />
		<meta property="og:image" content="images/gistda_logo.png" />
		<title> GEOJOBs &mdash; GISTDA  </title>
		<!-- Bootstrap -->
		<link rel="stylesheet" href="scripts/bootstrap/bootstrap.min.css">
		<!-- IonIcons -->
		<link rel="stylesheet" href="scripts/ionicons/css/ionicons.min.css">
		<!-- Toast -->
		<link rel="stylesheet" href="scripts/toast/jquery.toast.min.css">
		<!-- OwlCarousel -->
		<link rel="stylesheet" href="scripts/owlcarousel/dist/assets/owl.carousel.min.css">
		<link rel="stylesheet" href="scripts/owlcarousel/dist/assets/owl.theme.default.min.css">
		<!-- Magnific Popup -->
		<link rel="stylesheet" href="scripts/magnific-popup/dist/magnific-popup.css">
		<link rel="stylesheet" href="scripts/sweetalert/dist/sweetalert.css">
		<!-- Custom style -->
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/skins/blue.css">
		<link rel="stylesheet" href="css/demo.css">
		<link rel="icon" href="https://www.gistda.or.th/main/sites/default/files/favicon.ico" type="image/png" >
		<link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
	</head>
	<body class="skin-blue">
		<?php include 'header.php'; ?>
		<section class="home">
			<div class="container">
				<div class="row">
					
					<div class="col-md-8 col-sm-12 col-xs-12">
						
						<div class="line">
							<div>บทความน่าสนใจ</div>
							<!-- <?php
							$str = "Cc0d0388d15";
							echo sha1($str);
							?>  -->
						</div>
						<form>
							<div class="hidden">
							<label><input type="radio" name="q" value="all_type" checked> รวม</label>
							<label><input type="radio" name="q" value="farmland" <?php if($_GET[q] =='farmland'){ echo 'checked';} ?>> เกษตร</label>
							<label><input type="radio" name="q" value="technology" <?php if($_GET[q] =='technology'){ echo 'checked';} ?>>เทคโนโลยี </label>
							<label><input type="radio" name="q" value="villager" <?php if($_GET[q] =='villager'){ echo 'checked';} ?>> ชาวบ้าน</label>
							<label><input type="radio" name="q" value="business" <?php if($_GET[q] =='business'){ echo 'checked';} ?>> ธุรกิจ</label>
							<button type="submit" class="btn btn-primary btn-block">ค้นหา</button>	
							</div>
						</form>
							
						
						<div class="row">
<table id="example" class="" style="width:100%">
        <thead>
            <tr>
                <th></th>
            </tr>
        </thead>
        <tbody>
<?php
								while ( $arr = pg_fetch_array($sql_block) ) {
							?>
            <tr>
                <td>
							<article class="col-md-12 article-list">
								            <div class="inner">
								              <figure>
									              <a href="blog_detail.php?stoid=<?php echo $arr[id_block]; ?>">
									                <img src="images/story/<?php echo $arr[img_block]; ?>"name="type" value="farmland" <?php if($_GET[type] =='farmland'){ echo 'checked';} ?>>
								                </a>
								              </figure>
								              <div class="details">
								                <div class="detail">
								                	<div class="row">
								                		<div class="col-md-2 col-xs-3">
								                		<img src="images/student/<?php echo $arr[img]; ?>" alt="" width="100%">
								                		</div>

								                		<div class="col-md-10  col-xs-9">
									                		<div class="category">
											                   <h6 >
											                   		<a href="profile.php?eid=<?php echo $arr[id_no] ?>" title="">
											                   			<?php echo $arr[s_name],' ', $arr[l_name]; ?>
											                   		</a>   
											                   </h6>
											                  โพสเมื่อ : <?php echo $arr[date_block]; ?>
										                  </div>
								                		</div>
										                  
								                	</div>

								                	

								                </div>
								                <h1><a href="block_detail.php?stoid=<?php echo $arr[id_block]; ?>">
								                	<?php 
								                 echo mb_strimwidth($arr[title_block], 0, 70, '...');
								                	?>
								                	</a></h1>
								              </div>
								            </div>
								          </article>
								          <hr>
                </td>
            </tr>

							<?php } ?> 
        </tbody>
      
    </table>

							

						</div>
					</div>
					
<div class="col-xs-6 col-md-4 sidebar" id="sidebar">
						<div class="sidebar-title for-tablet">Sidebar</div>
						<aside>
							<div class="aside-body">
								<form class="newsletter">
									<div class="icon">
										<i class="ion-ios-email-outline"></i>
										<h1>Newsletter</h1>
									</div>
									<div class="input-group">
										<input type="email" class="form-control email" placeholder="Your mail">
										<div class="input-group-btn">
											<button class="btn btn-primary"><i class="ion-paper-airplane"></i></button>
										</div>
									</div>
									<p>By subscribing you will receive new articles in your email.</p>
								</form>
							</div>
						</aside>
							<aside>
								<div class="aside-body">
									<figure class="ads">
										<a href="http://tsw.gistda.or.th/" title="" target="_blank">
										<img src="http://tsw.gistda.or.th/img/TSW2019_banner_th_2500x500.png">
										<figcaption>Advertisement</figcaption>
										</a>
									</figure>
								</div>
							</aside>
						<aside>
							<h1 class="aside-title">Popular <a href="#" class="all">See All <i class="ion-ios-arrow-right"></i></a></h1>
							<div class="aside-body">

<?php
	$sql = pg_query("SELECT * from job_company a  inner join company b on a.id_com = b.id_com limit 5 ;  ");
	while ( $arr = pg_fetch_array($sql) ) {
?>
								<article class="article-mini">
									<div class="inner">
										<figure>
											<a href="news.php">
												<img src="images/img_job/<?php echo $arr[img]; ?>" alt="Sample Article">
											</a>
										</figure>
										<div class="padding">
											<h1><a href="news.php"><?php echo $arr[name_job]; ?></a></h1>
											<p>
												<?php
															echo mb_strimwidth($arr[detail_job], 0, 120, '....<a href="news.php?q='.$arr[id_job].'" title="">เพิ่มเติม</a>');
														?>
											</p>
										</div>
									</div>
								</article>
<?php } ?>



							</div>
						</aside>

					</div>
				</div>
			</div>
		</section>
		
		<!-- Start footer -->
		<?php include 'footer.php'; ?>
		<!-- End Footer -->
		<!-- JS -->
		<script src="js/jquery.js"></script>
		<script src="js/jquery.migrate.js"></script>
		<script src="scripts/bootstrap/bootstrap.min.js"></script>
		<script>var $target_end=$(".best-of-the-week");</script>
		<script src="scripts/jquery-number/jquery.number.min.js"></script>
		<script src="scripts/owlcarousel/dist/owl.carousel.min.js"></script>
		<script src="scripts/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
		<script src="scripts/easescroll/jquery.easeScroll.js"></script>
		<script src="scripts/sweetalert/dist/sweetalert.min.js"></script>
		<script src="scripts/toast/jquery.toast.min.js"></script>
		<!-- <script src="js/demo.js"></script> -->
		<script src="js/e-magz.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"  ></script>
		<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js" ></script>
		<script type="text/javascript">
			$(document).ready(function() {
			    $('#example').DataTable({
			    	 "searching": false,
					 "aaSorting" : [],
			    	  "aLengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100, "All"]]
			    });

			} );
		</script>

		

	</body>
</html>