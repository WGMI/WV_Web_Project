<?php 
include 'core/init.php';
admin_only();//Only admins can access this page.
include 'pages/includes/header.php';

//The $_GET['success'] variable will be set after successfully adding a new user
if(isset($_GET['success'])){
	if($_GET['success'] == 1){
		echo '
		<div class="alert alert-success alert-dismissible fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		Account added.
		</div>
		';
	}
}

//The $_GET['active'] variable will be set after successfully changing a users active status
if(isset($_GET['active'])){
	$id = $_GET['active'];
	if(user_data($id)['active']){
		$query = mysqli_query($conn,"update users set active = 0 where id = $id");
	} else{
		$query = mysqli_query($conn,"update users set active = 1 where id = $id");
	}
}

//The $_GET['delete'] variable will be set after deleting a user
if(isset($_GET['delete'])){
	$id = $_GET['delete'];
	$query = mysqli_query($conn,"delete from users where id = $id");
}

?>	
			
<section class="content-header">
				          <h1>
				            Users<br>
				          </h1>
				          <ol class="breadcrumb">
				            <li><a href="index"><i class="fa fa-dashboard"></i> Home</a></li>
				            <li class="active">Users</li>
				          </ol>
			        </section>
			         <hr>


<div align="right">
                        <a href="addaccount.php" title="Add account"
                                class="btn btn-success"> Add Account</a>


                    </div>
<br>
<br>
<table id="smart_table" class="smart_table display table table-striped table-bordered"
                               cellspacing="0"
                               width="100%">
	<thead>
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Username</th>
			<th>User Type</th>
			<th>Account Status</th>
			<th>Office</th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php
		$query = mysqli_query($conn,"select * from users");//Fetching all users
		
		//This function checks user type to know whether it's an admin or not
		function type($type){
			return ($type) ? 'Administrator':'Regular User';
		}

		//This function checks user active status to know whether it's active or not
		function active($active){
			return ($active) ? 'Active':'<p class="text-danger">Inactive</p>';
		}
		
		while($row = mysqli_fetch_assoc($query)){
			
		echo '
		<tr>
			<td>'.$row['firstname'].' '.$row['lastname'].'</td>
			<td>'.$row['email'].'</td>
			<td>'.$row['username'].'</td>
			<td>'.type($row['type']).'</td>
			<td>'.active($row['active']).'</td>
			<td>'.$row['office'].'</td>
			<td style="text-align: center"><a href="users.php?active='.$row['id'].'" class="btn btn-warning">Activate/Deactivate</a></td>
			<td style="text-align: center"><a href="users.php?delete='.$row['id'].'" class="btn btn-danger">Delete</a></td>
		</tr>
		';
		}
		?>
	</tbody>          
</table>

										
<?php 
include 'pages/includes/footer.php';
?>		