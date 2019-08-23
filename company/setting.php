<!DOCTYPE html>
<?php
session_start();
include 'config.php';

	  $email_com = $company['email_com'];
	  $name_com = $_POST['name_com'];
	  $detail_com = $_POST['detail_com'];
	  $website_com = $_POST['website_com'];
	  $address_com = $_POST['address_com'];
	  $tambon_com = $_POST['tambon_com'];
	  $amphoe_com = $_POST['amphoe_com'];
	  $province_com = $_POST['province_com'];
	  $zipcode_com = $_POST['zipcode_com'];
	  $phone_com = $_POST['phone_com'];
	  $fax_com = $_POST['fax_com'];
	  $type_com = $_POST['type_com'];
	  $lat_com = $_POST['lat_com'];
	  $lon_com = $_POST['lon_com'];
	  $date_com = $_POST['date_com'];
	  $user_name = $_POST['user_name'];
	  $password = $_POST['password'];
	  $status_company = $_POST['status_company'];
	  $logo_img = $_POST['logo_img'];
	 
		 
		 	if ( isset($_POST[profile]) ) {
       	$sql1 = "UPDATE company set  
       			name_com = '$name_com' ,
       			detail_com = '$detail_com' ,
       			website_com = '$website_com' ,
       			address_com = '$address_com' ,
       			province_com = '$province_com' ,
       			amphoe_com = '$amphoe_com' ,
       			tambon_com = '$tambon_com' ,
       			zipcode_com = '$zipcode_com' ,
       			phone_com = '$phone_com' ,
       			fax_com = '$fax_com' ,
       			type_com = '$type_com'

        		where email_com = '$email_com' ;";
           		$query1 = pg_query($sql1);
           		header('location:setting.php#profile') ; 
		}
			



		if ( isset($_POST[password]) ) {

			$salt = 'gistnu@geojobs'; 

			$pass_old = sha1($_POST[pass_old].$salt);
			$pass_new = sha1($_POST[pass_new].$salt);


			$sql = "SELECT * from company where password = '$pass_old';";
			$query = pg_query($sql);
			$num = pg_num_rows($query);
			if ($num == 1 ){

			$sql3 = "UPDATE company set  
       			password = '$pass_new'
       			WHERE email_com = '$email_com';";
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
							  	<div class="col-md-12">
									<div class="form-group">
										<label>ชื่อสถานภูมิภาค</label>
										<input type="text" name="name_com" class="form-control" required value="<?php echo $company[name_com]; ?>">
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="col-md-12">
									<div class="form-group">
										<label>รายละเอียด</label>
										<input type="text" name="detail_com" class="form-control" required value="<?php echo $company[detail_com]; ?>">
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="col-md-12">
									<div class="form-group">
										<label>เว็บไซต์</label>
										<input type="text" name="website_com" class="form-control" required value="<?php echo $company[website_com]; ?>">
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="col-md-12">
									<div class="form-group">
										<label>ที่อยู่ติดต่อ</label>
										<input type="text" name="address_com" class="form-control" required value="<?php echo $company[address_com]; ?>">
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="col-md-3">
									<div class="form-group">
										<label>จังหวัด</label>
										<span id="province_edit">
			                            	<select class="form-control m-bot15" class="form-control"  name="province_com" required>
			                                 <option value=''>เลือกจังหวัด</option>
				                            </select>
			                        	</span>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>อำเภอ</label>
										<span id="amphoe_edit">
				                            <select class="form-control m-bot15" class="form-control"  name="amphoe_com"  required> 
				                                 <option  value="<?php echo $company[amphoe_com] ;?>"><?php echo $company[amphoe_com] ;?></option>
				                            </select>
		                        		</span>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>ตำบล</label>
										<span id="tambon_edit">
				                            <select class="form-control m-bot15" class="form-control"  name="tambon_com" required>
				                                 <option value='<?php echo $company[tambon_com] ;?>'><?php echo $company[tambon_com] ;?></option>
				                            </select>
			                        	</span>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>รหัสไปรษณีย์</label>
										<input type="text" name="zipcode_com" class="form-control" required value="<?php echo $company[zipcode_com]; ?>">
									</div>
								</div>
							</div>

							<div class="col-md-12">
								<div class="col-md-4">
									<div class="form-group">
										<label>หมายเลขโทรศัพท์</label>
										<input type="text" name="phone_com" class="form-control" required value="<?php echo $company[phone_com]; ?>">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>หมายเลขแฟกซ์</label>
										<input type="text" name="fax_com" class="form-control" required value="<?php echo $company[fax_com]; ?>">
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="col-md-12">
									<div class="form-group">
										<label>ประเภทสถานประกอบการ</label>
										<select  id="select"  class="form-control"  name="type_com" required> 
										  <option value="ยังไม่ได้กำหนด" <?php if($company[type_com]=='ยังไม่ได้กำหนด'){echo 'selected';} ?>>-- กรุณาเลือก --</option>
										  <option value="กฎหมาย"<?php if($company[type_com]=='กฎหมาย'){echo 'selected';} ?>>กฎหมาย</option>
										  <option value="ก่อสร้าง/ผลิตและจัดจำหน่ายอุปกรณ์ก่อสร้าง" <?php if($company[type_com]=='ก่อสร้าง/ผลิตและจัดจำหน่ายอุปกรณ์ก่อสร้าง'){echo 'selected';} ?>>ก่อสร้าง/ผลิตและจัดจำหน่ายอุปกรณ์ก่อสร้าง</option>
										  <option value="การโดยสารทางอากาศ/ทางบก/ทางน้ำ" <?php if($company[type_com]=='การโดยสารทางอากาศ/ทางบก/ทางน้ำ'){echo 'selected';} ?>>การโดยสารทางอากาศ/ทางบก/ทางน้ำ</option>
										  <option value="การขนส่งและคลังสินค้า/นำเข้าและส่งออก" <?php if($company[type_com]=='การขนส่งและคลังสินค้า/นำเข้าและส่งออก'){echo 'selected';} ?>>การขนส่งและคลังสินค้า/นำเข้าและส่งออก</option>
										  <option value="สถาบันการศึกษาและแนะแนวอาชีพ" <?php if($company[type_com]=='สถาบันการศึกษาและแนะแนวอาชีพ'){echo 'selected';} ?>>สถาบันการศึกษาและแนะแนวอาชีพ</option>
										  <option value="เกษตรกรรม/ประมง" <?php if($company[type_com]=='กษตรกรรม/ประมง'){echo 'selected';} ?>>เกษตรกรรม/ประมง</option>
										  <option value="การท่องเที่ยว" <?php if($company[type_com]=='การท่องเที่ยว'){echo 'selected';} ?>>การท่องเที่ยว</option>
										  <option value="หน่วยงานราชการ" <?php if($company[type_com]=='หน่วยงานราชการ'){echo 'selected';} ?>>หน่วยงานราชการ</option>
										  <option value="การผลิตและจำหน่ายเคมีภัณฑ์" <?php if($company[type_com]=='การผลิตและจำหน่ายเคมีภัณฑ์'){echo 'selected';} ?>>การผลิตและจำหน่ายเคมีภัณฑ์</option>
										  <option value="การวิจัยและพัฒนา" <?php if($company[type_com]=='การวิจัยและพัฒนา'){echo 'selected';} ?>>การวิจัยและพัฒนา</option>
										  <option value="โทรคมนาคม" <?php if($company[type_com]=='โทรคมนาคม'){echo 'selected';} ?>>โทรคมนาคม</option>
										  <option value="ตัวแทนขายส่ง/ขายปลีก" <?php if($company[type_com]=='ตัวแทนขายส่ง/ขายปลีก'){echo 'selected';} ?>>ตัวแทนขายส่ง/ขายปลีก</option>
										  <option value="บัญชี" <?php if($company[type_com]=='บัญชี'){echo 'selected';} ?>>บัญชี </option>
										  <option value="เทคโนโลยีสารสนเทศ" <?php if($company[type_com]=='เทคโนโลยีสารสนเทศ'){echo 'selected';} ?>>เทคโนโลยีสารสนเทศ</option>
										  <option value="มูลนิธิ และสังคมสงเคราะห์" <?php if($company[type_com]=='มูลนิธิ และสังคมสงเคราะห์'){echo 'selected';} ?>>มูลนิธิ และสังคมสงเคราะห์</option>
										  <option value="โรงแรม/รีสอร์ท/ที่พัก" <?php if($company[type_com]=='โรงแรม/รีสอร์ท/ที่พัก'){echo 'selected';} ?>>โรงแรม/รีสอร์ท/ที่พัก</option>
										  <option value="รับจัดอีเว้นท์ (Organizer)" <?php if($company[type_com]=='รับจัดอีเว้นท์ (Organizer)'){echo 'selected';} ?>>รับจัดอีเว้นท์ (Organizer)</option>
										  <option value="สุขภาพและความงาม" <?php if($company[type_com]=='สุขภาพและความงาม'){echo 'selected';} ?>>สุขภาพและความงาม</option>
										  <option value="สถาบันการเงิน/การประกันภัย/เงินทุนหลักทรัพย์" <?php if($company[type_com]=='สถาบันการเงิน/การประกันภัย/เงินทุนหลักทรัพย์'){echo 'selected';} ?>>สถาบันการเงิน/การประกันภัย/เงินทุนหลักทรัพย์</option>
										  <option value="สื่อสารมวลชนและการผลิตสื่อสิ่งพิมพ์" <?php if($company[type_com]=='สื่อสารมวลชนและการผลิตสื่อสิ่งพิมพ์'){echo 'selected';} ?>>สื่อสารมวลชนและการผลิตสื่อสิ่งพิมพ์</option>
										  <option value="เหมืองแร่/ไฟฟ้า/ก๊าซ/ประปา/ปิโตรเคมี" <?php if($company[type_com]=='เหมืองแร่/ไฟฟ้า/ก๊าซ/ประปา/ปิโตรเคมี'){echo 'selected';} ?>>เหมืองแร่/ไฟฟ้า/ก๊าซ/ประปา/ปิโตรเคมี</option>
										  <option value="อสังหาริมทรัพย์" <?php if($company[type_com]=='อสังหาริมทรัพย์'){echo 'selected';} ?>>อสังหาริมทรัพย์ </option>
										  <option value="อุตสาหกรรมยานยนต์" <?php if($company[type_com]=='อุตสาหกรรมยานยนต์'){echo 'selected';} ?>>อุตสาหกรรมยานยนต์</option>
										  <option value="อาหาร/เครื่องดื่ม (ผลิต/จำหน่าย)" <?php if($company[type_com]=='อาหาร/เครื่องดื่ม (ผลิต/จำหน่าย)'){echo 'selected';} ?>>อาหาร/เครื่องดื่ม (ผลิต/จำหน่าย)</option>
										  <option value="อุตสาหกรรมการผลิตอื่นๆ" <?php if($company[type_com]=='อุตสาหกรรมการผลิตอื่นๆ'){echo 'selected';} ?>>อุตสาหกรรมการผลิตอื่นๆ</option>
										  <option value="อื่นๆ" <?php if($company[type_com]=='อื่นๆ'){echo 'selected';} ?>>อื่นๆ</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="col-md-12">
									<div class="form-group">
										<label>อีเมล</label>
										<input type="text" name="email_com" class="form-control" required value="<?php echo $company[email_com]; ?>" readonly="readonly">
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
	             req.open("GET", "location.php?data="+src+"&val="+val+"&province=<?php echo $company[province_com]; ?>"); 
	             req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); 
	             req.send(null); 
	        }

	        window.onLoad=dochange('province_edit', -1);  
    	</script>
	</body>
</html>