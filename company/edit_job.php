<!DOCTYPE html>
<?php
	session_start();
	include 'config.php';


		$job_id = $_GET[job_id];
		$sql_profile = pg_query("SELECT * from job_company  where id_job = '$job_id';");
		$job = pg_fetch_array($sql_profile);


		$id_com = $_POST['id_com'];
		$name_job = $_POST['name_job'];
		$detail_job = $_POST['detail_job'];
		$type_job = $_POST['type_job'];
		$num_job = $_POST['num_job'];
		$sex_job = $_POST['sex_job'];
		$budget_job = $_POST['budget_job'];
		$exp_job = $_POST['exp_job'];
		$place_job = $_POST['place_job'];
		$date_job = $_POST['date_job'];
		$edu_job = $_POST['edu_job'];
		$img = $_POST['img'];


	 	if ( isset($_POST[edit_job]) ) {
       	$sql1 = "UPDATE job_company set  
       			name_job = '$name_job' , 
       			detail_job = '$detail_job' ,
       			type_job = '$type_job' ,
       			num_job = '$num_job' ,
       			sex_job = '$sex_job' ,
       			budget_job = '$budget_job' ,
       			exp_job = '$exp_job' ,
       			place_job = '$place_job' ,
       			edu_job = '$edu_job'
				where id_job = '$job_id' ;";
		   		$query1 = pg_query($sql1);
		   		header('location:edit_job.php?job_id='.$job_id) ; 
		}







		if ( isset($_POST[edit_img]) ) {
       
	
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
				imagejpeg( $dst1, '../images/story/'.$rnd_name1, 100 );
				
				// I think that's it we're good to clear our created images
				imagedestroy( $source );
				imagedestroy( $dst1 );
						
							
							$sql = pg_query("UPDATE job_company set  img = '$img'
								where job_id = '$job_id' ;");
							header('location:edit_job.php?job_id='.$job_id);
				
				
				
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
				<h4>แก้ไขการประกาศรับสมัครงาน</h4>

				<div class="col-md-3">
<form enctype="multipart/form-data" method="post">
					<div class="col-md-12">
						<div class="form-group">
							<label>Poster หรือภาพประกอบ</label>
							<input class="form-control " type="file" id="cname" name="file" onchange="readURL_job(this);"  accept="image/png, image/jpeg, image/gif">

	                    <img   src="../images/img_job/<?php echo $job[img]; ?>" alt="" id="blah_job" width="100%" >
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<button type="submit" name="edit_img" class="btn btn-primary btn-block">เพิ่มรูปภาพ</button>
						</div>
					</div>
</form>
				</div>


				<div class="col-md-9">
<form enctype="multipart/form-data" method="post">
						<div class="box-body">
							<div class="col-md-12">
								<div class="col-md-12">
									<div class="form-group">
										<label>หัวข้อ/ชื่อตำแหน่งที่เปิดรับ *</label>
										<input type="text" name="name_job" class="form-control" value="<?php echo $job[name_job]; ?>">
									</div>
									
								</div>
								<div class="col-md-8">
									<div class="form-group">
										<label>รายละเอียดเพิ่มเติม </label>
										<textarea  type="text" name="detail_job" class="form-control" ><?php echo $job[detail_job]; ?></textarea>
									</div>
									
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>ประเภทงาน</label>
										<select  id="select"  class="form-control"  name="type_job"> 
											  <option value="ยังไม่ได้กำหนด">-- กรุณาเลือก --</option>
											  <option value="งานประจำ" <?php if($job[type_job]=='งานประจำ'){echo 'selected';} ?>>งานประจำ</option>
											  <option value="งานรายวัน" <?php if($job[type_job]=='งานรายวัน'){echo 'selected';} ?>>งานรายวัน</option>
											  <option value="ฝึกงาน" <?php if($job[type_job]=='ฝึกงาน'){echo 'selected';} ?>>ฝึกงาน</option>
											  <option value="สหกิจศึกษา" <?php if($job[type_job]=='สหกิจศึกษา'){echo 'selected';} ?>>สหกิจศึกษา</option>
											  <option value="อื่น ๆ" <?php if($job[type_job]=='อื่น ๆ'){echo 'selected';} ?>>อื่น ๆ</option>
											 
											</select>
									</div>
								</div>
							</div>

							<div class="col-md-12">
								<div class="col-md-4">
									<div class="form-group">
										<label>จำนวนที่รับ</label>
										<input type="text" name="num_job" class="form-control" value="<?php echo $job[num_job]; ?>">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>เพศ</label>
										<input type="text" name="sex_job" class="form-control" value="<?php echo $job[sex_job]; ?>">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>เงินเดือน</label>
										<input type="number" name="budget_job" class="form-control" value="<?php echo $job[budget_job]; ?>">
									</div>
								</div>
							</div>


							<div class="col-md-12">
								<div class="col-md-4">
									<div class="form-group">
										<label>ประสบการณ์</label>
										<input type="text" name="exp_job" class="form-control" value="<?php echo $job[exp_job]; ?>">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>สถานที่ทำงาน</label>
										<input type="text" name="place_job" class="form-control" value="<?php echo $job[place_job]; ?>">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>การศึกษา</label>
										<input type="text" name="edu_job" class="form-control" value="<?php echo $job[edu_job]; ?>">
									</div>
								</div>
							</div>

							<!-- <div class="col-md-6">
								<hr>
								<h4>คุณสมบัติ</h4>
								<table class="table"  id="employee_table3">
	                                <thead>
	                                  <tr>
	                                    <th width="12%">ข้อที่</th>
	                                    <th>กรอกคุณสมบัติที่ต้องการ</th>
	                                    <th width="8%"></th>
	                                  </tr>
	                                </thead>
	                                <tbody>
	                                    <tr id="row1">  
	                                        <td><input type="text" name="a1[]" value="1"  class="form-control" /></td>  
	                                        <td><input type="text" name="detail_property[]" required class="form-control" /></td>
	                                        <td><button type="button" onclick="add_row3();" value="ADD ROW" class="btn btn-sm btn-success">เพิ่มข้อมูลอีก</button></td>  
	                                    </tr> 
	                                </tbody>
                              </table>
							</div>


							<div class="col-md-6">
								<hr>
								<h4>หน้าที่และความรับผิดชอบ </h4>
								<table class="table"  id="employee_table2">
	                                <thead>
	                                  <tr>
	                                    <th width="12%">ข้อที่</th>
	                                    <th>กรอกหน้าที่และความรับผิดชอบ ต้องการ</th>
	                                    <th width="8%"></th>
	                                  </tr>
	                                </thead>
	                                <tbody>
	                                    <tr id="row1">  
	                                        <td><input type="text" name="b1[]" value="1"  class="form-control" /></td>  
	                                        <td><input type="text" name="detail_respon[]" required class="form-control" /></td>
	                                        <td><button type="button" onclick="add_row2();" value="ADD ROW" class="btn btn-sm btn-success">เพิ่มข้อมูลอีก</button></td>  
	                                    </tr> 
	                                </tbody>
                              </table>
							</div> -->
							</div>
							
						</div>
					
						<div class="col-md-12">
							<div class="form-group text-right">
								<button type="submit" name="edit_job" value="true" class="btn btn-primary btn-block">บันทึกข้อมูล</button>
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





 function readURL_job(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah_job')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
	</script>
	 <script type="text/javascript">
			function add_row3()
			{
			 $rowno=$("#employee_table3 tr").length;
			 $rowno=$rowno;
			 $("#employee_table3 tr:last").after(
			            "<tr id='row"+$rowno+"'>\
			            <td><input type='text' name='a1[]'  value='"+$rowno+"'  class='form-control'></td>\
			            <td><input type='text' name='detail_property[]' required class='form-control'></td>\
			            <td><input type='button' value='ลบ' class='btn btn-danger  btn-sm btn_remove' onclick=delete_row3('row"+$rowno+"')></td>\
			            </tr>");
			}
			function delete_row3(rowno)
			{
				console.log(rowno)
			 $('#'+rowno).remove();
			}
</script>    
	 <script type="text/javascript">
			function add_row2()
			{
			 $rowno=$("#employee_table2 tr").length;
			 $rowno=$rowno;
			 $("#employee_table2 tr:last").after(
			            "<tr id='row2"+$rowno+"'>\
			            <td><input type='text' name='b1[]'  value='"+$rowno+"'  class='form-control'></td>\
			            <td><input type='text' name='detail_respon[]' required class='form-control'></td>\
			            <td><input type='button' value='ลบ' class='btn btn-danger  btn-sm btn_remove' onclick=delete_row2('row2"+$rowno+"')></td>\
			            </tr>");
			}
			function delete_row2(rowno)
			{
				console.log(rowno)
			 $('#'+rowno).remove();
			}
</script>    
</body>
</html>