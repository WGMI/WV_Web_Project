<?php
include "pages/includes/header.php";
$sitid = $_GET['editsituation'];
?>


<?php
$query = "SELECT * FROM `situation_report` WHERE `situation_id`";
$situation_select_query = mysqli_query($connection,$query);

				if (!$situation_select_query) {
							die('query failed'.mysqli_error($connection));
					}
				while ($row = mysqli_fetch_assoc($situation_select_query)) {
					$situation_id = $row["situation_id"];
					$country = $row["country"];
					$month = $row["month"];
					$year = $row["year"];
					$narrative = mysqli_real_escape_string($connection,$row["keymessages"]);
					$country_sectors = $row["country_sectors"];
					$country_age = $row["country_age"];
					$pneed = $row["people_in_need"];
					$cneed = $row["children_in_need"];
					$pdisplaced = $row["no_of_people_displaced"];
					$ipeople = $row["no_of_food_insecure_people"];
					$wassistance = $row["people_in_need_of_wash_assistance"];
					$nassistance = $row["people_in_need_of_nutrition_assistance"];
					$hassistance = $row["people_in_need_of_health_assistance"];
					$eassistance = $row["people_in_need_of_education_assistance"];
					$pprotection = $row["people_in_need_of_protection"];
					$nfood = $row["people_in_need_of_non_food_items"];
					$pfassistance = $row["people_in_need_of_food_assistance"];
					$others = $row["others"];
					$response_for_sectors = $row["response_sectors"];
					$response_for_age = $row["response_age"];
					$rcreached = $row["children_reached"];
					$rpreached = $row["people_reached"];
					$rpdisplaced = $row["response_no_of_people_displaced"];
					$rfsecurity = $row["food_security_and_livelihoods"];
					$rwsh = $row["water_sanitation_and_hygiene"];
					$rnutrition = $row["nutrition"];
					$rhealth = $row["health"];
					$reducation = $row["education"];
					$rprotection = $row["protection"];
					$rsnfooditems = $row["shelter_and_non_food_items"];
					$rfassistance = $row["food_assistance"];
					$rothers = $row["r_others"];
					$funds_sectors = $row["funds_sectors"];
					$progfsl = $row["prog_food_security_and_livelihoods"];
					$progwsh = $row["prog_water_sanitation_and_hygiene"];
					$prognutrition = $row["prog_nutrition"];
					$proghealth = $row["prog_health"];
					$progeducation = $row["prog_education"];
					$progprotection = $row["prog_protection"];
					$funding_sectors = $row["funding_sectors"];
					$f_request1 = $row["food_funding_request1"];
					$f_request2 = $row["food_funding_request2"];
					$f_request3 = $row["food_funding_request3"];
					$w_request1 = $row["wash_funding_request1"];
					$w_request2 = $row["wash_funding_request2"];
					$w_request3 = $row["wash_funding_request3"];
					$h_request1 = $row["health_funding_request1"];
					$h_request2 = $row["health_funding_request2"];
					$h_request3 = $row["health_funding_request3"];
					$e_request1 = $row["education_funding_request1"];
					$e_request2 = $row["education_funding_request2"];
					$e_request3 = $row["education_funding_request3"];
					$s_request1 = $row["shelter_funding_request1"];
					$s_request2 = $row["shelter_funding_request2"];
					$s_request3 = $row["shelter_funding_request3"];
					$per_sector = mysqli_real_escape_string($connection,$row["per_sector"]);
					$needs_gaps = mysqli_real_escape_string($connection,$row["needs_and_gaps"]);
					$donors = mysqli_real_escape_string($connection,$row["donors_and_partners"]);
					$contact_info = mysqli_real_escape_string($connection,$row["primary_contact_information"]);
				}
?>


<?php

