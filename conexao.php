<?php 

$hostname = 'localhost';
$username = 'root';
$senha = '';
$banco = 'bi_grafico';

$conexao = mysql_connect($hostname, $username, $senha);

$meses = array();
$valores = array();

$i = 0;
$sql = "SELECT * FROM data";
$resultado = mysql_query($sql);
while ($row = mysql_fetch_object($resultado)){
    $meses[$i] = $row->mes;
    $valores[$i] = $row->valor;
    $i = $i +1;
}
/*
$link = mysqli_connect("localhost", "root", "", "bi_grafico");

// Checka connection
if ($link->connect_error) {
    die("Conexao falhou: " . $link->connect_error);
} 
echo "Conexao sucesso!";
*/
/*
$sql = "SELECT * FROM data";
$resultado = mysqli_query($sql);

while($linha = mysql_fetch_assoc($resultado))
{
    echo '<pre>';
    print_r($linha);
    echo '</pre>';
}
*/