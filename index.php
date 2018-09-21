<?php 

$link = new mysqli("localhost","root","","bi_grafico");

$loja = array();
$tipo = array();

$i = 0;
/*$sql = "SELECT * FROM data";
$resultado = mysqli_query($sql);*/
$result = mysqli_query($link, "SELECT * FROM data LIMIT 20") or die (mysqli_error());
$row = $result->fetch_array(MYSQLI_ASSOC);
while ($row = mysqli_fetch_object($result)){
    $loja = $row->loja;
    $tipo = $row->tipo;
    $lista[$i] = $loja;
    $tip[$i] = $tipo;
    $i = $i + 1;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Graficos BI</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <link rel="stylesheet" href="css/product.css">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Move', 'Percentage'],
         <?php 
            $k = $i;
            for ($i = 0; $i < $k; $i++){
          ?>
            ['<?php echo $lista[$i] ?>', '<?php echo $tip[$i] ?>'],
          <?php } ?>
        ]);

        var options = {
          width: 800,
          legend: { position: 'none' },
          chart: {
            title: 'Chess opening moves',
            subtitle: 'popularity by percentage' },
          axes: {
            x: {
              0: { side: 'top', label: 'White to move'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };
    </script>

</head>
<body>
     
    <nav class="site-header sticky-top py-1">
      <div class="container d-flex flex-column flex-md-row justify-content-between">
        <a class="py-2" href="index.php">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="d-block mx-auto">
          <circle cx="12" cy="12" r="10"></circle>
          <line x1="14.31" y1="8" x2="20.05" y2="17.94"></line>
          <line x1="9.69" y1="8" x2="21.17" y2="8"></line>
          <line x1="7.38" y1="12" x2="13.12" y2="2.06"></line>
          <line x1="9.69" y1="16" x2="3.95" y2="6.06"></line>
          <line x1="14.31" y1="16" x2="2.83" y2="16"></line>
          <line x1="16.62" y1="12" x2="10.88" y2="21.94"></line></svg>
        </a>
        <a class="py-2 d-none d-md-inline-block" href="lojaA.php">loja A</a>
        <a class="py-2 d-none d-md-inline-block" href="lojaB.php">loja B</a>
        <a class="py-2 d-none d-md-inline-block" href="lojaC.php">loja C</a>
        <a class="py-2 d-none d-md-inline-block" href="lojaD.php">loja D</a>
        <a class="py-2 d-none d-md-inline-block" href="lojaE.php">loja E</a>
        <a class="py-2 d-none d-md-inline-block" href="lojaF.php">loja F</a>
        <a class="py-2 d-none d-md-inline-block" href="lojaH.php">loja H</a>
      </div>
    </nav>

      <div id="top_x_div" style="width: 800px; height: 600px;"></div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>