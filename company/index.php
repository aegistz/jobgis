<!DOCTYPE html>
<?php
session_start();
include("config.php");
include("check-company.php")
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
	</head>
	<body class="skin-blue">
		<?php include 'header.php'; ?>
		<section class="category">
			<div class="container">
				<div class="row">
					<div class="col-md-8 text-left">
						<div class="row">
							<div class="col-md-12">
								<h4 class="page-title">
								รายการประกาศรับสมัครงาน/ฝึกงาน/สหกิจศึกษา
								<a href="add-job.php" class="btn btn-primary"><i class="fa fa-plus"></i> เพิ่มประกาศรับใหม่</a>
								</h4>
								<p class="page-subtitle">ระบบจับคู่นักศึกษากับสถานประกอบการ</p>
							</div>
						</div>
						<div class="line"></div>
						<div class="row">
							

<?php 
	$sql = pg_query("SELECT * from job_company where id_com = '$id_com' ;");
	$check = pg_num_rows($sql);
	if ($check != 0 ) {
	while( $job_com = pg_fetch_array($sql) ){
		
			
?>							
							<article class="col-md-12 article-list">
								<div class="inner">
									<figure>
										<a href="view-job.php?q=<?php echo $job_com[id_job]; ?>">
											<img src="../images/img_job/<?php echo $job_com[img]; ?>">
										</a>
									</figure>
									<div class="details">
										<div class="detail">
											<div class="category">
												<a href="#"><?php echo $job_com[type_job]; ?></a>

											</div>
											<div class="time"><?php echo $job_com[date_job]; ?>
												<div class="btn-group">
																<button type="button" class="btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">
																<i class="fa fa-bars"></i> </button>
																<ul class="dropdown-menu" role="menu">
																	<li><a href="story_edit.php?stoid=<?php echo $arr[id_story]; ?>"><i class="fa fa-wrench" aria-hidden="true"></i> แก้ไขเรื่องราว</a></li>
																	<li><a href="profile.php?type=delete_story&id_story=<?php echo $arr[id_story]; ?>" onclick="return confirm('ยืนยันการลบเรื่องราวนี้ ? ถ้าลบแล้วจะสามารถย้อนกลับได้')" ><i class="fa fa-window-close" aria-hidden="true"></i> ลบเรื่องราว</a></li>
																</ul>
															</div>
											</div>
										</div>
										<h1><a href="view-job.php?q=<?php echo $job_com[id_job]; ?>"><?php echo $job_com[name_job]; ?></a></h1>
										<p>
											<?php echo $job_com[detail_job]; ?>
										</p>
									</div>
								</div>
							</article>
<?php } }  else { ?>
			
							<article class="col-md-12 article-list">
								<div class="inner">
									<figure>
										<a href="">
											<img src="https://patientnews.com/wp-content/uploads/2019/03/dummy.png">
										</a>
									</figure>
									<div class="details">
										<div class="detail">
											<div class="category">
												<a href="">Tag</a>
											</div>
											<div class="time">9999-99-9</div>
										</div>
										<h1><a href="">ท่านยังไม่เพิ่มข้อมูลตำแหน่งงานที่เปิดรับ</a></h1>
										<p>
											เพิ่มให้ได้บุคคลเข้าร่วมทำงานตามที่ท่านต้องการ 
											สามารถกดเพิ่มข้อมูลการงานรับสมัครงาน / ฝึกงาน / สหกิจศึกษา ได้ ที่นี่
										</p>
										<footer>
											<a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div>999</div></a>
											<a class="btn btn-primary more" href="add-job.php">
												<div>เพิ่มข้อมูล</div>
												<div><i class="ion-ios-arrow-thin-right"></i></div>
											</a>
										</footer>
									</div>
								</div>
							</article>


<?php }  ?>
							
						</div>
					</div>
					<div class="col-md-4 sidebar">
						<aside>
							<div class="aside-body">
								<figure class="ads">
									<a href="single.html">
										<img src="../images/img_job/<?php echo $company[logo_img]; ?>">
									</a>
								</figure>
							</div>
						</aside>
						<aside>
							<div class="aside-body">
								<div class="featured-author">
									<div class="featured-author-inner">
										<hr>
										<div class="featured-author-body">
											<div class="featured-author-count">
												<div class="item">
													<a href="#">
														<div class="name">ประกาศ</div>
														<div class="value"><?php echo  number_format($check); ?></div>
													</a>
												</div>
												<div class="item">
													<a href="#">
														<div class="name">รอการตอบรับ</div>
														<div class="value">22</div>
													</a>
												</div>
												<div class="item">
													<a href="#">
														<div class="name">ผู้สมัครทั้งหมด</div>
														<div class="value">3,729</div>
													</a>
												</div>
											</div>
											
											
											
										</div>
									</div>
								</div>
							</div>
						</aside>
						<aside>
							<h1 class="aside-title">ผู้สมัครงานล่าสุด</h1>
							<div class="aside-body">

<?php 
	$sql = pg_query("SELECT *,b.img as profile_stu from user_request a 
inner join student b on a.email_user = b.email
inner join job_company c on a.id_job = c.id_job
where id_com = $id_com;");
	while ($arr = pg_fetch_array($sql)) {
?>
								<article class="article-mini">
									<div class="inner">
										<figure>
											<a href="profile.php?eid=<?php echo $arr[id_no]; ?>">
												<img src="../images/student/<?php echo $arr[profile_stu]; ?>">
											</a>
										</figure>
										<div class="padding">
											<h1><a href="profile.php?eid=<?php echo $arr[id_no]; ?>"><?php echo $arr[s_name],' ',$arr[l_name] ; ?></a></h1>
											<div class="detail">
												<div class="category"><a href="#">รับสมัครงาน</a></div>
												<div class="time">2019-22-11</div>
											</div>
											<p>รับนักภูมิสารสนเทศ 3 ตำแหน่ง</p>
										</div>
									</div>
								</article>
<?php } ?>
								
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