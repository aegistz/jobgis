<!DOCTYPE html>
<?php 
	include 'config.php';
	session_start();

  
  date_default_timezone_set('Asia/Bangkok');

  $date_time = date("d/m/Y H:i:s");
  $date = date("Y/m/d");

  $message = '';

  if( isset($_POST["submit_form"]) ){

	  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		  if($check !== false) {
			  $data = base64_encode(file_get_contents( $_FILES["fileToUpload"]["tmp_name"] ));
			  $img  =  "data:".$check["mime"].";base64,".$data;
		  }else{
			$img = '';
		  }   

	  $title_name = $_POST['title_name'];
	  $s_name = $_POST['s_name'];
	  $l_name = $_POST['l_name'];
	  $university = $_POST['university'];
	  $success_degree = $_POST['success_degree'];
	  $facutly = $_POST['facutly'];
	  $major = $_POST['major'];
	  $qualification = $_POST['qualification'];
	  $year_start = $_POST['year_start'];
	  $year_end = $_POST['year_end'];
	  $phone_number = $_POST['phone_number'];
	  $email = $_POST['email'];
	  $password = $_POST['password'];


	  $sql1 = "select * from user_job  where email = '$email'   ; ";
	  $query = pg_query($sql1);
	  $num = pg_num_rows($query);
	  if ($num < 1){
	  $sql2 = "insert into user_job 
	  ( 
		title_name , 
		s_name , 
		l_name , 
		university , 
		success_degree , 
		facutly , 
		major , 
		qualification , 
		year_start , 
		year_end , 
		phone_number , 
		email , 
		password ,
		date_access,
		status_user
	  )
	  values 
	  (
		'$title_name' ,
		'$s_name' ,
		'$l_name' ,
		'$university' ,
		'$success_degree' ,
		'$facutly' ,
		'$major' ,
		'$qualification' ,
		'$year_start' ,
		'$year_end' ,
		'$phone_number' ,
		'$email' ,
		'$password' ,
		'$date',
		'รอการยืนยัน'

	  );"; 

	  $result = pg_query($db,$sql2);

		  if($result){ 


		  $message = '<div class="alert alert-success alert-dismissible">
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								<strong>Success!</strong> ลงทะเบียนเสร็จสิ้นแล้ว
							  </div>';
			//header('Location:checklogin.php?user_email='.$email.'&user_password='.$telephone.'&login=Login');
			header('Location:./');
				  exit;

		  }else{

			  $message = '<div class="alert alert-danger alert-dismissible">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  <strong>Warning!</strong> ไม่สามา่รถบันทึกข้อมูลได้ กรุณาลองอีกครั้ง
						 </div>';

		  }

	  }else{ 
			 $message = '<div class="alert alert-danger alert-dismissible">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										<strong>Warning!</strong> Email นี้ถูกใช้แล้วภายในระบบ กรุณาตรวจสอบอีกครั้ง หรือเข้าสู่ระบบ <a href="login.php" title="">ที่นี่</a> 
									  </div>';
	  }
}
	
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="description" content="JOBGIS GISTDA GISTNU JOB GIST GIS GEOINFOMETIC">
		<meta name="author" content="GISTNU by Teerayoot injun Teerayoot5056@gmail.com">
		<meta name="keyword" content="JOBGIS,GISTDA,GISTNU,JOB,GIST,GIS,GEOINFOMETIC">
		<!-- Shareable -->
		<meta property="og:title" content="JOBGIS GISTDA GISTNU JOB GIST GIS GEOINFOMETIC" />
		<meta property="og:type" content="article" />
		<meta property="og:url" content="http://github.com/nauvalazhar/Magz" />
		<meta property="og:image" content="images/gistda_logo.png" />
		<title>JOB GIS &mdash; GISTDA  </title>
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


		<section class="login first grey">
			<div class="container">
				<div class="box-wrapper">				
					<div class="box box-border">
					<?php echo $message; ?>
						<div class="box-body">
							<h4>ลงทะเบียนเข้าใช้งาน</h4>
							<small>* กรุณากรอกข้อมูลให้ครบถ้วน</small>
							<hr>
						


<form class="form-validate form-horizontal" id="feedback_form" method="post" action="register.php" enctype="multipart/form-data">

								<div class="form-group">
									<label>คำนำหน้า</label>
									<input type="text" name="title_name" class="form-control">
								</div>
								<div class="form-group">
									<label>ชื่อ</label>
									<input type="text" name="s_name" class="form-control">
								</div>
								<div class="form-group">
									<label>นามสกุล</label>
									<input type="text" name="l_name" class="form-control">
								</div>
								<div class="form-group">
									<label>ชื่อมหาวิทยาลัย</label>
									<input type="text" name="university" class="form-control">
								</div>
								<div class="form-group">
									<label>ระดับ</label>
									<input type="text" name="success_degree" class="form-control">
								</div>
								<div class="form-group">
									<label>คณะ</label>
									<input type="text" name="facutly" class="form-control">
								</div>
								<div class="form-group">
									<label>สาขา</label>
									<input type="text" name="major" class="form-control">
								</div>
								<div class="form-group">
									<label>วุฒิที่สำเร็จการศึกษา</label>
									<input type="text" name="qualification" class="form-control">
								</div>
								<div class="form-group">
									<label>ปีที่เริ่มเข้าศึกษา</label>
									<input type="number" name="year_start" class="form-control">
								</div>
								<div class="form-group">
									<label>ปีที่จบการศึกษา</label>
									<input type="number" name="year_end" class="form-control">
								</div>
								<div class="form-group">
									<label>เบอร์โทรศัพท์</label>
									<input type="text" name="phone_number" class="form-control">
								</div>

								<hr>

								<div class="form-group">
									<label>Email  (*ใช้ในการเข้าสู่ระบบ)</label>
									<input type="email" name="email" class="form-control">
								</div>


								<div class="form-group">
									<label class="fw">Password (*ใช้ในการเข้าสู่ระบบ)</label>
									<input type="password" name="password" class="form-control">
								</div>


								<div class="form-group text-right">
									<button type="submit" name="submit_form" class="btn btn-primary btn-block">Register</button>
								</div>
								<div class="form-group text-center">
									<span class="text-muted">Already have an account?</span> <a href="login.php">Login</a>
								</div>
</form>


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