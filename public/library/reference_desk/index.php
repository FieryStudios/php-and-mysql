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
                has several free APIs, including <a href="https://data.michigan.gov/browse?category=Economy" target="_blank">several that focus on our economy</a>. I used these APIs as an exercise in fetching data from an API using vanilla JS and PHP.</p>
			  </div>
            <div>
                <h3>Unemployment Rate as of 4/18/18</h3>
                <div id="unemployment"></div>
                <button class="btn btn-primary" id="readmore-button" onclick="fetchData('https://data.michigan.gov/resource/hwii-cqxt.json', 'unemployment');">Fetch Unemployment Data</button>
            </div>
            <div>
                <h3>Per Capita Income as of 1/1/17</h3>
                <div id="percapita"></div>
                <button class="btn btn-primary" id="percapita-button" onclick="fetchData('https://data.michigan.gov/resource/bu54-xqjm.json', 'percapita');">Fetch Per Capita Income Data</button>
            </div>
            <div>
                <h3>Labor Force Participation as of 4/1/18</h3>
                <div id="laborforce"></div>
                <button class="btn btn-primary" id="laborforce-button" onclick="fetchData('https://data.michigan.gov/resource/ks7h-h8c7.json', 'laborforce', 'Mar-18');">Fetch Labor Force Participation Data</button>
            </div>
        </div>

		</div>
	  </div>
	</section>

	<?php
		include(SHARED_PATH . '/footer.php')
	?>

    <script>

        function fetchData(url, $target, targetDate){
            var $targetElement = document.getElementById($target);
            var output = "";
            var xhr = new XMLHttpRequest();
              xhr.open('GET', url, true);
console.log(targetDate);
              xhr.onreadystatechange = function(){
                    if(xhr.readyState == 2){
                        $targetElement.innerHTML ='Loading Data';
                    }

                    if(xhr.readyState == 4 && xhr.status == 200){
                        var json = JSON.parse(xhr.responseText);
                        for (key in json) {

                            if (json.hasOwnProperty(key)) {
                                if(json[key].date == targetDate){
                                    var record = json[key];
                                    for (key in record) {
                                      if (record.hasOwnProperty(key)) {
                                         output += json[key];

                                        }
                                    }
                                }
                            }
                          }
                           $targetElement.innerHTML = output;
                    }
                }
                xhr.send();
            }
    </script>
	</div>
  </body>
  <?php require(SHARED_PATH . '/scripts.php') ?>
</html>