<?php
include 'core/init.php';
protect();
include 'pages/includes/header.php';
$fragilityid = $_GET['editfragility'];
?>

<?php
$query = "SELECT * FROM `fragility_index` WHERE fragility_index_id = $fragilityid";
$fragility = mysqli_query($conn,$query);

while ($row = mysqli_fetch_assoc($fragility)) {
	$fragilityid = $row["fragility_index_id"];
	$region = $row["region"];
	$country = $row["country"];
	$contact = $row["security_contact"];
	$fragilityindex = $row["fragility_index"];
	$globalpeaceindex = $row["global_peace_index"];
	$failedstatesindex = $row["failed_states_index"];
	$headeclaration = $row["hea_declaration"];
	$hazards = $row["hazards"];
	$population = $row["population"];
	$displacedpeople = $row["displaced_people"];
	$fieldspend = $row["field_spend"];
	$wvfragilityindexrank = $row["wv_fragility_index_rank_global"];
}

if (isset($_POST['submit'])) {

	$update_region = $_POST["region"];
	$update_country = $_POST["country"];
	$update_contact = $_POST["contact"];
	$update_fragilityindex = $_POST["fragilityindex"];
	$update_globalpeaceindex = $_POST["globalpeaceindex"];
	$update_failedstatesindex = $_POST["failedstatesindex"];
	$update_headeclaration = $_POST["headeclaration"];
	$update_hazards = $_POST["hazards"];
	$update_population = $_POST["population"];
	$update_displacedpeople = $_POST["displacedpeople"];
	$update_fieldspend = $_POST["fieldspend"];
	$update_wvfragilityindexrank = $_POST["wvfragilityindexrank"];



	$update_query = 
	"UPDATE `fragility_index` SET
	`region` = {$update_region}, 
	`country` = {$update_country}, 
	`fragility_index_rank` = {$update_wvfragilityindexrank}, 
	`security_contact` = {$update_contact}, 
	`fragility_index` = {$update_fragilityindex}, 
	`global_peace_index` = {$update_globalpeaceindex}, 
	`failed_states_index` = {$update_failedstatesindex}, 
	`hea_declaration` = {$update_headeclaration}, 
	`hazards` = {$update_hazards}, 
	`population` = {$update_population}, 
	`displaced_people` = {$update_displacedpeople}, 
	`field_spend` = {$update_fieldspend}
	WHERE `fragility_index_id` = {$$fragilityid}";




			$update_fragility = mysqli_query($conn,$update_query);
			if (!$update_query) {
					die('query failed'.mysqli_error($conn));
			}else{
				header("Location:viewfragility.php?update=1");
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
				            Add Fragility Index Form<br>
				          </h1>
				          <ol class="breadcrumb">
				            <li><a href="index"><i class="fa fa-dashboard"></i> Home</a></li>
				            <li class="active">Add Fragility Index</li>
				          </ol>
			        </section>
			         <hr>

			        <section class="content-button">
			        	<div class="pull-left">
								<a href="viewfragilityindex" type="button" class="btn btn-warning btn-block btn-flat"><i class="fa fa-eye"></i> View Fragility Index</a>
							</div>
			        </section>
			        <br>
			        <hr>
                	<div class="progress">
								<div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
								</div>


                  	<form class="form-horizontal form" method="post" role="form">
                  		<div class="box-body">
							  <div class="step">
											<div class="form-group">
												    <label for="Region">Region</label>
												    <select class="form-control select2 select2-hidden-accessible" name="region" id="region">
												    	<option  selected><?php echo $region?></option>
												    	<?php

														foreach($region as $key => $value) {

														?>

														<option value="<?= $value ?>" title="<?= htmlspecialchars($value) ?>"><?= htmlspecialchars($value) ?></option>
														<?php

														}

													?>
												</select>
											</div>

											<div class="form-group">
												    <label for="Country">Country</label>
												    <select class="form-control select2 select2-hidden-accessible" name="country" id="country">
														<option selected><?php echo $country?></option>
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
												    <label for="contact">Security Contact</label>
													<input type="text" class="form-control required" name="contact" id="contact" placeholder="Security Contact" value="<?php echo $contact?>">
											</div>
											<div class="form-group">
												    <label for="fragilityindex">Fragility Index</label>
													<input type="number" class="form-control required" name="fragilityindex" id="fragilityindex" placeholder="Fragility Index" value="<?php echo $fragilityindex?>">
											</div>  

											<div class="form-group">
												    <label for="globalpeaceindex">Global Peace Index</label>
													<input type="number" class="form-control required" name="globalpeaceindex" id="globalpeaceindex" placeholder="Global Peace Index" value="<?php echo $globalpeaceindex?>">
											</div>
											<div class="form-group">
												    <label for="failedstatesindex">Failed States Index</label>
													<input type="number" class="form-control required" name="failedstatesindex" id="failedstatesindex" placeholder="Failed States Index" value="<?php echo $failedstatesindex?>">
											</div>
								</div>



								<div class="step">
												
												<div class="form-group">
													<label for="headeclaration">HEA declaration</label>
													<input type="text" class="form-control required" name="headeclaration" id="headeclaration" placeholder="HEA declaration" value="<?php echo $headeclaration?>">
												</div>
												<div class="form-group">
													<label for="hazards">Hazards</label>
													<input type="text" class="form-control required" name="hazards" id="hazards" placeholder="Hazards" value="<?php echo $hazards?>">
												</div>
												<div class="form-group">
													<label for="population">Population (million people)</label>
													<input type="number" class="form-control required" name="population" id="population" placeholder="Population" value="<?php echo $population?>">
												</div>
												<div class="form-group">
													<label for="displacedpeople">Displaced people</label>
													<input type="number" class="form-control required" name="displacedpeople" id="displacedpeople" placeholder="Displaced people" value="<?php echo $displacedpeople?>">
												</div>
												<div class="form-group">
													<label for="fieldspend">Field spend (in million US$)</label>
													<input type="number" class="form-control required" name="fieldspend" id="fieldspend" placeholder="Field spend" value="<?php echo $fieldspend?>">
												</div>
												<div class="form-group">
													<label for="wvfragilityindexrank">WV Fragility index rank(Global)</label>
													<input type="number" class="form-control required" name="wvfragilityindexrank" id="wvfragilityindexrank" placeholder="WV Fragility index rank" value="<?php echo $wvfragilityindexrank?>">
												</div>
											</div>



									<div class="step display">
										<div class="col-md-8 col-md-offset-2">
										 <table id="example1" class="table table-bordered table-hover table-striped dataTable">
						                    <thead>
						                      <!-- <tr>
						                        <th scope="col">Fields</th>
						                        <th>Input</th>
						                      </tr> -->
						                    </thead>
						                    <tbody>
						                      <tr>
						                      	<td>Region</td>
						                        <td><label class="col-md-10 control-label lbl" data-id="region"></label></td>
						                      </tr>
						                      <tr>
						                      	<td>Country</td>
						                        <td><label class="col-md-10 control-label lbl" data-id="country"></label></td>
						                      </tr>
						                      <tr>
						                      	<td>Security Contact</td>
						                        <td><label class="col-md-10 control-label lbl" data-id="contact"></label></td>
						                      </tr>
						                      <tr>
						                      	<td>Fragility Index</td>
						                        <td><label class="col-md-10 control-label lbl" data-id="fragilityindex"></label></td>
						                      </tr>
						                      <tr>
						                      	<td>Global Peace Index</td>
						                        <td><label class="col-md-10 control-label lbl" data-id="globalpeaceindex"></label></td>
						                      </tr>
						                      <tr>
						                      	<td>Failed States Index</td>
						                        <td><label class="col-md-10 control-label lbl" data-id="failedstatesindex"></label></td>
						                      </tr>
						                      <tr>
						                      	<td>HEA declaration</td>
						                        <td><label class="col-md-10 control-label lbl" data-id="headeclaration"></label></td>
						                      </tr>
						                      <tr>
						                      	<td>Hazards</td>
						                        <td><label class="col-md-10 control-label lbl" data-id="hazards"></label></td>
						                      </tr>
						                      <tr>
						                      	<td>Population (million people)</td>
						                        <td><label class="col-md-10 control-label lbl" data-id="population"></label></td>
						                      </tr>
						                      <tr>
						                      	<td>Displaced people</td>
						                        <td><label class="col-md-10 control-label lbl" data-id="displacedpeople"></label></td>
						                      </tr>
						                      <tr>
						                      	<td>Field spend (in million US$)</td>
						                        <td><label class="col-md-10 control-label lbl" data-id="fieldspend"></label></td>
						                      </tr>
						                      <tr>
						                      	<td>WV Fragility index rank(Global)</td>
						                        <td><label class="col-md-10 control-label lbl" data-id="wvfragilityindexrank"></label></td>
						                      </tr>
						                    </tbody>
						                    <tfoot>
						                    </tfoot>
						                  </table>
						                  </div>
									</div>
								</div>


								<div class="row">
									<div class="col-sm-12">
										<div class="pull-right">
											<a type="button" class="action btn-info text-capitalize back btn">Back</a>
											<a type="button" class="action btn-warning text-capitalize next btn">Next</a>
											<input type="submit" class="action btn-success text-capitalize submit btn" name="submit" value="Submit">
										</div>
									</div>
								</div>

					</div>
				</form>






                 
                </div><!-- /.box-body -->
              </div><!-- /.box -->
          </div>
      </div>



<?php
include "pages/includes/footer.php";
?>
