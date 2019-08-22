<!DOCTYPE html>
<?php
session_start();
include("config.php");
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
						  </div>

						  <div id="work-status" class="tab-pane fade">
						    <h3>Menu 1</h3>
						    <p>Some content in menu 1.</p>
						  </div>

						  <div id="password" class="tab-pane fade aside-body">
							<p>เปลี่ยนรหัสผ่าน</p>
							<hr>
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
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"  ></script>
		<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js" ></script>
		<script type="text/javascript">
			$(document).ready(function() {
			$('#example').DataTable({
				"searching": false,
				"aLengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100, "All"]]
			});
			$('#example2').DataTable({
				"searching": false,
				"aLengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100, "All"]]
			});
			$('#example3').DataTable({
				"searching": false,
				"aLengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100, "All"]]
			});
			} );
		
			function myFunction() {
			document.getElementById("myForm").submit();
			console.log('submit')
			}
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