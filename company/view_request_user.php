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
									</div>
								</article>
								<article class="article-mini">
									<a href="story_edit.php?stoid=<?php echo $result[id_story]; ?>" title="" class="btn btn-primary btn-block"><i class="fa fa-check" aria-hidden="true"></i> รับพิจารณาบุคคลนี้</a>
									<a href="story_edit.php?stoid=<?php echo $result[id_story]; ?>" title="" class="btn btn-danger btn-block"><i class="fa fa-check" aria-hidden="true"></i> ปฏิเสธบุคคลนี้</a>
								</article>
								<aside>
							<h1 class="aside-title">ตำแหน่งงานที่สมัคร</h1>
							<div class="aside-body">

<article class="article main-article">
						
							<div class="main">
								<p><b><?php echo $result[name_job]; ?></b> </p>
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
							</div>
						</article>

					

							</div>
						</aside>





							</div>
						</aside>
						
					</div>
					<div class="col-md-9">
						
						<article class="article main-article">
							<header>
								
								<h2>Resume ของ<?php echo $result[title_name],'',$result[s_name],' ',$result[l_name]; ?></h2>
								<hr>
							</header>
							<div class="main">
								<div class="page-description">
							<div class="row">
									<div class="col-md-6 col-sm-6">
										<div class="col-md-7">
											<div class="form-group">
												<p>
													ชื่อ <?php echo $result[title_name] ;?>&nbsp;<?php echo $result[s_name] ;?>&nbsp;<?php echo $result[l_name] ;?><br>
													โทรศัพท์มือถือ : <?php echo $result[phone] ;?><br>
													E-mail : <?php echo $result[email] ;?><br>
													ที่อยู่ : <?php echo $result[address] ;?> ต.<?php echo $result[tambon] ;?> อ.​<?php echo $result[amphoe] ;?> จ.<?php echo $result[province] ;?> <?php echo $result[zip_code] ;?>

												</p>
												<p>
													<h5>การศึกษา</h5>
													มหาวิทยาลัย : <?php echo $result[university] ;?> <br>
													วุฒิการศึกษา : <?php echo $result[edu_back] ;?> <br>
													ระดับการศึกษา : <?php echo $result[degree] ;?> <br>
													คณะ : <?php echo $result[faculty] ;?> <br>
													สาขา : <?php echo $result[sector] ;?> <br>
													GPA : <?php echo $result[gpa] ;?> <br>
												</p>
												<p>
													<h5>การทำงาน/การฝึกงาน</h5>
													ชื่อบริษัท : <?php echo $result[company] ;?> <br>
													ที่อยู่ติดต่อ : <?php echo $result[address_com] ;?> <br>
													ตำแหน่ง : <?php echo $result[rank_com] ;?> <br>
													หน้าที่รับผิดชอบ : <?php echo $result[role_com] ;?> <br>
													เงินเดือน : <?php echo $result[salary_com] ;?> <br>
													ตั้งแต่วันที่ : <?php echo $result[date_start] ;?> <br>
													จนถึงวันที่ : <?php echo $result[date_end] ;?><br>
												</p>
												<p>
													<h5>ประวัติการฝึกอบรม</h5>
													หน่วยงานที่ฝึกอบรม : <?php echo $result[department] ;?><br>
													หลักสูตร : <?php echo $result[course] ;?><br>
													ระยะเวลาที่ฝึกอบรม : <?php echo $result[course_time] ;?> <br>

												</p>
												<p>
													<h5>เป้าหมายในการทำงาน/ฝึกงาน</h5>
													ลักษณะงานที่ต้องการ : <?php echo $result[work_n] ;?> <br>
													สายงานที่ต้องการ <br>
													1. <?php echo $result[work_1] ;?><br>
													2. <?php echo $result[work_2] ;?><br>
													3. <?php echo $result[work_3] ;?><br>
													พื้นที่ฝึกงานที่ต้องการ <br>
													1. <?php echo $result[area_1] ;?><br>
													2. <?php echo $result[area_2] ;?><br>
												</p>
											</div>
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
											<div class="col-md-7">
												<div class="form-group">
													
													<p>
														สัญชาติ : <?php echo $result[nationality] ;?><br>
														ศาสนา : <?php echo $result[religion] ;?><br>
														ส่วนสูง : <?php echo $result[hight] ;?><br>
														วันเกิด : <?php echo $result[birthday] ;?><br>
														สถานภาพทางทหาร : <?php echo $result[status] ;?>
													</p>
													<p>
														<b>ทักษะทางภาษา</b> <br>
														ภาษาไทย <br>
														 	พูด : <?php echo $result[th_s] ;?> <br>
														 	อ่าน : <?php echo $result[th_r] ;?><br>
														 	เขียน : <?php echo $result[th_w] ;?><br>
														ภาษาอังกฤษ <br>
														 	พูด : <?php echo $result[en_s] ;?><br>
														 	อ่าน : <?php echo $result[en_r] ;?><br>
														 	เขียน : <?php echo $result[en_w] ;?><br>
														ภาษาจีน <br>
															พูด : <?php echo $result[cn_s] ;?><br>
															อ่าน : <?php echo $result[cn_r] ;?><br>
															เขียน : <?php echo $result[cn_w] ;?><br>
														<b>ทักษะทางคอมพิวเตอร์ </b><br>
														Microsoft office <br>
														word : <?php echo $result[word] ;?><br>
														excel : <?php echo $result[excel] ;?><br>
														powerpoint : <?php echo $result[ppt] ;?><br>
														<b>Adobe</b> <br>
														photoshop : <?php echo $result[ps] ;?><br>
														Illustrator : <?php echo $result[ai] ;?><br>
														Premiere pro : <?php echo $result[pr] ;?><br>
														Lightroom : <?php echo $result[lr] ;?><br>
														<b>ทักษะทาง GIS</b><br>
														Arcgis : <?php echo $result[arcgis] ;?><br>
														Erdes : <?php echo $result[erdas] ;?><br>
														Envi : <?php echo $result[envi] ;?><br>
														QGIS : <?php echo $result[qgis] ;?><br>


													</p>
												</div>
											</div>
									</div>
							</div>
						</div>
								
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