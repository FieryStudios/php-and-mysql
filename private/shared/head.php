<?php

    $page_title = isset($page_title) ? $page_title : 'MORE INFO';

 // $page_title = $page_title ?? 'MORE INFO '  godaddy is using old PHP :(
?>
  <head>
    <title><?php echo h($page_title); ?> | Jane Irwin: KPL Web Application Developer Resume</title>
    <meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo url_for('/styles/css/styles.min.css') ?>">

</head>