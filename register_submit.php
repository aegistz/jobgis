<?php 

  
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


	  $sql1 = "select * from user_job  where email = '$email'   ; ";
	  $query = pg_query($sql1);
	  $num = pg_num_rows($query);
	  if ($num < 1){
	  $sql2 = "insert into user_job 
	  ( 
			title_name ,
			s_name ,
			l_name ,
			sex ,
			year_birth integer,
			phone_number ,
			province ,
			university ,
			fuculty ,
			major ,
			level_degree ,
			year_success integer,
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
			date_access 
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
		'$date'

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