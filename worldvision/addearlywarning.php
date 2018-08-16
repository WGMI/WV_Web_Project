<?php
include_once 'core/init.php';
protect();
include 'pages/includes/header.php';

// $timezones = DateTimeZone::listIdentifiers(DateTimeZone::AFRICA);
$region = array('Eastern Africa');



if (isset($_POST['submit'])) {
	$region = $_POST["region"];
 	$country = $_POST["country"];
 	$period = $_POST["add-date"];
 	$lastupdate = $_POST["last-update"];
 	$category = $_POST["selectewc"];
 	$indicator = $_POST["ewindicator"];
 	$possible_answer = $_POST["pa"];
 	$source = $_POST["source"];
 	$confidence = $_POST["confidence"];
 	$narrative = mysqli_real_escape_string($conn,$_POST["narrative"]);

 	$timestamp = strtotime(substr($period,0,2).'/1/'.substr($period,3));
 	$sqldate = date('Y-m-d H:i:s',$timestamp);
	
	$user_id = $user_data['id'];

 	$query = "INSERT INTO earlywarning(region,country,period,last_updated,source,confidencelevel,narrative,catid,indicatorid,possibleanswer_id,user_id)
			 VALUES('{$region}','{$country}','{$sqldate}','{$lastupdate}','{$source}','{$confidence}','{$narrative}',{$category},{$indicator},{$possible_answer},$user_id)";


$addwarning = mysqli_query($conn,$query);

	if (!$addwarning) {
	 			die('Query failed: '.mysqli_error($conn));
 	}else{
		include 'test2.php';
 		header("Location:earlywarningview.php?success=1");
 	}
}

?>


<div class="row">
            <!-- left column -->
            <div class="col-md-10 col-md-offset-1">

			<div class="box box-warning">
                <div class="box-header">
                </div>
                <div class="box-body">


					<section class="content-header">
				          <h1>
				            Add Early Warning Data<br>
				          </h1>
				          <ol class="breadcrumb">
				            <li><a href="index"><i class="fa fa-dashboard"></i> Home</a></li>
				            <li class="active">Add Early Warning</li>
				          </ol>
			        </section>
			         <hr>

			        <section class="content-button">
			        	<div class="pull-left">
								<a href="earlywarningview.php" type="button" class="btn btn-warning btn-block btn-flat"><i class="fa fa-eye"></i> View Early Warning List</a>
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
								                <label>Period</label>

											            <div class="input-group date">
											                <input type="text" class="form-control required" id="add-date" name="add-date"  placeholder="Enter beneficiary period">
											                <div class="input-group-addon">
											                    <span class="glyphicon glyphicon-th"></span>
											                </div>
											            </div>
									        </div>

												<div class="form-group">
				                                    <label for="category">Categories</label>
				                                        <select class="form-control form-control-line required" id="selectewc" name="selectewc" onChange="category_earlywarning()">
				                                           <option selected="true" disabled>Choose Category</option>
				                                             <?php
				                                              $query = "SELECT * FROM earlywarningcategory";
				                                              $ew_result = mysqli_query($conn,$query);
				                                              while($row=mysqli_fetch_assoc($ew_result)){
				                                                $catname=$row['catname'];
				                                                $catid=$row['catid'];?>
				                                                <option value="<?php echo $catid; ?>"><?php echo $catname ?></option>
				                                             <?php } ?>
				                                        </select>
				                                </div>


				                                <div class="form-group">
				                                    <label for="indicator">Indicator</label>
				                                        <select class="form-control form-control-line required" id="ewindicator" name="ewindicator" onChange="indicator_possibleanswer()">
				                                            <option selected="true" disabled="disabled">Choose Relevant Indicator</option>
				                                        </select>
				                               </div>


											<div class="form-group">
													<label for="possible_answer">Possible answer</label>
													<select class="form-control form-control-line required" name="pa" id="pa">
														<option disabled selected>Choose Possible Answer</option>
													</select>
											</div>
								</div>



								<div class="step">
												
												<div class="form-group">
													<label for="Source">Source</label>
													<input type="url" class="form-control required" name="source" id="source" placeholder="Information Source">
												</div>
												<div class="form-group">
													<label for="confidence">Confidence level</label>
													<select class="form-control select2 select2-hidden-accessible" name="confidence" id="confidence">
													<option value="" disabled selected>Choose Confidence Level</option>
													<option value="Low">Low</option>
													<option value="High">High</option>
													<option value="Consistent with general information">Consistent with general information</option>
												</select>
												</div>
												<div class="form-group">
									                <label>Last Updated</label>
												            <div class="form-group">
												                <select class="form-control select2 select2-hidden-accessible" name="last-update" id="confidence">
																	<option value="" disabled selected>Choose...</option>
																	<option value="Current">Current</option>
																	<option value="Last 6 months">Last 6 months</option>
																	<option value="Last year">Last year</option>
																	<option value="Last 2 years">Last 2 years</option>
																</select>
												            </div>
										        </div>
												<div class="form-group">
													<label for="Narrative">Narrative</label>
						                            <textarea rows="3" name="narrative" id="narrative" class="form-control form-control-line required"></textarea>
												</div>
											</div>


									<div class="step display">
										<div class="col-md-8 col-md-offset-2">
										 <table id="example1" class="table table-bordered table-hover table-striped dataTable">
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
						                      	<td>Period</td>
						                        <td><label class="col-md-10 control-label lbl" data-id="add-date"></label></td>
						                      </tr>
						                      <tr>
						                      	<td>Categories</td>
						                        <td><label class="col-md-10 control-label lbl" data-id="selectewc"></label></td>
						                      </tr>
						                      <tr>
						                      	<td>Indicator</td>
						                        <td><label class="col-md-10 control-label lbl" data-id="ewindicator"></label></td>
						                      </tr>
						                      <tr>
						                      	<td>Possible answer</td>
						                        <td><label class="col-md-10 control-label lbl" data-id="pa"></label></td>
						                      </tr>
						                      <tr>
						                      	<td>Information Source</td>
						                        <td><label class="col-md-10 control-label lbl" data-id="source"></label></td>
						                      </tr>
						                      <tr>
						                      	<td>Confidence Level</td>
						                        <td><label class="col-md-10 control-label lbl" data-id="confidence"></label></td>
						                      </tr>
						                      <!-- <tr>
						                      	<td>Narrative</td>
						                        <td><label class="col-md-10 control-label lbl" data-id="narrative"></label></td>
						                      </tr> -->
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
											<a type="button" class="action btn-info btn-flat text-capitalize back btn">Back</a>
											<a type="button" class="action btn-warning btn-flat text-capitalize next btn">Next</a>
											<input type="submit" class="action btn-success btn-flat text-capitalize submit btn" name="submit" value="Submit">
										</div>
									</div>
								</div>

					</div>
				</form>





                 
                </div><!-- /.box-body -->
              </div><!-- /.box -->
          </div>


   
<?php
include "pages/includes/footer.php";
?>