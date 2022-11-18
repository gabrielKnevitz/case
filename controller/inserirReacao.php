<?php
require_once('..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'conexao.php');

$reacao = $_POST['botao'];
$elogiador = $_POST['elogiador'];
$elogiado = $_POST['elogiado'];
$motivo = $_POST['motivo'];

$sql = "INSERT INTO tb_reacoes (elogio, motivo, elogiado, elogiador)
VALUES ('$reacao', '$motivo', '$elogiado', '$elogiador')";


    if (mysqli_query($conexao, $sql)) {
        echo "<script>
                alert('Reconhecimento realizado com sucesso!');
                window.location.href='../view/listaReagir.php';
            </script>";
    } else {
        echo "<script>
                alert('Erro ao realizar o Reconhecimento!');
                window.location.href='../view/listaReagir.php';
            </script>";
    }
?>