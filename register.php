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

	 //  require 'scripts/phpmailer/PHPMailerAutoload.php';

		// header('Content-Type: text/html; charset=utf-8');

		// $mail = new PHPMailer;
		// $mail->CharSet = "utf-8";
		// $mail->isSMTP();
		// $mail->Host = 'smtp.gmail.com';
		// $mail->Port = 587;
		// $mail->SMTPSecure = 'tls';
		// $mail->SMTPAuth = true;


		// $gmail_username = "gistnu@gmail.com"; // gmail ที่ใช้ส่ง
		// $gmail_password = "gistnu2017nu"; // รหัสผ่าน gmail
		// // ตั้งค่าอนุญาตการใช้งานได้ที่นี่ https://myaccount.google.com/lesssecureapps?pli=1


		// $sender = "gistnu"; // ชื่อผู้ส่ง
		// $email_sender = "gistnu@NU.com"; // เมล์ผู้ส่ง 
		// $email_receiver = $email; // เมล์ผู้รับ ***

		// $subject = "การยืนยันการสมัค"; // หัวข้อเมล์


		// $mail->Username = $gmail_username;
		// $mail->Password = $gmail_password;
		// $mail->setFrom($email_sender, $sender);
		// $mail->addAddress($email_receiver);
		// $mail->Subject = $subject;

		// $email_content = "
		// 	<!DOCTYPE html>
		//   <html>
		//     <head>
		//       <meta charset=utf-8'/>
		//       <title>การกดยืนยันการสมัค</title>
		//     </head>
		//     <body>
		//       <div style='background: #214163;padding: 10px 0 20px 10px;margin-bottom:10px;font-size:30px;color:white;' >
		//         <img src='https://drive.google.com/open?id=1d2dbqiwRVm4W7JfLpdHx17PKVL4aY1PR' style='width: 120px;'>
		//         <div style='text-align:center'> 
		//            <p>กดที่ลิงค์ เพื่อเปลี่ยนพาสเวิร์ด</p><br>
		//            <p>URL : http://localhost:81/jobgis/checkmail.php?email=$email </p>
		//         </div>
		//       </div>
		//         <div>       
		          
		//         </div>
		//         <div style='margin-top:30px;'>
		//           <hr>
		//           <address>
		//             <h4>ติดต่อสอบถาม</h4>
		//             <p>กองถ่ายทอดเทคโนโลยีและนวัตกรรม
		//             มหาวิทยาลัยนเรศวร
		//             ชั้น 4 ตึก A อาคารมหาธรรมราชา ตำบลท่าโพธิ์ 
		//             อำเภอเมือง จังหวัดพิษณุโลก 65000
		//             </p>
		//             <p>www.facebook.com/Gistlnnu/</p>
		//           </address>
		//         </div>
		//       </div>
		//       <div style='background: #214163;color: #a2abb7;padding:30px;'>
		//         <div style='text-align:center'> 
		//            © กองถ่ายการทอดเทคโนโลยี มหาวิทยาลัยนเรศวร
		//         </div>
		//       </div>
		//     </body>
		//   </html>
		// ";

		// //  ถ้ามี email ผู้รับ
		// if($email_receiver){
		// 	$mail->msgHTML($email_content);


		// 	if (!$mail->send()) {  // สั่งให้ส่ง email

		// 		// กรณีส่ง email ไม่สำเร็จ
		// 		echo "<h3 class='text-center'>ระบบมีปัญหา กรุณาลองใหม่อีกครั้ง</h3>";
		// 		//echo $mail->ErrorInfo; // ข้อความ รายละเอียดการ error
		// 	}else{
		// 		// กรณีส่ง email สำเร็จ
		// 		echo "ระบบได้ส่งข้อความไปเรียบร้อย";
		// 	}	
		// }

	 //  $result = pg_query($db,$sql2);

		//   if($result){ 


		//   $message = '<div class="alert alert-success alert-dismissible">
		// 						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		// 						<strong>Success!</strong> ลงทะเบียนเสร็จสิ้นแล้ว
		// 					  </div>';
		// 	//header('Location:checklogin.php?user_email='.$email.'&user_password='.$telephone.'&login=Login');
		// 	header('Location: checkmail.php?email=$email&type=submit_mail');
		// 		  exit;

		//   }else{

		// 	  $message = '<div class="alert alert-danger alert-dismissible">
		// 				  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		// 				  <strong>Warning!</strong> ไม่สามา่รถบันทึกข้อมูลได้ กรุณาลองอีกครั้ง
		// 				 </div>';

		//   }

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
					<?php echo $sql2; ?>
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