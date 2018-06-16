<?php require_once('../../../private/initialize.php');

if(!isset($_GET['id'])){
		redirect_to_url('/library/collection/index.php');
	}
	$id = $_GET['id'];
	
	if(is_post_request()){
		$result = delete_item($id);
		redirect_to('/library/collection/index.php');
	} else{
		$item = find_item_by_id($id);
	}
?>
<!doctype html>
<?php $page_title ="Delete Record for " . h($item['item_name']); ?>
<html lang="en">

	<?php require(SHARED_PATH . '/head.php') ?>
  <body>
   <div class="container">
   <?php include(SHARED_PATH . '/navigation.php') ?>

	<section> 
	  <div class="row">
		<div class="col-12">
		<h3><?php echo h($page_title); ?></h3>

			<p>Are you sure you want to delete "<strong><?php echo $item['item_name'] ?>"</strong>?</p>
						
			<form action="<?php echo url_for('/library/collection/delete.php?id=' . h(u($item['id']))); ?>" method="post">
			 
			 <input class="btn btn-danger" type="submit" value="Yes, Delete This Record" name="submit" />
			</form>

		</div>
	  </div>
	</section>
	<a class="btn btn-primary" href="<?php echo url_for('/library/collection/index.php'); ?>">&laquo; Return to Collection List</a>
	
	<?php include(SHARED_PATH . '/footer.php') ?>

	</div>
  </body>
  <?php require(SHARED_PATH . '/scripts.php') ?>
</html>
