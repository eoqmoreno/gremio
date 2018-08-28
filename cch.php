<?php
ob_start();
include 'conexao.php';

$chapa = $_POST['chapa'];

$a = mysqli_query($con,"SELECT chapa FROM chapa WHERE chapa = '$chapa'")or die(mysqli_error()); 
$b = mysqli_num_rows($a);
if ($b>0) {
  header('location:index.php');
}else{
	$sql = mysqli_query($con,"INSERT INTO chapa (chapa) VALUES ('$chapa')")or die(mysqli_error());
	header('location:admin.php');
}
?>