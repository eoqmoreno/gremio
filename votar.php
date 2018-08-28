	<!DOCTYPE html>
<html>
<?php include 'head.php'; ?>
<body class="bg-verde">
<?php include 'header.php' ?>
	<label class="branco title float-right">Número do SIGE: <?php if(isset($_COOKIE["sige"])){echo $_COOKIE['sige'];}else{echo"Vocé não está logado!";};?></label><br>

	<form class="text-center container col-md-4 bg-branco border-radius p-2 mt-2 align-middle" action="vot.php" method="post">
		<label class="title azul" for="chapanome">Nome da Chapa</label><br>
		<select id="chapanome" class="form-control" name="chapa" required>
<?php
include 'conexao.php';
	if(isset($_COOKIE['sige'])){
	$sql = mysqli_query($con,"SELECT DISTINCT chapa FROM chapa")or die(mysql_error());
	while ($busca = mysqli_fetch_array($sql)) {
		$a = $busca['chapa'];
        
		echo "<option value=".$a.">".$a."</option>";
		}
	}
?>
		</select>
		<input type="submit" class="btn branco bg-verde mt-2" value="VOTAR">
	</form>

</body>
</html>
