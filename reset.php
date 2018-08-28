<?php
include 'conexao.php';

$sql = mysqli_query($con,"DELETE FROM candidato WHERE id") or die (mysql_error($con));
$sqli = mysqli_query($con,"DELETE FROM chapa WHERE id") or die (mysql_error($con));
$sqlii = mysqli_query($con,"DELETE FROM pessoas WHERE id") or die (mysql_error($con));
$sqliii = mysqli_query($con,"DELETE FROM voto WHERE id") or die (mysql_error($con));

echo "<h1>O Banco de dados foi resetado com sucesso!</h1>"
?>