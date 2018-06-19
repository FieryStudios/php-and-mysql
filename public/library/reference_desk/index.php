<?php require_once('../../../private/initialize.php') ?>

<!doctype html>
<?php $page_title = "Reference Desk" ?>
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
                <p>Michigan's <a href="https://data.michigan.gov" target="_blank">Open Data Portal</a>
                has several free APIs, I used two of these as exercises in fetching JSON data from an API using vanilla JS, AJAX and PHP.</p>
			  </div>
            <div>
                <ul>
                    <li><a href="./michigan_fish.php"><strong>Michigan Fish</strong></a>: Read about our state's fish species</li>
                    <li><a href="./unemployment.php"><strong>Unemployment Data</strong></a>: Retrieve unemployment data by year</li>
                </ul>

            </div>
		</div>
	  </div>
	</section>

	<?php
		include(SHARED_PATH . '/footer.php')
	?>

	</div>
  </body>
  <?php require(SHARED_PATH . '/scripts.php') ?>
</html>