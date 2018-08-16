<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          
          <ul class="sidebar-menu">
            <li class="treeviewview">
			<?php
			if(!logged_in()){
				?>
				<a href="login.html">
                <i class="fa fa-account"></i> <span>Login</span> </i>
              </a>
				<?php
			} else{
				?>
				<a href="index.php">
                <i class="fa fa-dashboard"></i> <span>Home</span> </i>
              </a>
			  <?php 
						if(isset($user_data['type']) && $user_data['type'] == 1){
							echo '<a href="users.php" class=""><i class="fa fa-user"></i> <span>Users</span></a>';
						}
						//This menu item will only show up if an admin is logged in.
						?>
				   <a href="viewbeneficiary.php">
					<i class="fa fa-files-o"></i> <span>Beneficiaries</span> </i>
				  </a>
				   <a href="earlywarningview.php">
					<i class="fa fa-clock-o"></i> <span>Early Warning</span> </i>
				  </a>
				   <a href="viewfragility.php">
					<i class="fa fa-exclamation-circle"></i> <span>Fragility Index</span> </i>
				  </a>
				   <a href="viewfunding.php">
					<i class="fa fa-money"></i> <span>Funding</span> </i>
				  </a>
				   <a href="viewpeople.php">
					<i class="fa fa-users"></i> <span>People in Need</span> </i>
				  </a>
				   <a href="viewsituation.php">
					<i class="fa fa-globe"></i> <span>Situation Report</span> </i>
				  </a>
		 
				<?php
			}
			?>
               </aside>