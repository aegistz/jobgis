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

