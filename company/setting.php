<!DOCTYPE html>
<?php
session_start();
include 'config.php';

	  $email = $user['email'];
	  $title_name = $_POST['title_name'];
	  $s_name = $_POST['s_name'];
	  $l_name = $_POST['l_name'];
	  $sex = $_POST['sex'];

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
		<link rel="stylesheet" href="../scripts/bootstrap/bootstrap.min.css">
		<!-- IonIcons -->
		<link rel="stylesheet" href="../scripts/ionicons/css/ionicons.min.css">
		<!-- Toast -->
		<link rel="stylesheet" href="../scripts/toast/jquery.toast.min.css">
		<!-- OwlCarousel -->
		<link rel="stylesheet" href="../scripts/owlcarousel/dist/assets/owl.carousel.min.css">
		<link rel="stylesheet" href="../scripts/owlcarousel/dist/assets/owl.theme.default.min.css">
		<!-- Magnific Popup -->
		<link rel="stylesheet" href="../scripts/magnific-popup/dist/magnific-popup.css">
		<link rel="stylesheet" href="../scripts/sweetalert/dist/sweetalert.css">
		<!-- iCheck -->
		<link rel="stylesheet" href="../scripts/icheck/skins/all.css">
		<!-- Custom style -->
		<link rel="stylesheet" href="../css/style.css">
		<link rel="stylesheet" href="../css/skins/blue.css">
		<link rel="stylesheet" href="../css/demo.css">
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
		<script src="../js/jquery.js"></script>
		<script src="../js/jquery.migrate.js"></script>
		<script src="../scripts/bootstrap/bootstrap.min.js"></script>
		<script>var $target_end=$(".best-of-the-week");</script>
		<script src="../scripts/jquery-number/jquery.number.min.js"></script>
		<script src="../scripts/owlcarousel/dist/owl.carousel.min.js"></script>
		<script src="../scripts/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
		<script src="../scripts/easescroll/jquery.easeScroll.js"></script>
		<script src="../scripts/sweetalert/dist/sweetalert.min.js"></script>
		<script src="../scripts/icheck/icheck.min.js"></script>
		<script src="../scripts/toast/jquery.toast.min.js"></script>
		<script>
			$("input").iCheck({
		checkboxClass: 'icheckbox_square-blue',
		radioClass: 'iradio_square-blue',
		cursor: true
			});
		</script>
		<script src="../js/e-magz.js"></script>
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

 
	<?php  if ( $user[status_work]=='ทำงานแล้ว' ) { ?>
		document.getElementById('div2').style.display = 'inline';
        document.getElementById('div1').style.display = 'none';
        document.getElementById('div3').style.display = 'none';
	<?php }else  if ( $user[status_work]=='ยังไม่ได้ทำงาน' ) { ?>
		document.getElementById('div2').style.display = 'none';
        document.getElementById('div1').style.display = 'inline';
        document.getElementById('div3').style.display = 'none';
	<?php }else  if ( $user[status_work]=='กำลังศึกษาต่อ' ) { ?>
		document.getElementById('div2').style.display = 'none';
        document.getElementById('div1').style.display = 'none';
        document.getElementById('div3').style.display = 'inline';
   	<?php } ?>


		</script>
	</body>
</html>