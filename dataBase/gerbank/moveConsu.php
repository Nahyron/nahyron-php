<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar movimentações</title>

    <style>

        table, tr, td, th{
        border: 3px solid black;
        text-align: center;
    }

    table{
        display: flex;
        justify-content: center;
        width: 700px;
        margin: 12% auto;
        background-color: skyblue;
    }


 button {
        padding: 10px;
        width: 260px;
        background-color: white;
        bottom: 10%;
        position: absolute;
        padding: 20px;
    }

    body{
        background-color: lightblue;    
    }

h1 {
            text-align: center;
        }

        </style>
</head>
<body>
    <button onclick="window.location.href='index.php'">Voltar para menu</button>
</body>
</html>

<?php




$servername = "localhost";
$database = "gerbank";
$username = "root";
$password = "";







// Cria conexão
$conn = mysqli_connect($servername, $username, $password, $database);

// Verificar conexão;
if (!$conn){
    die("Falha na conexão: " . mysql_connect_error());
}

echo "Conectado com succes<br><br>";



// Verifica escolha de campos

$sql = "SELECT * FROM movimentacoes";
$resultados = mysqli_query($conn, $sql) or die("Erro ao retornar dados");

// loop para ler todos os registros
// $registro = mysqli_fetch_array($resultados);

echo "<table>";
echo "<th>";
echo "id";
echo "</th>";
echo "<th>";
echo "Agência id";
echo "</th>";
echo "<th>";
echo "Descrição";
echo "</th>";
echo "<th>";
echo "Valor";
echo "</th>";
echo "<th>";
echo "Data da movimentação";
echo "</th>";
echo "<th>";
echo "Hora da movimentação";
echo "</th>";
echo "<th>";
echo "Tipo de transação";
echo "</th>";



while ($linha = mysqli_fetch_assoc($resultados)){
    echo "<tr>";
    echo "<td>";
    echo $linha ['id'] . "<br>";
    echo "</td>";
    echo "<td>";
    echo $linha['agencia_id'] . "<br>";
    echo "</td>";
    echo "<td>";
    echo $linha['descricao'] . "<br>";
    echo "</td>";
    echo "<td>";
    echo $linha['valor'] . "<br>";
    echo "</td>";
    echo "<td>";
    echo $linha['dataM'] . "<br>";
    echo "</td>";
    echo "<td>";
    echo $linha['hora'] . "<br>";
    echo "</td>";
    echo "<td>";
    echo $linha['tipo'] . "<br>";
    echo "</td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close($conn);


?>