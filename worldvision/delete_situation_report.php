<?php
include 'core/init.php';
protect();

if($_REQUEST['deletesituationreport']) {
$query = "DELETE FROM situation_report WHERE situation_id='".$_REQUEST['deletesituationreport']."'";
$deletesituation = mysqli_query($conn, $query) or die("database error:". mysqli_error($conn));
if($deletesituation) {
echo "Situation Report Record successfully deleted";
}else{
	echo "Funding Record Kept!";
}
}


?>