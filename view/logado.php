<?php
require_once('..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'conexao.php');

session_start();
$email= $_SESSION['usuario'];

$consulta= "SELECT * FROM tb_colaboradores where email= '{$email}'";
$resultado= $conexao->query($consulta);
?>

<?php while($row = $resultado->fetch_assoc()){
    $nome = $row['nome'];
    $sobrenome =  $row['sobrenome'];
    $foto= $row['foto_colaborador'];
    $matricula= $row['matricula'];
    $departamento= $row['departamento'];
    $cargo= $row['cargo'];

}?>

<?php 
 $reacoes= "SELECT count(*) as reacao FROM tb_reacoes WHERE elogiado = '{$matricula}'";
 $result=mysqli_query($conexao,$reacoes);
 $data=mysqli_fetch_assoc($result);

 $retorno= $data['reacao'];
?>

<!DOCTYPE html>
<html>
    <head>
    <title>Logado</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/customizacaoLogado.css">
    <link rel="icon" href="../images/logoAutoU.png">
    </head>
</html>
<body>
<nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Central de reações</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" href="../view/listaReagir.php">Reagir a um colaborador</a>
                    <a class="nav-link active" href="../view/reacoesRealizadas.php">Reações realizadas</a>
                    <a class="nav-link active" href="../view/rank.php">Ranking</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row row justify-content-center align-items-center">
            <div class="col-5 text-center">
                
                    <div class="row">
                            <div class="col">
                                <h5>Olá, <?php echo $nome, " ",$sobrenome;?></h5>  
                            </div>
                    </div>
                    <div class="row">
                            <div class="col">
                                <img src="<?php echo "../controller/Upload/$foto"?>">  
                            </div>
                    </div>
                    <div class="row">
                            <div class="col">
                                <h6>E-mail:</h6>
                                <h5><?php echo $email?></h5>  
                            </div>
                    </div>
                    <div class="row">
                            <div class="col">
                                <h6>Departamento:</h6>
                                <h5><?php echo $departamento?></h5>  
                            </div>
                    </div>
                    <div class="row">
                            <div class="col">
                                <h6>Cargo:</h6>
                                <h5><?php echo $cargo?></h5>  
                            </div>
                    </div>
                   <div class="row">
                            <div class="col">
                                <h6>Reações:</h6>
                                <h5><?php echo $retorno?></h5>  
                            </div>
                    </div>
                    <div class="row">
                            <div class="col">
                                <button class="btn"><a style="text-decoration:none; color:#ffffff;" href="../view/detalhamento.php?matricula=<?php echo $matricula ?>">Detalhamento</a></button>
                            </div>
                    </div>
                    <div class="row">
                            <div class="col">
                                <button class="btn"><a style="text-decoration:none; color:#ffffff;" href="../controller/destroy.php">Sair</a></button>
                            </div>
                    </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
        </script>
</body>
