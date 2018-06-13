<?php require_once('../../../private/initialize.php') ?>
<?php

$pages_set = find_all_pages();

?>
<!doctype html>
<?php $page_title ="CHALLENGE PAGE" ?>
<html lang="en">

	<?php require(SHARED_PATH . '/head.php') ?>  
  <body>
   <div class="container">
   <?php include(SHARED_PATH . '/navigation.php') ?>

	<section> 
	  <div class="row">
		<div class="col-12">
		<h3>CHALLENGE PAGE</h3>
		<table>  <tr>
					<th>ID</th>
					<th>Subject ID</th>
					<th>Visible</th>
					<th>Name</th>
					<th>Page Contents</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
				  </tr>
				<?php while($page = mysqli_fetch_assoc($pages_set)) { ?>
					<tr>
					  <td><?php echo h($page['id']); ?></td>
					  <td><?php echo h($page['fk_id']); ?></td>
					  <td><?php echo h($page['position']); ?></td>
					  <td><?php echo $page['visible'] == 1 ? 'true' : 'false'; ?></td>
						<td><?php echo h($page['menu_name']); ?></td>
						<td><?php echo h($page['page_contents']); ?></td>
					  <td><a class="action" href="<?php echo url_for('/staff/pages/show.php?id=' . h(u($page['id']))); ?>">View</a></td>
					  <td><a class="action" href="">Edit</a></td>
					  <td><a class="action" href="">Delete</a></td>
					  </tr>
				  <?php } ?>
		</table>
		</div>
	  </div>
	</section>
	<?php include(SHARED_PATH . '/footer.php') ?>
	<?php 
		mysqli_free_result($pages_set);
	?>
	</div>
  </body>
  <?php require(SHARED_PATH . '/scripts.php') ?>
</html>
