<?php 

if ($_GET[type] == 'delete_story') {

	$id_story = $_GET[id_story];

	$sql_delete = pg_query("DELETE from story where id_story = '$id_story' and id_user = '$id'  ;");
	
	
	header('location:profile.php#story');


}



if ($_GET[type] =='delete_img_post') {
	$imgid = $_GET[imgid];
	$sql_delete = pg_query("DELETE from photo_user where id_img = '$imgid' and id_user = '$id'  ;");
	header('location:profile.php');
}

?>