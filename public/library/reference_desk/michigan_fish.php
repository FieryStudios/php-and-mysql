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
    }    .modal-dialog{        max-height: 90vh;        overflow: scroll;    }
    .modal.show{
        background: rgba(0,0,0, .5);
        display:block!important;
    }    .modal .description{        display:block;        font-size: 12px;        margin: 10px;        height: 20vh;        overflow:scroll;        padding: 10px;    }    .modal .fish-image{        display:block;        margin: 10px auto;        height: 20vh;    }
    </style>
  <body> <div class="modal fade" id="fish-modal" tabindex="-1" role="dialog">      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">        <div class="modal-content">          <div class="modal-header">            <h5 class="modal-title" id="fish-modal-header"></h5>            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeFishModal">              <span aria-hidden="true">&times;</span>            </button>          </div>          <div id="fish-box" class="modal-body">          </div>        </div>      </div>    </div>
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

    var fishJSON = {};      var fishLoading = document.getElementById ("fish-loading");      var fishTable = document.getElementById ("fish-table");      var fishModal = document.getElementById ("fish-modal");      var fishModalHeader = document.getElementById ("fish-modal-header");      var fishBox = document.getElementById ("fish-box");    function fetchFish(){      var fishString = "<div class='col-6'><table class='table-striped table-bordered'>";          fishString += "<tr><th>Common Name</th><th>More About This Fish</th></tr>";      var xhr = new XMLHttpRequest();      xhr.open('GET', 'https://data.michigan.gov/resource/he9h-7fpa.json', true);      xhr.onreadystatechange = function(){            if(xhr.readyState == 2){                fishTable.innerHTML ='<img src="https://media.giphy.com/media/3o85xqLJyVaLNVKEDK/giphy.gif" width="100" height="100" alt="swimming fish loading gif" />';            }            if(xhr.readyState == 4 && xhr.status == 200){                fishJSON = JSON.parse(xhr.responseText);                for (key in fishJSON) {                  if (fishJSON.hasOwnProperty(key)) {                    fishString += '<tr class=""><td>' + fishJSON[key].commonname + '</td>';                    fishString += '<td><button id="' + fishJSON[key].id + '" class="readmore-button btn btn-primary">Read More</a></td></tr>';                  }                }                fishString += '</table></div>';                fishTable.innerHTML = fishString;                var readmoreButtons = document.getElementsByClassName("readmore-button");                  for(i=0; i < readmoreButtons.length; i++) {                   readmoreButtons.item(i).addEventListener("click", openFishModal);                }                var closeButtons = document.getElementsByClassName("close");                for(i=0; i < closeButtons.length; i++) {                   closeButtons.item(i).addEventListener("click", closeFishModal);                }            }        }        xhr.send();    };    function closeFishModal(){        fishModal.classList.remove('show');    };   function openFishModal(){        var $id = (Number(this.id) - 1);        fishModalHeader.innerHTML = '';        fishBox.innerHTML = '';        var latinName = fishJSON[$id].latinname || '';        var imgPath = (fishJSON[$id].image) ? "https://data.michigan.gov/views/he9h-7fpa/files/" + fishJSON[$id].image : 'https://media.giphy.com/media/3o85xqLJyVaLNVKEDK/giphy.gif';        var fishString = "<div class='readmore-fish'><img src='" + imgPath + "' class='fish-image' alt='" + fishJSON[$id].commonname + "' />";        fishString += "<h3>" + fishJSON[$id].commonname + "</h3>";        fishString += "<div class='latinname'><em>" + latinName + "</em></div>";        fishString += "<div class='description'><p>" + fishJSON[$id].narrative + "</p></div>";        fishModalHeader.innerHTML = fishJSON[$id].commonname;        fishBox.innerHTML = fishString;        fishModal.classList.add('show');    };

document.addEventListener("DOMContentLoaded", function() {

  fetchFish();

});




    </script>

</html>