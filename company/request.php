<!DOCTYPE html>
<?php
session_start();
include("config.php");
include("check_student.php");


if ($_GET[type] =='submit_request') {
	$update_request = pg_query("UPDATE user_request set request = '$_GET[status]' where id_no = '$_GET[id_request]' ;");
	header('location:view_request_user.php?id_request='.$_GET[id_request]);
}
if ($_GET[type] =='submit_request_3') {
	$update_request = pg_query("UPDATE user_request set request = '$_GET[status]' where id_no = '$_GET[id_request]' ;");
	header('location:request.php#type_3');
}
if ($_GET[type] =='submit_request_4') {
	$update_request = pg_query("UPDATE user_request set request = '$_GET[status]' where id_no = '$_GET[id_request]' ;");
	header('location:request.php#type_4');
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
									<a data-toggle="tab" href="#type_1">
									<?php

										$sql_user_1 = pg_query("SELECT *,b.img as profile_stu,a.id_no as id_request from user_request a 
													inner join student b on a.email_user = b.email
													inner join job_company c on a.id_job = c.id_job
													where id_com = $id_com and request = 'รอการยืนยัน'
													 ;  ");

										$count_user = pg_num_rows($sql_user_1);
										echo $count_user;
									?>
								รอการยืนยัน</a>
							</li>
							<li>
									<a data-toggle="tab" href="#type_2">
									<?php
										$sql_user_2 = pg_query("SELECT *,b.img as profile_stu,a.id_no as id_request from user_request a 
													inner join student b on a.email_user = b.email
													inner join job_company c on a.id_job = c.id_job
													where id_com = $id_com and request = 'ยืนยันการสมัครแล้ว'
													 ;  ");
										$count_user = pg_num_rows($sql_user_2);
										echo $count_user;
									?>
								ยืนยันการสมัคร รอพิจารณา</a>
							</li>
							<li>
									<a data-toggle="tab" href="#type_3">
									<?php
										$sql_user_3 = pg_query("SELECT *,b.img as profile_stu,a.id_no as id_request from user_request a 
													inner join student b on a.email_user = b.email
													inner join job_company c on a.id_job = c.id_job
													where id_com = $id_com and request = 'ผ่านการสมัคร รอการติดต่อกลับ'
													 ;  ");
										$count_user = pg_num_rows($sql_user_3);
										echo $count_user;
									?>
								พิจารณาตำแหน่งงาน</a>
							</li>
							<li>
									<a data-toggle="tab" href="#type_4">
									<?php
										$sql_user_4 = pg_query("SELECT *,b.img as profile_stu,a.id_no as id_request from user_request a 
													inner join student b on a.email_user = b.email
													inner join job_company c on a.id_job = c.id_job
													where id_com = $id_com and request = 'ไม่ผ่านการสมัคร'
													 ;  ");
										$count_user = pg_num_rows($sql_user_4);
										echo $count_user;
									?>
								ปฏิเสธการพิจารณาตำแหน่งงาน</a>
							</li>
								
							</ul>
						</div>

						
						<div class="row"><br>
							<div class="tab-content">
								<div id="type_1" class="tab-pane fade in active">
									<table id="example1" class="table" style="width:100%">
										<thead>
											<tr>
												<th></th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<?php
											
												while ( $arr = pg_fetch_array($sql_user_1) ) {
											?>
											<tr>
												<td> 
													<article class="article-mini">
														<div class="inner">
															<figure>
																<a href="profile.php?eid=<?php echo $arr[id_no]; ?>">
																	<img src="../images/student/<?php echo $arr[profile_stu]; ?>">
																</a>
															</figure>
															<div class="padding">
																<h1><a href="profile.php?eid=<?php echo $arr[id_no]; ?>"><?php echo $arr[title_name],$arr[s_name],' ',$arr[l_name] ; ?></a></h1>
																<div class="detail">
																	<div class="category"><a href="#"><?php echo $arr[type_job]; ?></a></div>
																	<div class="time"><?php echo $arr[date_access]; ?></div>
																</div>
																<p>ตำแหน่งที่สมัคร : <?php echo $arr[name_job]; ?>  </p>
																<br>
															</div>
														</div>
													</article>
												</td>
												<td width="35%">
																	

												<div class="btn-group">
														<div class="btn-group">
														  <button type="button" class="btn-sm btn-warning">
														    สถานะ : <?php echo $arr[request]; ?>
														  </button>
														</div>
													<button type="button" class="btn-sm btn-warning dropdown-toggle" data-toggle="dropdown">
													<i class="fa fa-bars"></i> </button>
													<ul class="dropdown-menu" role="menu">

														<li><a href="request.php?type=submit_request&status=ยืนยันการสมัครแล้ว&id_request=<?php echo $arr[id_request]; ?>"><i class="fa fa-wrench" aria-hidden="true"></i> ยืนยันการสมัคร ตรวจสอบ Resume</a></li>


													</ul>
												</div>

												</td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>



								<div id="type_2" class="tab-pane fade">
									<table id="example2" class="table" style="width:100%">
										<thead>
											<tr>
												<th></th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<?php
											
												while ( $arr = pg_fetch_array($sql_user_2) ) {
											?>
											<tr>
												<td> 
													<article class="article-mini">
														<div class="inner">
															<figure>
																<a href="profile.php?eid=<?php echo $arr[id_no]; ?>">
																	<img src="../images/student/<?php echo $arr[profile_stu]; ?>">
																</a>
															</figure>
															<div class="padding">
																<h1><a href="profile.php?eid=<?php echo $arr[id_no]; ?>"><?php echo $arr[title_name],$arr[s_name],' ',$arr[l_name] ; ?></a></h1>
																<div class="detail">
																	<div class="category"><a href="#"><?php echo $arr[type_job]; ?></a></div>
																	<div class="time"><?php echo $arr[date_access]; ?></div>
																</div>
																<p>ตำแหน่งที่สมัคร : <?php echo $arr[name_job]; ?>  </p>
																<br>
															</div>
														</div>
													</article>
												</td>
												<td width="35%">
																	

												<div class="btn-group">
														<div class="btn-group">
														  <button type="button" class="btn btn-sm btn-info">
														    สถานะ : <?php echo $arr[request]; ?>
														  </button>
														</div>
													<button type="button" class="btn-sm btn-warning dropdown-toggle" data-toggle="dropdown">
													<i class="fa fa-bars"></i> </button>
													<ul class="dropdown-menu" role="menu">

														<li><a href="view_request_user.php?id_request=<?php echo $arr[id_request]; ?>"><i class="fa fa-search" aria-hidden="true"></i> ตรวจสอบ Resume</a></li>

														<li><a href="request.php?type=submit_request_3&status=ผ่านการสมัคร รอการติดต่อกลับ&id_request=<?php echo $arr[id_request]; ?>"><i class="fa fa-check" aria-hidden="true"></i> รับพิจารณาบุคคลนี้</a></li>

														<li><a href="request.php?type=submit_request_4&status=ไม่ผ่านการสมัคร&id_request=<?php echo $arr[id_request]; ?>"><i class="fa fa-window-close" aria-hidden="true"></i> ปฏิเสธบุคคลนี้</a></li>


													</ul>
												</div>

												</td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>



								<div id="type_3" class="tab-pane fade">
									<table id="example3" class="table" style="width:100%">
										<thead>
											<tr>
												<th></th>
												<th ></th>
											</tr>
										</thead>
										<tbody>
											<?php
											
												while ( $arr = pg_fetch_array($sql_user_3) ) {
											?>
											<tr>
												<td> 
													<article class="article-mini">
														<div class="inner">
															<figure>
																<a href="profile.php?eid=<?php echo $arr[id_no]; ?>">
																	<img src="../images/student/<?php echo $arr[profile_stu]; ?>">
																</a>
															</figure>
															<div class="padding">
																<h1><a href="profile.php?eid=<?php echo $arr[id_no]; ?>"><?php echo $arr[title_name],$arr[s_name],' ',$arr[l_name] ; ?></a></h1>
																<div class="detail">
																	<div class="category"><a href="#"><?php echo $arr[type_job]; ?></a></div>
																	<div class="time"><?php echo $arr[date_access]; ?></div>
																</div>
																<p>ตำแหน่งที่สมัคร : <?php echo $arr[name_job]; ?>  </p>
																<br>
															</div>
														</div>
													</article>
												</td>
												<td width="35%">
																	

												<div class="btn-group">
														<div class="btn-group">
														  <button type="button" class="btn btn-sm btn-success">
														    สถานะ : <?php echo $arr[request]; ?>
														  </button>
														</div>
													<button type="button" class="btn-sm btn-warning dropdown-toggle" data-toggle="dropdown">
													<i class="fa fa-bars"></i> </button>
													<ul class="dropdown-menu" role="menu">

														<li><a href="view_request_user.php?id_request=<?php echo $arr[id_request]; ?>"><i class="fa fa-search" aria-hidden="true"></i> ตรวจสอบ Resume</a></li>

														<li><a href="request.php?type=submit_request_4&status=ไม่ผ่านการสมัคร&id_request=<?php echo $arr[id_request]; ?>"><i class="fa fa-window-close" aria-hidden="true"></i> ปฏิเสธบุคคลนี้</a></li>
													</ul>
												</div>
													<br>
													<i>
													โทร : <?php echo $arr[phone_number]; ?> <br>
													Email : <?php echo $arr[email]; ?>
													</i>

												</td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>



								<div id="type_4" class="tab-pane fade">
									<table id="example4" class="table" style="width:100%">
										<thead>
											<tr>
												<th></th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<?php
											
												while ( $arr = pg_fetch_array($sql_user_4) ) {
											?>
											<tr>
												<td> 
													<article class="article-mini">
														<div class="inner">
															<figure>
																<a href="profile.php?eid=<?php echo $arr[id_no]; ?>">
																	<img src="../images/student/<?php echo $arr[profile_stu]; ?>">
																</a>
															</figure>
															<div class="padding">
																<h1><a href="profile.php?eid=<?php echo $arr[id_no]; ?>"><?php echo $arr[title_name],$arr[s_name],' ',$arr[l_name] ; ?></a></h1>
																<div class="detail">
																	<div class="category"><a href="#"><?php echo $arr[type_job]; ?></a></div>
																	<div class="time"><?php echo $arr[date_access]; ?></div>
																</div>
																<p>ตำแหน่งที่สมัคร : <?php echo $arr[name_job]; ?>  </p>
																<br>
															</div>
														</div>
													</article>
												</td>
												<td width="35%">
																	

												<div class="btn-group">
														<div class="btn-group">
														  <button type="button" class="btn btn-sm btn-danger">
														    สถานะ : <?php echo $arr[request]; ?>
														  </button>
														</div>
													<button type="button" class="btn-sm btn-warning dropdown-toggle" data-toggle="dropdown">
													<i class="fa fa-bars"></i> </button>
													<ul class="dropdown-menu" role="menu">

														<li><a href="view_request_user.php?id_request=<?php echo $arr[id_request]; ?>"><i class="fa fa-search" aria-hidden="true"></i> ตรวจสอบ Resume</a></li>

														<li><a href="request.php?type=submit_request_3&status=ผ่านการสมัคร รอการติดต่อกลับ&id_request=<?php echo $arr[id_request]; ?>"><i class="fa fa-check" aria-hidden="true"></i> รับพิจารณาบุคคลนี้</a></li>


													</ul>
												</div>
													
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
			$('#example1').DataTable({
				"aLengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100, "All"]]
			});
			$('#example2').DataTable({
				"aLengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100, "All"]]
			});
			$('#example3').DataTable({
				"aLengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100, "All"]]
			});
			$('#example4').DataTable({
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