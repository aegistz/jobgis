<!DOCTYPE html>
<?php
session_start();

include("config.php");
include("check_student.php");


$error = '';
$success = '';
 
if( $_POST[upload_img] == 'true' ) 
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
            $rnd_name1 = 'photos_student_'.uniqid(mt_rand(10, 15)).'_'.time().'_450x450.'.$ext;
            
            // move it to uploads dir with full quality
            imagejpeg( $dst1, 'images/student/'.$rnd_name1, 100 );
 
            // I think that's it we're good to clear our created images
            imagedestroy( $source );
            imagedestroy( $dst1 );

			$showpic = "images/student/".$rnd_name1;

			$date_now = date("Y/m/d");

		
           $is_uploaded = pg_query( "  INSERT INTO photo_user (name_img , id_user ,  date_img ) values ( '$rnd_name1','$user[id_no]','$date_now'  )   ;" );
            
           
 
        }
 
    }
}



if( $_POST[upload_story] == 'true' ) 
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
            $rnd_name1 = 'photos_story_'.uniqid(mt_rand(10, 15)).'_'.time().'_450x450.'.$ext;
            
            // move it to uploads dir with full quality
            imagejpeg( $dst1, 'images/story/'.$rnd_name1, 100 );
 
            // I think that's it we're good to clear our created images
            imagedestroy( $source );
            imagedestroy( $dst1 );

			$showpic = "images/story/".$rnd_name1;

			$date_now = date("Y/m/d");
			$title_story = $_POST[title];
			$detail_story = $_POST[detail];

		
           $is_uploaded = pg_query( "  INSERT INTO story (title_story , detail_story ,  img_story, tag_story, date_story ,id_user) 
           	values ( '$title_story' ,'$detail_story','$rnd_name1','ประสบการณ์' ,'$date_now' ,'$user[id_no]'  )   ;" );
            
           
 
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
		<style>
		.image-preview-input {
    position: relative;
	overflow: hidden;
	margin: 0px;    
    color: #333;
    background-color: #fff;
    border-color: #ccc;    
}
.image-preview-input input[type=file] {
	position: absolute;
	top: 0;
	right: 0;
	margin: 0;
	padding: 0;
	font-size: 20px;
	cursor: pointer;
	opacity: 0;
	filter: alpha(opacity=0);
}
.image-preview-input-title {
    margin-left:2px;
}</style>


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
														<div class="value">3</div>														
													</a>
												</div>
												<div class="item">
													<a href="#">
														<div class="name">View</div>
														<div class="value">3,729</div>														
													</a>
												</div>
												<div class="item">
													<a href="#">
														<div class="icon">
															<div>More</div>
															<i class="ion-chevron-right"></i>
														</div>														
													</a>
												</div>
											</div>
											<div class="featured-author-quote">
												<b>สถานะ : </b>	 ต้องการหางานทางด้านพัฒนาระบบภูมิสารสนเทศ GIS ด่วน ๆ พร้อมเริ่มงาน
											</div>
											<div class="block">
												<h2 class="block-title">Photos ของคุณ</h2>
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
														<li><button class="btn btn-link"  data-toggle="collapse" data-target="#demo">+ เพิ่มรูปภาพ</button></li>
													</ul>
												
												</div>
											</div>	

												<div id="demo" class="collapse">
													<div class="col-md-12 " >
														<form enctype="multipart/form-data" method="post">
														<div class="input-group image-preview">
															<input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
															<span class="input-group-btn">
																<!-- image-preview-clear button -->
																<button type="button" class="btn btn-default image-preview-clear" style="display:none;">
																	<font color="black">ลบภาพ</font> 
																</button>
																<!-- image-preview-input -->
																<div class="btn btn-default image-preview-input">
																	<font color="black">
																	<span class="glyphicon glyphicon-folder-open"></span>
																	<span class="image-preview-input-title">ค้นหา</span>
																	<input type="file" accept="image/png, image/jpeg, image/gif" name="file" /> <!-- rename it -->
																	</font>
																</div>
															</span>

														</div>
														<button type="submit" class="btn btn-success" name="upload_img" value="true">Upload ภาพ</button>
														</form>
													</div>
												</div>
													
										</div>
									</div>
								</div>
							</div>
							
						</aside>

						<div class="row">
							<div class="col-xs-12 col-md-8">
								<aside>

									<article class="col-md-12 article-list" id="story">
										<form enctype="multipart/form-data" method="post">
											<div class="col-md-12">
												<h3 class="title">บอกเล่าเรื่องราวใหม่</h3>
											</div>
											<div class="form-group col-md-12">
												<label for="message">ประสบการณ์การทำงาน เพื่อประกอบการพิจารณารับเข้าทำงาน <span class="required"></span></label>
												
												 <div class="form-group row">
												      <label for="staticEmail" class="col-sm-2 col-form-label">หัวข้อ</label>
												      <div class="col-sm-10">
												        <input type="text" class="form-control" name="title">
												      </div>
												    </div>
												
												 <div class="form-group row">
												      <label for="staticEmail" class="col-sm-2 col-form-label">รายละเอียด</label>
												      <div class="col-sm-10">
												        <textarea class="form-control" name="detail" placeholder="กรอกรายละเอียดงานที่นี่ ..."></textarea>
												      </div>
												    </div>
												
												 <div class="form-group row">
												      <label for="staticEmail" class="col-sm-2 col-form-label">ภาพประกอบ</label>
												      <div class="col-sm-10">
												       <input type="file" name="file" > 
												      </div>
												    </div>
												
												
											</div>
											<div class="form-group col-md-12">
												<button class="btn btn-primary" type="submit" name="upload_story" value="true">Post</button>
											</div>
										</form>
									</article>


<?php 
	$id = $user[id_no];
	$query = pg_query("SELECT * from story where id_user = '$id' ;");
	$num = pg_num_rows($query);

	if( $num != 0 ) {
		while( $arr = pg_fetch_array($query)  ){  
?>
						 <article class="col-md-12 article-list">
								            <div class="inner">
								              <figure>
									              <a href="single.html">
									                <img src="images/story/<?php echo $arr[img_story]; ?>">
								                </a>
								              </figure>
								              <div class="details">
								                <div class="detail">
								                  <div class="category">
								                   <a href=""><?php echo $arr[tag_story]; ?></a>
								                  </div>
								                  <div class="time"><?php echo $arr[date_story]; ?></div>
								                </div>
								                <h1><a href="single.html"><?php echo $arr[title_story]; ?></a></h1>
								                <p>
								                  <?php echo $arr[detail_story]; ?>
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
								                   <a href="category.html">ประสบการณ์</a>
								                  </div>
								                  <div class="time">December 26, 2016</div>
								                </div>
								                <h1><a href="single.html">..............</a></h1>
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








							<div class="col-xs-12 col-md-4">
								<aside>
									<h1 class="aside-title">งานที่เกี่ยวข้อง </h1>
									<div class="aside-body">
										<article class="article-mini">
											<div class="inner">
												<figure>
													<a href="single.html">
														<img src="images/news/j215544.png" alt="Sample Article">
													</a>
												</figure>
												<div class="padding">
													<h1><a href="single.html">นักวิชาการเกษตร</a></h1>
													<p>
												บริษัท กรีนไลฟ์ อินเตอร์เนชั่นแนล จำกัด  Agricultural Research Officer ยินดีรับนักศึกษาจบใหม่
												</p>
												</div>
											</div>
										</article>
										<article class="article-mini">
											<div class="inner">
												<figure>
													<a href="single.html">
														<img src="https://www.jobtopgun.com/content/filejobtopgun/logo_com_job/j27745.gif?v=13" alt="Sample Article">
													</a>
												</figure>
												<div class="padding">
													<h1><a href="single.html">ผู้เชียวชาญบริการจัดการแมลง</a></h1>
													<p>
													บริษัท คิงส์ เซอร์วิส เซ็นเตอร์ จำกัด Pest Management Technician
												</p>
												</div>
											</div>
										</article>
										<article class="article-mini">
											<div class="inner">
												<figure>
													<a href="single.html">
														<img src="https://www.jobtopgun.com/content/filejobtopgun/logo_com_job/j6825.gif?v=32" alt="Sample Article">
													</a>
												</figure>
												<div class="padding">
													<h1><a href="single.html">ผู้จัดการฝ่ายปฏิบัติการ</a></h1>
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
		<script>
		$(document).on('click', '#close-preview', function(){ 
    $('.image-preview').popover('hide');
    // Hover befor close the preview
    $('.image-preview').hover(
        function () {
           $('.image-preview').popover('show');
        }, 
         function () {
           $('.image-preview').popover('hide');
        }
    );    
});

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function(){
        $('.image-preview').attr("data-content","").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("Browse"); 
    }); 
    // Create the preview image
    $(".image-preview-input input:file").change(function (){     
        var img = $('<img/>', {
            id: 'dynamic',
            width:250,
            height:200
        });      
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title").text("ค้นหาภาพ");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);            
            img.attr('src', e.target.result);
            $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
        }        
        reader.readAsDataURL(file);
    });  
});</script>
	</body>
</html>