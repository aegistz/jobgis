<!DOCTYPE html>
<?php
session_start();
include("config.php");
include("check_student.php");

	$sql = pg_query("SELECT * from job_company a inner join company b on a.id_com = b.id_com where id_job = '$_GET[q]' ;");
	$result = pg_fetch_array($sql);



if ($_POST[send_request] == 'true') {

	$sql = pg_query("INSERT INTO user_request (id_job , email_user , date_access , request) 
		values ( '$result[id_job]', '$user[email]' , '$date' , 'รอการยืนยัน');");


		if ($sql) {
			$mes = 'yessss';
		}else{
			$mes = 'no';
		}

}


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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

		<link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">

	</head>

	<body class="skin-blue">

		<?php include 'header.php'; ?>

		<section class="single">
			<div class="container">
				<div class="row">
					<div class="col-md-4 sidebar" id="sidebar">
						<aside>
							<h1 class="aside-title">งานที่คุณสมัคร</h1>
							<div class="aside-body">

<article class="article main-article">
							<header>
								<img src="images/img_job/<?php echo $result[logo_img]; ?>" width="20%" alt="">
								<h2><?php echo $result[name_job]; ?></h2>
								<ul class="details">
									<li>Posted on <?php echo $result[date_job]; ?></li>
									<li><a><?php echo $result[type_job]; ?></a></li>
									<li>By <a href="#"><?php echo $result[name_com]; ?></a></li>
								</ul>
							</header>
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
										<img src="images/img_job/<?php echo $result[img]; ?>">
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

<div class="line">
							<div>สถานประกอบการ</div>
						</div>

						<div class="author">
							<figure>
								<img src="images/img_job/<?php echo $result[logo_img]; ?>">
							</figure>
							<div class="details">
								<div class="job">สถานประกอบการ</div>
								<h5 class="name"><?php echo $result[name_com]; ?></h5>
								<p>พนักงานประจำ/นักศึกษาฝึกงาน/สหกิจศึกษา</p>
							</div>
						</div>


							</div>
						</aside>
						
					</div>





					<div class="col-md-8">

						<p><?php echo $mes ; ?></p>
						<div class="row">
						<h3><label>Resume ของคุณ 
							<a href="resume.php" class="btn btn-primary btn-sm " title=""><i class="icon ion-settings"></i>  แก้ไข</a>
							
						</label></h3>
						<div class="page-description">
							<div class="row">
									<div class="col-md-6 col-sm-6">
										<div class="col-md-7">
											<div class="form-group">
										<p>
											นาย ขจรเกียรติ เจริญสุข<br>
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
							<div class="row">

								<form  method="post" accept-charset="utf-8">
<button type="submit" name="send_request" value="true" class="btn btn-primary btn-block">ยืนยันการส่ง Resume ไปยังสถานประกอบการนี้</button>
									
								</form>
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