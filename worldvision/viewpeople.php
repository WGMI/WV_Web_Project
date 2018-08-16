<?php

include 'core/init.php';
protect();
include 'pages/includes/header.php';

?>
<div class="row">
            <!-- left column -->
        <div class="col-md-12">



        		<?php
				if (isset($_GET['success'])) {
					$msg = $_GET['success'];
					$msg="<strong>People in need field successfully added!</strong>";
					echo '<div class="alert alert-info" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
						  echo $msg;
						echo '</div>';
				  	
				}else{
					$msg ="";
				}
				?>


            	<?php
					if (isset($_GET['update'])) {
						$msg = $_GET['update'];
						$msg="<strong>People in need field successfully updated!</strong>";
					  	echo '<div class="alert alert-info" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
						  echo $msg;
						echo '</div>';
					}else{
						$msg ="";
					}
				?>

<div class="box box-warning">
                <div class="box-header">
                  <!-- <h3 class="box-title">Add Beneficiary</h3> -->
                </div>
                <div class="box-body">
					<section class="content-header">
				          <h1>
				            View People Table<br>
				          </h1>
				          <ol class="breadcrumb">
				            <li><a href="index"><i class="fa fa-dashboard"></i> Home</a></li>
				            <li><a href="addpeople.php">Add People</a></li>
				            <li class="active">View People</li>
				          </ol>
			        </section>
			         <hr>

			        <section class="content-button">
			        	<div class="pull-left">
								<a href="addpeople.php" type="button" class="btn btn-warning btn-block btn-flat"><i class="fa fa-plus"></i> Add People</a>
							</div>
			        </section>
			        <br>
			        <hr>


					<table id="example" class="table table-bordered table-striped table-hover nowrap" style="width:100%">

						
				        <thead>
				            <tr>
				            	<th>People Id</th>
				                <th>Country</th>
				                <th>Period</th>
				                <th>Category</th>
				                <th>People in Need</th>				                
				                <th>Date</th>
				                <th>Action</th>
				            </tr>
				        </thead>
				        <tbody>

				        	<?php
				        	$query = "SELECT * FROM people";
				        	$peopleresult = mysqli_query($conn,$query);
				        	$counter = 0;
				        	if (!$peopleresult) {
				        		die("query failed".mysqli_error($conn));
				        	}
				        	while ($row = mysqli_fetch_assoc($peopleresult)) {
				        		$people_id=$row['people_id'];
				        		$region=$row['region'];
								$country=$row['country'];
								$period=$row['period'];
								$category_of_people=$row['category_of_people'];
								$people_in_need=$row['people_in_need'];
								$date=$row['date'];

								echo "<tr>";
								echo "<td>{$people_id}</td>";
								echo "<td>{$country}</td>";
								echo "<td>{$period}</td>";
								echo "<td>{$category_of_people}</td>";
								echo "<td>{$people_in_need}</td>";
								echo "<td>{$date}</td>";
								echo "<td>
										<a type='button' class='btn btn-sm btn-primary' data-toggle='modal' data-target='#exampleModal_".$counter."'>
				  							  <i class='fa fa-eye'></i>
										</a>
										<a class='btn btn-sm btn-warning' href='update_people.php?editpeople={$people_id}'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
				                    	<a class='btn btn-sm btn-danger delete_people.php' data-people-id=".$row['people_id']." href='javascript:void(0)'><i class='fa fa-trash' aria-hidden='true'></i></a></td>";
								echo "</tr>";


				        	}


				        	?>





					    </tbody>
				        <tfoot>
				            <tr>
				                <th>People Id</th>
				                <th>Country</th>
				                <th>Period</th>
				                <th>Category</th>
				                <th>People in Need</th>				                
				                <th>Date</th>
				                <th>Action</th>
				            </tr>
				        </tfoot>
			    </table>
		









					</div>
			</div>
		</div>
</div>




<?php

include "pages/includes/footer.php";

?>