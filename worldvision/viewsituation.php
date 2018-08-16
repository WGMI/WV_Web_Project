<?php

include "core/init.php";
protect();
include "pages/includes/header.php";

?>

<div class="row">
            <div class="col-md-10 col-md-offset-1">

            	<?php
				if (isset($_GET['success'])) {
					$msg="<strong>Situation Report field successfully added!</strong>";
					echo '<div class="alert alert-success" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
						  echo $msg;
						echo '</div>';
				  	
				}
				?>


            	<?php
					if (isset($_GET['update'])) {
						$msg = $_GET['update'];
						$msg="<strong>Situation Report field successfully updated!</strong>";
					  	echo '<div class="alert alert-info" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
						  echo $msg;
						echo '</div>';
					}
				?>


              <div class="box box-warning" style="width: 100%">
                <div class="box-header">
                 <!--  <h3 class="box-title">List of beneficiaries</h3> -->
                </div><!-- /.box-header -->
                <div class="box-body">

				<section class="content-header">
				          <h1>
				            View Situation Report Table<br>
				            <!-- <small><a href="addfunding"><button type="button" class="btn btn-primary btn-block btn-flat">Add Funding</button></small> -->
				          </h1>
				          <ol class="breadcrumb">
				            <li><a href="index"><i class="fa fa-dashboard"></i> Home</a></li>
				            <li><a href="addsituation.php">Add Situation Report</a></li>
				            <li class="active">View Situation Report</li>
				          </ol>
			        </section>
			         <hr>

			        <section class="content-button">
			        	<div class="pull-left">
								<a href="addsituation.php" type="button" class="btn btn-warning btn-block btn-flat"><i class="fa fa-plus"></i> Add Situation Report</a>
							</div>
			        </section>
			        <br>
			        <hr>

		              

        <table id="example" class="table table-bordered table-hover nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Situation ID</th>
                <th>Country</th>
                <th>Month</th>
                <th>Year</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        	<?php
				$query = "SELECT * FROM `situation_report`";
				$situation_query = mysqli_query($conn,$query);
				$counter = 0;

				if (!$situation_query) {
							die('query failed'.mysqli_error($conn));
					}
					
					

				while ($row = mysqli_fetch_assoc($situation_query)) {
					$situation_id = $row["situation_id"];
					$country = $row["country"];
					$month = $row["month"];
					$year = $row["year"];
					$narrative = mysqli_real_escape_string($conn,$row["keymessages"]);
					$country_sectors = $row["country_sectors"];
					$country_age = $row["country_age"];
					$pneed = number_format($row["people_in_need"]);
					$cneed = number_format($row["children_in_need"]);
					$pdisplaced = number_format($row["no_of_people_displaced"]);
					$ipeople = number_format($row["no_of_food_insecure_people"]);
					$wassistance = number_format($row["people_in_need_of_wash_assistance"]);
					$nassistance = number_format($row["people_in_need_of_nutrition_assistance"]);
					$hassistance = number_format($row["people_in_need_of_health_assistance"]);
					$eassistance = number_format($row["people_in_need_of_education_assistance"]);
					$pprotection = number_format($row["people_in_need_of_protection"]);
					$nfood = number_format($row["people_in_need_of_non_food_items"]);
					$pfassistance = number_format($row["people_in_need_of_food_assistance"]);
					$others = $row["others"];
					$response_for_sectors = $row["response_sectors"];
					$response_for_age = $row["response_age"];
					$rcreached = number_format($row["children_reached"]);
					$rpreached = number_format($row["people_reached"]);
					$rpdisplaced = number_format($row["response_no_of_people_displaced"]);
					$rfsecurity = number_format($row["food_security_and_livelihoods"]);
					$rwsh = number_format($row["water_sanitation_and_hygiene"]);
					$rnutrition = number_format($row["nutrition"]);
					$rhealth = number_format($row["health"]);
					$reducation = number_format($row["education"]);
					$rprotection = number_format($row["protection"]);
					$rsnfooditems = number_format($row["shelter_and_non_food_items"]);
					$rfassistance = number_format($row["food_assistance"]);
					$rothers = $row["r_others"];
					$funds_sectors = $row["funds_sectors"];
					$progfsl = number_format($row["prog_food_security_and_livelihoods"]);
					$progwsh = number_format($row["prog_water_sanitation_and_hygiene"]);
					$prognutrition = number_format($row["prog_nutrition"]);
					$proghealth = number_format($row["prog_health"]);
					$progeducation = number_format($row["prog_education"]);
					$progprotection = number_format($row["prog_protection"]);
					$funding_sectors = $row["funding_sectors"];
					$f_request1 = number_format($row["food_funding_request1"]);
					$f_request2 = number_format($row["food_funding_request2"]);
					$f_request3 = number_format($row["food_funding_request3"]);
					$w_request1 = number_format($row["wash_funding_request1"]);
					$w_request2 = number_format($row["wash_funding_request2"]);
					$w_request3 = number_format($row["wash_funding_request3"]);
					$h_request1 = number_format($row["health_funding_request1"]);
					$h_request2 = number_format($row["health_funding_request2"]);
					$h_request3 = number_format($row["health_funding_request3"]);
					$e_request1 = number_format($row["education_funding_request1"]);
					$e_request2 = number_format($row["education_funding_request2"]);
					$e_request3 = number_format($row["education_funding_request3"]);
					$s_request1 = number_format($row["shelter_funding_request1"]);
					$s_request2 = number_format($row["shelter_funding_request2"]);
					$s_request3 = number_format($row["shelter_funding_request3"]);
					$per_sector = mysqli_real_escape_string($conn,$row["per_sector"]);
					$needs_gaps = mysqli_real_escape_string($conn,$row["needs_and_gaps"]);
					$donors = mysqli_real_escape_string($conn,$row["donors_and_partners"]);
					$contact_info = mysqli_real_escape_string($conn,$row["primary_contact_information"]);
					
					

					echo "<tr>";
					echo "<td>{$situation_id}</td>";
					echo "<td>{$country}</td>";
					echo "<td>{$month}</td>";
					echo "<td>{$year}</td>";
					echo "<td><a type='button' class='btn btn-sm btn-primary' data-toggle='modal' data-target='#bd-example-modal-lg_".$counter."'>
  							  <span><i class='fa fa-eye'></i></span>
							  </a>


					<a class='btn btn-sm btn-warning' href='update_situation.php?editsituation={$situation_id}'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
                              <a class='btn btn-sm btn-danger delete_situation' data-situation-id=".$row['situation_id']." href='javascript:void(0)'><i class='fa fa-trash-o' aria-hidden='true'></i></td>";
					echo "</tr>";


					echo '<div class="modal fade" id="bd-example-modal-lg_'.$counter.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">';
					        echo "Beneficiary Id Number"." ".$situation_id;
					echo '</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">';

					      echo '<ul class="list-group">';


								echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Situation'.' -  '.$situation_id;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-light">';
								  echo 'Country'.' -  '.$country;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Month'.' -  '.$month;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Year'.' -  '.$year;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Key Messages'.' -  '.$narrative;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Country Sectors'.' -  '.$country_sectors;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Country Age'.' -  '.$country_age;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'People in need'.' -  '.$pneed;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Children in need'.' -  '.$cneed;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'No. of People displaced'.' -  '.$pdisplaced;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'No. of food insecure people'.' -  '.$ipeople;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'People in need of Wash assistance'.' -  '.$wassistance;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'People in need of Nutrition Assistance'.' -  '.$nassistance;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'People in need of Health assistance'.' -  '.$hassistance;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'People in need of education assistance'.' -  '.$eassistance;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'People in need of protection'.' -  '.$pprotection;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'People in need of Non-food items'.' -  '.$nfood;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'People in need of food assistance'.' -  '.$pfassistance;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Others(Specify)'.' -  '.$others;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Response Sector'.' -  '.$response_for_sectors;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Response Age'.' -  '.$response_for_age;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Response Children Reached'.' -  '.$rcreached;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Response People Reached'.' -  '.$rpreached;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Response No. of People displaced'.' -  '.$rpdisplaced;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Response Food Security and Livelihoods'.' -  '.$rfsecurity;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Response Water, Sanitation and Hygiene'.' -  '.$rwsh;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Response Nutrition'.' -  '.$rnutrition;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Response Health'.' -  '.$rhealth;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Response Education'.' -  '.$reducation;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Response Protection'.' -  '.$rprotection;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Response Shelter and Non-food Items'.' -  '.$rsnfooditems;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Response Food Assistance'.' -  '.$rfassistance;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Funding Others(Specify)'.' -  '.$rothers;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Funding Sectors'.' -  '.$funds_sectors;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Funding Food Security and Livelihood'.' -  '.$progfsl;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Funding Water, Sanitation and Hygiene'.' -  '.$progwsh;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Funding Nutrition'.' -  '.$prognutrition;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Funding Health'.' -  '.$proghealth;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Funding Health'.' -  '.$progeducation;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Funding Protection'.' -  '.$progprotection;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Funds Sectors'.' -  '.$funding_sectors;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Food security and Livelihoods Funding Requested 1'.' -  '.$f_request1;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Food security and Livelihoods Funding Requested 2'.' -  '.$f_request2;
								  echo '</li>';


								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Food security and Livelihoods Funding Requested 3'.' -  '.$f_request3;
								  echo '</li>';


								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Water, Sanitation and Hygiene Funding Requested 1'.' -  '.$w_request1;
								  echo '</li>';


								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Water, Sanitation and Hygiene Funding Requested 2'.' -  '.$w_request2;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Water, Sanitation and Hygiene Funding Requested 3'.' -  '.$w_request3;
								  echo '</li>';


								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Health Funding Requested 1'.' -  '.$h_request1;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Health Funding Requested 2'.' -  '.$h_request2;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Health Funding Requested 3'.' -  '.$h_request3;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Education Funding Requested 1'.' -  '.$e_request1;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Education Funding Requested 2'.' -  '.$e_request2;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Education Funding Requested 3'.' -  '.$e_request3;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Shelter and on-food items Funding Requested 1'.' -  '.$s_request1;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Shelter and on-food items Funding Requested 2'.' -  '.$s_request2;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Shelter and on-food items Funding Requested 3'.' -  '.$s_request3;
								  echo '</li>';


								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Per Sector Updates(400 words)'.' -  '.$per_sector;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Needs and Gaps(150 words)'.' -  '.$needs_gaps;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'List of donors and partners (150 words)'.' -  '.$donors;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Primary contact information'.' -  '.$contact_info;
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
                <th>Situation ID</th>
                <th>Country</th>
                <th>Month</th>
                <th>Year</th>
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
    //    $deletesr = $_GET['delete'];
    //    $query = "DELETE FROM situation_report WHERE situation_id = {$deletesr}";
    //    $deletesituation = mysqli_query($connection,$query);
    //    header("Location:viewsituation");
    //  } 
    ?>


<?php
include "pages/includes/footer.php";
?>