<?php 
include 'core/init.php';
protect();
include 'pages/includes/header.php';
?>	

<div class="row">
            <div class="col-md-12 ">

            	<?php
				if (isset($_GET['success'])) {
					$msg = $_GET['success'];
					$msg="<strong>Beneficiary field successfully added!</strong>";
					echo '<div class="alert alert-success" role="alert">
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
						$msg="<strong>Beneficiary field successfully updated!</strong>";
					  	echo '<div class="alert alert-success" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
						  echo $msg;
						echo '</div>';
					}else{
						$msg ="";
					}
				?>


              <div class="box box-warning" style="width: 100%">
                <div class="box-header">
                 <!--  <h3 class="box-title">List of beneficiaries</h3> -->
                </div><!-- /.box-header -->
                <div class="box-body">

				<section class="content-header">
		          <h1>
		            View Beneficiaries<br>
		           
		          </h1>
		          <ol class="breadcrumb">
		            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
		            <li><a href="addbeneficiary.php">Add beneficiary</a></li>
		            <li class="active">View beneficiaries</li>
		          </ol>
		        </section>

		        <hr>
				
				<section class="content-button">
			        	<div class="pull-left">
								<a href="addbeneficiary.php" type="button" class="btn btn-warning btn-block btn-flat"><i class="fa fa-plus"></i> Add Beneficiaries</a>
							</div>
			        </section>
					<br>
					<br>

		              

        <table id="example" class="table table-bordered table-hover nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Beneficiary Id</th>
                <th>Region</th>
                <th>Country</th>
                <th>Period</th>
                <th>Last Update</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        	<?php
				$query = "SELECT * FROM beneficiaries ORDER BY beneficiary_id DESC";
				$getbeneficiary = mysqli_query($conn,$query);
				$counter = 0;

				if (!$getbeneficiary) {
							die('query failed'.mysqli_error($conn));
					}
					
					

				while ($row = mysqli_fetch_assoc($getbeneficiary)) {
					$id = $row["beneficiary_id"];
					$region = $row["region"];
					$country = $row["country"];
					$people = $row["people"];
					$date = $row["period"];
					$updated_date = $row["updated_time"];	
					$foodsecuritylivelihood = $row["food_security_and_livelihood"];
					$food_assistance = $row["food_assistance"];
					$wash = $row["WASH"];
					$educationpro = $row["education_and_protection"];
					$education = $row["education"];
					$hnutrition = $row["health_and_nutrition"];
					$health = $row["health"];
					$protection = $row["protection"];
					$nutrition = $row["nutrition"];
					$mprevention = $row["malaria_prevention"];
					$nfooditems = $row["non_food_items"];
					$timestamp=strtotime($date);
					$displaydate = date('F - Y',$timestamp);
					
				

					echo "<tr>";
					echo "<td>{$id}</td>";
					echo "<td>{$region}</td>";
					echo "<td>{$country}</td>";
					echo "<td>{$displaydate}</td>";
					echo "<td>{$updated_date}</td>";
					echo "<td><a type='button' class='btn btn-sm btn-primary' data-toggle='modal' data-target='#exampleModal_".$counter."'>
  							  <span><i class='fa fa-eye'></i></span>
							  </a>


					<a class='btn btn-sm btn-warning' href='update_beneficiary.php?editbeneficiary={$id}'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
                              <a class='btn btn-sm btn-danger delete_beneficiary' data-ben-id=".$row['beneficiary_id']." href='javascript:void(0)'><i class='fa fa-trash-o' aria-hidden='true'></i></a></td>";
					echo "</tr>";


					echo '<div class="modal fade" id="exampleModal_'.$counter.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">';
					        echo "Beneficiary Id Number"." ".$id;
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
								  echo 'Category of People'.' -  '.$people;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Period'.' -  '.$date;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Food Security and Livelihood'.' -  '.$foodsecuritylivelihood;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Food Assistance'.' -  '.$food_assistance;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Wash'.' -  '.$wash;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Education and Protection'.' -  '.$educationpro;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Education'.' -  '.$education;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Health and Nutrition'.' -  '.$hnutrition;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Health'.' -  '.$health;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Protection'.' -  '.$protection;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Nutrition'.' -  '.$nutrition;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Malaria Prevention'.' -  '.$mprevention;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Non Food_Items'.' -  '.$nfooditems;
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


				}

			?>
        </tbody>
        <tfoot>
            <tr>
                <th>Beneficiary Id</th>
                <th>Region</th>
                <th>Country</th>
                <th>Period</th>
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
    // if (isset($_GET['delete'])) {
    //    $deleteben = $_GET['delete'];
    //    $query = "DELETE FROM beneficiaries WHERE ben_id = {$deleteben}";
    //    $deletedbeneficiary = mysqli_query($connection,$query);
    //    header("Location:viewbeneficiary.php");
    //  } 
    ?>

<?php
include "pages/includes/footer.php";
?>