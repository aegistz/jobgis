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

		<section class="category">
		  <div class="container">
		    <div class="row">
		      <div class="col-md-8 text-left">
		        <div class="row">
		          <div class="col-md-12">        
		            <ol class="breadcrumb">
		              <li><a href="#">Home</a></li>
		              <li class="active">company</li>
		            </ol>
		            <h1 class="page-title"></h1>
		            <p class="page-subtitle">ระบบจับคู่นักศึกษากับสถานประกอบการ</p>
		          </div>
		        </div>
		        <div class="line"></div>
		        <div class="row">
		   
	
		        
		          <article class="col-md-12 article-list">
		            <div class="inner">
		              <figure>
			              <a href="single.html">
			                <img src="http://upic.me/i/jo/1image1.jpg">
		                </a>
		              </figure>
		              <div class="details">
		                <div class="detail">
		                  <div class="category">
		                   <a href="category.html">Film</a>
		                  </div>
		                  <div class="time">December 26, 2016</div>
		                </div>
		                <h1><a href="single.html">Lorem Ipsum Dolor Sit Consectetur Adipisicing Elit</a></h1>
		                <p>
		                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		                  quis nostrud exercitat...
		                </p>
		                <footer>
		                  <a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div>198</div></a>
		                  <a class="btn btn-primary more" href="single.html">
		                    <div>More</div>
		                    <div><i class="ion-ios-arrow-thin-right"></i></div>
		                  </a>
		                </footer>
		              </div>
		            </div>
		          </article>
		          <div class="col-md-12 text-center">
		            <ul class="pagination">
		              <li class="prev"><a href="#"><i class="ion-ios-arrow-left"></i></a></li>
		              <li class="active"><a href="#">1</a></li>
		              <li><a href="#">2</a></li>
		              <li><a href="#">3</a></li>
		              <li><a href="#">...</a></li>
		              <li><a href="#">97</a></li>
		              <li class="next"><a href="#"><i class="ion-ios-arrow-right"></i></a></li>
		            </ul>
		            <div class="pagination-help-text">
		            	Showing 8 results of 776 &mdash; Page 1
		            </div>
		          </div>
		        </div>
		      </div>







		      <div class="col-md-4 sidebar">
		        <aside>
		          <div class="aside-body">
		            <figure class="ads">
			            <a href="single.html">
			              <img src="http://www3.cgistln.nu.ac.th/training/img/logo.png">
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
														<div class="value">4</div>														
													</a>
												</div>
												<div class="item">
													<a href="#">
														<div class="name">ผู้สมัคร</div>
														<div class="value">3,729</div>														
													</a>
												</div>
												<div class="item">
													<a href="profile.php" title="">
														<div class="icon">
															<div>เพิ่มประกาศรับ</div>
															<i class="ion-chevron-right"></i>
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
		          <div class="aside-body">
		            <div class="line"></div>
		            <article class="article-mini">
		              <div class="inner">
		              <figure>
			              <a href="single.html">
			                <img src="../images/news/img05.jpg">
		                </a>
		              </figure>
		              <div class="padding">
		                <h1><a href="single.html">Duis aute irure dolor in reprehenderit in voluptate velit</a></h1>
		                <div class="detail">
		                  <div class="category"><a href="category.html">Lifestyle</a></div>
		                  <div class="time">December 22, 2016</div>
		                </div>
		              </div>
		              </div>
		            </article>
		            <article class="article-mini">
		              <div class="inner">
		                <figure>
			                <a href="single.html">
			                  <img src="../images/news/img02.jpg">
		                  </a>
		                </figure>
		                <div class="padding">
		                  <h1><a href="single.html">Fusce ullamcorper elit at felis cursus suscipit</a></h1>
		                  <div class="detail">
		                    <div class="category"><a href="category.html">Travel</a></div>
		                    <div class="time">December 21, 2016</div>
		                  </div>
		                </div>
		              </div>
		            </article>
		            <article class="article-mini">
		              <div class="inner">
		                <figure>
			                <a href="single.html">
			                  <img src="../images/news/img13.jpg">
		                  </a>
		                </figure>
		                <div class="padding">
		                  <h1><a href="single.html">Duis aute irure dolor in reprehenderit in voluptate velit</a></h1>
		                  <div class="detail">
		                    <div class="category"><a href="category.html">International</a></div>
		                    <div class="time">December 20, 2016</div>
		                  </div>
		                </div>
		              </div>
		            </article>
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