<!DOCTYPE html>
<?php
session_start();
include("config.php");
include("check-company.php");

if ($_GET[type] == 'update_status_job') {
	$sql_update_status = pg_query("UPDATE job_company set status_job = '$_GET[status]' where id_job = '$_GET[job_id]' ;");
	header('location:./');
}

if ($_GET[type] == 'delete_job') {
	$sql_delete_job = pg_query("DELETE from job_company where id_job = '$_GET[job_id]';");
	header('location:./');
}

if ($_GET[type] =='submit_request') {
	$update_request = pg_query("UPDATE user_request set request = 'ยืนยันการสมัครแล้ว' where id_no = '$_GET[id_request]' ;");
	header('location:view_request_user.php?id_request='.$_GET[id_request]);
}

?>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="description" content="GEOJOBs GISTDA GISTNU JOB GIST GIS GEOINFOMETIC">
		<meta name="author" content="GISTNU by Teerayoot injun Teerayoot5056@gmail.com">
		<meta name="keyword" content="GEOJOBs,GISTDA,GISTNU,JOB,GIST,GIS,GEOINFOMETIC">
		<!-- Shareable -->
		<meta property="og:title" content="GEOJOBs GISTDA GISTNU JOB GIST GIS GEOINFOMETIC" />
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
		<!-- Custom style -->
		<link rel="stylesheet" href="../css/style.css">
		<link rel="stylesheet" href="../css/skins/blue.css">
		<link rel="stylesheet" href="../css/demo.css">
		<link rel="icon" href="https://www.gistda.or.th/main/sites/default/files/favicon.ico" type="image/png" >
		<link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">

<style>
			.row.content {
				height: 620px
			}
			.anyClass {
height: 450px;
				

				overflow-y: scroll;
			}
			.largeWidth {
				width: 100%;
				height: 620px;
			}

			.example button {
  float: left;
  background-color: #4E3E55;
  color: white;
  border: none;
  box-shadow: none;
  font-size: 17px;
  font-weight: 500;
  font-weight: 600;
  border-radius: 3px;
  padding: 15px 35px;
  margin: 26px 5px 0 5px;
  cursor: pointer; 
}
.example button:focus{
  outline: none; 
}
.example button:hover{
  background-color: #33DE23; 
}
.example button:active{
  background-color: #81ccee; 
}
		</style>

	</head>
	<body class="skin-blue">
		<?php include 'header.php'; ?>
		<section class="category">
			<div class="container">
				<div class="row">
					<div class="col-md-8 text-left">
						<div class="row">
							<div class="col-md-12">
								<h4 class="page-title">
								รายการประกาศรับสมัครงาน/ฝึกงาน/สหกิจศึกษา
									<div class="btn-group">
									  <button type="button" class="btn btn-warning dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
									    <i class="fa fa-plus"></i> เพิ่มประกาศรับใหม่
									  </button>
									  <div class="dropdown-menu">
									    <a class="dropdown-item btn"  href="add-job.php">พนักงานประจำ/รายวัน</a>
									    <a class="dropdown-item btn" href="#">สหกิจศึกษา/ฝึกงาน</a>
									    <a class="dropdown-item btn" href="#">นักวิจัย</a>
									  </div>
									</div>
								</h4>
								<p class="page-subtitle">ระบบจับคู่นักศึกษากับสถานประกอบการ</p>
							</div>
						</div>
						<div class="line"></div>
						<div class="row">
							

