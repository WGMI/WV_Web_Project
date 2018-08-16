<?php

include 'core/init.php';
protect();
include "pages/includes/header.php";

if (isset($_POST['submit'])) {
	$country = $_POST["country"];
	$month = $_POST["month"];
	$year = $_POST["year"];
	$narrative = mysqli_real_escape_string($conn,$_POST["narrative"]);


	$country_sectors = $_POST["country_sectors"];
	$country_age = $_POST["age"];
	$pneed = $_POST["pneed"];
	$cneed = $_POST["cneed"];
	$pdisplaced = $_POST["pdisplaced"];
	$ipeople = $_POST["ipeople"];
	$wassistance = $_POST["wassistance"];
	$nassistance = $_POST["nassistance"];
	$hassistance = $_POST["hassistance"];
	$eassistance = $_POST["eassistance"];
	$pprotection = $_POST["pprotection"];
	$nfood = $_POST["nfood"];
	$pfassistance = $_POST["pfassistance"];
	$others = $_POST["others"];



	$response_for_sectors = $_POST["rselectors"];
	$response_for_age = $_POST["rage"];
	$rcreached = $_POST["rcreached"];
	$rpreached = $_POST["rpreached"];
	$rpdisplaced = $_POST["rpdisplaced"];
	$rfsecurity = $_POST["rfsecurity"];
	$rwsh = $_POST["rwsh"];
	$rnutrition = $_POST["rnutrition"];
	$rhealth = $_POST["rhealth"];
	$reducation = $_POST["reducation"];
	$rprotection = $_POST["rprotection"];
	$rsnfooditems = $_POST["rsnfooditems"];
	$rfassistance = $_POST["rfassistance"];
	$rothers = $_POST["rothers"];



	$funds_sectors = $_POST["funds_sectors"];
	$progfsl = $_POST["progfsl"];
	$progwsh = $_POST["progwsh"];
	$prognutrition = $_POST["prognutrition"];
	$proghealth = $_POST["proghealth"];
	$progeducation = $_POST["progeducation"];
	$progprotection = $_POST["progprotection"];



	$funding_sectors = $_POST["funding_sectors"];
	$f_request1 = $_POST["f_request1"];
	$f_request2 = $_POST["f_request2"];
	$f_request3 = $_POST["f_request3"];
	$w_request1 = $_POST["w_request1"];
	$w_request2 = $_POST["w_request2"];
	$w_request3 = $_POST["w_request3"];
	$h_request1 = $_POST["h_request1"];
	$h_request2 = $_POST["h_request2"];
	$h_request3 = $_POST["h_request3"];
	$e_request1 = $_POST["e_request1"];
	$e_request2 = $_POST["e_request2"];
	$e_request3 = $_POST["e_request3"];
	$s_request1 = $_POST["s_request1"];
	$s_request2 = $_POST["s_request2"];
	$s_request3 = $_POST["s_request3"];

	$per_sector = mysqli_real_escape_string($conn,$_POST["psector"]);


	$needs_gaps = mysqli_real_escape_string($conn,$_POST["needs_gaps"]);


	$donors = mysqli_real_escape_string($conn,$_POST["donors"]);


	$contact_info = mysqli_real_escape_string($conn,$_POST["contact_info"]);



	$query = "INSERT INTO `situation_report` (
	         `country`,`month`, `year`,`keymessages`,`country_sectors`,`country_age`,`children_in_need`,`people_in_need`,`no_of_people_displaced`, `no_of_food_insecure_people`,`people_in_need_of_wash_assistance`, `people_in_need_of_nutrition_assistance`, `people_in_need_of_health_assistance`, `people_in_need_of_education_assistance`, `people_in_need_of_protection`, `people_in_need_of_non_food_items`, `people_in_need_of_food_assistance`, `others`, `response_sectors`, `response_age`, `children_reached`, `people_reached`, `response_no_of_people_displaced`, `food_security_and_livelihoods`, `water_sanitation_and_hygiene`, `nutrition`, `health`, `education`, `protection`, `shelter_and_non_food_items`, `food_assistance`, `r_others`, `funds_sectors`, `prog_food_security_and_livelihoods`, `prog_water_sanitation_and_hygiene`, `prog_nutrition`, `prog_health`, `prog_education`, `prog_protection`, `funding_sectors`, `food_funding_request1`, `food_funding_request2`, `food_funding_request3`, `wash_funding_request1`, `wash_funding_request2`, `wash_funding_request3`, `health_funding_request1`, `health_funding_request2`, `health_funding_request3`, `education_funding_request1`, `education_funding_request2`, `education_funding_request3`, `shelter_funding_request1`, `shelter_funding_request2`, `shelter_funding_request3`, `per_sector`, `needs_and_gaps`, `donors_and_partners`, `primary_contact_information`) 
	VALUES ('$country','$month','$year','$narrative','$country_sectors','$country_age','$cneed', '$pneed','$pdisplaced', '$ipeople', '$wassistance', '$nassistance', '$hassistance', '$eassistance', '$pprotection', '$nfood', '$pfassistance', '$others', '$response_for_sectors', '$response_for_age', '$rcreached', '$rpreached', '$rpdisplaced', '$rfsecurity', '$rwsh', '$rnutrition', '$rhealth', '$reducation', '$rprotection', '$rsnfooditems', '$rfassistance', '$rothers', '$funds_sectors', '$progfsl', '$progwsh', '$prognutrition', '$proghealth', '$progeducation', '$progprotection','$funding_sectors', '$f_request1', '$f_request2', '$f_request3', '$w_request1', '$w_request2', '$w_request3', '$h_request1', '$h_request2', '$h_request3', '$e_request1', '$e_request2', '$e_request3', '$s_request1', '$s_request2', '$s_request3', '$per_sector', '$needs_gaps', '$donors', '$contact_info');";
	



	
	
	$situation_query = mysqli_query($conn,$query);

	if (!$situation_query) {
			die('query failed'.mysqli_error($conn));
	}else{
		header("Location:viewsituation.php?success=1");
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
							    <select class="form-control required select2 select2-hidden-accessible" name="country" id="country">
														<option disabled selected>Select Country</option>
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
							    <select class="form-control required select2 select2-hidden-accessible" name="month" id="month">
														<option value="" disabled selected>Select Reporting Month</option>
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
							    <select class="form-control required select2 select2-hidden-accessible" name="year" id="year">
							    <option value="" disabled selected>Select Year</option>
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
							 <textarea rows="3" name="narrative" id="narrative" class="form-control required form-control-line"></textarea>
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
		                      <select class="form-control select2 select2-hidden-accessible" name="country_sectors" id="country_sectors">
									<option value="" disabled selected>Select Sectors</option>
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
		                      <input type="number" min="0" class="form-control required" name="age" id="age" placeholder="Enter country humanitarian age">
		                    </div>
		                  </div>

		                  <div class="row">
		                    <div class="col-xs-4">
		                      <label class="situation_label">Children in need</label>
		                      <input type="number" min="0" class="form-control required" name="cneed" id="cneed" placeholder="Enter humanitarian children in need">
		                    </div>
		                    <div class="col-xs-4">
		                      <label class="situation_label">People in need</label> 
		                      <input type="number" min="0" class="form-control required" name="pneed" id="pneed" placeholder="Enter humanitarian people in need">
		                    </div>
		                    <div class="col-xs-4">
		                      <label class="situation_label">No. of People displaced</label>
		                      <input type="number" min="0" class="form-control required" name="pdisplaced" id="pdisplaced" placeholder="Enter No. of displaced people">
		                    </div>
		                  </div>

		                  <div class="row">
		                    <div class="col-xs-4">
		                      <label class="situation_label">No. of food insecure people</label>
		                      <input type="number" min="0" class="form-control required" name="ipeople" id="ipeople" placeholder="Enter No. of food insecure people">
		                    </div>
		                    <div class="col-xs-4">
		                      <label class="situation_label">People in need of Wash assistance</label> 
		                      <input type="number" min="0" class="form-control required" name="wassistance" id="wassistance" placeholder="Enter People in need of Wash assistance">
		                    </div>
		                    <div class="col-xs-4">
		                      <label class="situation_label">People in need of Nutrition Assistance</label>
		                      <input type="number" min="0" class="form-control required" name="nassistance" id="nassistance" placeholder="Enter people in need of nutrition assistance">
		                    </div>
		                  </div>

		                  <div class="row">
		                    <div class="col-xs-4">
		                      <label class="situation_label">People in need of Health assistance</label>
		                      <input type="number" min="0" class="form-control required" name="hassistance" id="hassistance" placeholder="Enter people in need of health assistance">
		                    </div>
		                    <div class="col-xs-4">
		                      <label class="situation_label">People in need of education assistance</label> 
		                      <input type="number" min="0" class="form-control required" name="eassistance" id="eassistance" placeholder="Enter people in need of education assistance">
		                    </div>
		                    <div class="col-xs-4">
		                      <label class="situation_label">People in need of protection</label>
		                      <input type="number" min="0" class="form-control required" name="pprotection" id="pprotection" placeholder="Enter people in need of protection">
		                    </div>
		                  </div>

		                  <div class="row">
		                    <div class="col-xs-4">
		                      <label class="situation_label">People in need of Non-food items</label>
		                      <input type="number" min="0" class="form-control required" name="nfood" id="nfood" placeholder="Enter people in need of Non-food items">
		                    </div>
		                    <div class="col-xs-4">
		                      <label class="situation_label">People in need of food assistance</label> 
		                      <input type="number" min="0" class="form-control required" name="pfassistance" id="pfassistance" placeholder="Enter people in need of food assistance">
		                    </div>
		                    <div class="col-xs-4">
		                      <label class="situation_label">Others(Specify)</label>
		                      <input type="text" class="form-control required" name="others" id="others" placeholder="Specify other factors">
		                    </div>
		                  </div>
			        </div>

			        

			        <div class="step">
			        	<h4><strong><u>Response Achievement</u></strong></h4>
				          <br>

			        		<div class="row">
		                    <div class="col-xs-6">
		                      <label class="situation_label">Select Sectors</label>
		                      <select class="form-control select2 select2-hidden-accessible" name="rselectors" id="rselectors">
									<option value="" disabled selected>Select Sectors</option>
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
		                      <input type="number" min="0" class="form-control required" name="rage" id="response_age" placeholder="Enter country humanitarian age">
		                    </div>
		                  </div>

		                  <div class="row">
		                    <div class="col-xs-4">
		                    	<div class="md-form">
			                      <label class="situation_label">Children Reached</label>
			                      <input type="number" min="0" class="form-control required" name="rcreached" id="rcreached" placeholder="Enter">
			                      </div>
			                    </div>
			                    <div class="col-xs-4">
			                    	<div class="md-form">
				                      <label class="situation_label">People Reached</label> 
				                      <input type="number" min="0" class="form-control required" name="rpreached" id="rpreached" placeholder="Enter">
				                      </div>
			                    </div>
			                    <div class="col-xs-4">
				                    <div class="md-form">
				                      <label class="situation_label">No. of People displaced</label>
				                      <input type="number" min="0" class="form-control required" name="rpdisplaced" id="rpdisplaced" placeholder="Enter">
				                      </div>
			                    </div>
			               </div>

		                  <div class="row">
		                    <div class="col-xs-4">
		                    	<div class="md-form">
		                      <label class="situation_label">Food Security and Livelihoods</label>
		                      <input type="number" min="0" class="form-control required" name="rfsecurity" id="rfsecurity" placeholder="Enter responce ">
		                      </div>
		                    </div>
		                    <div class="col-xs-4">
		                    	<div class="md-form">
		                      <label class="situation_label">Water, Sanitation and Hygiene</label> 
		                      <input type="number" min="0" class="form-control required" name="rwsh" id="rwsh" placeholder="Enter">
		                      </div>
		                    </div>
		                    <div class="col-xs-4">
		                    	<div class="md-form">
		                      <label class="situation_label">Nutrition</label>
		                      <input type="number" min="0" class="form-control required" name="rnutrition" id="rnutrition" placeholder="Enter ">
		                      </div>
		                    </div>
		                  </div>

		                  <div class="row">
		                    <div class="col-xs-4">
		                    	<div class="md-form">
		                      <label class="situation_label">Health</label>
		                      <input type="number" min="0" class="form-control required" name="rhealth" id="rhealth" placeholder="Enter">
		                      </div>
		                    </div>
		                    <div class="col-xs-4">
		                    	<div class="md-form">
		                      <label class="situation_label">Education</label> 
		                      <input type="number" min="0" class="form-control required" name="reducation" id="reducation" placeholder="Enter">
		                      </div>
		                    </div>
		                    <div class="col-xs-4">
		                    	<div class="md-form">
		                      <label class="situation_label">Protection</label>
		                      <input type="number" min="0" class="form-control required" name="rprotection" id="rprotection" placeholder="Enter">
		                      </div>
		                    </div>
		                  </div>

		                  <div class="row">
		                    <div class="col-xs-4">
		                    	<div class="md-form">
			                      <label class="situation_label">Shelter and Non-food Items</label>
			                      <input type="number" min="0" class="form-control required" name="rsnfooditems" id="rsnfooditems" placeholder="Enter">
			                    </div>
			                 </div>
			                    <div class="col-xs-4">
			                    	<div class="md-form">
			                      <label class="situation_label">Food Assistance</label> 
			                      <input type="number" min="0" class="form-control required" name="rfassistance" id="rfassistance" placeholder="Enter">
			                      </div>
			                    </div>
			                    <div class="col-xs-4">
			                    	<div class="md-form">
			                      <label class="situation_label">Others(Specify)</label>
			                      <input type="text" class="form-control required" name="rothers" id="rothers" placeholder="Enter">
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
		                      <select class="form-control required select2 select2-hidden-accessible" name="funds_sectors" id="funds_sectors">
									<option value="" disabled selected>Select Country</option>
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
		                      <input type="number" min="0" class="form-control required" name="progfsl" id="progfsl" placeholder="Enter food security and livelihood">
		                      </div>
		                    </div>
		                    <div class="col-xs-6">
		                    	<div class="md-form">
		                      <label class="situation_label">Water, Sanitation and Hygiene</label> 
		                      <input type="number" min="0" class="form-control required" name="progwsh" id="progwsh" placeholder="Enter programme water, sanitation and hygiene">
		                      </div>
		                    </div>
		                  </div>
		                  <div class="row">
		                  	<div class="col-xs-6">
		                    	<div class="md-form">
		                      <label class="situation_label">Nutrition</label>
		                      <input type="number" min="0" class="form-control required" name="prognutrition" id="prognutrition" placeholder="Enter programme nutrition">
		                      </div>
		                    </div>

		                    <div class="col-xs-6">
		                    	<div class="md-form">
		                      <label class="situation_label">Health</label>
		                      <input type="number" min="0" class="form-control required" name="proghealth" id="proghealth" placeholder="Enter programme health">
		                      </div>
		                    </div>

		                  </div>

		                  <div class="row">
		                    <div class="col-xs-6">
		                    	<div class="md-form">
		                      <label class="situation_label">Education</label> 
		                      <input type="number" min="0" class="form-control required" name="progeducation" id="progeducation" placeholder="Enter programme education">
		                      </div>
		                    </div>
		                    <div class="col-xs-6">
		                    	<div class="md-form">
		                      <label class="situation_label">Protection</label>
		                      <input type="number" min="0" class="form-control required" name="progprotection" id="progprotection" placeholder="Enter programme protection">
		                      </div>
		                    </div>
		                  </div>
			        </div>	


			        <div class="step">
			        	<div class="row">
		                    <div class="col-xs-8">
		                    	<div class="md-form">
		                      <label class="situation_label">Select Sectors</label>
		                       <select class="form-control required select2 select2-hidden-accessible" name="funding_sectors" id="funding_sectors">
									<option value="" disabled selected>Select Country</option>
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
							         <input type="text" class="form-control required" placeholder="Funding Requested" name="f_request1" id="f_request1"/>
							         <input type="text" class="form-control required" placeholder="Funding Requested" name="f_request2" id="f_request2"/>
							         <input type="text" class="form-control required" placeholder="Funding Requested" name="f_request3" id="f_request3"/>
							</div>
							</div>
							<br>
							<div class="row">
							<div class="form-inline">
							         <label class="col-sm-3 col-form-label" for="name">Water, Sanitation and Hygiene</label>
							         <input type="text" class="form-control required" placeholder="Funding Requested" name="w_request1" id="w_request1"/>
							         <input type="text" class="form-control required" placeholder="Funding Requested" name="w_request2" id="w_request2"/>
							         <input type="text" class="form-control required" placeholder="Funding Requested" name="w_request3" id="w_request3"/>
							</div>
							</div>
							<br>
							<div class="row">
								<div class="form-inline">
									
								         <label class="col-sm-3 col-form-label" for="name">Health</label>
								         <input type="text" class="form-control required" placeholder="Funding Requested" name="h_request1" id="h_request1"/>
								         <input type="text" class="form-control required" placeholder="Funding Requested" name="h_request2" id="h_request2"/>
								         <input type="text" class="form-control required" placeholder="Funding Requested" name="h_request3" id="h_request3"/>
									</div>
							</div>
							<br>

							<div class="row">
								<div class="form-inline">
									
								         <label class="col-sm-3 col-form-label" for="name">Education</label>
								         <input type="text" class="form-control required" placeholder="Funding Requested" name="e_request1" id="e_request1"/>
								         <input type="text" class="form-control required" placeholder="Funding Requested" name="e_request2" id="e_request2"/>
								         <input type="text" class="form-control required" placeholder="Funding Requested" name="e_request3" id="e_request3"/>
									</div>
							</div>
							<br>

							<div class="row">
								<div class="form-inline">
									
								         <label class="col-sm-3 col-form-label" for="name">Shelter and on-food items</label>
								         <input type="text" class="form-control required" placeholder="Funding Requested" name="s_request1" id="s_request1"/>
								         <input type="text" class="form-control required" placeholder="Funding Requested" name="s_request2" id="s_request2"/>
								         <input type="text" class="form-control required" placeholder="Funding Requested" name="s_request3" id="s_request3"/>
									</div>
							</div>
		              </div>

			        <div class="step">
			        	<div class="md-form">
							 <label class="situation_label" for="per_sector">Per Sector Updates(400 words)</label>
							 <textarea rows="3" name="psector" id="psector" class="form-control required form-control-line"></textarea>
						</div>

			        </div>	

			        <div class="step">
			        	<div class="md-form">
							 <label class="situation_label" for="needs_gaps">Needs and Gaps(150 words)</label>
							 <textarea rows="3" name="needs_gaps" id="needs_gaps" class="form-control required form-control-line"></textarea>
						</div>

			        </div>	

			        <div class="step">
			        	<div class="md-form">
							 <label class="situation_label" for="donors">List of donors and partners (150 words)</label>
							 <textarea rows="3" name="donors" id="donors" class="form-control required form-control-line"></textarea>
						</div>

			        </div>	
			        <div class="step">
			        	<div class="md-form">
							 <label class="situation_label" for="contact_info">Primary contact information</label>
							 <textarea rows="3" name="contact_info" id="contact_info" class="form-control required form-control-line"></textarea>
						</div>
			        </div>

			       <hr>



			        <div class="row">
							<div class="col-sm-12">
								<div class="pull-right">
									<button type="button" class="action btn-info btn-flat text-capitalize back btn">Back</button>
									<button type="button" class="action btn-warning btn-flat text-capitalize next btn">Next</button>
									<button type="submit" class="action btn-success btn-flat text-capitalize submit btn" name="submit">Submit</button>
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