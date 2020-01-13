<!DOCTYPE html>
<?php
session_start();
include("config.php");
include("check_student.php");
	$sql = pg_query("SELECT * from story a inner join student b on a.id_user = b.id_no where id_story = '$_GET[stoid]' ;");
	$result = pg_fetch_array($sql);
if( $_POST[update_story] == 'true' )
{
				$title_story = $_POST[title_story];
				$detail_story = $_POST[detail_story];
				$stoid = $_POST[stoid];
				$sql = pg_query("UPDATE story set title_story = '$title_story' , detail_story = '$detail_story' where id_story = '$stoid' ;");
				header('location:story_detail.php?stoid='.$stoid);
}
if( $_POST[update_story] == 'false' )
{
	
				$image = $_FILES["file"]["name"];
				
				if( empty( $image ) ) {
				$error = 'File is empty, please select image to upload.';
				} else if($_FILES["file"]["type"] == "application/msword") {
				$error = 'Invalid image type, use (e.g. png, jpg, gif).';
				} else if( $_FILES["file"]["error"] > 0 ) {
				$error = 'Oops sorry, seems there is an error uploading your image, please try again later.';
				} else {
				
				// strip file slashes in uploaded file, although it will not happen but just in case ;)
				$filename = stripslashes( $_FILES['file']['name'] );
				$ext = get_file_extension( $filename );
				$ext = strtolower( $ext );
				
				if(( $ext != "jpg" ) && ( $ext != "jpeg" ) && ( $ext != "png" ) && ( $ext != "gif" ) ) {
				$error = 'Unknown Image extension.';
				return false;
				} else {
				// get uploaded file size
				$size = filesize( $_FILES['file']['tmp_name'] );
				
				// get php ini settings for max uploaded file size
				$max_upload = ini_get( 'upload_max_filesize' );
				
				// check if we're able to upload lessthan the max size
				if( $size > $max_upload )
				$error = 'You have exceeded the upload file size.';
				
				// check uploaded file extension if it is jpg or jpeg, otherwise png and if not then it goes to gif image conversion
				$uploaded_file = $_FILES['file']['tmp_name'];
				if( $ext == "jpg" || $ext == "jpeg" )
				$source = imagecreatefromjpeg( $uploaded_file );
				else if( $ext == "png" )
				$source = imagecreatefrompng( $uploaded_file );
				else
				$source = imagecreatefromgif( $uploaded_file );
				
				// getimagesize() function simply get the size of an image
				list( $width, $height) = getimagesize ( $uploaded_file );
				$ratio = $height / $width;
				
				
				// new width 100 in pixel format too
				$nw1 = 450;
				$nh1 = ceil( $ratio * $nw1 );
				$dst1 = imagecreatetruecolor( $nw1, $nh1 );
				
				imagecopyresampled( $dst1, $source, 0, 0, 0, 0, $nw1, $nh1, $width, $height );
				
				// rename our upload image file name, this to avoid conflict in previous upload images
				// to easily get our uploaded images name we added image size to the suffix
				$rnd_name1 = 'photos_student_'.uniqid(mt_rand(10, 15)).'_'.time().'_450x450.'.$ext;
				
				// move it to uploads dir with full quality
				imagejpeg( $dst1, 'images/story/'.$rnd_name1, 100 );
				
				// I think that's it we're good to clear our created images
				imagedestroy( $source );
				imagedestroy( $dst1 );
						
							$stoid = $_POST[stoid];
							$sql = pg_query("UPDATE story set  img_story = '$rnd_name1'
								where id_story = '$stoid' ;");
							header('location:story_edit.php?stoid='.$stoid);
				
				
				
				}
				
				}
}
if ( isset($_POST[delete_story]) ) {

	$stoid = $_POST[stoid];

	$sql_delete = pg_query("DELETE from story where id_story = '$stoid' ;");
	
	
	header('location:profile.php#story');
}



function get_file_extension( $file )  {
    if( empty( $file ) )
        return;
 
    // if goes here then good so all clear and good to go
    $ext = end(explode( ".", $file ));
 
    // return file extension
    return $ext;
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
	</head>
	<body class="skin-blue">
		<?php include 'header.php'; ?>
		
		<section class="single">
			<div class="container">
				<div class="row">
					<form enctype="multipart/form-data" method="post">
						<div class="col-md-3 sidebar" id="sidebar">
							<aside>
								<h1 class="aside-title">ข้อมูลผู้โพส </h1>
								<div class="aside-body">
									
									<article class="article-mini">
										<div class="inner">
											<div  align="center" >
												<img  class="img-circle" src="images/student/<?php echo $result[img]; ?>" alt="" width="70%">
											</div>
											<hr>
											<ul>
												<li><i class="fa fa-user" aria-hidden="true"></i> : <?php echo $result[title_name],'',$result[s_name],' ',$result[l_name]; ?></li>
												<li><i class="fa fa-address-card" aria-hidden="true"></i> : <?php echo $result[university]; ?></li>
												<li><i class="fa fa-map-marker" aria-hidden="true"></i> : <?php echo $result[province]; ?></li>
											</ul>
											<hr>
											<input type="hidden" name="stoid" value="<?php echo $result[id_story]; ?>">
											<button type="submit" title="" name="update_story" value="true" class="btn btn-primary btn-block"><i class="fa fa-wrench" aria-hidden="true"></i> บันทึกเรื่องราว</button>
											<button  type="submit" name="delete_story"  class="btn btn-danger btn-block"  onclick="return confirm('ยืนยันการลบเรื่องราวนี้ ? ถ้าลบแล้วจะสามารถย้อนกลับได้')"><i class="fa fa-window-close" aria-hidden="true"></i>ลบเรื่องราว</button>
											<a href="profile.php#story" class="btn  btn-sm btn-block" ><i class="fa fa-long-arrow-left" aria-hidden="true"></i></i>กลับ</a>
											
										</div>
									</article>
								</div>
							</aside>
						</div>
						<div class="col-md-9">
							<ol class="breadcrumb">
								<li><a href="#">Home</a></li>
								<li>Story</li>
								<li class="active">Edit</li>
							</ol>
							<article class="article main-article">
								<header>
									
									<h2>
									<input type="text"  name="title_story" class="form-control" value="<?php echo $result[title_story]; ?>" name="">
									</h2>
									<ul class="details">
										<li>Posted on <?php echo $result[date_story]; ?></li>
										<li><a><?php echo $result[tag_story]; ?></a></li>
									</ul>
								</header>
								<div class="main">
									<p>
										<textarea name="detail_story" class="form-control"  rows="6" ><?php echo $result[detail_story]; ?> </textarea>
										<hr>
									</p>
									<div class="col-md-6">
										เลือกภาพใหม่
										<input class="form-control " type="file" name="file"  onchange="readURL_edit(this);" >
										<button type="submit" class="btn btn-sm btn-primary" name="update_story" value="false">บันทึกรูปภาพ</button>
									</div>
									<div class="col-md-6">
										<img src="images/story/<?php echo $result[img_story]; ?>" id="blah_edit"  width="100%">
									</div>
									
									
								</article>
								
								
							</div>
						</div>
					</form>
				</div>
			</section>
			<!-- Start footer -->
			<?php include 'footer.php'; ?>
			<!-- End Footer -->
			<!-- JS -->
			
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
			
			<script>
			function readURL_edit(input) {
			if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
			$('#blah_edit')
			.attr('src', e.target.result);
			};
			reader.readAsDataURL(input.files[0]);
			}
			}
			</script>
			
		</body>
	</html>