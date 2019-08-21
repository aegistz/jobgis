<!DOCTYPE html>
<?php
session_start();

include("config.php");
include("check_student.php");
include("api_service/profile_api.php");


$eid = $_GET[eid];
$sql_profile = pg_query("SELECT * from student  where id_no = '$eid';");
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


<?php  if ( !isset($eid) || $user[id_no] == $eid  ) { ?>

					<div class="col-md-12">
						<div class="sidebar-title for-tablet">Sidebar</div>
						<aside>
							<div class="aside-body">
								<div class="featured-author">
									<div class="featured-author-inner">



										<?php if($user[bg_img] != ''){ ?>
										<div class="featured-author-cover divbutton" style="background-image: url('images/student/<?php echo $user[bg_img]; ?>');">
										<?php }else{ ?>
										<div class="featured-author-cover divbutton" style="background-image: url('http://www3.cgistln.nu.ac.th/dronephoto/images/full_img/chanonk_photos_135cc7cfce7e4ce_1556598734_.jpg');">
										<?php } ?>

											
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
											 <div class="btn btn-group">
                                                            <button type="button"   class="btn btn-primary btn-sm" style="display: none;" data-toggle="modal" data-target="#bg-img">
                                                                แก้ไขภาพหน้าปก
                                                            </button>
                                                             <button type="button" style="display: none;" class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#profile-img">
                                                               แก้ไขรูปประจำตัว
                                                             </button>
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
														?>
														</div>														
													</a>
												</div>
												<div class="item">
													<a href="#">
														<div class="name">View</div>
														<div class="value">3,729</div>														
													</a>
												</div>
												<div class="item">
<?php 
$sql = pg_query("SELECT * from resume where email = '$user[email]';");
$num = pg_num_rows($sql);
 if ( $num == 0 ) { ?>
								<a href="resume.php">
														<div class="icon">
															<div>Resume GIS </div>
															<div class="badge "> คุณยังไม่ได้เพิ่ม</div>
														</div>														
													</a>

<?php } else { ?>
								
								<a href="view_resume.php">
														<div class="icon">
															<div>Resume GIS </div>
														</div>														
													</a>
<?php } ?>

													

												</div>
											</div>
											<!-- <div class="featured-author-quote divbutton">
												<div class="form-group row">
											      <label for="staticEmail" class="col-sm-2 col-form-label">สถานะ : </label>
											      <div class="col-sm-8">
											       <input type="text" name="" class="form-control" value="<?php echo $_COOKIE[type]; ?>">	
											      </div>
											      <div class="col-sm-2"> 
											      	<button type="button"  class="btn btn-primary btn-sm" style="display: none;" >
                                                        แก้ไขสถานะ
                                                    </button>	
											      </div>
											    </div>
											</div> -->
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
	
	$query = pg_query("SELECT * from story where id_user = '$id' order by id_story desc ;");
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
									<h1 class="aside-title">สถานะงานท่านสมัคร </h1>
									<div class="aside-body">
<?php
$sql = pg_query("SELECT * from user_request a  
	inner join job_company b on a.id_job = b.id_job 
	inner join company c on c.id_com = b.id_com where email_user = '$user[email]' ;  ");
								while ( $arr = pg_fetch_array($sql) ) {
?>
								<article class="article-mini">
									<div class="inner">
										<figure>
											<a href="news.php">
												<img src="images/img_job/<?php echo $arr[img]; ?>" alt="Sample Article">
											</a>

										</figure>
										<div class="padding">
											<p><button  class="btn btn-warning btn-sm btn-block" >สถานะ : <?php echo $arr[request]; ?></button></p>
											<h1><a href="news.php"><?php echo $arr[name_job]; ?></a></h1>
											<p>
												โดย : <?php echo $arr[name_com]; ?> 
											</p>
											
										</div>
									</div>
								</article>
								<hr>
<?php } ?>
									</div>

								</aside>

								<hr>


								<aside>
									<h1 class="aside-title">งานที่เกี่ยวข้อง </h1>
									<div class="aside-body">
										<?php
								$sql = pg_query("SELECT * from job_company a  inner join company b on a.id_com = b.id_com limit 5 ;  ");
								while ( $arr = pg_fetch_array($sql) ) {
?>
								<article class="article-mini">
									<div class="inner">
										<figure>
											<a href="news.php">
												<img src="images/img_job/<?php echo $arr[img]; ?>" alt="Sample Article">
											</a>
										</figure>
										<div class="padding">
											<h1><a href="news.php"><?php echo $arr[name_job]; ?></a></h1>
											<p>
												<?php echo $arr[detail_job]; ?> 
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

<?php 	} // if case show profile  
else {    ?> 




<div class="col-md-12">
						<div class="sidebar-title for-tablet">Sidebar</div>
						<aside>
							<div class="aside-body">
								<div class="featured-author">
									<div class="featured-author-inner">

										<div class="featured-author-cover divbutton" style="background-image: url('images/student/<?php echo $arr_profile[bg_img]; ?>');">
											<div class="featured-author-center">
												<figure class="featured-author-picture">
												<?php if($arr_profile[img] == ''){ ?>
														<img src="https://image.flaticon.com/icons/png/512/149/149071.png" alt="Sample Article">
													<?php } else { ?>
														<img src="images/student/<?php echo $arr_profile[img]; ?>" alt="Sample Article">
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
													<a href="#">
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
													<a href="#">
														<div class="name">View</div>
														<div class="value">3,729</div>														
													</a>
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



<?php 
	
	$query = pg_query("SELECT * from story where id_user = '$eid' order by id_story desc ;");
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

												 <?php 
								                 echo mb_strimwidth($arr[detail_story], 0, 300, '....<a href="" title="">เพิ่มเติม</a>');
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
									<h1 class="aside-title">ภาพประสบการณ์ </h1>
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
								</aside>


								
							</div>
						</div>
					</div>




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

	<script>
		function myFunction() {
		  document.getElementById("status").innerHTML = "<input type='text'>";
		}


	</script>

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

<script>
	$(document).ready(function () {
                $(document).on('mouseenter', '.divbutton', function () {
                    $(this).find(":button").show();
                }).on('mouseleave', '.divbutton', function () {
                    $(this).find(":button").hide();
                });
            });
</script>

<script>
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

 function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah2')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

 function readURL3(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah3')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
	</body>
</html>