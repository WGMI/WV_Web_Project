<?php 
include 'core/init.php';
admin_only();
include 'pages/includes/header.php';

if(!empty($_POST)){
	if($_POST['access'] < 8){
		$email = $_POST['email'];
		
		if(!email_exists($email)){
			$username = $_POST['username'];
			if(!user_exists($username)){
				if(strlen($_POST['password']) > 5){
					$firstname = $_POST['firstname'];
					$lastname = $_POST['lastname'];
					$password = md5($_POST['password']);
					$access = $_POST['access'];
					$office = $_POST['office'];
			
					$query = mysqli_query($conn,"insert into users values(NULL,'$firstname','$lastname','$email','$username','$password',$access,'$office',1)");
					
					if($query){
						header('Location: users.php?success=1');
					}
				} else{
					echo '
					<div class="alert alert-danger">
					  Please use at least 6 characters for the psssword.
					</div>
					';
				}
			} else{
				echo '
				<div class="alert alert-danger">
				  That username is taken.
				</div>
				';
			}
		} else{
			echo '
			<div class="alert alert-danger">
			  That email is already in use.
			</div>
			';
		}
	} else{
		echo '
		<div class="alert alert-danger">
		  Please select an Access Level.
		</div>
		';
	}
}
?>	

<div class="row">
	<!-- left column -->
	<div class="col-md-10 col-md-offset-1">
	<div class="box box-warning">
                <div class="box-header">
                </div>
		<div class="box-body">
			<section class="content-header">
				          <h1>
				            Add Account<br>
				          </h1>
				          <ol class="breadcrumb">
				            <li><a href="index"><i class="fa fa-dashboard"></i> Home</a></li>
				            <li class="active">Add Account</li>
				          </ol>
			        </section>
			         <hr>

			<form action="" method="POST">
			  <div class="form-group">
				<label for="firstname">Firstname</label>
				<input type="firstname" class="form-control" id="firstname" name="firstname" required>
			  </div>
			  <div class="form-group">
				<label for="lastname">Lastname</label>
				<input type="lastname" class="form-control" id="lastname" name="lastname" required>
			  </div>
			  <div class="form-group">
				<label for="email">Email address</label>
				<input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
			  </div>
			  <div class="form-group">
				<label for="username">Username</label>
				<input type="username" class="form-control" id="username" name="username" required>
			  </div>
			  <div class="form-group">
				<label for="password">Password</label>
				<input type="password" class="form-control" id="password" name="password" required>
			  </div>
			  <div class="form-group">
				<label for="access">Access Level</label>
				<select class="form-control" id="access" name="access">
				  <option value="9" disabled selected>Select...</option>
				  <option value="1">Administrator</option>
				  <option value="0">Regular User</option>
				</select>
			  </div>
			  <div class="form-group">
				<label for="office">Office</label>
				<select class="form-control" id="office" name="office">
				  <option value="" disabled selected>Select...</option>
				  <option value="Kenya">Kenya</option>
					<option value="Uganda">Uganda</option>
					<option value="Rwanda">Rwanda</option>
					<option value="Burundi">Burundi</option>
					<option value="Tanzania">Tanzania</option>
					<option value="Sudan">Sudan</option>
					<option value="South Sudan">South Sudan</option>
					<option value="Ethiopia">Ethiopia</option>
					<option value="Somalia">Somalia</option>
				</select>
			  </div>
			  <input type="submit" class="btn btn-primary" value="Submit">
			</form>
		</div>
	</div>
</div>
											
<?php 
include 'pages/includes/footer.php';
?>		