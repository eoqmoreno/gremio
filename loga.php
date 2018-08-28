<?php
$user = $_POST['user'];
include 'conexao.php';
$sql = mysqli_query($con,"SELECT * FROM pessoas WHERE sige='$user'") or die(mysqli_error());
while ($busca= mysqli_fetch_array($sql)) {
		$b= $busca['sige'];
		}
if (mysqli_num_rows($sql)>0) {
      setcookie("sige","$b");
      echo "<script>location.href='tabela.php';</script>";

}else{
     echo "<script>alert('Login incorreto, procure um fiscal no local.');location.href='index.php';</script>";
}
?>