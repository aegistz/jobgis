<!DOCTYPE html>
<?php
session_start();
include("config.php");
include("check-company.php");



$eid = $_GET[eid];
$sql_profile = pg_query("SELECT *,a.s_name as name , a.l_name as last_name  ,a.university as user_university , b.email as check_resume
											from student a
										full join resume b on a.email = b.email  where a.id_no = '$eid'    ;");
$arr_profile = pg_fetch_array($sql_profile);





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
		<!-- Custom style -->
		<link rel="stylesheet" href="../css/style.css">
		<link rel="stylesheet" href="../css/skins/blue.css">
		<link rel="stylesheet" href="../css/demo.css">
		<link rel="icon" href="https://www.gistda.or.th/main/sites/default/files/favicon.ico" type="image/png" >


		<link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">

	</head>

	<body class="skin-blue">

		<?php include 'header.php'; ?>

		<section class="home">
			<div class="container">
				<div class="row">

						<div class="col-md-12">
							<div class="sidebar-title for-tablet">Sidebar</div>
							<aside>
								<div class="aside-body">
									<div class="featured-author">
										<div class="featured-author-inner">
											<?php if($arr_profile[bg_img] != ''){ ?>
											<div class="featured-author-cover divbutton" style="background-image: url('../images/student/<?php echo $arr_profile[bg_img]; ?>');">
											<?php }else{ ?>
											<div class="featured-author-cover divbutton" style="background-image: url('../images/student/bg_img.png');">
											<?php } ?>
												<div class="featured-author-center">
													<figure class="featured-author-picture">
														<?php if($arr_profile[img] == ''){ ?>
														<img  id="myImg" src="https://image.flaticon.com/icons/png/512/149/149071.png" alt="Sample Article">
														<?php } else { ?>
														<img  id="myImg" src="../images/student/<?php echo $arr_profile[img]; ?>" alt="Sample Article">
														<?php } ?>
													</figure>
													<div class="featured-author-info">
														<h2 class="name"><?php echo $arr_profile[s_name],' ', $arr_profile[l_name]; ?> </h2>
														<div class="desc"><?php echo $arr_profile[email]; ?> </div>
													</div>
												</div>
												
											</div>
											<div class="featured-author-body">
												<div class="featured-author-count">
													<div class="item">
														<a  data-toggle="tab" href="#menu1">
															<div class="name">Posts</div>
															<div class="value">
																<?php
																$sql_post_num = pg_query("SELECT * from  story where id_user = '$arr_profile[id_no]';");
																$num_post = pg_num_rows($sql_post_num);
																echo number_format($num_post) ;
																?>
															</div>
														</a>
													</div>
													<div class="item">
														<a  data-toggle="tab" href="#menu2">
															<div class="name">View</div>
															<div class="vlaue">Resume</div>
														</a>
													</div>
													<div class="item">
														<a class="btn btn-warning btn-block"  data-toggle="tab" href="#menu2">
															<i class="fa fa-handshake-o" aria-hidden="true"></i> ยืนข้อเสนองาน
														</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								
							</aside>
							<div class="row">
								<div class="col-xs-12 col-md-8 tab-content">
<div id="menu1" class="tab-pane fade in active">
									<aside>
										<?php
											
											$query = pg_query("SELECT * from story where id_user = '$eid' order by id_story desc ;");
											$num = pg_num_rows($query);
											if( $num != 0 ) {
												while( $arr = pg_fetch_array($query)  ){
										?>
										<article class="col-md-12 article-list">
											<div class="inner">
												<figure>
													<a href="story_detail.php?stoid=<?php echo $arr[id_story]; ?>">
														<img src="../images/story/<?php echo $arr[img_story]; ?>">
													</a>
												</figure>
												<div class="details">
													<div class="detail">
														<div class="category">
															<a href=""><?php echo $arr[tag_story]; ?></a>
														</div>
														<div class="time"><?php echo $arr[date_story]; ?></div>
													</div>
													<h1><a href="story_detail.php?stoid=<?php echo $arr[id_story]; ?>"><?php echo $arr[title_story]; ?></a></h1>
													<p>
														<?php
														echo mb_strimwidth($arr[detail_story], 0, 300, '....<a href="story_detail.php?stoid='.$arr[id_story].'" title="">เพิ่มเติม</a>');
														?>
													</p>
													<footer>
														<a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div>12</div></a>
													</footer>
												</div>
											</div>
										</article>
										<?php }    }else{  ?>
										<article class="col-md-12 article-list">
											<div class="inner">
												<figure>
													<a href="">
														<img src="https://1lsgxo2se94f2ujtfj2u2vci-wpengine.netdna-ssl.com/wp-content/uploads/2019/03/dummy.png">
													</a>
												</figure>
												<div class="details">
													<div class="detail">
														<div class="category">
															<a href="#">ประสบการณ์</a>
														</div>
														<div class="time">December 26, 2016</div>
													</div>
													<h1><a href="#">..............</a></h1>
													<p>
														..............
													</p>
													<footer>
														<a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div>99</div></a>
													</footer>
												</div>
											</div>
										</article>
										<?php } ?>
									</aside>
</div>
<div id="menu2" class="tab-pane fade">
    <div class="row">
									<div class="col-md-6 col-sm-6">
										<div class="col-md-7">
											<div class="form-group">
												<p>
													ชื่อ <?php echo $arr_profile[title_name] ;?>&nbsp;<?php echo $arr_profile[s_name] ;?>&nbsp;<?php echo $arr_profile[l_name] ;?><br>
													โทรศัพท์มือถือ : <?php echo $arr_profile[phone] ;?><br>
													E-mail : <?php echo $arr_profile[email] ;?><br>
													ที่อยู่ : <?php echo $arr_profile[address] ;?> ต.<?php echo $arr_profile[tambon] ;?> อ.​<?php echo $arr_profile[amphoe] ;?> จ.<?php echo $arr_profile[province] ;?> <?php echo $arr_profile[zip_code] ;?>

												</p>
												<p>
													<h5>การศึกษา</h5>
													มหาวิทยาลัย : <?php echo $arr_profile[university] ;?> <br>
													วุฒิการศึกษา : <?php echo $arr_profile[edu_back] ;?> <br>
													ระดับการศึกษา : <?php echo $arr_profile[degree] ;?> <br>
													คณะ : <?php echo $arr_profile[faculty] ;?> <br>
													สาขา : <?php echo $arr_profile[sector] ;?> <br>
													GPA : <?php echo $arr_profile[gpa] ;?> <br>
												</p>
												<p>
													<h5>การทำงาน/การฝึกงาน</h5>
													ชื่อบริษัท : <?php echo $arr_profile[company] ;?> <br>
													ที่อยู่ติดต่อ : <?php echo $arr_profile[address_com] ;?> <br>
													ตำแหน่ง : <?php echo $arr_profile[rank_com] ;?> <br>
													หน้าที่รับผิดชอบ : <?php echo $arr_profile[role_com] ;?> <br>
													เงินเดือน : <?php echo $arr_profile[salary_com] ;?> <br>
													ตั้งแต่วันที่ : <?php echo $arr_profile[date_start] ;?> <br>
													จนถึงวันที่ : <?php echo $arr_profile[date_end] ;?><br>
												</p>
												<p>
													<h5>ประวัติการฝึกอบรม</h5>
													หน่วยงานที่ฝึกอบรม : <?php echo $arr_profile[department] ;?><br>
													หลักสูตร : <?php echo $arr_profile[course] ;?><br>
													ระยะเวลาที่ฝึกอบรม : <?php echo $arr_profile[course_time] ;?> <br>

												</p>
												<p>
													<h5>เป้าหมายในการทำงาน/ฝึกงาน</h5>
													ลักษณะงานที่ต้องการ : <?php echo $arr_profile[work_n] ;?> <br>
													สายงานที่ต้องการ <br>
													1. <?php echo $arr_profile[work_1] ;?><br>
													2. <?php echo $arr_profile[work_2] ;?><br>
													3. <?php echo $arr_profile[work_3] ;?><br>
													พื้นที่ฝึกงานที่ต้องการ <br>
													1. <?php echo $arr_profile[area_1] ;?><br>
													2. <?php echo $arr_profile[area_2] ;?><br>
												</p>
											</div>
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
											<div class="col-md-7">
												<div class="form-group">
													
													<p>
														สัญชาติ : <?php echo $arr_profile[nationality] ;?><br>
														ศาสนา : <?php echo $arr_profile[religion] ;?><br>
														ส่วนสูง : <?php echo $arr_profile[hight] ;?><br>
														วันเกิด : <?php echo $arr_profile[birthday] ;?><br>
														สถานภาพทางทหาร : <?php echo $arr_profile[status] ;?>
													</p>
													<p>
														<b>ทักษะทางภาษา</b> <br>
														ภาษาไทย <br>
														 	พูด : <?php echo $arr_profile[th_s] ;?> <br>
														 	อ่าน : <?php echo $arr_profile[th_r] ;?><br>
														 	เขียน : <?php echo $arr_profile[th_w] ;?><br>
														ภาษาอังกฤษ <br>
														 	พูด : <?php echo $arr_profile[en_s] ;?><br>
														 	อ่าน : <?php echo $arr_profile[en_r] ;?><br>
														 	เขียน : <?php echo $arr_profile[en_w] ;?><br>
														ภาษาจีน <br>
															พูด : <?php echo $arr_profile[cn_s] ;?><br>
															อ่าน : <?php echo $arr_profile[cn_r] ;?><br>
															เขียน : <?php echo $arr_profile[cn_w] ;?><br>
														<b>ทักษะทางคอมพิวเตอร์ </b><br>
														Microsoft office <br>
														word : <?php echo $arr_profile[word] ;?><br>
														excel : <?php echo $arr_profile[excel] ;?><br>
														powerpoint : <?php echo $arr_profile[ppt] ;?><br>
														<b>Adobe</b> <br>
														photoshop : <?php echo $arr_profile[ps] ;?><br>
														Illustrator : <?php echo $arr_profile[ai] ;?><br>
														Premiere pro : <?php echo $arr_profile[pr] ;?><br>
														Lightroom : <?php echo $arr_profile[lr] ;?><br>
														<b>ทักษะทาง GIS</b><br>
														Arcgis : <?php echo $arr_profile[arcgis] ;?><br>
														Erdes : <?php echo $arr_profile[erdas] ;?><br>
														Envi : <?php echo $arr_profile[envi] ;?><br>
														QGIS : <?php echo $arr_profile[qgis] ;?><br>


													</p>
												</div>
											</div>
									</div>
							</div>
  </div>

								</div>
								<div class="col-xs-12 col-md-4">
									<aside>
										<h1 class="aside-title">ภาพ </h1>
										<div class="block">
											<div class="block-body">
												<ul class="item-list-round" data-magnific="gallery">
													<?php
														$id = $_GET[eid];
														$query = pg_query("with ss as (
													SELECT ROW_NUMBER () OVER (ORDER BY id_img asc) as row,* from photo_user where id_user = '$id' order by id_img desc
													) SELECT * from ss where row between 1 and 6");
														$num = pg_num_rows($query);
														if( $num != 0 ) {
															while( $arr = pg_fetch_array($query)  ){
													?>
													<li><a href="../images/student/<?php echo $arr[name_img]; ?>" style="background-image: url('../images/student/<?php echo $arr[name_img]; ?>');"></a></li>
													<?php }
														$sql2 = pg_query("with ss as (
													SELECT ROW_NUMBER () OVER (ORDER BY id_img asc) as row,* from photo_user where id_user = '$id' order by id_img desc
													) SELECT * from ss where row >= 7");
														$num2 = pg_num_rows($sql2);
														$arr2 = pg_fetch_array($sql2);
													?>
													<li><a href="../images/student/<?php echo $arr2[name_img]; ?>" style="background-image: url('../images/student/<?php echo $arr2[name_img]; ?>');"><div class="more"> +<?php echo $num2; ?> </div></a></li>
													<?php
														while ( $arr3 = pg_fetch_array($sql2) ) {
													?>
													<li class="hidden"><a href="../images/student/<?php echo $arr3[name_img]; ?>" style="background-image: url('../images/student/<?php echo $arr3[name_img]; ?>');"></a></li>
													<?php } }else{  ?>
													<li><a href="https://h5p.org/sites/default/files/styles/small-logo/public/logos/flashcards-png-icon.png?itok=J0wStRhZ" style="background-image: url('https://h5p.org/sites/default/files/styles/small-logo/public/logos/flashcards-png-icon.png?itok=J0wStRhZ');"></a></li>
													<?php } ?>
													
												</ul>
											</div>
										</div>
									</aside>
									
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
		<script src="../scripts/toast/jquery.toast.min.js"></script>
		<!-- <script src="js/demo.js"></script> -->
		<script src="../js/e-magz.js"></script>
	</body>
</html>