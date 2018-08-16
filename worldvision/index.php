<?php

include 'core/init.php';
protect(); //Checks if the user is logged in.
include "pages/includes/header.php";

?>


        <section class="content-header">
          <h1>
            
            Dashboard
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>
        <hr>

        
          <!-- Small boxes (Stat box) -->
		  
        <section class="content">
          <!-- Info boxes -->
          <div class="row">
            <div class="col-md-6 col-sm-8 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-list-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text"><a href="#">Situation Report Data Entry</a></span>
                  <span class="info-box-number"><small>Beneficiaries Form</small></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-6 col-sm-8 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-globe"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text"><a href="#">Worldview Early Warning Data Input</a></span>
                  <span class="info-box-number"><small>Early Warning Tool Form</small></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-6 col-sm-8 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-edit"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text"><a href="#">Manage Accounts</a></span>
                  <span class="info-box-number"><small>Manage User Accounts</small></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-6 col-sm-8 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-contact"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text"><a href="#" data-toggle="modal" data-target="#myModal">My Data</a></span>
                  <span class="info-box-number"><small>Contains your recent activites</small></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section>
		
		<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Select Form</h4>
        </div>
        <div class="modal-body">
          <p><a href="viewbeneficiary.php?id=<?php echo $user_data['id'];?>">Beneficiaries</a></p>
          <p><a href="earlywarningview.php?id=<?php echo $user_data['id'];?>">Early Warning Tool</a></p>
          <p><a href="viewfragility.php?id=<?php echo $user_data['id'];?>">Fragility Index</a></p>
          <p><a href="viewfunding.php?id=<?php echo $user_data['id'];?>">Funding</a></p>
          <p><a href="viewpeople.php?id=<?php echo $user_data['id'];?>">People In Need</a></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
		
<?php include "pages/includes/footer.php";?>