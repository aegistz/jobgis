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
							<form class="search" autocomplete="off">
								<div class="form-group">
									<div class="input-group">
										<input type="text" name="q" class="form-control" placeholder="ค้นหางานที่นี่ ....">									
										<div class="input-group-btn">
											<button class="btn btn-primary"><i class="ion-search"></i></button>
										</div>
									</div>
								</div>
								<div class="help-block">
									<div>Popular:</div>
									<ul>
										<li><a href="#">งาน GIS</a></li>
										<li><a href="#">งานภูมิศาสตร์</a></li>
										<li><a href="#">ฝึกงาน GIS</a></li>
										<li><a href="#">วิเคาะห์ภาพถ่ายดาวเทียม</a></li>
										<li><a href="#">งานพัฒนาระบบ</a></li>
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
							<li class="for-tablet"><a href="login.html">Login</a></li>
							<li class="for-tablet"><a href="register.html">Register</a></li>
							<li><a href="./">หน้าแรก</a></li>
							<li><a href="story.php">เรื่องราว</a></li>
							<li><a href="search.php">ค้นหางาน</a></li>
							
							<li class="dropdown magz-dropdown"><a href="#">บทความน่าสนใจ <i class="ion-ios-arrow-right"></i></a>
								<ul class="dropdown-menu">
									<li><a href="category.php">ทั่วไป</a></li>
									<li class="dropdown magz-dropdown"><a href="category.php">ข่าวสาร <i class="ion-ios-arrow-right"></i></a>
										<ul class="dropdown-menu">
											<li><a href="category.php">เกษตร</a></li>
											<li><a href="category.php">เทคโนโลยี</a></li>
											<li><a href="category.php">ชาวบ้าน</a>
										</ul>
									</li>
									<li><a href="category.php">ธรุกิจ</a></li>
								</ul>
							</li>
							<li class="dropdown magz-dropdown">
								<a href="category.html">Resume GIS <i class="ion-ios-arrow-right"></i></a>
								<ul class="dropdown-menu">
									<li><a href="resume.php">resume</a></li>
									<li><a href="view_resume.php">ดูข้อมูล resume</a></li>
								</ul>
							</li>

						<!-- 	<li class="dropdown magz-dropdown magz-dropdown-megamenu"><a href="#">ประกาศรับสมัครงาน <i class="ion-ios-arrow-right"></i> <div class="badge">Hot</div></a>
								<div class="dropdown-menu megamenu">
									<div class="megamenu-inner">
										<div class="row">
											<div class="col-md-3">
												<div class="row">
													<div class="col-md-12">
														<h2 class="megamenu-title">สำหรับสถานประกอบการ</h2>
													</div>
												</div>
												<ul class="vertical-menu">
													<li><a href="reg-company.php"><i class="ion-ios-circle-outline"></i> ลงทะเบียนสถานประกอบการใหม่</a></li>
													
												</ul>
											</div>
											<div class="col-md-9">
												<div class="row">
													<div class="col-md-12">
														<h2 class="megamenu-title">งานของท่านที่เปิดรับอยู่</h2>
													</div>
												</div>
												<div class="row">

													<article class="article col-md-4 mini">
														<div class="inner">
															<figure>
																<a href="single.html">
																	<img src="images/news/img10.jpg" alt="Sample Article">
																</a>
															</figure>
															<div class="padding">
																<div class="detail">
																	<div class="time">December 10, 2016</div>
																	<div class="category"><a href="category.html">Healthy</a></div>
																</div>
																<h2><a href="single.html">Duis aute irure dolor in reprehenderit in voluptate</a></h2>
															</div>
														</div>
													</article>

												</div>
											</div>
										</div>								
									</div>
								</div>
<<<<<<< HEAD
							</li>
							<li class="dropdown magz-dropdown magz-dropdown-megamenu"><a href="">Resume GIS <i class="ion-ios-arrow-right"></i></a>
=======
							</li> -->


<?php 
if(isset($_COOKIE["type"]))
{
 ?>
							<li class="dropdown magz-dropdown"><a href="#">ตั้งค่า <i class="ion-ios-arrow-right"></i></a>
								<ul class="dropdown-menu">
									<li><a href="#"><i class="icon ion-person"></i> My Account</a></li>
									<li><a href="#"><i class="icon ion-heart"></i> Favorite</a></li>
									<li><a href="#"><i class="icon ion-chatbox"></i> Comments</a></li>
									<li><a href="#"><i class="icon ion-key"></i> Change Password</a></li>
									<li><a href="#"><i class="icon ion-settings"></i> Settings</a></li>
									<li class="divider"></li>
									<li><a href="#"><i class="icon ion-log-out"></i> Logout</a></li>
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



		</header>