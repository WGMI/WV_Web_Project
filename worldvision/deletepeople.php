<?php
include 'core/init.php';
protect();

if($_REQUEST['deletepeople']) {
$query = "DELETE FROM people WHERE people_id='".$_REQUEST['deletepeople']."'";
$deletepeople = mysqli_query($conn $query) or die("database error:". mysqli_error($conn));
if($deletepeople) {
echo "People in Need Record successfully deleted";
}else{
	echo "People Record Kept!";
}
}


?>