<?php
  // You can simulate a slow server with sleep
  // sleep(2);

  session_start();

  if(!isset($_SESSION['favorite_fish'])) { $_SESSION['favorite_fish'] = []; }

  function is_ajax_request() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
      $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
  }


function array_remove($element, $array){
        $index = array_search($element, $array);
        array_splice($array, $index, 1);
        return $array;
}

  if(!is_ajax_request()) { echo 'false'; exit; }

  // extract $id
  // store in $_SESSION['favorites']
  // return true/false

$id = isset($_POST['id']) ? $_POST['id'] : '';

if(in_array($id, $_SESSION['favorite_fish'])){

    $_SESSION['favorite_fish'] = array_remove($id, $_SESSION['favorite_fish']);

    echo 'true';
} else{
    echo 'false';
}

?>
