<?php
session_start();
include("config.php");

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
                  
                   WHERE id_no = '$_POST[id_no]';";

                     $objQuery = pg_query($strSQL);
                                                      if($objQuery)
                                                      {
                                                            $message = '<div class="alert alert-success alert-dismissible">
                                                                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                  <strong>Success!</strong> แก้ไขข้อมูล'.$_POST[title_name].$_POST[s_name].' '.$_POST[l_name].'  เรียบร้อยแล้ว
                                                              </div>';
                                                      }
                                                      else
                                                      {
                                                            $message = '<div class="alert alert-danger alert-dismissible">
                                                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                              <strong>Warning!</strong> ไม่สามา่รถบันทึกข้อมูลได้ กรุณาลองอีกครั้ง
                                                             </div>';
                                                      }


}
?>
<header class="primary">

<?php 
	$sql = pg_query("SELECT * from user_job  where owner_input = '$admin[id_admin]'  ;");
	while ($arr = pg_fetch_array($sql)) {
		
?>		
<!-- Modal -->
<div id="myModal<?php echo $arr[id_no]; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog"><div class="modal-content"><div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">ข้อมูลบุคคล</h4>
      </div>

      <form action="" method="post" accept-charset="utf-8"  >
            
   
            <div class="modal-body">
            	<table class="table ">
            		<tbody>
                              <tr>
                                    <td>คำนำหน้า : </td>
                                    <td><input type="text" class="form-control" name="title_name" value="<?php echo  $arr[title_name]; ?>">     </td>
                              </tr>
                              <tr>
                                    <td>ชื่อ : </td>
                                    <td><input type="text" class="form-control" name="s_name" value="<?php echo  $arr[s_name] ; ?>">     </td>
                              </tr>
                              <tr>
                                    <td>นามสกุล : </td>
                                    <td><input type="text" class="form-control" name="l_name" value="<?php echo  $arr[l_name]  ; ?>">     </td>
                              </tr>
                              <tr>
                                    <td>ปีเกิด : </td>
                                    <td>
                                             <select name="birth_year" class="form-control">
                                                  <?php for ($i=0; $i < 100; $i++) {  ?>
                                                       <option value="<?php echo 2562- $i ; ?>" <?php if (  2562- $i == $arr[birth_year]) {
                                                             echo 'selected';
                                                       } ?>  ><?php echo 2562- $i ; ?></option>
                                                  <?php } ?>
                                             </select>
                                    </td>
                              </tr>
            			<tr>
            				<td>มหาวิทยาลัย : </td>
            				<td><input type="text" class="form-control" name="university" value="<?php echo $arr[university]; ?>"></td>
            			</tr>
            			<tr>
            				<td>ระดับ : </td>
            				<td>
                                          <select name="success_degree" class="form-control" required="">
                                                <option value="ปริญญาตรี" <?php if($arr[success_degree] == 'ปริญญาตรี' ){echo 'selected';} ?> >ปริญญาตรี</option>
                                                <option value="ปริญญาโท"<?php if($arr[success_degree] == 'ปริญญาโท' ){echo 'selected';} ?>>ปริญญาโท</option>
                                                <option value="ปริญญาเอก"<?php if($arr[success_degree] == 'ปริญญาเอก' ){echo 'selected';} ?>>ปริญญาเอก</option>
                                          </select>
                                    </td>
            			</tr>
            			<tr>
            				<td>คณะ : </td>
            				<td><input type="text" class="form-control" name="facutly" value="<?php echo $arr[facutly]; ?>"></td>
            			</tr>
            			<tr>
            				<td>สาขา : </td>
            				<td><input type="text" class="form-control" name="major" value="<?php echo $arr[major]; ?>"></td>
            			</tr>
            			<tr>
            				<td>วุฒิการศึกษา : </td>
            				<td><input type="text" class="form-control" name="qualification" value="<?php echo $arr[qualification]; ?>"></td>
            			</tr>
            			<tr>
            				<td>ปีที่เริมการศึกษา : </td>
            				<td>
                                             <select name="year_start" class="form-control">
                                                  <?php for ($i=0; $i < 40; $i++) {  ?>
                                                       <option value="<?php echo 2562- $i ; ?>" <?php if (  2562- $i == $arr[year_start]) {
                                                             echo 'selected';
                                                       } ?>  ><?php echo 2562- $i ; ?></option>
                                                  <?php } ?>
                                             </select>
                                    </td>
            			</tr>
            			<tr>
            				<td>ปีที่จบการศึกษา : </td>
            				<td>
                                             <select name="year_end" class="form-control">
                                                  <?php for ($i=0; $i < 40; $i++) {  ?>
                                                       <option value="<?php echo 2562- $i ; ?>" <?php if (  2562- $i == $arr[year_end]) {
                                                             echo 'selected';
                                                       } ?>  ><?php echo 2562- $i ; ?></option>
                                                  <?php } ?>
                                             </select>
                                    </td>
            			</tr>
            			<tr>
            				<td>เบอร์โทรศัพท์ : </td>
            				<td><input type="text" class="form-control" name="phone_number" value="<?php echo $arr[phone_number]; ?>"></td>
            			</tr>
            			<tr>
            				<td>อีเมล : </td>
            				<td><input type="text" class="form-control" name="email" value="<?php echo $arr[email]; ?>"></td>
            			</tr>
            			<tr>
            				<td>สถานะภาพการทำงานปัจจุบัน : </td>
            				<td>
                                          <select name="status_study" class="form-control">
                                               <option value="">ไม่ได้เลือก</option>
                                                <option value="อยู่ระหว่างการศึกษา" <?php if($arr[status_study] == 'อยู่ระหว่างการศึกษา' ){echo 'selected';} ?>>อยู่ระหว่างการศึกษา</option>
                                               <option value="ยังไม่มีงานทำ" <?php if($arr[status_study] == 'ยังไม่มีงานทำ' ){echo 'selected';} ?>>ยังไม่มีงานทำ</option>
                                             <option value="ทำงานตรงสาย" <?php if($arr[status_study] == 'ทำงานตรงสาย' ){echo 'selected';} ?>>ทำงานตรงสาย</option>
                                             <option value="ทำงานไม่ตรงสาย" <?php if($arr[status_study] == 'ทำงานไม่ตรงสาย' ){echo 'selected';} ?>>ทำงานไม่ตรงสาย</option>
                                          </select>
                                    </td>
            			</tr>
            			<tr>
            				<td>จังหวัดที่อาศัยในปัจจุบัน : </td>
            				<td>


                                                            <select class="form-control" name="place_now" required="" >
                                                                  <option value="">กรุณาเลือก</option>
                                                                  <?php $sql_prov = pg_query("select pv_tn from tambon group by pv_tn order by pv_tn asc"); 
                                                                  while ($arr_prov = pg_fetch_array($sql_prov)) {
                                                                  ?>
                                                                  <option value="<?php echo $arr_prov[pv_tn]; ?>" <?php if($arr[place_now] == $arr_prov[pv_tn] ){echo 'selected';} ?> ><?php echo $arr_prov[pv_tn]; ?></option>
                                                                  <?php } ?>
                                                            </select>          


                                    </td>
            			</tr>
            			<tr>
            				<td>รูปแบบการนำเข้า : </td>
            				<td><?php echo $arr[type_input]; ?></td>
            			</tr>
            			<tr>
            				<td>วันที่นำเข้า : </td>
            				<td><?php echo $arr[date_access]; ?></td>
            			</tr>
            			
            		</tbody>
            	</table>
                 
            </div>
            <div class="modal-footer">
                  <input type="hidden" name="id_no" value="<?php echo $arr[id_no]; ?>">
                   <button type="submit" class="btn btn-success" name="update" >บันทึกข้อมูล</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
       </form>
</div>
</div>
</div>
<?php } ?>



			<div class="firstbar">
				<div class="container">
					<div class="row">
						<div class="col-md-3 col-sm-12">
							<div class="brand">
								<a href="./">
									<img src="../images/6logo.png" alt=" Logo">
								</a>
							</div>						
						</div>
						<div class="col-md-6 col-sm-12">
												
						</div>
