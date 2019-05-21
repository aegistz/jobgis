  <?php 
  date_default_timezone_set('Asia/Bangkok');

  $date_time = date("d/m/Y H:i:s");
  $date = date("Y/m/d");

  $message = '';

  if( isset($_POST["submit_form"]) ){

	  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		  if($check !== false) {
			  $data = base64_encode(file_get_contents( $_FILES["fileToUpload"]["tmp_name"] ));
			  $img  =  "data:".$check["mime"].";base64,".$data;
		  }else{
			$img = '';
		  }   

	  $title_name = $_POST['title_name'];
	  $s_name = $_POST['s_name'];
	  $l_name = $_POST['l_name'];
	  $university = $_POST['university'];
	  $success_degree = $_POST['success_degree'];
	  $facutly = $_POST['facutly'];
	  $major = $_POST['major'];
	  $qualification = $_POST['qualification'];
	  $year_start = $_POST['year_start'];
	  $year_end = $_POST['year_end'];
	  $phone_number = $_POST['phone_number'];
	  $email = $_POST['email'];
	  $password = $_POST['password'];
	  $birth_year = $_POST['birth_year'];
	  $id_student = $_POST['student'];
	  $status_study = $_POST['status_study'];
	  $place_now = $_POST['place_now'];
	  $arcgis = $_POST['arcgis'];
	  $envi = $_POST['envi'];
	  $qgis = $_POST['qgis'];
	  $grass = $_POST['grass'];
	  $postgres = $_POST['postgres'];
	  $mysql = $_POST['mysql'];
	  $mapserver = $_POST['mapserver'];
	  $openlayer = $_POST['openlayer'];
	  $geoserver = $_POST['geoserver'];


	  $sql1 = "select * from user_job  where email = '$email'   ; ";
	  $query = pg_query($sql1);
	  $num = pg_num_rows($query);
	  if ($num < 1){
	  $sql2 = "insert into user_job 
	  ( 
		title_name , 
		s_name , 
		l_name , 
		university , 
		success_degree , 
		facutly , 
		major , 
		qualification , 
		year_start , 
		year_end , 
		phone_number , 
		email , 
		password ,
		date_access,
		status_user,
		birth_year,
		id_student,
		status_study,
		place_now,
		arcgis,
		envi,
		qgis,
		grass,
		postgres,
		mysql,
		mapserver,
		openlayer,
		geoserver,
		owner_input,
		type_input
	  )
	  values 
	  (
		'$title_name' ,
		'$s_name' ,
		'$l_name' ,
		'$university' ,
		'$success_degree' ,
		'$facutly' ,
		'$major' ,
		'$qualification' ,
		'$year_start' ,
		'$year_end' ,
		'$phone_number' ,
		'$email' ,
		'$password' ,
		'$date',
		'รอการยืนยัน',
		'$birth_year',
		'$id_student',
		'$status_study',
		'$place_now',
		'$arcgis',
		'$envi',
		'$qgis',
		'$grass',
		'$postgres',
		'$mysql',
		'$mapserver',
		'$openlayer',
		'$geoserver',
		'$admin[id_admin]',
		'Website'

	  );"; 


	  $result = pg_query($db,$sql2);

		  if($result){ 


		  $message = '<div class="alert alert-success alert-dismissible">
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								<strong>Success!</strong> นำเข้าข้อมูล'.$title_name.$s_name.' '.$l_name.'  เรียบร้อยแล้ว
							  </div>';
			//header('Location:checklogin.php?user_email='.$email.'&user_password='.$telephone.'&login=Login');



		  }else{

			  $message = '<div class="alert alert-danger alert-dismissible">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  <strong>Warning!</strong> ไม่สามา่รถบันทึกข้อมูลได้ กรุณาลองอีกครั้ง
						 </div>';

		  }

	  }else{ 
			 $message = '<div class="alert alert-danger alert-dismissible">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										<strong>Warning!</strong> Email นี้เคยถูกบันทึกแล้วภายในระบบ กรุณาตรวจสอบอีกครั้ง
									  </div>';
	  }
}

if (isset($_POST["insert_data_csv"])) {

	if ($_FILES[csv][size] > 0) { 

	    $file = $_FILES[csv][tmp_name]; 


	    $handle = fopen($file,"r"); 
		fgets($handle); 
	    do { 






			        if ($data[0]) { 
			         $query =    pg_query("INSERT INTO user_job (
			            		    title_name,
									s_name,
									l_name,
									university,
									success_degree,
									facutly,
									major,
									qualification,
									year_start,
									year_end,
									phone_number,
									email,
									date_access,
									birth_year,
									id_student,
									status_study,
									place_now,
									owner_input,
									type_input
									) VALUES 
					                ( 
					                    '".addslashes($data[0])."', 
					                    '".addslashes($data[1])."', 
					                    '".addslashes($data[2])."', 
					                    '".addslashes($data[3])."', 
					                    '".addslashes($data[4])."', 
					                    '".addslashes($data[5])."', 
					                    '".addslashes($data[6])."', 
					                    '".addslashes($data[7])."', 
					                    '".addslashes($data[8])."', 
					                    '".addslashes($data[9])."', 
					                    '".addslashes($data[10])."', 
					                    '".addslashes($data[11])."', 
					                    '$date',
					                    '".addslashes($data[12])."', 
					                    '".addslashes($data[13])."', 
					                    '".addslashes($data[14])."',
					                    '".addslashes($data[15])."',
															'$admin[id_admin]',
															'csv'
					                ) 
					            "); 


			            if ($query) {
			            	  $message = '<div class="alert alert-success alert-dismissible">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										<strong>Success!</strong> นำเข้าข้อมูล เรียบร้อยแล้ว
									  </div>';
			            }else{
			            	$message = '<div class="alert alert-danger alert-dismissible">
								  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								  <strong>Warning!</strong> ไม่สามา่รถบันทึกข้อมูลได้ กรุณาตรวจสอบไฟล์ก่อนนำเข้าอีกครั้ง
								 </div>';


			            }

			          
								
			        } 
	   		} while ($data = fgetcsv($handle,1000,",","'")); 



		}else{
 			$message = '<div class="alert alert-danger alert-dismissible">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  <strong>Warning!</strong> ไม่สามา่รถบันทึกข้อมูลได้ กรุณาตรวจสอบไฟล์ก่อนนำเข้าอีกครั้ง
						 </div>';


		}
}



if( isset($_POST["delete"]) ){

	$id_no = $_POST["delete"];

	$query = pg_query("SELECT * FROM user_job where id_no = '$id_no';");
	$arr = pg_fetch_array($query);
	$num = pg_num_rows($query);

	if( $num > 0 ){
		$delete = pg_query("DELETE FROM user_job where id_no = '$id_no';");
		if($delete){

						$message = '<div class="alert alert-success alert-dismissible">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>success!</strong> ระบบได้ทำการลบข้อมูลของ '.$arr[title_name].$arr[s_name].' '.$arr[l_name].' เรียบร้อยแล้ว
					</div>   ';	
		}else{
						$message = '<div class="alert alert-danger alert-dismissible">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Danger!</strong> ไม่สามารถลบข้อมูลได้ กรุณาลองอีกครั้ง
					</div>   ';	
		}
	}

	
}
?>