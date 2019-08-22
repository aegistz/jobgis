<!DOCTYPE html>
<?php 
	session_start();
	include 'config.php';
	date_default_timezone_set('Asia/Bangkok');

		  	$date_time = date("d/m/Y H:i:s");
		  	$date = date("Y/m/d");

  $message = '';

		if ( isset($_POST[title_name]) ) {

			

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
		  $nationality = $_POST['nationality'];
		  $birthday = $_POST['birthday'];
		  $weight = $_POST['weight'];
		  $hight = $_POST['hight'];
		  $status = $_POST['status'];
		  $address = $_POST['address'];
		  $email = $_POST['email'];
		  $phone = $_POST['phone'];
		  $degree = $_POST['degree'];
		  $faculty = $_POST['faculty'];
		  $sector = $_POST['sector'];
		  $university = $_POST['university'];
		  $graduation = $_POST['graduation'];
		  $work_n = $_POST['work_n'];
		  $work_1 = $_POST['work_1'];
		  $work_2 = $_POST['work_2'];
		  $work_3 = $_POST['work_3'];
		  $area_1 = $_POST['area_1'];
		  $area_2 = $_POST['area_2'];
		  $salary = $_POST['salary'];
		  $th_s = $_POST['th_s'];
		  $th_r = $_POST['th_r'];
		  $th_w = $_POST['th_w'];
		  $en_s = $_POST['en_s'];
		  $en_r = $_POST['en_r'];
		  $en_w = $_POST['en_w'];
		  $cn_s = $_POST['cn_s'];
		  $cn_r = $_POST['cn_r'];
		  $cn_w = $_POST['cn_w'];
		  $word = $_POST['word'];
		  $excel = $_POST['excel'];
		  $ppt = $_POST['ppt'];
		  $ps = $_POST['ps'];
		  $ai = $_POST['ai'];
		  $pr = $_POST['pr'];
		  $lr = $_POST['lr'];
		  $arcgis = $_POST['arcgis'];
		  $erdas = $_POST['erdas'];
		  $envi = $_POST['envi'];
		  $qgis = $_POST['qgis'];
		  $company = $_POST['company'];
		  $address_com = $_POST['address_com'];
		  $date_start = $_POST['date_start'];
		  $date_end = $_POST['date_end'];
		  $role_com = $_POST['role_com'];
		  $salary_com = $_POST['salary_com'];
		  $department = $_POST['department'];
		  $course = $_POST['course'];
		  $course_time = $_POST['course_time'];
		  $profile = $_POST['profile'];
		  $rank_com = $_POST['rank_com'];
		  $province = $_POST['province'];
		  $amphoe = $_POST['amphoe'];
		  $tambon = $_POST['tambon'];
		  $zip_code = $_POST['zip_code'];
		  $religion = $_POST['religion'];
		  $gpa = $_POST['gpa'];
		  $edu_back = $_POST['edu_back'];


        $sql = "select * from resume  where email = '$email' ";
        $query = pg_query($sql);
        $num = pg_num_rows($query);
        if ($num < 1){

        	$sql = "INSERT INTO resume (
		        	 title_name ,
			  		 s_name ,
			  		 l_name ,
			  		 nationality , 
			  		 religion ,
			  		 birthday , 
			  		 weight , 
			  		 hight , 
			  		 status , 
			  		 address , 
			  		 email , 
			  		 phone , 
			  		 degree , 
			  		 faculty , 
			  		 sector , 
			  		 university , 
			  		 graduation , 
			  		 work_n , 
			  		 work_1 , 
			  		 work_2 , 
			  		 work_3 , 
			  		 area_1 , 
			  		 area_2 , 
			  		 salary , 
			  		 th_s , 
			  		 th_r , 
			  		 th_w , 
			  		 en_s , 
			  		 en_r , 
			  		 en_w , 
			  		 cn_s , 
			  		 cn_r , 
			  		 cn_w , 
			  		 word , 
			  		 excel , 
			  		 ppt , 
			  		 ps , 
			  		 ai , 
			  		 pr , 
			  		 lr , 
			  		 arcgis , 
			  		 erdas , 
			  		 envi , 
			  		 qgis , 
			  		 company , 
			  		 address_com , 
			  		 date_start , 
			  		 date_end , 
			  		 role_com , 
			  		 salary_com , 
			  		 department , 
			  		 course , 
			  		 course_time , 
			  		 profile ,
			  		 rank_com ,
			  		 province ,
			  		 amphoe ,
			  		 tambon ,
			  		 zip_code ,
			  		 gpa ,
			  		 edu_back
			  		 ) 
        			VALUES ( 
		        	'$title_name',
		          	'$s_name' ,
		          	'$l_name' , 
		          	'$nationality' , 
		          	'$religion' ,
		          	'$birthday' , 
		          	'$weight' , 
		          	'$hight' , 
		          	'$status' , 
		          	'$address' , 
		          	'$email' , 
		          	'$phone' , 
		          	'$degree' , 
		          	'$faculty' , 
		          	'$sector' , 
		          	'$university' , 
		          	'$graduation' , 
		          	'$work_n' , 
		          	'$work_1' , 
		          	'$work_2' , 
		          	'$work_3' , 
		          	'$area_1' , 
		          	'$area_2' , 
		          	'$salary' , 
		          	'$th_s' , 
		          	'$th_r' , 
		          	'$th_w' , 
		          	'$en_s' , 
		          	'$en_r' ,
		          	'$en_w' , 
		          	'$cn_s' , 
		          	'$cn_r' , 
		          	'$cn_w' , 
		          	'$word' , 
		          	'$excel' , 
		          	'$ppt' , 
		          	'$ps' , 
		          	'$ai' , 
		          	'$pr' , 
		          	'$lr' , 
		          	'$arcgis' , 
		          	'$erdas' , 
		          	'$envi' , 
		          	'$qgis' , 
		          	'$company' , 
		          	'$address_com' , 
		          	'$date_start' , 
		          	'$date_end' , 
		          	'$role_com' , 
		          	'$salary_com' , 
		          	'$department' , 
		          	'$course' , 
		          	'$course_time' , 
		          	'$img' ,
		          	'$rank_com' ,
		          	'$province' ,
		          	'$amphoe' ,
		          	'$tambon' ,
		          	'$zip_code' ,
		          	'$gpa' ,
		          	'$edu_back')  ;";

        	$result = pg_query($sql);

            if($result){ 

	            $message = '<div class="alert alert-success alert-dismissible">
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								<strong>Success!</strong> บันทึกข้อมูลเสร็จเรียบร้อยแล้วครับ
							  </div>';

            }else{

                $message = '<div class="alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Warning!</strong> ไม่สามารถบันทึกข้อมูลได้ กรุณาลองอีกครั้ง
                           </div>';

            }
        }else{
        	  $message = '<div class="alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Warning!</strong> ไม่สามารถบันทึกข้อมูลได้ เนื่องจากท่านมีข้อมูลอยู่แล้วครับ
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
	  * {
	  box-sizing: border-box;
	}
	#regForm {
	  background-color: #ffffff;
	  margin: 10px auto;
	  min-width: 300px;
	}

	input.invalid {
	  background-color: #b3ccff;
	}

	.tab {
	  display: none;
	}

	button {
	  background-color: #000059;
	  color: #ffffff;
	  border: none;
	  padding: 10px 20px;
	  font-size: 17px;
	  cursor: pointer;
	}

	#prevBtn {
	  background-color: #0000e6;
	}

	.step {
	  height: 15px;
	  width: 15px;
	  margin: 0 2px;
	  background-color: #0000e6;
	  border: none;  
	  border-radius: 50%;
	  display: inline-block;
	  opacity: 0.5;
	}

	.step.active {
	  opacity: 1;
	}

	.step.finish {
	  background-color: #b3ccff;
	}
	.image-preview-input {
	    position: relative;
		overflow: hidden;
		margin: 0px;    
	    color: #333;
	    background-color: #fff;
	    border-color: #ccc;    
	}
	.image-preview-input input[type=file] {
		position: absolute;
		top: 0;
		right: 0;
		margin: 0;
		padding: 0;
		font-size: 20px;
		cursor: pointer;
		opacity: 0;
		filter: alpha(opacity=0);
	}
	.image-preview-input-title {
	    margin-left:2px;
	}
