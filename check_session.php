<?php 
// If they are not logged in, send them to login page
if(!isset($_SESSION['access_token'])) {
    header('location: login.php');
}
?>
