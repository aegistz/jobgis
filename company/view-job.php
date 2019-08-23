<!DOCTYPE html>
<?php
session_start();
include("config.php");
include("check-company.php");

	$sql = pg_query("SELECT * from job_company a inner join company b on a.id_com = b.id_com where id_job = '$_GET[q]' ;");
	$result = pg_fetch_array($sql);
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
		<meta property="og:image" content="../../images/gistda_logo.png" />
		<title> GEOJOBs &mdash; GISTDA  </title>
		<!-- Bootstrap -->
		<link rel="stylesheet" href="../scripts/bootstrap/bootstrap.min.css">
		<!-- IonIcons -->
		<link rel="stylesheet" href="../scripts/ionicons/css/ionicons.min.css">
		<!-- Toast -->
		<link rel="stylesheet" href="../scripts/toast/jquery.toast.min.css">
		<!-- OwlCarousel -->
		<link rel="stylesheet" href="../scripts/owlcarousel/dist/assets/owl.carousel.min.css">
		<link rel="stylesheet" href="../scripts/owlcarousel/dist/assets/owl.theme.default.min.css">
		<!-- Magnific Popup -->
		<link rel="stylesheet" href="../scripts/magnific-popup/dist/magnific-popup.css">
		<link rel="stylesheet" href="../scripts/sweetalert/dist/sweetalert.css">
		<!-- Custom style -->
		<link rel="stylesheet" href="../css/style.css">
		<link rel="stylesheet" href="../css/skins/blue.css">
		<link rel="stylesheet" href="../css/demo.css">
		<link rel="icon" href="https://www.gistda.or.th/main/sites/default/files/favicon.ico" type="image/png" >


		<link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">

	</head>

	<body class="skin-blue">

		<?php include 'header.php'; ?>

		<section class="single">
			<div class="container">
				<div class="row">
					<div class="col-md-4 sidebar" id="sidebar">
						<aside>
							<h1 class="aside-title">รายชื่อคนที่สมัครตำแหน่งงานนี้</h1>
							<div class="aside-body">

<?php 
	$sql = pg_query("SELECT * from job_company ORDER BY RANDOM() limit 5 ;");
	$check = pg_num_rows($sql);
	while( $arr = pg_fetch_array($sql) ){
		
			
?>										
								<article class="article-mini">
									<div class="inner">
										<figure>
											<a href="news.php">
												<img src="../images/img_job/<?php echo $arr[img]; ?>" alt="Sample Article">
											</a>
										</figure>
										<div class="padding">
											<h1><a href="news.php"><?php echo $arr[name_job]; ?></a></h1>
											<p>
												<?php echo $arr[detail_job]; ?> 
											</p>
										</div>
									</div>
								</article>
<?php  } ?>

							</div>
						</aside>
						
					</div>





					<div class="col-md-8">
						<ol class="breadcrumb">
						  <li><a href="#">Home</a></li>
						  <li class="active">News</li>
						</ol>
						<article class="article main-article">
							<div class="row">
								<div class="col-md-12">
								<header>
								<img src="../images/img_job/<?php echo $result[logo_img]; ?>" width="20%" alt="">
								<h2><?php echo $result[name_job]; ?></h2>
								<ul class="details">
									<li>Posted on <?php echo $result[date_job]; ?></li>
									<li><a><?php echo $result[type_job]; ?></a></li>
									<li>By <a href="company.php?com_id=<?php echo $result[id_com]; ?>"><?php echo $result[name_com]; ?></a></li>
								</ul>
							</header>
							</div>
							
							</div>
							
							

							<div class="main">
								<p><?php echo $result[detail_job]; ?> <hr>
								<b>หน้าที่และความรับผิดชอบ</b> <br>
<?php 
	$sql2 = pg_query("SELECT ROW_NUMBER () OVER (ORDER BY id_respon) as row,* from respon_job where id_job =  '$result[id_job]' ORDER BY id_respon;");
	while ( $arr2 = pg_fetch_array($sql2)) {
		echo $arr2[row].'. '.$arr2[detail_respon].'<br>';
	}
?>

<br>

<b>คุณสมบัติ</b> <br>
<?php 
	$sql2 = pg_query("SELECT ROW_NUMBER () OVER (ORDER BY id_property) as row,* from property_job where id_job =  '$result[id_job]' ORDER BY id_property;");
	while ( $arr2 = pg_fetch_array($sql2)) {
		echo $arr2[row].'. '.$arr2[detail_property].'<br>';
	}
?>




							</p>
								<div class="featured">
									<figure>
										<img src="../images/img_job/<?php echo $result[img]; ?>">
									</figure>
								</div>

								<p><b>คุณสมบัติพื้นฐาน</b> <br>
<b>ประเภทของงาน</b> : <?php echo $result[type_job]; ?> <br>
<b>จำนวน</b> : <?php echo $result[num_job]; ?> อัตรา  <br>
<b>เพศ</b> : <?php echo $result[sex_job]; ?> <br> 
<b>เงินเดือน(บาท)</b> : <?php echo $result[budget_job]; ?> <br>
<b>ประสบการณ์</b> : <?php echo $result[exp_job]; ?> ปี <br>
<b>สถานที่</b>สถานที่ : <?php echo $result[place_job]; ?> <br> 
<b>การศึกษา</b>การศึกษา : <?php echo $result[edu_job]; ?> 
</p>
							</div>



						</article>

							
<hr>
						<!-- <div class="sharing">
						<div class="title"><i class="ion-android-share-alt"></i> Sharing is caring</div>
							<ul class="social">
								<li>
									<a href="#" class="facebook">
										<i class="ion-social-facebook"></i> Facebook
									</a>
								</li>
								<li>
									<a href="#" class="twitter">
										<i class="ion-social-twitter"></i> Twitter
									</a>
								</li>
								<li>
									<a href="#" class="googleplus">
										<i class="ion-social-googleplus"></i> Google+
									</a>
								</li>
								<li>
									<a href="#" class="linkedin">
										<i class="ion-social-linkedin"></i> Linkedin
									</a>
								</li>
								<li>
									<a href="#" class="skype">
										<i class="ion-ios-email-outline"></i> Email
									</a>
								</li>
								<li class="count">
									20
									<div>Shares</div>
								</li>
							</ul>
						</div> -->

					</div>
				</div>
			</div>
		</section>

		<!-- Start footer -->
		<?php include 'footer.php'; ?>
		<!-- End Footer -->

		<!-- JS -->
		<script src="../js/jquery.js"></script>
		<script src="../js/jquery.migrate.js"></script>
		<script src="../scripts/bootstrap/bootstrap.min.js"></script>
		<script>var $target_end=$(".best-of-the-week");</script>
		<script src="../scripts/jquery-number/jquery.number.min.js"></script>
		<script src="../scripts/owlcarousel/dist/owl.carousel.min.js"></script>
		<script src="../scripts/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
		<script src="../scripts/easescroll/jquery.easeScroll.js"></script>
		<script src="../scripts/sweetalert/dist/sweetalert.min.js"></script>
		<script src="../scripts/toast/jquery.toast.min.js"></script>
		<!-- <script src="js/demo.js"></script> -->
		<script src="../js/e-magz.js"></script>
	</body>
</html>