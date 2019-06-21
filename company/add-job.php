<!DOCTYPE html>
<?php
	session_start();
	include 'config.php';
	
date_default_timezone_set('Asia/Bangkok');
$date_time = date("d/m/Y H:i:s");
$date = date("Y/m/d");
$message = '';



if( $_POST[submit_form] == 'true' ) 
{
    // get uploaded file name
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
            $rnd_name1 = 'photos_job_'.uniqid(mt_rand(10, 15)).'_'.time().'_450x450.'.$ext;
            
            // move it to uploads dir with full quality
            imagejpeg( $dst1, '../images/img_job/'.$rnd_name1, 100 );
 
            // I think that's it we're good to clear our created images
            imagedestroy( $source );
            imagedestroy( $dst1 );


		
          	$sql2 = "INSERT into job_company
			(
					id_com ,
					name_job ,
					detail_job ,
					type_job ,
					num_job ,
					sex_job ,
					budget_job ,
					exp_job ,
					place_job ,
					edu_job ,
					date_job ,
					tag_job ,
					img
			)
			values
			(
				'$company[id_com]' ,
				'$_POST[name_job]' ,
				'$_POST[detail_job]' ,
				'$_POST[type_job]' ,
				'$_POST[num_job]' ,
				'$_POST[sex_job]' ,
				'$_POST[budget_job]' ,
				'$_POST[exp_job]' ,
				'$_POST[place_job]' ,
				'$_POST[edu_job]' ,
				'$date' ,
				'$_POST[tag_job]' ,
				'$rnd_name1'

			);";
			$result = pg_query($sql2);
            
            if($result){ 
				  $message = '<div class="alert alert-success alert-dismissible">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										<strong>Success!</strong> ลงทะเบียนเสร็จสิ้นแล้ว
									  </div>';
				  }else{
					  $message = '<div class="alert alert-danger alert-dismissible">
								  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								  <strong>Warning!</strong> ไม่สามา่รถบันทึกข้อมูลได้ กรุณาลองอีกครั้ง
								 </div>';
				  }
           
 
        }
 
    }
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
	<link rel="icon" href="https://www.gistda.or.th/main/sites/default/files/favicon.ico" type="image/png" >
	<link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
	
	<style type="text/css">
	
	#div1,
	#div2,
	#div3,
	#work_type,
	#work_skill,
	#work_uncomplace,
	#free_cause,
	#free_issue,
	#free_important
	{
	display: none
	}
	
	</style>
</head>
<body class="skin-blue">
	<?php include 'header.php'; ?>
	<section class="login first grey">
		<div class="container">
			<div class="">
				<div class="">
					<form enctype="multipart/form-data" method="post">
						<?php echo $message; ?>
						<div class="box-body">
							<h4>เพิ่มข้อมูลประกาศรับสมัครงาน</h4>
							<small>* กรุณากรอกข้อมูลให้ครบถ้วน</small>
							<hr>
							<div class="col-md-12">
								<div class="col-md-3">
									<div class="col-md-12">
										<div class="form-group">
											<label>Poster หรือภาพประกอบ</label>
											<input class="form-control " type="file" id="cname" name="file" onchange="readURL(this);"  accept="image/png, image/jpeg, image/gif">

                                              <img id="blah" src="http://orcalcontabilidade.com.br/images/footer-shadow.png" style="width:100%; max-height:100%;margin-top:20px;" alt="your image" />
										</div>
										
									</div>
								</div>
								<div class="col-md-9">
									<div class="col-md-12">
										<div class="form-group">
											<label>หัวข้อ/ชื่อตำแหน่งที่เปิดรับ *</label>
											<input type="text" name="name_job" class="form-control" >
										</div>
										
									</div>
									<div class="col-md-8">
										<div class="form-group">
											<label>รายละเอียดเพิ่มเติม </label>
											<textarea  type="text" name="detail_job" class="form-control" ></textarea>
										</div>
										
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>ประเภทงาน</label>
											<select  id="select"  class="form-control"  name="type_job"> 
												  <option value="ยังไม่ได้กำหนด">-- กรุณาเลือก --</option>
												  <option value="งานประจำ">งานประจำ</option>
												  <option value="งานรายวัน">งานรายวัน</option>
												  <option value="ฝึกงาน">ฝึกงาน</option>
												  <option value="สหกิจศึกษา">สหกิจศึกษา</option>
												  <option value="อื่น ๆ">อื่น ๆ</option>
												 
												</select>
										</div>
									</div>
								</div>
							</div>

							<div class="col-md-12">
								<div class="col-md-4">
									<div class="form-group">
										<label>จำนวนที่รับ</label>
										<input type="text" name="num_job" class="form-control" >
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>เพศ</label>
										<input type="text" name="sex_job" class="form-control" >
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>เงินเดือน</label>
										<input type="text" name="budget_job" class="form-control" >
									</div>
								</div>
							</div>


							<div class="col-md-12">
								<div class="col-md-4">
									<div class="form-group">
										<label>ประสบการณ์</label>
										<input type="text" name="exp_job" class="form-control" >
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>สถานที่ทำงาน</label>
										<input type="text" name="place_job" class="form-control" >
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>การศึกษา</label>
										<input type="text" name="edu_job" class="form-control" >
									</div>
								</div>
							</div>
							
						</div>
					
						<div class="col-md-12">
							<div class="form-group text-right">
								<button type="submit" name="submit_form" value="true" class="btn btn-primary btn-block">บันทึกข้อมูล</button>
							</div>
						</div>
						
					</form>
				</div>
			</div>
		</div>
	</section>
	<!-- Start footer -->
	<?php include 'footer.php'; ?>
	<!-- End Footer -->
	<!-- JS -->
	<script src="../js/jquery.js"></script>
	<script src="../app.js" type="text/javascript" charset="utf-8" async defer></script>
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
	<script type="text/javascript">
		$('#password, #confirm_password').on('keyup', function () {
		if ($('#password').val() == $('#confirm_password').val()) {
		$('#message').html('Matching').css('color', 'green');
		} else
		$('#message').html('Not Matching').css('color', 'red');
		});





 function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
	</script>
</body>
</html>