</style>  
	</head>
	<body class="skin-blue">
		<?php include 'header.php'; ?>
		<section class="login first grey">
			<div class="container">
				<div class="">				
					<div class="">
						<div class="box-body">
		<?php echo $message; ?>
							<h4>resume GIS</h4>
							<small>* กรุณากรอกข้อมูลให้ครบถ้วน</small><hr>
<form class="form-validate form-horizontal" id="regForm" method="post" action="resume.php" enctype="multipart/form-data">
	<div class="tab">
	<h6><p>ข้อมูลส่วนตัว</p></h6>
	<hr>
<!-- <div class="col-md-12">
		<div class="col-md-3">
								<div class="form-group">
									<label>รูปถ่าย</label>
									<figure class="featured-author-picture">
											<img src="https://image.flaticon.com/icons/png/512/149/149071.png" alt="Sample Article" style="width: 100px ">
									</figure>
									<br>
									<input type="file" name="" class="form-control" required="" >
								</div>
		</div>
	</div> -->
		<div class="col-md-12">
			<div class="col-md-12">
								<div class="form-group">
									<label>E-mail</label>
									<input type="email" name="email" class="form-control" value="<?php echo $user[email] ;?>" readonly="readonly">
								</div>
			</div>
	</div>
	<div class="col-md-12">
		<div class="col-md-2">
								<div class="form-group">
									<label>คำนำหน้า</label>
									<input type="text" name="title_name" class="form-control" value="<?php echo $user[title_name] ;?>" required >
								</div>
			
		</div>
		<div class="col-md-3">
								<div class="form-group">
									<label>ชื่อ</label>
									<input type="text" name="s_name" class="form-control"  value="<?php echo $user[s_name] ;?>" required>
								</div>
			
		</div>
		<div class="col-md-3">
								<div class="form-group">
									<label>นามสกุล</label>
									<input type="text" name="l_name" class="form-control"  value="<?php echo $user[l_name] ;?>" required>
								</div>
			
		</div>
		<div class="col-md-2">
								<div class="form-group">
									<label>สัญชาติ</label>
									<select name="nationality" class="form-control" required >
										<option value="">กรุณาเลือก</option>
										<option value="ไทย" <?php if($user[nationality]=='ไทย'){echo 'selected';} ?>>ไทย</option>
										<option value="อื่น ๆ" <?php if($user[nationality]=='อื่น ๆ'){echo 'selected';} ?>>อื่น ๆ</option>
									</select>
								</div>
			
		</div>
		<div class="col-md-2">
								<div class="form-group">
									<label>ศาสนา</label>
									<select name="religion" class="form-control"required >
										<option value="">กรุณาเลือก</option>
										<option value="พุทธ" <?php if($user[religion]=='พุทธ'){echo 'selected';} ?>>พุทธ</option>
										<option value="คลิสต์" <?php if($user[religion]=='คลิสต์'){echo 'selected';} ?>>คลิสต์</option>
										<option value="อิสลาม" <?php if($user[religion]=='อิสลาม'){echo 'selected';} ?>>อิสลาม</option>
									</select>
								</div>
			
		</div>
	</div>
	<div class="col-md-12">
			<div class="col-md-3">
								<div class="form-group">
									<label>วันเกิด</label>
									<input type="date" name="birthday" class="form-control" value="<?php echo $user[birthday] ;?>" required>
								</div>
			</div>
			<div class="col-md-2">
								<div class="form-group">
									<label>น้ำหนัก</label>
									<input type="number" name="weight" class="form-control" value="<?php echo $user[weight] ;?>" required>
								</div>
				
			</div>
			<div class="col-md-2">
								<div class="form-group">
									<label>ส่วนสูง</label>
									<input type="number" name="hight" class="form-control" value="<?php echo $user[hight] ;?>" required>
								</div>
				
			</div>
			<div class="col-md-5">
								<div class="form-group">
									<label>สถานภาพทางทหาร</label>
									<select name="status" class="form-control" required>
										<option value="">กรุณาเลือก</option>
										<option value="ผ่านการเกณฑ์ทหาร" <?php if($user[status]=='ผ่านการเกณฑ์ทหาร'){echo 'selected';} ?>>ผ่านการเกณฑ์ทหาร</option>
										<option value="ได้รับการยกเว้น/จบหลักสูตรรักษาดินแดน (รด.)" <?php if($user[status]=='ได้รับการยกเว้น/จบหลักสูตรรักษาดินแดน (รด.)'){echo 'selected';} ?>>ได้รับการยกเว้น/จบหลักสูตรรักษาดินแดน (รด.)</option>
										<option value="ยังไม่ผ่านการเกณฑ์ทหาร" <?php if($user[status]=='ยังไม่ผ่านการเกณฑ์ทหาร'){echo 'selected';} ?>>ยังไม่ผ่านการเกณฑ์ทหาร</option>
									</select>
								</div>
				
			</div>
	</div>

	<div class="col-md-12">
			<div class="col-md-3">
								<div class="form-group">
									<label>ที่อยู่</label>
									<input type="text" name="address" class="form-control" value="<?php echo $user[address] ;?>" required >
								</div>
				
			</div>
			<div class="col-md-3">
								<div class="form-group">
									<label>จังหวัด</label>
									<span id="province">
		                            <select class="form-control m-bot15" class="form-control"  name="province" required>
		                                 <option value=''>เลือกจังหวัด</option>
		                            </select>
		                        </span>
								</div>
				
			</div>
			<div class="col-md-2">
								<div class="form-group">
									<label>อำเภอ</label>
									<span id="amphoe">
		                            <select class="form-control m-bot15" class="form-control"  name="amphoe" required>
		                                 <option value=''>เลือกอำเภอ</option>
		                            </select>
		                        </span>
								</div>
				
			</div>
			<div class="col-md-2">
								<div class="form-group">
									<label>ตำบล</label>
									<span id="tambon">
		                            <select class="form-control m-bot15" class="form-control"  name="tambon" required>
		                                 <option value=''>เลือกตำบล</option>
		                            </select>
		                        </span>
								</div>
				
			</div>
			<div class="col-md-2">
								<div class="form-group">
									<label>รหัสไปรษณืย์</label>
									<input type="text" name="zip_code" class="form-control" value="<?php echo $user[zip_code] ;?>" required>
								</div>
				
			</div>
	</div>
		<div class="col-md-12">
			<div class="col-md-3">
								<div class="form-group">
									<label>เบอร์โทร</label>
									<input type="number" name="phone" class="form-control" value="<?php echo $user[phone_number] ;?>">
								</div>
				
			</div>
		</div>
	</div>
		<div class="tab">
			<h6><p>การศึกษา</p></h6>
			<hr>
			<div class="col-md-12">
				<div class="col-md-4">
								<div class="form-group">
									<label>ชื่อมหาวิทยาลัย</label>
									<input type="text" name="university" class="form-control" value="<?php echo $user[university] ;?>" required>
								</div>
				</div>
			<div class="col-md-4">
								<div class="form-group">
									<label>คณะ</label>
									<input type="text" name="faculty" class="form-control" value="<?php echo $user[faculty] ;?>" required>
								</div>
				
			</div>
			<div class="col-md-4">
								<div class="form-group">
									<label>สาขาวิชา</label>
									<input type="text" name="sector" class="form-control" value="<?php echo $user[sector] ;?>" required>
								</div>
				
			</div>			
		</div>

		<div class="col-md-12">
			<div class="col-md-3">
								<div class="form-group">
									<label>ระดับการศึกษา</label>
									<select name="degree" class="form-control" required>
										<option value="" <?php if($user[degree]==''){echo 'selected';} ?>>กรุณาเลือก</option>
										<option value="ปวช." <?php if($user[degree]=='ปวช.'){echo 'selected';} ?>>ปวช.</option>
										<option value="ปวส." <?php if($user[degree]=='ปวส.'){echo 'selected';} ?>>ปวส.</option>
										<option value="อนุปริญญา" <?php if($user[degree]=='อนุปริญญา'){echo 'selected';} ?>>อนุปริญญา</option>
										<option value="ปริญญาตรี" <?php if($user[degree]=='ปริญญาตรี'){echo 'selected';} ?>>ปริญญาตรี</option>
										<option value="ปริญญาโท" <?php if($user[degree]=='ปริญญาโท'){echo 'selected';} ?>>ปริญญาโท</option>
										<option value="ปริญญาเอก" <?php if($user[degree]=='ปริญญาเอก'){echo 'selected';} ?>>ปริญญาเอก</option>
									</select>
								</div>
			</div>
			<div class="col-md-3">
								<div class="form-group">
									<label>วุฒิการศึกษา</label>
									<input type="text" name="edu_back" class="form-control" value="<?php echo $user[edu_back] ;?>" required>
								</div>
				
			</div>
			<div class="col-md-3">
								<div class="form-group">
									<label>GPA</label>
									<input type="text" name="gpa" class="form-control" value="<?php echo $user[gpa] ;?>">
								</div>
				
			</div>	
			<div class="col-md-3">
								<div class="form-group">
									<label>ปีที่สำเร็จการศึกษา</label>
									<input type="text" name="graduation" class="form-control" value="<?php echo $user[graduation] ;?>">
								</div>
				
			</div>		
		</div>
	</div>
	<div class="tab">
		<h6><p>เป้าหมายในการทำงาน/สหิจศึกษา/ฝึกงาน</p></h6>
		<hr>
		<div class="col-md-12">
			<div class="col-md-3">
								<div class="form-group">
									<label>ลักษณะงาน</label>
									<select name="work_n" class="form-control" required>
										<option value="">กรุณาเลือก</option>
										<option value="ประจำ">ประจำ</option>
										<option value="รายวัน">รายวัน</option>
										<option value="สหิจศึกษา">สหิจศึกษา</option>
										<option value="ฝึกงาน">ฝึกงาน</option>
									</select>
								</div>
			</div>		
	</div>

	<b><p>สายงานที่ต้องการ</p></b>
	<div class="col-md-12">
			<div class="col-md-4">
								<div class="form-group">
									<label>1</label>
									<select name="work_1" class="form-control" required>
										<option value="">กรุณาเลือก</option>
										<option value="ภูมิศาสตร์">ภูมิศาสตร์</option>
										<option value="ภูมิสารสนเทศ">ภูมิสารสนเทศ</option>
										<option value="ผังเมือง">ผังเมือง</option>
										<option value="แผนที่">แผนที่</option>
										<option value="วิจัย">วิจัย</option>
										<option value="กราฟฟิค">กราฟฟิค</option>
									</select>
								</div>
				
			</div>
			<div class="col-md-4">
								<div class="form-group">
									<label>2</label>
									<select name="work_2" class="form-control" required>
										<option value="">กรุณาเลือก</option>
										<option value="ภูมิศาสตร์">ภูมิศาสตร์</option>
										<option value="ภูมิสารสนเทศ">ภูมิสารสนเทศ</option>
										<option value="ผังเมือง">ผังเมือง</option>
										<option value="แผนที่">แผนที่</option>
										<option value="วิจัย">วิจัย</option>
										<option value="กราฟฟิค">กราฟฟิค</option>
									</select>
								</div>
				
			</div>	
			<div class="col-md-4">
								<div class="form-group">
									<label>3</label>
									<select name="work_3" class="form-control" required>
										<option value="">กรุณาเลือก</option>
										<option value="ภูมิศาสตร์">ภูมิศาสตร์</option>
										<option value="ภูมิสารสนเทศ">ภูมิสารสนเทศ</option>
										<option value="ผังเมือง">ผังเมือง</option>
										<option value="แผนที่">แผนที่</option>
										<option value="วิจัย">วิจัย</option>
										<option value="กราฟฟิค">กราฟฟิค</option>
									</select>
								</div>
				
			</div>		
	</div>

		<b><p>พื้นที่ ทำงาน/สหกิจศึกษา/ฝึกงาน ที่ต้องการ</p></b>
	<div class="col-md-12">
			<div class="col-md-4">
								<div class="form-group">
									<label>1</label>
									<select class="form-control" name="area_1" required>
										<option value="">กรุณาเลือก</option>
										<?php $sql_prov = pg_query("select pv_tn from tambon group by pv_tn order by pv_tn asc"); 
										while ($arr_prov = pg_fetch_array($sql_prov)) {
										?>
										<option value="<?php echo $arr_prov[pv_tn]; ?>"><?php echo $arr_prov[pv_tn]; ?></option>
										<?php } ?>
									</select>
								</div>
				
			</div>
			<div class="col-md-4">
								<div class="form-group">
									<label>2</label>
									<select class="form-control" name="area_2" required>
										<option value="">กรุณาเลือก</option>
										<?php $sql_prov = pg_query("select pv_tn from tambon group by pv_tn order by pv_tn asc"); 
										while ($arr_prov = pg_fetch_array($sql_prov)) {
										?>
										<option value="<?php echo $arr_prov[pv_tn]; ?>"><?php echo $arr_prov[pv_tn]; ?></option>
										<?php } ?>
									</select>
								</div>
				
			</div>	
			<div class="col-md-4">
								<div class="form-group">
									<label>เงินเดือนที่ต้องการ</label>
									<select name="salary" class="form-control" required>
										<option value="">กรุณาเลือก</option>
										<option value="5,000">5,000</option>
										<option value="10,000">10,000</option>
										<option value="15,000">15,000</option>
										<option value="25,000">25,000</option>
										<option value="30,000">30,000</option>
										<option value="40,000">40,000</option>
										<option value="50,000">50,000</option>
										<option value="60,000">60,000</option>
										<option value="80,000">80,000</option>
										<option value="100,000">100,000</option>
										<option value="120,000">120,000</option>
										<option value="150,000">150,000</option>
										<option value="150,000+">150,000+</option>
									</select>
								</div>
				
			</div>
	</div>
	</div>
		<div class="tab">
			<h6><p>ทักษะและภาษา</p></h6>
			<hr>
			<b><p>ภาษาไทย</p></b>
					<div class="col-md-12">
							<div class="col-md-4">
								<div class="form-group">
									<label>พูด</label>
									<select name="th_s" class="form-control" required>
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
									<select name="th_r" class="form-control" required>
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
									<select name="th_w" class="form-control" required>
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
									<select name="en_s" class="form-control" required>
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
									<select name="en_r" class="form-control" required>
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
									<select name="en_w" class="form-control" required>
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
									<select name="cn_s" class="form-control" required>
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
									<select name="cn_r" class="form-control" required>
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
									<select name="cn_w" class="form-control" required>
										<option value="">กรุณาเลือก</option>
										<option value="ดีมาก">ดีมาก</option>
										<option value="ดี">ดี</option>
										<option value="ปานกลาง">ปานกลาง</option>
										<option value="พอใช้">พอใช้</option>
									</select>
								</div>
				
			</div>			
	</div>
	</div>
		<div class="tab"> 
			<h6><p>ทักษะด้านคอมพิวเตอร์</p></h6>
			<hr>
			<b><p>Microsoft office</p></b>
			<div class="col-md-12">
				<div class="col-md-4">
								<div class="form-group">
									<label>Word</label>
									<select name="word" class="form-control" required>
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
									<select name="excel" class="form-control" required>
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
									<select name="ppt" class="form-control" required>
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
									<select name="ps" class="form-control" required>
										<option value="">กรุณาเลือก</option>
										<option value="ดีมาก">ดีมาก</option>
										<option value="ดี">ดี</option>
										<option value="ปานกลาง">ปานกลาง</option>
										<option value="พอใช้">พอใช้</option>
										<option value="ยังไม่เคยใช้งาน">ยังไม่เคยใช้งาน</option>
									</select>
								</div>
			</div>
			<div class="col-md-3">
								<div class="form-group">
									<label>Illustrator</label>
									<select name="ai" class="form-control" required>
										<option value="">กรุณาเลือก</option>
										<option value="ดีมาก">ดีมาก</option>
										<option value="ดี">ดี</option>
										<option value="ปานกลาง">ปานกลาง</option>
										<option value="พอใช้">พอใช้</option>
										<option value="ยังไม่เคยใช้งาน">ยังไม่เคยใช้งาน</option>
									</select>
								</div>
				
			</div>
			<div class="col-md-3">
								<div class="form-group">
									<label>Premiere pro</label>
									<select name="pr" class="form-control" required>
										<option value="">กรุณาเลือก</option>
										<option value="ดีมาก">ดีมาก</option>
										<option value="ดี">ดี</option>
										<option value="ปานกลาง">ปานกลาง</option>
										<option value="พอใช้">พอใช้</option>
										<option value="ยังไม่เคยใช้งาน">ยังไม่เคยใช้งาน</option>
									</select>
								</div>
				
			</div>
			<div class="col-md-3">
								<div class="form-group">
									<label>Lightroom</label>
									<select name="lr" class="form-control" required>
										<option value="">กรุณาเลือก</option>
										<option value="ดีมาก">ดีมาก</option>
										<option value="ดี">ดี</option>
										<option value="ปานกลาง">ปานกลาง</option>
										<option value="พอใช้">พอใช้</option>
										<option value="ยังไม่เคยใช้งาน">ยังไม่เคยใช้งาน</option>
									</select>
								</div>
				
			</div>				
	</div>

				<b><p>โปรแกรมทางด้าน GIS</p></b>
	<div class="col-md-12">
			<div class="col-md-3">
								<div class="form-group">
									<label>ArcGIS</label>
									<select name="arcgis" class="form-control" required>
										<option value="">กรุณาเลือก</option>
										<option value="ดีมาก">ดีมาก</option>
										<option value="ดี">ดี</option>
										<option value="ปานกลาง">ปานกลาง</option>
									</select>
								</div>
			</div>
			<div class="col-md-3">
								<div class="form-group">
									<label>ERDAS</label>
									<select name="erdas" class="form-control" required>
										<option value="">กรุณาเลือก</option>
										<option value="ดีมาก">ดีมาก</option>
										<option value="ดี">ดี</option>
										<option value="ปานกลาง">ปานกลาง</option>
									</select>
								</div>
				
			</div>
			<div class="col-md-3">
								<div class="form-group">
									<label>ENVI</label>
									<select name="envi" class="form-control" required>
										<option value="">กรุณาเลือก</option>
										<option value="ดีมาก">ดีมาก</option>
										<option value="ดี">ดี</option>
										<option value="ปานกลาง">ปานกลาง</option>
									</select>
								</div>
				
			</div>	
			<div class="col-md-3">
								<div class="form-group">
									<label>QGIS</label>
									<select name="qgis" class="form-control" required>
										<option value="">กรุณาเลือก</option>
										<option value="ดีมาก">ดีมาก</option>
										<option value="ดี">ดี</option>
										<option value="ปานกลาง">ปานกลาง</option>
									</select>
								</div>
				
			</div>	