if (isset($_POST['update_situation'])) {
					$update_country = $_POST["update_country"];
					$update_month = $_POST["update_month"];
					$update_year = $_POST["update_year"];
					$update_narrative = mysqli_real_escape_string($connection,$_POST["update_narrative"]);
					$update_country_sectors = $_POST["update_country_sectors"];
					$update_country_age = $_POST["update_country_age"];
					$update_pneed = $_POST["update_pneed"];
					$update_cneed = $_POST["update_cneed"];
					$update_pdisplaced = $_POST["update_pdisplaced"];
					$update_ipeople = $_POST["update_ipeople"];
					$update_wassistance = $_POST["update_wassistance"];
					$update_nassistance = $_POST["update_nassistance"];
					$update_hassistance = $_POST["update_hassistance"];
					$update_eassistance = $_POST["update_eassistance"];
					$update_pprotection = $_POST["update_pprotection"];
					$update_nfood = $_POST["update_nfood"];
					$update_pfassistance = $_POST["update_pfassistance"];
					$update_others = $_POST["update_others"];
					$update_response_for_sectors = $_POST["update_response_for_sectors"];
					$update_response_for_age = $_POST["update_response_for_age"];
					$update_rcreached = $_POST["update_rcreached"];
					$update_rpreached = $_POST["update_rpreached"];
					$update_rpdisplaced = $_POST["update_rpdisplaced"];
					$update_rfsecurity = $_POST["update_rfsecurity"];
					$update_rwsh = $_POST["update_rwsh"];
					$update_rnutrition = $_POST["update_rnutrition"];
					$update_rhealth = $_POST["update_rhealth"];
					$update_reducation = $_POST["update_reducation"];
					$update_rprotection = $_POST["update_rprotection"];
					$update_rsnfooditems = $_POST["update_rsnfooditems"];
					$update_rfassistance = $_POST["update_rfassistance"];
					$update_rothers = $_POST["update_rothers"];
					$update_funds_sectors = $_POST["update_funds_sectors"];
					$update_progfsl = $_POST["update_progfsl"];
					$update_progwsh = $_POST["update_progwsh"];
					$update_prognutrition = $_POST["update_prognutrition"];
					$update_proghealth = $_POST["update_proghealth"];
					$update_progeducation = $_POST["update_progeducation"];
					$update_progprotection = $_POST["update_progprotection"];
					$update_funding_sectors = $_POST["update_funding_sectors"];
					$update_f_request1 = $_POST["update_f_request1"];
					$update_f_request2 = $_POST["update_f_request2"];
					$update_f_request3 = $_POST["update_f_request3"];
					$update_w_request1 = $_POST["update_w_request1"];
					$update_w_request2 = $_POST["update_w_request2"];
					$update_w_request3 = $_POST["update_w_request3"];
					$update_h_request1 = $_POST["update_h_request1"];
					$update_h_request2 = $_POST["update_h_request2"];
					$update_h_request3 = $_POST["update_h_request3"];
					$update_e_request1 = $_POST["update_e_request1"];
					$update_e_request2 = $_POST["update_e_request2"];
					$update_e_request3 = $_POST["update_e_request3"];
					$update_s_request1 = $_POST["update_s_request1"];
					$update_s_request2 = $_POST["update_s_request2"];
					$update_s_request3 = $_POST["update_s_request3"];
					$update_per_sector = mysqli_real_escape_string($connection,$_POST["update_per_sector"]);
					$update_needs_gaps = mysqli_real_escape_string($connection,$_POST["update_needs_gaps"]);
					$update_donors = mysqli_real_escape_string($connection,$_POST["update_donors"]);
					$update_contact_info = mysqli_real_escape_string($connection,$_POST["update_contact_info"]);




				$query = "UPDATE situation_report SET
						  `country`='{$update_country}',
						  `month`='{$update_month}', 
						  `year`='{$update_year}',
						  `keymessages`='{$update_narrative}',
						  `country_sectors`='{$update_country_sectors}',
						  `country_age`={$update_country_age},
						  `children_in_need`={$update_cneed},
						  `people_in_need`={$update_pneed},
						  `no_of_people_displaced`={$update_pdisplaced}, 
						  `no_of_food_insecure_people`={$update_ipeople},
						  `people_in_need_of_wash_assistance`={$update_wassistance}, 
						  `people_in_need_of_nutrition_assistance`={$update_nassistance}, 
						  `people_in_need_of_health_assistance`={$update_hassistance}, 
						  `people_in_need_of_education_assistance`={$update_eassistance}, 
						  `people_in_need_of_protection`={$update_pprotection}, 
						  `people_in_need_of_non_food_items`={$update_nfood}, 
						  `people_in_need_of_food_assistance`={$update_pfassistance}, 
						  `others`='{$update_others}', 
						  `response_sectors`='{$update_response_for_sectors}', 
						  `response_age`={$update_response_for_age}, 
						  `children_reached`={$update_rcreached}, 
						  `people_reached`={$update_rpreached}, 
						  `response_no_of_people_displaced`={$update_rpdisplaced}, 
						  `food_security_and_livelihoods`={$update_rfsecurity}, 
						  `water_sanitation_and_hygiene`={$update_rwsh}, 
						  `nutrition`={$update_rnutrition}, 
						  `health`={$update_rhealth}, 
						  `education`={$update_reducation}, 
						  `protection`={$update_rprotection}, 
						  `shelter_and_non_food_items`={$update_rsnfooditems}, 
						  `food_assistance`={$update_rfassistance}, 
						  `r_others`='{$update_rothers}', 
						  `funds_sectors`='{$update_funds_sectors}', 
						  `prog_food_security_and_livelihoods`={$update_progfsl}, 
						  `prog_water_sanitation_and_hygiene`={$update_progwsh}, 
						  `prog_nutrition`={$update_prognutrition}, 
						  `prog_health`={$update_proghealth}, 
						  `prog_education`={$update_progeducation}, 
						  `prog_protection`={$update_progprotection}, 
						  `funding_sectors`='{$update_funding_sectors}', 
						  `food_funding_request1`={$update_f_request1}, 
						  `food_funding_request2`={$update_f_request2}, 
						  `food_funding_request3`={$update_f_request3}, 
						  `wash_funding_request1`={$update_w_request1}, 
						  `wash_funding_request2`={$update_w_request2}, 
						  `wash_funding_request3`={$update_w_request3}, 
						  `health_funding_request1`={$update_h_request1}, 
						  `health_funding_request2`={$update_h_request2}, 
						  `health_funding_request3`={$update_h_request3}, 
						  `education_funding_request1`={$update_e_request1}, 
						  `education_funding_request2`={$update_e_request2}, 
						  `education_funding_request3`={$update_e_request3}, 
						  `shelter_funding_request1`={$update_s_request1}, 
						  `shelter_funding_request2`={$update_s_request2}, 
						  `shelter_funding_request3`={$update_s_request3}, 
						  `per_sector`='{$update_per_sector}', 
						  `needs_and_gaps`='{$update_needs_gaps}', 
						  `donors_and_partners`='{$update_donors}', 
						  `primary_contact_information`='{$update_contact_info}'
						WHERE `situation_id` = $sitid";
						// echo $query;die();


						$update_situation = mysqli_query($connection,$query);
						if (!$update_situation) {
								die('query failed'.mysqli_error($connection));
						}else{
							header("Location:viewsituation?update=1");
						}



}


