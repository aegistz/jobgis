<?php 
session_start();
    unset($_COOKIE["type"]);
    unset($_COOKIE['pass']);
   
    header('Location:login.php');


?>