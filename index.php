<!DOCTYPE html>
<?php
session_start();
include("config.php");
include("check_student.php");
include("api_service/index_api.php");

$sql_request_list = pg_query("SELECT * from user_request a
inner join job_company b on a.id_job = b.id_job
inner join company c on c.id_com = b.id_com where email_user = '$user[email]' ;  ");


$num_request_list = pg_num_rows($sql_request_list);

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
<link rel='stylesheet' href='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css'>
		<!-- Custom style -->
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/skins/blue.css">
		<link rel="stylesheet" href="css/demo.css">
		<link rel="icon" href="https://www.gistda.or.th/main/sites/default/files/favicon.ico" type="image/png" >
		<link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
		<style>
			.row.content {
				height: 620px
			}
			.anyClass {
<?php 
	if ($num_request_list == 0) {
		echo 'height: 10px;';
	}else if ($num_request_list == 1) {
		echo 'height: 200px;';
	}else if ($num_request_list == 2) {
		echo 'height: 450px;';
	}else {
		echo 'height: 650px;';
	}
?>
				

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
		<section class="home">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-sm-12 col-xs-12">
						<div class="headline">
							<div class="nav" id="headline-nav">
								<a class="left carousel-control" role="button" data-slide="prev">
									<span class="ion-ios-arrow-left" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" role="button" data-slide="next">
									<span class="ion-ios-arrow-right" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
							<div class="owl-carousel owl-theme" id="headline">
								<div class="item">
									<a href="#"><div class="badge">Tip!</div> เทคนิคการหางานด้าน GIS จากความต้องการของฝ่ายบุคคล</a>
								</div>
								<div class="item">
									<a href="#">เขียน Resume ยังไงให้ได้งาน</a>
								</div>
								<div class="item">
									<a href="#">ทำไมส่งใบสมัครไปหลายที่แต่ไม่โดนเรียก ที่นี่มีคำตอบ</a>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<form action="search.php" method="get">
								<legend>ค้นหางานและสมัครงาน : มีงานมากกว่า
									<?php
										$sql = pg_query("SELECT * from job_company ;");
										$num = pg_num_rows($sql);
										echo $num;
									?>
								ตำแหน่ง</legend>
								<div class="col-md-6">
									<fieldset>
										<div class="form-group row">
											<label for="staticEmail" class="col-sm-4 col-form-label">สายอาชีพ</label>
											<div class="col-sm-8">
												<select class="form-control" name="tag" >
													<option value="">- - กดเพื่อเลือก - -</option>
													<option value="ภูมิศาสตร์">ภูมิศาสตร์</option>
													<option value="ภูมิสารสนเทศ">ภูมิสารสนเทศ</option>
													<option value="ผังเมือง">ผังเมือง</option>
													<option value="แผนที่">แผนที่</option>
													<option value="ไอที">ไอที</option>
													<option value="วิจัย">วิจัย</option>
													<option value="กราฟฟิก">กราฟฟิก</option>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label for="staticEmail" class="col-sm-4 col-form-label">พื้นที่ทำงาน</label>
											<div class="col-sm-8">
												<select class="form-control" name="area">
													<option value="">- - กดเพื่อเลือก - -</option>
													<?php 
														$sql_province = pg_query("SELECT * from prov order by pv_tn asc");
														while ( $arr_pro = pg_fetch_array($sql_province)) {
													?>
													<option value="<?php echo $arr_pro[pv_tn]; ?>">
														<?php echo $arr_pro[pv_tn]; ?>
													</option>
												<?php } ?>

												</select>
											</div>
										</div>
										<div class="form-group row">
											<label for="staticEmail" class="col-sm-4 col-form-label">ระดับการศึกษา</label>
											<div class="col-sm-8">
												<select class="form-control" name="degree">
													<option value="">- - กดเพื่อเลือก - -</option>
													<option value="ต่ำกว่า ปวช.">ต่ำกว่า ปวช.</option>
													<option value="ปวช. ปวส. อนุปริญญา">ปวช. ปวส. อนุปริญญา</option>
													<option value="ปริญญาตรีขึ้นไป">ปริญญาตรีขึ้นไป</option>
													<option value="ปริญญาโทขึ้นไป">ปริญญาโทขึ้นไป</option>
												</select>
											</div>
										</div>
									</fieldset>
								</div>
								<div class="col-md-6">
									<fieldset>
										<div class="form-group row">
											<label for="staticEmail" class="col-sm-4 col-form-label">ช่วงเงินเดือน</label>
											<div class="col-sm-8" >
												<select class="form-control" name="budget">
													<option value="">- - กดเพื่อเลือก - -</option>
													<option value="">5,000 - 10,000</option>
													<option value="">10,000 - 15,000</option>
													<option value="">15,000 - 20,000</option>
													<option value="">20,000 - 25,000</option>
													<option value="">25,000 - 30,000</option>
													<option value="">30,000 - 35,000</option>
													<option value="">35,000 - 40,000</option>
													<option value="">40,000 - 45,000</option>
													<option value="">45,000 - 50,000</option>
													<option value="">มากกว่า 50,000</option>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<label for="staticEmail" class="col-sm-4 col-form-label">ประเภทงาน</label>
											<div class="col-sm-8">
												<select class="form-control" name="type">
													<option value="all_type">- - กดเพื่อเลือก - -</option>
													<option value="full_time">งานประจำ</option>
													<option value="daily_work">งานรายวัน</option>
													<option value="apprentice">ฝึกงาน</option>
													<option value="coop">สหกิจศึกษา</option>
												</select>
											</div>
										</div>
									</fieldset>
								</div>
								<button type="submit" class="btn btn-primary btn-block">ค้นหางาน</button>
							</form>
							
						</div>
						<div class="line">
							<div>ข่าวสารรับสมัครล่าสุด</div>
							<!-- <?php
							$str = "Cc0d0388d15";
							echo sha1($str);
							?>  -->
						</div>
						
						<div class="row">
							<table id="example" class="" style="width:100%">
								<thead>
									<tr>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php
										$sql = pg_query("SELECT * from job_company a  inner join company b on a.id_com = b.id_com  where status_job = 'เปิดรับสมัครอยู่';  ");
										while ( $arr = pg_fetch_array($sql) ) {
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
														<?php
															echo mb_strimwidth($arr[detail_job], 0, 200, '....<a href="news.php?q='.$arr[id_job].'" title="">เพิ่มเติม</a>');
														?>
															<br>
															<small> <i><b>การรับ  : </b>    <?php echo $arr[type_job]; ?></i> </small>
														</p>
														<!-- <footer>
															<a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div>273</div></a>
															<a class="btn btn-primary more" href="news.php?q=<?php echo $arr[id_job]; ?>">
																<div>More</div>
																<div><i class="ion-ios-arrow-thin-right"></i></div>
															</a>
														</footer> -->
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
					<div class="col-xs-6 col-md-4 sidebar" id="sidebar">
						<div class="sidebar-title for-tablet">Sidebar</div>
						<aside>
							<div class="aside-body">
								<div class="featured-author">
									<div class="featured-author-inner">
										<?php if($user[bg_img] != ''){ ?>
										<div class="featured-author-cover" style="background-image: url('images/student/<?php echo $user[bg_img]; ?>');">
											<?php }else{ ?>
											<div class="featured-author-cover" style="background-image: url('images/student/bg_img.png');">
												<?php } ?>
												<div class="featured-author-center divbutton">
													<a href="profile.php" title="">
													<figure class="featured-author-picture">
														<?php if($user[img] == ''){ ?>
														<img  src="https://image.flaticon.com/icons/png/512/149/149071.png" alt="Sample Article">
														<?php } else { ?>
														<img src="images/student/<?php echo $user[img]; ?>" alt="Sample Article">
														<?php } ?>
													</figure>
													</a>
													<div class="featured-author-info">
														<h2 class="name">

															<a class="btn btn-primary btn-sm" href="profile.php" title="">
															คุณ <?php echo $user[s_name],' ', $user[l_name]; ?> 
															</a>
															<div class="desc"><b><?php echo $user[email]; ?></b> </div>
														</h2>
														
													</div>
												</div>
											</div>
											<div class="featured-author-body">
												<div class="featured-author-count">
													<div class="item">
														<a href="#">
															<div class="name">Posts</div>
															<div class="value">
																<?php
																$sql_post_num = pg_query("SELECT * from  story where id_user = '$user[id_no]';");
																$num_post = pg_num_rows($sql_post_num);
																echo number_format($num_post) ;
															?></div>
														</a>
													</div>
													<div class="item">
														<a href="#">
															<div class="name">View</div>
															<div class="value">0</div>
														</a>
													</div>
													<div class="item">
														<a href="profile.php" title="">
															<div class="icon">
																<div>ดูข้อมูล</div>
																<i class="ion-chevron-right"></i>
															</div>
														</a>
													</div>
												</div>
												<!-- <div class="featured-author-quote">
															<b>สถานะ : </b>	  ต้องการหางานทางด้านพัฒนาระบบภูมิสารสนเทศ GIS ด่วน ๆ พร้อมเริ่มงาน
												</div> -->
												<div class="block">
													<h2 class="block-title">ภาพประสบการณ์</h2>
													<div class="block-body">
														<ul class="item-list-round" data-magnific="gallery">
															<?php
																$id = $user[id_no];
																$query = pg_query("with ss as (
															SELECT ROW_NUMBER () OVER (ORDER BY id_img asc) as row,* from photo_user where id_user = '$id' order by id_img desc
															) SELECT * from ss where row between 1 and 6");
																$num = pg_num_rows($query);
																if( $num != 0 ) {
																	while( $arr = pg_fetch_array($query)  ){
															?>
															<li><a href="images/student/<?php echo $arr[name_img]; ?>" style="background-image: url('images/student/<?php echo $arr[name_img]; ?>');"></a></li>
															<?php }
																$sql2 = pg_query("with ss as (
															SELECT ROW_NUMBER () OVER (ORDER BY id_img asc) as row,* from photo_user where id_user = '$id' order by id_img desc
															) SELECT * from ss where row >= 7");
																$num2 = pg_num_rows($sql2);
																$arr2 = pg_fetch_array($sql2);
															?>
															<li><a href="images/student/<?php echo $arr2[name_img]; ?>" style="background-image: url('images/student/<?php echo $arr2[name_img]; ?>');"><div class="more"> +<?php echo $num2; ?> </div></a></li>
															<?php
																while ( $arr3 = pg_fetch_array($sql2) ) {
															?>
															<li class="hidden"><a href="images/student/<?php echo $arr3[name_img]; ?>" style="background-image: url('images/student/<?php echo $arr3[name_img]; ?>');"></a></li>
															<?php } }else{  ?>
															<li><a href="https://h5p.org/sites/default/files/styles/small-logo/public/logos/flashcards-png-icon.png?itok=J0wStRhZ" style="background-image: url('https://h5p.org/sites/default/files/styles/small-logo/public/logos/flashcards-png-icon.png?itok=J0wStRhZ');"></a></li>
															<?php } ?>
															
														</ul>
													</div>
												</div>
												
											</div>
										</div>
									</div>
								</div>
							</aside>
							<aside id="request">
								<h1 class="aside-title">สถานะงานที่ท่านสมัคร </h1>
								<div class="aside-body">
									<ul class="nav nav-pills nav-stacked anyClass">
										<?php
											while ( $arr = pg_fetch_array($sql_request_list) ) {
										?>
										<article class="article-mini">
											<div class="inner">
												<figure>
														<img src="images/img_job/<?php echo $arr[img]; ?>" alt="Sample Article">
												</figure>

												<div class="padding">
													<p>
<?php if ($arr[request] == 'รอการยืนยัน') { ?>
														<div class="btn-group">
														  <button type="button" class="btn btn-sm btn-warning btn-block dropdown-toggle" data-toggle="dropdown">
														    สถานะ : <?php echo $arr[request]; ?>
														  </button>
														  <ul class="dropdown-menu" role="menu">
														    <li><a  href="index.php?type=delete_request&req_id=<?php echo $arr[id_no] ?>" onclick="return confirm('ยืนยันการลบการสมัครงานในครั้งนี้ ? ถ้าลบแล้วจะสามารถย้อนกลับได้')">x ลบการสมัคร</a></li>
														  </ul>
														</div>
<?php } else if($arr[request] == 'ยืนยันการสมัครแล้ว'){ ?> 
														<div class="btn-group">
														  <button type="button" class="btn btn-sm btn-info btn-block dropdown-toggle" data-toggle="dropdown">
														    สถานะ : <?php echo $arr[request]; ?>
														  </button>
														</div>

<?php } else if($arr[request] == 'ไม่ผ่านการสมัคร'){  ?>
														<div class="btn-group">
														  <button type="button" class="btn btn-sm btn-danger btn-block dropdown-toggle" data-toggle="dropdown">
														    สถานะ : <?php echo $arr[request]; ?>
														  </button>
														  <ul class="dropdown-menu" role="menu">
														    <li><a  href="index.php?type=delete_request&req_id=<?php echo $arr[id_no] ?>" onclick="return confirm('ยืนยันการลบการสมัครงานในครั้งนี้ ? ถ้าลบแล้วจะสามารถย้อนกลับได้')">x ลบการสมัคร</a></li>
														  </ul>
														</div>

<?php } else if($arr[request] == 'ผ่านการสมัคร รอการติดต่อกลับ'){   ?>
														<div class="btn-group">
														  <button type="button" class="btn btn-sm btn-success btn-block dropdown-toggle" data-toggle="dropdown">
														    สถานะ : <?php echo $arr[request]; ?>
														  </button>
														</div>

<?php } ?>


														
													</p>
													<h1><a href="news.php?q=<?php echo $arr[id_job];?>"><?php echo $arr[name_job]; ?></a></h1>
													<p>
														โดย : <a href="company.php?com_id=<?php echo $arr[id_com]; ?>" title="">
															<?php echo $arr[name_com]; ?>
														</a> 
													</p>
												
													
												</div>
											</div>
										</article>
										<hr>
										<?php } ?>
									</ul>
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
								<h1 class="aside-title">Popular <a href="#" class="all">See All <i class="ion-ios-arrow-right"></i></a></h1>
								<div class="aside-body">
									<?php
																	$sql = pg_query("SELECT * from job_company a  inner join company b on a.id_com = b.id_com limit 5 ;  ");
																	while ( $arr = pg_fetch_array($sql) ) {
									?>
									<article class="article-mini">
										<div class="inner">
											<figure>
												<a href="news.php?q=<?php echo $arr[id_job]; ?>">
													<img src="images/img_job/<?php echo $arr[img]; ?>" alt="Sample Article">
												</a>
											</figure>
											<div class="padding">
												<h1><a href="news.php?q=<?php echo $arr[id_job]; ?>"><?php echo $arr[name_job]; ?></a></h1>
												<p>
													<?php
															echo mb_strimwidth($arr[detail_job], 0, 120, '....<a href="news.php?q='.$arr[id_job].'" title="">เพิ่มเติม</a>');
														?>
												</p>
											</div>
										</div>
									</article>
									<?php } ?>
								</div>
							</aside>
							
							
						</div>
					</div>
				</div>
			</section>
			<section class="best-of-the-week">
				<div class="container">
					<h1><div class="text">งานที่คนสนใจมากที่สุด</div>
					<div class="carousel-nav" id="best-of-the-week-nav">
						<div class="prev">
							<i class="ion-ios-arrow-left"></i>
						</div>
						<div class="next">
							<i class="ion-ios-arrow-right"></i>
						</div>
					</div>
					</h1>
					<div class="owl-carousel owl-theme carousel-1">
						<?php
														$sql = pg_query("SELECT * from job_company a  inner join company b on a.id_com = b.id_com limit 5 ;  ");
														while ( $arr = pg_fetch_array($sql) ) {
						?>
						<article class="article">
							<div class="inner">
								<figure>
									<a  href="news.php?q=<?php echo $arr[id_job]; ?>">
										<img src="images/img_job/<?php echo $arr[img]; ?>" alt="Sample Article">
									</a>
								</figure>
								<div class="padding">
									<div class="detail">
										<div class="time"><?php echo $arr[date_job]; ?></div>
										<div class="category"><a href=""><?php echo $arr[type_job]; ?></a></div>
									</div>
									<h2><a href="news.php?q=<?php echo $arr[id_job]; ?>"><?php echo $arr[name_job]; ?></a></h2>
									<p><?php
															echo mb_strimwidth($arr[detail_job], 0, 120, '....<a href="news.php?q='.$arr[id_job].'" title="">เพิ่มเติม</a>');
														?></p>
								</div>
							</div>
						</article>
						<?php } ?>
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
			<script src="scripts/toast/jquery.toast.min.js"></script>
			<!-- <script src="js/demo.js"></script> -->
			<script src="js/e-magz.js"></script>
			<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"  ></script>
			<script src='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js'></script>
			<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js" ></script>
			<script type="text/javascript">
				$(document).ready(function() {
				$('#example').DataTable({
					"searching": false,
					"aLengthMenu": [[5, 25, 50, 100], [5, 25, 50, 100, "All"]]
				});
				} );

			
				document.getElementById('b4').onclick = function(){
					swal({
						title: "Are you sure?",
						text: "You will not be able to recover this imaginary file!",
						type: "warning",
						showCancelButton: true,
						confirmButtonColor: '#DD6B55',
						confirmButtonText: 'Yes, delete it!',
						closeOnConfirm: false,
						//closeOnCancel: false
					},
					function(){
						swal("Deleted!", "Your imaginary file has been deleted!", "success");
					});
				};

			</script>
		</body>
	</html>