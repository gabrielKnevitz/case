<?php
$conexao = mysqli_connect("localhost", "root", "", "projreacoes");
// Verifica se conseguiu a conexao
if (!$conexao) {
  
    die("Falha na conexão com o banco: " . mysqli_connect_error());
   
}

?>