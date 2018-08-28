<!DOCTYPE html>
<html>
<?php include 'head.php'; ?>
<body>
<?php include 'header.php'; ?>
<table class="table col-md-5 text-center">
    <thead class="bg-verde branco">
        <th scope="col">Candidato</th>
        <th scope="col">Cargo</th>
        <th scope="col">Chapa</th>
    </thead>
    <tbody>
        <?php
        include 'conexao.php';
        $sql = mysqli_query($con,"SELECT * FROM candidato ORDER BY chapa DESC")or die(mysql_error());
        while ($busca = mysqli_fetch_array($sql)) {
            $candidato = $busca['candidato'];
            $chapa = $busca['chapa'];
            $cargo = $busca['cargo'];
            echo "<tr><td>$candidato</td><td>$cargo</td><td>$chapa</td></tr>";
            }
        ?>   
    </tbody> 
</table>

<form action="votar.php">
    <input class="form-control btn branco bg-verde" type="submit" value="VOTAR">
</form>

</body>
</html>
