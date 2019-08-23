<!DOCTYPE html>
<?php
session_start();
include("config.php");
	  $email = $user['email'];
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
	  $password = $_POST['password'];

	   if ( isset($_POST[profile]) ) {
        $sql1 = "UPDATE resume set 
        		title_name = '$title_name' ,
        		s_name = '$s_name' , 
        		l_name = '$l_name' ,
        		sex = '$sex' ,
        		year_birth = '$year_birth',
        		phone_number = '$phone_number' ,
        		province = '$province' ,
        		university = '$university' ,
        		facutly = '$facutly' ,
        		major = '$major' ,
        		level_degree = '$level_degree' ,
        		year_success = '$year_success'
        		where email = '$email';";       
           		$query1 = pg_query($sql1);
           		header('location:setting.php#profile') ; 
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
<form class="form-validate form-horizontal" id="feedback_form" method="post"  id="frmMyform" action="setting.php.php" enctype="multipart/form-data">
						  	<div class="col-md-12">
								<div class="col-md-2">
									<div class="form-group">
										<label>คำนำหน้า</label>
										<input type="text" name="title_name" class="form-control" required="" value="<?php echo $user[title_name]; ?>">
									</div>
			
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>ชื่อ</label>
										<input type="text" name="s_name" class="form-control" required="" value="<?php echo $user[s_name]; ?>">
									</div>
			
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>นามสกุล</label>
										<input type="text" name="l_name" class="form-control" required="" value="<?php echo $user[l_name]; ?>">
									</div>
									
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label>เพศ</label>
										<select name="sex" class="form-control" required="">
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
										<select name="year_birth" class="form-control" required="">
												<option value="">กรุณาเลือก</option>
											<?php for ($i=0; $i < 100; $i++) {  ?>
<<<<<<< HEAD
												<option value="<?php echo 2562- $i ; ?>" <?php if(2562- $i ==$user[year_birth]){echo 'selected';} ?>><?php echo 2562- $i ; ?></option>
=======
												<option value="<?php echo 2562- $i ; ?>" <?php if(2562- $i == $user[year_birth]){ echo 'selected';} ?> ><?php echo 2562- $i ; ?></option>
>>>>>>> 631c3ed4dbe3711c50236256f56eb29f62c2153a
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>เบอร์โทรศัพท์</label>
										<input type="number" name="phone_number" class="form-control" required=""value="<?php echo $user[phone_number]; ?>">
								</div>
				
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>จังหวัดที่อาศัยในปัจจุบัน</label>
										<select class="form-control" name="province" required="" >
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
										<input type="text" name="university" class="form-control" required="" value="<?php echo $user[university]; ?>">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>คณะ</label>
										<input type="text" name="fuculty" class="form-control" required="" value="<?php echo $user[fuculty]; ?>">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>สาขา</label>
										<input type="text" name="major" class="form-control" required="" value="<?php echo $user[major]; ?>">
									</div>
								</div>
							</div>

							<div class="col-md-12">
								<div class="col-md-4">
									<div class="form-group">
										<label>ระดับการศึกษา</label>
										<select name="level_degree" class="form-control" required="">
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
												<option value="<?php echo 2562- $i ; ?>" <?php if(2562- $i == $user[year_success]){ echo 'selected';} ?>><?php echo 2562- $i ; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-12">
							  <button type="submit" name="profile" class="btn btn-primary">บันทึกข้อมูล</button>
					    	</div>
</form>
						  </div>

						  <div id="work-status" class="tab-pane fade">
<form class="form-validate form-horizontal" id="feedback_form" method="post"  id="frmMyform" action="setting.php.php" enctype="multipart/form-data">
					    	<div class="col-md-3">
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
							<div class="col-md-9">					 
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
									  <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
							    	</div>
									 
</form>
						  </div>

						  <div id="password" class="tab-pane fade aside-body">
							
							    <form action="/action_page.php">
							    	<div class="col-md-6">
									  <div class="form-group">
									    <label for="pwd">กรอกรหัสผ่านเดิม :</label>
									    <input type="password" class="form-control" id="pwd">
									  </div>
							    	</div>
							    	<div class="col-md-6">
									  <div class="form-group">
									    <label for="pwd">กรอกรหัสใหม่ :</label>
									    <input type="password" class="form-control" id="pwd">
									  </div>
							    	</div>
							    	<div class="col-md-12">
									  <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
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