<!DOCTYPE html>
<?php 
	include 'config.php';
include("check_student.php");

	  	  $email = $user['email'];
	  	  $title_name = $_POST['title_name'];
		  $s_name = $_POST['s_name'];
		  $l_name = $_POST['l_name'];
		  $nationality = $_POST['nationality'];
		  $birthday = $_POST['birthday'];
		  $weight = $_POST['weight'];
		  $hight = $_POST['hight'];
		  $status = $_POST['status'];
		  $address = $_POST['address'];
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

       $sql = "SELECT * FROM resume WHERE email = '$email'; ";
	   $query = pg_query($sql);
	   $resume = pg_fetch_array($query);

	   if ( isset($_POST[personal]) ) {
        $sql1 = "UPDATE resume set 
        		title_name = '$title_name', 
        		s_name = '$s_name', 
        		l_name = '$l_name',
        		nationality = '$nationality' ,
        		birthday = '$birthday' ,
        		weight = '$weight' ,
        		hight = '$hight' ,
        		status = '$status' ,
        		address = '$address' ,
        		phone = '$phone' ,
        		province = '$province' ,
        		amphoe = '$amphoe' ,
        		tambon = '$tambon' ,
        		zip_code = '$zip_code' ,
        		religion = '$religion'
        		where email = '$email';";       
           		$query1 = pg_query($sql1);
           		header('location:resume-edit.php#personal') ; 
		}
		if ( isset($_POST[edu]) ) {
       	$sql2 = "UPDATE resume set  
        		university = '$university' ,
        		graduation = '$graduation' ,
        		faculty = '$faculty' , 
        		sector = '$sector' ,
        		degree = '$degree' ,
        		edu_back = '$edu_back' ,
        		gpa = '$gpa'
        		where email = '$email' ;";
           		$query2 = pg_query($sql2);
           		header('location:resume-edit.php#edu') ; 
		}
		if ( isset($_POST[work]) ) {
       	$sql3 = "UPDATE resume set  
       			company = '$company' ,
       			date_start = '$date_start' ,
       			date_end = '$date_end' ,
       			address_com = '$address_com',
       			rank_com = '$rank_com' ,
       			salary_com = '$salary_com' ,
       			role_com = '$role_com'
        		where email = '$email' ;";
           		$query3 = pg_query($sql3);
           		header('location:resume-edit.php#work') ; 
		}
		if ( isset($_POST[Train]) ) {
       	$sql4 = "UPDATE resume set  
       			department = '$department' , 
       			course = '$course' , 
       			course_time = '$course_time'
        		where email = '$email' ;";
           		$query4 = pg_query($sql4);
           		header('location:resume-edit.php#Train') ; 
		}
		if ( isset($_POST[objective]) ) {
       	$sql5 = "UPDATE resume set  
       			work_n = '$work_n' , 
       			work_1 = '$work_1' ,
       			work_2 = '$work_2' ,
       			work_3 = '$work_3' ,
       			area_1 = '$area_1' ,
       			area_2 = '$area_2' ,
       			salary = '$salary'
        		where email = '$email' ;";
           		$query5 = pg_query($sql5);
           		header('location:resume-edit.php#objective') ; 
		}
		if ( isset($_POST[skills]) ) {
       	$sql6 = "UPDATE resume set  
       			th_s = 'th_s' ,
       			th_r = '$th_r' ,
       			th_w = '$th_w' ,
       			en_s = '$en_s' ,
       			en_r = '$en_r' ,
       			en_w = '$en_w' ,
       			cn_s = '$cn_s' ,
       			cn_r = '$cn_r' ,
       			cn_w = '$cn_w' ,
       			word = '$word' ,
       			excel = '$excel' ,
       			ppt = '$ppt' ,
       			ps = '$ps' ,
       			ai = '$ai' ,
       			pr = '$pr' ,
       			lr = '$lr' ,
       			arcgis = '$arcgis' ,
       			erdas = '$erdas' ,
       			envi = '$envi' ,
       			qgis = '$qgis'
        		where email = '$email' ;";
           		$query6 = pg_query($sql6);
           		header('location:resume-edit.php#skills') ; 
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
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


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
	<section class="search">
			<div class="container">
				<div class="row">
					<div class="col-md-3 sidebar" id="sidebar">
						<aside>
							<div class="aside-body">
							<h2 class="aside-title">แก้ไขข้อมูล</h2>
								<ul class="nav nav-stacked">
								    <li class="active">
								      <a data-toggle="tab" href="#personal">ข้อมูลส่วนตัว</a>
								    </li>
								    <li>
								      <a data-toggle="tab" href="#edu">การศึกษา</a>
								    </li>
								    <li>
								      <a data-toggle="tab" href="#work">การทำงาน/ฝึกงาน</a>
								    </li>
								    <li>
								      <a data-toggle="tab" href="#Train">ประวัติการฝึกอบรม</a>
								    </li>
								    <li>
								      <a data-toggle="tab" href="#objective">เป้าหมายในการทำงาน/ฝึกงาน</a>
								    </li>
								     <li>
								      <a data-toggle="tab" href="#skills">ทักษะ</a>
								    </li>
								  </ul>
							
							</div>
						</aside>
					</div>
					<div class="col-md-9 ">
						<div class="tab-content">
						  <div id="personal" class="tab-pane fade in active">
<form class="form-validate form-horizontal" id="feedback_form" method="post"  id="frmMyform" action="resume-edit.php" enctype="multipart/form-data">
						<h5>ข้อมูลส่วนตัว</h5><hr>
				    	<div class="col-md-12">
							<div class="col-md-2">
								<div class="form-group">
									<label>คำนำหน้า</label>
									<input type="text" name="title_name" class="form-control" required="" value="<?php echo $resume[title_name] ;?>">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>ชื่อ</label>
									<input type="text" name="s_name" class="form-control" required="" value="<?php echo $resume[s_name] ;?>">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>นามสกุล</label>
									<input type="text" name="l_name" class="form-control" required="" value="<?php echo $resume[l_name] ;?>">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label>สัญชาติ</label>
									<select name="nationality" class="form-control" required>
										<option value="ไทย"<?php if($resume[nationality]=='ไทย'){echo 'selected';} ?>>ไทย</option>
										<option value="อื่น ๆ"<?php if($resume[nationality]=='อื่น ๆ'){echo 'selected';} ?>>อื่น ๆ</option>
									</select> 
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label>ศาสนา</label>
									<select name="religion" class="form-control" required>
										<option value="พุทธ"<?php if($resume[religion]=='พุทธ'){echo 'selected';} ?>>พุทธ</option>
										<option value="คลิสต์"<?php if($resume[religion]=='คลิสต์'){echo 'selected';} ?>>คลิสต์</option>
										<option value="อิสลาม"<?php if($resume[religion]=='อิสลาม'){echo 'selected';} ?>>อิสลาม</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="col-md-3">
								<div class="form-group">
									<label>ที่อยู่</label>
									<input type="text" name="address" class="form-control" required="" value="<?php echo $resume[address] ;?>"> 
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>จังหวัด</label>
									<span id="province_edit">
		                            <select class="form-control m-bot15" class="form-control"  name="province" required>
		                                 <option value=''>เลือกจังหวัด</option>
		                            </select>
		                        </span>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label>อำเภอ</label>
									<span id="amphoe_edit">
		                            <select class="form-control m-bot15" class="form-control"  name="amphoe"  required> 
		                                 <option  value="<?php echo $resume[amphoe] ;?>"><?php echo $resume[amphoe] ;?></option>
		                            </select>
		                        </span>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label>ตำบล</label>
									<span id="tambon_edit">
		                            <select class="form-control m-bot15" class="form-control"  name="tambon" required>
		                                 <option value='<?php echo $resume[tambon] ;?>'><?php echo $resume[tambon] ;?></option>
		                            </select>
		                        </span>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label>รหัสไปรษณีย์</label>
									<input type="text" name="zip_code" class="form-control"  value="<?php echo $resume[zip_code] ;?>">
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="col-md-3">
								<div class="form-group">
									<label>วันเกิด</label>
									<input type="date" name="birthday" class="form-control" value="<?php echo $resume[birthday] ;?>">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label>น้ำหนัก</label>
									<input type="number" name="weight" class="form-control" value="<?php echo $resume[weight] ;?>">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label>ส่วนสูง</label>
									<input type="number" name="hight" class="form-control" value="<?php echo $resume[hight] ;?>" >
								</div>
							</div>
							<div class="col-md-5">
								<div class="form-group">
									<label>สถานภาพทางทหาร</label>
									<select name="status" class="form-control" >
										<option value="ผ่านการเกณฑ์ทหาร"<?php if($resume[status]=='ผ่านการเกณฑ์ทหาร'){echo 'selected';} ?>>ผ่านการเกณฑ์ทหาร</option>
										<option value="ได้รับการยกเว้น/จบหลักสูตรรักษาดินแดน (รด.)"<?php if($resume[status]=='ได้รับการยกเว้น/จบหลักสูตรรักษาดินแดน (รด.)'){echo 'selected';} ?>>ได้รับการยกเว้น/จบหลักสูตรรักษาดินแดน (รด.)</option>
										<option value="ยังไม่ผ่านการเกณฑ์ทหาร"<?php if($resume[status]=='ยังไม่ผ่านการเกณฑ์ทหาร'){echo 'selected';} ?>>ยังไม่ผ่านการเกณฑ์ทหาร</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="col-md-3">
								<div class="form-group">
									<label>เบอร์โทรศัพท์</label>
									<input type="text" name="phone" class="form-control" value="<?php echo $resume[phone] ;?>">
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="col-md-3">
								<div class="form-group">
									<button type="submit" class="btn btn-primary" name="personal">แก้ไขข้อมูล</button>
								</div>
							</div>
						</div>
</form>
						  </div>

						  <div id="edu" class="tab-pane fade">
<form class="form-validate form-horizontal" id="feedback_form" method="post"  id="frmMyform" action="resume-edit.php" enctype="multipart/form-data">
				    	<div class="col-md-12">
							<div class="col-md-2">
								<div class="form-group">
									<label>มหาวิทยาลัย</label>
									<input type="text" name="university" class="form-control" required="" value="<?php echo $resume[university] ;?>">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>คณะ</label>
									<input type="text" name="faculty" class="form-control" required="" value="<?php echo $resume[faculty] ;?>">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>สาขาวิชา</label>
									<input type="text" name="sector" class="form-control" required="" value="<?php echo $resume[sector] ;?>">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label>ระดับการศึกษา</label>
									<select name="degree" class="form-control" required>
										<option value="ปวช." <?php if($resume[degree]=='ปวช.'){echo 'selected';} ?>>ปวช.</option>
										<option value="ปวส." <?php if($resume[degree]=='ปวส.'){echo 'selected';} ?>>ปวส.</option>
										<option value="อนุปริญญา" <?php if($resume[degree]=='อนุปริญญา'){echo 'selected';} ?>>อนุปริญญา</option>
										<option value="ปริญญาตรี" <?php if($resume[degree]=='ปริญญาตรี'){echo 'selected';} ?>>ปริญญาตรี</option>
										<option value="ปริญญาโท" <?php if($resume[degree]=='ปริญญาโท'){echo 'selected';} ?>>ปริญญาโท</option>
										<option value="ปริญญาเอก" <?php if($resume[degree]=='ปริญญาเอก'){echo 'selected';} ?>>ปริญญาเอก</option>
									</select>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label>วุฒิการศึกษา</label>
									<input type="text" name="edu_back" class="form-control" required="" value="<?php echo $resume[edu_back] ;?>">
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="col-md-2">
								<div class="form-group">
									<label>ปีที่สำเร็จการศึกษา</label>
									<input type="text" name="graduation" class="form-control" required="" value="<?php echo $resume[graduation] ;?>"> 
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label>GPA</label>
									<input type="text" name="gpa" class="form-control" required="" value="<?php echo $resume[gpa] ;?>"> 
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="col-md-3">
								<div class="form-group">
									<button type="submit" class="btn btn-primary" name="edu">แก้ไขข้อมูล</button>
								</div>
							</div>
						</div>
</form>
						  </div>

						  <div id="work" class="tab-pane fade aside-body">
<form class="form-validate form-horizontal" id="feedback_form" method="post"  id="frmMyform" action="resume-edit.php" enctype="multipart/form-data">
						<h5>การทำงาน/ฝึกงาน</h5><hr>
				    	<div class="col-md-12">
							<div class="col-md-2">
								<div class="form-group">
									<label>ชื่อบริษัท</label>
									<input type="text" name="company" class="form-control" required="" value="<?php echo $resume[company] ;?>">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>ที่อยู่ติดต่อ</label>
									<input type="text" name="address_com" class="form-control" required="" value="<?php echo $resume[address_com] ;?>">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>ตำแหน่ง</label>
									<input type="text" name="rank_com" class="form-control" required="" value="<?php echo $resume[rank_com] ;?>">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label>เงินเดือน</label>
									<input type="text" name="salary_com" class="form-control" required="" value="<?php echo $resume[salary_com] ;?>">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label>หน้าที่รับผิดชอบ</label>
									<input type="text" name="role_com" class="form-control" required="" value="<?php echo $resume[role_com] ;?>">
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="col-md-2">
								<div class="form-group">
									<label>ตั้งแต่</label>
									<input type="date" name="date_start" class="form-control" required="" value="<?php echo $resume[date_start] ;?>"> 
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label>จนถึง</label>
									<input type="date" name="date_end" class="form-control" required="" value="<?php echo $resume[date_end] ;?>"> 
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="col-md-3">
								<div class="form-group">
									<button type="submit" class="btn btn-primary" name="work">แก้ไขข้อมูล</button>
								</div>
							</div>
						</div>
</form>
						  </div>

						  <div id="Train" class="tab-pane fade aside-body">
<form class="form-validate form-horizontal" id="feedback_form" method="post"  id="frmMyform" action="resume-edit.php" enctype="multipart/form-data">
						<h5>ประวัติการฝึกอบรม</h5><hr>
				    	<div class="col-md-12">
							<div class="col-md-3">
								<div class="form-group">
									<label>ชื่อหน่วยงานที่ฝึกอบรม</label>
									<input type="text" name="department" class="form-control" required="" value="<?php echo $resume[department] ;?>">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>หลักสูตร</label>
									<input type="text" name="course" class="form-control" required="" value="<?php echo $resume[course] ;?>">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>ระยะเวลาในการอบรม</label>
									<input type="text" name="course_time" class="form-control" required="" value="<?php echo $resume[course_time] ;?>">
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="col-md-3">
								<div class="form-group">
									<button type="submit" class="btn btn-primary" name="Train">แก้ไขข้อมูล</button>
								</div>
							</div>
						</div>
</form>
						  </div>

						  <div id="objective" class="tab-pane fade aside-body">
<form class="form-validate form-horizontal" id="feedback_form" method="post"  id="frmMyform" action="resume-edit.php" enctype="multipart/form-data">
						<h5>เป้าหมายในการทำงาน/ฝึกงาน</h5><hr>
				    	<div class="col-md-12">
							<div class="col-md-2">
								<div class="form-group">
									<label>ลักษณะงาน</label>
									<select name="work_n" class="form-control" required>
										<option value="งานประจำ" <?php if($resume[work_n]=='งานประจำ'){echo 'selected';} ?>>งานประจำ</option>
										<option value="งานรายวัน" <?php if($resume[work_n]=='งานรายวัน'){echo 'selected';} ?>>งานรายวัน</option>
										<option value="สหิจศึกษา" <?php if($resume[work_n]=='สหิจศึกษา'){echo 'selected';} ?>>สหิจศึกษา</option>
										<option value="ฝึกงาน" <?php if($resume[work_n]=='ฝึกงาน'){echo 'selected';} ?>>ฝึกงาน</option>
									</select>
								</div>
							</div>
						</div>
						<p><b>สายงานที่ต้องการ</b></p>
						<div class="col-md-12">
							<div class="col-md-4">
								<div class="form-group">
									<label>1</label>
									<select name="work_1" class="form-control" required>
										<option value="ภูมิศาสตร์" <?php if($resume[work_1]=='ภูมิศาสตร์'){echo 'selected';} ?>>ภูมิศาสตร์</option>
										<option value="ภูมิสารสนเทศ" <?php if($resume[work_1]=='ภูมิสารสนเทศ'){echo 'selected';} ?>>ภูมิสารสนเทศ</option>
										<option value="ผังเมือง" <?php if($resume[work_1]=='ผังเมือง'){echo 'selected';} ?>>ผังเมือง</option>
										<option value="แผนที่" <?php if($resume[work_1]=='แผนที่'){echo 'selected';} ?>>แผนที่</option>
										<option value="วิจัย" <?php if($resume[work_1]=='วิจัย'){echo 'selected';} ?>>วิจัย</option>
										<option value="กราฟฟิค" <?php if($resume[work_1]=='กราฟฟิค'){echo 'selected';} ?>>กราฟฟิค</option>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>2</label>
									<select name="work_2" class="form-control" required>
										<option value="ภูมิศาสตร์" <?php if($resume[work_2]=='ภูมิศาสตร์'){echo 'selected';} ?>>ภูมิศาสตร์</option>
										<option value="ภูมิสารสนเทศ" <?php if($resume[work_2]=='ภูมิสารสนเทศ'){echo 'selected';} ?>>ภูมิสารสนเทศ</option>
										<option value="ผังเมือง" <?php if($resume[work_2]=='ผังเมือง'){echo 'selected';} ?>>ผังเมือง</option>
										<option value="แผนที่" <?php if($resume[work_2]=='แผนที่'){echo 'selected';} ?>>แผนที่</option>
										<option value="วิจัย" <?php if($resume[work_2]=='วิจัย'){echo 'selected';} ?>>วิจัย</option>
										<option value="กราฟฟิค" <?php if($resume[work_2]=='กราฟฟิค'){echo 'selected';} ?>>กราฟฟิค</option>
									</select>
								</div>
							</div>	
							<div class="col-md-4">
								<div class="form-group">
									<label>3</label>
									<select name="work_3" class="form-control" required>
										<option value="ภูมิศาสตร์" <?php if($resume[work_3]=='ภูมิศาสตร์'){echo 'selected';} ?>>ภูมิศาสตร์</option>
										<option value="ภูมิสารสนเทศ" <?php if($resume[work_3]=='ภูมิสารสนเทศ'){echo 'selected';} ?>>ภูมิสารสนเทศ</option>
										<option value="ผังเมือง" <?php if($resume[work_3]=='ผังเมือง'){echo 'selected';} ?>>ผังเมือง</option>
										<option value="แผนที่" <?php if($resume[work_3]=='แผนที่'){echo 'selected';} ?>>แผนที่</option>
										<option value="วิจัย" <?php if($resume[work_3]=='วิจัย'){echo 'selected';} ?>>วิจัย</option>
										<option value="กราฟฟิค" <?php if($resume[work_3]=='กราฟฟิค'){echo 'selected';} ?>>กราฟฟิค</option>
									</select>
								</div>
							</div>		
						</div>
						<p><b>พื้นที่ ทำงาน/สหกิจศึกษา/ฝึกงาน ที่ต้องการ</b></p>
						<div class="col-md-12">
							<div class="col-md-4">
								<div class="form-group">
									<label>1</label>
									<select class="form-control" name="area_1" required>
										<option value="">กรุณาเลือก</option>
										<?php $sql_prov = pg_query("select pv_tn from tambon group by pv_tn order by pv_tn asc"); 
										while ($arr_prov = pg_fetch_array($sql_prov)) {
										?>
										<option value="<?php echo $arr_prov[pv_tn]; ?>"<?php if($arr_prov[pv_tn]==$resume[area_1]){echo 'selected';} ?>><?php echo $arr_prov[pv_tn]; ?></option>
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
										<option value="<?php echo $arr_prov[pv_tn]; ?>"<?php if($arr_prov[pv_tn]==$resume[area_2]){echo 'selected';} ?>><?php echo $arr_prov[pv_tn]; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>	
							<div class="col-md-4">
								<div class="form-group">
									<label>เงินเดือนที่ต้องการ</label>
									<select name="salary" class="form-control" required>
										<option value="5,000" <?php if($resume[salary]=='5,000'){echo 'selected';} ?>>5,000</option>
										<option value="10,000" <?php if($resume[salary]=='10,000'){echo 'selected';} ?>>10,000</option>
										<option value="15,000" <?php if($resume[salary]=='15,000'){echo 'selected';} ?>>15,000</option>
										<option value="25,000" <?php if($resume[salary]=='25,000'){echo 'selected';} ?>>25,000</option>
										<option value="30,000" <?php if($resume[salary]=='30,000'){echo 'selected';} ?>>30,000</option>
										<option value="40,000" <?php if($resume[salary]=='40,000'){echo 'selected';} ?>>40,000</option>
										<option value="50,000" <?php if($resume[salary]=='50,000'){echo 'selected';} ?>>50,000</option>
										<option value="60,000" <?php if($resume[salary]=='60,000'){echo 'selected';} ?>>60,000</option>
										<option value="80,000" <?php if($resume[salary]=='80,000'){echo 'selected';} ?>>80,000</option>
										<option value="100,000" <?php if($resume[salary]=='100,000'){echo 'selected';} ?>>100,000</option>
										<option value="120,000" <?php if($resume[salary]=='120,000'){echo 'selected';} ?>>120,000</option>
										<option value="150,000" <?php if($resume[salary]=='150,000'){echo 'selected';} ?>>150,000</option>
										<option value="150,000+" <?php if($resume[salary]=='150,000+'){echo 'selected';} ?>>150,000+</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="col-md-3">
								<div class="form-group">
									<button type="submit" class="btn btn-primary" name="objective">แก้ไขข้อมูล</button>
								</div>
							</div>
						</div>
</form>
						  </div>

						  <div id="skills" class="tab-pane fade aside-body">
<form class="form-validate form-horizontal" id="feedback_form" method="post"  id="frmMyform" action="resume-edit.php" enctype="multipart/form-data">
						<h6><p>ทักษะด้านภาษา</p></h6><hr>
						<p><b>ภาษาไทย</b></p>
				    	<div class="col-md-12">
							<div class="col-md-4">
								<div class="form-group">
									<label>พูด</label>
									<select name="th_s" class="form-control" required>
										<option value="ดีมาก" <?php if($resume[th_s]=='ดีมาก'){echo 'selected';} ?>>ดีมาก</option>
										<option value="ดี" <?php if($resume[th_s]=='ดี'){echo 'selected';} ?>>ดี</option>
										<option value="ปานกลาง" <?php if($resume[th_s]=='ปานกลาง'){echo 'selected';} ?>>ปานกลาง</option>
										<option value="พอใช้" <?php if($resume[th_s]=='พอใช้'){echo 'selected';} ?>>พอใช้</option>
										<option value="พูดไม่ได้" <?php if($resume[th_s]=='พูดไม่ได้'){echo 'selected';} ?>>พูดไม่ได้</option>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>อ่าน</label>
									<select name="th_r" class="form-control" required>
										<option value="ดีมาก" <?php if($resume[th_r]=='ดีมาก'){echo 'selected';} ?>>ดีมาก</option>
										<option value="ดี" <?php if($resume[th_r]=='ดี'){echo 'selected';} ?>>ดี</option>
										<option value="ปานกลาง" <?php if($resume[th_r]=='ปานกลาง'){echo 'selected';} ?>>ปานกลาง</option>
										<option value="พอใช้" <?php if($resume[th_r]=='พอใช้'){echo 'selected';} ?>>พอใช้</option>
										<option value="อ่านไม่ได้" <?php if($resume[th_r]=='อ่านไม่ได้'){echo 'selected';} ?>>อ่านไม่ได้</option>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>เขียน</label>
									<select name="th_w" class="form-control" required>
										<option value="ดีมาก" <?php if($resume[th_w]=='ดีมาก'){echo 'selected';} ?>>ดีมาก</option>
										<option value="ดี" <?php if($resume[th_w]=='ดี'){echo 'selected';} ?>>ดี</option>
										<option value="ปานกลาง" <?php if($resume[th_w]=='ปานกลาง'){echo 'selected';} ?>>ปานกลาง</option>
										<option value="พอใช้" <?php if($resume[th_w]=='พอใช้'){echo 'selected';} ?>>พอใช้</option>
										<option value="เขียนไม่ได้" <?php if($resume[th_w]=='เขียนไม่ได้'){echo 'selected';} ?>>เขียนไม่ได้</option>
									</select>
								</div>
							</div>			
						</div>
						<p><b>ภาษาอังกฤษ</b></p>
				    	<div class="col-md-12">
							<div class="col-md-4">
								<div class="form-group">
									<label>พูด</label>
									<select name="en_s" class="form-control" required>
										<option value="ดีมาก" <?php if($resume[en_s]=='ดีมาก'){echo 'selected';} ?>>ดีมาก</option>
										<option value="ดี" <?php if($resume[en_s]=='ดี'){echo 'selected';} ?>>ดี</option>
										<option value="ปานกลาง" <?php if($resume[en_s]=='ปานกลาง'){echo 'selected';} ?>>ปานกลาง</option>
										<option value="พอใช้" <?php if($resume[en_s]=='พอใช้'){echo 'selected';} ?>>พอใช้</option>
										<option value="พูดไม่ได้" <?php if($resume[en_s]=='พูดไม่ได้'){echo 'selected';} ?>>พูดไม่ได้</option>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>อ่าน</label>
									<select name="en_r" class="form-control" required>
										<option value="ดีมาก" <?php if($resume[en_r]=='ดีมาก'){echo 'selected';} ?>>ดีมาก</option>
										<option value="ดี" <?php if($resume[en_r]=='ดี'){echo 'selected';} ?>>ดี</option>
										<option value="ปานกลาง" <?php if($resume[en_r]=='ปานกลาง'){echo 'selected';} ?>>ปานกลาง</option>
										<option value="พอใช้" <?php if($resume[en_r]=='พอใช้'){echo 'selected';} ?>>พอใช้</option>
										<option value="อ่านไม่ได้" <?php if($resume[en_r]=='อ่านไม่ได้'){echo 'selected';} ?>>อ่านไม่ได้</option>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>เขียน</label>
									<select name="en_w" class="form-control" required>
										<option value="ดีมาก" <?php if($resume[en_w]=='ดีมาก'){echo 'selected';} ?>>ดีมาก</option>
										<option value="ดี" <?php if($resume[en_w]=='ดี'){echo 'selected';} ?>>ดี</option>
										<option value="ปานกลาง" <?php if($resume[en_w]=='ปานกลาง'){echo 'selected';} ?>>ปานกลาง</option>
										<option value="พอใช้" <?php if($resume[en_w]=='พอใช้'){echo 'selected';} ?>>พอใช้</option>
										<option value="เขียนไม่ได้" <?php if($resume[en_w]=='เขียนไม่ได้'){echo 'selected';} ?>>เขียนไม่ได้</option>
									</select>
								</div>
							</div>			
						</div>
						<p><b>ภาษาจีน</b></p>
				    	<div class="col-md-12">
							<div class="col-md-4">
								<div class="form-group">
									<label>พูด</label>
									<select name="cn_s" class="form-control" required>
										<option value="ดีมาก" <?php if($resume[cn_s]=='ดีมาก'){echo 'selected';} ?>>ดีมาก</option>
										<option value="ดี" <?php if($resume[cn_s]=='ดี'){echo 'selected';} ?>>ดี</option>
										<option value="ปานกลาง" <?php if($resume[cn_s]=='ปานกลาง'){echo 'selected';} ?>>ปานกลาง</option>
										<option value="พอใช้" <?php if($resume[cn_s]=='พอใช้'){echo 'selected';} ?>>พอใช้</option>
										<option value="พูดไม่ได้" <?php if($resume[cn_s]=='พูดไม่ได้'){echo 'selected';} ?>>พูดไม่ได้</option>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>อ่าน</label>
									<select name="cn_r" class="form-control" required>
										<option value="ดีมาก" <?php if($resume[cn_r]=='ดีมาก'){echo 'selected';} ?>>ดีมาก</option>
										<option value="ดี" <?php if($resume[cn_r]=='ดี'){echo 'selected';} ?>>ดี</option>
										<option value="ปานกลาง" <?php if($resume[cn_r]=='ปานกลาง'){echo 'selected';} ?>>ปานกลาง</option>
										<option value="พอใช้" <?php if($resume[cn_r]=='พอใช้'){echo 'selected';} ?>>พอใช้</option>
										<option value="อ่านไม่ได้" <?php if($resume[cn_r]=='อ่านไม่ได้'){echo 'selected';} ?>>อ่านไม่ได้</option>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>เขียน</label>
									<select name="cn_w" class="form-control" required>
										<option value="ดีมาก" <?php if($resume[cn_w]=='ดีมาก'){echo 'selected';} ?>>ดีมาก</option>
										<option value="ดี" <?php if($resume[cn_w]=='ดี'){echo 'selected';} ?>>ดี</option>
										<option value="ปานกลาง" <?php if($resume[cn_w]=='ปานกลาง'){echo 'selected';} ?>>ปานกลาง</option>
										<option value="พอใช้" <?php if($resume[cn_w]=='พอใช้'){echo 'selected';} ?>>พอใช้</option>
										<option value="เขียนไม่ได้" <?php if($resume[cn_w]=='เขียนไม่ได้'){echo 'selected';} ?>>เขียนไม่ได้</option>
									</select>
								</div>
							</div>			
						</div>
						<h6><p>ทักษะด้านคอมพิวเตอร์</p></h6><hr>
						<p><b>Microsoft office</b></p>
				    	<div class="col-md-12">
							<div class="col-md-4">
								<div class="form-group">
									<label>Word</label>
									<select name="word" class="form-control" required>
										<option value="ดีมาก" <?php if($resume[word]=='ดีมาก'){echo 'selected';} ?>>ดีมาก</option>
										<option value="ดี" <?php if($resume[word]=='ดี'){echo 'selected';} ?>>ดี</option>
										<option value="ปานกลาง" <?php if($resume[word]=='ปานกลาง'){echo 'selected';} ?>>ปานกลาง</option>
										<option value="พอใช้" <?php if($resume[word]=='พอใช้'){echo 'selected';} ?>>พอใช้</option>
										<option value="ยังไม่เคยใช้งาน" <?php if($resume[word]=='ยังไม่เคยใช้งาน'){echo 'selected';} ?>>ยังไม่เคยใช้งาน</option>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Excel</label>
									<select name="excel" class="form-control" required>
										<option value="ดีมาก" <?php if($resume[excel]=='ดีมาก'){echo 'selected';} ?>>ดีมาก</option>
										<option value="ดี" <?php if($resume[excel]=='ดี'){echo 'selected';} ?>>ดี</option>
										<option value="ปานกลาง" <?php if($resume[excel]=='ปานกลาง'){echo 'selected';} ?>>ปานกลาง</option>
										<option value="พอใช้" <?php if($resume[excel]=='พอใช้'){echo 'selected';} ?>>พอใช้</option>
										<option value="ยังไม่เคยใช้งาน" <?php if($resume[excel]=='ยังไม่เคยใช้งาน'){echo 'selected';} ?>>ยังไม่เคยใช้งาน</option>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>powerpoint</label>
									<select name="ppt" class="form-control" required>
										<option value="ดีมาก" <?php if($resume[ppt]=='ดีมาก'){echo 'selected';} ?>>ดีมาก</option>
										<option value="ดี" <?php if($resume[ppt]=='ดี'){echo 'selected';} ?>>ดี</option>
										<option value="ปานกลาง" <?php if($resume[ppt]=='ปานกลาง'){echo 'selected';} ?>>ปานกลาง</option>
										<option value="พอใช้" <?php if($resume[ppt]=='พอใช้'){echo 'selected';} ?>>พอใช้</option>
										<option value="ยังไม่เคยใช้งาน" <?php if($resume[ppt]=='ยังไม่เคยใช้งาน'){echo 'selected';} ?>>ยังไม่เคยใช้งาน</option>
									</select>
								</div>
							</div>			
						</div>
						<p><b>Adobe</b></p>
				    	<div class="col-md-12">
							<div class="col-md-3">
								<div class="form-group">
									<label>Photoshop</label>
									<select name="ps" class="form-control" required>
										<option value="ดีมาก" <?php if($resume[ps]=='ดีมาก'){echo 'selected';} ?>>ดีมาก</option>
										<option value="ดี" <?php if($resume[ps]=='ดี'){echo 'selected';} ?>>ดี</option>
										<option value="ปานกลาง" <?php if($resume[ps]=='ปานกลาง'){echo 'selected';} ?>>ปานกลาง</option>
										<option value="พอใช้" <?php if($resume[ps]=='พอใช้'){echo 'selected';} ?>>พอใช้</option>
										<option value="ยังไม่เคยใช้งาน" <?php if($resume[ps]=='ยังไม่เคยใช้งาน'){echo 'selected';} ?>>ยังไม่เคยใช้งาน</option>
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Illustrator</label>
									<select name="ai" class="form-control" required>
										<option value="ดีมาก" <?php if($resume[ai]=='ดีมาก'){echo 'selected';} ?>>ดีมาก</option>
										<option value="ดี" <?php if($resume[ai]=='ดี'){echo 'selected';} ?>>ดี</option>
										<option value="ปานกลาง" <?php if($resume[ai]=='ปานกลาง'){echo 'selected';} ?>>ปานกลาง</option>
										<option value="พอใช้" <?php if($resume[ai]=='พอใช้'){echo 'selected';} ?>>พอใช้</option>
										<option value="ยังไม่เคยใช้งาน" <?php if($resume[ai]=='ยังไม่เคยใช้งาน'){echo 'selected';} ?>>ยังไม่เคยใช้งาน</option>
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>premiere pro</label>
									<select name="pr" class="form-control" required>
										<option value="ดีมาก" <?php if($resume[pr]=='ดีมาก'){echo 'selected';} ?>>ดีมาก</option>
										<option value="ดี" <?php if($resume[pr]=='ดี'){echo 'selected';} ?>>ดี</option>
										<option value="ปานกลาง" <?php if($resume[pr]=='ปานกลาง'){echo 'selected';} ?>>ปานกลาง</option>
										<option value="พอใช้" <?php if($resume[pr]=='พอใช้'){echo 'selected';} ?>>พอใช้</option>
										<option value="ยังไม่เคยใช้งาน" <?php if($resume[pr]=='ยังไม่เคยใช้งาน'){echo 'selected';} ?>>ยังไม่เคยใช้งาน</option>
									</select>
								</div>
							</div>	
							<div class="col-md-3">
								<div class="form-group">
									<label>lightroom</label>
									<select name="lr" class="form-control" required>
										<option value="ดีมาก" <?php if($resume[lr]=='ดีมาก'){echo 'selected';} ?>>ดีมาก</option>
										<option value="ดี" <?php if($resume[lr]=='ดี'){echo 'selected';} ?>>ดี</option>
										<option value="ปานกลาง" <?php if($resume[lr]=='ปานกลาง'){echo 'selected';} ?>>ปานกลาง</option>
										<option value="พอใช้" <?php if($resume[lr]=='พอใช้'){echo 'selected';} ?>>พอใช้</option>
										<option value="ยังไม่เคยใช้งาน" <?php if($resume[lr]=='ยังไม่เคยใช้งาน'){echo 'selected';} ?>>ยังไม่เคยใช้งาน</option>
									</select>
								</div>
							</div>		
						</div>
						<p><b>โปรแกรมทางด้าน GIS</b></p>
				    	<div class="col-md-12">
							<div class="col-md-3">
								<div class="form-group">
									<label>ArcGIS</label>
									<select name="arcgis" class="form-control" required>
										<option value="ดีมาก" <?php if($resume[arcgis]=='ดีมาก'){echo 'selected';} ?>>ดีมาก</option>
										<option value="ดี" <?php if($resume[arcgis]=='ดี'){echo 'selected';} ?>>ดี</option>
										<option value="ปานกลาง" <?php if($resume[arcgis]=='ปานกลาง'){echo 'selected';} ?>>ปานกลาง</option>
										<option value="พอใช้" <?php if($resume[arcgis]=='พอใช้'){echo 'selected';} ?>>พอใช้</option>
										<option value="ยังไม่เคยใช้งาน" <?php if($resume[arcgis]=='ยังไม่เคยใช้งาน'){echo 'selected';} ?>>ยังไม่เคยใช้งาน</option>
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>ERDAS</label>
									<select name="erdas" class="form-control" required>
										<option value="ดีมาก" <?php if($resume[erdas]=='ดีมาก'){echo 'selected';} ?>>ดีมาก</option>
										<option value="ดี" <?php if($resume[erdas]=='ดี'){echo 'selected';} ?>>ดี</option>
										<option value="ปานกลาง" <?php if($resume[erdas]=='ปานกลาง'){echo 'selected';} ?>>ปานกลาง</option>
										<option value="พอใช้" <?php if($resume[erdas]=='พอใช้'){echo 'selected';} ?>>พอใช้</option>
										<option value="ยังไม่เคยใช้งาน" <?php if($resume[erdas]=='ยังไม่เคยใช้งาน'){echo 'selected';} ?>>ยังไม่เคยใช้งาน</option>
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>ENVI</label>
									<select name="envi" class="form-control" required>
										<option value="ดีมาก" <?php if($resume[envi]=='ดีมาก'){echo 'selected';} ?>>ดีมาก</option>
										<option value="ดี" <?php if($resume[envi]=='ดี'){echo 'selected';} ?>>ดี</option>
										<option value="ปานกลาง" <?php if($resume[envi]=='ปานกลาง'){echo 'selected';} ?>>ปานกลาง</option>
										<option value="พอใช้" <?php if($resume[envi]=='พอใช้'){echo 'selected';} ?>>พอใช้</option>
										<option value="ยังไม่เคยใช้งาน" <?php if($resume[envi]=='ยังไม่เคยใช้งาน'){echo 'selected';} ?>>ยังไม่เคยใช้งาน</option>
									</select>
								</div>
							</div>	
							<div class="col-md-3">
								<div class="form-group">
									<label>QGIS</label>
									<select name="qgis" class="form-control" required>
										<option value="ดีมาก" <?php if($resume[qgis]=='ดีมาก'){echo 'selected';} ?>>ดีมาก</option>
										<option value="ดี" <?php if($resume[qgis]=='ดี'){echo 'selected';} ?>>ดี</option>
										<option value="ปานกลาง" <?php if($resume[qgis]=='ปานกลาง'){echo 'selected';} ?>>ปานกลาง</option>
										<option value="พอใช้" <?php if($resume[qgis]=='พอใช้'){echo 'selected';} ?>>พอใช้</option>
										<option value="ยังไม่เคยใช้งาน" <?php if($resume[qgis]=='ยังไม่เคยใช้งาน'){echo 'selected';} ?>>ยังไม่เคยใช้งาน</option>
									</select>
								</div>
							</div>		
						</div>
						<div class="col-md-12">
							<div class="col-md-3">
								<div class="form-group">
									<button type="submit" class="btn btn-primary" name="skills">แก้ไขข้อมูล</button>
								</div>
							</div>
						</div>
</form>
						  </div>

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
             req.open("GET", "location.php?data="+src+"&val="+val+"&province=<?php echo $resume[province]; ?>"); 
             req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); 
             req.send(null); 
        }

        window.onLoad=dochange('province_edit', -1);  
    </script>
    <script>
		$(document).ready(function(){
		  $(".nav-tabs a").click(function(){
		    $(this).tab('show');
		  });
		});
			$(function(){
			var hash = window.location.hash;
			hash && $('ul.nav a[href="' + hash + '"]').tab('show');
			$('.nav-tabs a').click(function (e) {
			$(this).tab('show');
			var scrollmem = $('body').scrollTop();
			window.location.hash = this.hash;
			$('html,body').scrollTop(scrollmem);
			});
			});
	</script>
	</body>
</html>