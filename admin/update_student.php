<!DOCTYPE html>
<?php
session_start();

include("config.php");

include("check_admin.php");


$sql = pg_query("SELECT * from user_job where id_no = '$_GET[q]' ;");
$user_job = pg_fetch_array($sql);

if ( isset($_POST[update]) ) {
              $strSQL = "UPDATE user_job 
                  SET  
                  title_name='$_POST[title_name]', 
                  s_name='$_POST[s_name]',
                  l_name='$_POST[l_name]',
                  birth_year='$_POST[birth_year]',
                  university='$_POST[university]',
                  success_degree='$_POST[success_degree]',
                  facutly='$_POST[facutly]',
                  major='$_POST[major]',
                  qualification='$_POST[qualification]',
                  year_start='$_POST[year_start]',
                  year_end='$_POST[year_end]',
                  phone_number='$_POST[phone_number]',
                  email='$_POST[email]',
                  status_study='$_POST[status_study]',
                  place_now='$_POST[place_now]'
                  
                   WHERE id_no = '$_POST[id]';";

                     $objQuery = pg_query($strSQL);
                                                      if($objQuery)
                                                      {
                                                            $message = '<div class="alert alert-success alert-dismissible">
                                                                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                  <strong>Success!</strong> แก้ไขข้อมูล'.$_POST[title_name].$_POST[s_name].' '.$_POST[l_name].'  เรียบร้อยแล้ว
                                                              </div>';
                                                              header('location:update_student.php?q='.$_POST[id]);
                                                      }
                                                      else
                                                      {
                                                            $message = '<div class="alert alert-danger alert-dismissible">
                                                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                              <strong>Warning!</strong> ไม่สามา่รถบันทึกข้อมูลได้ กรุณาลองอีกครั้ง
                                                             </div>';
                                                              header('location:update_student.php?q='.$_POST[id]);
                                                      }


}


