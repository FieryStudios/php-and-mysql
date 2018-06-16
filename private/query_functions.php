<?php

// id, item_name, author_name, description, publisher, isbn

function find_all_items(){
	global $db;
	$sql = "SELECT * FROM collection ";
	$sql .= "ORDER BY ID ASC";
	$result = mysqli_query($db, $sql);
	confirm_query($result);
	return $result;
}

function find_item_by_id($id ){
	global $db;
	 $sql = "SELECT * FROM collection ";
	 $sql .= "WHERE id='" . db_escape($db, $id) . "'";
	 $result = mysqli_query($db, $sql);
	 confirm_query($result);
	 
	 $item = mysqli_fetch_assoc($result);
	 mysqli_free_result($result);
	 
	 return $item;
};

function insert_item($item){
	global $db;
	$errors = validate_item($item);
	if(!empty($errors)){
		return $errors;
	}
	
	$sql = "INSERT INTO collection ";
	$sql .= "(item_name, author_name, description, publisher, isbn) ";
	$sql .= "VALUES (";
	$sql .= "'" . db_escape($db, $item['item_name']) . "',";
	$sql .= "'" . db_escape($db, $item['author_name']) . "',";
	$sql .= "'" . db_escape($db, $item['description']) . "',";
	$sql .= "'" . db_escape($db, $item['publisher']) . "',";
	$sql .= "'" . db_escape($db, $item['isbn']) . "' )";

	$result = mysqli_query($db, $sql);

	if($result){
		return true;
	} else  {
		echo mysqli_error($db);
		db_disconnect($db);
		exit;
	}
};
	
function update_item($item){
	global $db;
	
	$errors = validate_item($item);
	if(!empty($errors)){
		return $errors;
	}

    $sql = "UPDATE collection SET ";
    $sql .= "item_name='" . db_escape($db, $item['item_name']) . "', ";
    $sql .= "author_name='" . db_escape($db, $item['author_name']) . "', ";
	$sql .= "description='" . db_escape($db, $item['description']) . "', ";
	$sql .= "publisher='" . db_escape($db, $item['publisher']) . "', ";
    $sql .= "isbn='" . db_escape($db, $item['isbn']) . "' ";
    $sql .= "WHERE id='" . db_escape($db, $item['id']) . "' ";
    $sql .= "LIMIT 1";
	
	$result = mysqli_query($db, $sql);
// FOR UPDATE statements, result is true/false
	if($result){
		return true;
	} else  {
		echo mysqli_error($db);
		db_disconnect($db);
		exit;
	}
};

function delete_item($id){
	global $db;
	$sql = "DELETE FROM collection ";
	$sql .= "WHERE id='" . db_escape($db, $id) . "'";
	$sql .= " LIMIT 1;";
	
	$result = mysqli_query($db, $sql);

	if($result){
		return true;
	} else  {
		echo mysqli_error($db);
		db_disconnect($db);
		exit;
	}
};
	
/* Sanitizes data */
/* Prevents the Bobby Tables scenario */
/* https://xkcd.com/327/ */
function db_escape($connection, $string){
	return mysqli_real_escape_string($connection, $string);
}	
	
?>
