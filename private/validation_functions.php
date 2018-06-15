<?php
/* validation functions for creating and updating  */
function is_blank($value){
	return !isset($value) || trim($value) === '';
	return $result;
}

function has_presence($value){
	return !is_blank($value);
}

function has_length_greater_than($value, $min){
	$length = strlen($value);
	return $length > $min;
}

function has_length_less_than($value, $max){
	$length = strlen($value);
	return $length < $max;
}

function has_length_exactly($value, $exact){
	$length = strlen($value);
	return $length === $exact;
}

/* has_length('abcd', ['min' => 3, 'max' => 5])*/
/* validate string length */
function has_length($length, $options){
	if(isset($options['min']) && !has_length_greater_than($length, $options['min'] - 1)){
		return false;
	} elseif(isset($options['max']) && !has_length_less_than($length, $options['max'] + 1)){
		return false;
	} elseif(isset($options['exact']) && !has_length_exactly($length, $options['exact'])){
		return false;
	} else {
			return true;
	}
}

/* has_inclusion_of( 5, [1, 3, 5, 7, 9]) */
/* validate inclusion in set */
function has_inclusion_of($value, $array){
	return in_array($value, $array);
}

/* has_exclusion_of( 4, [1, 3, 5, 7, 9]) */
/* validate exclusion from set */
function has_exclusion_of($value, $array){
	return !in_array($value, $array);
}

/* strpos is faster than preg_match */
function has_string($value, $required){
	return strpos($value, $required) !== false;
}

function has_valid_email_format($value){
	 $email_regex = '/\A[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\Z/i';
    return preg_match($email_regex, $value) === 1;

}

function validate_subject($subject) {

  $errors = [];
  
  // menu_name
  if(is_blank($subject['menu_name'])) {
    $errors['menu_name'] = "Name cannot be blank.";
  }elseif(!has_length($subject['menu_name'], ['min' => 2, 'max' => 255])) {
    $errors['menu_name'] = "Name must be between 2 and 255 characters.";
  }

  // position
  // Make sure we are working with an integer
  $postion_int = (int) $subject['position'];
  if($postion_int <= 0) {
    $errors['position'] = "Position must be greater than zero.";
  }
  if($postion_int > 999) {
    $errors['position'] = "Position must be less than 999.";
  }

  // visible
  // Make sure we are working with a string
  $visible_str = (string) $subject['visible'];
  if(!has_inclusion_of($visible_str, ["0","1"])) {
    $errors['visible'] = "Visible must be true or false.";
  }

  return $errors;
}

function display_errors($errors=array()){
	$output = '';
	if(!empty($errors)){
		$output .= "<div class=\"error\">";
		$output .= "Please fix the following errors:";
		$output .= "<ul>";
		foreach($errors as $error){
			$output .= "<li>" . h($error) . "</li>";
		}
		$output .= "</ul>";
		$output .= "</div>";
	}
	return $output;
}
?>
