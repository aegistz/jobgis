<!DOCTYPE html>
<?php
session_start();

include("config.php");

$email = $_GET[email];
$message = '';


if(!isset($_COOKIE["email"]))
{
 header("location:login.php");
}




if( $_GET[type] == 'submit_mail' )
{
	$email = $_GET[email];

	$sql = "UPDATE company set status_company = 'ยืนยัน' where email_com = '$email';  ";
	$query = pg_query($sql);

	
	$query2 = "SELECT * FROM company WHERE email_com = '$email'  ; ";
	$statement2 = pg_query($query2);
	$arr = pg_fetch_array($statement2);


	 	setcookie("type", $arr["email_com"] , time() + 86399);
		setcookie("pass", $arr["password"] , time() + 86399);
		setcookie("status_com", 'company', time() + 86399);
		header('Location:./company');
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


		$sender = "GEOJOBs"; // ชื่อผู้ส่ง
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
		      <title>การกดยืนยันการสมัค</title>
		    </head>
		    <body>
		      <div style='background: #214163;padding: 10px 0 20px 10px;margin-bottom:10px;font-size:30px;color:white;' >
		        <img src='http://www.geojobs.nu.ac.th/images/6logo.png' style='width: 120px;'>
		        <div style='text-align:center'> 
		           <p>ขอบคุณที่ร่วมเป็นครอบครัวเดียวกับเรา </p><br>
		           <p><a href='http://www.geojobs.nu.ac.th/checkcompany.php?email=".$_COOKIE[email]."&type=submit_mail' >กดที่นี่ เพื่อยืนยันการสมัคร</a>   </p>
		        </div>
		      </div>
		        <div>       
		          
		        </div>
		        <div style='margin-top:30px;'>
		          <hr>
		          <address>
		            <h4>ติดต่อสอบถาม</h4>
		            <p>กองถ่ายทอดเทคโนโลยี  มหาวิทยาลัยนเรศวร
		            ชั้น 4 ตึก A อาคารมหาธรรมราชา ตำบลท่าโพธิ์ 
		            อำเภอเมือง จังหวัดพิษณุโลก 65000
		            </p>
		            <p>www.facebook.com/Gistlnnu/</p>
		          </address>
		        </div>
		      </div>
		      <div style='background: #214163;color: #a2abb7;padding:30px;'>
		        <div style='text-align:center'> 
		           © กองถ่ายการทอดเทคโนโลยี มหาวิทยาลัยนเรศวร
		        </div>
		      </div>
		    </body>
		  </html>
		";

		//  ถ้ามี email ผู้รับ
		if($email_receiver){
			$mail->msgHTML($email_content);
			if (!$mail->send()) {  // สั่งให้ส่ง email
			}else{
			}	
		}

		header('Location:checkmail.php');
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


		<link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">

	</head>

	<body class="skin-blue">

		<?php include 'header.php'; ?>

		<section class="login first grey">
			<div class="container">
				<div class="box-wrapper">				
					<div class="box box-border">
						<div class="box-body">
							<h7>เราได้ส่งการยืนยันไปยังอีเมลถึงคุณที่ <?php echo $_COOKIE[email]; ?> โปรดตรวจสอบอีเมลของคุณ</h7>
<form method="post" action="checkcompany.php">
								<div class="form-group text-right">
									<br><a href="company/login.php" class="btn btn-primary btn-block" type="submit" name="status_user" value="ดำเนินการต่อ">กลับหน้า Login</a>
									<a href="checkcompany.php?type=resent">ส่งไปยังอีเมลอีกครั้ง</a>
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