<?php 

if ($_GET[type] == 'delete_request') {

	$req_id = $_GET[req_id];

	$sql_delete = pg_query("DELETE from user_request where id_no = '$req_id' and email_user = '$user[email]'  ;");
	
	
	header('location:profile.php#request');


}




?>