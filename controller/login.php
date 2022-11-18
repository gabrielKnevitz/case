<?php
require_once('..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'conexao.php');

    $email =$_POST['email'];

    $sql = "SELECT * from tb_colaboradores where email = '{$email}'";

    $retorno = mysqli_query($conexao, $sql);
    $dados = mysqli_fetch_assoc($retorno);
    
    if (mysqli_num_rows($retorno) == 1) {
     
            session_start();
            $_SESSION['usuario']= $dados['email'];
            echo "<script>
                    alert('Login realizado com sucesso!');
                    window.location.href='../view/logado.php';
                </script>";
        } else {
            echo "<script>
                    alert('Usuário não encontrado!');
                    window.location.href='../view/login.html';
                </script>";
    }
?>