<!DOCTYPE html>
<?php
session_start();
include("config.php");
include("check_student.php");


$id_com = $_GET[com_id];
$sql = pg_query("SELECT * from company a inner join job_company b on a.id_com = b.id_com where a.id_com = '$id_com' ;");
$company = pg_fetch_array($sql);
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="description" content="GEOJOBS GISTDA GISTNU JOB GIST GIS GEOINFOMETIC">
		<meta name="author" content="GISTNU by Teerayoot injun Teerayoot5056@gmail.com">
		<meta name="keyword" content="GEOJOBS,GISTDA,GISTNU,JOB,GIST,GIS,GEOINFOMETIC">
		<!-- Shareable -->
		<meta property="og:title" content="GEOJOBS GISTDA GISTNU JOB GIST GIS GEOINFOMETIC" />
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
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body class="skin-blue">
		<?php include 'header.php'; ?>
		
		<section class="single">
			<div class="container">
				<div class="row">
					<div class="col-md-3 sidebar" id="sidebar">
						<aside>
							<h1 class="aside-title">ข้อมูลสถานประกอบการ</h1>
							<div class="aside-body">
								
								<article class="article-mini">
									<div class="inner">
										<div  align="center" >
											<img  class="" src="images/img_job/<?php echo $company[logo_img]; ?>" alt="" width="70%">
										</div>
										<hr>
										<ul>
											<li>
												<i class="fa fa-user" aria-hidden="true"></i> : <?php echo $company[name_com]; ?>
											</li>
											<li><i class="fa fa-address-card" aria-hidden="true"></i> : <?php echo $company[website_com]; ?></li>
											<li><i class="fa fa-map-marker" aria-hidden="true"></i> : <?php echo 'อ.',$company[amphoe_com],' จ.',$company[province_com]; ?></li>
											<li><i class="fa fa-map-marker" aria-hidden="true"></i> : <?php echo $company[email_com]; ?></li>
											<li><i class="fa fa-map-marker" aria-hidden="true"></i> : <?php echo $company[type_com]; ?></li>
										</ul>
										<hr>
										<?php
											if ($id ==  $company[id_user]) {
										?>
										<a href="story_edit.php?stoid=<?php echo $company[id_story]; ?>" title="" class="btn btn-primary btn-block"><i class="fa fa-wrench" aria-hidden="true"></i> แก้ไขเรื่องราวนี้</a>
										<?php } ?>
										
									</div>
								</article>
							</div>
						</aside>
						
					</div>
					<div class="col-md-9">
						<div class="line">
							<div>ตำแหน่งงานที่รับของสถานประกอบการนี้</div>
						</div>

						<?php
										$sql = pg_query("SELECT * from job_company a  inner join company b on a.id_com = b.id_com  where a.id_com = '$id_com';  ");
										while ( $arr = pg_fetch_array($sql) ) {
									?>
											<article class="col-md-12 article-list">
												<div class="inner">
													<figure>
														<a href="news.php?q=<?php echo $arr[id_job]; ?>">
															<img src="images/img_job/<?php echo $arr[img]; ?>" alt="Sample Article">
														</a>
													</figure>
													<div class="details">
														<div class="detail">
															<div class="category">
																<a href="#"><?php echo $arr[type_job]; ?></a>
															</div>
															<div class="time"><?php echo $arr[date_job]; ?></div>
														</div>
														<h1><a href="news.php?q=<?php echo $arr[id_job]; ?>"><?php echo $arr[name_job]; ?></a></h1>
														<p>
														<?php
															echo mb_strimwidth($arr[detail_job], 0, 200, '....<a href="news.php?q='.$arr[id_job].'" title="">เพิ่มเติม</a>');
														?>
															<br>
															<small> <i><b>การรับ  : </b>    <?php echo $arr[type_job]; ?></i> </small>
														</p>
													</div>
												</div>
											</article>
									<?php } ?>
							
							
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
		</body>
	</html>