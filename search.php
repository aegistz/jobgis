<!DOCTYPE html>
<?php
session_start();
include("config.php");
$eqc = $_GET[eqc];
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
							<h2 class="aside-title">ค้นหางาน</h2>
							<div class="aside-body">
								<form class="checkbox-group" id="myForm" action="search.php">
									<div class="group-title">ช่วงเวลา</div>
									<div class="form-group">
										<label><input type="radio" name="date" checked  onclick="myFunction()" > ทุกเวลา</label>
									</div>
									<div class="form-group">
										<label><input type="radio" name="date"  onclick="myFunction()" > วันนี้</label>
									</div>
									<div class="form-group">
										<label><input type="radio" name="date"  onclick="myFunction()" > สัปดาห์นี้</label>
									</div>
									<div class="form-group">
										<label><input type="radio" name="date"  onclick="myFunction()" > เดือนนี้</label>
									</div>
									<br>
									<div class="group-title">ประเภท</div>
									<div class="form-group">
										<label><input type="checkbox" name="category" checked> ทุกประเภท</label>
									</div>
									<div class="form-group">
										<label><input type="checkbox" name="category"> งานประจำ</label>
									</div>
									<div class="form-group">
										<label><input type="checkbox" name="category"> งานรายวัน</label>
									</div>
									<div class="form-group">
										<label><input type="checkbox" name="category"> ฝึกงาน</label>
									</div>
									<div class="form-group">
										<label><input type="checkbox" name="category"> สหกิจศึกษา</label>
									</div>
									<div class="form-group">
										<label><input type="checkbox" name="category"> อื่น ๆ</label>
									</div>
									<button type="submit">xx</button>
								</form>
							</div>
						</aside>
					</div>
					<div class="col-md-9 ">
						<div class="nav-tabs-group">
							<ul class="nav nav-tabs-list">
								<li class="active"><a data-toggle="tab"  href="#work">
									
									<?php
										$sql_work = pg_query("SELECT * from job_company a
											inner join company b on a.id_com = b.id_com
											where name_job like '%$eqc%'
											and type_job like  '%%'
											and sex_job like  '%%'
											and province_com  like  '%%'
											;  ");
										$count_work = pg_num_rows($sql_work);
										echo $count_work;
									?> ตำแหน่งงาน
								</a></li>
								<li><a data-toggle="tab" href="#user">
									<?php
										$sql_user = pg_query("SELECT * from student
										where s_name like '%$eqc%' ;  ");
										$count_user = pg_num_rows($sql_user);
										echo $count_user;
									?>
								ผู้คน</a></li>
								<li><a data-toggle="tab" href="#company">
									<?php
										$sql_company = pg_query("SELECT * from company  ;  ");
										$count_company = pg_num_rows($sql_company);
										echo $count_company;
									?>
								สถานประกอบการ</a></li>
							</ul>
						</div>
						
						<div class="row">
							<div class="tab-content">
								<div id="work" class="tab-pane fade in active">
									<table id="example" class="" style="width:100%">
										<thead>
											<tr>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<?php
												while ( $arr = pg_fetch_array($sql_work) ) {
											?>
											<tr>
												<td>
													<article class="col-md-12 article-list">
														<div class="inner">
															<figure>
																<a href="news.php?q=<?php echo $arr[id_job]; ?>">
																	<img src="images/img_job/<?php echo $arr[img]; ?>" alt="Sample Article">
																</a>
															</figure>
															<div class="details">
																<div class="detail">
																	<div class="category">
																		<a href="#"><?php echo $arr[type_job]; ?></a>
																	</div>
																	<div class="time"><?php echo $arr[date_job]; ?></div>
																</div>
																<h1><a href="news.php?q=<?php echo $arr[id_job]; ?>"><?php echo $arr[name_job]; ?></a></h1>
																<p>
																	<?php echo $arr[detail_job]; ?> <br>
																	<small> <i><b>การรับ  : </b>    <?php echo $arr[type_job]; ?></i> </small>
																</p>
																<footer>
																	<a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div>273</div></a>
																	<a class="btn btn-primary more" href="news.php?q=<?php echo $arr[id_job]; ?>">
																		<div>More</div>
																		<div><i class="ion-ios-arrow-thin-right"></i></div>
																	</a>
																</footer>
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
								<div id="user" class="tab-pane fade">
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
																	<img src="images/student/<?php echo $arr2[img]; ?>">
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
								<div id="company" class="tab-pane fade">
									<table id="example3" class="" style="width:100%">
										<thead>
											<tr>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<?php
												while ( $arr = pg_fetch_array($sql_company) ) {
											?>
											<tr>
												<td>
													<article class="col-md-12 article-list">
														<div class="inner">
															<figure>
																<a href="news.php?q=<?php echo $arr[id_job]; ?>">
																	<img src="images/img_job/<?php echo $arr[logo_img]; ?>" alt="Sample Article">
																</a>
															</figure>
															<div class="details">
																<h1><a href="news.php?q=<?php echo $arr[id_job]; ?>"><?php echo $arr[name_com]; ?></a></h1>
																<p>
																	<i><b>ประเภทหน่วยงาน : <?php echo $arr[type_com]; ?> ที่อยู่  : </b>    <?php echo $arr[province_com]; ?></i> <br>
																	
																</p>
																<footer>
																	<a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div>273</div></a>
																	<a class="btn btn-primary more" href="news.php?q=<?php echo $arr[id_job]; ?>">
																		<div>More</div>
																		<div><i class="ion-ios-arrow-thin-right"></i></div>
																	</a>
																</footer>
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