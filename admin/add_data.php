<!DOCTYPE html>
<?php


session_start();

include("config.php");
include("api/api_adddata.php");

include("check_admin.php");
 
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
		<meta property="og:url" content="http://github.com/nauvalazhar/Magz" />
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
		<link rel="icon" href="https://www.gistda.or.th/main/sites/default/files/favicon.ico" type="image/png" >
		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/modules/exporting.js"></script>
		<script src="https://code.highcharts.com/modules/export-data.js"></script>
	    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css" />
	    <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"></script>
		<link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

		<style>
			.files input {
    outline: 2px dashed #92b0b3;
    outline-offset: -10px;
    -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
    transition: outline-offset .15s ease-in-out, background-color .15s linear;
    padding: 120px 0px 85px 35%;
    text-align: center !important;
    margin: 0;
    width: 100% !important;
}
.files input:focus{     outline: 2px dashed #92b0b3;  outline-offset: -10px;
    -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
    transition: outline-offset .15s ease-in-out, background-color .15s linear; border:1px solid #92b0b3;
 }
.files{ position:relative}
.files:after {  pointer-events: none;
    position: absolute;
    top: 60px;
    left: 0;
    width: 50px;
    right: 0;
    height: 56px;
    content: "";
    background-image: url(https://image.flaticon.com/icons/png/128/109/109612.png);
    display: block;
    margin: 0 auto;
    background-size: 100%;
    background-repeat: no-repeat;
}
.color input{ background-color:#f1f1f1;}
.files:before {
    position: absolute;
    bottom: 10px;
    left: 0;  pointer-events: none;
    width: 100%;
    right: 0;
    height: 57px;
    content: " กดค้นหาหรือลากไฟล์มาวางในที่นี่ ";
    display: block;
    margin: 0 auto;
    color: #2ea591;
    font-weight: 600;
    text-transform: capitalize;
    text-align: center;
}
		</style>
	</head>

	<body class="skin-blue">

		<?php include 'header.php'; ?>

		<section class="home">
			<div class="container">
				<div class="row">

					<div class="col-md-12 col-sm-12 col-xs-12">
						<ul class="nav nav-pills">
						  <li class="active"><a class="btn btn-primary btn-lg" data-toggle="pill" href="#menu1">นำเข้าจากหน้าระบบ</a></li>
						  <li><a  class="btn btn-primary btn-lg" data-toggle="pill" href="#home">นำเข้าไฟล์แบบ Google Drive</a></li>
						  <li><a class="btn btn-primary btn-lg" data-toggle="pill" href="#menu2">รายชื่อที่นำเข้าแล้ว</a></li>
						</ul>

						<?php echo $message ; ?>

						<div class="tab-content">

						  <div id="home" class="tab-pane fade">
						    	<div class="jumbotron">
								  <p class="lead">

<?php 
	if ( $admin[password] == "gistdacmu" ) {
		echo ' <a class="btn btn-primary btn-lg" 
								    	href="https://docs.google.com/spreadsheets/d/1zTlkKquRv4Mx7X8ZKERx_c86o_LCaZU1Ol30Y_y9a_8/edit?usp=sharing" 
								    	role="button" target="_blank">
								   	 กดเข้า Google Drive เพื่อบันทึกข้อมูลก่อนนำมา Upload เข้าระบบ
									</a>';
	}else if( $admin[password] == "gistdakku" ){
		echo ' <a class="btn btn-primary btn-lg" 
								    	href="https://docs.google.com/spreadsheets/d/1tzjTc_CUaBLF7culZDwNEyLd856hSuSXg09x4CrtaJM/edit?usp=sharing" 
								    	role="button" target="_blank">
								   	 กดเข้า Google Drive เพื่อบันทึกข้อมูลก่อนนำมา Upload เข้าระบบ
									</a>';
	}else if( $admin[password] == "gistdapsu" ){
		echo ' <a class="btn btn-primary btn-lg" 
								    	href="https://docs.google.com/spreadsheets/d/1wD3hsZjV0dgYrtEeDwPzJ37gr3w-ke-CBE2HvrvIWFg/edit?usp=sharing" 
								    	role="button" target="_blank">
								   	 กดเข้า Google Drive เพื่อบันทึกข้อมูลก่อนนำมา Upload เข้าระบบ
									</a>';
	}else if( $admin[password] == "gistdabuu" ){
		echo ' <a class="btn btn-primary btn-lg" 
								    	href="https://docs.google.com/spreadsheets/d/1_flVF8eA4s8kL1wd4cCeTWb1ngI81k--aAYNjumCJZE/edit?usp=sharing" 
								    	role="button" target="_blank">
								   	 กดเข้า Google Drive เพื่อบันทึกข้อมูลก่อนนำมา Upload เข้าระบบ
									</a>';
	}else if( $admin[password] == "gistdanu" ){
		echo ' <a class="btn btn-primary btn-lg" 
								    	href="https://docs.google.com/spreadsheets/d/1LAXin_n_UOGJrXa7o21uHNB73wULnv7QeygJDwA1Eho/edit?usp=sharing" 
								    	role="button" target="_blank">
								   	 กดเข้า Google Drive เพื่อบันทึกข้อมูลก่อนนำมา Upload เข้าระบบ
									</a>';
	}else if( $admin[password] == "gistdaadmin" ){
		echo ' <a class="btn btn-primary btn-lg" 
								    	href="https://docs.google.com/spreadsheets/d/1LAXin_n_UOGJrXa7o21uHNB73wULnv7QeygJDwA1Eho/edit?usp=sharing" 
								    	role="button" target="_blank">
								   	 กดเข้า Google Drive เพื่อบันทึกข้อมูลก่อนนำมา Upload เข้าระบบ
									</a>';
	}



?>
								   




								  </p>

								  <ul class="nav nav-tabs">
									  <li class="active"><a data-toggle="tab" href="#ex1">ตัวอย่างรูปแบบการกรอกข้อมูลลงใน Google Drive</a></li>
									  <li><a data-toggle="tab" href="#ex2">ตัวอย่างการดาวน์โหลดข้อมูลเป็น csv เพื่อนำเข้าระบบ</a></li>
									</ul>

									<div class="tab-content">
									  <div id="ex1" class="tab-pane fade in active">
									  	<a href="../images/template_excel.jpg" target="_blank" title="">
										    <img src="../images/template_excel.jpg" alt="" width="100%">
									  	</a>
										    * กดที่รูปเพื่อดูภาพขนาดใหญ่ <br>
										    ** ชื่อจังหวัดไม่ต้องใส่คำนำหน้า เช่น จ. หรือ จังหวัด 
									  </div>
									  <div id="ex2" class="tab-pane fade">
									  	<div class="row">
											  	<div class="col-md-6">
												  	<a href="../images/download_to_csv.png" target="_blank" title="">
													    <img src="../images/download_to_csv.png" alt="" width="100%">
												  	</a>
											  	</div>
											  	<div class="col-md-6">
											  		<p>ขั้นตอนการดาวน์โหลด</p>
											  		<ul>
											  			<li> กรอกข้อมูลให้ครบทุกช่องตามแบบฟอร์มที่กำหนดให้</li>
											  			<li> กดที่เมนู ไฟล์</li>
											  			<li> เลือก ดาวน์โหลดเป็น</li>
											  			<li> เลือก ค่าที่คั้นด้วยเครื่องหมายจุลภาค (.csv,แผ่นงานปัจจุบัน)</li>
											  		</ul>
											  		<br>
											  		* กดที่รูปเพื่อดูภาพขนาดใหญ่ 
												    
											  	</div>
									  	</div>
									  	

									  </div>
									</div>

								  <hr>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1"> 
	
								  <div class="form-group">
								  	<p>ลากไฟล์ที่ดาวน์โหลดจาก Google Drive ด้วยนามสกุล .CSV ไว้ที่นี่เพื่อนำเข้าระบบ</p>
									  <div class="form-group files">
									       <input type="file" class="form-control" name="csv"  id="csv" >
						              </div>
								      <p id="fileHelp" class="form-text text-muted">* กรุณาตรวจสอบข้อมูลก่อนนำเข้าทุกครั้ง</p>
								    </div>	

									<div class="form-group text-left">
										<button type="submit" name="insert_data_csv" class="btn btn-primary">นำเข้าข้อมูล</button>
									</div>
</form>
								</div>

						  </div>

						  <div id="menu1" class="tab-pane fade in active">
							<div class="jumbotron">
						    	<h5>กรุณากรอกข้อมูลให้ครบถ้วน</h5>

<form class="form-validate form-horizontal" id="feedback_form" method="post" action="add_data.php" enctype="multipart/form-data">
	<div class="">
		<div class="col-md-2">
								<div class="form-group">
									<label>เลขประจำตัวนักศึกษา</label>
									<input type="text" name="student" class="form-control" required="">
								</div>
			
		</div>
		<div class="col-md-2">
								<div class="form-group">
									<label>คำนำหน้า</label>
									<input type="text" name="title_name" class="form-control" required="">
								</div>
			
		</div>
		<div class="col-md-4">
								<div class="form-group">
									<label>ชื่อ</label>
									<input type="text" name="s_name" class="form-control" required="">
								</div>
			
		</div>
		<div class="col-md-4">
								<div class="form-group">
									<label>นามสกุล</label>
									<input type="text" name="l_name" class="form-control" required="">
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
												<option value="<?php echo 2562- $i ; ?>"><?php echo 2562- $i ; ?></option>
											<?php } ?>
										</select>
								</div>
		</div>
		<div class="col-md-3">
								<div class="form-group">
									<label>เบอร์โทรศัพท์</label>
									<input type="text" name="phone_number" class="form-control" required="">
								</div>
		</div>
		<div class="col-md-3">
								<div class="form-group">
									<label>สถานะภาพการทำงานปัจจุบัน</label>
									<select name="status_study" class="form-control" required="">
										<option value="">กรุณาเลือก</option>
										<option value="อยู่ระหว่างการศึกษา">อยู่ระหว่างการศึกษา</option>
										<option value="ยังไม่มีงานทำ">ยังไม่มีงานทำ</option>
										<option value="ทำงานตรงสาย">ทำงานตรงสาย</option>
										<option value="ทำงานไม่ตรงสาย">ทำงานไม่ตรงสาย</option>
									</select>
								</div>
		</div>
		<div class="col-md-3">
								<div class="form-group">
									<label>จังหวัดที่อาศัยในปัจจุบัน</label>
									<select class="form-control" name="place_now" required="" >
										<option value="">กรุณาเลือก</option>
										<?php $sql_prov = pg_query("select pv_tn from tambon group by pv_tn order by pv_tn asc"); 
										while ($arr_prov = pg_fetch_array($sql_prov)) {
										?>
										<option value="<?php echo $arr_prov[pv_tn]; ?>"><?php echo $arr_prov[pv_tn]; ?></option>
										<?php } ?>
									</select>
								</div>
		</div>
		
	</div>


		<div class="col-md-3">
								<div class="form-group">
									<label>ชื่อมหาวิทยาลัย</label>
									<input type="text" name="university" class="form-control" required="">
								</div>
		</div>
		<div class="col-md-3">
								<div class="form-group">
									<label>ระดับ</label>
									<select name="success_degree" class="form-control" required="">
										<option value="">กรุณาเลือก</option>
										<option value="ปริญญาตรี">ปริญญาตรี</option>
										<option value="ปริญญาโท">ปริญญาโท</option>
										<option value="ปริญญาเอก">ปริญญาเอก</option>
									</select>
								</div>
		</div>

		<div class="col-md-3">
								<div class="form-group">
									<label>คณะ</label>
									<input type="text" name="facutly" class="form-control" required="">
								</div>
			
		</div>
		<div class="col-md-3">
								<div class="form-group">
									<label>สาขา</label>
									<input type="text" name="major" class="form-control" required="">
								</div>
			
		</div>

		<div class="col-md-4">
								<div class="form-group">
									<label>วุฒิที่สำเร็จการศึกษา</label>
									<input type="text" name="qualification" class="form-control" required="">
								</div>
			
		</div>

		<div class="col-md-4">
								<div class="form-group">
									<label>ปีที่เริ่มเข้าศึกษา</label>
										<select name="year_start" class="form-control">
												<option value="">กรุณาเลือก</option>
											<?php for ($i=0; $i < 40; $i++) {  ?>
												<option value="<?php echo 2562- $i ; ?>"><?php echo 2562- $i ; ?></option>
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
												<option value="<?php echo 2562- $i ; ?>"><?php echo 2562- $i ; ?></option>
											<?php } ?>
										</select>
								</div>
			
		</div>
		

		<hr>



		<div class="">
			<div class="col-md-12">
								<div class="form-group">
									<label>Email *</label>
									<input type="email" name="email" class="form-control" required="">
								</div>
			
				
			</div>
			
			<!-- <div class="col-md-12">
			<caption>ประสบการณ์การใช้งาน Software</caption>
			<table class="table table-hover" style="text-align: center;   ">
			  <thead>
			    <tr>
			      <th scope="col" width="40%"></th>
			      <th scope="col">ไม่รู้จัก</th>
			      <th scope="col">เคยได้ยิน แต่ไม่เคยใช้</th>
			      <th scope="col">เคยใช้ แต่ไม่ชำนาญ</th>
			      <th scope="col">เคยใช้อย่างชำนาญ</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr class="table-active">
			      <th scope="row">ARCGIS</th>
			      <td>
				      <div class="form-check">
				      <label class="form-check-label">
				          <input type="radio" class="form-check-input" name="arcgis" value="ไม่รู้จัก">
				        </label>
				      </div>
				  </td>
			      <td>
				      <div class="form-check">
				      <label class="form-check-label">
				          <input type="radio" class="form-check-input" name="arcgis" value="เคยได้ยิน แต่ไม่เคยใช้">
				        </label>
				      </div>
				  </td>
			      <td>
				      <div class="form-check">
				      <label class="form-check-label">
				          <input type="radio" class="form-check-input" name="arcgis" value="เคยใช้ แต่ไม่ชำนาญ">
				        </label>
				      </div>
				  </td>
			      <td>
				      <div class="form-check">
				      <label class="form-check-label">
				          <input type="radio" class="form-check-input" name="arcgis" value="เคยใช้อย่างชำนาญ">
				        </label>
				      </div>
				  </td>
			    </tr>
			    <tr class="table-active">
			      <th scope="row"> ENVI</th>
			      <td>
				      <div class="form-check">
				      <label class="form-check-label">
				          <input type="radio" class="form-check-input" name="envi" value="ไม่รู้จัก">
				        </label>
				      </div>
				  </td>
			      <td>
				      <div class="form-check">
				      <label class="form-check-label">
				          <input type="radio" class="form-check-input" name="envi" value="เคยได้ยิน แต่ไม่เคยใช้">
				        </label>
				      </div>
				  </td>
			      <td>
				      <div class="form-check">
				      <label class="form-check-label">
				          <input type="radio" class="form-check-input" name="envi" value="เคยใช้ แต่ไม่ชำนาญ">
				        </label>
				      </div>
				  </td>
			      <td>
				      <div class="form-check">
				      <label class="form-check-label">
				          <input type="radio" class="form-check-input" name="envi" value="เคยใช้อย่างชำนาญ">
				        </label>
				      </div>
				  </td>
			    </tr>
			    <tr class="table-active">
			      <th scope="row">QGIS Desktop</th>
			      <td>
				      <div class="form-check">
				      <label class="form-check-label">
				          <input type="radio" class="form-check-input" name="qgis" value="ไม่รู้จัก">
				        </label>
				      </div>
				  </td>
			      <td>
				      <div class="form-check">
				      <label class="form-check-label">
				          <input type="radio" class="form-check-input" name="qgis" value="เคยได้ยิน แต่ไม่เคยใช้">
				        </label>
				      </div>
				  </td>
			      <td>
				      <div class="form-check">
				      <label class="form-check-label">
				          <input type="radio" class="form-check-input" name="qgis" value="เคยใช้ แต่ไม่ชำนาญ">
				        </label>
				      </div>
				  </td>
			      <td>
				      <div class="form-check">
				      <label class="form-check-label">
				          <input type="radio" class="form-check-input" name="qgis" value="เคยใช้อย่างชำนาญ">
				        </label>
				      </div>
				  </td>
			    </tr>
			    <tr class="table-active">
			      <th scope="row">GRASS GIS</th>
			      <td>
				      <div class="form-check">
				      <label class="form-check-label">
				          <input type="radio" class="form-check-input" name="grass" value="ไม่รู้จัก">
				        </label>
				      </div>
				  </td>
			      <td>
				      <div class="form-check">
				      <label class="form-check-label">
				          <input type="radio" class="form-check-input" name="grass" value="เคยได้ยิน แต่ไม่เคยใช้">
				        </label>
				      </div>
				  </td>
			      <td>
				      <div class="form-check">
				      <label class="form-check-label">
				          <input type="radio" class="form-check-input" name="grass" value="เคยใช้ แต่ไม่ชำนาญ">
				        </label>
				      </div>
				  </td>
			      <td>
				      <div class="form-check">
				      <label class="form-check-label">
				          <input type="radio" class="form-check-input" name="grass" value="เคยใช้อย่างชำนาญ">
				        </label>
				      </div>
				  </td>
			    </tr>
			    <tr class="table-active">
			      <th scope="row">PostgreSQL/PostGIS</th>
			      <td>
				      <div class="form-check">
				      <label class="form-check-label">
				          <input type="radio" class="form-check-input" name="postgres" value="ไม่รู้จัก">
				        </label>
				      </div>
				  </td>
			      <td>
				      <div class="form-check">
				      <label class="form-check-label">
				          <input type="radio" class="form-check-input" name="postgres" value="เคยได้ยิน แต่ไม่เคยใช้">
				        </label>
				      </div>
				  </td>
			      <td>
				      <div class="form-check">
				      <label class="form-check-label">
				          <input type="radio" class="form-check-input" name="postgres" value="เคยใช้ แต่ไม่ชำนาญ">
				        </label>
				      </div>
				  </td>
			      <td>
				      <div class="form-check">
				      <label class="form-check-label">
				          <input type="radio" class="form-check-input" name="postgres" value="เคยใช้อย่างชำนาญ">
				        </label>
				      </div>
				  </td>
			    </tr>
			    <tr class="table-active">
			      <th scope="row">MySQL spatial extensions</th>
			      <td>
				      <div class="form-check">
				      <label class="form-check-label">
				          <input type="radio" class="form-check-input" name="mysql" value="ไม่รู้จัก">
				        </label>
				      </div>
				  </td>
			      <td>
				      <div class="form-check">
				      <label class="form-check-label">
				          <input type="radio" class="form-check-input" name="mysql" value="เคยได้ยิน แต่ไม่เคยใช้">
				        </label>
				      </div>
				  </td>
			      <td>
				      <div class="form-check">
				      <label class="form-check-label">
				          <input type="radio" class="form-check-input" name="mysql" value="เคยใช้ แต่ไม่ชำนาญ">
				        </label>
				      </div>
				  </td>
			      <td>
				      <div class="form-check">
				      <label class="form-check-label">
				          <input type="radio" class="form-check-input" name="mysql" value="เคยใช้อย่างชำนาญ">
				        </label>
				      </div>
				  </td>
			    </tr>
			    <tr class="table-active">
			      <th scope="row">MapServer</th>
			      <td>
				      <div class="form-check">
				      <label class="form-check-label">
				          <input type="radio" class="form-check-input" name="mapserver" value="ไม่รู้จัก">
				        </label>
				      </div>
				  </td>
			      <td>
				      <div class="form-check">
				      <label class="form-check-label">
				          <input type="radio" class="form-check-input" name="mapserver" value="เคยได้ยิน แต่ไม่เคยใช้">
				        </label>
				      </div>
				  </td>
			      <td>
				      <div class="form-check">
				      <label class="form-check-label">
				          <input type="radio" class="form-check-input" name="mapserver" value="เคยใช้ แต่ไม่ชำนาญ">
				        </label>
				      </div>
				  </td>
			      <td>
				      <div class="form-check">
				      <label class="form-check-label">
				          <input type="radio" class="form-check-input" name="mapserver" value="เคยใช้อย่างชำนาญ">
				        </label>
				      </div>
				  </td>
			    </tr>
			    <tr class="table-active">
			      <th scope="row">OpenLayers</th>
			      <td>
				      <div class="form-check">
				      <label class="form-check-label">
				          <input type="radio" class="form-check-input" name="openlayer" value="ไม่รู้จัก">
				        </label>
				      </div>
				  </td>
			      <td>
				      <div class="form-check">
				      <label class="form-check-label">
				          <input type="radio" class="form-check-input" name="openlayer" value="เคยได้ยิน แต่ไม่เคยใช้">
				        </label>
				      </div>
				  </td>
			      <td>
				      <div class="form-check">
				      <label class="form-check-label">
				          <input type="radio" class="form-check-input" name="openlayer" value="เคยใช้ แต่ไม่ชำนาญ">
				        </label>
				      </div>
				  </td>
			      <td>
				      <div class="form-check">
				      <label class="form-check-label">
				          <input type="radio" class="form-check-input" name="openlayer" value="เคยใช้อย่างชำนาญ">
				        </label>
				      </div>
				  </td>
			    </tr>
			    <tr class="table-active">
			      <th scope="row">GeoServer</th>
			      <td>
				      <div class="form-check">
				      <label class="form-check-label">
				          <input type="radio" class="form-check-input" name="geoserver" value="ไม่รู้จัก">
				        </label>
				      </div>
				  </td>
			      <td>
				      <div class="form-check">
				      <label class="form-check-label">
				          <input type="radio" class="form-check-input" name="geoserver" value="เคยได้ยิน แต่ไม่เคยใช้">
				        </label>
				      </div>
				  </td>
			      <td>
				      <div class="form-check">
				      <label class="form-check-label">
				          <input type="radio" class="form-check-input" name="geoserver" value="เคยใช้ แต่ไม่ชำนาญ">
				        </label>
				      </div>
				  </td>
			      <td>
				      <div class="form-check">
				      <label class="form-check-label">
				          <input type="radio" class="form-check-input" name="geoserver" value="เคยใช้อย่างชำนาญ">
				        </label>
				      </div>
				  </td>
			    </tr>
			  </tbody>
			</table>
			</div> -->
			
		</div>


								<div class="form-group text-right">
									<button type="submit" name="submit_form" class="btn btn-primary btn-block">บันทึกข้อมูล</button>
								</div>
</form>
							</div>
					
						  </div>

						  <div id="menu2" class="tab-pane fade">
						  	<div class="jumbotron">
						    <table id="example" class="display" style="width:100%">
						        <thead>
						            <tr>
						                <th>ชื่อ - นามสกุล</th>
						                <th>มหาวิทยาลัย</th>
						                <th>ระดับ</th>
						                <th>คณะ</th>
						                <th>สาขา</th>
						                <th>อีเมล</th>
						                <th></th>
						            </tr>
						        </thead>
						        <tbody>

<?php 
	$sql = pg_query("SELECT * from user_job   where owner_input = '$admin[id_admin]';");
	while ($arr = pg_fetch_array($sql)) {
		
?>						        	

						            <tr>
						                <td><?php echo  $arr[title_name],$arr[s_name],' ',$arr[l_name]  ; ?> </td>
						                <td><?php echo $arr[university]; ?> </td>
						                <td><?php echo $arr[success_degree]; ?></td>
						                <td><?php echo $arr[facutly]; ?></td>
						                <td><?php echo $arr[major]; ?></td>
						                <td><?php echo $arr[email]; ?></td>
						                <td>
<form  method="post" action="add_data.php" enctype="multipart/form-data">
				<a  data-toggle="modal" data-target="#myModal<?php echo $arr[id_no]; ?>" class="btn btn-info btn-sm"  >
					<i class="fa fa-search"></i>
				</a>
				<button type="submit" name="delete" value="<?php echo $arr[id_no]; ?>" class="btn btn-danger btn-sm"  onclick="return confirm('คุณต้องการลบข้อมูลของ <?php echo  $arr[title_name],$arr[s_name],' ',$arr[l_name]  ; ?> จริงๆหรือไม่ ถ้าลบข้อมูลแล้วจะไม่สามารถย้อนกลับได้ ?')">
					<i class="fa fa-close"></i>
				</button>
</form>
														</td>
						            </tr>
<?php } ?>  
						        </tbody>
						        <tfoot>
						            <tr>
						                <th>ชื่อ - นามสกุล</th>
						                <th>มหาวิทยาลัย</th>
						                <th>ระดับ</th>
						                <th>คณะ</th>
						                <th>สาขา</th>
						                <th>อีเมล</th>
						                <th></th>
						            </tr>
						        </tfoot>
						    </table>




							</div>
						  </div>

						</div>
					</div>



					<div class="col-md-4 col-sm-12 col-xs-12">
					
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
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>


		<script type="text/javascript">
			$(document).ready(function() {
				    $('#example').DataTable();
				} );


		</script>
		
	</body>
</html>