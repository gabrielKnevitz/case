<?php
require_once('..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'conexao.php');
session_start();
$email= $_SESSION['usuario'];

$consulta= "SELECT * FROM tb_colaboradores where email= '{$email}'";
$resultado= $conexao->query($consulta);

while($row = $resultado->fetch_assoc()){
    $elogiador = $row['matricula'];
}

$consult = "SELECT * FROM tb_reacoes WHERE elogiador ='{$elogiador}'"; 
$result= $conexao->query($consult);

?>
<html>
    <head>
    <title>Reações realizadas</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/customizacaoEdicao.css">
    <link rel="icon" href="../images/logoAutoU.png">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="../view/logado.php">Central de reações</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" href="../view/listaReagir.php">Reagir a um colaborador</a>
                    <a class="nav-link active" href="">Reações realizadas</a>
                    <a class="nav-link active" href="../view/rank.php">Ranking</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th class="col-2">Elogiado</th>
                        <th class="col-2">Nome</th>
                        <th class="col-2">Motivo</th>
                        <th class="col-2">Reação</th>
                        <th class="col-2">Edição</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while($dado = $result->fetch_assoc()){
                        $elogiado = $dado['elogiado'];
                        $cons = "SELECT * FROM tb_colaboradores where matricula= '{$elogiado}'";
                        $res = $conexao->query($cons);?>
                        <?php while($info = $res->fetch_assoc()){?>
                        <tr>
                        <td> <img src="<?php echo "../controller/Upload/$info[foto_colaborador]"?>"></td>
                        <td><?php echo $info["nome"], " ", $info["sobrenome"];?></td>
                        <td><?php echo $dado["motivo"]?></td>
                        <td><?php echo $dado["elogio"]?></td>
                        <td><a href="../view/edicao.php?id=<?php echo $dado["id_reacao"]?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
  <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
</svg></a></td>
                        </tr>
                        <?php break; } ?>
                    <?php } ?>
            </tbody>
        </table>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
        </script>
</body>
</html>