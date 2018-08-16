<?php
include 'core/init.php';
$indicators = $_GET["category_indicator"];
$query="SELECT * FROM earlywarningindicator WHERE catid = $indicators";
$ewindicator = mysqli_query($conn, $query);
echo "<select id='ewindicator' name='ewindicator' onChange='indicator_possibleanswer()'>";
echo "<option>"; 
echo "Choose Indicator";
echo "</option>";
while ($row=mysqli_fetch_assoc($ewindicator)) {
	$indicatorname = $row['indicator_name'];
	$indicatorid = $row['indicatorid'];
	echo "<option value=".$indicatorid." name=".indicatorname.">"; 
	echo $indicatorname; 
	echo "</option>";
}
echo "</select>";
?>