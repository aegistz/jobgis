<?php 

if( $_COOKIE["status"] != 'student'  )
{
 header("location:login.php");
}


?>