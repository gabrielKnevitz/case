<?php
require_once('..'.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'conexao.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>Reagir</title>
    <link rel="icon" href="../images/logoAutoU.png">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['colaboradores', 'reconhecimentos'],
          <?php 
            $consulta= "SELECT nome, sobrenome, count(*) AS rank FROM 
            `tb_colaboradores` a INNER JOIN tb_reacoes b 
            ON a.matricula = b.elogiado GROUP BY nome, sobrenome ORDER BY rank DESC;";
            $resultado= $conexao->query($consulta);

            while($row = $resultado->fetch_assoc()){
                $nome = $row['nome'];
                $sobrenome = $row['sobrenome'];
                $rank =  $row['rank'];
?>
          
          ["<?php echo $nome, " ", $sobrenome ?>", <?php echo $rank ?>],

          <?php } ?>
        ]);

        var options = {
          width: 800,
          legend: { position: 'none' },
          chart: {
            title: 'Ranking de reconhecimentos', },
          axes: {
          },
          bar: { groupWidth: "90%" },
          colors: ['#FF8806', '#FF8806', '#FF8806', '#FF8806', '#FF8806']
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="../public/css/customizacaoRanking.css">
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
                    <a class="nav-link active" href="#">Ranking</a>
                </div>
            </div>
        </div>
    </nav>
    <center>
    <div id="top_x_div" style="width: 800px; height: 600px; margin-top:3%;"></div>
    </center>
  </body>
</html>