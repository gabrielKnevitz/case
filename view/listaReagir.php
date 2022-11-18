<?php
require_once('..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'conexao.php');

session_start();
$email= $_SESSION['usuario'];

$consulta= "SELECT * FROM tb_colaboradores where email != '{$email}' ORDER BY nome asc";
$resultado= $conexao->query($consulta);


?>

<!DOCTYPE html>
<html>
    <head>
    <title>Reagir</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/customizacaoListaReagir.css">
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
                    <a class="nav-link active" href="#">Reagir a um colaborador</a>
                    <a class="nav-link active" href="../view/reacoesRealizadas.php">Reações realizadas</a>
                    <a class="nav-link active" href="../view/rank.php">Ranking</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th class="col-2">Imagem</th>
                        <th class="col-2">Nome</th>
                        <th class="col-2">E-mail</th>
                        <th class="col-2">Departamento</th>
                        <th class="col-2">Cargo</th>
                        <th class="col-2">Reagir</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while($dado = $resultado->fetch_assoc()){  ?>
                        <tr>
                        <td> <img src="<?php echo "../controller/Upload/$dado[foto_colaborador]"?>"></td>
                        <td><?php echo $dado["nome"], " ", $dado["sobrenome"];?></td>
                        <td><?php echo $dado["email"];?></td>
                        <td><?php echo $dado["departamento"];?></td>
                        <td><?php echo $dado["cargo"];?></td>
                        <td><a href='../view/reagir.php?matricula=<?php echo $dado["matricula"];?>'><img src="../images/reagir.png"></a></td>
                        </tr>
                    <?php } ?>
            </tbody>
        </table>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
        </script>
</body>
</html>
