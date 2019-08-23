<!DOCTYPE html>
<?php
	session_start();
	include 'config.php';
	

if( $_POST[submit_form] == 'true' ) 
{
 







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
				<h4>เพิ่มข้อมูลประกาศรับสมัครงาน</h4>

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
<form enctype="multipart/form-data" method="post">
						<div class="box-body">
							<div class="col-md-12">
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
										<input type="number" name="budget_job" class="form-control" >
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