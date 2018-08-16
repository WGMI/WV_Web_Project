<?php
include "core/init.php";
protect();

if($_REQUEST['deletefund']) {
$query = "DELETE FROM funding WHERE funding_id='".$_REQUEST['deletefund']."'";
$deleteset = mysqli_query($conn, $query) or die("database error:". mysqli_error($connection));
if($deleteset) {
echo "Beneficiary Record successfully deleted";
}else{
	echo "Funding Record Kept!";
}
}


?>