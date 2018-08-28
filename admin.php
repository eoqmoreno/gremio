<html>
<?php include 'head.php'; ?>
<?php include 'header.php'; ?>

<body class="bg-cinza">
    
    <div id="login" class="container bg-branco text-center col-md-3 mt-2 border-radius text-left p-2">
        <label class="title azul">Senha de Administrador</label>
        <input type="password" class="form-control" id="useradmin"/>
        <button onclick="check()" class="btn bg-verde branco title mt-2 float-right">Entrar</button><br><br>
    </div>

    <div id="menu" class="container mt-2 p-0 col-md-12 text-center ">
        <button class="btn bg-verde branco title mt-2" type="button" data-toggle="collapse" data-target="#cadchapa" aria-expanded="false" aria-controls="collapseExample">CADASTRO DE CHAPA</button>
        <button class="btn bg-verde branco title mt-2" type="button" data-toggle="collapse" data-target="#cadcandidato" aria-expanded="false" aria-controls="collapseExample">CADASTRO DE CANDIDATO</button>
        <button class="btn bg-verde branco title mt-2" type="button" data-toggle="collapse" data-target="#cadaluno" aria-expanded="false" aria-controls="collapseExample">CADASTRO DE ALUNOS</button>
        <button class="btn bg-verde branco title mt-2" type="button" data-toggle="collapse" data-target="#contvotos" aria-expanded="false" aria-controls="collapseExample">RESULTADO DE VOTOS</button>
        <button class="btn bg-verde branco title mt-2" type="button" data-toggle="collapse" data-target="#vervotos" aria-expanded="false" aria-controls="collapseExample">CONTROLE DE VOTOS POR PESSOA</button>
        <button class="btn bg-verde branco title mt-2" type="button" data-toggle="collapse" data-target="#listadealunos" aria-expanded="false" aria-controls="collapseExample">LISTA DE ALUNOS</button>
        <button class="btn bg-verde branco title mt-2" type="button" data-toggle="collapse" data-target="#listadechapas" aria-expanded="false" aria-controls="collapseExample">LISTA DE CHAPAS</button>
        <button class="btn bg-verde branco title mt-2" type="button" data-toggle="collapse" data-target="#listadecandidatos" aria-expanded="false" aria-controls="collapseExample">LISTA DE CANDIDATOS</button>
        <button class="btn bg-verde branco title mt-2" type="button" data-toggle="collapse" data-target="#resetar" aria-expanded="false" aria-controls="collapseExample">RESETAR SISTEMA</button>

        <div class="collapse" id="cadcandidato">
            <form class="bg-branco container col-md-3 mt-2 border-radius text-left p-2" action="cca.php" method="post">
                <label class="title azul" for="name">Nome</label><br>
                <input id="name" class="form-control" type="text" name="nome" required>
                <label class="title azul" for="chapanome">Chapa</label>
                <select id="chapanome" class="form-control" name="chapa" required>
                    <?php
                    include 'conexao.php';
                        $sql = mysqli_query($con,"SELECT chapa FROM chapa")or die(mysqli_error());
                        while ($busca = mysqli_fetch_array($sql)) {
                            $chapa = $busca['chapa'];
                            echo "<option value=".$chapa.">".$chapa."</option>";
                            }
                    ?>
                </select>
                <label class="title azul" for="cargo">Cargo</label><br>
                <select id="cargo" class="form-control" name="cargo">
                <option value="Presidente">Presidente</option>
                <option value="Vice-Presidente">Vice-Presidente</option>
                <option value="Secretário Geral">Secretário Geral</option>
                <option value="Primeiro Secretário">Primeiro Secretário</option>
                <option value="Tesoureiro Geral">Tesoureiro Geral</option>
                <option value="Primeiro Tesoureiro">Primeiro Tesoureiro</option>
                <option value="Diretor Social">Diretor Social</option>
                <option value="Diretor de Imprensa">Diretor de Comunicação</option>
                <option value="Diretor Cultural">Diretor Cultural</option>
                <option value="Diretor de Esportes">Diretor de Esportes</option>
                <option value="Diretor de Politicas Educacionais">Diretor de Politicas Educacionais</option>
                <option value="Diretor de Infraestrutura">Diretor de Infraestrutura</option>
                <option value="Suplente">Suplente</option>
                </select>
                <input class="btn azul bg-verde title mt-2" type="submit" value="Cadastrar">
            </form>
        </div>

        <div class="collapse" id="cadchapa">
            <form action="cch.php" class="bg-branco container col-md-3 mt-2 border-radius text-left p-2" method="post">
                <label class="title azul">Nome da chapa</label><br>
                <input class="form-control" type="text" name="chapa" required><br>
                <input type="submit" class="btn bg-verde azul" value="CADASTRAR">
            </form>        
        </div>

        <div class="collapse" id="cadaluno">
            <form class="bg-branco container col-md-3 mt-2 border-radius text-left p-2" action="cp.php" method="post">
                <label class="title azul">Número do SIGE Escolar</label><br>
                <input class="form-control" type="text" name="sige" required autofocus><br>
                <input type="submit" class="btn bg-verde azul" value="CADASTRAR">
            </form>	
        </div>
        
        <div class="collapse" id="contvotos">
            <table class="table text-center">
                    <thead class="bg-verde branco">
                        <th>Chapa</th>
                        <th>Quantidade de votos</th>
                    </thead>
                    <tbody>
                    <?php
                    include 'conexao.php';
                    $sql = mysqli_query($con,"SELECT DISTINCT chapa FROM voto")or die(mysqli_error());
                    while ($busca = mysqli_fetch_array($sql)) { 
                            $chapa = $busca['chapa'];
                            $sqli = mysqli_query($con,"SELECT COUNT(chapa) FROM voto WHERE chapa = '$chapa'")or die(mysqli_error($con));
                            $quantidade = mysqli_fetch_array($sqli);
                            echo '<tr><td>'.$chapa.'</td><td>'.$quantidade[0].'</td></tr>';
                            }
                    ?>
                    </tbody>
            </table>
        </div>        

        <div class="collapse" id="vervotos">
            <table class="table text-center">
                <thead class="bg-verde branco">
                    <th>Nº do SIGE</th>
                    <th>Voto</th>
                </thead>
                <tbody>
                    <?php
                    include 'conexao.php';
                    $sql = mysqli_query($con,"SELECT * FROM voto ORDER BY sige ASC")or die(mysqli_error());
                    while ($busca = mysqli_fetch_array($sql)) { 
                        $sige = $busca['sige'];
                        $chapa = $busca['chapa'];
                        echo "<tr><td>$sige</td><td>$chapa</td></tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
        
        <div class="collapse" id="listadealunos">
            <table class="table text-center">
                <thead class="bg-verde branco">
                    <th>Nº do SIGE</th>
                </thead>
                <tbody>
                    <?php
                    include 'conexao.php';
                    $sql = mysqli_query($con,"SELECT * FROM pessoas ORDER BY sige ASC")or die(mysqli_error());
                    while ($busca = mysqli_fetch_array($sql)) { 
                        $sige = $busca['sige'];
                        echo "<tr><td>$sige</td></tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="collapse" id="listadechapas">
            <table class="table text-center">
                <thead class="bg-verde branco">
                    <th>Lista de Chapas</th>
                </thead>
                <tbody>
                    <?php
                    include 'conexao.php';
                    $sql = mysqli_query($con,"SELECT DISTINCT chapa FROM chapa")or die(mysqli_error());
                    while ($busca = mysqli_fetch_array($sql)) { 
                        $chapa = $busca['chapa'];
                        echo "<tr><td>$chapa</td></tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="collapse" id="listadecandidatos">
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
        </div>

        <div class="collapse" id="resetar">
            <form class="bg-branco container col-md-3 mt-2 border-radius text-left p-2 text-center" action="reset.php" method="post">
                <label class="title azul">DESEJA RESETAR O SISTEMA</label><br>
                <a class="btn btn-danger branco title" id="simbtn" onclick="document.getElementById('resetbtn').style.display = ''; document.getElementById('simbtn').style.display = 'none'; document.getElementById('naobtn').style.display = 'none';">Sim</a><a class="btn btn-success branco title" onclick="location.href ='admin.php'" id="naobtn">Não</a>
                <input type="submit" style="display:none;" id="resetbtn" class="btn btn-warning azul" value="RESETAR">
            </form>	
        </div>

    </div>
</body>

<script>
window.onload = function(){
    document.getElementById('menu').style.display = "none";
}
function check(){
    if(document.getElementById('useradmin').value == "admin"){
        document.getElementById('login').style.display = "none";
        document.getElementById('menu').style.display = "block";
    }else{
        alert('Senha não correspondente');
        location.href = 'exit.php';
    }
}
</script>

</html>
