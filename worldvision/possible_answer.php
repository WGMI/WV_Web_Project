<?php
include 'core/init.php';
$answers = $_GET["panswer"];
$query="SELECT * FROM possibleanswer WHERE indicatorid = $answers";
$possibleanswers = mysqli_query($conn, $query);
echo "<select>";
echo "<option>"; 
echo "Choose possible answer";
echo "</option>";
while ($row=mysqli_fetch_assoc($possibleanswers)) {
	$pa_id = $row['possibleanswer_id'];
	$pa_name = $row['possibleanswer_name'];
	echo "<option value=".$pa_id." name=".pa_name.">"; 
	echo $pa_name; 
	echo "</option>";
}
echo "</select>";
?>