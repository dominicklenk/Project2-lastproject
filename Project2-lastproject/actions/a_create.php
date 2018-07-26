<!DOCTYPE html>
<head>
  <title>VerenaEnas Library</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous"><!-- for the heart icon in the footer -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" href="./style.css" />
</head>

<body>
  <header class="header">
    <ul class="nav nav-pills">
      <li class="nav-item">
        <a class="nav-link" href="home.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="create.php">Add media</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.html">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php?logout">Log out</a>
      </li>
    </ul>
  </header>
  <?php

  require_once 'db_connect.php';

  if($_POST) {

      $id = $_POST['ISBN'];
      $img = $_POST['img_src'];
      $title = $_POST['title'];
      $desc = $_POST['short_descr'];
      $date = $_POST['pub_date'];
      $type = $_POST['media_type'];
      $avail = $_POST['availibility'];

      $sql = "INSERT INTO media (ISBN, img_src, title,short_descr,pub_date,media_type,availibility) VALUES ('$id', '$img', '$title', '$desc','$date','$type','$avail')";

      if($connect->query($sql) === TRUE) {
          echo "<h1>New Record Successfully Created</h1>";
          echo "<a class='btn btn-light' href='../create.php'>Back</a>";
          echo "<a class='btn btn-dark' href='../home.php'>Home</a>";
      } else {
          echo "Error " . $sql . ' ' . $connect->connect_error;
      }
      $connect->close();
  }

  ?>

</body>
</html>
