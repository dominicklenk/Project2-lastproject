
<?php
session_start();
if (!isset($_SESSION['users'])) {
 header("Location: index.php");
} else if(isset($_SESSION['users'])!="") {
 header("Location: home.php");
}

if (isset($_GET['logout'])) {
 unset($_SESSION['users']);
 session_unset();
 session_destroy();
 header("Location: index.php");
 exit;
}
?>
