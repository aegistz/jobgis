<!DOCTYPE html>
<?php
session_start();

include("config.php");

if(isset($_COOKIE["type"]))
{
 header("location:index.php");
}

$message = '';


if(isset($_POST["forgot"]))
{
    $user_email = $_POST["user_email"];
   if(empty($_POST["user_email"]))
   {
      $message = "<div class='alert alert-danger'>Both Fields are required</div>";
   }
   else
   {
      $query = "SELECT * FROM user_job WHERE email = '$user_email'  ; ";
      $statement = pg_query($query);
      $arr = pg_fetch_array($statement);

      
      $count = pg_num_rows($statement);

     
      if($count > 0) {

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
		$email_receiver = 'kajornkiet2@gmail.com'; // เมล์ผู้รับ ***

		$subject = "การเปลี่ยนรหัสผ่าน"; // หัวข้อเมล์


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
		      <title>การเปลี่ยนรหัสผ่าน</title>
		    </head>
		    <body>
		      <div style='background: #214163;padding: 10px 0 20px 10px;margin-bottom:10px;font-size:30px;color:white;' >
		        <img src='images/6logo.png' style='width: 120px;'>
		        <div style='text-align:center'> 
		           <p>กดที่ลิงค์ เพื่อแก้ไขรหัสผ่าน</p><br>
		           <p>URL : ". $email_receiver  ."</p>
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
			$mail->msgHTML($email_content);
			header('Location:login.php');


			if (!$mail->send()) {  // สั่งให้ส่ง email

				// กรณีส่ง email ไม่สำเร็จ
				echo "<h3 class='text-center'>ระบบมีปัญหา กรุณาลองใหม่อีกครั้ง</h3>";
				//echo $mail->ErrorInfo; // ข้อความ รายละเอียดการ error
			}else{
				// กรณีส่ง email สำเร็จ
				echo "ระบบได้ส่งข้อความไปเรียบร้อย";
			}	
		}
        
      }else {

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
							<h4>ลืมรหัสผ่านเข้าระบบ</h4>
<form name="forgot" method="post" action="forgot.php">
<span><?php echo $message; ?></span>
								<div class="form-group">
									<label>กรอก email ที่ใช้สมัคร</label>
									<input type="text"  name="user_email"  class="form-control">
								</div>
								<div class="form-group text-right">
									<button class="btn btn-primary btn-block" type="submit" name="forgot">กดรีเซ็ตรหัสผ่านใหม่</button>
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