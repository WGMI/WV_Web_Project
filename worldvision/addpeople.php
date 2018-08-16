<?php

include 'core/init.php';
protect();//Logged in users only 
include 'pages/includes/header.php';

$region4 = array('Eastern Africa');

if (isset($_POST['addpeople'])) {
	$region=$_POST['region'];
	$country=$_POST['country'];
	$period=$_POST['add-date'];
	$category_of_people=$_POST['category_of_people'];
	$people_in_need=$_POST['people_in_need'];
	//Time is input in MM/YYYY format. The /1/ is appended to make it MM/DD/YYYY
	$timestamp = strtotime(substr($period,0,2).'/1/'.substr($period,3));
	$sqldate = date('Y-m-d H:i:s',$timestamp);
	
	$user_id = $user_data['id'];

	$query = "INSERT INTO people(
			  region,
			  country,
			  period,
			  category_of_people,
			  people_in_need,
			  user_id)
			  VALUES(
			  	'{$region}',
				'{$country}',
				'{$sqldate}',
				'{$category_of_people}',
				{$people_in_need},
				$user_id)";
	$people_result = mysqli_query($conn,$query);
	if(!$people_result){
		die("query failed".mysqli_error($conn));
	}else{
		 header("Location:viewpeople.php?success=1");
	}
}

?>





<div class="row">
            <!-- left column -->
        <div class="col-md-10 col-md-offset-1">

			<div class="box box-warning">                
				<div class="box-body">
					<section class="content-header">
				          <h1>
				             Add People in Need Data<br>
				          </h1>
				          <ol class="breadcrumb">
				            <li><a href="index"><i class="fa fa-dashboard"></i> Home</a></li>
				            <li><a href="active">Add People in need</a></li>
				          </ol>
			        </section>
			        <hr>
			         

			        <section class="content-button">
			        	<div class="pull-left">
								<a href="viewpeople.php" type="button" class="btn btn-warning btn-block btn-flat"><i class="fa fa-eye"></i> View People in need</a>
							</div>
			        </section>
			        <br>
			        <hr>

					<form class="form-horizontal form" method="post" role="form">
                  		<div class="box-body">

                  							<div class="form-group">
												    <label for="Region">Region</label>
												    <select class="form-control select2 select2-hidden-accessible" name="region" id="region">
												    	<option value="volvo" disabled selected>Choose region</option>
												    	<?php

														foreach($region4 as $key => $value) {

														?>

														<option value="<?= $value ?>" title="<?= htmlspecialchars($value) ?>"><?= htmlspecialchars($value) ?></option>
														<?php

														}

													?>
												</select>
											</div>

											<div class="form-group">
												    <label for="Country">Country</label>
												    <select class="form-control select2 select2-hidden-accessible required" name="country" id="country">
														<option value="" disabled selected>Select Country</option>
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

											<div class="form-group">
								                <label>Period</label>
											            <div class="input-group date">
											                <input type="text" class="form-control required" id="add-date" name="add-date"  placeholder="Select date">
											                <div class="input-group-addon">
											                    <span class="glyphicon glyphicon-th"></span>
											                </div>
											            </div>
									        </div>

											<div class="form-group">
												    <label for="Country">Category of people</label>
												    <select class="form-control select3 select3-hidden-accessible required" name="category_of_people" id="category_of_people">
														<option value="" disabled selected>Category of People</option>
														<option value="Number of people in need of safe drinking water">Number of people in need of safe drinking water</option>
														<option value="Number of people in emergency phase (IPC 4)">Number of people in emergency phase (IPC 4)</option>
														<option value="Number of children requiring education support">Number of children requiring education support</option>
														<option value="Number of people require protection">Number of people require protection</option>
														<option value="Number of AWD/ Cholera">Number of AWD/ Cholera</option>
														<option value="Number of people in need of assistance">Number of people in need of assistance</option>
														<option value="Number of children in need of assistance">Number of children in need of assistance</option>
														<option value="Number of children under age 5 malnourished">Number of children under age 5 malnourished</option>
														<option value="Number of children under 5 severely malnourished">Number of children under 5 severely malnourished</option>
														<option value="Number of people in need of safe drinking water">Number of people in need of safe drinking water</option>
														<option value="Number of people fleeing to other countries as refugees">Number of people fleeing to other countries as refugees</option>
														<option value="Number of refugees hosted">Number of refugees hosted</option>
													</select>
											</div>


											<div class="form-group">
												    <label for="Country">People in Need</label>
												    <input type="number" class="form-control required" id="people_in_need" name="people_in_need" placeholder="People in need">
											</div>
											<div class="form-group">
												<div class="pull-right">
													<input type="submit" class="btn btn-warning btn-block btn-flat" name="addpeople" value="Add People in Need">
												</div>
											</div>


                  		</div>
                  	</form>

				</div>
			</div>
		</div>
</div>




<?php

include "pages/includes/footer.php";

?>