<?php
ob_start();
session_start();
require_once 'dbconnect.php';
require_once 'actions/db_connect.php';


$res=mysqli_query($conn, "SELECT * FROM post");
$postRow=mysqli_fetch_array($res, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
	<title>FinalProject2 - HomeOwners association</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous"><!-- for the heart icon in the footer -->
  <link rel="stylesheet" href="style.css" />
</head>

<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <a class="navbar-brand" href="index.php">HomeOwners Association</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
	  </button><!-- navbar -->
		  <div class="collapse navbar-collapse" id="navbarText">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item">
		        <a class="nav-link" href="register.php">Register</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="bio.php">Who we are</a>
		      </li>
		    </ul>
		  </div>
		</nav>
	</header>
  <section>
  	<main>
  		<div class="jumbotron jumbotron-fluid">
        <div class="jumbo-headline">
          <h1 class="display-4">Welcome to</h1>
    		  <h2>your home community</h2>
          <a class="btn btn-primary" href="index_contact.html"> ping us a message </a>
        </div>
      </div>
          <div class="landingpage-container">
						<div class="card-group">
							<div class="card">
						  	<a href="article-window.html"><img class="card-img-top" src="img/friends_headerV2.jpg" alt="Card image cap"></a>
							  <div class="card-body">
							    <h5 class="card-title">Friends of the Town Green</h5>
							    <p class="card-text truncate">Friends of the Vienna Town Green was established to help support free concerts and performances at the Town Green. Spring through fall, the Town Green hosts concerts and performances for all ages and tastes.</p>
							  </div>
							</div>
							<div class="card">
							  <a href="article-window.html"><img class="card-img-top" src="img/fave13.jpg" alt="Card image cap"></a>
							  <div class="card-body">
							    <h5 class="card-title">Halloween Parade Awards Ceremony</h5>
							    <p class="card-text truncate">Each year, the Town recognizes parade winners at a Town Council meeting in November. Judged categories include youth band, float with music, youth performer, antique/classic vehicle, adult band, float without music, and adult performer.</p>
							  </div>
							</div>
							<div class="card">
							  <a href="article-window.html"><img class="card-img-top" src="img/home-window-film.jpg" alt="Card image cap"></a>
							  <div class="card-body">
							    <h5 class="card-title">State support for window insulation</h5>
							    <p class="card-text truncate">Findings are used to support the development of GSA performance. The highly insulating window retrofit product (Hi-R panel) tested is a pre-manufactured.</p>
							  </div>
							</div>
						</div>
        </div>
	  </main>

  </section>
  <footer>

  </footer>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>
<?php ob_end_flush(); ?>
