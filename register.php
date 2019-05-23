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
		        <img src='http://www3.cgistln.nu.ac.th/GEOJOBS/images/6logo.png' style='width: 120px;'>
		        <div style='-align:center'> 
		           <p>ขอบคุณที่ร่วมเป็นครอบครัวเดียวกับเรา </p><br>
		           <p><a href='http://www3.cgistln.nu.ac.th/GEOJOBS/checkmail.php?email=$email&type=submit_mail' >กดที่นี่ เพื่อยืนยันการสมัคร</a>   </p>
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
					<?php echo $message; ?>
						<div class="box-body">
							<h4>ลงทะเบียนเข้าใช้งาน</h4>
							<small>* กรุณากรอกข้อมูลให้ครบถ้วน</small>
			<hr>


<form class="form-validate form-horizontal" id="feedback_form" method="post"  id="frmMyform" action="register.php" enctype="multipart/form-data">
	<div class="col-md-12">
		<div class="col-md-2">
								<div class="form-group">
									<label>คำนำหน้า</label>
									<input type="text" name="title_name" class="form-control" required="">
								</div>
			
		</div>
		<div class="col-md-4">
								<div class="form-group">
									<label>ชื่อ</label>
									<input type="text" name="s_name" class="form-control" required="">
								</div>
			
		</div>
		<div class="col-md-4">
								<div class="form-group">
									<label>นามสกุล</label>
									<input type="text" name="l_name" class="form-control" required="">
								</div>
			
		</div>
		<div class="col-md-2">
								<div class="form-group">
									<label>เพศ</label>
									<select name="sex" class="form-control" required="">
										<option value="">กรุณาเลือก</option>
										<option value="ชาย">ชาย</option>
										<option value="หญิง">หญิง</option>
									</select>
								</div>
			
		</div>
		
	</div>

	<div class="col-md-12">
			<div class="col-md-4">
									<div class="form-group">
										<label>ปีเกิด</label>
										<select name="year_birth" class="form-control" required="">
												<option value="">กรุณาเลือก</option>
											<?php for ($i=0; $i < 100; $i++) {  ?>
												<option value="<?php echo 2562- $i ; ?>"><?php echo 2562- $i ; ?></option>
											<?php } ?>
										</select>
								</div>
			</div>
			<div class="col-md-4">
									<div class="form-group">
										<label>เบอร์โทรศัพท์</label>
										<input type="number" name="phone_number" class="form-control" required="">
								</div>
				
			</div>
			<div class="col-md-4">
									<div class="form-group">
										<label>จังหวัดที่อาศัยใมนปัจจุบัน</label>
										<select class="form-control" name="province" required="" >
										<option value="">กรุณาเลือก</option>
										<?php $sql_prov = pg_query("select pv_tn from tambon group by pv_tn order by pv_tn asc"); 
										while ($arr_prov = pg_fetch_array($sql_prov)) {
										?>
										<option value="<?php echo $arr_prov[pv_tn]; ?>"><?php echo $arr_prov[pv_tn]; ?></option>
										<?php } ?>
									</select>
								</div>
				
			</div>
	</div>

	<div class="col-md-12">
			<div class="col-md-4">
									<div class="form-group">
										<label>ชื่อมหาวิทยาลัย</label>
										<input type="text" name="university" class="form-control" required="">
									</div>
			</div>
			<div class="col-md-4">
									<div class="form-group">
										<label>คณะ</label>
										<input type="text" name="facutly" class="form-control" required="">
									</div>
			</div>
			<div class="col-md-4">
									<div class="form-group">
										<label>สาขา</label>
										<input type="text" name="major" class="form-control" required="">
									</div>
			</div>
	</div>

	<div class="col-md-12">
			<div class="col-md-4">
									<div class="form-group">
										<label>ระดับการศึกษา</label>
									<select name="level_degree" class="form-control" required="">
										<option value="">กรุณาเลือก</option>
										<option value="ปริญญาตรี">ปริญญาตรี</option>
										<option value="ปริญญาโท">ปริญญาโท</option>
										<option value="ปริญญาเอก">ปริญญาเอก</option>
									</select>
								</div>
			</div>
			<div class="col-md-4">
									<div class="form-group">
										<label>ปีที่สำเร็จการศึกษา</label>
										<select name="year_success" class="form-control">
												<option value="">กรุณาเลือก</option>
											<?php for ($i=0; $i < 30; $i++) {  ?>
												<option value="<?php echo 2562- $i ; ?>"><?php echo 2562- $i ; ?></option>
											<?php } ?>
										</select>
									</div>
				
			</div>
			<div class="col-md-4">
									<div class="form-group">
										<label>สถานภาพการทำงานปัจจุบัน</label>
									<select name="status_work" class="form-control" required=""  onchange="showHide(this)" >
										<option value="">กรุณาเลือก</option>
										<option value="ทำงานแล้ว" >ทำงานแล้ว</option>
										<option value="ยังไม่ได้ทำงาน">ยังไม่ได้ทำงาน</option>
										<option value="กำลังศึกษาต่อ">กำลังศึกษาต่อ</option>
									</select>
									</div>
				
			</div>
	</div>

	<div class="col-md-12">
	
		  <div id="div2">
		  	<h5>กรุณากรอกข้อมูลเพิ่มเติมสำหรับผู้ที่มีงานทำแล้ว</h5>
		  	<hr>
					<div class="col-md-12">
							<div class="col-md-6">
													<div class="form-group">
														<label>ชื่อตำแหน่งงาน</label>
														<input type="text" name="work_name" class="form-control">
												</div>
							</div>
							<div class="col-md-6">
													<div class="form-group">
														<label>หน่วยงาน</label>
														<input type="text" name="work_company" class="form-control">
													</div>
								
							</div>
						
					</div>

					<div class="col-md-12">
							<div class="col-md-6">
													<div class="form-group">
														<label>ประเภทงานที่ทำ</label>
														<select name="work_type" class="form-control"  onchange="showwork_type(this)">
															<option value="">กรุณาเลือก</option>
															<option value="ข้าราชการ/เจ้าหน้าที่ของรัฐ">ข้าราชการ/เจ้าหน้าที่ของรัฐ</option>
															<option value="รัฐวิสาหกิจ">รัฐวิสาหกิจ</option>
															<option value="พนักงานบริษัท/องค์กรธุรกิจเอกชน">พนักงานบริษัท/องค์กรธุรกิจเอกชน</option>
															<option value="ดำเนินธุรกิจอิสระ/เจ้าของกิจการ">ดำเนินธุรกิจอิสระ/เจ้าของกิจการ</option>
															<option value="พนักงานองค์กรต่างประเทศ/ธรุกิจต่างประเทศ">พนักงานองค์กรต่างประเทศ/ธรุกิจต่างประเทศ</option>
															<option value="อื่น ๆ">อื่น ๆ  
																<input id="work_type" type="text" class="form-control" name="work_type_detail" placeholder="กรุณากรอก">
															</option>
														</select>
												</div>
							</div>
							<div class="col-md-6">
													<div class="form-group">
														<label>ลักษณะงานที่ทำตรงกับสาขาที่ท่านได้สำเร็จการศึกษาหรือไม่</label>
														<select name="work_detail" class="form-control" >
															<option value="">กรุณาเลือก</option>
															<option value="ตรงสาขา">ตรงสาขา</option>
															<option value="ไม่ตรงสาขา">ไม่ตรงสาขา</option>
														</select>
													</div>
								
							</div>
					</div>


					<div class="col-md-12">
							<div class="col-md-6">
													<div class="form-group">
														<label>ท่านสามารถนำความรู้จากสาขาวิชาที่เรียนมาประยุกต์ใช้ในหน้าที่การงานที่ทำอยู่ขณะนี้เพียงใด</label>
														<select name="work_join" class="form-control" >
															<option value="">กรุณาเลือก</option>
															<option value="มากที่สุด">มากที่สุด</option>
															<option value="มาก">มาก</option>
															<option value="ปานกลาง">ปานกลาง</option>
															<option value="น้อย">น้อย</option>
														</select>
													</div>
								
							</div>
							<div class="col-md-6">
													<div class="form-group">
														<label>ท่านคิดว่าความรู้ความสารถพิเศษด้านใดที่ช่วยให้ท่านได้ทำงาน</label>
														<select name="work_skill" class="form-control" onchange="showwork_skill(this)" >
															<option value="">กรุณาเลือก</option>
															<option value="ด้านภาษาต่างประเทศ">ด้านภาษาต่างประเทศ</option>
															<option value="ด้านการใช้คอมพิวเตอร์">ด้านการใช้คอมพิวเตอร์</option>
															<option value="ด้านกิจกรรมสันทนาการ">ด้านกิจกรรมสันทนาการ</option>
															<option value="ด้านศิลปะ">ด้านศิลปะ</option>
															<option value="ด้านกีฬา">ด้านกีฬา</option>
															<option value="ด้านนาฏศิลป์/ดนตรีขับร้อง">ด้านนาฏศิลป์/ดนตรีขับร้อง</option>
															<option value="อื่น ๆ">อื่น ๆ  
																<input id="work_skill" type="text" class="form-control" name="work_skill_detail" placeholder="กรุณากรอก">
															</option>
														</select>
												</div>
							</div>
					</div>

					<div class="col-md-12">
							<div class="col-md-6">
													<div class="form-group">
														<label>ท่านมีความพึงพอใจต่องานที่ทำหรือไม่</label>
														<select name="work_complace" class="form-control" >
															<option value="">กรุณาเลือก</option>
															<option value="พอใจ">พอใจ</option>
															<option value="ไม่พอใจ">ไม่พอใจ</option>
														</select>
													</div>
								
							</div>
							<div class="col-md-6">
													<div class="form-group">
														<label>ถ้าไม่พอใจ โปรดระบุสาเหตุที่สำคัญที่สุด 1 ข้อต่อไปนี้	</label>
														<select name="work_uncomplace" class="form-control"  onchange="showwork_uncomplace(this)" >
															<option value="">กรุณาเลือก</option>
															<option value="ระบบภายในองค์กร">ระบบภายในองค์กร</option>
															<option value="มิตรภาพในองค์กร">มิตรภาพในองค์กร</option>
															<option value="ไม่ได้นำองค์ความรู้มาปรับใช้ในการทำงาน">ไม่ได้นำองค์ความรู้มาปรับใช้ในการทำงาน</option>
															<option value="ค่าตอบแทนต่ำ">ค่าตอบแทนต่ำ</option>
															<option value="ความมั่นคงก้าวหน้าในหน้าที่การงานมีน้อย">ความมั่นคงก้าวหน้าในหน้าที่การงานมีน้อย</option>
															<option value="สวัสดิการของพนักงานไม่เหมาะสม">สวัสดิการของพนักงานไม่เหมาะสม</option>
															<option value="อื่น ๆ">อื่น ๆ  
																<input id="work_uncomplace" type="text" class="form-control" name="work_uncomplace_detail" placeholder="กรุณากรอก">
															</option>
														</select>
													</div>
							</div>

					</div>
		  </div>

		  <div id="div1">
		  	<h5>กรุณากรอกข้อมูลเพิ่มเติมสำหรับผู้ที่ยังไม่ได้ทำงาน</h5>
		  	<hr>
					<div class="col-md-12">
							<div class="col-md-4">
													<div class="form-group">
														<label>สาเหตุที่ยังไม่ได้ทำงาน</label>
														<select name="free_cause" class="form-control" onchange="showfree_cause(this)">
															<option value="">กรุณาเลือก</option>
															<option value="ยังไม่ประสงค์ทำงาน">ยังไม่ประสงค์ทำงาน</option>
															<option value="ประสงค์ศึกษาต่อ">ประสงค์ศึกษาต่อ</option>
															<option value="รอฟังคำตอบจากหน่วยงาน">รอฟังคำตอบจากหน่วยงาน</option>
															<option value="หางานทำไม่ได้">หางานทำไม่ได้</option>
															<option value="อื่น ๆ">อื่น ๆ  
																<input id="free_cause" type="text" class="form-control" name="free_cause_detail" placeholder="กรุณากรอก">
															</option>
														</select>
												</div>
							</div>
							<div class="col-md-4">
													<div class="form-group">
														<label>ท่านมีปัญหาในการหางานทำหลังสำเร็จการศึกษาหรือไม่</label>
														<select name="free_issue" class="form-control"  onchange="showfree_issue(this)">
															<option value="">กรุณาเลือก</option>
															<option value="มี">มี</option>
															<option value="ไม่มี">ไม่มี</option>
															<option value="อื่น ๆ">อื่น ๆ  
																<input id="free_issue" type="text" class="form-control" name="free_issue_detail" placeholder="กรุณากรอก">
															</option>
														</select>
													</div>
								
							</div>
							<div class="col-md-4">
													<div class="form-group">
														<label>	ถ้ามีปัญหาโปรดระบุปัญหาสำคัญ </label>
														<select name="free_important" class="form-control" onchange="showfree_important(this)">
															<option value="">กรุณาเลือก</option>
															<option value="ไม่มีข้อมูลหน่วยงานรับสมัคร">ไม่มีข้อมูลหน่วยงานรับสมัคร</option>
															<option value="งานที่ทำยังไม่ตรงกับวุฒิการศึกษา">งานที่ทำยังไม่ตรงกับวุฒิการศึกษา</option>
															<option value="กระบวนการคัดเลือกหลายขั้นตอน">กระบวนการคัดเลือกหลายขั้นตอน</option>
															<option value="ขาดผู้สนับสนุนในการหางาน">ขาดผู้สนับสนุนในการหางาน</option>
															<option value="ขาดผู้ค้ำประกัน/เงินค้ำประกัน/ตำแหน่งค้ำประกัน">ขาดผู้ค้ำประกัน/เงินค้ำประกัน/ตำแหน่งค้ำประกัน</option>
															<option value="คุณสมบัติยังไม่ตรงตามความต้องการของบริษัท">คุณสมบัติยังไม่ตรงตามความต้องการของบริษัท</option>
															<option value="ค่าตอบแทนและสวัสดิการไม่เพียงพอ">ค่าตอบแทนและสวัสดิการไม่เพียงพอ</option>
															<option value="อื่น ๆ">อื่น ๆ  
																<input id="free_important" type="text" class="form-control" name="free_important_detail" placeholder="กรุณากรอก">
															</option>
														</select>
													</div>
								
							</div>
						
					</div>
					<div class="col-md-12">
							<div class="col-md-4">
													<div class="form-group">
														<label>ลักษณะงานที่ท่านต้องการ</label>
														<select name="free_work_need" class="form-control" ><option value="">กรุณาเลือก</option>
															<option value="ด้านการศึกษา เช่น งานสอน นักวิชาการ ฝึกอบรม เป็นต้น">ด้านการศึกษา เช่น งานสอน นักวิชาการ ฝึกอบรม เป็นต้น</option>
															<option value="ด้านการเกษตร เช่น ประมง เกษตรกรรม ปศุสัตว์ เป็นต้น">ด้านการเกษตร เช่น ประมง เกษตรกรรม ปศุสัตว์ เป็นต้น</option>
															<option value="ด้านอุตสาหกรรม  เช่น อาหาร สิ่งทอ อิเล็กทรอนิกส์ ก่อสร้าง เหมืองแร่ เป็นต้น">ด้านอุตสาหกรรม  เช่น อาหาร สิ่งทอ อิเล็กทรอนิกส์ ก่อสร้าง เหมืองแร่ เป็นต้น</option>
															<option value="ด้านการบริการ เช่น งานขาย บรรณาลักษณ์ กฏหมาย การเมือง เป็นต้น">ด้านการบริการ เช่น งานขาย บรรณาลักษณ์ กฏหมาย การเมือง เป็นต้น</option>
															<option value="ด้านการสื่อสารมวลชน เช่น ผู้สื่อข่าว ช่างภาพ ประชาสัมพันธ์ เป็นต้น">ด้านการสื่อสารมวลชน เช่น ผู้สื่อข่าว ช่างภาพ ประชาสัมพันธ์ เป็นต้น</option>
															<option value="ด้านวิทยาศาสตร์และเทคโนโลยี เช่น คอมพิวเตอร์ งานวิจัย เป็นต้น">ด้านวิทยาศาสตร์และเทคโนโลยี เช่น คอมพิวเตอร์ งานวิจัย เป็นต้น</option>
														</select>
												</div>
							</div>
							<div class="col-md-4">
													<div class="form-group">
														<label>ผู้ที่มีอิทธิพลต่อการตัดสินใจในการหางานทำ</label>
														<select name="free_influence" class="form-control"><option value="">กรุณาเลือก</option>
															<option value="ตัวเอง">ตัวเอง</option>
															<option value="เพื่อน">เพื่อน</option>
															<option value="ครอบครัว">ครอบครัว</option>
														</select>
													</div>
								
							</div>
							
						
					</div>
		  </div>

		  <div id="div3">
		  	<h5>กรุณากรอกข้อมูลเพิ่มเติมการศึกษาต่อ</h5>
		  	<hr>
					<div class="col-md-12">
							<div class="col-md-4">
													<div class="form-group">
														<label>สาขาวิชา</label>
														<input type="text" name="study_major" class="form-control">
												</div>
							</div>
							<div class="col-md-4">
													<div class="form-group">
														<label>ภาควิชา</label>
														<input type="text" name="study_facutly" class="form-control">
													</div>
								
							</div>
							<div class="col-md-4">
													<div class="form-group">
														<label>สถาบันศึกษา</label>
														<input type="text" name="study_university" class="form-control">
													</div>
								
							</div>
						
					</div>
		  </div>


	</div>


	<div class="col-md-12">
			<div class="col-md-12">
		<hr>
								<div class="form-group">
									<label>Email  (*ใช้ในการเข้าสู่ระบบ)</label>
									<input type="email" name="email" class="form-control" required="">
								</div>
			
								<div class="form-group">
									<label class="fw">Password (*ใช้ในการเข้าสู่ระบบ)</label>
									<input type="password" name="password" id="password" class="form-control" required="">
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