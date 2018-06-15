<?php require_once('../../../private/initialize.php') ?>

<?php
 $id = $_GET['id'] ?? '1';
 
 $subject = find_subject_by_id($id);

?>
<!doctype html>
<?php $page_title ="SHOW SUBJECT" ?>
<html lang="en">

<?php require(SHARED_PATH . '/head.php') ?>  
  <body>
   <div class="container">
   <?php include(SHARED_PATH . '/navigation.php') ?>

	<section> 
	  <div class="row">
		<div class="col-12">
		<h3>SHOW SUBJECT</h3>
		
			<b>Subject ID:</b> <?php echo h($subject['id']);?><br />
			<b>Menu Name:</b> <?php echo h($subject['menu_name']);?><br />
			<b>Position:</b> <?php echo h($subject['position']);?><br />
			<b>Visible:</b> <?php echo $subject['visible'] == '1' ? 'true' : 'false';?><br />
		</div>
	  </div>
	</section>
	<?php include(SHARED_PATH . '/footer.php') ?>

	</div>
  </body>
  <?php require(SHARED_PATH . '/scripts.php') ?>
</html>