if ( isset($_POST[delete]) ) {

	$sql = pg_query("DELETE from user_job WHERE id_no = '$_POST[id]';  ");
	
    if($sql){
    	header('location:add_data.php#data_view');
    }else{
        $message = '<div class="alert alert-danger alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Warning!</strong> ไม่สามา่รถบันทึกข้อมูลได้ กรุณาลองอีกครั้ง
         </div>';
          header('location:update_student.php?q='.$_POST[id]);

    }

	
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
		<link rel="stylesheet" href="../css/demo.css">


		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">

		<link rel="icon" href="https://www.gistda.or.th/main/sites/default/files/favicon.ico" type="image/png" >
		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/modules/exporting.js"></script>
		<script src="https://code.highcharts.com/modules/export-data.js"></script>



		


    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css" integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js" integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg==" crossorigin=""></script>

<style>
.info {
    padding: 6px 8px;
    font: 14px/16px Arial, Helvetica, sans-serif;
    background: white;
    background: rgba(255,255,255,0.8);
    box-shadow: 0 0 15px rgba(0,0,0,0.2);
    border-radius: 5px;
}
.info h4 {
    margin: 0 0 5px;
    color: #777;
} 
.legend {
    line-height: 22px;
    color: #555;
}
.legend i {
    width: 18px;
    height: 18px;
    float: left;
    margin-right: 8px;
    opacity: 0.7;
}
</style>

		<link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">

	</head>

	<body class="skin-blue">

		<?php include 'header.php'; ?>

		<section class="home">
			<div class="container">

<form class="form-validate form-horizontal" id="feedback_form" method="post" action="update_student.php" enctype="multipart/form-data">
	<div class="">
		<div class="col-md-2">
								<div class="form-group">
									<label>เลขประจำตัวนักศึกษา</label>
									<input type="text" name="student" class="form-control" value="<?php echo $user_job[id_student]; ?>" >
								</div>
			
		</div>
		<div class="col-md-2">
								<div class="form-group">
									<label>คำนำหน้า</label>
									<input type="text" name="title_name" class="form-control" value="<?php echo $user_job[title_name]; ?>">
								</div>
			
		</div>
		<div class="col-md-4">
								<div class="form-group">
									<label>ชื่อ</label>
									<input type="text" name="s_name" class="form-control" value="<?php echo $user_job[s_name]; ?>">
								</div>
			
		</div>
		<div class="col-md-4">
								<div class="form-group">
									<label>นามสกุล</label>
									<input type="text" name="l_name" class="form-control" value="<?php echo $user_job[l_name]; ?>">
								</div>
			
		</div>
		
	</div>



	<div class="">
		<div class="col-md-3">
								<div class="form-group">
									<label>ปีเกิด</label>
										<select name="birth_year" class="form-control">
												<option value="">กรุณาเลือก</option>
											<?php for ($i=0; $i < 100; $i++) {  ?>
												<option value="<?php echo 2562- $i ; ?>" <?php if( 2562- $i  == $user_job[birth_year] ){ echo "selected";} ?>
													><?php echo 2562- $i ; ?></option>
											<?php } ?>
										</select>
								</div>
		</div>
		<div class="col-md-3">
								<div class="form-group">
									<label>เบอร์โทรศัพท์</label>
									<input type="text" name="phone_number" class="form-control" value="<?php echo $user_job[phone_number]; ?>">
								</div>
		</div>
		<div class="col-md-3">
								<div class="form-group">
									<label>สถานะภาพการทำงานปัจจุบัน</label>
									<select name="status_study" class="form-control" value="<?php echo $user_job[status_study]; ?>">
										<option value="">กรุณาเลือก</option>
										<option value="อยู่ระหว่างการศึกษา" <?php if( $user_job[status_study] == "อยู่ระหว่างการศึกษา"){ echo "selected";} ?>>อยู่ระหว่างการศึกษา</option>
										<option value="ยังไม่มีงานทำ" <?php if( $user_job[status_study] == "ยังไม่มีงานทำ"){ echo "selected";} ?>>ยังไม่มีงานทำ</option>
										<option value="ทำงานตรงสาย" <?php if( $user_job[status_study] == "ทำงานตรงสาย"){ echo "selected";} ?>>ทำงานตรงสาย</option>
										<option value="ทำงานไม่ตรงสาย" <?php if( $user_job[status_study] == "ทำงานไม่ตรงสาย"){ echo "selected";} ?>>ทำงานไม่ตรงสาย</option>
									</select>
								</div>
		</div>
		<div class="col-md-3">
								<div class="form-group">
									<label>จังหวัดที่อาศัยในปัจจุบัน</label>
									<select class="form-control" name="place_now"  >
										<option value="">กรุณาเลือก</option>
										<?php $sql_prov = pg_query("select pv_tn from tambon group by pv_tn order by pv_tn asc"); 
										while ($arr_prov = pg_fetch_array($sql_prov)) {
										?>
										<option value="<?php echo $arr_prov[pv_tn]; ?>" <?php if( $arr_prov[pv_tn] == $user_job[place_now] ){ echo "selected";} ?>><?php echo $arr_prov[pv_tn]; ?></option>
										<?php } ?>
									</select>
								</div>
		</div>
		
	</div>


		<div class="col-md-3">
								<div class="form-group">
									<label>ชื่อมหาวิทยาลัย</label>
									<input type="text" name="university" class="form-control" value="<?php echo $user_job[university]; ?>">
								</div>
		</div>
		<div class="col-md-3">
								<div class="form-group">
									<label>ระดับ</label>
									<select name="success_degree" class="form-control" value="<?php echo $user_job[success_degree]; ?>">
										<option value="">กรุณาเลือก</option>
										<option value="ปริญญาตรี" <?php if( $user_job[success_degree] == "ปริญญาตรี" ){ echo "selected";} ?>>ปริญญาตรี</option>
										<option value="ปริญญาโท" <?php if( $user_job[success_degree] == "ปริญญาโท" ){ echo "selected";} ?>>ปริญญาโท</option>
										<option value="ปริญญาเอก" <?php if( $user_job[success_degree] == "ปริญญาเอก" ){ echo "selected";} ?>>ปริญญาเอก</option>
									</select>
								</div>
		</div>

		<div class="col-md-3">
								<div class="form-group">
									<label>คณะ</label>
									<input type="text" name="facutly" class="form-control" value="<?php echo $user_job[facutly]; ?>">
								</div>
			
		</div>
		<div class="col-md-3">
								<div class="form-group">
									<label>สาขา</label>
									<input type="text" name="major" class="form-control" value="<?php echo $user_job[major]; ?>">
								</div>
			
		</div>

		<div class="col-md-4">
								<div class="form-group">
									<label>วุฒิที่สำเร็จการศึกษา</label>
									<input type="text" name="qualification" class="form-control" value="<?php echo $user_job[qualification]; ?>">
								</div>
			
		</div>

		<div class="col-md-4">
								<div class="form-group">
									<label>ปีที่เริ่มเข้าศึกษา</label>
										<select name="year_start" class="form-control">
												<option value="">กรุณาเลือก</option>
											<?php for ($i=0; $i < 40; $i++) {  ?>
												<option value="<?php echo 2562- $i ; ?>"  <?php if( 2562- $i  == $user_job[year_start] ){ echo "selected";} ?>><?php echo 2562- $i ; ?></option>
											<?php } ?>
										</select>
								</div>
			
		</div>

		<div class="col-md-4">
								<div class="form-group">
									<label>ปีที่จบการศึกษา</label>
										<select name="year_end" class="form-control">
												<option value="">กรุณาเลือก</option>
											<?php for ($i=0; $i < 40; $i++) {  ?>
												<option value="<?php echo 2562- $i ; ?>"  <?php if( 2562- $i  == $user_job[year_end] ){ echo "selected";} ?>><?php echo 2562- $i ; ?></option>
											<?php } ?>
										</select>
								</div>
			
		</div>

		<div class="col-md-6">
								<div class="form-group">
									<label>วันที่เพิ่มข้อมูล</label>
									<input type="date" class="form-control" value="<?php echo $user_job[date_access]; ?>" readonly="">
								</div>
			
		</div>

		<div class="col-md-6">
								<div class="form-group">
									<label>รูปแบบการเพิ่มข้อมูล</label>
									<input type="text" class="form-control" value="<?php echo $user_job[type_input]; ?>" readonly="">
								</div>
			
		</div>
		

		<hr>



		<div class="">
			<div class="col-md-12">
								<div class="form-group">
									<label>Email *</label>
									<input type="email" name="email" class="form-control" value="<?php echo $user_job[email]; ?>">
								</div>
			
				
			</div>
						
		</div>
		<div class="col-md-10">
			<input type="hidden" name="id" value="<?php echo $user_job[id_no]; ?>">
            <a href="add_data.php#data_view" class="btn btn-default" data-dismiss="modal">กลับ</a>
            <button type="submit" class="btn btn-success" name="update" >บันทึกข้อมูล</button>
		</div>
		<div class="col-md-2">
			<button type="submit" name="delete" value="<?php echo $user_job[id_no]; ?>" class="btn btn-danger btn-sm"  onclick="return confirm('คุณต้องการลบข้อมูลของ <?php echo  $user_job[title_name],$user_job[s_name],' ',$user_job[l_name]  ; ?> จริงๆหรือไม่ ถ้าลบข้อมูลแล้วจะไม่สามารถย้อนกลับได้ ?')">
				x ลบ
			</button>
		</div>


</form>





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


		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

		<script>
			$(document).ready(function() {
			    $('#example').DataTable( {
			        dom: 'Bfrtip',
			        buttons: [
			            'copy',  'excel', 'print'
			        ]
			    } );
			} );
		</script>


	</body>
</html>