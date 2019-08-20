<!DOCTYPE html>
<?php
	session_start();
	include 'config.php';
	
date_default_timezone_set('Asia/Bangkok');
$date_time = date("d/m/Y H:i:s");
$date = date("Y/m/d");
$message = '';






if( $_POST[submit_form] == 'true' ) 
{



			$sql = "SELECT * from company  where email_com = '$_POST[email_com]';";
			$check_email = pg_query("SELECT * from company  where email_com = '$_POST[email_com]';");
			$num_com = pg_num_rows($check_email);

			if ($num_com == 0) {

						    // get uploaded file name
						    $image = $_FILES["file"]["name"];
						 
						    if( empty( $image ) ) {
						        $error = 'File is empty, please select image to upload.';
						    } else if($_FILES["file"]["type"] == "application/msword") {
						        $error = 'Invalid image type, use (e.g. png, jpg, gif).';
						    } else if( $_FILES["file"]["error"] > 0 ) {
						        $error = 'Oops sorry, seems there is an error uploading your image, please try again later.';
						    } else {

						    	
						    
						        // strip file slashes in uploaded file, although it will not happen but just in case ;)
						        $filename = stripslashes( $_FILES['file']['name'] );
						        $ext = get_file_extension( $filename );
						        $ext = strtolower( $ext );
						        
						        if(( $ext != "jpg" ) && ( $ext != "jpeg" ) && ( $ext != "png" ) && ( $ext != "gif" ) ) {
						            $error = 'Unknown Image extension.';
						            return false;
						        } else {
						            // get uploaded file size
						            $size = filesize( $_FILES['file']['tmp_name'] );
						            
						            // get php ini settings for max uploaded file size
						            $max_upload = ini_get( 'upload_max_filesize' );
						 
						            // check if we're able to upload lessthan the max size
						            if( $size > $max_upload )
						                $error = 'You have exceeded the upload file size.';
						 
						            // check uploaded file extension if it is jpg or jpeg, otherwise png and if not then it goes to gif image conversion
						            $uploaded_file = $_FILES['file']['tmp_name'];
						            if( $ext == "jpg" || $ext == "jpeg" )
						                $source = imagecreatefromjpeg( $uploaded_file );
						            else if( $ext == "png" )
						                $source = imagecreatefrompng( $uploaded_file );
						            else
						                $source = imagecreatefromgif( $uploaded_file );
						 
						            // getimagesize() function simply get the size of an image
						            list( $width, $height) = getimagesize ( $uploaded_file );
						            $ratio = $height / $width;
						 
						 
						            // new width 100 in pixel format too
						            $nw1 = 450;
						            $nh1 = ceil( $ratio * $nw1 );
						            $dst1 = imagecreatetruecolor( $nw1, $nh1 );
						 
						            imagecopyresampled( $dst1, $source, 0, 0, 0, 0, $nw1, $nh1, $width, $height );
						 
						            // rename our upload image file name, this to avoid conflict in previous upload images
						            // to easily get our uploaded images name we added image size to the suffix
						            $rnd_name1 = 'photos_job_'.uniqid(mt_rand(10, 15)).'_'.time().'_450x450.'.$ext;
						            
						            // move it to uploads dir with full quality
						            imagejpeg( $dst1, 'images/img_job/'.$rnd_name1, 100 );
						 
						            // I think that's it we're good to clear our created images
						            imagedestroy( $source );
						            imagedestroy( $dst1 );

									$salt = 'gistnu@geojobs'; 
									$password = sha1($_POST[password].$salt);

									$sql2 = "INSERT into company
									(
											name_com ,
											detail_com ,
											website_com ,
											address_com ,
											tambon_com ,
											amphoe_com ,
											province_com ,
											zipcode_com ,
											phone_com ,
											fax_com ,
											email_com ,
											type_com ,
											lat_com ,
											lon_com ,
											date_com ,
											user_name ,
											password ,
											status_company,
											logo_img
									)
									values
									(
										'$_POST[name_com]' ,
										'$_POST[detail_com]' ,
										'$_POST[website_com]' ,
										'$_POST[address_com]' ,
										'$_POST[tambon]' ,
										'$_POST[amphoe]' ,
										'$_POST[province]' ,
										'$_POST[zipcode_com]' ,
										'$_POST[phone_com]' ,
										'$_POST[fax_com]' ,
										'$_POST[email_com]' ,
										'$_POST[type_com]' ,
										'0.0' ,
										'0.0' ,
										'$date' ,
										'$_POST[user_name]' ,
										'$password' ,
										'รอการยืนยัน'  ,
										'$rnd_name1' 

									);";

									$message = $sql2;


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
										$sender = "GEOJOBS"; // ชื่อผู้ส่ง
										$email_sender = "gistnu@NU.com"; // เมล์ผู้ส่ง
										$email_receiver = $_POST[email_com]; // เมล์ผู้รับ ***
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
														<title>การกดยืนยันการสมัคร</title>
												</head>
												<body>
														<div style='background: #214163;padding: 10px 0 20px 10px;margin-bottom:10px;font-size:30px;color:white;' >
																<img src='http://www.geojobs.nu.ac.th/images/6logo.png' style='width: 120px;'>
																<div style='-align:center'>
																		<p>ขอบคุณที่ร่วมเป็นครอบครัวเดียวกับเรา </p><br>
																		<p><a href='http://www.geojobs.nu.ac.th/checkcompany.php?email=".$_POST[email_com]."&type=submit_mail' >กดที่นี่ เพื่อยืนยันการสมัคร</a>   </p>
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
												$message = "<h3 class='-center'>ระบบมีปัญหา กรุณาลองใหม่อีกครั้ง</h3>";
												//echo $mail->ErrorInfo; // ข้อความ รายละเอียดการ error
											}else{
												// กรณีส่ง email สำเร็จ
												$message = "ระบบได้ส่งข้อความไปเรียบร้อย";
												}
										}





									$result = pg_query($sql2);
										if($result){
											$message = '<div class="alert alert-success alert-dismissible">
																<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
																<strong>Success!</strong> ลงทะเบียนเสร็จสิ้นแล้ว
															</div>';
											header('Location:checklogin.php?user_email='.$email.'&user_password='.$telephone.'&login=Login');
											setcookie("email", $email , time() + 3600);
											header('Location: checkmail.php');
												exit;
										}else{
											$message = '<div class="alert alert-danger alert-dismissible">
														<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														<strong>Warning!</strong> ไม่สามา่รถบันทึกข้อมูลได้ กรุณาลองอีกครั้ง
														</div>';
										}
						           
						 
						        }
						 
						    }




			}else{
				$message = '<div class="alert alert-danger alert-dismissible">
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								<strong>Warning!</strong> Email นี้เคยสมัครสมาชิกแล้ว กรุณาตรวจสอบก่อนบันทึกข้อมูล หรือเข้าสู่ระบบ
							</div>';
			}



}



