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
		<p>I haven't had the opportunity to use PHP or mySQL at my current job,
		so I thought I'd use my KPL Web Application Developer resume submission as an opportunity to advance my skills in a form that would be of use to an organization like KPL. For the project, I first set up native Apache, PHP and mySQL 8 on my home iMac, then built a few examples with what I learned. This site is built using Bootstrap, Gulp, NPM, Sass, PHP 7.1.6, and mySQL 8.0.</p>

		<h3>Exercises</h3>
		<p>
			<ul>
				<li><a href="./library/collection"><strong>Collection</strong></a>: A simple PHP/mySQL CRUD example</li>
                <li><a href="./library/reference_desk"><strong>Reference Desk</strong></a>: Two Vanilla JS / AJAX / PHP exercises</li>
			</ul>
		</p>

		<h3>Sources</h3>
		<p>I used the following <a href="https://www.lynda.com/" target="_blank">Lynda.com</a> tutorials:</p>
		<ul>
			<li><a href="https://www.lynda.com/PHP-tutorials/Installing-Apache-MySQL-PHP/537759-2.html" target="_blank">Installing Apache, MySQL, and PHP</a></li>
			<li><a href="https://www.lynda.com/PHP-tutorials/PHP-MySQL-Essential-Training-1-Basics/587674-2.html" target="_blank">PHP with MySQL Essential Training: 1 The Basics</a></li>
		<li><a href="https://www.lynda.com/Ajax-tutorials/Ajax-PHP/513593-2.html" target="_blank">Ajax with PHP: Add Dynamic Content to Websites</a></li>
        </ul>
		<h3>Repository</h3>
		<p>For code review purposes, I've placed the site framework <a href="https://github.com/FieryStudios/php-and-mysql" target="_blank">on my GitHub page</a>.</p>

		</div>
	  </div>
	</section>
	<?php include(SHARED_PATH . '/footer.php') ?>

	</div>
  </body>
  <?php require(SHARED_PATH . '/scripts.php') ?>
</html>
