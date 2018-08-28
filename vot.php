<?php
ob_start();
include 'conexao.php';
$chapa = $_POST['chapa'];
$sige= "sige";
if (isset($_COOKIE[$sige])) {
	$sql= mysqli_query($con,"SELECT * FROM voto WHERE sige='$_COOKIE[$sige]'")or die(mysqli_error());
	if (mysqli_num_rows($sql)>0) {
		echo "<script>alert('Voto já computado anteriormente!');location.href='exit.php';</script>";
	}else{
		mysqli_query($con,"INSERT INTO voto(chapa,sige) VALUES ('$chapa','$_COOKIE[$sige]')")or die(mysqli_error());
		echo "<script>alert('Voto computado com sucesso!');location.href='exit.php';</script>";
	}
}else{
	echo "<script>alert('Você não está logado(a)');location.href='exit.php';</script>";
}
?>