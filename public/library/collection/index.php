<?php require_once('../../../private/initialize.php') ?>
<?php

$item_set = find_all_items();

?>

<!doctype html>
<?php $page_title ="Collection" ?>
<html lang="en">

	<?php require(SHARED_PATH . '/head.php') ?>
  <body>
   <div class="container">
   <?php include(SHARED_PATH . '/navigation.php') ?>

	<section> 
	  <div class="row">
		<div class="col-12">
			<div id="content">
			  <div class="items listing">
				<h3><?php echo h($page_title); ?></h3>

				<div class="actions">
				  <a class="btn btn-primary" href="<?php echo url_for('/library/collection/new.php'); ?>">Add new item to collection</a>
				</div>

				<table class="table table-striped table-bordered table-condensed">
				  <tr>
					<th>Item Name</th>
					<th>Author Name</th>
					<th>ISBN</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
				  </tr>

				  <?php while($item = mysqli_fetch_assoc($item_set)) { ?>
					<tr>
					  <td><?php echo $item['item_name']; ?></td>
					  <td><?php echo $item['author_name']; ?></td>
					  <td><?php echo $item['isbn']; ?></td>
					  <td><a class="btn btn-info" href="<?php echo url_for('/library/collection/view.php?id=' . $item['id']); ?>">View Full Record</a></td>
					  <td><a class="btn btn-warning" href="<?php echo url_for('/library/collection/edit.php?id=' . $item['id']); ?>">Edit</a></td>
					  <td><a class="btn btn-danger" href="<?php echo url_for('/library/collection/delete.php?id=' . $item['id']); ?>">Delete</a></td>
					  </tr>
				  <?php } ?>
				</table>
			  </div>
			</div>
		</div>
	  </div>
	</section>
	<?php 
		mysqli_free_result($item_set);
	?>	
	<?php 
		include(SHARED_PATH . '/footer.php') 
		
	?>

	</div>
  </body>
  <?php require(SHARED_PATH . '/scripts.php') ?>
</html>

