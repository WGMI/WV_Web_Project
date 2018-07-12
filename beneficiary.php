<?php 
include 'core/init.php';
include 'includes/header.php';
?>	
			
<?php
$timezones = DateTimeZone::listIdentifiers(DateTimeZone::AFRICA);
$region = array('Northern Africa', 'Eastern Africa', 'Central Africa', 'Western Africa', 'Southern Africa');
?>

<?php

if (isset($_POST["submit"])) {
	$region = $_POST["region"];
	$country = $_POST["country"];
	$date = $_POST["date"];
	$people = $_POST["people"];
	$foodsecurity = $_POST["foodsecurity"];
	$food_assistance = $_POST["food_assistance"];
	$nutritiontype = $_POST["nutritiontype"];
	$educationpro = $_POST["educationpro"];
	$education = $_POST["education"];

	$query = "INSERT INTO beneficiaries(region,country,cat_people,due_date,food_security,food_assistance,nutrition,edu_protection,education) 
						  VALUES('{$region}','{$country}','{$date}','{$people}','{$foodsecurity}','{$food_assistance}','{$nutritiontype}','{$educationpro}','{$education}')";
   	$benefits = mysqli_query($connection,$query);
	if (!$benefits) {
			die('query failed'.mysqli_error($connection));
	}


}




?>

							<h3 class="panel-title">Beneficiaries Page</h3>
						</div>
						<div class="panel-body">
							<hr>
						<br><br>
						<div class="col-md-8 col-md-offset-2">
							<div class="progress">
								<div class="progress-bar progress-bar-primary progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
								</div>

							<div class="panel panel-primary">
										  <div class="panel-heading">
										    <h3 class="panel-title">Add Beneficiary</h3>
										  </div>
										  <div class="panel-body">
							<form class="form-horizontal form" method="post">
								<div class="col-md-8 col-md-offset-2">    
								

								<div class="box row-fluid"> 
								<br>
								<div class="step">
											<div class="form-group">
												    <label for="Region">Region</label>
												    <select class="form-control form-control-default" name="region" id="region">
												    	<option value="volvo" disabled selected>Choose region</option>
												    	<?php

														foreach($region as $key => $value) {

														?>

														<option value="<?= $key ?>" title="<?= htmlspecialchars($value) ?>"><?= htmlspecialchars($value) ?></option>
														<?php

														}

													?>
												</select>
											</div>

											<div class="form-group">
												    <label for="Country">Country</label>
												    <select class="form-control" name="country" id="country">
														<option value="" disabled selected>Select Country</option>
														<option value="India">India</option>
														<option value="Australia">Australia</option>
														<option value="USA">USA</option>
														<option value="Japan">Japan</option>
														<option value="Singapore">Singapore</option>
														<option value="Malaysia">Malaysia</option>
													</select>
											</div>
										    <div class="form-group">
												    <label for="Category" >Category of people</label>
												    <select class="form-control" name="people" id="people">
														<option value="" disabled selected>Choose Category</option>
														<option value="India">India</option>
														<option value="Australia">Australia</option>
														<option value="USA">USA</option>
														<option value="Japan">Japan</option>
														<option value="Singapore">Singapore</option>
														<option value="Malaysia">Malaysia</option>
													</select>
											</div>
											<div class="form-group">
												    <label for="Time">Time Due</label>
												     <!-- Date input -->
												        <label class="control-label" for="date">Date</label>
												        <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text"/>
									</div>
								</div>
									<div class="step">
										  <div class="panel-body">
												<div class="form-group">
												    <label for="Security">Food Security</label>
													<input type="text" class="form-control required" name="foodsecurity" id="foodsecurity" placeholder="Food Security">
												</div>
												<div class="form-group">
												    <label for="test">Test Item</label>
													<input type="text" class="form-control required" name="test" id="test" placeholder="Test">
												</div>
												<div class="form-group">
													<label for="Assistance">Food Assistance</label>
													<input type="text" class="form-control required" id="food_assistance" name="food_assistance" placeholder="Food Assistance">
												</div>
												<div class="form-group">
													<label for="Nutrition">Nutrition</label>
													<input type="text" class="form-control required" name="nutritiontype" id="nutritiontype" placeholder="Nutrition">
												</div> 
										  </div>   
										</div> 
									</div>

									<div class="step">
												<div class="form-group">
													<label for="Protection">Education and Protection</label>
													<input type="text" class="form-control required" name="educationpro" id="educationpro">
												</div>
												<div class="form-group">
													<label for="Education">Education</label>
													<input type="text" class="form-control required" name="education" id="education">
										</div>
									</div>

								<div class="step display">
									<div class="jumbotron">
								<h4>Confirm Details</h4>
								<div class="form-group">
								<label class="col-sm-2 control-label">Region :</label>
								<label class="col-md-10 control-label lbl" data-id="region"></label>
								</div>
								<div class="form-group">
								<label class="col-sm-2 control-label">Country :</label>
								<label class="col-md-10 control-label lbl" data-id="country"></label>
								</div>
								<div class="form-group">
								<label class="col-sm-2 control-label">People :</label>
								<label class="col-md-10 control-label lbl" data-id="people"></label>
								</div>
								<div class="form-group">
								<label class="col-sm-2 control-label">Period :</label>
								<label class="col-md-10 control-label lbl" data-id="date"></label>
								</div>
								<div class="form-group">
								<label class="col-sm-2 control-label">Food :</label>
								<label class="col-md-10 control-label lbl" data-id="foodsecurity"></label>
								</div>
								<div class="form-group">
								<label class="col-sm-2 control-label">Food Assistance :</label>
								<label class="col-md-10 control-label lbl" data-id="food_assistance"></label>
								</div>
								<div class="form-group">
								<label class="col-sm-2 control-label">Nutrition :</label>
								<label class="col-md-10 control-label lbl" data-id="nutritiontype"></label>
								</div>    
								<div class="form-group">
								<label class="col-sm-2 control-label">Education and Protection :</label>
								<label class="col-md-10 control-label lbl" data-id="educationpro"></label>
								</div>
								<div class="form-group">
								<label class="col-sm-2 control-label">Education :</label>
								<label class="col-md-10 control-label lbl" data-id="education"></label>
								</div>
								</div>
								</div>

								<div class="row">
								<div class="col-sm-12">
								<div class="pull-right">
								<button type="button" class="action btn-info text-capitalize back btn">Back</button>
								<button type="button" class="action btn-primary text-capitalize next btn">Next</button>
								<button type="submit" class="action btn-success text-capitalize submit btn" name="submit">Submit</button>
								</div>
								</div>
								</div>   

								</div>
								</div>
						</form>
						</div>
						</div>
					</div>



						
<?php 
include 'includes/footer.php';
?>		