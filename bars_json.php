<?php

	header("Content-Type: application/json");
	header("Access-Control-Allow-Origin: *"); 

	// connect to mysql with charset utf8
	$link = mysqli_connect("109.24.176.231", "julien", "julien", "barinthecity") or die("Could not connect". mysqli_error());
	$link->set_charset("utf8");

	$arr = array();
	$sql = "SELECT * FROM bars";
	$result = mysqli_query($link,$sql);
 
	while($obj = mysqli_fetch_object($result)) {
		$arr[] = $obj;
	}

	$return = new stdClass();	
	$return ->bars = $arr;

	echo json_encode($return);

	mysqli_close($link);

/*
//The json object is 
{"bars":[{"id":"1","nom":"The frog & princess","adresse_rue":"9 rue Princesse","adresse_cp":"75006","adresse_ville":"Paris","bar_horaires":"en semaine : 17h30-2h\r\nweek end 12h-2h","happy_hour":"0","happy_hour_horaires":null,"terrasse":null,"created_by":"1","modified_by":null,"date_created":"2014-08-10 19:00:00","date_modified":null}]}
*/
//test
?>

