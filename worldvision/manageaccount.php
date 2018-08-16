<?php
//This script is not currently in use. DO NOT DELETE!
include 'core/init.php';
protect(); 
include 'pages/includes/header.php';

if(!empty($_POST)){
	$password = $_POST['password'];
	
	if(login($user_data['username'],$password)){
		$newpass = $_POST['newpassword'];
		$conf_pass = $_POST['confirmpassword'];
		
		if(strlen($newpass) < 6){
			$errors[] = 'Use 6 or more characters for the password.';
		} else if($newpass != $conf_pass){
			$errors[] = 'Those passwords do not match';
		} else{
			
			$id = $user_data['id'];
			$newpass = md5($_POST['newpassword']);
			$query = mysqli_query($conn,"update users set password = '$newpass' where id = $id");
			if($query){
				echo '<div class="alert alert-success" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  Password Changed
						  </div>';
			}
		}
	} else{
		$errors[] = 'Wrong password';
	}
	
	if(!empty($errors)){
		echo output_errors($errors);
	}
}

?>
<div class="row">
            <div class="col-md-10 col-md-offset-1">
	 			<div class="box box-warning">
	                <div class="box-header">
	                  <h3 class="box-title">Change Password</h3>
	                </div><!-- /.box-header -->
	                <!-- form start -->
	                <form role="form" id="resetform" method="POST">
	                  <div class="box-body">
	                    
	                    <div class="form-group">
	                      <label for="password">Old Password</label>
	                      <input type="password" class="form-control required" id="password" name="password" placeholder="Password">
	                    </div>

	                    <div class="form-group">
	                      <label for="newpassword">New Password</label>
	                      <input type="password" class="form-control required" id="newpassword" name="newpassword" placeholder="New Password">
	                    </div>
						
						<div class="form-group">
	                      <label for="confirmpassword">Confirm Password</label>
	                      <input type="password" class="form-control required" id="confirmpassword" name="confirmpassword" placeholder="Re-enter Password">
	                    </div>
						
						
	                    <!-- /.box-body -->

	                  <div class="form-group">
	                    <input type="submit" class="btn btn-warning" value="Submit">
	                  </div>
	                </form>
	              </div><!-- /.box -->
       </div>
 </div>

<?php

include "pages/includes/footer.php";

?>