<?php require_once('../../../private/initialize.php'); 

$id = $_GET['id'] ?? '1';

if(is_post_request()){
	
	$subject = [];
	$subject['id'] = $id;
	$subject['menu_name'] = $_POST['menu_name'] ?? '';
	$subject['position'] = $_POST['position'] ?? '';
	$subject['visible'] = $_POST['visible'] ?? '';
	
	$result = update_subject($subject);
if ($result === true){
	redirect_to('/staff/subjects/show.php?id=' . $id); 	
}else{
	$errors = $result;
}
	
} else{
	$subject = find_subject_by_id($id);
	$errors = [];
}

	$subject_set = find_all_subjects();
	$subject_count = mysqli_num_rows($subject_set);
	
	mysqli_free_result($subject_set);

?>
<!doctype html>
<?php $page_title ="EDIT SUBJECT" ?>
<html lang="en">

	<?php require(SHARED_PATH . '/head.php') ?>
  <body>
   <div class="container">
   <?php include(SHARED_PATH . '/navigation.php') ?>

	<section> 
	  <div class="row">
		<div class="col-12">

		<h3>Edit Subject</h3>

		  <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>
			<?php 
				$output = display_errors($errors);
				
				echo $output;
			?>
			<form action="<?php echo url_for('/staff/subjects/edit.php?id=' . h(u($id))); ?>" method="post">
			  <dl>
				<dt>Menu Name</dt>
				<dd><input type="text" name="menu_name" value="<?php echo h($subject['menu_name']); ?>" /></dd>
			  </dl>
			  <dl>
				<dt>Position</dt>
				<dd>
				  <select name="position">
					<?php 
						for($i = 1; $i <= $subject_count; $i++){
								echo "<option value=\"{$i}\"";
								if($subject["position"] == $i){
									echo " selected ";
								}
								echo">{$i}</option>";
								
						}
					?>
				  </select>
				</dd>
			  </dl>
			  <dl>
				<dt>Visible</dt>
				<dd>
				  <input type="hidden" name="visible" value="0" />
				  <input type="checkbox" name="visible" value="1" <?php if($subject['visible'] == "1"){echo 'checked';} ?> />
				</dd>
			  </dl>
			  <div id="operations">
				<input type="submit" value="Edit Subject" />
			  </div>
			</form>

		</div>
	  </div>
	</section>
	<?php include(SHARED_PATH . '/footer.php') ?>

	</div>
  </body>
  <?php require(SHARED_PATH . '/scripts.php') ?>
</html>
