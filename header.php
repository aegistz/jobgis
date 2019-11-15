<?php
session_start();

include("config.php");
?>
<header class="primary">
			<div class="firstbar">
				<div class="container">
					<div class="row">
						<div class="col-md-3 col-sm-12">
							<div class="brand">
								<a href="./">
									<img src="images/6logo.png" alt=" Logo" >
								</a>
							</div>						
						</div>


				
						<div class="col-md-6 col-sm-12">
<?php 
if(isset($_COOKIE["type"]))
{
 ?>		
							<form class="search" action="search.php" autocomplete="on">
<?php } else{
	echo '<form class="search" action="#" autocomplete="on">';
}?>	
								<div class="form-group">
									<div class="input-group">
										<input type="text" name="eqc" class="form-control" placeholder="ค้นหา งาน / ผู้คน / สถานประกอบการ  ...." value="<?php echo $_GET[eqc]; ?>">									
										<div class="input-group-btn">
											<button class="btn btn-primary"><i class="ion-search"></i></button>
										</div>
									</div>
								</div>
								<div class="help-block">
									<div>Popular:</div>
									<ul>
										<li><a href="search.php">งาน GIS</a></li>
										<li><a href="search.php">งานภูมิศาสตร์</a></li>
										<li><a href="search.php?type=apprentice">ฝึกงาน GIS</a></li>
										<li><a href="search.php">วิเคาะห์ภาพถ่ายดาวเทียม</a></li>
										<li><a href="search.php">งานพัฒนาระบบ</a></li>
										<li><a href="search.php?type=coop">สหกิจศึกษา</a></li>
									</ul>
								</div>
							</form>		
						
						</div>
					
<!-- 
						<div class="col-md-3 col-sm-12 text-right">
							<ul class="nav-icons">
								<li><a href="register.html"><i class="ion-person-add"></i><div>Register</div></a></li>
								<li><a href="login.html"><i class="ion-person"></i><div>Login</div></a></li>
							</ul>
						</div> -->


<?php 
if(isset($_COOKIE["type"]))
{
 ?>
	<div class="col-md-3 col-sm-12 text-right">
							<ul class="nav-icons">
								<li><a href="profile.php"><i class="ion-person"></i><div> <?php echo $user[s_name],' ', $user[l_name]; ?> </div></a></li>
								<li><a href="logout.php"><i class="ion-log-out	"></i><div>Logout</div></a></li>
							</ul>
						</div>

 <?php }else{ ?>

	<div class="col-md-3 col-sm-12 text-right">
							<ul class="nav-icons">
								<li><a href="logout.php"><i class="ion-log-out"></i><div>Login</div></a></li>
							</ul>
						</div>

 <?php } ?>
					

					</div>
				</div>
			</div>

			<!-- Start nav -->
			<nav class="menu">
				<div class="container">
					<div class="brand">
						<a href="#">
							<img src="images/6logo.png" alt=" Logo">
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
							<li class="for-tablet"><a href="login.php">Login</a></li>
							<li class="for-tablet"><a href="register.php">Register</a></li>
							<li><a href="./">หน้าแรก</a></li>
					
<?php 
$sql = pg_query("SELECT * from resume where email = '$user[email]';");
$num = pg_num_rows($sql);
 if (  isset($_COOKIE["type"]) ) { ?>							
							<li><a href="story.php">เรื่องราว</a></li>
							<li><a href="search.php">ค้นหางาน/ผู้คน/สถานประกอบการ</a></li>
							
							<li class="dropdown magz-dropdown"><a href="block.php">บทความน่าสนใจ <i class="ion-ios-arrow-right"></i></a>
								<ul class="dropdown-menu">
									<li><a href="blog.php">ทั่วไป</a></li>
									<li class="dropdown magz-dropdown"><a href="">ข่าวสาร <i class="ion-ios-arrow-right"></i></a>
										<ul class="dropdown-menu">
											<li><a href="blog.php?q=farmland">เกษตร</a></li>
											<li><a href="blog.php?q=technology">เทคโนโลยี</a></li>
											<li><a href="blog.php?q=villager">ชาวบ้าน</a>
										</ul>
									</li>
									<li><a href="blog.php?q=business">ธรุกิจ</a></li>
								</ul>
							</li>
<?php if ($num == 0) { ?>

							<li>
								<a href="resume.php">
									Resume GIS 
									<div class="badge ">คุณยังไม่ได้เพิ่ม</div>
								</a>
							</li>
<?php } else{  ?>

							<li>
								<a href="view_resume.php">
									Resume GIS 
								</a>
							</li>

<?php } ?>
							<li class="dropdown magz-dropdown"><a href="#">ตั้งค่า <i class="ion-ios-arrow-right"></i></a>
								<ul class="dropdown-menu">
									<li><a href="setting.php#profile"><i class="icon ion-person"></i> ข้อมูลส่วนตัว</a></li>
									<li><a href="setting.php#work-status"><i class="icon ion-heart"></i> สถานภาพการทำงาน</a></li>
									<li><a href="setting.php#password"><i class="icon ion-key"></i> เปลี่ยนรหัสผ่าน</a></li>
									<li class="divider"></li>
									<li><a href="logout.php"><i class="icon ion-log-out"></i> Logout</a></li>
								</ul>
							</li>
<?php } ?>



							<li><a href="contact.php">ติดต่อเรา</a></li>
						</ul>
					</div>
				</div>
			</nav>
			<!-- End nav -->

<!-- Modal -->
<div id="bg-img" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">แก้ไขภาพหน้าปก</h4>
      </div>
      <div class="modal-body">
<form enctype="multipart/form-data" method="post">
            <div class="form-group">
                <input class="form-control " type="file" id="cname"  name="file"  value="user.png"  onchange="readURL(this);">
                <center>
                    <img id="blah" src="images/student/<?php echo $user[bg_img]; ?>" style=" max-width:100%; height:200px;margin-top:20px;" alt="your image" />
                </center>
                
            </div>
            <button type="submit" class="btn btn-default btn-primary btn-block btn-sm" name="upload_img_bg_profile" value="true">SAVE</button>
</form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal -->
<div id="profile-img" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">แก้ไขรูปประจำตัว</h4>
      </div>
      <div class="modal-body">
<form enctype="multipart/form-data" method="post">
            <div class="form-group">
                <input class="form-control " type="file" id="cname"  name="file"  value="user.png"  onchange="readURL2(this);">
                <center>
                    <img id="blah2" src="images/student/<?php echo $user[img]; ?>" style=" max-width:100%; height:200px;margin-top:20px;" alt="your image" />
                </center>
                
            </div>
            <button type="submit" class="btn btn-default btn-primary btn-block btn-sm" name="upload_img_profile" value="true">SAVE</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- The Modal -->
<div id="myModal" class="modal">
  <img class="modal-content" id="img01">
  <span class="close">x ปิด</span>
</div>


		</header>