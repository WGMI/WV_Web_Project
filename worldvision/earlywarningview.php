<?php
include 'core/init.php';
protect();
include 'pages/includes/header.php';

?>

<div class="row">
            <div class="col-md-12">

            	<?php
				if (isset($_GET['success'])) {
					$msg = $_GET['success'];
					$msg="<strong>Early warning field successfully added!</strong>";
					echo '<div class="alert alert-info" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
						  echo $msg;
						echo '</div>';
				  	
				}else{
					$msg ="";
				}
				?>


            	<?php
					if (isset($_GET['update'])) {
						$msg = $_GET['update'];
						$msg="<strong>Early warning field successfully updated!</strong>";
					  	echo '<div class="alert alert-info" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
						  echo $msg;
						echo '</div>';
					}else{
						$msg ="";
					}
				?>


              <div class="box box-warning" style="width: 100%">
                <div class="box-header">
                 <!--  <h3 class="box-title">List of beneficiaries</h3> -->
                </div><!-- /.box-header -->
                <div class="box-body">

				<section class="content-header">
		          <h1>
		            View Early Warning Table<br>
		            <!-- <a href="addbeneficiary"><small>Add beneficiary</small></a> -->
		          </h1>
		          <ol class="breadcrumb">
		            <li><a href="index"><i class="fa fa-dashboard"></i> Home</a></li>
		            <li><a href="addearlywarning">Add early warning</a></li>
		            <li class="active">View early warning</li>
		          </ol>
		        </section>
		        <hr>


		        	<section class="content-button">
			        	<div class="pull-left">
								<a href="addearlywarning.php" type="button" class="btn btn-warning btn-block btn-flat"><i class="fa fa-plus"></i> Add Early Warning</a>
							</div>
			        </section>
			        <br>
			        <hr>


		        <!-- <hr> -->

		              

        <table id="example" class="table table-bordered table-hover nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Early Warning Id</th>
                <th>Source</th>
                <th>Category</th>
                <th>Indicator</th>
                <th>Possible Answer</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        	<?php
				$query = "SELECT * FROM earlywarning AS a INNER JOIN earlywarningcategory AS b on a.catid = b.catid INNER JOIN earlywarningindicator AS c on a.indicatorid= c.indicatorid INNER JOIN possibleanswer AS d on a.possibleanswer_id = d.possibleanswer_id";
				$getearlywarning = mysqli_query($conn,$query);
				$counter = 0;

				if (!$getearlywarning) {
							die('query failed'.mysqli_error($conn));
					}

				while ($row = mysqli_fetch_assoc($getearlywarning)) {
					$earlywarningid = $row["earlywarningId"];
					$region = $row["region"];
				 	$country = $row["country"];
				 	$period = $row["period"];
				 	$last_updated = $row["last_updated"];
				 	$source = $row["source"];
				 	$confidencelevel = $row["confidencelevel"];
				 	$catname = $row["catname"];
				 	$indicator_name = $row["indicator_name"];
				 	$possibleanswer = $row["possibleanswer_name"];
				 	$narrative = sanitize($row["narrative"]);




				



					echo "<tr>";
					echo "<td>{$earlywarningid}</td>";
					echo "<td>{$source}</td>";
					echo "<td>{$catname}</td>";
					echo "<td>{$indicator_name}</td>";
					echo "<td>{$possibleanswer}</td>";
					echo "<td><a type='button' class='btn btn-sm btn-primary' data-toggle='modal' data-target='#exampleModal_".$counter."'>
  							  <i class='fa fa-eye'></i>
							  </a>


					<a class='btn btn-sm btn-warning' href='update_ewarning.php?editwarning={$earlywarningid}'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
                              <a class='btn btn-sm btn-danger' onclick=\"return confirm('Are you sure you want to delete?')\" href='earlywarningview.php?delete={$earlywarningid}' ><i class='fa fa-trash-o' aria-hidden='true'></i></a></td>";
					echo "</tr>";


					echo '<div class="modal fade" id="exampleModal_'.$counter.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">';
					        echo "Early Warning ID Number"." ".$earlywarningid;
					echo '</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">';

					      echo '<ul class="list-group">';


								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Region'.' -  '.$region;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-light">';
								  echo 'Country'.' -  '.$country;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Period'.' -  '.$period;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Last Updated Period'.' -  '.$last_updated;
								  echo '</li>';

								  

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Information Source'.' -  '.$source;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Confidence Level'.' -  '.$confidencelevel;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Category Name'.' -  '.$catname;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Indicator Name'.' -  '.$indicator_name;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Possible Answers'.' -  '.$possibleanswer;
								  echo '</li>';

								  echo '<li class="list-group-item list-group-item-primary">';
								  echo 'Narrative'.' -  '.$narrative;
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
                <th>Early Warning Id</th>
                <th>Source</th>
                <th>Category</th>
                <th>Indicator</th>
                <th>Possible Answer</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
</div>
</div>
</div>
</div>

 <?php
    if (isset($_GET['delete'])) {
       $deleteew = $_GET['delete'];
       $query = "DELETE FROM earlywarning WHERE earlywarningId = {$deleteew}";
       $deletedwarning = mysqli_query($conn,$query);
       header("Location:earlywarningview.php");
     } 
    ?>



<?php
include "pages/includes/footer.php";
?>