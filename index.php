<!DOCTYPE html>
<?php
session_start();

include("config.php");
include("check_student.php")

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
		<link rel="stylesheet" href="scripts/sweetalert/dist/sweetalert.css">
		<!-- Custom style -->
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/skins/blue.css">
		<link rel="stylesheet" href="css/demo.css">
		<link rel="icon" href="https://www.gistda.or.th/main/sites/default/files/favicon.ico" type="image/png" >


		<link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">

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
						<div class="owl-carousel owl-theme slide" id="featured">

							<div class="item">
								<article class="featured">
									<div class="overlay"></div>
									<figure>
										<img src="https://www.jobtopgun.com/content/filejobtopgun/picslide/21844_1516958634287.jpg?v=16" alt="Sample Article">
									</figure>
									<div class="details">
										<div class="category"><a href="category.html">ข่าวรับสมัครงาน</a></div>
										<h1><a href="news.php">Plant breeder เจ้าหน้าที่ปรับปรุงพันธุ์ข้าว</a></h1>
										<div class="time">บริษัท เจริญโภคภัณฑ์วิศวกรรม จำกัด</div>
									</div>
								</article>
							</div>

							<div class="item">
								<article class="featured">
									<div class="overlay"></div>
									<figure>
										<img src="images/news/news4.jpg" alt="Sample Article">
									</figure>
									<div class="details">
										<div class="category"><a href="category.html">ข่าวสารทั่วไป</a></div>
										<h1><a href="news.php">"มหัศจรรย์มุมสูง" ในมุมของคุณ เป็นอย่างไร ❓</a></h1>
										<div class="time">October 12, 2016</div>
									</div>
								</article>
							</div>

							<div class="item">
								<article class="featured">
									<div class="overlay"></div>
									<figure>
										<img src="images/news/news3.jpg" alt="Sample Article">
									</figure>
									<div class="details">
										<div class="category"><a href="category.html">ข่าวรับสมัครงาน</a></div>
										<h1><a href="news.php">พนักงานนำเข้าข้อมูลแผนที่ (รายวันๆละ 450 บาท) / GIS Editor (สัญญาจ้างรายปี) </a></h1>
										<div class="time">บริษัท ดี.ที.ซี. เอ็นเตอร์ไพรส์ จำกัด</div>
									</div>
								</article>
							</div>

							<div class="item">
								<article class="featured">
									<div class="overlay"></div>
									<figure>
										<img src="images/news/news1.jpg" alt="Sample Article">
									</figure>
									<div class="details">
										<div class="category"><a href="category.html">ข่าวสารทั่วไป</a></div>
										<h1><a href="news.php">"แนวทางการสร้างเว็บแอพพลิเคชั่นแผนที่ด้วยโอเพนซอร์ซ"</a></h1>
										<div class="time">December 9, 2018</div>
									</div>
								</article>
							</div>


						</div>

						<div class="line">
							<div>ข่าวสารรับสมัคร</div>
						</div>
						
						<div class="row">
							<article class="col-md-12 article-list">
								<div class="inner">
									<figure>
										<a href="news.php">
											<img src="images/news/j215544.png" alt="Sample Article">
										</a>
									</figure>
									<div class="details">
										<div class="detail">
											<div class="category">
												<a href="#">ข่าวรับสมัครงาน</a>
											</div>
											<div class="time">December 19, 2016</div>
										</div>
										<h1><a href="news.php">นักวิชาการเกษตร</a></h1>
										<p>
										บริษัท กรีนไลฟ์ อินเตอร์เนชั่นแนล จำกัด  Agricultural Research Officer <br>
										<small> <i><b>การรับ  : </b>    เด็กฝึกงาน / สหกิจศึกษา / งานประจำ</i> </small> 
										</p>
										<footer>
											<a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div>273</div></a>
											<a class="btn btn-primary more" href="news.php">
												<div>More</div>
												<div><i class="ion-ios-arrow-thin-right"></i></div>
											</a>
										</footer>
									</div>
								</div>
							</article>
							<article class="col-md-12 article-list">
								<div class="inner">
									<div class="badge">
										Sponsored
									</div>
									<figure>
										<a href="news.php">
											<img src="https://www.jobtopgun.com/content/filejobtopgun/logo_com_job/j27745.gif?v=13" alt="Sample Article">
										</a>
									</figure>
									<div class="details">
										<div class="detail">
											<div class="category">
												<a href="#">ข่าวรับสมัครงาน</a>
											</div>
											<div class="time">December 18, 2016</div>
										</div>
										<h1><a href="news.php">ผู้เชียวชาญบริการจัดการแมลง</a></h1>
										<p>
											บริษัท คิงส์ เซอร์วิส เซ็นเตอร์ จำกัด Pest Management Technician<br>
										<small> <i><b>การรับ  : </b>    งานประจำ</i> </small> 
										</p>
										<footer>
											<a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div>4209</div></a>
											<a class="btn btn-primary more" href="news.php">
												<div>More</div>
												<div><i class="ion-ios-arrow-thin-right"></i></div>
											</a>
										</footer>
									</div>
								</div>
							</article>
							<article class="col-md-12 article-list">
								<div class="inner">
									<figure>
										<a href="news.php">
											<img src="https://www.jobtopgun.com/content/filejobtopgun/logo_com_job/j6825.gif?v=32" alt="Sample Article">
										</a>
									</figure>
									<div class="details">
										<div class="detail">
											<div class="category">
											<a href="#">ข่าวรับสมัครงาน</a>
											</div>
											<div class="time">December 16, 2016</div>
										</div>
										<h1><a href="news.php">ผู้จัดการฝ่ายปฏิบัติการ</a></h1>
										<p>
											บริษัท เซเว่น ยูทิลิตี้ส์ แอนด์ พาวเวอร์ จำกัด (มหาชน)<br>
										<small> <i><b>การรับ  : </b>    พนักงานชั่วคราว</i> </small> 
										</p>
										<footer>
											<a href="#" class="love active"><i class="ion-android-favorite"></i> <div>302</div></a>
											<a class="btn btn-primary more" href="news.php">
												<div>More</div>
												<div><i class="ion-ios-arrow-thin-right"></i></div>
											</a>
										</footer>
									</div>
								</div>
							</article>
						</div>
					</div>



					<div class="col-xs-6 col-md-4 sidebar" id="sidebar">
						<div class="sidebar-title for-tablet">Sidebar</div>
						<aside>
							<div class="aside-body">
								<div class="featured-author">
									<div class="featured-author-inner">
										<div class="featured-author-cover" style="background-image: url('images/news/news4.jpg');">
											<div class="featured-author-center">
												<figure class="featured-author-picture">
													<?php if($user[img] == ''){ ?>
														<img src="https://image.flaticon.com/icons/png/512/149/149071.png" alt="Sample Article">
													<?php } else { ?>
														<img src="images/student/<?php echo $user[img]; ?>" alt="Sample Article">
													<?php } ?>
												</figure>
												<div class="featured-author-info">
													<h2 class="name"><?php echo $user[s_name],' ', $user[l_name]; ?> </h2>
													<div class="desc"><?php echo $user[email]; ?> </div>
												</div>
											</div>
										</div>
										<div class="featured-author-body">
											<div class="featured-author-count">
												<div class="item">
													<a href="#">
														<div class="name">Posts</div>
														<div class="value">208</div>														
													</a>
												</div>
												<div class="item">
													<a href="#">
														<div class="name">View</div>
														<div class="value">3,729</div>														
													</a>
												</div>
												<div class="item">
													<a href="profile.php" title="">
														<div class="icon">
															<div>More</div>
															<i class="ion-chevron-right"></i>
														</div>	
													</a>													
												</div>
											</div>
											<div class="featured-author-quote">
											   <b>สถานะ : </b>	  ต้องการหางานทางด้านพัฒนาระบบภูมิสารสนเทศ GIS ด่วน ๆ พร้อมเริ่มงาน
											</div>
											<div class="block">
												<h2 class="block-title">ภาพประสบการณ์</h2>
												<div class="block-body">
													<ul class="item-list-round" data-magnific="gallery">
														<?php 
	$id = $user[id_no];
	$query = pg_query("SELECT * from photo_user where id_user = '$id' order by id_img desc limit 10 ;");
	$num = pg_num_rows($query);

	if( $num != 0 ) {
		while( $arr = pg_fetch_array($query)  ){  
?>
						<li><a href="images/student/<?php echo $arr[name_img]; ?>" style="background-image: url('images/student/<?php echo $arr[name_img]; ?>');"></a></li>
<?php }    }else{  ?>
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
											<button class="btn btn-primary"><i class="ion-paper-airplane"></i></button>
										</div>
									</div>
									<p>By subscribing you will receive new articles in your email.</p>
								</form>
							</div>
						</aside>
						<aside>
							<div class="aside-body">
								<figure class="ads">
									<img src="https://www.jobtopgun.com/images/th/banner_industrial_interpolitan.png?t=20180921171200">
									<figcaption>Advertisement</figcaption>
								</figure>
							</div>
						</aside>
						<aside>
							<h1 class="aside-title">Popular <a href="#" class="all">See All <i class="ion-ios-arrow-right"></i></a></h1>
							<div class="aside-body">
								<article class="article-mini">
									<div class="inner">
										<figure>
											<a href="news.php">
												<img src="images/news/j215544.png" alt="Sample Article">
											</a>
										</figure>
										<div class="padding">
											<h1><a href="news.php">นักวิชาการเกษตร</a></h1>
											<p>
										บริษัท กรีนไลฟ์ อินเตอร์เนชั่นแนล จำกัด  Agricultural Research Officer ยินดีรับนักศึกษาจบใหม่
										</p>
										</div>
									</div>
								</article>
								<article class="article-mini">
									<div class="inner">
										<figure>
											<a href="news.php">
												<img src="https://www.jobtopgun.com/content/filejobtopgun/logo_com_job/j27745.gif?v=13" alt="Sample Article">
											</a>
										</figure>
										<div class="padding">
											<h1><a href="news.php">ผู้เชียวชาญบริการจัดการแมลง</a></h1>
											<p>
											บริษัท คิงส์ เซอร์วิส เซ็นเตอร์ จำกัด Pest Management Technician
										</p>
										</div>
									</div>
								</article>
								<article class="article-mini">
									<div class="inner">
										<figure>
											<a href="news.php">
												<img src="https://www.jobtopgun.com/content/filejobtopgun/logo_com_job/j6825.gif?v=32" alt="Sample Article">
											</a>
										</figure>
										<div class="padding">
											<h1><a href="news.php">ผู้จัดการฝ่ายปฏิบัติการ</a></h1>
										<p>
											บริษัท เซเว่น ยูทิลิตี้ส์ แอนด์ พาวเวอร์ จำกัด (มหาชน)
										</p>
										</div>
									</div>
								</article>
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
					<article class="article">
						<div class="inner">
							<figure>
								<a href="news.php">
									<img src="https://www.jobtopgun.com/content/filejobtopgun/picslide/21844_1516958634287.jpg?v=16" alt="Sample Article">
								</a>
							</figure>
							<div class="padding">
								<div class="detail">
									<div class="time">December 09, 2016</div>
									<div class="category"><a href="category.html">ข่าวรับสมัครงาน</a></div>
								</div>
								<h2><a href="news.php">Plant breeder เจ้าหน้าที่ปรับปรุงพันธุ์ข้าว</a></h2>
								<p>บริษัท เจริญโภคภัณฑ์วิศวกรรม จำกัด</p>
							</div>
						</div>
					</article>
					<article class="article">
						<div class="inner">
							<figure>
								<a href="news.php">
									<img src="https://www.jobtopgun.com/content/filejobtopgun/picslide/3600_1507796903037.jpg?v=38" alt="Sample Article">
								</a>
							</figure>
							<div class="padding">
								<div class="detail">
									<div class="time">December 09, 2016</div>
									<div class="category"><a href="category.html">Sport</a></div>
								</div>
								<h2><a href="news.php">พนักงานสุ่มตัวอย่าง Sampler Officer</a></h2>
								<p>บริษัท เจียไต๋ จำกัด</p>
							</div>
						</div>
					</article>
					<article class="article">
						<div class="inner">
							<figure>
								<a href="news.php">
									<img src="https://www.jobtopgun.com/content/filejobtopgun/picslide/21045_1401871544747.jpg?v=6" alt="Sample Article">
								</a>
							</figure>
							<div class="padding">
								<div class="detail">
									<div class="time">December 26, 2016</div>
									<div class="category"><a href="category.html">Lifestyle</a></div>
								</div>
								<h2><a href="news.php">Plant Operation Technician (Packing Export & Processing Sweet corn)</a></h2>
								<p>บริษัท มอนซานโต้ ไทยแลนด์ จำกัด</p>
							</div>
						</div>
					</article>
					<article class="article">
						<div class="inner">
							<figure>
								<a href="news.php">
									<img src="https://www.jobtopgun.com/content/filejobtopgun/picslide/3600_1507796903074.jpg?v=43" alt="Sample Article">
								</a>
							</figure>
							<div class="padding">
								<div class="detail">
									<div class="time">December 26, 2016</div>
									<div class="category"><a href="category.html">Travel</a></div>
								</div>
								<h2><a href="news.php">พนักงานขาย (Cash Sale)
Sale Representative (Cash Sale)</a></h2>
								<p>บริษัท เจียไต๋ จำกัด</p>
							</div>
						</div>
					</article>
					<article class="article">
						<div class="inner">
							<figure>
								<a href="news.php">
									<img src="https://www.jobtopgun.com/content/filejobtopgun/picslide/3600_1507796903014.jpg?v=47" alt="Sample Article">
								</a>
							</figure>
							<div class="padding">
								<div class="detail">
									<div class="time">December 26, 2016</div>
									<div class="category"><a href="category.html">Travel</a></div>
								</div>
								<h2><a href="news.php">พนักงานเทคโนโลยีสารสนเทศ
Information Technology Officer</a></h2>
								<p>บริษัท เจียไต๋ จำกัด</p>
							</div>
						</div>
					</article>
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
	</body>
</html>