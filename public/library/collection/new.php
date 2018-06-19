<?php require_once('../../../private/initialize.php');

if(is_post_request()){
//id, item_name, author_name, description, publisher, isbn
$item = [];
$item['item_name'] = isset($_POST['item_name']) ? $_POST['item_name'] : 'null';
$item['author_name'] = isset($_POST['author_name']) ? $_POST['author_name'] : 'null';
$item['description'] = isset($_POST['description']) ? $_POST['description'] : 'null';
$item['publisher'] = isset($_POST['publisher']) ? $_POST['publisher'] : 'null';
$item['isbn'] = isset($_POST['isbn']) ? $_POST['isbn'] : 'null';

$result = insert_item($item);
	if ($result === true){
		$new_id = mysqli_insert_id($db);

		redirect_to('/library/collection/view.php?id=' . $new_id);

	}else {
		$errors = $result;
	}

} else {
	$errors = [];
}
	$item_set = find_all_items();
	$item_count = mysqli_num_rows($item_set) + 1;
	$item = [];
	mysqli_free_result($item_set);
?>
<!doctype html>
<?php $page_title ="Add New Record to Collection" ?>
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
				if($errors){

					echo display_errors($errors);
				}
			?>
			<form action="<?php echo url_for('/library/collection/new.php'); ?>" method="post">
			  <dl>
				<dt>Item Name</dt>
				<dd><input type="text" name="item_name" value="" placeholder="Enter an item name" required/></dd>
			  </dl>
			   <dl>
				<dt>Author Name</dt>
				<dd><input type="text" name="author_name" value="" placeholder="Enter an author name" required /></dd>
			  </dl>
			   <dl>
				<dt>Publication</dt>
				<dd><input type="text" name="publisher" value="" placeholder="Enter a publication name" required /></dd>
			  </dl>
			   <dl>
				<dt>ISBN</dt>
				<dd><input type="number" name="isbn" value="" placeholder="Enter an ISBN" required /></dd>
			  </dl>
			  <dl>
				<dt>Description</dt>
				<dd><textarea rows="4" cols="50" name="description" placeholder="Enter a description" required /></textarea></dd>
			  </dl>
			  <div>
				<input class="btn btn-info" type="submit" value="Create item" />
			  </div>
			</form>

		</div>
	  </div>

	   <a class="btn btn-primary" href="<?php echo url_for('/library/collection/index.php'); ?>">&laquo; Return to Collection List</a>
	</section>
	<?php include(SHARED_PATH . '/footer.php') ?>

	</div>
  </body>
  <?php require(SHARED_PATH . '/scripts.php') ?>
</html>
