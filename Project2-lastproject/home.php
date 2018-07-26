<?php
ob_start();
session_start();
require_once 'dbconnect.php';
require_once 'actions/db_connect.php';
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
  		        <a class="nav-link" href="logout.php">Who we are</a>
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
      		  <p>If you have any problems or issues</h2>
            <a class="btn btn-primary" href="contact.html"> ping us a message </a>
          </div>
        </div>
    <div class="container">
    <div class="row">
      <h4>This are the resolutions of your community:</h4>
      <div class='card float-left center-block p-4 col-sm-12 col-md-6' style='width: 19rem;'>

              <?php

              $sql = "SELECT * FROM resident";

              $result = $connect->query($sql);


              if($result->num_rows > 0) {

                  while($row = $result->fetch_assoc()) {

                      echo"

                      <img class='card-img-top' src='".$row['pic']."' alt='resident Image'>

                        <div class='card-body'>
                          <h5 class='card-title'>".$row['residentID']." ". $row['last_name']."</h5>
                          <ul class='list-unstyled'>
                            <li><em>Title: </em>".$row['headline']."</li>
                            <li><em>Description: </em>".$row['content']."</li>
                            <li><em>Category: </em>".$row['category']."</li>

                      ";
                    }
                    } else {
                        echo "<p><center>No Data Avaliable</center></p>";
                    }
                    ?>

            <button href='#' class='btn btn-primary'>Vote +</button>
            <button href='#' class='btn btn-primary'>Vote -</button>
          </ul>
          //TODO: comment section

        </div>
				<div class='card'>
						<div class='card-body'>
        <?php

        $sql = "SELECT * FROM post WHERE fk_residentID = $fk_residentID";

        $result = $connect->query($sql);


        if($result->num_rows > 0) {

            while($row = $result->fetch_assoc()) {

                echo
                "

                          <h5 class='card-title'>".$row['headline']."</h5>
                          <p class='card-text'>".$row['content']."</p>
                          <p class='card-text'>
                            <small class='text-muted'>Posted in ".$row['category']." - on ".$row['datetime']." </small>
                          </p>
                        ";
                }
              } else {
                echo "<p><center>No Data Avaliable</center></p>";
              }
              ?>
						</div>
				</div>
      </div>
    </div>
        <div class="row bottom">

      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>
<?php ob_end_flush(); ?>
