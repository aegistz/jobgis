<!DOCTYPE html>
<html>
<?php 
	session_start();
	include 'config.php';

	   $email = $user['email'];

       $sql = "SELECT * FROM resume WHERE email = '$email'; ";
	   $query = pg_query($sql);
	   $resume = pg_fetch_array($query)
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
		<style>
		.circle{
	    height: auto;
	    width: auto;
	    border: 3px solid #fff; 
	    border-radius: 50%; 
	    box-shadow: 0 0 5px rgba(0, 0, 0, 0.2); 
		}
		</style>

	</head>

	<body class="skin-blue">

		<?php include 'header.php'; ?>

		<section class="page">
			<div class="container">
				<div class="row">
					<div class="featured-author-center">
						<figure class="featured-author-picture">
							<?php if($user[img] == ''){ ?>
							<img src="https://image.flaticon.com/icons/png/512/149/149071.png" alt="Sample Article" style="width: 150px ">
							<?php } else { ?>
							<img class="circle"  src="images/student/<?php echo $user[img]; ?>" alt="Sample Article" style="width: 150px ">
							<?php } ?>
						</figure>
					</div>
						<h3>
							<label>
								Resume <a href="resume-edit.php" class="btn btn-primary"><i class="icon ion-settings"></i>  แก้ไข</a>
							</label>
						</h3>
						<hr>
						<!-- <div class="line thin"></div> -->
						<div class="page-description">
							<div class="row">
									<div class="col-md-6 col-sm-6">
										<div class="col-md-7">
											<div class="form-group">
												<p>
													ชื่อ <?php echo $resume[title_name] ;?>&nbsp;<?php echo $resume[s_name] ;?>&nbsp;<?php echo $resume[l_name] ;?><br>
													โทรศัพท์มือถือ : <?php echo $resume[phone] ;?><br>
													E-mail : <?php echo $resume[email] ;?><br>
													ที่อยู่ : <?php echo $resume[address] ;?> ต.<?php echo $resume[tambon] ;?> อ.​<?php echo $resume[amphoe] ;?> จ.<?php echo $resume[province] ;?> <?php echo $resume[zip_code] ;?>

												</p>
												<p>
													<h5>การศึกษา</h5>
													มหาวิทยาลัย : <?php echo $resume[university] ;?> <br>
													วุฒิการศึกษา : <?php echo $resume[edu_back] ;?> <br>
													ระดับการศึกษา : <?php echo $resume[degree] ;?> <br>
													คณะ : <?php echo $resume[faculty] ;?> <br>
													สาขา : <?php echo $resume[sector] ;?> <br>
													GPA : <?php echo $resume[gpa] ;?> <br>
												</p>
												<p>
													<h5>การทำงาน/การฝึกงาน</h5>
													ชื่อบริษัท : <?php echo $resume[company] ;?> <br>
													ที่อยู่ติดต่อ : <?php echo $resume[address_com] ;?> <br>
													ตำแหน่ง : <?php echo $resume[rank_com] ;?> <br>
													หน้าที่รับผิดชอบ : <?php echo $resume[role_com] ;?> <br>
													เงินเดือน : <?php echo $resume[salary_com] ;?> <br>
													ตั้งแต่วันที่ : <?php echo $resume[date_start] ;?> <br>
													จนถึงวันที่ : <?php echo $resume[date_end] ;?><br>
												</p>
												<p>
													<h5>ประวัติการฝึกอบรม</h5>
													หน่วยงานที่ฝึกอบรม : <?php echo $resume[department] ;?><br>
													หลักสูตร : <?php echo $resume[course] ;?><br>
													ระยะเวลาที่ฝึกอบรม : <?php echo $resume[course_time] ;?> <br>

												</p>
												<p>
													<h5>เป้าหมายในการทำงาน/ฝึกงาน</h5>
													ลักษณะงานที่ต้องการ : <?php echo $resume[work_n] ;?> <br>
													สายงานที่ต้องการ <br>
													1. <?php echo $resume[work_1] ;?><br>
													2. <?php echo $resume[work_2] ;?><br>
													3. <?php echo $resume[work_3] ;?><br>
													พื้นที่ฝึกงานที่ต้องการ <br>
													1. <?php echo $resume[area_1] ;?><br>
													2. <?php echo $resume[area_2] ;?><br>
												</p>
											</div>
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
											<div class="col-md-7">
												<div class="form-group">
													
													<p>
														สัญชาติ : <?php echo $resume[nationality] ;?><br>
														ศาสนา : <?php echo $resume[religion] ;?><br>
														ส่วนสูง : <?php echo $resume[hight] ;?><br>
														วันเกิด : <?php echo $resume[birthday] ;?><br>
														สถานภาพทางทหาร : <?php echo $resume[status] ;?>
													</p>
													<p>
														<b>ทักษะทางภาษา</b> <br>
														ภาษาไทย <br>
														 	พูด : <?php echo $resume[th_s] ;?> <br>
														 	อ่าน : <?php echo $resume[th_r] ;?><br>
														 	เขียน : <?php echo $resume[th_w] ;?><br>
														ภาษาอังกฤษ <br>
														 	พูด : <?php echo $resume[en_s] ;?><br>
														 	อ่าน : <?php echo $resume[en_r] ;?><br>
														 	เขียน : <?php echo $resume[en_w] ;?><br>
														ภาษาจีน <br>
															พูด : <?php echo $resume[cn_s] ;?><br>
															อ่าน : <?php echo $resume[cn_r] ;?><br>
															เขียน : <?php echo $resume[cn_w] ;?><br>
														<b>ทักษะทางคอมพิวเตอร์ </b><br>
														Microsoft office <br>
														word : <?php echo $resume[word] ;?><br>
														excel : <?php echo $resume[excel] ;?><br>
														powerpoint : <?php echo $resume[ppt] ;?><br>
														<b>Adobe</b> <br>
														photoshop : <?php echo $resume[ps] ;?><br>
														Illustrator : <?php echo $resume[ai] ;?><br>
														Premiere pro : <?php echo $resume[pr] ;?><br>
														Lightroom : <?php echo $resume[lr] ;?><br>
														<b>ทักษะทาง GIS</b><br>
														Arcgis : <?php echo $resume[arcgis] ;?><br>
														Erdes : <?php echo $resume[erdas] ;?><br>
														Envi : <?php echo $resume[envi] ;?><br>
														QGIS : <?php echo $resume[qgis] ;?><br>


													</p>
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