?>






<form class="form-horizontal form" method="post" role="form" id="myform">


              <div class="box box-warning">
                <div class="box-body">

                	<section class="content-header">
				          <h1>
				            Add Situation Report<br>
				          </h1>
				          <ol class="breadcrumb">
				            <li><a href="index"><i class="fa fa-dashboard"></i> Home</a></li>
				            <li class="active">Add Situation report</li>
				          </ol>
			        </section>
			         <hr>

			        <section class="content-button">
			        	<div class="pull-left">
								<a href="viewsituation" type="button" class="btn btn-warning btn-block btn-flat"><i class="fa fa-eye"></i> View Situation Report</a>
							</div>
			        </section>
			        <br>
			        <hr>

			        <div class="progress">
						<div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
					</div>


					<div class="step">
				          <h4><strong><u>Key Messages</u></strong></h4>
				          <hr>
				        <div class="row">
				        	<div class="col-xs-4">
					        	<div class="md-form">
								    <label class="situation_label">Country</label>
								    <select class="form-control required select2 select2-hidden-accessible" name="update_country" id="update_country">
															<option value="<?php echo $country ?>" selected><?php echo $country ?></option>
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
							</div>
							<div class="col-xs-4">
								 <div class="md-form">
								    <label class="situation_label">Reporting Month</label>
								    <select class="form-control required select2 select2-hidden-accessible" name="update_month" id="update_month">
															<option value="<?php echo $month ?>" selected><?php echo $month ?></option>
															<option value="January">January</option>
															<option value="February">February</option>
															<option value="March">March</option>
															<option value="April">April</option>
															<option value="May">May</option>
															<option value="June">June</option>
															<option value="July">July</option>
															<option value="August">August</option>
															<option value="September">September</option>
															<option value="October">October</option>
															<option value="November">November</option>
															<option value="December">December</option>
														</select>
								 </div>
							</div>
							<div class="col-xs-4">
								 <div class="md-form">
								    <label class="situation_label">Year</label>
								    <select class="form-control required select2 select2-hidden-accessible" name="update_year" id="update_year">
								    <option value="<?php echo $year ?>" selected><?php echo $year ?></option>
								    <?php
										$startdate = 2008;
										$enddate = date("Y");
										$years = range ($startdate,$enddate);
										foreach($years as $key => $value)
										{?>

											<option value="<?php echo $value ?>"><?php echo $value ?></option>
										<?php }
										?>
										</select>
								 </div>
							</div>
						</div>
						<div class="row">
							 <div class="col-sm-12">
								<div class="md-form">
								 <label class="situation_label" for="Narrative">Key Messages</label>
								 <textarea rows="3" name="update_narrative" id="update_narrative" class="form-control required form-control-line"><?php echo $narrative ?></textarea>
								</div>
							</div>
						</div>
			        </div>


			        <div class="step">
			        	<h4><strong><u>Country Humanitarian needs</u></strong></h4>
				          <br>
			        	<div class="row">
		                    <div class="col-xs-6">
		                      <label class="situation_label">Select Sectors</label>
		                      <select class="form-control select2 select2-hidden-accessible" name="update_country_sectors" id="update_country_sectors">
									<option value="<?php echo $country_sectors ?>" selected><?php echo $country_sectors ?></option>
									<option value="Education">Education</option>
									<option value="Food Security and Livelihoods"> Food Security and Livelihoods</option>
									<option value="Health">Health</option>
									<option value="Nutrition">Nutrition</option>
									<option value="Protection">Protection</option>
									<option value="Shelter and Non-Food Items">Shelter and Non-Food Items</option>
									<option value="WASH">WASH</option>
								</select>
		                    </div>
		                    <div class="col-xs-6">
		                      <label class="situation_label">Age</label> 
		                      <input type="number" min="0" class="form-control required" name="update_country_age" value="<?php echo $country_age ?>" id="update_country_age" placeholder="Update country humanitarian age">
		                    </div>
		                  </div>

		                  <div class="row">
		                    <div class="col-xs-4">
		                      <label class="situation_label">Children in need</label>
		                      <input type="number" min="0" class="form-control required" name="update_cneed" id="update_cneed" value="<?php echo $cneed ?>" placeholder="Update humanitarian children in need">
		                    </div>
		                    <div class="col-xs-4">
		                      <label class="situation_label">People in need</label> 
		                      <input type="number" min="0" class="form-control required" name="update_pneed" id="update_pneed" value="<?php echo $pneed ?>" placeholder="Update humanitarian people in need">
		                    </div>
		                    <div class="col-xs-4">
		                      <label class="situation_label">No. of People displaced</label>
		                      <input type="number" min="0" class="form-control required" name="update_pdisplaced" id="update_pdisplaced" value="<?php echo $pdisplaced ?>" placeholder="Update No. of displaced people">
		                    </div>
		                  </div>

		                  <div class="row">
		                    <div class="col-xs-4">
		                      <label class="situation_label">No. of food insecure people</label>
		                      <input type="number" min="0" class="form-control required" name="update_ipeople" id="update_ipeople" value="<?php echo $ipeople ?>" placeholder="Update No. of food insecure people">
		                    </div>
		                    <div class="col-xs-4">
		                      <label class="situation_label">People in need of Wash assistance</label> 
		                      <input type="number" min="0" class="form-control required" name="update_wassistance" id="update_wassistance" value="<?php echo $wassistance ?>" placeholder="Update People in need of Wash assistance">
		                    </div>
		                    <div class="col-xs-4">
		                      <label class="situation_label">People in need of Nutrition Assistance</label>
		                      <input type="number" min="0" class="form-control required" name="update_nassistance" id="update_nassistance" value="<?php echo $nassistance ?>" placeholder="Update people in need of nutrition assistance">
		                    </div>
		                  </div>

		                  <div class="row">
		                    <div class="col-xs-4">
		                      <label class="situation_label">People in need of Health assistance</label>
		                      <input type="number" min="0" class="form-control required" name="update_hassistance" id="update_hassistance" value="<?php echo $hassistance ?>" placeholder="Update people in need of health assistance">
		                    </div>
		                    <div class="col-xs-4">
		                      <label class="situation_label">People in need of education assistance</label> 
		                      <input type="number" min="0" class="form-control required" name="update_eassistance" id="update_eassistance" value="<?php echo $eassistance ?>" placeholder="Update people in need of education assistance">
		                    </div>
		                    <div class="col-xs-4">
		                      <label class="situation_label">People in need of protection</label>
		                      <input type="number" min="0" class="form-control required" name="update_pprotection" id="update_pprotection"  value="<?php echo $pprotection ?>" placeholder="Update people in need of protection">
		                    </div>
		                  </div>

		                  <div class="row">
		                    <div class="col-xs-4">
		                      <label class="situation_label">People in need of Non-food items</label>
		                      <input type="number" min="0" class="form-control required" name="update_nfood" id="update_nfood" value="<?php echo $nfood ?>" placeholder="Update people in need of Non-food items">
		                    </div>
		                    <div class="col-xs-4">
		                      <label class="situation_label">People in need of food assistance</label> 
		                      <input type="number" min="0" class="form-control required" name="update_pfassistance" id="update_pfassistance" value="<?php echo $pfassistance ?>" placeholder="Update people in need of food assistance">
		                    </div>
		                    <div class="col-xs-4">
		                      <label class="situation_label">Others(Specify)</label>
		                      <input type="text" class="form-control required" name="update_others" id="update_others" value="<?php echo $others ?>" placeholder="Specify other factors">
		                    </div>
		                  </div>
			        </div>

			        

			        <div class="step">
			        	<h4><strong><u>Response Achievement</u></strong></h4>
				          <br>

			        		<div class="row">
		                    <div class="col-xs-6">
		                      <label class="situation_label">Select Sectors</label>
		                      <select class="form-control select2 select2-hidden-accessible" name="update_response_for_sectors" id="update_response_for_sectors">
									<option value="<?php echo $response_for_sectors ?>" selected><?php echo $response_for_sectors ?></option>
									<option value="Education">Education</option>
									<option value="Food Security and Livelihoods"> Food Security and Livelihoods</option>
									<option value="Health">Health</option>
									<option value="Nutrition">Nutrition</option>
									<option value="Protection">Protection</option>
									<option value="Shelter and Non-Food Items">Shelter and Non-Food Items</option>
									<option value="WASH">WASH</option>
								</select>
		                    </div>
		                    <div class="col-xs-6">
		                      <label class="situation_label">Age</label> 
		                      <input type="number" min="0" class="form-control required" name="update_response_for_age" id="update_response_for_age" value="<?php echo $response_for_age ?>" placeholder="Update country humanitarian age">
		                    </div>
		                  </div>

		                  <div class="row">
		                    <div class="col-xs-4">
		                    	<div class="md-form">
			                      <label class="situation_label">Children Reached</label>
			                      <input type="number" min="0" class="form-control required" name="update_rcreached" id="update_rcreached" value="<?php echo $rcreached ?>" placeholder="Update Children Reached">
			                      </div>
			                    </div>
			                    <div class="col-xs-4">
			                    	<div class="md-form">
				                      <label class="situation_label">People Reached</label> 
				                      <input type="number" min="0" class="form-control required" name="update_rpreached" id="update_rpreached" value="<?php echo $rpreached ?>" placeholder="Update People Reached">
				                      </div>
			                    </div>
			                    <div class="col-xs-4">
				                    <div class="md-form">
				                      <label class="situation_label">No. of People displaced</label>
				                      <input type="number" min="0" class="form-control required" name="update_rpdisplaced" id="update_rpdisplaced" value="<?php echo $rpdisplaced ?>" placeholder="Update No. of People displaced">
				                      </div>
			                    </div>
			               </div>

		                  <div class="row">
		                    <div class="col-xs-4">
		                    	<div class="md-form">
		                      <label class="situation_label">Food Security and Livelihoods</label>
		                      <input type="number" min="0" class="form-control required" name="update_rfsecurity" id="update_rfsecurity" value="<?php echo $rfsecurity ?>" placeholder="Update Food Security and Livelihoods ">
		                      </div>
		                    </div>
		                    <div class="col-xs-4">
		                    	<div class="md-form">
		                      <label class="situation_label">Water, Sanitation and Hygiene</label> 
		                      <input type="number" min="0" class="form-control required" name="update_rwsh" id="update_rwsh" value="<?php echo $rwsh ?>" placeholder="Update Water, Sanitation and Hygiene">
		                      </div>
		                    </div>
		                    <div class="col-xs-4">
		                    	<div class="md-form">
		                      <label class="situation_label">Nutrition</label>
		                      <input type="number" min="0" class="form-control required" name="update_rnutrition" id="update_rnutrition" value="<?php echo $rnutrition ?>" placeholder="Update Nutrition">
		                      </div>
		                    </div>
		                  </div>

		                  <div class="row">
		                    <div class="col-xs-4">
		                    	<div class="md-form">
		                      <label class="situation_label">Health</label>
		                      <input type="number" min="0" class="form-control required" name="update_rhealth" id="update_rhealth" value="<?php echo $rhealth ?>" placeholder="Update Health">
		                      </div>
		                    </div>
		                    <div class="col-xs-4">
		                    	<div class="md-form">
		                      <label class="situation_label">Education</label> 
		                      <input type="number" min="0" class="form-control required" name="update_reducation" id="update_reducation" value="<?php echo $reducation ?>" placeholder="Update Education">
		                      </div>
		                    </div>
		                    <div class="col-xs-4">
		                    	<div class="md-form">
		                      <label class="situation_label">Protection</label>
		                      <input type="number" min="0" class="form-control required" name="update_rprotection" id="update_rprotection" value="<?php echo $rprotection ?>" placeholder="Update Protection">
		                      </div>
		                    </div>
		                  </div>

		                  <div class="row">
		                    <div class="col-xs-4">
		                    	<div class="md-form">
			                      <label class="situation_label">Shelter and Non-food Items</label>
			                      <input type="number" min="0" class="form-control required" name="update_rsnfooditems" id="update_rsnfooditems" value="<?php echo $rsnfooditems ?>" placeholder="Update Shelter and Non-food Items">
			                    </div>
			                 </div>
			                    <div class="col-xs-4">
			                    	<div class="md-form">
			                      <label class="situation_label">Food Assistance</label> 
			                      <input type="number" min="0" class="form-control required" name="update_rfassistance" id="update_rfassistance" value="<?php echo $rfassistance ?>" placeholder="Update Food Assistance">
			                      </div>
			                    </div>
			                    <div class="col-xs-4">
			                    	<div class="md-form">
			                      <label class="situation_label">Others(Specify)</label>
			                      <input type="text" class="form-control required" name="update_rothers" id="update_rothers" value="<?php echo $rothers ?>" placeholder="Specify Others">
			                      </div>
			                    </div>
			                  </div>
			        </div>


			        <div class="step">
			        	<h4><strong><u>Funding Status</u></strong></h4>
				          <br>
			        	<div class="row">
		                    <div class="col-xs-12">
		                    	<div class="md-form">
		                      <label class="situation_label">Select Sectors</label>
		                      <select class="form-control required select2 select2-hidden-accessible" name="update_funds_sectors" id="update_funds_sectors">
									<option value="<?php echo $funds_sectors ?>" selected><?php echo $funds_sectors ?></option>
									<option value="Education">Education</option>
									<option value="Food Security and Livelihoods"> Food Security and Livelihoods</option>
									<option value="Health">Health</option>
									<option value="Nutrition">Nutrition</option>
									<option value="Protection">Protection</option>
									<option value="Shelter and Non-Food Items">Shelter and Non-Food Items</option>
									<option value="WASH">WASH</option>
								</select>
		                    </div>
		                  </div>
		                  </div>

		                  <div class="row">
		                    <div class="col-xs-6">
		                    	<div class="md-form">
		                      <label class="situation_label">Food Security and Livelihood</label>
		                      <input type="number" min="0" class="form-control required" name="update_progfsl" id="update_progfsl" value="<?php echo $progfsl ?>" placeholder="Update food security and livelihood">
		                      </div>
		                    </div>
		                    <div class="col-xs-6">
		                    	<div class="md-form">
		                      <label class="situation_label">Water, Sanitation and Hygiene</label> 
		                      <input type="number" min="0" class="form-control required" name="update_progwsh" id="update_progwsh" value="<?php echo $progwsh ?>" placeholder="Update programme water, sanitation and hygiene">
		                      </div>
		                    </div>
		                  </div>
		                  <div class="row">
		                  	<div class="col-xs-6">
		                    	<div class="md-form">
		                      <label class="situation_label">Nutrition</label>
		                      <input type="number" min="0" class="form-control required" name="update_prognutrition" id="update_prognutrition" value="<?php echo $prognutrition ?>" placeholder="Update programme nutrition">
		                      </div>
		                    </div>

		                    <div class="col-xs-6">
		                    	<div class="md-form">
		                      <label class="situation_label">Health</label>
		                      <input type="number" min="0" class="form-control required" name="update_proghealth" id="update_proghealth" value="<?php echo $proghealth ?>" placeholder="Update programme health">
		                      </div>
		                    </div>

		                  </div>

		                  <div class="row">
		                    <div class="col-xs-6">
		                    	<div class="md-form">
		                      <label class="situation_label">Education</label> 
		                      <input type="number" min="0" class="form-control required" name="update_progeducation" id="update_progeducation" value="<?php echo $progeducation ?>" placeholder="Update programme education">
		                      </div>
		                    </div>
		                    <div class="col-xs-6">
		                    	<div class="md-form">
		                      <label class="situation_label">Protection</label>
		                      <input type="number" min="0" class="form-control required" name="update_progprotection" id="update_progprotection" value="<?php echo $progprotection ?>" placeholder="Update programme protection">
		                      </div>
		                    </div>
		                  </div>
			        </div>	


			        <div class="step">
			        	<div class="row">
		                    <div class="col-xs-12">
		                    	<div class="md-form">
		                      <label class="situation_label">Select Sectors</label>
		                       <select class="form-control required select2 select2-hidden-accessible" name="update_funding_sectors" id="update_funding_sectors">
									<option value="<?php echo $funding_sectors ?>" selected><?php echo $funding_sectors ?></option>
									<option value="Education">Education</option>
									<option value="Food Security and Livelihoods"> Food Security and Livelihoods</option>
									<option value="Health">Health</option>
									<option value="Nutrition">Nutrition</option>
									<option value="Protection">Protection</option>
									<option value="Shelter and Non-Food Items">Shelter and Non-Food Items</option>
									<option value="WASH">WASH</option>
								</select>
		                    </div>
		                  </div>
		                  </div>
		                  <br>

		                  	<div class="row">
								<div class="form-inline">
							         <label class="col-sm-3 col-form-label" for="name">Food security and Livelihoods</label>
							         <input type="text" class="form-control required" placeholder="Funding Requested" value="<?php echo $f_request1 ?>" name="update_f_request1" id="update_f_request1"/>
							         <input type="text" class="form-control required" placeholder="Funding Requested" value="<?php echo $f_request2 ?>" name="update_f_request2" id="update_f_request2"/>
							         <input type="text" class="form-control required" placeholder="Funding Requested" value="<?php echo $f_request3 ?>" name="update_f_request3" id="update_f_request3"/>
								</div>
							</div>
							<br>
							<div class="row">
							<div class="form-inline">
							         <label class="col-sm-3 col-form-label" for="name">Water, Sanitation and Hygiene</label>
							         <input type="text" class="form-control required" placeholder="Funding Requested" value="<?php echo $w_request1 ?>" name="update_w_request1" id="update_w_request1"/>
							         <input type="text" class="form-control required" placeholder="Funding Requested" value="<?php echo $w_request2 ?>" name="update_w_request2" id="update_w_request2"/>
							         <input type="text" class="form-control required" placeholder="Funding Requested" value="<?php echo $w_request3 ?>" name="update_w_request3" id="update_w_request3"/>
							</div>
							</div>
							<br>
							<div class="row">
								<div class="form-inline">
									
								         <label class="col-sm-3 col-form-label" for="name">Health</label>
								         <input type="text" class="form-control required" placeholder="Funding Requested" value="<?php echo $h_request1 ?>" name="update_h_request1" id="update_h_request1"/>
								         <input type="text" class="form-control required" placeholder="Funding Requested" value="<?php echo $h_request2 ?>" name="update_h_request2" id="update_h_request2"/>
								         <input type="text" class="form-control required" placeholder="Funding Requested" value="<?php echo $h_request3 ?>" name="update_h_request3" id="update_h_request3"/>
									</div>
							</div>
							<br>

							<div class="row">
								<div class="form-inline">
									
								         <label class="col-sm-3 col-form-label" for="name">Education</label>
								         <input type="text" class="form-control required" placeholder="Funding Requested" value="<?php echo $e_request1 ?>" name="update_e_request1" id="update_e_request1"/>
								         <input type="text" class="form-control required" placeholder="Funding Requested" value="<?php echo $e_request2 ?>" name="update_e_request2" id="update_e_request2"/>
								         <input type="text" class="form-control required" placeholder="Funding Requested" value="<?php echo $w_request1 ?>" name="update_e_request3" id="update_e_request3"/>
									</div>
							</div>
							<br>

							<div class="row">
								<div class="form-inline">
									
								         <label class="col-sm-3 col-form-label" for="name">Shelter and on-food items</label>
								         <input type="text" class="form-control required" placeholder="Funding Requested" value="<?php echo $s_request1 ?>" name="update_s_request1" id="update_s_request1"/>
								         <input type="text" class="form-control required" placeholder="Funding Requested" value="<?php echo $s_request2 ?>" name="update_s_request2" id="update_s_request2"/>
								         <input type="text" class="form-control required" placeholder="Funding Requested" value="<?php echo $s_request3 ?>" name="update_s_request3" id="update_s_request3"/>
									</div>
							</div>
		              </div>

			        <div class="step">
			        	<div class="md-form">
							 <label class="situation_label" for="per_sector">Per Sector Updates(400 words)</label>
							 <textarea rows="3" name="update_per_sector" id="update_per_sector" class="form-control required form-control-line"><?php echo $per_sector ?></textarea>
						</div>
			        </div>	

			        <div class="step">
			        	<div class="md-form">
							 <label class="situation_label" for="needs_gaps">Needs and Gaps(150 words)</label>
							 <textarea rows="3" name="update_needs_gaps" id="update_needs_gaps" class="form-control required form-control-line"><?php echo $needs_gaps ?></textarea>
						</div>
			        </div>	

			        <div class="step">
			        	<div class="md-form">
							 <label class="situation_label" for="donors">List of donors and partners (150 words)</label>
							 <textarea rows="3" name="update_donors" id="update_donors" class="form-control required form-control-line"><?php echo $donors ?></textarea>
						</div>
			        </div>	

			        <div class="step">
			        	<div class="md-form">
							 <label class="situation_label" for="contact_info">Primary contact information</label>
							 <textarea rows="3" name="update_contact_info" id="update_contact_info" class="form-control required form-control-line"><?php echo $contact_info ?></textarea>
						</div>
			        </div>

			       <hr>



			        <div class="row">
							<div class="col-sm-12">
								<div class="pull-right">
									<button type="button" class="action btn-info btn-flat text-capitalize back btn">Back</button>
									<button type="button" class="action btn-warning btn-flat text-capitalize next btn">Next</button>
									<button type="submit" class="action btn-success btn-flat text-capitalize submit btn" name="update_situation">Submit</button>
								</div>
							</div>
					</div>




                </div><!-- /.box-body -->
              </div><!-- /.box -->





            





                </div><!-- /.box-body -->
              </div><!-- /.box -->
          </form>








<?php
include "pages/includes/footer.php";
?>
