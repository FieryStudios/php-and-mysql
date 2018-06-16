<?php require_once('../../../private/initialize.php') ?>

<?php
 $id = isset($_GET['id']) ? $_GET['id'] : '1';

 //$id = $_GET['id'] ?? '1';  godaddy is using old PHP :(

 $item = find_item_by_id($id);

?>
<!doctype html>
<?php $page_title = "Full Record for " . h($item['item_name']); ?>
<html lang="en">

<?php require(SHARED_PATH . '/head.php') ?>
  <body>
   <div class="container">
   <?php include(SHARED_PATH . '/navigation.php') ?>

	<section>
	  <div class="row">
		<div class="col-12">
		<h3><?php echo h($page_title); ?></h3>

			<strong>Item Name:</strong> <?php echo h($item['item_name']);?><br />
			<strong>Author Name:</strong> <?php echo h($item['author_name']);?><br />
			<strong>Publication:</strong> <?php echo h($item['publisher']);?><br />
			<strong>ISBN:</strong> <?php echo h($item['isbn']);?><br />
			<strong>Description:</strong> <?php echo h($item['description']);?><br />

		</div>
	  </div>
	</section>

	<a class="btn btn-primary" href="<?php echo url_for('/library/collection/index.php'); ?>">&laquo; Return to Collection List</a>

	<?php include(SHARED_PATH . '/footer.php') ?>

	</div>
  </body>
  <?php require(SHARED_PATH . '/scripts.php') ?>
</html>