<!-- 
						<div class="col-md-3 col-sm-12 text-right">
							<ul class="nav-icons">
								<li><a href="register.html"><i class="ion-person-add"></i><div>Register</div></a></li>
								<li><a href="login.html"><i class="ion-person"></i><div>Login</div></a></li>
							</ul>
						</div> -->


	<div class="col-md-3 col-sm-12 text-right">
							<ul class="nav-icons">
								<li><a href="#"><i class="ion-person"></i><div> <?php echo $admin[name_admin]; ?></div></a></li>
								<li><a href="../logout.php"><i class="ion-log-out	"></i><div>Logout</div></a></li>
							</ul>
						</div>


					</div>
				</div>
			</div>

			<!-- Start nav -->
			<nav class="menu">
				<div class="container">
					<div class="brand">
						<a href="#">
							<img src="../images/6logo.png" alt=" Logo">
						</a>
					</div>
					<div class="mobile-toggle">
						<a href="#" data-toggle="menu" data-target="#menu-list"><i class="ion-navicon-round"></i></a>
					</div>
					<div class="mobile-toggle">
						<a href="#" data-toggle="sidebar" data-target="#sidebar"><i class="ion-ios-arrow-left"></i></a>
					</div>
					<div id="menu-list">
						<ul class="nav-list">
							<li class="for-tablet nav-title"><a>Menu</a></li>
							<li class="for-tablet"><a href="./">หน้าแรก</a></li>
							<li class="for-tablet"><a href="add_data.php">นำเข้าฐานข้อมูล</a></li>
                                          <li class="for-tablet"><a href="student.php">ดาวน์โหลดฐานข้อมูล</a></li>
							<li class="for-tablet"><a href="contact.php">ติดต่อผู้พัฒนา</a></li>

							<li><a href="./">หน้าแรก</a></li>
							<li><a href="add_data.php">นำเข้าฐานข้อมูล</a></li>
							<li><a href="student.php">ดาวน์โหลดฐานข้อมูล</a></li>
							<li><a href="contact.php">ติดต่อผู้พัฒนา</a></li>
						</ul>
					</div>
				</div>
			</nav>
			<!-- End nav -->

		</header>

