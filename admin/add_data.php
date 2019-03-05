<!DOCTYPE html>
<?php
session_start();

include("config.php");

// if(!isset($_COOKIE["type"]))
// {
//  header("location:login.php");
// }
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="description" content="JOBGIS GISTDA GISTNU JOB GIST GIS GEOINFOMETIC">
		<meta name="author" content="GISTNU by Teerayoot injun Teerayoot5056@gmail.com">
		<meta name="keyword" content="JOBGIS,GISTDA,GISTNU,JOB,GIST,GIS,GEOINFOMETIC">
		<!-- Shareable -->
		<meta property="og:title" content="JOBGIS GISTDA GISTNU JOB GIST GIS GEOINFOMETIC" />
		<meta property="og:type" content="article" />
		<meta property="og:url" content="http://github.com/nauvalazhar/Magz" />
		<meta property="og:image" content="images/gistda_logo.png" />
		<title>JOB GIS &mdash; GISTDA  </title>
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
		<!-- Custom style -->
		<link rel="stylesheet" href="../css/style.css">
		<link rel="stylesheet" href="../css/skins/blue.css">
		<link rel="stylesheet" href="../css/demo.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
		<link rel="icon" href="https://www.gistda.or.th/main/sites/default/files/favicon.ico" type="image/png" >
		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/modules/exporting.js"></script>
		<script src="https://code.highcharts.com/modules/export-data.js"></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css" integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js" integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg==" crossorigin=""></script>



		<link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">

	</head>

	<body class="skin-blue">

		<?php include 'header.php'; ?>

		<section class="home">
			<div class="container">
				<div class="row">

					<div class="col-md-12 col-sm-12 col-xs-12">
						<ul class="nav nav-pills">
						  <li class="active"><a  class="btn btn-primary btn-lg" data-toggle="pill" href="#home">นำเข้าจากไฟล์ Excel</a></li>
						  <li><a class="btn btn-primary btn-lg" data-toggle="pill" href="#menu1">นำเข้าจากหน้าระบบ</a></li>
						  <li><a class="btn btn-primary btn-lg" data-toggle="pill" href="#menu2">รายชื่อที่นำเข้าแล้ว</a></li>
						</ul>

						<div class="tab-content">

						  <div id="home" class="tab-pane fade in active">
						    	<div class="jumbotron">
								  <p class="lead">
								    <a class="btn btn-primary btn-lg" href="#" role="button">กดดาวน์โหลดแบบฟอร์ม excel เพื่อกรอกข้อมูล</a>
								  </p>

								  <hr>
								  <div class="form-group">
								  	<p>เลือกไฟล์ Excel เพื่อนำเข้าฐานข้อมูล</p>
								      <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
								      <small id="fileHelp" class="form-text text-muted">* กรุณาตรวจสอบข้อมูลก่อนนำเข้า</small>
								    </div>	
								</div>

						  </div>

						  <div id="menu1" class="tab-pane fade">
<div class="jumbotron">
						    	<h5>กรุณากรอกข้อมูลให้ครบถ้วน</h5>
