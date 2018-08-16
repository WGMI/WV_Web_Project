<?php

include 'core/init.php';
protect();
include 'pages/includes/header.php';

$timezones = DateTimeZone::listIdentifiers(DateTimeZone::AFRICA);
$region = array('Eastern Africa');

if (isset($_POST["submit"])) {
	$region = $_POST["region"];
	$country = $_POST["country"];
	$contact = $_POST["contact"];
	$fragilityindex = $_POST["fragilityindex"];
	$globalpeaceindex = $_POST["globalpeaceindex"];
	$failedstatesindex = $_POST["failedstatesindex"];
	$headeclaration = $_POST["headeclaration"];
	$hazards = $_POST["hazards"];
	$population = $_POST["population"];
	$displacedpeople = $_POST["displacedpeople"];
	$fieldspend = $_POST["fieldspend"];
	$wvfragilityindexrank = $_POST["wvfragilityindexrank"];
	
	$user_id = $user_data['id'];
	
	$query = 
	"INSERT INTO `fragility_index` (
	`fragility_index_id`, 
	`region`, 
	`country`, 
	`fragility_index_rank`, 
	`security_contact`, 
	`fragility_index`, 
	`global_peace_index`, 
	`failed_states_index`, 
	`hea_declaration`, 
	`hazards`, 
	`population`, 
	`displaced_people`, 
	`field_spend`, 
	`wv_fragility_index_rank_global`,
	user_id) 
	VALUES (
	NULL, 
	'$region', 
	'$country', 
	NULL,
	'$contact', 
	$fragilityindex, 
	$globalpeaceindex, 
	$failedstatesindex, 
	'$headeclaration', 
	'$hazards', 
	$population, 
	$displacedpeople, 
	$fieldspend, 
	$wvfragilityindexrank,
	$user_id)";

	
	
	$fragility_query = mysqli_query($conn,$query);

	if (!$fragility_query) {
			die('query failed'.mysqli_error($connection));
	}else{
		header("Location:viewfragility.php?success=1");
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
				            Add Fragility Index Data<br>
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
												    	<option value="volvo" disabled selected>Choose region</option>
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
												    <label for="contact">Security Contact</label>
													<input type="text" class="form-control required" name="contact" id="contact" placeholder="Security Contact">
											</div>
											<div class="form-group">
												    <label for="fragilityindex">Fragility Index</label>
													<input type="number" class="form-control required" name="fragilityindex" id="fragilityindex" placeholder="Fragility Index">
											</div>

											<div class="form-group">
												    <label for="globalpeaceindex">Global Peace Index</label>
													<input type="number" class="form-control required" name="globalpeaceindex" id="globalpeaceindex" placeholder="Global Peace Index">
											</div>
												<div class="form-group">
												    <label for="failedstatesindex">Failed States Index</label>
													<input type="number" class="form-control required" name="failedstatesindex" id="failedstatesindex" placeholder="Failed States Index">
												</div>
											<!-- <div class="form-group">
												    <label for="Time">Period</label>
												        <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="date"/>
											</div> -->
								</div>



											<div class="step">
												
												<div class="form-group">
													<label for="headeclaration">HEA declaration</label>
													<input type="text" class="form-control required" name="headeclaration" id="headeclaration" placeholder="HEA declaration">
												</div>
												<div class="form-group">
													<label for="hazards">Hazards</label>
													<input type="text" class="form-control required" name="hazards" id="hazards" placeholder="Hazards">
												</div>
												<div class="form-group">
													<label for="population">Population (million people)</label>
													<input type="number" class="form-control required" name="population" id="population" placeholder="Population">
												</div>
												<div class="form-group">
													<label for="displacedpeople">Displaced people</label>
													<input type="number" class="form-control required" name="displacedpeople" id="displacedpeople" placeholder="Displaced people">
												</div>
												<div class="form-group">
													<label for="fieldspend">Field spend (in million US$)</label>
													<input type="number" class="form-control required" name="fieldspend" id="fieldspend" placeholder="Field spend">
												</div>
												<div class="form-group">
													<label for="wvfragilityindexrank">WV Fragility index rank(Global)</label>
													<input type="number" class="form-control required" name="wvfragilityindexrank" id="wvfragilityindexrank" placeholder="WV Fragility index rank">
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