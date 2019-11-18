<!DOCTYPE html>
<?php
session_start();
include("config.php");
include("check_student.php");

	$id = $_GET[stoid];

	$sql = pg_query("SELECT * from block a inner join student b on a.id_user = b.id_no where id_block = '$_GET[stoid]' ;");
	$result = pg_fetch_array($sql);

	date_default_timezone_set('Asia/Bangkok');
	$year =  date("Y"); 
	$month =  date("m"); 

	$now_day = date("Y-m-d");
	$date_time = date("Y-m-d H:i:s");



	if ( isset($_POST[comment_block]) ) {

	$user_comment = $user[email];
	$detail_comment = $_POST[detail_comment];
	$date_comment = $date_time;
    $sql = "INSERT INTO comment_block (user_comment,detail_comment,date_comment,status,id_block,iduser_comment) values ( '$user_comment','$detail_comment','$date_comment','show','$_GET[stoid]','$user[id_no]');";
    $query = pg_query($sql);
    header('location:blog_detail.php?stoid='.$_GET[stoid].'') ; 

	}

	if ( isset($_POST[update]) ) {

	$no_id = $_POST[no_id];

    $sql = "UPDATE comment_block set status = 'close' where no_id = '$no_id';  ";
	$query = pg_query($sql);

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
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<style type="text/css">
			.circle{
			    height: auto;
			    width: auto;
			    border: 3px solid #fff; 
			    border-radius: 50%; 
			    box-shadow: 0 0 5px rgba(0, 0, 0, 0.2); 
			}

			
		</style>
	</head>
	<body class="skin-blue">
		<?php include 'header.php'; ?>
		
		<section class="single">
			<div class="container">
				<div class="row">
					<div class="col-md-3 sidebar" id="sidebar">
						<aside>
							<h1 class="aside-title">ข้อมูลผู้โพส</h1>
							<div class="aside-body">
								
								<article class="article-mini">
									<div class="inner">
										<div  align="center" >
											<img  class="img-circle" src="images/student/<?php echo $result[img]; ?>" alt="" width="70%">
										</div>
										<hr>
										<ul>
											<li>
												<i class="fa fa-user" aria-hidden="true"></i> : <?php echo $result[title_name],'',$result[s_name],' ',$result[l_name]; ?>
												<a href="profile.php?eid=<?php echo $result[id_no]; ?>" title=""><i class="fa fa-search"></i></a>
												
											</li>
											<li><i class="fa fa-address-card" aria-hidden="true"></i> : <?php echo $result[university]; ?></li>
											<li><i class="fa fa-map-marker" aria-hidden="true"></i> : <?php echo $result[province]; ?></li>
										</ul>
										<hr>
										<?php
											if ($id ==  $result[id_user]) {
										?>
										<a href="blog_edit.php?stoid=<?php echo $result[id_block]; ?>" title="" class="btn btn-primary btn-block"><i class="fa fa-wrench" aria-hidden="true"></i> แก้ไขเรื่องราวนี้</a>
										<?php } ?>
										
									</div>
								</article>
							</div>
						</aside>
						
					</div>
					<div class="col-md-9">
						<ol class="breadcrumb">
							<li><a href="#">Home</a></li>
							<li class="active">blog</li>
						</ol>
						<article class="article main-article">
							<header>
								
								<h2><?php echo $result[title_block]; ?></h2>
								<ul class="details">
									<li>Posted on <?php echo $result[date_block]; ?></li>
									<li><a><?php echo $result[tag_block]; ?></a></li>
								</ul>
							</header>
							<div class="main">
								<p><?php echo $result[detail_block]; ?> <hr>
								</p>
								
							</article>

							<div>
								
								<h5>Comments</h5>
							<table>
<?php
	$sql = pg_query("SELECT * from block a inner join comment_block b on a.id_block = b.id_block where a.id_block = '$id'; ");
	$num = pg_num_rows($sql);
	if($num < 1){
 ?>
 								<tbody>
 									<tr>
											<div class="comment_container d-flex flex-row">
												<div>
													<div class="comment_image">
														<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTc_e-W3V8EDrruqEM6whqINxXtg0tn-hDQXPQoQGRELJUKpx0b" alt="">
													</div>
												</div>
												<div class="">
													<p class="">ยังไม่มี comment ขณะนี้</p>
												</div>
											</div>
										</tr>
<?php 
				}else {
				$sql = pg_query("SELECT * from block a inner join comment_block b on a.id_block = b.id_block where a.id_block = $id and status = 'show' order by no_id asc;");
				while ($arr = pg_fetch_array($sql) ) {

				$sql2 = pg_query("SELECT * from comment_block a inner join student b on a.user_comment = b.email where a.user_comment = '$arr[user_comment]'; ");
				$arr2 = pg_fetch_array($sql2);
				$num2 = pg_num_rows($sql2);

				$sql3 = pg_query("SELECT * from comment_block where user_comment = '$user[email]' and id_block = '$id'; ");
				$arr3 = pg_fetch_array($sql3);
					
?>
<form method="post">
										<tr>
											<div class="">
												<div>
													<?php if ($num2 < 1) { ?>
														<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTc_e-W3V8EDrruqEM6whqINxXtg0tn-hDQXPQoQGRELJUKpx0b">
													<?php }else { ?>
														<img  class="img-circle" src="images/student/<?php echo $arr2[img]; ?>" alt="" style="width: 50px">
													<?php } ?>
												</div>
												<div class="">
													<?php if ($num2 < 1 ) { ?>
														<span class=""><?php echo $arr[user_comment]; ?></span>
													<?php } else{ ?>
														<span class=""><a href="profile.php?eid=<?php echo $arr[iduser_comment]; ?>"><?php echo $arr2[s_name]; ?> <?php echo $arr2[l_name]; ?></a></span>
													<?php } ?>
													<span class="">|</span>
													<span class=""><?php echo $arr[date_comment]; ?></span>
													<span class="">|</span>
													<?php if ($user[email] == $arr[user_comment] ) { ?>
		                                      			<input type="hidden" name="no_id" value="<?php echo $arr[no_id]; ?>">
														<span class="">
															<button name="update" class="btn btn-primary">x</button>
														</span>
													<?php }  ?>

												</div>
												<p class=""><?php echo $arr[detail_comment]; ?></p>
											</div>
										</tr>
</form>
<?php } } ?>
								</tbody>
							</table>						
							</div>
							<div>
								<h5>Leave a comment</h5>

						<div class="">
<form method="post" action="">
								<input  class="form-control form-control-sm"  value="ผู้ส่ง : <?php echo $user[email]; ?>" readonly="" ><br>
								<textarea  class="form-control form-control-lg" name="detail_comment" placeholder="พิมพ์ข้อความที่นี่" required="required" style="width: 100% "></textarea>
								<button  type="submit" class="btn btn-primary" name="comment_cv" style="width: 100%">send message</button>
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
			<script src="scripts/toast/jquery.toast.min.js"></script>
			<!-- <script src="js/demo.js"></script> -->
			<script src="js/e-magz.js"></script>
		</body>
	</html>