<!DOCTYPE html>
<?php
session_start();
include("config.php");
include("check_student.php");

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
		<meta property="og:image" content="../images/gistda_logo.png" />
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
	</head>
	<body class="skin-blue">
		<?php include 'header.php'; ?>
		
		<section class="search">
			<div class="container">
				<div class="row">
					<div class="col-md-12 ">
						<div class="nav-tabs-group">
							<ul class="nav nav-tabs-list">
								<li class="active">
									<a data-toggle="tab" href="#with">
									<?php

										$sql_user = pg_query("SELECT * from student
										where s_name like '%$eqc%' and status_user = 'ยืนยัน' ;  ");

										$count_user = pg_num_rows($sql_user);
										echo $count_user;
									?>
								รอการยืนยัน</a>
							</li>
							<li>
									<a data-toggle="tab" href="#success">
									<?php
										$sql_user = pg_query("SELECT * from student
										where s_name like '%$eqc%' and status_user = 'ยืนยัน' ;  ");
										$count_user = pg_num_rows($sql_user);
										echo $count_user;
									?>
								ยืนยันการสมัคร รอพิจารณา</a>
							</li>
							<li>
									<a data-toggle="tab" href="#success">
									<?php
										$sql_user = pg_query("SELECT * from student
										where s_name like '%$eqc%' and status_user = 'ยืนยัน' ;  ");
										$count_user = pg_num_rows($sql_user);
										echo $count_user;
									?>
								พิจารณาตำแหน่งงาน</a>
							</li>
							<li>
									<a data-toggle="tab" href="#reject">
									<?php
										$sql_user = pg_query("SELECT * from student
										where s_name like '%$eqc%' and status_user = 'ยืนยัน' ;  ");
										$count_user = pg_num_rows($sql_user);
										echo $count_user;
									?>
								ปฏิเสธการพิจารณาตำแหน่งงาน</a>
							</li>
								
							</ul>
						</div>
						
						<div class="row">
							<div class="tab-content">
								<div id="user" class="tab-pane fade in active">
									<table id="example2" class="" style="width:100%">
										<thead>
											<tr>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<?php
											
												while ( $arr2 = pg_fetch_array($sql_user) ) {
											?>
											<tr>
												<td>
													<article class="article-mini">
														<div class="inner">
															<figure>
																<a href="profile.php?eid=<?php echo $arr2[id_no]; ?>">
																	<img src="../images/student/<?php echo $arr2[img]; ?>">
																</a>
															</figure>
															<div class="padding">
																<h1><a href="profile.php?eid=<?php echo $arr2[id_no]; ?>"><?php echo $arr2[s_name],' ',$arr2[l_name] ; ?></a></h1>
																<p><?php echo $arr2[university]; ?></p>
																
															</div>
														</div>
													</article>
													<hr>
												</td>
											</tr>
											<?php } ?>
										</tbody>
										
									</table>
								</div>
								
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
			$('.nav-tabs-list a').click(function (e) {
			$(this).tab('show');
			var scrollmem = $('body').scrollTop();
			window.location.hash = this.hash;
			$('html,body').scrollTop(scrollmem);
			});
			});
		</script>
	</body>
</html>