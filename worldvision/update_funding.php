<?php
include 'core/init.php';
protect();
include 'pages/includes/header.php';

$fundid = $_GET['editfunding'];
?>

<?php
$timezones = DateTimeZone::listIdentifiers(DateTimeZone::AFRICA);
$region4 = array('Eastern Africa');
$query = "SELECT * FROM funding WHERE funding_id = $fundid";
$fundingresult = mysqli_query($conn,$query);
if (!$fundingresult) {
			die('query failed'.mysqli_error($conn));
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
}

?>



<?php

if (isset($_POST['update_fund'])) {
	
		$updateregion=$_POST['updateregion'];
		$updatecountry=$_POST['updatecountry'];
		$updateperiod=$_POST['add-date'];
		$updatecategory=$_POST['updatecategory'];
		$update_funding_required=$_POST['update_funding_required'];
		$update_funding_received=$_POST['update_funding_received'];
		$update_funding_gap=$_POST['update_funding_gap'];

		$timestamp = strtotime(substr($updateperiod,0,2).'/1/'.substr($updateperiod,3));
		$sqldate = date('Y-m-d H:i:s',$timestamp);

		$query = "UPDATE funding SET
			 region='{$updateregion}',
			 country='{$updatecountry}',
			 period='{$sqldate}',
			 category='{$updatecategory}',
			 funding_required={$update_funding_required},
			 funding_received={$update_funding_received},
			 funding_gap={$update_funding_gap}
			 WHERE funding_id = $fundid";
	    $updatefundingresult = mysqli_query($conn,$query);
	    if (!$updatefundingresult) {
			die('query failed'.mysqli_error($conn));
		}else{
			header("Location:viewfunding.php?update=1");
		}
	}


?>




<div class="row">
            <!-- left column -->
        <div class="col-md-10 col-md-offset-1">

			<div class="box box-warning">
                <div class="box-header">
                  <!-- <h3 class="box-title">Add Beneficiary</h3> -->
                </div>
                <div class="box-body">
					<section class="content-header">
				          <h1>
				            Edit Funding Form<?php echo "  Number ".$funding_id ?><br>
				            <small><a href="viewbeneficiary.php">View funding form</small>
				          </h1>
				          <ol class="breadcrumb">
				            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
				            <li class="viewfunding.php">View Funding</li>
				            <li class="editbeneficiary.php">Edit Funding</li>
				          </ol>
			        </section>
					<hr>

					<form class="form-horizontal form" method="post" role="form">
                  		<div class="box-body">

                  							<div class="form-group">
												    <label for="Region">Region</label>
												    <select class="form-control select2 select2-hidden-accessible" name="updateregion" id="updateregion">
												    	<option selected><?php echo $region?></option>
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
											                <input type="text" class="form-control required" id="add-date" name="add-date"  placeholder="Enter funding period" value="<?php echo $period ?>">
											                <div class="input-group-addon">
											                    <span class="glyphicon glyphicon-th"></span>
											                </div>
											            </div>
									        </div>

											<div class="form-group">
												    <label for="Country">Category</label>
												    <select class="form-control select3 select3-hidden-accessible required" name="updatecategory" id="updatecategory">
														<option selected><?php echo $category?></option>
														<option value="Food security and livelihoods">Food security & livelihoods</option>
														<option value="Wash">Wash</option>
														<option value="Nutrition">Nutrition</option>
														<option value="Health">Health</option>
														<option value="Education">Education</option>
														<option value="Protection">Protection</option>
														<option value="Shelter and non-food items">Shelter and non food items</option>
													</select>
											</div>


											<div class="form-group">
												    <label for="Country">Funding Required</label>
												    <input type="number" class="form-control required" id="update_funding_required" name="update_funding_required" placeholder="Funding Required" value="<?php echo $funding_required ?>">
											</div>


											<div class="form-group">
												    <label for="Country">Funding Received</label>
												    <input type="number" class="form-control required" id="update_funding_received" name="update_funding_received" placeholder="Funding Received" value="<?php echo $funding_received ?>">
											</div>

											<div class="form-group">
												    <label for="Country">Funding Gap</label>
												    <input type="number" class="form-control required" id="update_funding_gap" name="update_funding_gap" placeholder="Funding Gap" value="<?php echo $funding_gap ?>">
											</div>
											<div class="form-group">
												<div class="pull-right">
													<button type="submit" class="btn btn-warning btn-block btn-flat" name="update_fund">Update Fund</button>
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