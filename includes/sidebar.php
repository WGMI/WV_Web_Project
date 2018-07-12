<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<?php 
				if(logged_in()){
					?>
					<nav>
					<ul class="nav">
						<li><a href="index.php" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						<li><a href="test.php" class=""><i class="lnr lnr-user"></i> <span>Users</span></a></li>
						<li>
							<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-apartment"></i> <span>Offices</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse ">
								<ul class="nav">
									<li><a href="" class="">Kenya</a></li>
									<li><a href="" class="">Rwanda</a></li>
									<li><a href="" class="">Burundi</a></li>
								</ul>
							</div>
						</li>
						<li><a href="tables.php" class=""><i class="lnr lnr-chart-bars"></i> <span>Tables</span></a></li>
						<li><a href="mapview.php" class=""><i class="lnr lnr-map"></i> <span>Map View</span></a></li>
						<li><a href="beneficiary.php" class=""><i class="lnr lnr-book"></i> <span>Beneficiary Form</span></a></li>
					</ul>
					</nav>
					<?php
				}else{
					?>
					<nav>
					<ul class="nav">
						<li><a href="login.html" class="active"><i class="lnr lnr-enter"></i> <span>Login</span></a></li>
					</ul>
					</nav>
					<?php
				}
				?>
				
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->