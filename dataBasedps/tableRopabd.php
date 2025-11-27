<style>
    table, tr, td{
        border: 3px solid black;
        text-align: center;
    }

    table{
        display: flex;
        justify-content: center;
        width: 500px;
        margin: 12% auto;

   
}

    
</style>

<?php


$servername = "localhost";
$database = "banco01";
$username = "root";
$password = "";







// Cria conexão
$conn = mysqli_connect($servername, $username, $password, $database);

// Verificar conexão;
if (!$conn){
    die("Falha na conexão: " . mysqli_connect_error());
}

echo "Conectado com succes<br><br>";



// Verifica escolha de campos

$sql = "SELECT * FROM roupas";
$resultados = mysqli_query($conn, $sql) or die("Erro ao retornar dados");

// loop para ler todos os registros
$registro = mysqli_fetch_array($resultados);

echo "<table>";
echo "<th>";
echo "Id Cliente";
echo "</th>";
echo "<th>";
echo "Cor da blusa";
echo "</th>";
echo "<th>";
echo "Medida da blusa";
echo "</th>";
echo "<th>";
echo "Cor Short";
echo "</th>";
echo "<th>";
echo "Medida Short";
echo "</th>";
echo "<th>";
echo "Entregar ou buscar??";
echo "</th>";



while ($linha = mysqli_fetch_assoc($resultados)){
    echo "<tr>";
    echo "<td>";
    echo $linha ['idCliente'];
    echo "</td>";
    echo "<td>";
    echo $linha['corBlusa'] . "<br>";
    echo "</td>";
    echo "<td>";
    echo $linha['medidaBlusa'] . "<br>";
    echo "</td>";
    echo "<td>";
    echo $linha['corShort'] . "<br>";
    echo "</td>";
    echo "<td>";
    echo $linha['medidaShort'] . "<br>";
    echo "</td>";
    echo "<td>";
    echo $linha['entregarOubuscar'] . "<br>";
    echo "</td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close($conn);


?>