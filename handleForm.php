<?php 
/* 
This file handles a POST Request or a data sent from a 
form from the frontend
If data is complete and exists, it will send the data to an
executable C++ file and return True if it received input
*/

//this loop should be used when sending a variety of data
//will iterate through all arrays in the _POST request
/*foreach($_POST as $form) {
	if( is_array($form)) {

		foreach($form as $data) {
			echo $data;
		}
	} else {
		echo $form;
	}
}
*/

//if we know it is a single array we can use this
//just accesses the data in the POST request
foreach($_POST as $form_data) {
	echo "<p>{$form_data} <p>";
}

//-------------Pass Data to Model-----------

//creates command line args for the shell_exec function
//Needs to have quotes otherwise it will read as one arg
$args = "";
foreach($_POST as $array) {
	$args.= '"'.$array.'" ' ;
}
if (file_exists("CPP Code/debug/CPP Code.exe")) {
	
	//passes data and resturns results
	echo "File Found";
	$risk= shell_exec('"CPP Code/debug/CPP Code.exe " '.$args);

	echo "<br> {$risk}";
}
else {
	echo "File Not Found";
}

/*
------------->Store data in database<----------
Need to find a way to error handle the data
as in, an efficient way to create SQL statements (most likely a loop)
but what do we do if we are missing data or data in _POST array is not in same
order as database
possible solution is to manually set a series of naming conventions
we are also returning boolean values, solution: send the data from frontend as booleans
*/

//prep data to be sent to database
/*$array_keys = array_keys($_POST);

foreach($array_keys as $key) {
	echo "<p> {$key} <p>";
}
*/
//if we decide to have user login... will we generate UUI here???
$query = "INSERT INTO `se_20s_g05_db`.`Prediction Data` (`Biological Sex`, `Mother Gene`, `Father Gene`, `Sibling Gene`, `Risk Relation`) VALUES (";

foreach($_POST as $data) {
	//will adding the extra comment at the end matter?
	//after testing it does matter
	$query.="'".$data."',";
}

$query.="'".$risk."'";
//closes the query
$query.= ")";

$dbconn = include "connect-mysql.php";

//do i need to make a client in the table first???
//if so, would need to query client UID <---- THIS CAN ONLY BE DONE IF WE HAVE LOGIN SYSTEM
//there would be no other way to find a users UID or to retreive it
//LOL more comments than code haha

if ($column = mysqli_query($dbconn, $query)) {
	
	echo "Successfully inserted to database";

} 
else {
	echo mysqli_error($dbconn);
	echo "Did not insert";
}
return $risk;
?>

