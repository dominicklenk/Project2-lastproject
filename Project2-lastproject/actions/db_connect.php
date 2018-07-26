<?php



$localhost = "127.0.0.1";

$username = "root";

$password = "";

$dbname = "project2";



// create connection

$connect = new mysqli($localhost, $username, $password, $dbname);
$connect ->set_charset( 'utf8' ); //to get the special character in front-end


// check connection

if($connect->connect_error) {

    die("connection failed: " . $connect->connect_error);

} else {

    // echo "Successfully Connected";

}



?>
