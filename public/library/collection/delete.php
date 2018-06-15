<?php require_once('../../../private/initialize.php');

if(!isset($_GET['id'])){
		redirect_to_url('/staff/subjects/index.php');
	}
	$id = $_GET['id'];
	
	if(is_post_request()){
		$result = delete_subject($id);
		redirect_to('/staff/subjects/index.php');
	} else{
		$subject = find_subject_by_id($id);
	}
?>
<!doctype html>
<?php $page_title ="DELETE SUBJECT" ?>
<html lang="en">

	<?php require(SHARED_PATH . '/head.php') ?>
  <body>
   <div class="container">
   <?php include(SHARED_PATH . '/navigation.php') ?>

	<section> 
	  <div class="row">
		<div class="col-12">
		<h3>Delete Subject</h3>

		  <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>
			<p>Are you sure you want to delete "<b><?php echo $subject['menu_name'] ?>"</b>?</p>
			
				
			<form action="<?php echo url_for('/staff/subjects/delete.php?id=' . h(u($subject['id']))); ?>" method="post">
			 
			 <input type="submit" value="Yes, Delete This Record" name="submit" />
			</form>

		</div>
	  </div>
	</section>
	<?php include(SHARED_PATH . '/footer.php') ?>

	</div>
  </body>
  <?php require(SHARED_PATH . '/scripts.php') ?>
</html>
