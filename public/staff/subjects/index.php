<?php require_once('../../../private/initialize.php') ?>
<?php

$subject_set = find_all_subjects();

?>

<!doctype html>
<?php $page_title ="SUBJECTS" ?>
<html lang="en">

	<?php require(SHARED_PATH . '/head.php') ?>
  <body>
   <div class="container">
   <?php include(SHARED_PATH . '/navigation.php') ?>

	<section> 
	  <div class="row">
		<div class="col-12">
			<div id="content">
			  <div class="subjects listing">
				<h1>Subjects</h1>

				<div class="actions">
				  <a class="action" href="<?php echo url_for('/staff/subjects/new.php'); ?>">Create New Subject</a>
				</div>

				<table class="list">
				  <tr>
					<th>ID</th>
					<th>Position</th>
					<th>Visible</th>
					<th>Name</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
				  </tr>

				  <?php while($subject = mysqli_fetch_assoc($subject_set)) { ?>
					<tr>
					  <td><?php echo $subject['id']; ?></td>
					  <td><?php echo $subject['position']; ?></td>
					  <td><?php echo $subject['visible'] == 1 ? 'true' : 'false'; ?></td>
						<td><?php echo $subject['menu_name']; ?></td>
					  <td><a class="action" href="<?php echo url_for('/staff/subjects/show.php?id=' . $subject['id']); ?>">View</a></td>
					  <td><a class="action" href="<?php echo url_for('/staff/subjects/edit.php?id=' . $subject['id']); ?>">Edit</a></td>
					  <td><a class="action" href="">Delete</a></td>
					  </tr>
				  <?php } ?>
				</table>
			  </div>
			</div>
		</div>
	  </div>
	</section>
	<?php 
		mysqli_free_result($subject_set);
	?>	
	<?php 
		include(SHARED_PATH . '/footer.php') 
		
	?>

	</div>
  </body>
  <?php require(SHARED_PATH . '/scripts.php') ?>
</html>

