<?php
    header("content-type: text/html; charset=utf-8");
    header ("Expires: Wed, 21 Aug 2013 13:13:13 GMT");
    header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header ("Cache-Control: no-cache, must-revalidate");
    header ("Pragma: no-cache");

    
include('config.php');



	 $data = $_GET['data'];
    $val = $_GET['val'];


           if ($data=='province') { 
              echo "<select name='province' class='form-control' onChange=\"dochange('amphoe', this.value)\">";
              echo "<option value=''>เลือกจังหวัด</option>\n";
              $result = pg_query("SELECT pv_tn from tambon group by pv_tn order by pv_tn asc");
              while($row = pg_fetch_array($result)){
                   echo "<option value='$row[pv_tn]' >$row[pv_tn]</option>" ;
              }
            }else if ( $data=='amphoe' ){
              echo "<select name='amphoe' class='form-control' onChange=\"dochange('tambon', this.value)\">";
              echo "<option value='0'>เลือกอำเภอ</option>\n";
              $result = pg_query("SELECT ap_tn from tambon where pv_tn = '$val' group by ap_tn ,  pv_tn order by ap_tn asc");
              while($row = pg_fetch_array($result)){
                   echo "<option value='$row[ap_tn]' >$row[ap_tn]</option>" ;
              }
            }else if ( $data=='tambon' ){ 
              echo "<select name='tambon' class='form-control'> ";
              echo "<option value='0'>เลือกตำบล</option>\n";
              $result = pg_query("SELECT tb_tn from tambon where ap_tn = '$val' group by ap_tn ,  pv_tn ,tb_tn order by tb_tn asc");
              while($row = pg_fetch_array($result)){
                   echo "<option value='$row[tb_tn]' >$row[tb_tn]</option>" ;
              }
            }


         echo "</select>\n";

        echo pg_last_error();
		
		?>
		
		