<!DOCTYPE html>
<?php 
	include 'config.php';

	   $email = $user['email'];

       $sql = "SELECT * FROM resume WHERE email = '$email'; ";
	   $query = pg_query($sql);
	   $resume = pg_fetch_array($query)
	
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
							<table>
								<tr><b><a href="">ข้อมูลส่วนตัว</a> </b></tr>&nbsp;&nbsp;
								<tr><b><a href="">การศึกษา</a></b></tr>&nbsp;&nbsp;
								<tr><b><a href="">ทักษะ</a></b></tr>&nbsp;&nbsp;
								<tr><b><a href="">ประวัติการทำงาน/ฝึกงาน</a></b></tr>&nbsp;&nbsp;
								<tr><b><a href="">ประวัติการฝึกอบรม</a></b></tr>&nbsp;&nbsp;
							</table>
							
			<hr>

<form class="form-validate form-horizontal" id="feedback_form" method="post"  id="frmMyform" action="resume-edit.php" enctype="multipart/form-data">
	<div class="col-md-12">
		<div class="col-md-2">
								<div class="form-group">
									<!-- <label>คำนำหน้า</label> -->
									<!-- <input type="text" name="title_name" class="form-control" required="" value="<?php echo $resume[title_name] ;?>"> -->
									<br><button type="button" class="btn btn-primary">ข้อมูลส่วนตัว</button>
								</div>
			
		</div>
		<div class="col-md-2">
								<div class="form-group">
									<label>คำนำหน้า</label>
									<input type="text" name="title_name" class="form-control" required="" value="<?php echo $resume[title_name] ;?>">
								</div>
			
		</div>
		<div class="col-md-4">
								<div class="form-group">
									<label>ชื่อ</label>
									<input type="text" name="s_name" class="form-control" required="" value="<?php echo $resume[s_name] ;?>">
								</div>
			
		</div>
		<div class="col-md-4">
								<div class="form-group">
									<label>นามสกุล</label>
									<input type="text" name="l_name" class="form-control" required="" value="<?php echo $resume[l_name] ;?>">
								</div>
			
		</div>
	</div>
	<div class="col-md-12">
			<div class="col-md-2">
									<div class="form-group">
										<!-- <label>ที่อยู่</label>
										<input type="text" name="address" class="form-control" required="" value="<?php echo $resume[address] ;?>"> -->
										<br><button type="button" class="btn btn-primary">การศึกษา</button>
								</div>
			</div>
			<div class="col-md-2">
								<div class="form-group">
									<label>ที่อยู่</label>
									<input type="text" name="address" class="form-control" required="" value="<?php echo $resume[address] ;?>"> 
								</div>
				
			</div>
			<div class="col-md-3">
								<div class="form-group">
									<label>จังหวัด</label>
									<span id="province">
		                            <select class="form-control m-bot15" class="form-control"  name="province">
		                                 <option value=''>เลือกจังหวัด</option>
		                            </select>
		                        </span>
								</div>
				
			</div>
			<div class="col-md-2">
								<div class="form-group">
									<label>อำเภอ</label>
									<span id="amphoe">
		                            <select class="form-control m-bot15" class="form-control"  name="amphoe">
		                                 <option value=''>เลือกอำเภอ</option>
		                            </select>
		                        </span>
								</div>
				
			</div>
			<div class="col-md-2">
								<div class="form-group">
									<label>ตำบล</label>
									<span id="tambon">
		                            <select class="form-control m-bot15" class="form-control"  name="tambon">
		                                 <option value=''>เลือกตำบล</option>
		                            </select>
		                        </span>
								</div>
				
			</div>
			<div class="col-md-1">
								<div class="form-group">
									<label>รหัสไปรษณืย์</label>
									<input type="text" name="zip_code" class="form-control"  value="<?php echo $resume[zip_code] ;?>">
								</div>
				
			</div>
	</div>
	<div class="col-md-12">
					<div class="col-md-2">
								<div class="form-group">
									<!-- <label>สัญชาติ</label>
									<select name="nationality" class="form-control">
										<option value="ไทย"<?php if($resume[nationality]=='ไทย'){echo 'selected';} ?>>ไทย</option>
										<option value="อื่น ๆ"<?php if($resume[nationality]=='อื่น ๆ'){echo 'selected';} ?>>อื่น ๆ</option>
									</select> -->
									<br><button type="button" class="btn btn-primary">ทักษะ</button>
								</div>
			
					</div>
					<div class="col-md-2">
								<div class="form-group">
									<label>สัญชาติ</label>
									<select name="nationality" class="form-control">
										<option value="ไทย"<?php if($resume[nationality]=='ไทย'){echo 'selected';} ?>>ไทย</option>
										<option value="อื่น ๆ"<?php if($resume[nationality]=='อื่น ๆ'){echo 'selected';} ?>>อื่น ๆ</option>
									</select> 
								</div>
			
					</div>
					<div class="col-md-2">
								<div class="form-group">
									<label>ศาสนา</label>
									<select name="religion" class="form-control" >
										<option value="พุทธ"<?php if($resume[religion]=='พุทธ'){echo 'selected';} ?>>พุทธ</option>
										<option value="คลิสต์"<?php if($resume[religion]=='คลิสต์'){echo 'selected';} ?>>คลิสต์</option>
										<option value="อิสลาม"<?php if($resume[religion]=='อิสลาม'){echo 'selected';} ?>>อิสลาม</option>
									</select>
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
					<div class="col-md-2">
								<div class="form-group">
									<label>วันเกิด</label>
									<input type="date" name="birthday" class="form-control" value="<?php echo $resume[birthday] ;?>">
								</div>
					</div>

		</div>
		<div class="col-md-12">
			<div class="col-md-2">
									<div class="form-group">
										<br><button type="button" class="btn btn-primary">ประวัติการทำงาน/<br>ฝึกงาน</button>
										<!-- <label>เบอร์โทรศัพท์</label>
										<input type="text" name="l_name" class="form-control" required="" value="<?php echo $resume[phone] ;?>"> -->
								</div>
			</div>
				<div class="col-md-4">
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
				<div class="col-md-4">
								<div class="form-group">
									<label>ชื่อมหาวิทยาลัย</label>
									<input type="text" name="university" class="form-control" value="<?php echo $resume[university] ;?>">
								</div>
				</div>
			<div class="col-md-4">
								<div class="form-group">
									<label>คณะ</label>
									<input type="text" name="faculty" class="form-control" value="<?php echo $resume[faculty] ;?>">
								</div>
				
			</div>
			<div class="col-md-4">
								<div class="form-group">
									<label>สาขาวิชา</label>
									<input type="text" name="sector" class="form-control" value="<?php echo $resume[sector] ;?>">
								</div>
				
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
	</body>
</html>