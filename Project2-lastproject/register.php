<?php
ob_start();
session_start(); // start a new session or continues the previous
require_once 'dbconnect.php';
require_once 'actions/db_connect.php';

$error = false;
if ( isset($_POST['btn-signup']) ) {

 // sanitize user input to prevent sql injection
 $fname = trim($_POST['first_name']);
 $fname = strip_tags($fname);
 $fname = htmlspecialchars($fname);

 $lname = trim($_POST['last_name']);
 $lname = strip_tags($lname);
 $lname = htmlspecialchars($lname);

 $phone = trim($_POST['phone']);
 $phone = strip_tags($phone);
 $phone = htmlspecialchars($phone);

 $email = trim($_POST['email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);

 $password = trim($_POST['password']);
 $password = strip_tags($password);
 $password = htmlspecialchars($password);

 // basic name validation
 if (empty($fname)) {
  $error = true;
  $nameError = "Please enter your first name.";
} else if (strlen($fname) < 3) {
  $error = true;
  $nameError = "Name must have atleat 3 characters.";
} else if (!preg_match("/^[a-zA-Z ]+$/",$fname)) {
  $error = true;
  $nameError = "Name must contain alphabets and space.";
 }

 if (empty($lname)) {
  $error = true;
  $nameError = "Please enter your last name.";
} else if (strlen($lname) < 3) {
  $error = true;
  $nameError = "Name must have atleat 3 characters.";
} else if (!preg_match("/^[a-zA-Z ]+$/",$lname)) {
  $error = true;
  $nameError = "Name must contain alphabets and space.";
 }

 //basic email validation
 if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address.";
 } else {
  // check whether the email exist or not
  $query = "SELECT email FROM resident WHERE email='$email'";
  $result = mysqli_query($conn, $query);
  $count = mysqli_num_rows($result);
  if($count!=0){
   $error = true;
   $emailError = "Provided Email is already in use.";
  }
 }

 // password validation
 if (empty($password)){
  $error = true;
  $passError = "Please enter password.";
} else if(strlen($password) < 6) {
  $error = true;
  $passError = "Password must have atleast 6 characters.";
 }

 // password hashing for security
$password = hash('sha256', $pass);

 // if there's no error, continue to signup
 if( !$error ) {

  $query = "INSERT INTO resident(first_name,last_name,email,phone,password) VALUES('$fname','$lname', '$email','$phone','$password' )";
  $res = mysqli_query($conn, $query);

  if ($res) {
   $errTyp = "success";
   $errMSG = "Successfully registered, you may login now";
   unset($fname);
   unset($lname);
   unset($email);
   unset($phone);
   unset($password);
  } else {
   $errTyp = "danger";
   $errMSG = "Something went wrong, try again later...";
  }

 }
}
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
		        <a class="nav-link" href="login.php">Register</a>
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
          <h2>your home community</h2>
          <a class="btn btn-primary" href="contact.html"> ping us a message </a>
        </div>
        <div class="container float-right">
          <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
            <h2>Here you can sign up</h2>
            <?php if ( isset($errMSG) ) {  ?>
            <div class="alert alert-<?php echo $errTyp ?>">
              <?php echo $errMSG; ?>
            </div>
    <?php } ?>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">
                  <i class="fas fa-user"></i>
                </span>
              </div>
              <input type="text" name="first_name" class="form-control" placeholder="Enter your first Name" aria-label="fname" aria-describedby="basic-addon1" maxlength="50" value="<?php echo $fname ?>" />
              <span class="text-danger"><?php echo $nameError; ?></span>
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">
                  <i class="fas fa-user"></i>
                </span>
              </div>
              <input type="text" name="last_name" class="form-control" placeholder="Enter your Last Name" aria-label="lname" aria-describedby="basic-addon1" maxlength="50" value="<?php echo $lname ?>" />
              <span class="text-danger"><?php echo $nameError; ?></span>
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">
                  <i class="fas fa-at"></i>
                </span>
              </div>
              <input type="email" name="email" class="form-control" placeholder="Enter Your Email" aria-label="name" aria-describedby="basic-addon1" maxlength="40" value="<?php echo $email ?>" />
              <span class="text-danger"><?php echo $emailError; ?></span>
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">
                  <i class="fas fa-phone-volume"></i>
                </span>
              </div>
              <input type="text" name="phone" class="form-control" placeholder="Enter Your Phone Number" aria-label="phone" aria-describedby="basic-addon1" maxlength="40" value="<?php echo $phone ?>" />
              <span class="text-danger"><?php echo $emailError; ?></span>
            </div>

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">
                  <i class="fas fa-lock"></i>
                </span>
              </div>
              <input type="password" name="password" class="form-control" placeholder="Enter your prefered Password" aria-label="name" aria-describedby="basic-addon1" maxlength="15">
              <span class="text-danger"><?php echo $passError; ?></span>
            </div>
            <section class="zip">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">ZIP</label>
                </div>
                <select class="custom-select" id="inputGroupSelect01" name="land_register">
                  <option type="land_register" selected>Pick your ZIP</option>
              <?php

              $sql = "SELECT * FROM land_register";
              $result = $connect->query($sql);


              if($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                      echo

                      " <option value='".$row['address_street']."'>".$row['address_street']."</option>

                      ";
                  }
              } else {
                  echo "<p><center>Please log in to your community</center></p>";
              }
              ?>
            </select>
          </div>
            </section>
            <section class="house">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect02">address</label>
                </div>
                <select class="custom-select" id="inputGroupSelect02">
                  <option selected>Pick your house</option>
            <?php

            $sql = "SELECT * FROM house";
            $result = $connect->query($sql);


            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo
                    " <option value='".$row['houseID']."'>".$row['houseID']."</option>";
                }
            } else {
                echo "<p><center>Please log in to your community</center></p>";
            }
            ?>
          </select>
        </div>

          </section>
          <section class="apartment">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect03">apartment</label>
              </div>
              <select class="custom-select" id="inputGroupSelect03">
                <option selected>Pick your apartment</option>
          <?php

          $sql = "SELECT * FROM apartment";
          $result = $connect->query($sql);


          if($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                  echo

                  "
                         <option value='".$row['apartment_no']."'>".$row['apartment_no']."</option>
                       ";
              }
          } else {
              echo "<p><center>Please log in to your community</center></p>";
          }
          ?>
        </select>
      </div>
        </section>
        <section class="pax">

          <div class='dropdown'>
             <button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
               How many people live with you?
             </button>
               <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                 <a class='dropdown-item' href='#'>1</a>
                 <a class='dropdown-item' href='#'>2</a>
                 <a class='dropdown-item' href='#'>3</a>
                 <a class='dropdown-item' href='#'>4</a>
                 <a class='dropdown-item' href='#'>5</a>
                 <a class='dropdown-item' href='#'>6</a>
                 <a class='dropdown-item' href='#'>> 6 come on...</a>
        </div>
    </div>
        </section>

        <button type="submit" class="btn btn-block btn-primary" name="btn-signup">Sign Up</button>
        <a href="login.php">Already a User? Login here</a>
      </form>
    </main>
    </section>
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
</body>
</html>
<?php ob_end_flush(); ?>