<?php 
	$sql = pg_query("SELECT * from job_company where id_com = '$id_com' order by id_job desc;");
	$check = pg_num_rows($sql);
	if ($check != 0 ) {
	while( $job_com = pg_fetch_array($sql) ){
		
			
?>							
							<article class="col-md-12 article-list">
								<div class="inner">
									<figure>
										<a href="view-job.php?q=<?php echo $job_com[id_job]; ?>">
											<img src="../images/img_job/<?php echo $job_com[img]; ?>">
										</a>
									</figure>
									<div class="details">
										<div class="detail">
											<div class="category">
												<a href="#"><?php echo $job_com[type_job]; ?></a>

											</div>
											<div class="time"><?php echo $job_com[date_job]; ?>
												<div class="btn-group">

													<?php if ($job_com[status_job] == 'เปิดรับสมัครอยู่') { ?>
														<button type="button" class="btn-sm btn-success" >
															สถานะงาน : เปิดรับสมัครอยู่ 
														</button>
													<?php } else{  ?>
														<button type="button" class="btn-sm btn-danger" >
															สถานะงาน : ปิดรับสมัคร
														</button>

													<?php } ?>

													<button type="button" class="btn-sm btn-warning dropdown-toggle" data-toggle="dropdown">
													<i class="fa fa-bars"></i> </button>
													<ul class="dropdown-menu" role="menu">


													<?php if ($job_com[status_job] == 'เปิดรับสมัครอยู่') { ?>
														<li>
															<a href="index.php?job_id=<?php echo $job_com[id_job]; ?>&status=ปิดรับสมัคร&type=update_status_job">
																<i class="fa fa-power-off" aria-hidden="true"></i> ปิดรับสมัครงานตำแหน่งนี้
															</a>
														</li>
													<?php }else{ ?>
														<li>
															<a href="index.php?job_id=<?php echo $job_com[id_job]; ?>&status=เปิดรับสมัครอยู่&type=update_status_job">
																<i class="fa fa-check" aria-hidden="true"></i> เปิดรับสมัครงานตำแหน่งนี้
															</a>
														</li>

													<?php } ?>


														<li><a href="edit_job.php?job_id=<?php echo $job_com[id_job]; ?>"><i class="fa fa-wrench" aria-hidden="true"></i> แก้ไขตำแหน่งงานนี้</a></li>


														<li><a href="index.php?type=delete_job&job_id=<?php echo $job_com[id_job]; ?>" onclick="return confirm('ยืนยันการลบตำแหน่งงานนี้ ? ถ้าลบแล้วจะสามารถย้อนกลับได้')" ><i class="fa fa-window-close" aria-hidden="true"></i> ลบตำแหน่งงานนี้</a></li>
													</ul>
												</div>
											</div>
										</div>
										<h1><a href="view-job.php?q=<?php echo $job_com[id_job]; ?>"><?php echo $job_com[name_job]; ?></a></h1>
										<p>
											<?php
															echo mb_strimwidth($job_com[detail_job], 0, 200, '....<a href="view-job.php?q='.$job_com[id_job].'" title="">เพิ่มเติม</a>');
														?>
										</p>
									</div>
								</div>
							</article>
<?php } }  else { ?>
			
							<article class="col-md-12 article-list">
								<div class="inner">
									<figure>
										<a href="">
											<img src="https://patientnews.com/wp-content/uploads/2019/03/dummy.png">
										</a>
									</figure>
									<div class="details">
										<div class="detail">
											<div class="category">
												<a href="">Tag</a>
											</div>
											<div class="time">9999-99-9</div>
										</div>
										<h1><a href="">ท่านยังไม่เพิ่มข้อมูลตำแหน่งงานที่เปิดรับ</a></h1>
										<p>
											เพิ่มให้ได้บุคคลเข้าร่วมทำงานตามที่ท่านต้องการ 
											สามารถกดเพิ่มข้อมูลการงานรับสมัครงาน / ฝึกงาน / สหกิจศึกษา ได้ ที่นี่
										</p>
										<footer>
											<a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div>999</div></a>
											<a class="btn btn-warning more" href="add-job.php">
												<div>เพิ่มข้อมูล</div>
												<div><i class="ion-ios-arrow-thin-right"></i></div>
											</a>
										</footer>
									</div>
								</div>
							</article>


<?php }  ?>
							
						</div>
					</div>
					<div class="col-md-4 sidebar">
						<aside>
							<div class="aside-body">
								<figure class="ads">
									<a href="./">
										<img src="../images/img_job/<?php echo $company[logo_img]; ?>">
									</a>
								</figure>
							</div>
						</aside>
						<aside>
							<div class="aside-body">
								<div class="featured-author">
									<div class="featured-author-inner">
										<hr>
										<div class="featured-author-body">
											<div class="featured-author-count">
												<div class="item">
													<a href="#">
														<div class="name">ประกาศ</div>
														<div class="value"><?php echo  number_format($check); ?></div>
													</a>
												</div>
												<div class="item">
													<a href="#">
														<div class="name">รอการตอบรับ</div>
														<div class="value">
							<?php
								$sql_request = pg_query("SELECT * from user_request a inner join job_company b on a.id_job = b.id_job where  request = 'รอการยืนยัน' and  id_com = '$id_com';"); 
								$num_request = pg_num_rows($sql_request);
								echo number_format($num_request);
							?>


														</div>
													</a>
												</div>
												<div class="item">
													<a href="#">
														<div class="name">ผู้สมัครทั้งหมด</div>
														<div class="value">
