<!DOCTYPE html>
<html>
<?php 
	session_start();
	include 'config.php';

       $sql = "select * FROM resume WHERE email = '$email'; ";
	   $query = pg_query($sql);
	   $user = pg_fetch_array($query)
?>
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

	</head>

	<body class="skin-blue">

		<?php include 'header.php'; ?>

		<section class="page">
			<div class="container">
				<div class="row">
						<h3><label>Resume</label></h3>
						<div class="line thin"></div>
						<div class="page-description">
							<div class="row">
									<div class="col-md-6 col-sm-6">
										<div class="col-md-7">
											<div class="form-group">
										<p>
											ชื่อ <?php echo $user[title_name] ;?>&nbsp;<?php echo $user[s_name] ;?>&nbsp;<?php echo $user[l_name] ;?><br>
											โทรศัพท์มือถือ : 085-XXXXXXX<br>
											E-mail : gistnu@gmail.com<br>
											ที่อยู่ : สถานภูมิภาคเทคโนโลยีอวกาศและภูมิสารสนเทศภาคเหนือตอนล่าง มหาวิทยาลัยนเรศวร (GISTNU)
												  ชั้น 3 อาคารเอกาทศรถ ต.ท่าโพธิ์ อ.​เมือง จ.พิษณุโลก​ 65000

										</p>
										<p>
											<h5>การศึกษา</h5>
											มหาวิทยาลัย : ฟาร์อีสเทอร์น <br>
											วุฒิการศึกษา : วท.บ <br>
											ระดับการศึกษา : ปริญญาตรี <br>
											คณะ : วิทยาศาสตร์และเทคโนโลยี <br>
											สาขา : ภูมิสารสนเทศ <br>
											GPA : 2.88 <br>
										</p>
										<p>
											<h5>การทำงาน/การฝึกงาน</h5>
											ชื่อบริษัท : GISTNU <br>
											ที่อยู่ติดต่อ : มหาวิทยาลัยนเรศวร <br>
											ตำแหน่ง : เจ้าหน้าที่/นักศึกษาฝึกงาน <br>
											หน้าที่รับผิดชอบ : ฝ่ายประสานงาน <br>
										</p>
										<p>
											<h5>ประวัติการฝึกอบรม</h5>
											หน่วยงานที่ฝึกอบรม : GISTNU<br>
											หลักสูตร : แผนที่แม่บท<br>
											ระยะเวลาที่ฝึกอบรม : 5 วัน <br>

										</p>
										<p>
											หน่วยงานที่ฝึกอบรม : GISTNU<br>
											หลักสูตร : WEBGIS<br>
											ระยะเวลาที่ฝึกอบรม : 4 วัน <br>
										</p>
										<p>
											หน่วยงานที่ฝึกอบรม : GISTNU<br>
											หลักสูตร : QGIS รุ่น 2<br>
											ระยะเวลาที่ฝึกอบรม : 3 วัน <br>
										</p>
											</div>
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
											<div class="col-md-7">
												<div class="form-group">
													<h4>ข้อมูลส่วนตัว</h4>
													<p>สัญชาติ : ไทย<br>
													ศาสนา : พุทธ<br>
													ส่วนสูง : 160<br>
													วันเกิด : 30/04/2538<br>
													สถานภาพทางทหาร : ยังไม่ผ่านการเกณฑ์ทหาร</p>
													<p>
														<h5>เป้าหมายในการทำงาน</h5>
														ลักษณะงานที่ต้องการ : ฝึกงาน <br>
														สายงานที่ต้องการ <br>
														1. ภูมิสารสนเทศ<br>
														2. โปรแกรมเมอร์<br>
														3. กราฟิกดีไซน์<br>
														พื้นที่ฝึกงานที่ต้องการ <br>
														1. กรุงเทพ<br>
														2. พิษณุโลก<br>
													</p>
													<p>
														<h5>ความสามารถ</h5>
														<b>ทักษะทางภาษา</b> <br>
														ภาษาไทย : พูด  อ่าน  เขียน <br>
														ภาษาอังกฤษ : พูด  อ่าน  เขียน <br>
														ภาษาจีน : พูด  อ่าน  เขียน <br>
														<b>ทักษะทางคอมพิวเตอร์ </b><br>
														Microsoft office <br>
														word : ดีมาก<br>
														excel : ดี<br>
														powerpoint : ดี<br>
														<b>Adobe</b> <br>
														photoshop : ปานกลาง<br>
														Illustrator : ปานกลาง<br>
														Premiere pro : พอใช้<br>
														Lightroom : ปานกลาง<br>
														<b>ทักษะทาง GIS</b><br>
														Arcgis : ดี<br>
														Erdes : ปานกลาง<br>
														Envi : ปานกลาง<br>
														QGIS : ดี<br>


													</p>
												</div>
											</div>
											<div class="col-md-5">
												<div class="form-group">
													<figure class="featured-author-picture">
															<img src="https://image.flaticon.com/icons/png/512/149/149071.png" alt="Sample Article" style="width: 150px ">
													</figure>
												</div>
											</div>
									</div>
							</div>
						</div>
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