<?php 
// If they are not logged in, send them to login page
if(!isset($_SESSION['access_token'])) {
    header('location: login.php');
    echo "<script>location.href = 'login.php'</script>";
    echo "<h1>Invalid access!!</h1>";
    exit();
}
?>
