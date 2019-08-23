<!DOCTYPE html>
<?php
session_start();
include("config.php");
include("check_student.php");

	$sql = pg_query("SELECT *,b.img as profile_stu,a.id_no as id_request from user_request a 
inner join student b on a.email_user = b.email
inner join job_company c on a.id_job = c.id_job
inner join resume d on d.email = b.email
where id_com = $id_com and a.id_no = '$_GET[id_request]';");
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
		<meta property="og:image" content="../images/gistda_logo.png" />
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
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body class="skin-blue">
		<?php include 'header.php'; ?>
		
		<section class="single">
			<div class="container">
				<div class="row">
					<div class="col-md-3 sidebar" id="sidebar">
						<aside>
							<h1 class="aside-title">ข้อมูลผู้โพส</h1>
							<div class="aside-body">
								
								<article class="article-mini">
									<div class="inner">
										<div  align="center" >
											<img  class="img-circle" src="../images/student/<?php echo $result[profile_stu]; ?>" alt="" width="70%">
										</div>
										<hr>
										<ul>
											<li>
												<i class="fa fa-user" aria-hidden="true"></i> : <?php echo $result[title_name],'',$result[s_name],' ',$result[l_name]; ?>
												<a href="profile.php?eid=<?php echo $result[id_no]; ?>" title=""><i class="fa fa-search"></i></a>
												
											</li>
											<li><i class="fa fa-address-card" aria-hidden="true"></i> : <?php echo $result[university]; ?></li>
											<li><i class="fa fa-map-marker" aria-hidden="true"></i> : <?php echo $result[province]; ?></li>
										</ul>
										<hr>
										<?php
											if ($id ==  $result[id_user]) {
										?>
										<a href="story_edit.php?stoid=<?php echo $result[id_story]; ?>" title="" class="btn btn-primary btn-block"><i class="fa fa-wrench" aria-hidden="true"></i> แก้ไขเรื่องราวนี้</a>
										<?php } ?>
										
									</div>
								</article>
							</div>
						</aside>
						
					</div>
					<div class="col-md-9">
						<ol class="breadcrumb">
							<li><a href="#">Home</a></li>
							<li class="active">Story</li>
						</ol>
						<article class="article main-article">
							<header>
								
								<h2><?php echo $result[title_story]; ?></h2>
								<ul class="details">
									<li>Posted on <?php echo $result[date_story]; ?></li>
									<li><a><?php echo $result[tag_story]; ?></a></li>
								</ul>
							</header>
							<div class="main">
								<p><?php echo $result[detail_story]; ?> <hr>
									<img src="images/story/<?php echo $result[img_story]; ?>" alt="" width="100%">
								</p>
								
							</article>
							
							
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