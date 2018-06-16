<?php require_once('../private/initialize.php') ?>
<!doctype html>
<?php $page_title ="HOME" ?>
<html lang="en">

	<?php require(SHARED_PATH . '/head.php') ?>
  <body>
   <div class="container">
   <?php include(SHARED_PATH . '/navigation.php') ?>

	<section> 
	  <div class="row">
		<div class="col-12">
		<h3>Purpose</h3>
		<p>I haven't done much PHP or mySQL before, so I thought I'd use my KPL Web Application Developer resume submission as an opportunity to advance my skills. For the project, I first set up native Apache, PHP and mySQL 8 on my home iMac, then built a few examples with what I learned. This site is built using Bootstrap, Gulp, NPM, Sass, PHP 7.1.6, and mySQL 8.0.</p>
		
		<h3>Exercises</h3>
		<p>
			<ul>
				<li><a href="./library/collection"><strong>Collection</strong></a>: A simple PHP/mySQL CRUD example</li>
			</ul>
		</p>
		
		<h3>Sources</h3>
		<p>I used the following <a href="https://www.lynda.com/" target="_blank">Lynda.com</a> tutorials:</p>
		<ul>
			<li><a href="https://www.lynda.com/PHP-tutorials/Installing-Apache-MySQL-PHP/537759-2.html" target="_blank">Installing Apache, MySQL, and PHP</a></li>
			<li><a href="https://www.lynda.com/PHP-tutorials/PHP-MySQL-Essential-Training-1-Basics/587674-2.html" target="_blank">PHP with MySQL Essential Training: 1 The Basics</a></li>
		</ul>
		<h3>Repository</h3>
		<p>For code review purposes, I've placed the site framework <a href="https://github.com/FieryStudios/php-and-mysql" target="_blank">on my GitHub page</a>.</p>
		  <!-- TODO: Frame page header/nav -->
		  <!-- TODO: Make Login -->
		  <!-- TODO: Build AJAX call to Gutenberg or similar -->
		  <!-- TODO: Build Gutenberg DB -->
		  <!-- TODO: Build caller for Gutenberg DB -->
		  <!-- TODO: Add Repo to GitHub -->
		</div>
	  </div>
	</section>
	<?php include(SHARED_PATH . '/footer.php') ?>

	</div>
  </body>
  <?php require(SHARED_PATH . '/scripts.php') ?>
</html>
