<?php require_once('../../../private/initialize.php'); 

// headers and page redirection 
$test = $_GET['test'] ?? '';

if($test == '404'){
	error_404();	
} elseif($test == '500'){
	error_500();
}  elseif($test == 'redirect'){
	redirect_to('/kpl.php');
}

?>
<!doctype html>
<?php $page_title ="CREATE NEW SUBJECT" ?>
<html lang="en">

	<?php require(SHARED_PATH . '/head.php') ?>
  <body>
   <div class="container">
   <?php include(SHARED_PATH . '/navigation.php') ?>

	<section> 
	  <div class="row">
		<div class="col-12">
		<h3>Create New Subject</h3>

		  <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>

			<form action="<?php echo url_for('/staff/subjects/create.php'); ?>" method="post">
			  <dl>
				<dt>Menu Name</dt>
				<dd><input type="text" name="menu_name" value="" /></dd>
			  </dl>
			  <dl>
				<dt>Position</dt>
				<dd>
				  <input type="number" name="position" placeholder="1">
				</dd>
			  </dl>
			  <dl>
				<dt>Visible</dt>
				<dd>
				  <input type="hidden" name="visible" value="0" />
				  <input type="checkbox" name="visible" value="1" />
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
