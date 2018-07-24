<!DOCTYPE html>
<html>
<head>
	<title>BIG Project homeowners-association</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <a class="navbar-brand" href="index.php">BIG Project homeowners-association</a>

		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarText">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item">
		        <a class="nav-link" href="register.php">Register</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="logout.php">Log out</a>
		      </li>
		    </ul>
		  </div>
		</nav>
	</header>
	<main>
		<div class="jumbotron">
			<h1 class="display-4">Welcome to</h1>
		  <h1>Your home community</h1> 
	
		</div>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
			<div class="form-group">
				<label for="exampleFormControlInput1">Email:</label>
				<input name="email"> <!--id="datepicker-->
			</div>

			<div class="form-group">
				<label for="exampleFormControlInput1">Password:</label>
				<input class="form-control" name="pass">
			</div>
			
			<button type="submit" class="btn btn-block btn-primary" name="btn_login">Login</button>
		</form>
		
	</main>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>