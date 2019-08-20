<!DOCTYPE html>
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
					<div class="col-md-3">
						<aside>
							<h2 class="aside-title">ค้นหางาน</h2>
							<div class="aside-body">
								<form>
									<div class="form-group">
										<div class="input-group">
											<input type="text" name="q" class="form-control" placeholder="ค้นหาจากชื่อตำแหน่งงาน..." >
											<div class="input-group-btn">
												<button class="btn btn-primary">
													<i class="ion-search"></i>
												</button>
											</div>
										</div>
									</div>
								</form>
							</div>
							<div class="aside-body">
								<form class="checkbox-group">
									<div class="group-title">ช่วงเวลา</div>
									<div class="form-group">
										<label><input type="radio" name="date" checked> ทุกเวลา</label>
									</div>
									<div class="form-group">
										<label><input type="radio" name="date"> วันนี้</label>
									</div>
									<div class="form-group">
										<label><input type="radio" name="date"> สัปดาห์นี้</label>
									</div>
									<div class="form-group">
										<label><input type="radio" name="date"> เดือนนี้</label>
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
								</form>
							</div>

						</aside>
					</div>
					<div class="col-md-9">
						<div class="nav-tabs-group">
							<ul class="nav-tabs-list">
								<li class="active"><a href="#">All</a></li>
								<li><a href="#">Latest</a></li>
								<li><a href="#">Popular</a></li>
								<li><a href="#">Trending</a></li>
								<li><a href="#">Videos</a></li>
							</ul>
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
	$sql = pg_query("SELECT * from job_company a  inner join company b on a.id_com = b.id_com ;  ");
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

			} );
		</script>
	</body>
</html>