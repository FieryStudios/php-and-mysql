<?php require_once('../../../private/initialize.php'); 

$id = $_GET['id'] ?? '1';

if(is_post_request()){
	
	//id, item_name, author_name, description, publisher, isbn 
	$item = [];
	$item['id'] = $id;
	$item['item_name'] = $_POST['item_name'] ?? '';
	$item['author_name'] = $_POST['author_name'] ?? '';
	$item['description'] = $_POST['description'] ?? '';
	$item['publisher'] = $_POST['publisher'] ?? '';
	$item['isbn'] = $_POST['isbn'] ?? '';
	
	$result = update_item($item);
if ($result === true){
	redirect_to('/library/collection/view.php?id=' . $id); 	
}else{
	$errors = $result;
}
	
} else{
	$item = find_item_by_id($id);
	$errors = [];
}

	$item_set = find_all_items();
	$item_count = mysqli_num_rows($item_set);
	
	mysqli_free_result($item_set);

?>
<!doctype html>
<?php $page_title ="Edit Record for " . h($item['item_name']); ?>
<html lang="en">

	<?php require(SHARED_PATH . '/head.php') ?>
  <body>
   <div class="container">
   <?php include(SHARED_PATH . '/navigation.php') ?>

	<section> 
	  <div class="row">
		<div class="col-12">

		<h3><?php echo h($page_title); ?></h3>

			<?php 
				$output = display_errors($errors);
				
				echo $output;
			?>
			<form action="<?php echo url_for('/library/collection/edit.php?id=' . h(u($id))); ?>" method="post">
				<dl>
					<dt>Item Name</dt>
					<dd><input type="text" name="item_name" value="<?php echo h($item['item_name']); ?>" required /></dd>
				</dl>

				<dl>
					<dt>Author Name</dt>
					<dd><input type="text" name="author_name" value="<?php echo h($item['author_name']); ?>" required /></dd>
				</dl>
				<dl>
					<dt>Publication</dt>
					<dd><input type="text" name="publisher" value="<?php echo h($item['publisher']); ?>" required /></dd>
				</dl>
				<dl>
					<dt>ISBN</dt>
					<dd><input type="text" name="isbn" value="<?php echo h($item['isbn']); ?>" required /></dd>
				</dl>
				<dl>
					<dt>Description</dt>
					<dd><textarea rows="4" cols="50" name="description" required /><?php echo h($item['description']); ?></textarea></dd>
				</dl>
			  <div id="operations">
				<input type="submit" value="Edit record" />
			  </div>
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
