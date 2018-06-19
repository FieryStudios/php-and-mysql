<?php require_once('../../../private/initialize.php') ?>

<!doctype html>
<?php $page_title = "Favorite Fish" ?>
<html lang="en">
<?php require(SHARED_PATH . '/head.php') ?>

    <style>
    table td{
        font-size: 11px;
        padding: 5px!important;
    }
    table button{
        font-size: 11px!important;
    }
    .modal.show{
        background: rgba(0,0,0, .5);
        display:block!important;
    }
    </style>
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
                has several free APIs, including <a href="https://data.michigan.gov/Environment/Michigan-Fish/he9h-7fpa" target="_blank">this list of local fish species</a>. Since I use a lot of jQuery at work, I used this collection as an exercise in fetching JSON data from an endpoint using only Vanilla JS and PHP.</p>

                 <div id="fish-loading"></div>
			  </div>
			  </div>
              <div id="fish-table" class="row"></div>
			</div>
            <span style="font-size: 9px">Fish loading GIF by <a href="https://alboardman.tumblr.com/" target="_blank">Al Boardman</a></span>
		</div>
	  </div>
	</section>

	<?php
		include(SHARED_PATH . '/footer.php')
	?>

	</div>

  </body>
  <?php require(SHARED_PATH . '/scripts.php') ?>
  <script>

    var fishJSON = {};

document.addEventListener("DOMContentLoaded", function() {

  fetchFish();

});




    </script>

</html>