<form class="form-validate form-horizontal" id="feedback_form" method="post" action="register.php" enctype="multipart/form-data">

											<div class="form-group">
												<label>คำนำหน้า</label>
												<input type="text" name="title_name" class="form-control">
											</div>
											<div class="form-group">
												<label>ชื่อ</label>
												<input type="text" name="s_name" class="form-control">
											</div>
											<div class="form-group">
												<label>นามสกุล</label>
												<input type="text" name="l_name" class="form-control">
											</div>
											<div class="form-group">
												<label>ชื่อมหาวิทยาลัย</label>
												<input type="text" name="university" class="form-control">
											</div>
											<div class="form-group">
												<label>ระดับ</label>
												<input type="text" name="success_degree" class="form-control">
											</div>
											<div class="form-group">
												<label>คณะ</label>
												<input type="text" name="facutly" class="form-control">
											</div>
											<div class="form-group">
												<label>สาขา</label>
												<input type="text" name="major" class="form-control">
											</div>
											<div class="form-group">
												<label>วุฒิที่สำเร็จการศึกษา</label>
												<input type="text" name="qualification" class="form-control">
											</div>
											<div class="form-group">
												<label>ปีที่เริ่มเข้าศึกษา</label>
												<input type="number" name="year_start" class="form-control">
											</div>
											<div class="form-group">
												<label>ปีที่จบการศึกษา</label>
												<input type="number" name="year_end" class="form-control">
											</div>
											<div class="form-group">
												<label>เบอร์โทรศัพท์</label>
												<input type="text" name="phone_number" class="form-control">
											</div>

											<div class="form-group">
												<label>Email</label>
												<input type="email" name="email" class="form-control">
											</div>

											<div class="form-group text-right">
												<button type="submit" name="submit_form" class="btn btn-primary btn-block">บันทึกข้อมูล</button>
											</div>
</form>
							</div>
					
						  </div>

						  <div id="menu2" class="tab-pane fade">
						  	<div class="jumbotron">
						    <table id="example" class="display" style="width:100%">
						        <thead>
						            <tr>
						                <th>ชื่อ - นามสกุล</th>
						                <th>มหาวิทยาลัยน</th>
						                <th>ระดับ</th>
						                <th>คณะ</th>
						                <th>สาขา</th>
						                <th>อีเมล</th>
						            </tr>
						        </thead>
						        <tbody>
						            <tr>
						                <td>Tiger Nixon</td>
						                <td>System Architect</td>
						                <td>Edinburgh</td>
						                <td>61</td>
						                <td>2011/04/25</td>
						                <td>$320,800</td>
						            </tr>
						            <tr>
						                <td>Garrett Winters</td>
						                <td>Accountant</td>
						                <td>Tokyo</td>
						                <td>63</td>
						                <td>2011/07/25</td>
						                <td>$170,750</td>
						            </tr>
						            <tr>
						                <td>Ashton Cox</td>
						                <td>Junior Technical Author</td>
						                <td>San Francisco</td>
						                <td>66</td>
						                <td>2009/01/12</td>
						                <td>$86,000</td>
						            </tr>
						            <tr>
						                <td>Cedric Kelly</td>
						                <td>Senior Javascript Developer</td>
						                <td>Edinburgh</td>
						                <td>22</td>
						                <td>2012/03/29</td>
						                <td>$433,060</td>
						            </tr>
						            <tr>
						                <td>Airi Satou</td>
						                <td>Accountant</td>
						                <td>Tokyo</td>
						                <td>33</td>
						                <td>2008/11/28</td>
						                <td>$162,700</td>
						            </tr>
						            <tr>
						                <td>Brielle Williamson</td>
						                <td>Integration Specialist</td>
						                <td>New York</td>
						                <td>61</td>
						                <td>2012/12/02</td>
						                <td>$372,000</td>
						            </tr>
						            <tr>
						                <td>Herrod Chandler</td>
						                <td>Sales Assistant</td>
						                <td>San Francisco</td>
						                <td>59</td>
						                <td>2012/08/06</td>
						                <td>$137,500</td>
						            </tr>
						        </tbody>
						        <tfoot>
						            <tr>
						                <th>ชื่อ - นามสกุล</th>
						                <th>มหาวิทยาลัยน</th>
						                <th>ระดับ</th>
						                <th>คณะ</th>
						                <th>สาขา</th>
						                <th>อีเมล</th>
						            </tr>
						        </tfoot>
						    </table>
							</div>
						  </div>

						</div>
					</div>




					<div class="col-md-4 col-sm-12 col-xs-12">
					
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
		<script src="../scripts/toast/jquery.toast.min.js"></script>
		<!-- <script src="js/demo.js"></script> -->
		<script src="../js/e-magz.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>


		<script type="text/javascript">
			$(document).ready(function() {
    $('#example').DataTable();
} );
		</script>
		
	</body>
</html>