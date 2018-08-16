<?php

include 'core/init.php';
include 'pages/includes/header.php';

$editpeople = $_GET['editpeople'];
?>


<?php
$timezones = DateTimeZone::listIdentifiers(DateTimeZone::AFRICA);
$region4 = array('Eastern Africa');
$query = "SELECT * FROM people WHERE people_id = $editpeople";
$peopleresult = mysqli_query($conn,$query);
if (!$peopleresult) {
			die('query failed'.mysqli_error($conn));
	}

while ($row = mysqli_fetch_assoc($peopleresult)) {
	$people_id=$row['people_id'];
	$region=$row['region'];
	$country=$row['country'];
	$period=$row['period'];
	$category_of_people=$row['category_of_people'];
	$people_in_need=$row['people_in_need'];
}

?>



<?php
if (isset($_POST['editpeople'])) {
	$updateregion=$_POST['updateregion'];
	$updatecountry=$_POST['updatecountry'];
	$updateperiod=$_POST['add-date'];
	$update_category_of_people=$_POST['update_category_of_people'];
	$update_people_in_need=$_POST['update_people_in_need'];

	$timestamp = strtotime(substr($updateperiod,0,2).'/1/'.substr($updateperiod,3));
	$sqldate = date('Y-m-d H:i:s',$timestamp);


	$query = "UPDATE people SET
			  region = '{$updateregion}',
			  country = '{$updatecountry}',
			  period = '{$sqldate}',
			  category_of_people = '{$update_category_of_people}',
			  people_in_need = {$update_people_in_need}
			  WHERE people_id = $editpeople";


	$update_people_result = mysqli_query($conn,$query);
	if(!$update_people_result){
		die("query failed".mysqli_error($conn));
	}else{
		 header("Location:viewpeople?success=1");
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
				             Edit People in Need <?php echo "  Number ".$editpeople ?><br>
				          </h1>
				          <ol class="breadcrumb">
				            <li><a href="index"><i class="fa fa-dashboard"></i> Home</a></li>
				            <li><a href="viewpeople">View People in need</a></li>
				            <li><a href="active">Edit People in need</a></li>
				          </ol>
			        </section>
			        <hr>
			         

			        <section class="content-button">
			        	<div class="pull-left">
								<a href="viewpeople" type="button" class="btn btn-warning btn-block btn-flat"><i class="fa fa-eye"></i> View People in need</a>
							</div>
			        </section>
			        <br>
			        <hr>

					<form class="form-horizontal form" method="post" role="form">
                  		<div class="box-body">

                  							<div class="form-group">
												    <label for="Region">Region</label>
												    <select class="form-control select2 select2-hidden-accessible" name="updateregion" id="updateregion">
												    	<option selected><?php echo $region?></option>
												    	<?php

														foreach($region5 as $key => $value) {

														?>

														<option value="<?= $value ?>" title="<?= htmlspecialchars($value) ?>"><?= htmlspecialchars($value) ?></option>
														<?php

														}

													?>
												</select>
											</div>

											<div class="form-group">
												    <label for="Country">Country</label>
												    <select class="form-control select2 select2-hidden-accessible required" name="updatecountry" id="updatecountry">
														<option selected><?php echo $country?></option>
														<option value="Kenya">Kenya</option>
														<option value="Uganda">Uganda</option>
														<option value="Tanzania">Tanzania</option>
														<option value="Rwanda">Rwanda</option>
														<option value="Burundi">Burundi</option>
													</select>
											</div>

											<div class="form-group">
								                <label>Period</label>
											            <div class="input-group date">
											                <input type="text" class="form-control required" id="add-date" name="add-date"  placeholder="Select date"
											                value="<?php echo $period ?>">
											                <div class="input-group-addon">
											                    <span class="glyphicon glyphicon-th"></span>
											                </div>
											            </div>
									        </div>

											<div class="form-group">
												    <label for="Country">Category of people</label>
												    <select class="form-control select3 select3-hidden-accessible required" name="update_category_of_people" id="update_category_of_people">
														<option selected><?php echo $category_of_people ?></option>
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
												    <input type="number" class="form-control required" id="update_people_in_need" name="update_people_in_need" placeholder="People in need" value="<?php echo $people_in_need; ?>">
											</div>
											<div class="form-group">
												<div class="pull-right">
													<button type="submit" class="btn btn-warning btn-block btn-flat" name="editpeople">Update People in Need</button>
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