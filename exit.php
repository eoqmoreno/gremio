<?php
ob_start();
 
// deletando o cookie
setcookie("sige", "", time()-3600);
header('location: index.php');	
?>