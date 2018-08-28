<!DOCTYPE html>
<html>
<?php include 'head.php'; ?>
<body class="bg-verde"> 
<?php include 'header.php'; ?>  

  <img class="col-md-8" src="img/1.png"></img>
  <form class="col-md-3 d-inline-block align-middle container bg-branco p-2 border-radius text-center" action="loga.php" method="post">
    <label class="title verde" for="user">Votação do Grêmio</label><br>
    <input class="form-control" id="user" placeholder="Número do SIGE" type="text" name="user" required autofocus>
    <input class="btn btn-primary bg-verde border-none mt-2 float-right" type="submit" value="Logar">
  </form>

</body>
</html>
