<?php 
		
//This script calculates the country advisory level after early warning data has been entered

//The score determines the weighting. 
//For each score there's only one possible weight so a switch statement can be used		
function get_weight($score){
	switch($score){
		case 1:
			return 1;
			break;
		case 2:
			return 1.3;
			break;
		case 3:
			return 1.5;
			break;
		case 4:
			return 1.9;
			break;
	}
}

$categories = array();//Array to hold all categories a country has data for.

//SQL statement to get all categories for the country
$distinct_categories_sql = "select distinct(e.catid)
from earlywarning e 
join earlywarningindicator i on e.indicatorid = i.indicatorid 
join possibleanswer p on e.indicatorid = p.indicatorid 
where country = '$country' and period = '$sqldate'
";

$category_query = mysqli_query($conn,$distinct_categories_sql);

while($cat_row = mysqli_fetch_assoc($category_query)){
	$categories[] = $cat_row['catid'];//Adding category IDs to array
}

$country_advisory_level = 0;//Initially the score will be zero

//This for loop performs the advisory calculation as many times
//as there are categories
for($x=0;$x<count($categories);$x++){
	$category = $categories[$x];
		
	//SQL statement to get all indicators for the category
	$calculation_fields_sql = "select catid,indicatorid,possibleanswer_id
	from earlywarning
	where 
	country = '$country' 
	and period = '$sqldate'
	and catid = $category
	";
	
	$query = mysqli_query($conn,$calculation_fields_sql);

	$cat_score = 0;//Initially the category score will be zero

	while($row = mysqli_fetch_assoc($query)){
		
		//Indicator score calculation
		$possibleanswer_id = $row['possibleanswer_id'];
		$equivalence_score_sql = "select equivalence_score from possibleanswer where possibleanswer_id = $possibleanswer_id";
		$equivalence_score_query = mysqli_query($conn,$equivalence_score_sql);
		echo $equivalence_score = mysqli_fetch_assoc($equivalence_score_query)['equivalence_score'];
		$cat_score += $equivalence_score * get_weight($equivalence_score);
	}

	$country_advisory_level += $cat_score;//Incrementing the advisory level by the category score
}

$country_advisory_level;

//SQL statement to check if the country already has an advisory level entry for the month
//There can only be one such entry per country
$duplicate_query = mysqli_query($conn,"select * from country_advisory_levels where country = '$country' and period = '$sqldate'");

if(mysqli_num_rows($duplicate_query) > 0){
	//If an entry exists, it is updated
	$update_query = mysqli_query($conn,
	"update country_advisory_levels 
	set 
	advisory_level = $country_advisory_level 
	where 
	country = '$country' 
	and period = '$sqldate'"
	);
} else{
	//If no entry exists, it is created
	$add_query = mysqli_query($conn,
	"INSERT INTO `country_advisory_levels` (
	`country_advisory_levels_id`, 
	`country`, `period`, 
	`advisory_level`) 
	VALUES (
	NULL, 
	'$country', 
	'$sqldate', 
	$country_advisory_level);"
	);
}

?>		