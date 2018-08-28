<?php
ob_start();
include 'conexao.php';

$nome =$_POST['nome'];
$chapa = $_POST['chapa'];
$cargo = $_POST['cargo'];
$a = mysqli_query($con,"SELECT candidato FROM candidato WHERE candidato = '$nome'")or die(mysqli_error()); 
$b = mysqli_num_rows($a);
if ($b>0) {
    header('location:index.php');
}else{
$sql = mysqli_query($con,"INSERT INTO candidato (candidato,chapa,cargo) VALUES ('$nome','$chapa','$cargo')")or die(mysqli_error());
  header('location:admin.php');
}
?>