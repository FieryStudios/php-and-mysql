<?php require_once('../../../private/initialize.php'); 

if(!isset($_GET['id'])){
	redirect_to('kpl.php');
}

$id = $_GET['id'];

$menu_name = "";
$position = "1";
$visible = "1";


if(is_post_request()){
// Handle form values sent by new.php

$menu_name = $_POST['menu_name'] ?? '';
$position = $_POST['position'] ?? '';
$visible = $_POST['visible'] ?? '';

echo "Form parameters<br />";
echo "Menu name: " . $menu_name . "<br />";
echo "Position: " . $position . "<br />";
echo "Visible: " . $visible . "<br />";
} else {
	
}

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

			<form action="<?php echo url_for('/staff/subjects/edit.php?id=' .  h(u())); ?>" method="post">
			  <dl>
				<dt>Menu Name</dt>
				<dd><input type="text" name="menu_name" value="<?php echo h($menu_name); ?>" /></dd>
			  </dl>
			  <dl>
				<dt>Position</dt>
				<dd>
				  <select name="position">
					<option value="<?php echo $position ?>"><?php echo $position; ?></option>
				  </select>
				</dd>
			  </dl>
			  <dl>
				<dt>Visible</dt>
				<dd>
				  <input type="hidden" name="visible" value="0" />
				  <input type="checkbox" name="visible" value="1" <?php if($visible == "1"){echo 'checked';} ?> />
				</dd>
			  </dl>
			  <div id="operations">
				<input type="submit" value="Create Subject" />
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
