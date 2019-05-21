<!DOCTYPE html>
<?php
session_start();

include("config.php");

$email = $_GET[email];
$message = '';


if(!isset( $_COOKIE["email"]) )
{
 header("location:login.php");
}




if( $_POST[new_password] == 'new' )
{
	$email = $_COOKIE["reset_pass"];

	$sql = "UPDATE student set password = '$_POST[password]' , status_user = 'ยืนยัน' where email = '$email';  ";
	$query = pg_query($sql);

	if ($query) {
		$query2 = "SELECT * FROM user_job WHERE email = '$email'  ; ";
		$statement2 = pg_query($query2);
		$arr = pg_fetch_array($statement2);

 		setcookie("type", $arr["email"] , time() + 86399);
		setcookie("pass", $arr["password"] , time() + 86399);
		header('Location:./');
		exit;
	}else{
		$message = 'ไม่สามารถแก้ไขได้';
	}
}


if( isset($_GET[ss])  )
{
	$email = $_GET[email];
	setcookie("reset_pass", $_GET[email] , time() + 3600);
	setcookie("email", $_GET[email] , time() + 3600);
	header('Location:reset_password.php');
	exit;
}


if ( isset($_GET[type]) == 'resent' ) 
{
	
	  require 'scripts/phpmailer/PHPMailerAutoload.php';

		header('Content-Type: text/html; charset=utf-8');

		$mail = new PHPMailer;
		$mail->CharSet = "utf-8";
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 587;
		$mail->SMTPSecure = 'tls';
		$mail->SMTPAuth = true;


		$gmail_username = "gistnu@gmail.com"; // gmail ที่ใช้ส่ง
		$gmail_password = "gistnu2017nu"; // รหัสผ่าน gmail
		// ตั้งค่าอนุญาตการใช้งานได้ที่นี่ https://myaccount.google.com/lesssecureapps?pli=1


		$sender = "gistnu"; // ชื่อผู้ส่ง
		$email_sender = "gistnu@NU.com"; // เมล์ผู้ส่ง 
		$email_receiver = $_COOKIE[email]; // เมล์ผู้รับ ***

		$subject = "การยืนยันการสมัคร GEOJOBS"; // หัวข้อเมล์


		$mail->Username = $gmail_username;
		$mail->Password = $gmail_password;
		$mail->setFrom($email_sender, $sender);
		$mail->addAddress($email_receiver);
		$mail->Subject = $subject;

		$email_content = "
			<!DOCTYPE html>
		  <html>
		    <head>
		      <meta charset=utf-8'/>
		      <title>reset รหัสผ่าน</title>
		    </head>
		    <body>
		      <div style='background: #214163;padding: 10px 0 20px 10px;margin-bottom:10px;font-size:30px;color:white;' >
		        <img src='images/6logo.png' style='width: 120px;'>
		        <div style='text-align:center'> 
		           <p>กดที่ลิงค์ เพื่อแก้ไขรหัสผ่าน</p><br>
		            <p><a href='http://www3.cgistln.nu.ac.th/GEOJOBS/reset_password.php?email=".$_COOKIE[email]."&ss=reset_password' >กดที่นี่</a>   </p>
		        </div>
		      </div>
		        <div>       
		          
		        </div>
		        <div style='margin-top:30px;'>
		          <hr>
		          <address>
		            <h4>ติดต่อสอบถาม</h4>
		            <p>กองถ่ายทอดเทคโนโลยีและนวัตกรรม
		            มหาวิทยาลัยนเรศวร
		            ชั้น 4 ตึก A อาคารมหาธรรมราชา ตำบลท่าโพธิ์ 
		            อำเภอเมือง จังหวัดพิษณุโลก 65000
		            </p>
		            <p>www.facebook.com/Gistlnnu/</p>
		          </address>
		        </div>
		      </div>
		      <div style='background: #3b434c;color: #a2abb7;padding:30px;'>
		        <div style='text-align:center'> 
		           © กองถ่ายการทอดเทคโนโลยี มหาวิทยาลัยนเรศวร
		        </div>
		      </div>
		    </body>
		  </html>
		";

		//  ถ้ามี email ผู้รับ
		if($email_receiver){
			setcookie("reset_pass", '' , time() - 3600);
			header('Location:reset_password.php');
			$mail->msgHTML($email_content);
			if (!$mail->send()) {  // สั่งให้ส่ง email
			}else{
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
		<meta property="og:url" content="http://github.com/nauvalazhar/Magz" />
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

		<section class="login first grey">
			<div class="container">
				<div class="box-wrapper">				
					<div class="box box-border">


<?php 
if ( !isset( $_COOKIE["reset_pass"]) )  {
?>
						<div class="box-body">
							<h7>เราได้ส่งการ Reset รหัสผ่านไปยังอีเมลถึงคุณที่ <?php echo $_COOKIE[email]; ?> โปรดตรวจสอบอีเมลของคุณ</h7>
<form method="post" action="reset_password.php">
								<div class="form-group text-right">
									<br><a href="login.php" class="btn btn-primary btn-block" type="submit" name="status_user" value="ดำเนินการต่อ">กลับหน้า Login</a>
									<a href="reset_password.php?type=resent">ส่งไปยังอีเมลอีกครั้ง</a>
								</div>
</form>
						</div>
<?php }else{ ?>

						<div class="box-body">
							<?php echo $message ; ?>
<form method="post" action="reset_password.php">
									<div class="form-group">
										<h7>reset รหัสผ่าน ของ <?php echo $_COOKIE["reset_pass"]; ?></h7>	 <br>
									<label>กรอกรหัสผ่านใหม่ของท่าน</label>
									<input type="password"  name="password"  class="form-control">
								</div>
								<div class="form-group text-right">
									<button class="btn btn-primary btn-block" type="submit" value="new" name="new_password">เปลี่ยนรหัสผ่านใหม่</button>
								</div>
</form>
						</div>

<?php } ?>
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