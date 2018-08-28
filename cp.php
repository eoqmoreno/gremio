<?php
ob_start();
include 'conexao.php';

$sige = $_POST['sige'];

$a = mysqli_query($con,"SELECT sige FROM pessoas WHERE sige = '$sige'")or die(mysqli_error()); 
$b = mysqli_num_rows($a);
if ($b>0) {
	header('location:index.php');

}else{
	$sql = mysqli_query($con,"INSERT INTO pessoas (sige) VALUES ('$sige')")or die(mysqli_error());
	header('location:admin.php');
}
?>