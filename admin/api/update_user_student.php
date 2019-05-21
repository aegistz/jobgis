<?php 
include('../config.php');


				
if ( isset($_POST[update]) ) {
		$strSQL = "UPDATE user_job SET 
		title_name='".$_POST["title_name"]."'
	
									WHERE id_no = '".$_POST["id_no"]."';";
								
									$objQuery = pg_query($strSQL);
									if($objQuery)
									{
										//echo "<script>alert('Save successfully!');</script>";
										echo "<script>window.top.window.showResult('1');</script>";
									}
									else
									{
										//echo "<script>alert('Error! Cannot save data');</script>";
										echo "<script>window.top.window.showResult('2');</script>";
									}


}

	



?>