function get_file_extension( $file )  {
    if( empty( $file ) )
        return;
 
    // if goes here then good so all clear and good to go
    $ext = end(explode( ".", $file ));
 
    // return file extension
    return $ext;
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
	 <script language=Javascript>
        function Inint_AJAX() {
           try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} 
           try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} 
           try { return new XMLHttpRequest();          } catch(e) {}
           alert("XMLHttpRequest not supported");
           return null;
        };

        function dochange(src, val) {
             var req = Inint_AJAX();
             req.onreadystatechange = function () { 
                  if (req.readyState==4) {
                       if (req.status==200) {
                            document.getElementById(src).innerHTML=req.responseText; 
                       } 
                  }
             };
             req.open("GET", "location.php?data="+src+"&val="+val); 
             req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); 
             req.send(null); 
        }

        window.onLoad=dochange('province', -1);  
    </script>
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
					<form enctype="multipart/form-data" method="post">
						<?php echo $message; ?>
						<div class="box-body">
							<h4>ลงทะเบียนเพิ่มสถานประกอบการใหม่</h4>
							<small>* กรุณากรอกข้อมูลให้ครบถ้วน</small>
							<hr>
							<div class="col-md-12">
								<div class="col-md-3">
									<div class="col-md-12">
										<div class="form-group">
											<label>Poster หรือภาพประกอบ</label>
											<input class="form-control " type="file" id="cname" name="file" onchange="readURL(this);"  accept="image/png, image/jpeg, image/gif">

                                              <img id="blah" src="http://orcalcontabilidade.com.br/images/footer-shadow.png" style="width:100%; max-height:100%;margin-top:20px;" alt="your image" />
										</div>
										
									</div>
								</div>
								<div class="col-md-9">
									<div class="col-md-6">
										<div class="form-group">
											<label>ชื่อสถานประกอบการ *</label>
											<input type="text" name="name_com" class="form-control" >
										</div>
										
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Website (ถ้ามี)</label>
											<input type="text" name="website_com" class="form-control" >
										</div>
										
									</div>
									<div class="col-md-8">
										<div class="form-group">
											<label>รายละเอียดเกี่ยวกับสถานประกอบการเพิ่มเติม </label>
											<textarea name="" type="text" name="detail_com" class="form-control" ></textarea>
										</div>
										
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>ประเภทสถานประกอบการ</label>
											<select  id="select"  class="form-control"  name="type_com"> 
												  <option value="ยังไม่ได้กำหนด">-- กรุณาเลือก --</option>
												  <option value="กฎหมาย">กฎหมาย</option>
												  <option value="ก่อสร้าง/ผลิตและจัดจำหน่ายอุปกรณ์ก่อสร้าง">ก่อสร้าง/ผลิตและจัดจำหน่ายอุปกรณ์ก่อสร้าง</option>
												  <option value="การโดยสารทางอากาศ/ทางบก/ทางน้ำ">การโดยสารทางอากาศ/ทางบก/ทางน้ำ</option>
												  <option value="การขนส่งและคลังสินค้า/นำเข้าและส่งออก">การขนส่งและคลังสินค้า/นำเข้าและส่งออก</option>
												  <option value="สถาบันการศึกษาและแนะแนวอาชีพ">สถาบันการศึกษาและแนะแนวอาชีพ</option>
												  <option value="เกษตรกรรม/ประมง">เกษตรกรรม/ประมง</option>
												  <option value="การท่องเที่ยว">การท่องเที่ยว</option>
												  <option value="หน่วยงานราชการ">หน่วยงานราชการ</option>
												  <option value="การผลิตและจำหน่ายเคมีภัณฑ์">การผลิตและจำหน่ายเคมีภัณฑ์</option>
												  <option value="การวิจัยและพัฒนา">การวิจัยและพัฒนา</option>
												  <option value="โทรคมนาคม">โทรคมนาคม</option>
												  <option value="ตัวแทนขายส่ง/ขายปลีก">ตัวแทนขายส่ง/ขายปลีก</option>
												  <option value="บัญชี ">บัญชี </option>
												  <option value="เทคโนโลยีสารสนเทศ">เทคโนโลยีสารสนเทศ</option>
												  <option value="มูลนิธิ และสังคมสงเคราะห์">มูลนิธิ และสังคมสงเคราะห์</option>
												  <option value="โรงแรม/รีสอร์ท/ที่พัก">โรงแรม/รีสอร์ท/ที่พัก</option>
												  <option value="รับจัดอีเว้นท์ (Organizer)">รับจัดอีเว้นท์ (Organizer)</option>
												  <option value="สุขภาพและความงาม">สุขภาพและความงาม</option>
												  <option value="สถาบันการเงิน/การประกันภัย/เงินทุนหลักทรัพย์">สถาบันการเงิน/การประกันภัย/เงินทุนหลักทรัพย์</option>
												  <option value="สื่อสารมวลชนและการผลิตสื่อสิ่งพิมพ์">สื่อสารมวลชนและการผลิตสื่อสิ่งพิมพ์</option>
												  <option value="เหมืองแร่/ไฟฟ้า/ก๊าซ/ประปา/ปิโตรเคมี">เหมืองแร่/ไฟฟ้า/ก๊าซ/ประปา/ปิโตรเคมี</option>
												  <option value="อสังหาริมทรัพย์ ">อสังหาริมทรัพย์ </option>
												  <option value="อุตสาหกรรมยานยนต์">อุตสาหกรรมยานยนต์</option>
												  <option value="อาหาร/เครื่องดื่ม (ผลิต/จำหน่าย)">อาหาร/เครื่องดื่ม (ผลิต/จำหน่าย)</option>
												  <option value="อุตสาหกรรมการผลิตอื่นๆ">อุตสาหกรรมการผลิตอื่นๆ</option>
												  <option value="อื่นๆ">อื่นๆ</option>
												</select>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="col-md-12">
									<div class="form-group">
										<label>ที่อยู่</label>
										<input type="text" name="address_com" class="form-control" >
									</div>
									
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>จังหวัด</label>
										 <span id="province">
                                              <select class="form-control" name="province" required>
                                                <option value='%'>- กรุณาเลือก -</option>
                                              </select>
                                            </span>
									</div>
									
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>อำเภอ</label>
										 <span id="amphoe">
                                              <select class="form-control" name="province" required>
                                                <option value='%'>- กรุณาเลือก -</option>
                                              </select>
                                            </span>
									</div>
									
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>ตำบล</label>
										 <span id="tambon">
                                              <select class="form-control" name="province" required>
                                                <option value='%'>- กรุณาเลือก -</option>
                                              </select>
                                            </span>
									</div>
									
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>รหัสไปรษณีย์</label>
										<input type="text" name="zipcode_com" class="form-control" >
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="col-md-4">
									<div class="form-group">
										<label>เบอร์โทรติดต่อ</label>
										<input type="text" name="phone_com" class="form-control" >
									</div>
								</div>
								<!-- <div class="col-md-4">
									<div class="form-group">
										<label>Fax</label>
										<input type="text" name="fax_com" class="form-control" >
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Email</label>
										<input type="text" name="email_com" class="form-control" >
									</div>
								</div> -->
							</div>
							
						</div>
						<div class="col-md-12">
							<div class="col-md-12">
								<hr>
								<div class="form-group">
									<label>Email ของท่านหรือหน่วยงาน (*ใช้ในการเข้าสู่ระบบ)</label>
									<input type="email" name="email_com" class="form-control" >
								</div>
								
								<div class="form-group">
									<label class="fw">รหัสผ่าน (*ใช้ในการเข้าสู่ระบบ)</label>
									<input type="password" name="password" id="password" class="form-control" >
								</div>
								
							</div>
						</div>
						
						<div class="col-md-12">
							<div class="form-group text-right">
								<button type="submit" name="submit_form" value="true" class="btn btn-primary btn-block">ลงทะเบียนเข้าใช้งาน</button>
							</div>
							<div class="form-group text-center">
								<span class="text-muted">หากเคยลงทะเบียนสถานประกอบการแล้ว กรุณา</span><a href="login.php">เข้าระบบ</a>
							</div>
						</div>
						
					</form>
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


		 function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
	</script>
</body>
</html>