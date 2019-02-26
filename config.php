<?php
$hostname_db1 = "localhost";
$database_db1 = "jobgis";
$username_db1 = "postgres";
$password_db1 = "1234";
$port = "5433";

$db = pg_connect("host=$hostname_db1 user=$username_db1 port=$port password=$password_db1 dbname=$database_db1") or die("Can't Connect Server");

pg_query("SET client_encoding = 'utf-8'"); 

$year =  date("Y"); 


?>
