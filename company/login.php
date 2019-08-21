<!DOCTYPE html>
<?php
session_start();

include("config.php");


$message = '';


if(isset($_POST["login"]))
{
	
   	$user_name = $_POST["user_name"];
	
	$salt = 'gistnu@geojobs'; 
	$password = sha1($_POST[user_password].$salt);

   if(empty($_POST["user_name"]) || empty($_POST["user_password"]))
   {
      $message = "<div class='alert alert-danger'>Both Fields are required</div>";
   }
   else
   {

			$sql = "SELECT * FROM company WHERE email_com = '$user_name'  ;";
	      	$quer_com = pg_query($sql);
	      	$arr = pg_fetch_array($quer_com);
			$count = pg_num_rows($quer_com);


			if ( $arr["status_company"] == 'รอการยืนยัน' ) {
				      	$message = '<div class="alert alert-danger">ท่านยังไม่ได้ยืนยัน Email กรุณายืนยัน Email ก่อนเข้าใช้งาน </div>';
		      }	 else if( $arr["status_company"] == 'ยืนยัน' ){
					      if($count > 0) {

					          if(  $password ==  $arr["password"] ) {
					               setcookie("type", $user_name , time() + 86399);
					               setcookie("pass", $arr["password"] , time() + 86399);
								   setcookie("status", 'company', time() + 86399);
					            //    header('Location:..'.$_SESSION['redirectURL']);
					               header('Location:./');
					               exit;

					          } else {
					           $message = '<div class="alert alert-danger">Wrong Password</div>';
					          }

					      }
					      else {
					        $message = "<div class='alert alert-danger'>Wrong Username</div>";
	      				  }
		      }    


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
		<meta property="og:image" content="../images/gistda_logo.png" />
		<title>GEOJOBS &mdash; GISTDA  </title>
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

		<section class="login first grey">
			<div class="container">
				<div class="box-wrapper">				
					<div class="box box-border">
						<div class="box-body">
							<h4>สำหรับสถานประกอบการ</h4>



<form name="login" method="post" action="login.php">
							<span><?php echo $message; ?></span>
								<div class="form-group">
									<label>Username</label>
									<input type="text"  name="user_name"  class="form-control">
								</div>
								<div class="form-group">
									<label class="fw">Password
										<a href="forgot.php" class="pull-right">Forgot Password?</a>
									</label>
									<input type="password" name="user_password" class="form-control">
								</div>
								<div class="form-group text-right">
									<button class="btn btn-primary btn-block" type="submit" name="login">Login</button>
								</div>
								<div class="form-group text-center">
									<span class="text-muted"> สำหรับสถานประกอบการใหม่ </span> <a href="../reg-company.php">ลงทะเบียนที่นี่</a>
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