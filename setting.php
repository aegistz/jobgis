<!DOCTYPE html>
<?php
session_start();
include 'config.php';

	  $email = $user['email'];
	  $title_name = $_POST['title_name'];
	  $s_name = $_POST['s_name'];
	  $l_name = $_POST['l_name'];
	  $sex = $_POST['sex'];
	  $year_birth = $_POST['year_birth'];
	  $phone_number = $_POST['phone_number'];
	  $province = $_POST['province'];
	  $university = $_POST['university'];
	  $fuculty = $_POST['fuculty'];
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
	  $free_cause_detail = $_POST['free_cause_detail'];
	  $free_issue = $_POST['free_issue'];
	  $free_issue_detail = $_POST['free_issue_detail'];
	  $free_important = $_POST['free_important'];
	  $free_important_detail = $_POST['free_important_detail'];
	  $free_work_need = $_POST['free_work_need'];
	  $free_influence = $_POST['free_influence'];
	  $study_major = $_POST['study_major'];
	  $study_faculty = $_POST['study_faculty'];
	  $study_university = $_POST['study_university'];
	  $password = $_POST['password'];

			if ( isset($_POST[profile]) ) {
       	$sql1 = "UPDATE student set  
       			title_name = '$title_name' ,
       			s_name = '$s_name' ,
       			l_name = '$l_name' ,
       			sex = '$sex' ,
       			year_birth = '$year_birth' ,
       			phone_number = '$phone_number' ,
       			province = '$province' ,
       			university = '$university' ,
       			fuculty = '$fuculty' ,
       			major = '$major' ,
       			level_degree = '$level_degree' ,
       			year_success = '$year_success'

        		where email = '$email' ;";
           		$query1 = pg_query($sql1);
           		header('location:setting.php#profile') ; 
		}
			if ( isset($_POST[work_status]) ) {
       	$sql2 = "UPDATE student set  
       			status_work = '$status_work' , 
       			work_name = '$work_name' ,
       			work_company = '$work_company' ,
       			work_type = '$work_type' , 
       			work_type_detail = '$work_type_detail' ,
       			work_detail = '$work_detail' , 
       			work_join = '$work_join' ,
       			work_skill = '$work_skill' ,
       			work_skill_detail = '$work_skill_detail' ,
       			work_complace = '$work_complace' ,
       			work_uncomplace = '$work_uncomplace' ,
       			work_uncomplace_detail = '$work_uncomplace_detail' ,
       			free_cause = '$free_cause' ,
       			free_cause_detail = '$free_cause_detail' ,
       			free_issue = '$free_issue' ,
       			free_issue_detail = '$free_issue_detail' ,
       			free_important = '$free_important' ,
       			free_important_detail = '$free_important_detail' ,
       			free_work_need = '$free_work_need' ,
       			free_influence = '$free_influence' ,
       			study_major = '$study_major' ,
       			study_faculty = '$study_faculty' ,
       			study_university = '$study_university'
        		where email = '$email' ;";

           		$query2 = pg_query($sql2);
           		header('location:setting.php#work-status') ; 
		}
			if ( isset($_POST[password]) ) {

			$sql = "SELECT * from student where password = '$_POST[pass_old]';";
			$query = pg_query($sql);
			$num = pg_num_rows($query);
			if ($num == 1 ){

			$sql3 = "UPDATE student set  
       			password = '$_POST[pass_new]'
       			WHERE email = '$email';";
           		$query3 = pg_query($sql3);
           		header('location:setting.php#password') ; 
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
		<!-- iCheck -->
		<link rel="stylesheet" href="scripts/icheck/skins/all.css">
		<!-- Custom style -->
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/skins/blue.css">
		<link rel="stylesheet" href="css/demo.css">
		<link rel="icon" href="https://www.gistda.or.th/main/sites/default/files/favicon.ico" type="image/png" >
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
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
							<h2 class="aside-title">ตั้งค่า</h2>
								<ul class="nav nav-stacked">
								    <li class="active"><a data-toggle="tab" href="#profile">ข้อมูลส่วนตัว</a></li>
								    <li><a data-toggle="tab" href="#work-status">สถานภาพการทำงาน</a></li>
								    <li><a data-toggle="tab" href="#password">เปลี่ยนรหัสผ่าน</a></li>
								  </ul>
							
							</div>
						</aside>
					</div>
					<div class="col-md-9 ">
						<div class="tab-content">

						  <div id="profile" class="tab-pane fade in active">
<form class="form-validate form-horizontal" id="feedback_form" method="post"  id="frmMyform" action="setting.php" enctype="multipart/form-data">

	
						  	<div class="col-md-12">
								<div class="col-md-2">
									<div class="form-group">
										<label>คำนำหน้า</label>
										<input type="text" name="title_name" class="form-control" required value="<?php echo $user[title_name]; ?>">
									</div>
			
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>ชื่อ</label>
										<input type="text" name="s_name" class="form-control" required value="<?php echo $user[s_name]; ?>">
									</div>
			
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>นามสกุล</label>
										<input type="text" name="l_name" class="form-control" required value="<?php echo $user[l_name]; ?>">
									</div>
									
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label>เพศ</label>
										<select name="sex" class="form-control" required>
											<option value="">กรุณาเลือก</option>
											<option value="ชาย" <?php if($user[sex] == 'ชาย'){echo 'selected';} ?>>ชาย</option>
											<option value="หญิง" <?php if($user[sex] == 'หญิง'){echo 'selected';} ?>>หญิง</option>
										</select>
									</div>
								</div>
							</div>

							<div class="col-md-12">
								<div class="col-md-4">
									<div class="form-group">
										<label>ปีเกิด</label>
										<select name="year_birth" class="form-control" required>
												<option value="">กรุณาเลือก</option>
											<?php for ($i=0; $i < 100; $i++) {  ?>
												<option value="<?php echo 2562- $i ; ?>" <?php if(2562- $i ==$user[year_birth]){echo 'selected';} ?>><?php echo 2562- $i ; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>เบอร์โทรศัพท์</label>
										<input type="number" name="phone_number" class="form-control" required value="<?php echo $user[phone_number]; ?>">
								</div>
				
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>จังหวัดที่อาศัยในปัจจุบัน</label>
										<select class="form-control" name="province" required>
											<option value="">กรุณาเลือก</option>
											<?php $sql_prov = pg_query("select pv_tn from tambon group by pv_tn order by pv_tn asc"); 
											while ($arr_prov = pg_fetch_array($sql_prov)) {
											?>
											<option value="<?php echo $arr_prov[pv_tn]; ?>"<?php if($arr_prov[pv_tn]==$user[province]){echo 'selected';} ?>><?php echo $arr_prov[pv_tn]; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>

							<div class="col-md-12">
								<div class="col-md-4">
									<div class="form-group">
										<label>ชื่อมหาวิทยาลัย</label>
										<input type="text" name="university" class="form-control" required value="<?php echo $user[university]; ?>">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>คณะ</label>
										<input type="text" name="fuculty" class="form-control" required value="<?php echo $user[fuculty]; ?>">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>สาขา</label>
										<input type="text" name="major" class="form-control" required value="<?php echo $user[major]; ?>">
									</div>
								</div>
							</div>

							<div class="col-md-12">
								<div class="col-md-4">
									<div class="form-group">
										<label>ระดับการศึกษา</label>
										<select name="level_degree" class="form-control" required>
											<option value="ปริญญาตรี" <?php if($user[level_degree]=='ปริญญาตรี'){echo 'selected';} ?>>ปริญญาตรี</option>
											<option value="ปริญญาโท" <?php if($user[level_degree]=='ปริญญาโท'){echo 'selected';} ?>>ปริญญาโท</option>
											<option value="ปริญญาเอก" <?php if($user[level_degree]=='ปริญญาเอก'){echo 'selected';} ?>>ปริญญาเอก</option>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>ปีที่สำเร็จการศึกษา</label>
										<select name="year_success" class="form-control">
											<?php for ($i=0; $i < 30; $i++) {  ?>
												<option value="<?php echo 2562- $i ; ?>" <?php if(2562- $i ==$user[year_success]){echo 'selected';} ?>><?php echo 2562- $i ; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<button type="submit" class="btn btn-primary" name="profile">แก้ไขข้อมูล</button>
							</div>
</form>
						  </div>

						  <div id="work-status" class="tab-pane fade">
<form class="form-validate form-horizontal" id="feedback_form" method="post"  id="frmMyform" action="setting.php" enctype="multipart/form-data">
					    	<div class="col-md-3">
							  <div class="form-group">
								<label>สถานภาพการทำงานปัจจุบัน</label>
								<select name="status_work" class="form-control" required=""  onchange="showHide(this)" >
									<option value="">กรุณาเลือก</option>
									<option value="ทำงานแล้ว" <?php if($user[status_work]=='ทำงานแล้ว'){echo 'selected';} ?>>ทำงานแล้ว</option>
									<option value="ยังไม่ได้ทำงาน" <?php if($user[status_work]=='ยังไม่ได้ทำงาน'){echo 'selected';} ?>>ยังไม่ได้ทำงาน</option>
									<option value="กำลังศึกษาต่อ" <?php if($user[status_work]=='กำลังศึกษาต่อ'){echo 'selected';} ?>>กำลังศึกษาต่อ</option>
								</select>
								</div>
					    	</div>
							<div class="col-md-9">					 
								<div id="div2">
								  	<h5>กรุณากรอกข้อมูลเพิ่มเติมสำหรับผู้ที่มีงานทำแล้ว</h5>
								  	<hr>
									<div class="col-md-12">
										<div class="form-group">
											<label>ชื่อตำแหน่งงาน</label>
											<input type="text" name="work_name" class="form-control" value="<?php echo $user[work_name] ;?>">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label>หน่วยงาน</label>
											<input type="text" name="work_company" class="form-control" value="<?php echo $user[work_company] ;?>">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label>ประเภทงานที่ทำ</label>
											<select name="work_type" class="form-control"  onchange="showwork_type(this)">
												<option value="">กรุณาเลือก</option>
												<option value="ข้าราชการ/เจ้าหน้าที่ของรัฐ" <?php if($user[work_type]=='ข้าราชการ/เจ้าหน้าที่ของรัฐ'){echo 'selected';} ?>>ข้าราชการ/เจ้าหน้าที่ของรัฐ</option>
												<option value="รัฐวิสาหกิจ" <?php if($user[work_type]=='รัฐวิสาหกิจ'){echo 'selected';} ?>>รัฐวิสาหกิจ</option>
												<option value="พนักงานบริษัท/องค์กรธุรกิจเอกชน" <?php if($user[work_type]=='พนักงานบริษัท/องค์กรธุรกิจเอกชน'){echo 'selected';} ?>>พนักงานบริษัท/องค์กรธุรกิจเอกชน</option>
												<option value="ดำเนินธุรกิจอิสระ/เจ้าของกิจการ" <?php if($user[work_type]=='ดำเนินธุรกิจอิสระ/เจ้าของกิจการ'){echo 'selected';} ?>>ดำเนินธุรกิจอิสระ/เจ้าของกิจการ</option>
												<option value="พนักงานองค์กรต่างประเทศ/ธรุกิจต่างประเทศ" <?php if($user[work_type]=='พนักงานองค์กรต่างประเทศ/ธรุกิจต่างประเทศ'){echo 'selected';} ?>>พนักงานองค์กรต่างประเทศ/ธรุกิจต่างประเทศ</option>
												<option value="อื่น ๆ" <?php if($user[work_type]=='อื่น ๆ'){echo 'selected';} ?>>อื่น ๆ  
												<input id="work_type" type="text" class="form-control" name="work_type_detail" placeholder="กรุณากรอก" value="<?php echo $user[work_type_detail] ;?>">
												</option>
											</select>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label>ลักษณะงานที่ทำตรงกับสาขาที่ท่านได้สำเร็จการศึกษาหรือไม่</label>
											<select name="work_detail" class="form-control" >
												<option value="">กรุณาเลือก</option>
												<option value="ตรงสาขา" <?php if($user[work_detail]=='ตรงสาขา'){echo 'selected';} ?>>ตรงสาขา</option>
												<option value="ไม่ตรงสาขา" <?php if($user[work_detail]=='ไม่ตรงสาขา'){echo 'selected';} ?>>ไม่ตรงสาขา</option>
											</select>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label>ท่านสามารถนำความรู้จากสาขาวิชาที่เรียนมาประยุกต์ใช้ในหน้าที่การงานที่ทำอยู่ขณะนี้เพียงใด</label>
											<select name="work_join" class="form-control" >
												<option value="">กรุณาเลือก</option>
												<option value="มากที่สุด" <?php if($user[work_join]=='มากที่สุด'){echo 'selected';} ?>>มากที่สุด</option>
												<option value="มาก" <?php if($user[work_join]=='มาก'){echo 'selected';} ?>>มาก</option>
												<option value="ปานกลาง" <?php if($user[work_join]=='ปานกลาง'){echo 'selected';} ?>>ปานกลาง</option>
												<option value="น้อย" <?php if($user[work_join]=='น้อย'){echo 'selected';} ?>>น้อย</option>
											</select>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label>ท่านคิดว่าความรู้ความสารถพิเศษด้านใดที่ช่วยให้ท่านได้ทำงาน</label>
											<select name="work_skill" class="form-control" onchange="showwork_skill(this)" >
												<option value="">กรุณาเลือก</option>
												<option value="ด้านภาษาต่างประเทศ" <?php if($user[work_skill]=='ด้านภาษาต่างประเทศ'){echo 'selected';} ?>>ด้านภาษาต่างประเทศ</option>
												<option value="ด้านการใช้คอมพิวเตอร์" <?php if($user[work_skill]=='ด้านการใช้คอมพิวเตอร์'){echo 'selected';} ?>>ด้านการใช้คอมพิวเตอร์</option>
												<option value="ด้านกิจกรรมสันทนาการ" <?php if($user[work_skill]=='ด้านกิจกรรมสันทนาการ'){echo 'selected';} ?>>ด้านกิจกรรมสันทนาการ</option>
												<option value="ด้านศิลปะ" <?php if($user[work_skill]=='ด้านศิลปะ'){echo 'selected';} ?>>ด้านศิลปะ</option>
												<option value="ด้านกีฬา" <?php if($user[work_skill]=='ด้านกีฬา'){echo 'selected';} ?>>ด้านกีฬา</option>
												<option value="ด้านนาฏศิลป์/ดนตรีขับร้อง" <?php if($user[work_skill]=='ด้านนาฏศิลป์/ดนตรีขับร้อง'){echo 'selected';} ?>>ด้านนาฏศิลป์/ดนตรีขับร้อง</option>
												<option value="อื่น ๆ" <?php if($user[work_skill]=='พอใจ'){echo 'selected';} ?>>อื่น ๆ  
													<input id="work_skill" type="text" class="form-control" name="work_skill_detail" placeholder="กรุณากรอก" value="<?php echo $user[work_skill_detail] ;?>">
												</option>
											</select>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label>ท่านมีความพึงพอใจต่องานที่ทำหรือไม่</label>
											<select name="work_complace" class="form-control" >
												<option value="">กรุณาเลือก</option>
												<option value="พอใจ" <?php if($user[work_complace]=='พอใจ'){echo 'selected';} ?>>พอใจ</option>
												<option value="ไม่พอใจ" <?php if($user[work_complace]=='ไม่พอใจ'){echo 'selected';} ?>>ไม่พอใจ</option>
											</select>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label>ถ้าไม่พอใจ โปรดระบุสาเหตุที่สำคัญที่สุด 1 ข้อต่อไปนี้	</label>
											<select name="work_uncomplace" class="form-control"  onchange="showwork_uncomplace(this)" >
												<option value="">กรุณาเลือก</option>
												<option value="ระบบภายในองค์กร" <?php if($user[work_uncomplace]=='ระบบภายในองค์กร'){echo 'selected';} ?>>ระบบภายในองค์กร</option>
												<option value="มิตรภาพในองค์กร" <?php if($user[work_uncomplace]=='มิตรภาพในองค์กร'){echo 'selected';} ?>>มิตรภาพในองค์กร</option>
												<option value="ไม่ได้นำองค์ความรู้มาปรับใช้ในการทำงาน" <?php if($user[work_uncomplace]=='ไม่ได้นำองค์ความรู้มาปรับใช้ในการทำงาน'){echo 'selected';} ?>>ไม่ได้นำองค์ความรู้มาปรับใช้ในการทำงาน</option>
												<option value="ค่าตอบแทนต่ำ" <?php if($user[work_uncomplace]=='ค่าตอบแทนต่ำ'){echo 'selected';} ?>>ค่าตอบแทนต่ำ</option>
												<option value="ความมั่นคงก้าวหน้าในหน้าที่การงานมีน้อย" <?php if($user[work_uncomplace]=='ความมั่นคงก้าวหน้าในหน้าที่การงานมีน้อย'){echo 'selected';} ?>>ความมั่นคงก้าวหน้าในหน้าที่การงานมีน้อย</option>
												<option value="สวัสดิการของพนักงานไม่เหมาะสม" <?php if($user[work_uncomplace]=='สวัสดิการของพนักงานไม่เหมาะสม'){echo 'selected';} ?>>สวัสดิการของพนักงานไม่เหมาะสม</option>
												<option value="อื่น ๆ" <?php if($user[work_uncomplace]=='อื่น ๆ'){echo 'selected';} ?>>อื่น ๆ  
													<input id="work_uncomplace" type="text" class="form-control" name="work_uncomplace_detail" placeholder="กรุณากรอก"  value="<?php echo $user[work_uncomplace] ;?>">
												</option>
											</select>
										</div>
									</div>
	  							</div>
		  						<div id="div1">
								  	<h5>กรุณากรอกข้อมูลเพิ่มเติมสำหรับผู้ที่ยังไม่ได้ทำงาน</h5>
								  	<hr>
									<div class="col-md-12">
										<div class="form-group">
											<label>สาเหตุที่ยังไม่ได้ทำงาน</label>
											<select name="free_cause" class="form-control" onchange="showfree_cause(this)">
												<option value="">กรุณาเลือก</option>
												<option value="ยังไม่ประสงค์ทำงาน" <?php if($user[free_cause]=='ยังไม่ประสงค์ทำงาน'){echo 'selected';} ?>>ยังไม่ประสงค์ทำงาน</option>
												<option value="ประสงค์ศึกษาต่อ" <?php if($user[free_cause]=='ประสงค์ศึกษาต่อ'){echo 'selected';} ?>>ประสงค์ศึกษาต่อ</option>
												<option value="รอฟังคำตอบจากหน่วยงาน" <?php if($user[free_cause]=='รอฟังคำตอบจากหน่วยงาน'){echo 'selected';} ?>>รอฟังคำตอบจากหน่วยงาน</option>
												<option value="หางานทำไม่ได้" <?php if($user[free_cause]=='หางานทำไม่ได้'){echo 'selected';} ?>>หางานทำไม่ได้</option>
												<option value="อื่น ๆ" <?php if($user[free_cause]=='อื่น ๆ'){echo 'selected';} ?>>อื่น ๆ  
												<input id="free_cause" type="text" class="form-control" name="free_cause_detail" placeholder="กรุณากรอก" value="<?php echo $user[free_cause_detail] ;?>">
												</option>
											</select>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label>ท่านมีปัญหาในการหางานทำหลังสำเร็จการศึกษาหรือไม่</label>
											<select name="free_issue" class="form-control"  onchange="showfree_issue(this)">
												<option value="">กรุณาเลือก</option>
												<option value="มี" <?php if($user[free_issue]=='มี'){echo 'selected';} ?>>มี</option>
												<option value="ไม่มี" <?php if($user[free_issue]=='ไม่มี'){echo 'selected';} ?>>ไม่มี</option>
												<option value="อื่น ๆ" <?php if($user[free_issue]=='อื่น ๆ'){echo 'selected';} ?>>อื่น ๆ  
													<input id="free_issue" type="text" class="form-control" name="free_issue_detail" placeholder="กรุณากรอก" value="<?php echo $user[free_issue_detail] ;?>">>
												</option>
											</select>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label>	ถ้ามีปัญหาโปรดระบุปัญหาสำคัญ </label>
											<select name="free_important" class="form-control" onchange="showfree_important(this)">
												<option value="">กรุณาเลือก</option>
												<option value="ไม่มีข้อมูลหน่วยงานรับสมัคร" <?php if($user[free_important]=='ไม่มีข้อมูลหน่วยงานรับสมัคร'){echo 'selected';} ?>>ไม่มีข้อมูลหน่วยงานรับสมัคร</option>
												<option value="งานที่ทำยังไม่ตรงกับวุฒิการศึกษา" <?php if($user[free_important]=='งานที่ทำยังไม่ตรงกับวุฒิการศึกษา'){echo 'selected';} ?>>งานที่ทำยังไม่ตรงกับวุฒิการศึกษา</option>
												<option value="กระบวนการคัดเลือกหลายขั้นตอน" <?php if($user[free_important]=='กระบวนการคัดเลือกหลายขั้นตอน'){echo 'selected';} ?>>กระบวนการคัดเลือกหลายขั้นตอน</option>
												<option value="ขาดผู้สนับสนุนในการหางาน" <?php if($user[free_important]=='ขาดผู้สนับสนุนในการหางาน'){echo 'selected';} ?>>ขาดผู้สนับสนุนในการหางาน</option>
												<option value="ขาดผู้ค้ำประกัน/เงินค้ำประกัน/ตำแหน่งค้ำประกัน" <?php if($user[free_important]=='ขาดผู้ค้ำประกัน/เงินค้ำประกัน/ตำแหน่งค้ำประกัน'){echo 'selected';} ?>>ขาดผู้ค้ำประกัน/เงินค้ำประกัน/ตำแหน่งค้ำประกัน</option>
												<option value="คุณสมบัติยังไม่ตรงตามความต้องการของบริษัท" <?php if($user[free_important]=='คุณสมบัติยังไม่ตรงตามความต้องการของบริษัท'){echo 'selected';} ?>>คุณสมบัติยังไม่ตรงตามความต้องการของบริษัท</option>
												<option value="ค่าตอบแทนและสวัสดิการไม่เพียงพอ"  <?php if($user[free_important]=='ค่าตอบแทนและสวัสดิการไม่เพียงพอ'){echo 'selected';} ?>>ค่าตอบแทนและสวัสดิการไม่เพียงพอ</option>
												<option value="อื่น ๆ" <?php if($user[free_important]=='อื่น ๆ'){echo 'selected';} ?>>อื่น ๆ  
													<input id="free_important" type="text" class="form-control" name="free_important_detail" placeholder="กรุณากรอก" value="<?php echo $user[free_important_detail] ;?>">>
												</option>
											</select>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label>ลักษณะงานที่ท่านต้องการ</label>
											<select name="free_work_need" class="form-control" ><option value="">กรุณาเลือก</option>
												<option value="ด้านการศึกษา เช่น งานสอน นักวิชาการ ฝึกอบรม เป็นต้น" <?php if($user[free_work_need]=='ด้านการศึกษา เช่น งานสอน นักวิชาการ ฝึกอบรม เป็นต้น'){echo 'selected';} ?>>ด้านการศึกษา เช่น งานสอน นักวิชาการ ฝึกอบรม เป็นต้น</option>
												<option value="ด้านการเกษตร เช่น ประมง เกษตรกรรม ปศุสัตว์ เป็นต้น" <?php if($user[free_work_need]=='ด้านการเกษตร เช่น ประมง เกษตรกรรม ปศุสัตว์ เป็นต้น'){echo 'selected';} ?>>ด้านการเกษตร เช่น ประมง เกษตรกรรม ปศุสัตว์ เป็นต้น</option>
												<option value="ด้านอุตสาหกรรม  เช่น อาหาร สิ่งทอ อิเล็กทรอนิกส์ ก่อสร้าง เหมืองแร่ เป็นต้น" <?php if($user[free_work_need]=='ด้านอุตสาหกรรม  เช่น อาหาร สิ่งทอ อิเล็กทรอนิกส์ ก่อสร้าง เหมืองแร่ เป็นต้น'){echo 'selected';} ?>>ด้านอุตสาหกรรม  เช่น อาหาร สิ่งทอ อิเล็กทรอนิกส์ ก่อสร้าง เหมืองแร่ เป็นต้น</option>
												<option value="ด้านการบริการ เช่น งานขาย บรรณาลักษณ์ กฏหมาย การเมือง เป็นต้น" <?php if($user[free_work_need]=='ด้านการบริการ เช่น งานขาย บรรณาลักษณ์ กฏหมาย การเมือง เป็นต้น'){echo 'selected';} ?>>ด้านการบริการ เช่น งานขาย บรรณาลักษณ์ กฏหมาย การเมือง เป็นต้น</option>
												<option value="ด้านการสื่อสารมวลชน เช่น ผู้สื่อข่าว ช่างภาพ ประชาสัมพันธ์ เป็นต้น" <?php if($user[free_work_need]=='ด้านการสื่อสารมวลชน เช่น ผู้สื่อข่าว ช่างภาพ ประชาสัมพันธ์ เป็นต้น'){echo 'selected';} ?>>ด้านการสื่อสารมวลชน เช่น ผู้สื่อข่าว ช่างภาพ ประชาสัมพันธ์ เป็นต้น</option>
												<option value="ด้านวิทยาศาสตร์และเทคโนโลยี เช่น คอมพิวเตอร์ งานวิจัย เป็นต้น" <?php if($user[free_work_need]=='ด้านวิทยาศาสตร์และเทคโนโลยี เช่น คอมพิวเตอร์ งานวิจัย เป็นต้น'){echo 'selected';} ?>>ด้านวิทยาศาสตร์และเทคโนโลยี เช่น คอมพิวเตอร์ งานวิจัย เป็นต้น</option>
											</select>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label>ผู้ที่มีอิทธิพลต่อการตัดสินใจในการหางานทำ</label>
											<select name="free_influence" class="form-control"><option value="">กรุณาเลือก</option>
												<option value="ตัวเอง" <?php if($user[free_influence]=='ตัวเอง'){echo 'selected';} ?>>ตัวเอง</option>
												<option value="เพื่อน" <?php if($user[free_influence]=='เพื่อน'){echo 'selected';} ?>>เพื่อน</option>
												<option value="ครอบครัว" <?php if($user[free_influence]=='ครอบครัว'){echo 'selected';} ?>>ครอบครัว</option>
											</select>
										</div>
									</div>
		 						</div>
		 						<div id="div3">
								  	<h5>กรุณากรอกข้อมูลเพิ่มเติมการศึกษาต่อ</h5>
								  	<hr>
									<div class="col-md-12">
										<div class="form-group">
											<label>สาขาวิชา</label>
											<input type="text" name="study_major" class="form-control" value="<?php echo $user[study_major] ;?>">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label>ภาควิชา</label>
											<input type="text" name="study_faculty" class="form-control" value="<?php echo $user[study_faculty] ;?>">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label>สถาบันศึกษา</label>
											<input type="text" name="study_university" class="form-control" value="<?php echo $user[study_university] ;?>">
										</div>
									</div>
		  						</div>
							</div>
					    	<div class="col-md-12">
							  <button type="submit" class="btn btn-primary" name="work_status">บันทึกข้อมูล</button>
					    	</div>
									 
</form>
						  </div>

						  <div id="password" class="tab-pane fade aside-body">
							
<form class="form-validate form-horizontal" id="feedback_form" method="post"  id="frmMyform" action="setting.php" enctype="multipart/form-data">
					    	<div class="col-md-6">
							  <div class="form-group">
							    <label for="pwd">กรอกรหัสผ่านเดิม *</label>
							    <input type="password" class="form-control" id="pwd" required="" name="pass_old" placeholder="รหัสผ่านเดิม">
							  </div>
					    	</div>
					    	<div class="col-md-6">
							  <div class="form-group">
							    <label for="pwd">กรอกรหัสใหม่ *</label>
							    <input type="password" class="form-control" id="pwd" required="" name="pass_new" placeholder="รหัสผ่านใหม่">
							  </div>
					    	</div>
					    	<div class="col-md-12">
							  <button type="submit" class="btn btn-primary" name="password">บันทึกข้อมูล</button>
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
		<script src="js/jquery.migrate.js"></script>
		<script src="scripts/bootstrap/bootstrap.min.js"></script>
		<script>var $target_end=$(".best-of-the-week");</script>
		<script src="scripts/jquery-number/jquery.number.min.js"></script>
		<script src="scripts/owlcarousel/dist/owl.carousel.min.js"></script>
		<script src="scripts/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
		<script src="scripts/easescroll/jquery.easeScroll.js"></script>
		<script src="scripts/sweetalert/dist/sweetalert.min.js"></script>
		<script src="scripts/icheck/icheck.min.js"></script>
		<script src="scripts/toast/jquery.toast.min.js"></script>
		<script>
			$("input").iCheck({
		checkboxClass: 'icheckbox_square-blue',
		radioClass: 'iradio_square-blue',
		cursor: true
			});
		</script>
		<script src="js/e-magz.js"></script>
		<script src="app.js" type="text/javascript" charset="utf-8" async defer></script>
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"  ></script>
		<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js" ></script>
		<script type="text/javascript">
		$(function(){
			var hash = window.location.hash;
			hash && $('ul.nav a[href="' + hash + '"]').tab('show');
			$('.nav-stacked a').click(function (e) {
			$(this).tab('show');
			var scrollmem = $('body').scrollTop();
			window.location.hash = this.hash;
			$('html,body').scrollTop(scrollmem);
			});
			});
		</script>
	</body>
</html>