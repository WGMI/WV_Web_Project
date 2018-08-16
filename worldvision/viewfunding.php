<?php
include 'core/init.php';
protect();
include 'pages/includes/header.php';

protect();
?>

<div class="row">
            <!-- left column -->
        <div class="col-md-12">



        		<?php
				if (isset($_GET['success'])) {
					$msg = $_GET['success'];
					$msg="<strong>Funding field successfully added!</strong>";
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
						$msg="<strong>Funding field successfully updated!</strong>";
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
				            View Funding Table<br>
				            <!-- <small><a href="addfunding"><button type="button" class="btn btn-primary btn-block btn-flat">Add Funding</button></small> -->
				          </h1>
				          <ol class="breadcrumb">
				            <li><a href="index"><i class="fa fa-dashboard"></i> Home</a></li>
				            <li><a href="addfunding">Add funding</a></li>
				            <li class="active">View Funding</li>
				          </ol>
			        </section>
			         <hr>

			        <section class="content-button">
			        	<div class="pull-left">
								<a href="addfunding.php" type="button" class="btn btn-warning btn-block btn-flat"><i class="fa fa-plus"></i> Add Funding</a>
							</div>
			        </section>
			        <br>
			        <hr>


					<table id="example" class="table table-bordered table-striped table-hover nowrap" style="width:100%">

						
				        <thead>
				            <tr>
				            	<th>Date Added</th>
				                <th>Country</th>
				                <th>Category</th>
				                <th>Funding Required</th>
				                <th>Funding Received</th>
				                <th>Last Update</th>
				                <th>Action</th>
				            </tr>
				        </thead>
				        <tbody>

				        	<?php
				        	$query = "SELECT * FROM funding";
				        	$fundingresult = mysqli_query($conn,$query);
				        	$counter = 0;
				        	if (!$fundingresult) {
				        		die("query failed".mysqli_error($connection));
				        	}
				        	while ($row = mysqli_fetch_assoc($fundingresult)) {
				        		$funding_id=$row['funding_id'];
				        		$region=$row['region'];
								$country=$row['country'];
								$period=$row['period'];
								$category=$row['category'];
								$funding_required=$row['funding_required'];
								$funding_received=$row['funding_received'];
								$funding_gap=$row['funding_gap'];
								$funding_date=$row['funding_date'];

								echo "<tr>";
								echo "<td>{$funding_date}</td>";
								echo "<td>{$country}</td>";
								echo "<td>{$category}</td>";
								echo "<td>{$funding_required}</td>";
								echo "<td>{$funding_received}</td>";
								echo "<td>{$funding_date}</td>";


								echo "<td><a type='button' class='btn btn-sm btn-primary' data-toggle='modal' data-target='#exampleModal_".$counter."'>
				  							  <i class='fa fa-eye'></i>
											  </a>
										<a class='btn btn-sm btn-warning' href='update_funding.php?editfunding={$funding_id}'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
				                    	<a class='btn btn-sm btn-danger delete_funding' data-fund-id=".$row['funding_id']." href='javascript:void(0)'><i class='fa fa-trash' aria-hidden='true'></i></a></td>";
									echo "</tr>";


									echo '<div class="modal fade" id="exampleModal_'.$counter.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									  <div class="modal-dialog" role="document">
									    <div class="modal-content">
									      <div class="modal-header">
									        <h5 class="modal-title" id="exampleModalLabel">';
									        echo "Funding Id Number"." ".$funding_id;
									echo '</h5>
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">&times;</span>
									        </button>
									      </div>
									      <div class="modal-body">';

									      echo '<ul class="list-group">';


												  echo '<li class="list-group-item list-group-item-primary">';
												  echo 'Region'.' -  '.$region;
												  echo '</li>';

												  echo '<li class="list-group-item list-group-item-light">';
												  echo 'Country'.' -  '.$country;
												  echo '</li>';

												  echo '<li class="list-group-item list-group-item-primary">';
												  echo 'Funding Duration'.' -  '.$period;
												  echo '</li>';

												  echo '<li class="list-group-item list-group-item-primary">';
												  echo 'Funding Category'.' -  '.$category;
												  echo '</li>';

												  echo '<li class="list-group-item list-group-item-primary">';
												  echo 'Funding Required'.' -  '.$funding_required;
												  echo '</li>';

												  echo '<li class="list-group-item list-group-item-primary">';
												  echo 'Funding Received'.' -  '.$funding_received;
												  echo '</li>';

												  echo '<li class="list-group-item list-group-item-primary">';
												  echo 'Funding Gap'.' -  '.$funding_gap;
												  echo '</li>';
										  echo '</ul>';

									      

									       
									    echo '</div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
									      </div>
									    </div>
									  </div>
									</div>';

									$counter++;






								echo "</tr>";


				        	}


				        	?>





					    </tbody>
				        <tfoot>
				            <tr>
				                <th>Date Added</th>
				                <th>Country</th>
				                <th>Category</th>
				                <th>Funding Required</th>
				                <th>Funding Received</th>
				                <th>Last Update</th>
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