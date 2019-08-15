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

	</head>

	<body class="skin-blue">

		<?php include 'header.php'; ?>

		<section class="page">
			<div class="container">
				<div class="row">
					<div class="form-group">
						<figure class="featured-author-picture">
								<img src="https://image.flaticon.com/icons/png/512/149/149071.png" alt="Sample Article" style="width: 150px ">
						</figure>
					</div>
						<h3><label>Resume</label></h3>
						<hr>
						<div class="page-description">
							<div class="row">
									<div class="col-md-12">
		<div class="col-md-2">
								<div class="form-group">
									<label>คำนำหน้า</label>
									<input type="text" name="title_name" class="form-control" value="<?php echo $user[title_name] ;?>" >
								</div>
			
		</div>
		<div class="col-md-3">
								<div class="form-group">
									<label>ชื่อ</label>
									<input type="text" name="s_name" class="form-control"  value="<?php echo $user[s_name] ;?>">
								</div>
			
		</div>
		<div class="col-md-3">
								<div class="form-group">
									<label>นามสกุล</label>
									<input type="text" name="l_name" class="form-control"  value="<?php echo $user[l_name] ;?>">
									<a href="">แก้ไข</a>
								</div>
			
		</div>
		<div class="col-md-2">
								<div class="form-group">
									<label>สัญชาติ</label>
									<select name="nationality" class="form-control" >
										<option value="">กรุณาเลือก</option>
										<option value="ไทย">ไทย</option>
										<option value="อื่น ๆ">อื่น ๆ</option>
									</select>
								</div>
			
		</div>
		<div class="col-md-2">
								<div class="form-group">
									<label>ศาสนา</label>
									<select name="religion" class="form-control" >
										<option value="">กรุณาเลือก</option>
										<option value="พุทธ">พุทธ</option>
										<option value="คลิสต์">คลิสต์</option>
										<option value="อิสลาม">อิสลาม</option>
									</select>
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