<?php require_once('../../../private/initialize.php') ?>
<?php
  session_start();

  if(!isset($_SESSION['favorite_fish'])) { $_SESSION['favorite_fish'] = []; }

  function is_favorite($id){
      return in_array($id, $_SESSION['favorite_fish']);
  }

?>
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
    .favorite{
        background:cornflowerblue!important;
    }

    button.favorite-button {
        display:inline-block;
      }
      .favorite button.favorite-button {
        display:none!important;
      }
       button.unfavorite-button {
        display:none;
      }
      .favorite button.unfavorite-button {
        display:inline-block!important;
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
                has several free APIs, including <a href="https://data.michigan.gov/Environment/Michigan-Fish/he9h-7fpa" target="_blank">this list of local fish species</a>. I used this API as an exercise in both fetching data from an API, and creating a persistent "Favorite" system.</p>

                <p>First, select your favorite fish, then click the <i>Read more about your favorite fish</i> button to read more about them.</p>
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

<script>
    var fishJSON = {};
    function fetchFish(){

      var fishTable = document.getElementById ("fish-table");

      var fishString = "<div class='col-6'><table class='table-striped table-bordered'>";
          fishString += "<tr><th>Common Name</th><th>Favorite This Fish</th></tr>";

      var xhr = new XMLHttpRequest();
      xhr.open('GET', 'https://data.michigan.gov/resource/he9h-7fpa.json', true);

      xhr.onreadystatechange = function(){
            if(xhr.readyState == 2){
                fishTable.innerHTML ='<img src="https://media.giphy.com/media/3o85xqLJyVaLNVKEDK/giphy.gif" width="100" height="100" alt="swimming fish loading gif" />';
            }
            if(xhr.readyState == 4 && xhr.status == 200){
                fishJSON = JSON.parse(xhr.responseText);

                for (key in fishJSON) {

                  if (fishJSON.hasOwnProperty(key)) {

                    fishString += '<tr class=""><td>' + fishJSON[key].commonname + '</td>';
                    fishString += '<td id="' + fishJSON[key].id + '"><button class="btn btn-info favorite-button">Favorite this fish</button><button class="unfavorite-button btn btn-warning">Unfavorite this fish</button></td></tr>';
                  }
                }

                fishString += '</table></div>';
                fishString += '<div class="col-6"><button class="btn btn-primary" id="readmore-button">Read more about your favorite fish</button></div>';

                fishTable.innerHTML = fishString;
                var readMore = document.getElementById ("readmore-button");
                readMore.addEventListener("click", fetchMoreAboutFish);

                var favoriteButtons = document.getElementsByClassName("favorite-button");
                  for(i=0; i < favoriteButtons.length; i++) {
                   favoriteButtons.item(i).addEventListener("click", favorite);
                }
                var unFavoriteButtons = document.getElementsByClassName("unfavorite-button");
                  for(i=0; i < unFavoriteButtons.length; i++) {
                   unFavoriteButtons.item(i).addEventListener("click", UNfavorite);
                }


            }
        }
        xhr.send();
    }

function fetchMoreAboutFish(){
    console.log('I fished myself to death ');
}

function favorite() {
console.log('favorite!');
    var parentTD = this.parentElement;
    var parentTR = parentTD.parentElement;

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'favorite.php', true);
    xhr.setRequestHeader('Content-type',
'application/x-www-form-urlencoded');
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onreadystatechange = function () {
      if(xhr.readyState == 4 && xhr.status == 200) {
        var result = xhr.responseText;
      if ( result == 'true'){
          parentTR.classList.add('favorite');
          }
        console.log('Favorite Result: ' + result);
      }
    };
    xhr.send("id=" + parentTD.id);
  }


 function UNfavorite() {

    var parentTD = this.parentElement;
    var parentTR = parentTD.parentElement;

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'unfavorite.php', true);
    xhr.setRequestHeader('Content-type',
'application/x-www-form-urlencoded');
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onreadystatechange = function () {
      if(xhr.readyState == 4 && xhr.status == 200) {
        var result = xhr.responseText;
      if ( result == 'true'){
          parentTR.classList.remove('favorite');
          }
        console.log('UNFavorite Result: ' + result);
      }
    };
    xhr.send("id=" + parentTD.id);
  }


//"image"  "commonname"   "narrative"  "latinname" : "Salmo salar"

document.addEventListener("DOMContentLoaded", function() {
  fetchFish();
});




    </script>
	</div>
  </body>
  <?php require(SHARED_PATH . '/scripts.php') ?>
</html>