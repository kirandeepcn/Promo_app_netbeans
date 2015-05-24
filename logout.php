<?php
session_start();
if(session_destroy()) 
    {
        header("Location:http://codenomad.net/promoapps/login.php"); 
    }
?>
