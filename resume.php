<!DOCTYPE html>
<?php 
	session_start();
	include 'config.php';
	
  
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
	  $sex = $_POST['sex'];
	  $year_birth = $_POST['year_birth'];
	  $phone_number = $_POST['phone_number'];
	  $province = $_POST['province'];
	  $university = $_POST['university'];
	  $facutly = $_POST['facutly'];
	  $major = $_POST['major'];
	  $level_degree = $_POST['level_degree'];
	  $year_success = $_POST['year_success'];
	  $status_work = $_POST['status_work'];
	  $work_name = $_POST['work_name'];
	  $work_company = $_POST['work_company'];
	  $work_type = $_POST['work_type'];
	  $work_type_detail = $_POST['work_type_detail'];
	  $work_detail = $_POST['work_detail'];
	  $work_join = $_POST['work_join'];
	  $work_skill = $_POST['work_skill'];
	  $work_skill_detail = $_POST['work_skill_detail'];
	  $work_complace = $_POST['work_complace'];
	  $work_complace_detail = $_POST['work_complace_detail'];
	  $work_uncomplace = $_POST['work_uncomplace'];
	  $work_uncomplace_detail = $_POST['work_uncomplace_detail'];
	  $free_cause = $_POST['free_cause'];
	  $free_issue = $_POST['free_issue'];
	  $free_issue_detail = $_POST['free_issue_detail'];
	  $free_important = $_POST['free_important'];
	  $free_important_detail = $_POST['free_important_detail'];
	  $free_work_need = $_POST['free_work_need'];
	  $free_influence = $_POST['free_influence'];
	  $study_major = $_POST['study_major'];
	  $study_faculty = $_POST['study_faculty'];
	  $study_university = $_POST['study_university'];
	  $email = $_POST['email'];
	  $password = $_POST['password'];


	  $sql1 = "select * from student  where email = '$email'   ; ";
	  $query = pg_query($sql1);
	  $num = pg_num_rows($query);
	  if ($num < 1){
	  $sql2 = "insert into student 
	  ( 
			title_name ,
			s_name ,
			l_name ,
			sex ,
			year_birth ,
			phone_number ,
			province ,
			university ,
			fuculty ,
			major ,
			level_degree ,
			year_success ,
			status_work ,
			work_name ,
			work_company ,
			work_type ,
			work_type_detail ,
			work_detail ,
			work_join ,
			work_skill ,
			work_skill_detail ,
			work_complace ,
			work_uncomplace ,
			work_uncomplace_detail ,
			free_cause ,
			free_cause_detail ,
			free_issue ,
			free_issue_detail ,
			free_important ,
			free_important_detail ,
			free_work_need ,
			free_influence ,
			study_major ,
			study_faculty ,
			study_university ,
			email ,
			password ,
			img ,
			date_access ,
			status_user
	  )
	  values 
	  (
		'$title_name' ,
		'$s_name' ,
		'$l_name' ,
		'$sex' ,
		'$year_birth' ,
		'$phone_number' ,
		'$province' ,
		'$university' ,
		'$facutly' ,
		'$major' ,
		'$level_degree' ,
		'$year_success' ,
		'$status_work' ,
		'$work_name' ,
		'$work_company' ,
		'$work_type' ,
		'$work_type_detail' ,
		'$work_detail' ,
		'$work_join' ,
		'$work_skill' ,
		'$work_skill_detail' ,
		'$work_complace' ,
		'$work_uncomplace' ,
		'$work_uncomplace_detail' ,
		'$free_cause' ,
		'$free_cause_detail' ,
		'$free_issue' ,
		'$free_issue_detail' ,
		'$free_important' ,
		'$free_important_detail' ,
		'$free_work_need' ,
		'$free_influence' ,
		'$study_major' ,
		'$study_faculty' ,
		'$study_university' ,
		'$email' ,
		'$password' ,
		'user.png' ,
		'$date' ,
		'รอยืนยัน'

	  );"; 

	  require 'scripts/phpmailer/PHPMailerAutoload.php';

		header('Content-Type: /html; charset=utf-8');

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
		$email_receiver = $email; // เมล์ผู้รับ ***

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
		        <img src='http://localhost:8888/GEOJOBS/images/6logo.png' style='width: 120px;'>
		        <div style='-align:center'> 
		           <p>ขอบคุณที่ร่วมเป็นครอบครัวเดียวกับเรา </p><br>
		           <p><a href='http://localhost:8888/GEOJOBS/checkmail.php?email=$email&type=submit_mail' >กดที่นี่ เพื่อยืนยันการสมัคร</a>   </p>
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
		        <div style='-align:center'> 
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

				// กรณีส่ง email ไม่สำเร็จ
				echo "<h3 class='-center'>ระบบมีปัญหา กรุณาลองใหม่อีกครั้ง</h3>";
				//echo $mail->ErrorInfo; // ข้อความ รายละเอียดการ error
			}else{
				// กรณีส่ง email สำเร็จ
				echo "ระบบได้ส่งข้อความไปเรียบร้อย";
			}	
		}

	  $result = pg_query($db,$sql2);

		  if($result){ 


		  $message = '<div class="alert alert-success alert-dismissible">
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								<strong>Success!</strong> ลงทะเบียนเสร็จสิ้นแล้ว
							  </div>';
			//header('Location:checklogin.php?user_email='.$email.'&user_password='.$telephone.'&login=Login');


			setcookie("email", $email , time() + 3600);
			header('Location: checkmail.php');
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
<style type="text/css">
 
 #div1,
 #div2,
 #div3,
 #work_type,
 #work_skill,
 #work_uncomplace,
 #free_cause,
 #free_issue,
 #free_important

 {
 display: none
 }
  
 </style>  

	</head>

	<body class="skin-blue">

		<?php include 'header.php'; ?>


		<section class="login first grey">
			<div class="container">
				<div class="">				
					<div class="">
					<?php echo $sql2; ?>
						<div class="box-body">
							<h4>ลงทะเบียนเข้าใช้งาน</h4>
							<small>* กรุณากรอกข้อมูลให้ครบถ้วน</small>
			<hr>


<form class="form-validate form-horizontal" id="feedback_form" method="post"  id="frmMyform" action="register.php" enctype="multipart/form-data">
	<h6><p>ข้อมูลส่วนตัว</p></h6>
	<hr>
	<div class="col-md-12">
		<div class="col-md-6">
								<div class="form-group">
									<label>ชื่อ - นามสกุล</label>
									<input type="text" name="title_name" class="form-control" required="">
								</div>
			
		</div>
		<div class="col-md-3">
								<div class="form-group">
									<label>สัญชาติ</label>
									<select name="" class="form-control" required="">
										<option value="">กรุณาเลือก</option>
										<option value="ไทย">ไทย</option>
										<option value=""></option>
									</select>
								</div>
			
		</div>
		<div class="col-md-3">
								<div class="form-group">
									<label>ศาสนา</label>
									<select name="" class="form-control" required="">
										<option value="">กรุณาเลือก</option>
										<option value="พุทธ">พุทธ</option>
										<option value="คลิสต์">คลิสต์</option>
										<option value="อิสลาม">อิสลาม</option>
									</select>
								</div>
			
		</div>
		
	</div>

	<div class="col-md-12">
			<div class="col-md-3">
								<div class="form-group">
									<label>วันเกิด</label>
									<select name="" class="form-control" required="">
											<option value="">กรุณาเลือก</option>
									</select>
								</div>
			</div>
			<div class="col-md-3">
								<div class="form-group">
									<label>น้ำหนัก</label>
									<input type="number" name="" class="form-control" required="">
								</div>
				
			</div>
			<div class="col-md-3">
								<div class="form-group">
									<label>ส่วนสูง</label>
									<input type="number" name="" class="form-control" required="">
								</div>
				
			</div>
			<div class="col-md-3">
								<div class="form-group">
									<label>สถานภาพทางทหาร</label>
									<input type="number" name="" class="form-control" required="">
								</div>
				
			</div>
	</div>

	<div class="col-md-12">
			<div class="col-md-12">
								<div class="form-group">
									<label>ที่อยู่</label>
									<input type="text" name="" class="form-control" required="">
								</div>
				
			</div>
	</div>

	<div class="col-md-12">
			<div class="col-md-6">
								<div class="form-group">
									<label>E-mail</label>
									<input type="email" name="" class="form-control" required="">
								</div>
			</div>
			<div class="col-md-6">
								<div class="form-group">
									<label>เบอร์โทร</label>
									<input type="number" name="" class="form-control" required="">
								</div>
				
			</div>
	</div>

	<h6><p>การศึกษา</p></h6>
	<hr>
	<div class="col-md-12">
			<div class="col-md-4">
								<div class="form-group">
									<label>ชื่อมหาวิทยาลัย</label>
									<input type="text" name="" class="form-control" required="">
								</div>
			</div>
			<div class="col-md-4">
								<div class="form-group">
									<label>คณะ</label>
									<input type="text" name="" class="form-control" required="">
								</div>
				
			</div>
			<div class="col-md-4">
								<div class="form-group">
									<label>สาขาวิชา</label>
									<input type="text" name="" class="form-control" required="">
								</div>
				
			</div>			
	</div>

	<div class="col-md-12">
			<div class="col-md-4">
								<div class="form-group">
									<label>ระดับการศึกษา</label>
									<input type="text" name="" class="form-control" required="">
								</div>
			</div>
			<div class="col-md-4">
								<div class="form-group">
									<label>วุฒการศึกษา</label>
									<input type="text" name="" class="form-control" required="">
								</div>
				
			</div>
			<div class="col-md-4">
								<div class="form-group">
									<label>ปีที่สำเร็จการศึกาา</label>
									<input type="text" name="" class="form-control" required="">
								</div>
				
			</div>			
	</div>

	<h6><p>เป้าหมายในการทำงาน/สหิจศึกษา/ฝึกงาน</p></h6>
	<hr>
	<div class="col-md-12">
			<div class="col-md-4">
								<div class="form-group">
									<label>ลักษณะงาน</label>
									<select name="" class="form-control" required="">
										<option value="">กรุณาเลือก</option>
										<option value="ประจำ">ประจำ</option>
										<option value="รายวัน">รายวัน</option>
										<option value="รายชั่วโมง">รายชั่วโมง</option>
										<option value="สหิจศึกษา/ฝึกงาน">สหกิจศึกษา/ฝึกงาน</option>
									</select>
								</div>
			</div>
			<div class="col-md-4">
								<div class="form-group">
									<label>วุฒการศึกษา</label>
									<input type="text" name="" class="form-control" required="">
								</div>
				
			</div>
			<div class="col-md-4">
								<div class="form-group">
									<label>ปีที่สำเร็จการศึกาา</label>
									<input type="text" name="" class="form-control" required="">
								</div>
				
			</div>			
	</div>

		<h6><p>ทักษะและภาษา</p></h6>
		<hr>
		<b><p>ภาษาไทย</p></b>
	<div class="col-md-12">
			<div class="col-md-4">
								<div class="form-group">
									<label>พูด</label>
									<select name="" class="form-control" required="">
										<option value="">กรุณาเลือก</option>
										<option value="ดีมาก">ดีมาก</option>
										<option value="ดี">ดี</option>
										<option value="ปานกลาง">ปานกลาง</option>
										<option value="พอใช้">พอใช้</option>
									</select>
								</div>
			</div>
			<div class="col-md-4">
								<div class="form-group">
									<label>อ่าน</label>
									<select name="" class="form-control" required="">
										<option value="">กรุณาเลือก</option>
										<option value="ดีมาก">ดีมาก</option>
										<option value="ดี">ดี</option>
										<option value="ปานกลาง">ปานกลาง</option>
										<option value="พอใช้">พอใช้</option>
									</select>
								</div>
				
			</div>
			<div class="col-md-4">
								<div class="form-group">
									<label>เขียน</label>
									<select name="" class="form-control" required="">
										<option value="">กรุณาเลือก</option>
										<option value="ดีมาก">ดีมาก</option>
										<option value="ดี">ดี</option>
										<option value="ปานกลาง">ปานกลาง</option>
										<option value="พอใช้">พอใช้</option>
									</select>
								</div>
				
			</div>			
	</div>

		<b><p>ภาษาอังกฤษ</p></b>
	<div class="col-md-12">
			<div class="col-md-4">
								<div class="form-group">
									<label>พูด</label>
									<select name="" class="form-control" required="">
										<option value="">กรุณาเลือก</option>
										<option value="ดีมาก">ดีมาก</option>
										<option value="ดี">ดี</option>
										<option value="ปานกลาง">ปานกลาง</option>
										<option value="พอใช้">พอใช้</option>
									</select>
								</div>
			</div>
			<div class="col-md-4">
								<div class="form-group">
									<label>อ่าน</label>
									<select name="" class="form-control" required="">
										<option value="">กรุณาเลือก</option>
										<option value="ดีมาก">ดีมาก</option>
										<option value="ดี">ดี</option>
										<option value="ปานกลาง">ปานกลาง</option>
										<option value="พอใช้">พอใช้</option>
									</select>
								</div>
				
			</div>
			<div class="col-md-4">
								<div class="form-group">
									<label>เขียน</label>
									<select name="" class="form-control" required="">
										<option value="">กรุณาเลือก</option>
										<option value="ดีมาก">ดีมาก</option>
										<option value="ดี">ดี</option>
										<option value="ปานกลาง">ปานกลาง</option>
										<option value="พอใช้">พอใช้</option>
									</select>
								</div>
				
			</div>			
	</div>

			<b><p>ภาษาจีน</p></b>
	<div class="col-md-12">
			<div class="col-md-4">
								<div class="form-group">
									<label>พูด</label>
									<select name="" class="form-control" required="">
										<option value="">กรุณาเลือก</option>
										<option value="ดีมาก">ดีมาก</option>
										<option value="ดี">ดี</option>
										<option value="ปานกลาง">ปานกลาง</option>
										<option value="พอใช้">พอใช้</option>
									</select>
								</div>
			</div>
			<div class="col-md-4">
								<div class="form-group">
									<label>อ่าน</label>
									<select name="" class="form-control" required="">
										<option value="">กรุณาเลือก</option>
										<option value="ดีมาก">ดีมาก</option>
										<option value="ดี">ดี</option>
										<option value="ปานกลาง">ปานกลาง</option>
										<option value="พอใช้">พอใช้</option>
									</select>
								</div>
				
			</div>
			<div class="col-md-4">
								<div class="form-group">
									<label>เขียน</label>
									<select name="" class="form-control" required="">
										<option value="">กรุณาเลือก</option>
										<option value="ดีมาก">ดีมาก</option>
										<option value="ดี">ดี</option>
										<option value="ปานกลาง">ปานกลาง</option>
										<option value="พอใช้">พอใช้</option>
									</select>
								</div>
				
			</div>			
	</div>

			<h6><p>ทักษะด้านคอมพิวเตอร์</p></h6>
			<hr>
			<b><p>Microsoft office</p></b>
	<div class="col-md-12">
			<div class="col-md-4">
								<div class="form-group">
									<label>Word</label>
									<select name="" class="form-control" required="">
										<option value="">กรุณาเลือก</option>
										<option value="ดีมาก">ดีมาก</option>
										<option value="ดี">ดี</option>
										<option value="ปานกลาง">ปานกลาง</option>
										<option value="พอใช้">พอใช้</option>
									</select>
								</div>
			</div>
			<div class="col-md-4">
								<div class="form-group">
									<label>Excel</label>
									<select name="" class="form-control" required="">
										<option value="">กรุณาเลือก</option>
										<option value="ดีมาก">ดีมาก</option>
										<option value="ดี">ดี</option>
										<option value="ปานกลาง">ปานกลาง</option>
										<option value="พอใช้">พอใช้</option>
									</select>
								</div>
				
			</div>
			<div class="col-md-4">
								<div class="form-group">
									<label>powerpoint</label>
									<select name="" class="form-control" required="">
										<option value="">กรุณาเลือก</option>
										<option value="ดีมาก">ดีมาก</option>
										<option value="ดี">ดี</option>
										<option value="ปานกลาง">ปานกลาง</option>
										<option value="พอใช้">พอใช้</option>
									</select>
								</div>
				
			</div>			
	</div>

			<b><p>Adobe</p></b>
	<div class="col-md-12">
			<div class="col-md-3">
								<div class="form-group">
									<label>Photoshop</label>
									<select name="" class="form-control" required="">
										<option value="">กรุณาเลือก</option>
										<option value="ดีมาก">ดีมาก</option>
										<option value="ดี">ดี</option>
										<option value="ปานกลาง">ปานกลาง</option>
										<option value="พอใช้">พอใช้</option>
									</select>
								</div>
			</div>
			<div class="col-md-3">
								<div class="form-group">
									<label>Illustrator</label>
									<select name="" class="form-control" required="">
										<option value="">กรุณาเลือก</option>
										<option value="ดีมาก">ดีมาก</option>
										<option value="ดี">ดี</option>
										<option value="ปานกลาง">ปานกลาง</option>
										<option value="พอใช้">พอใช้</option>
									</select>
								</div>
				
			</div>
			<div class="col-md-3">
								<div class="form-group">
									<label>premiere pro</label>
									<select name="" class="form-control" required="">
										<option value="">กรุณาเลือก</option>
										<option value="ดีมาก">ดีมาก</option>
										<option value="ดี">ดี</option>
										<option value="ปานกลาง">ปานกลาง</option>
										<option value="พอใช้">พอใช้</option>
									</select>
								</div>
				
			</div>
			<div class="col-md-3">
								<div class="form-group">
									<label>lightroom</label>
									<select name="" class="form-control" required="">
										<option value="">กรุณาเลือก</option>
										<option value="ดีมาก">ดีมาก</option>
										<option value="ดี">ดี</option>
										<option value="ปานกลาง">ปานกลาง</option>
										<option value="พอใช้">พอใช้</option>
									</select>
								</div>
				
			</div>				
	</div>

				<b><p>โปรแกรมทางด้าน GIS</p></b>
	<div class="col-md-12">
			<div class="col-md-2">
								<div class="form-group">
									<label>ArcGIS</label>
									<select name="" class="form-control" required="">
										<option value="">กรุณาเลือก</option>
										<option value="ดีมาก">ดีมาก</option>
										<option value="ดี">ดี</option>
										<option value="ปานกลาง">ปานกลาง</option>
										<option value="พอใช้">พอใช้</option>
									</select>
								</div>
			</div>
			<div class="col-md-2">
								<div class="form-group">
									<label>ERDAS</label>
									<select name="" class="form-control" required="">
										<option value="">กรุณาเลือก</option>
										<option value="ดีมาก">ดีมาก</option>
										<option value="ดี">ดี</option>
										<option value="ปานกลาง">ปานกลาง</option>
										<option value="พอใช้">พอใช้</option>
									</select>
								</div>
				
			</div>
			<div class="col-md-2">
								<div class="form-group">
									<label>ENVI</label>
									<select name="" class="form-control" required="">
										<option value="">กรุณาเลือก</option>
										<option value="ดีมาก">ดีมาก</option>
										<option value="ดี">ดี</option>
										<option value="ปานกลาง">ปานกลาง</option>
										<option value="พอใช้">พอใช้</option>
									</select>
								</div>
				
			</div>	
			<div class="col-md-2">
								<div class="form-group">
									<label>QGIS</label>
									<select name="" class="form-control" required="">
										<option value="">กรุณาเลือก</option>
										<option value="ดีมาก">ดีมาก</option>
										<option value="ดี">ดี</option>
										<option value="ปานกลาง">ปานกลาง</option>
										<option value="พอใช้">พอใช้</option>
									</select>
								</div>
				
			</div>	
			<div class="col-md-4">
								<div class="form-group">
									<label>โปรแกรมอื่น ๆ</label>
									<input type="text" name="" class="form-control" required="">
								</div>
				
			</div>	
	</div>



		<div class="col-md-12">
								<div class="form-group text-right">
									<button type="submit" name="submit_form" class="btn btn-primary btn-block">ลงทะเบียนเข้าใช้งาน</button>
								</div>
								<div class="form-group text-center">
									<span class="text-muted">ถ้าท่านเคยลงทะเบียนแล้ว กรุณา</span><a href="login.php">เข้าระบบ</a>
								</div>
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
		<script src="app.js" type="text/javascript" charset="utf-8" async defer></script>
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

		<script type="text/javascript">
			$('#password, #confirm_password').on('keyup', function () {
			  if ($('#password').val() == $('#confirm_password').val()) {
			    $('#message').html('Matching').css('color', 'green');
			  } else 
			    $('#message').html('Not Matching').css('color', 'red');
			});
		</script>
	</body>
</html>