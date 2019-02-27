<?php 

		require 'scripts/phpmailer/PHPMailerAutoload.php';

		include 'config.php';

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

		$subject = "รับเรื่องการแจ้งซ่อมอุปกรณ์"; // หัวข้อเมล์


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
		        <img src='images/6logo.png' style='width: 120px;'>
		        <div style='text-align:center'> 
		           <p>กดที่ลิงค์ เพื่อยืนยันการสมัค</p><br>
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


			if (!$mail->send()) {  // สั่งให้ส่ง email

				// กรณีส่ง email ไม่สำเร็จ
				echo "<h3 class='text-center'>ระบบมีปัญหา กรุณาลองใหม่อีกครั้ง</h3>";
				//echo $mail->ErrorInfo; // ข้อความ รายละเอียดการ error
			}else{
				// กรณีส่ง email สำเร็จ
				echo "ระบบได้ส่งข้อความไปเรียบร้อย";
			}	
		}

?>