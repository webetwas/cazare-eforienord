<?php

function getSomeStringByInt($prefix = "somestring", $int) {
    return $prefix. strtr($int, '01234567890', 'abcdefghij');
}


function getDaysByDates($d_start, $d_end) {
	
	$datetime1 = date_create($d_start);
	$datetime2 = date_create($d_end);
	
	$interval = date_diff($datetime1, $datetime2);
	return $interval->format('%a');
}

function getRoByMonth($moth) {
	
	$monthArr = array(
		"January" => "Ianuarie",
		"February" => "Februarie",
		"March" => "Martie",
		"April" => "Aprilie",
		"May" => "Mai",
		"June" => "Iunie",
		"July" => "Iulie",
		"August" => "August",
		"September" => "Septembrie",
		"October" => "Octombrie",
		"November" => "Noiembrie",
		"December" => "Decembrie"
	);
	
	return $monthArr[$moth];
}

function getRoByDay($day) {
	
	$dayArr = array(
		"Monday" => "Luni",
		"Tuesday" => "Marti",
		"Wednesday" => "Miercuri",
		"Thursday" => "Joi",
		"Friday" => "Vineri",
		"Saturday" => "Sambata",
		"Sunday" => "Duminica"
	);
	
	return $dayArr[$day];
}

?>