<?php
								$sql_request = pg_query("SELECT * from user_request a inner join job_company b on a.id_job = b.id_job where  id_com = '$id_com';"); 
								$num_request = pg_num_rows($sql_request);
								echo number_format($num_request);
							?>
														</div>
													</a>
												</div>
											</div>
											
											
											
										</div>
									</div>
								</div>
							</div>
						</aside>
						<aside>
							<h1 class="aside-title">ผู้สมัครงานล่าสุด</h1>
							<div class="aside-body anyClass">

<?php 
	$sql = pg_query("SELECT *,b.img as profile_stu,a.id_no as id_request from user_request a 
inner join student b on a.email_user = b.email
inner join job_company c on a.id_job = c.id_job
where id_com = $id_com and request = 'รอการยืนยัน'   ;");
	while ($arr = pg_fetch_array($sql)) {
?>
								<article class="article-mini ">
									<div class="inner">
										<figure>
											<a href="profile.php?eid=<?php echo $arr[id_no]; ?>">
												<img src="../images/student/<?php echo $arr[profile_stu]; ?>">
											</a>
										</figure>
										<div class="padding">
											<p>
												

<div class="btn-group">

<?php if ($arr[request] == 'รอการยืนยัน') { ?>
														<div class="btn-group">
														  <button type="button" class="btn-sm btn-warning">
														    สถานะ : <?php echo $arr[request]; ?>
														  </button>
														</div>
<?php }  ?>
													<button type="button" class="btn-sm btn-warning dropdown-toggle" data-toggle="dropdown">
													<i class="fa fa-bars"></i> </button>
													<ul class="dropdown-menu" role="menu">

														<li><a href="index.php?type=submit_request&id_request=<?php echo $arr[id_request]; ?>"><i class="fa fa-wrench" aria-hidden="true"></i> ยืนยันการสมัคร ตรวจสอบ Resume</a></li>


													</ul>
												</div>
											</p>
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

<?php } ?>
								
							</div>
						</aside>
							<aside>
								<div class="aside-body">
									<figure class="ads">
										<a href="http://tsw.gistda.or.th/" title="" target="_blank">
										<img src="http://tsw.gistda.or.th/img/TSW2019_banner_th_2500x500.png">
										<figcaption>Advertisement</figcaption>
										</a>
									</figure>
								</div>
							</aside>
						<aside>
							<div class="aside-body">
								<form class="newsletter">
									<div class="icon">
										<i class="ion-ios-email-outline"></i>
										<h1>Newsletter</h1>
									</div>
									<div class="input-group">
										<input type="email" class="form-control email" placeholder="Your mail">
										<div class="input-group-btn">
											<button class="btn btn-warning"><i class="ion-paper-airplane"></i></button>
										</div>
									</div>
									<p>By subscribing you will receive new articles in your email.</p>
								</form>
							</div>
						</aside>
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
	</body>
</html>