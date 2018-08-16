<?php 
//This script is not currently in use in the project. Will be stripped for parts and discarded
include 'core/init.php';
include 'pages/includes/header.php';

admin_only();//This function blocks access to non-admin users. Non-admins will be kicked back to the index

if(isset($_GET['approve'])){
	$approve = $_GET['approve'];
	
	$query = mysqli_query($conn,"update beneficiaries set approve = 1 where beneficiary_id = $approve");
	
	if($query){
		$msg="<strong>Entry Approved</strong>";
		
		echo '<div class="alert alert-success" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'
		.$msg.
		'</div>';
	}
	
	if($approve == 'all'){
		$query = mysqli_query($conn,"update beneficiaries set approve = 1 where 1");
	
		if($query){
			$msg="<strong>Entries Approved</strong>";
			
			echo '<div class="alert alert-success" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'
			.$msg.
			'</div>';
		}
	}
}
?>	

<div class="row">
            <div class="col-md-10 col-md-offset-1">

              <div class="box box-warning" style="width: 100%">
                <div class="box-header">
                 <!--  <h3 class="box-title">List of beneficiaries</h3> -->
                </div><!-- /.box-header -->
                <div class="box-body">

				<section class="content-header">
		          <h1>
		            View All Beneficiaries<br>
		            <a href="addbeneficiary.php"><small>Add beneficiary</small></a>
		          </h1>
				  
				  <div align="right">
                        <a href="beneficiary.php?approve=all" title="Approve All"
                                class="btn btn-success"> Approve All</a>


                    </div>
					
					<br>
				  
		          <ol class="breadcrumb">
		            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
		            <li><a href="addbeneficiary.php">Add beneficiary</a></li>
		            <li class="active">View beneficiaries</li>
		          </ol>
		        </section>

		        <hr>

		              

        <table id="example" class="table table-bordered table-hover" style="width:100%">
        <thead>
            <tr>
                <th>Beneficiary Id</th>
                <th>Region</th>
                <th>Country</th>
                <th>Period</th>
                <th>Last Update</th>
                <th>Action</th>
                <th>Approve</th>
            </tr>
        </thead>
        <tbody>
        	<?php
				$query = "SELECT * FROM beneficiaries ORDER BY beneficiary_id DESC";
				$getbeneficiary = mysqli_query($conn,$query);
				$counter = 0;
				
				function check_approve($id){
					global $conn;
					$query = mysqli_query($conn,"select approve from beneficiaries where beneficiary_id = $id");
					while($row = mysqli_fetch_assoc($query)){
						return $row['approve'];
					}
				}

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
					
					$approved = (check_approve($id)) ? "Approved":"<a type='button' class='btn btn-sm btn-primary' href='beneficiary.php?approve=".$id."'><i class='fa fa-check'></a>";

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
					echo "<td>$approved</td>";
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