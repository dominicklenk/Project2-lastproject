<?php



require_once 'db_connect.php';



if($_POST) {

    $id = $_POST['ISBN'];



    $sql = "DELETE FROM media WHERE ISBN = {$id}";

    if($connect->query($sql) === TRUE) {

        echo "<p>Successfully deleted!!</p>";

        echo "<a href='../index.php'><button type='button'>Back</button></a>";

    } else {

        echo "Error updating record : " . $connect->error;

    }



    $connect->close();

}



?>
