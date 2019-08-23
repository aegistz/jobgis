<?php
session_start();

include("config.php");
?>
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<header class="primary">
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
							<form class="search" autocomplete="off">
								<div class="form-group">
									<div class="input-group">
										<input type="text" name="q" class="form-control" placeholder="ค้นหาแรงงานเฉพาะด้านที่นี่ ....">									
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
if($_COOKIE["status_com"]  == 'company' )
{
 ?>
	<div class="col-md-3 col-sm-12 text-right">
							<ul class="nav-icons">
								<li><a href="./"><i class="ion-person"></i><div> <?php echo $company[name_com]; ?> </div></a></li>
								<li><a href="logout.php"><i class="ion-log-out	"></i><div>Logout</div></a></li>
							</ul>
						</div>

 <?php }else{ ?>

	<div class="col-md-3 col-sm-12 text-right">
							<ul class="nav-icons">
								<li><a href="login.php"><i class="ion-log-out"></i><div>Login</div></a></li>
							</ul>
						</div>

 <?php } ?>
					

					</div>
				</div>
			</div>
<?php 
if($_COOKIE["status_com"]  == 'company' )
{
 ?>
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
							<li class="for-tablet"><a href="login.html">Login</a></li>
							<li class="for-tablet"><a href="register.html">Register</a></li>
							<li><a href="./">หน้าแรก</a></li>
							<li><a href="request.php">ข้อมูลผู้สมัครงาน</a></li>
							<li><a href="search.php">ค้นหาแรงงาน</a></li>
							
							<li class="dropdown magz-dropdown"><a href="#">บทความน่าสนใจ <i class="ion-ios-arrow-right"></i></a>
								<ul class="dropdown-menu">
									<li><a href="#">ทั่วไป</a></li>
									<li class="dropdown magz-dropdown"><a href="#">ข่าวสาร <i class="ion-ios-arrow-right"></i></a>
										<ul class="dropdown-menu">
											<li><a href="#">เกษตร</a></li>
											<li><a href="#">เทคโนโลยี</a></li>
											<li><a href="#">ชาวบ้าน</a>
										</ul>
									</li>
									<li><a href="#">ธรุกิจ</a></li>
								</ul>
							</li>


							<li class="dropdown magz-dropdown"><a href="#">ตั้งค่า <i class="ion-ios-arrow-right"></i></a>
								<ul class="dropdown-menu">
									<li><a href="setting.php"><i class="icon ion-person"></i> My Account</a></li>
									<li><a href="setting.php"><i class="icon ion-key"></i> Change Password</a></li>
									<li class="divider"></li>
									<li><a href="logout.php"><i class="icon ion-log-out"></i> Logout</a></li>
								</ul>
							</li>

							<li><a href="contact.php">ติดต่อเรา</a></li>
						</ul>
					</div>
				</div>
			</nav>
			<!-- End nav -->

<?php }else { ?>
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
							<li class="for-tablet"><a href="login.html">Login</a></li>
							<li class="for-tablet"><a href="register.html">Register</a></li>
							<li><a href="./">หน้าแรก</a></li>
							

							<li><a href="contact.php">ติดต่อเรา</a></li>
						</ul>
					</div>
				</div>
			</nav>
			<!-- End nav -->
<?php } ?>
		</header>