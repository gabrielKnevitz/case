<?php
require_once('..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'conexao.php');

$nome=$_POST['nome'];
$sobrenome=$_POST['sobrenome'];
$email=$_POST['email'];
$matricula=$_POST['matricula'];
$departamento=$_POST['departamento'];
$cargo=$_POST['cargo'];
$foto=$_POST['foto'];


$extensao = strtolower(substr($_FILES['foto']['name'],-4));
$novo_nome= md5(time()) . $extensao;
$diretorio= "Upload/";
move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio.$novo_nome);

$sql = "SELECT email from tb_colaboradores where email = '{$email}'";

$retorno = mysqli_query($conexao, $sql);
if (mysqli_num_rows($retorno) > 0) {
    echo "<script>
            alert('Já existe o email cadastrado!');
            window.location.href='../view/cadastro.html';
        </script>";
}else{

$sql = "INSERT INTO tb_colaboradores (matricula, email, nome, sobrenome, departamento, cargo, foto_colaborador)
VALUES ('$matricula', '$email', '$nome', '$sobrenome','$departamento', '$cargo', '$novo_nome')";


    if (mysqli_query($conexao, $sql)) {
        echo "<script>
                alert('Novo cadastro realizado com sucesso!');
                window.location.href='../view/login.html';
            </script>";
    } else {
        echo "<script>
                alert('Erro ao realizar o cadastro!');
                window.location.href='../view/cadastro.html';
            </script>";
    }
}

?>