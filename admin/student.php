<!DOCTYPE html>
<?php
session_start();

include("config.php");

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
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
						<table id="example" class=" table table-striped  display nowrap" style="width:100%">
						        <thead>
						             <tr>
						                <th>เลขประจำตัวนักศึกษา</th>
						                <th>ชื่อ - นามสกุล</th>
						                <th>ปีเกิด</th>
						                <th>เบอร์โทรศัพท์</th>
						                <th>สถานะภาพการทำงานปัจจุบัน</th>
						                <th>จังหวัดที่อาศัยปัจจุบัน</th>
						                <th>มหาวิทยาลัย</th>
						                <th>ระดับ</th>
						                <th>คณะ</th>
						                <th>สาขา</th>
						                <th>วุฒิที่สำเร็จการศึกษา</th>
						                <th>ปีที่เริ่มเข้าศึกษา</th>
						                <th>ปีที่จบการศึกษา</th>
						                <th>อีเมล</th>
						            </tr>
						        </thead>
						        <tbody>
<?php 
	$sql = pg_query("SELECT * from user_job where owner_input = '$admin[id_admin]'   ;");
	while ($arr = pg_fetch_array($sql)) {
		
?>						        	
						            <tr>
						                <td><?php echo $arr[id_student]; ?> </td>
						                <td><?php echo  $arr[title_name],$arr[s_name],' ',$arr[l_name]  ; ?> </td>
						                <td><?php echo $arr[birth_year]; ?> </td>
						                <td><?php echo $arr[phone_number]; ?> </td>
						                <td><?php echo $arr[status_study]; ?> </td>
						                <td><?php echo $arr[place_now]; ?> </td>
						                <td><?php echo $arr[university]; ?> </td>
						                <td><?php echo $arr[success_degree]; ?> </td>
						                <td><?php echo $arr[facutly]; ?> </td>
						                <td><?php echo $arr[major]; ?> </td>
						                <td><?php echo $arr[qualification]; ?> </td>
						                <td><?php echo $arr[year_start]; ?> </td>
						                <td><?php echo $arr[year_end]; ?> </td>
						                <td><?php echo $arr[email]; ?> </td>
						            </tr>
<?php } ?>  
						        </tbody>
						        <tfoot>
						             <tr>
						                <th>เลขประจำตัวนักศึกษา</th>
						                <th>ชื่อ - นามสกุล</th>
						                <th>ปีเกิด</th>
						                <th>เบอร์โทรศัพท์</th>
						                <th>สถานะภาพการทำงานปัจจุบัน</th>
						                <th>จังหวัดที่อาศัยปัจจุบัน</th>
						                <th>มหาวิทยาลัย</th>
						                <th>ระดับ</th>
						                <th>คณะ</th>
						                <th>สาขา</th>
						                <th>วุฒิที่สำเร็จการศึกษา</th>
						                <th>ปีที่เริ่มเข้าศึกษา</th>
						                <th>ปีที่จบการศึกษา</th>
						                <th>อีเมล</th>
						            </tr>
						        </tfoot>
						    </table>
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