<?php 
session_start();
  

setcookie("type", "", time()-86400  );
setcookie("pass", "", time()-86400  );
setcookie("status", "", time()-86400  );
setcookie("status_com", "", time()-86400  );


    header('Location:login.php');


?>