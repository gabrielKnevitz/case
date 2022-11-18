<?php
require_once('..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'conexao.php');

$matricula = $_GET['matricula'];

$consulta= "SELECT * FROM tb_colaboradores a INNER JOIN tb_reacoes b on a.matricula = b.elogiado WHERE b.elogiado='{$matricula}'";
$resultado= $conexao->query($consulta);

$consLike = "SELECT count(*) as gostei FROM tb_reacoes WHERE elogiado = '{$matricula}' AND elogio = 'Like'";
$resulLike = $conexao->query($consLike);

$consOrgulho = "SELECT count(*) as orgulho FROM tb_reacoes WHERE elogiado = '{$matricula}' AND elogio = 'Orgulho'";
$resuOrgulho = $conexao->query($consOrgulho);

$consExcelente = "SELECT count(*) as excelente FROM tb_reacoes WHERE elogiado = '{$matricula}' AND elogio = 'Excelente trabalho'";
$resuExcelente = $conexao->query($consExcelente);

$consColaboracao = "SELECT count(*) as colaboracao FROM tb_reacoes WHERE elogiado = '{$matricula}' AND elogio = 'Colaboração'";
$resuColaboracao = $conexao->query($consColaboracao);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Detalhamento</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/customizacaoDetalhamento.css">
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
                    <a class="nav-link active" href="../view/reacoesRealizadas.php">Reações realizadas</a>
                    <a class="nav-link active" href="../view/rank.php">Ranking</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
    <div class="row row justify-content-center align-items-center">
            <div class="col-10 text-center">
            <h1>DETALHAMENTO</h1>
    <table class="table">
            <thead>
            <tr>
                <th>colaborador</th>
                <th>Nome</th>
                <th>Motivo do reconhecimento</th>
            </tr>
            </thead>
            <tbody>
    <?php  while($row = $resultado->fetch_assoc()){
            $elogiador = $row['elogiador']; 
            $consult= "SELECT * FROM tb_reacoes a INNER JOIN tb_colaboradores b on a.elogiador = b.matricula  WHERE a.elogiador='{$elogiador}' AND elogiado ='{$matricula}'";
            $result= $conexao->query($consult);?>
             
            <?php while($dado = $result->fetch_assoc()){?>
                <tr>
                    <td><img src="<?php echo "../controller/Upload/$dado[foto_colaborador]"?>"></td>
                    <td><?php echo $dado['nome'] ?></td>
                    <td><?php echo $dado['motivo'] ?></td>
                </tr>
            <?php break; } ?>
             <?php } ?>
        </tbody>
        </table>
        <h1>REAÇÕES</h1>
        <div class="butns">
        <?php  while($curtir = $resulLike->fetch_assoc()){?>
                                <?php echo $curtir['gostei']?>
                                <button type="button" value="like" class="efeito botao like"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
                                    <path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111L8.864.046zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"/>
                                    </svg></i>
                                </button>
        <?php }?>
        <?php  while($orgulho = $resuOrgulho->fetch_assoc()){?>
                                <?php echo $orgulho['orgulho']?>                
                                <button type="button" value="orgulho" class="efeito botao orgulho"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-emoji-laughing-fill" viewBox="0 0 16 16">
                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zM7 6.5c0 .501-.164.396-.415.235C6.42 6.629 6.218 6.5 6 6.5c-.218 0-.42.13-.585.235C5.164 6.896 5 7 5 6.5 5 5.672 5.448 5 6 5s1 .672 1 1.5zm5.331 3a1 1 0 0 1 0 1A4.998 4.998 0 0 1 8 13a4.998 4.998 0 0 1-4.33-2.5A1 1 0 0 1 4.535 9h6.93a1 1 0 0 1 .866.5zm-1.746-2.765C10.42 6.629 10.218 6.5 10 6.5c-.218 0-.42.13-.585.235C9.164 6.896 9 7 9 6.5c0-.828.448-1.5 1-1.5s1 .672 1 1.5c0 .501-.164.396-.415.235z"/>
                                    </svg>
                                </button>
                                <?php }?>
                                <?php  while($excelente = $resuExcelente->fetch_assoc()){?>
                                <?php echo $excelente['excelente']?>
                                <button type="button" class="efeito botao Excelente">
                                    <img src="../images/palmas.png">
                                </button>
                                <?php }?>
                                <?php  while($colaboracao = $resuColaboracao->fetch_assoc()){?>
                                <?php echo $colaboracao['colaboracao']?>
                                <button type="button" value="colaboracao" class="efeito botao colaboracao"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                    <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z"/>
                                    </svg>
                                </button>
                                <?php }?>
                        </div>
        </div>
        </div>
        </div>
    </body>
</html>