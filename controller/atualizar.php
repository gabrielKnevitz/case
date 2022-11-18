<?php
require_once('..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'conexao.php');

$id = $_POST['id'];
$reacao = $_POST['botao'];
$elogiador = $_POST['elogiador'];
$elogiado = $_POST['elogiado'];
$motivo = $_POST['motivo'];

$sql = "UPDATE tb_reacoes SET elogio='$reacao', motivo='$motivo', elogiado='$elogiado', elogiador='$elogiador'
WHERE id_reacao='$id'";

if (mysqli_query($conexao, $sql)) {
    echo "<script>
            alert('Reconhecimento atualizado com sucesso!');
            window.location.href='../view/reacoesRealizadas.php';
        </script>";
} else {
    echo "<script>
            alert('Erro ao atualizar o Reconhecimento!');
            window.location.href='../view/reacoesRealizadas.php';
        </script>";
}
?>