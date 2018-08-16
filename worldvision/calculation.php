<?php 

//This script has errors, test2.php is being used instead of this for now.									
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

$categories = array();

echo "select distinct(e.catid)
from earlywarning e 
join earlywarningindicator i on e.indicatorid = i.indicatorid 
join possibleanswer p on e.indicatorid = p.indicatorid 
where country = '$country' and period = '$period'
".'<br><br>';

$category_query = mysqli_query($conn,
"select distinct(e.catid)
from earlywarning e 
join earlywarningindicator i on e.indicatorid = i.indicatorid 
join possibleanswer p on e.indicatorid = p.indicatorid 
where country = '$country' and period = '$period'
");

while($cat_row = mysqli_fetch_assoc($category_query)){
	$categories[] = $cat_row['catid'];
}

$country_advisory_level = 0;

for($x=0;$x<count($categories);$x++){
	$category = $categories[$x];
	$query = mysqli_query($conn,
	"select 
	earlywarningId,equivalence_score,i.indicatorid,e.catid 
	from earlywarning e 
	join earlywarningindicator i on e.indicatorid = i.indicatorid 
	join possibleanswer p on e.indicatorid = p.indicatorid 
	where 
	country = '$country' 
	and period = '$period'
	and e.catid = $category
	");

	$cat_score = 0;

	while($row = mysqli_fetch_assoc($query)){
		//$row['indicator_score'] = $row['equivalence_score'] * get_weight($row['equivalence_score']);
		
		//Indicator score
		$cat_score += $row['equivalence_score'] * get_weight($row['equivalence_score']);
	}

	$country_advisory_level += $cat_score;
}

echo $country_advisory_level;

?>		