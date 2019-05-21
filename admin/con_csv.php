 <?php

// $file_data = file_get_contents('1_no_utf.csv');
// $utf8_file_data = utf8_encode($file_data);
// $new_file_name = 'new_file.csv';
// file_put_contents($new_file_name , $utf8_file_data );


$data = file_get_contents('1_no_utf.csv');
$data = mb_convert_encoding($data, 'UTF-8', 'OLD-ENCODING');
file_put_contents('new_file.csv', $data);



 ?>
 

