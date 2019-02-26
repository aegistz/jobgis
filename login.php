<!DOCTYPE html>
<?php
session_start();

include("config.php");

if(isset($_COOKIE["type"]))
{
 header("location:index.php");
}

$message = '';


if(isset($_POST["login"]))
{
    $user_email = $_POST["user_email"];
   if(empty($_POST["user_email"]) || empty($_POST["user_password"]))
   {
      $message = "<div class='alert alert-danger'>Both Fields are required</div>";
   }
   else
   {
      $query = "SELECT * FROM user_job WHERE email = '$user_email'  ; ";
      $statement = pg_query($query);
      $arr = pg_fetch_array($statement);

      
      $count = pg_num_rows($statement);

      if($count > 0)
      {

          if(  $_POST["user_password"] ==  $arr["password"] )
          {
         
               setcookie("type", $arr["email"] , time() + 3400);
               setcookie("pass", $arr["password"] , time() + 3400);
            //    header('Location:..'.$_SESSION['redirectURL']);
               header('Location:./');
               exit;

          }
          else
          {
           $message = '<div class="alert alert-danger">Wrong Password</div>';
          }

      }
      else
      {
        $message = "<div class='alert alert-danger'>Wrong Email Address</div>";
      }
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
						<div class="box-body">
							<h4>เข้าสู่ระบบ</h4>
<form name="login" method="post" action="login.php">
<span><?php echo $message; ?></span>
								<div class="form-group">
									<label>email</label>
									<input type="text"  name="user_email"  class="form-control">
								</div>
								<div class="form-group">
									<label class="fw">Password
										<a href="forgot.html" class="pull-right">Forgot Password?</a>
									</label>
									<input type="password" name="user_password" class="form-control">
								</div>
								<div class="form-group text-right">
									<button class="btn btn-primary btn-block" type="submit" name="login">Login</button>
								</div>
								<div class="form-group text-center">
									<span class="text-muted">Don't have an account?</span> <a href="register.php">Create one</a>
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