<!-- 			<div class="col-md-4">
								<div class="form-group">
									<label>โปรแกรมอื่น ๆ</label>
									<input type="text" name="" class="form-control">
								</div>
				
			</div>	 -->
	</div>
	</div>
		<div class="tab">
				<b><p>การทำงาน/ฝึกงาน/สหกิจศึกษา</p></b>
			<div class="col-md-12">
				<div class="col-md-6">
								<div class="form-group">
									<label>ชื่อบริษัท</label>
									<input type="text" name="company" class="form-control">
								</div>
				
				</div>	
				<div class="col-md-3">
								<div class="form-group">
									<label>ตั้งแต่วันที่</label>
									<input type="date" name="date_start" class="form-control">
								</div>
				
				</div>
				<div class="col-md-3">
								<div class="form-group">
									<label>จนถึงวันที่</label>
									<input type="date" name="date_end" class="form-control">
								</div>
				
				</div>
			</div>

			<div class="col-md-12">
				<div class="col-md-12">
								<div class="form-group">
									<label>ที่อยู่ติดต่อ</label>
									<input type="text" name="address_com" class="form-control">
								</div>
				
				</div>
			</div>
			<div class="col-md-12">
				<div class="col-md-4">
								<div class="form-group">
									<label>ตำแหน่ง</label>
									<input type="text" name="rank_com" class="form-control">
								</div>
				
				</div>
				<div class="col-md-4">
								<div class="form-group">
									<label>เงินเดือน</label>
									<input type="text" name="salary_com" class="form-control">
								</div>
				
				</div>
				<div class="col-md-4">
								<div class="form-group">
									<label>หน้าที่รับผิดชอบ</label>
									<input type="text" name="role_com" class="form-control">
								</div>
				
				</div>
			</div>
		</div>
			<div class="tab">

					<b><p>ประวัติการฝึกอบรม</p></b>
				<div class="col-md-12">
					<div class="col-md-6">
								<div class="form-group">
									<label>ชื่อหน่วยงานที่ฝึกอบรม</label>
									<input type="text" name="department" class="form-control">
								</div>
				
					</div>	
					<div class="col-md-3">
								<div class="form-group">
									<label>หลักสูตร</label>
									<input type="text" name="course" class="form-control">
								</div>
				
					</div>
					<div class="col-md-3">
								<div class="form-group">
									<label>ระยะเวลาในการอบรม</label>
									<input type="text" name="course_time" class="form-control">
								</div>
				
					</div>
				</div>
			</div>
					<div class="col-md-12">
						<div style="overflow:auto;">
					    <div style="float:right;">
					      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
					      <button type="button" name="submit_resume" id="nextBtn" onclick="nextPrev(1)">Next</button>
					    </div>
					  </div>

					  <div style="text-align:center;margin-top:40px;">
					    <span class="step"></span>
					    <span class="step"></span>
					    <span class="step"></span>
					    <span class="step"></span>
					    <span class="step"></span>
					    <span class="step"></span>
					    <span class="step"></span>
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
		<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
	console.log(n)
	console.log(currentTab)
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
	console.log(x.length)
  // Exit the function if any field in the current tab is invalid:
  if (n == 0 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>

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
	</body>
</html>