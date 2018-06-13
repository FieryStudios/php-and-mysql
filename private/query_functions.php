<?php

function find_all_subjects(){
	global $db;
	$sql = "SELECT * FROM subjects ";
	$sql .= "ORDER BY POSITION ASC";
	$result = mysqli_query($db, $sql);
	confirm_query($result);
	return $result;
}
	
function find_all_pages(){
	global $db;
	$sql = "SELECT * FROM pages ";
	$sql .= "ORDER BY POSITION ASC";
	$result = mysqli_query($db, $sql);
	confirm_query($result);
	return $result;
}
	
?>
