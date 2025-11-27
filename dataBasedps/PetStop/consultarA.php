<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Animals</title>

    <style>

        table, tr, td, th{
        border: 3px solid black;
        text-align: center;
    }

    table{
        display: flex;
        justify-content: center;
        width: 330px;
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
      <button onclick="window.location.href='index.html'">Voltar para menu</button>
</body>
</html>

<?php




$servername = "localhost";
$database = "petStop";
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

$sql = "SELECT * FROM consuAnimal";
$resultados = mysqli_query($conn, $sql) or die("Erro ao retornar dados");

// loop para ler todos os registros
// $registro = mysqli_fetch_array($resultados);

echo "<table>";
echo "<th>";
echo "id";
echo "</th>";
echo "<th>";
echo "nome";
echo "</th>";
echo "<th>";
echo "animal";
echo "</th>";
echo "<th>";
echo "raça";
echo "</th>";
echo "<th>";
echo "idade";
echo "</th>";
echo "<th>";
echo "cor";
echo "</th>";
echo "<th>";
echo "Excluir id";
echo "</th>";


while ($linha = mysqli_fetch_assoc($resultados)){
    echo "<tr>";
    echo "<td>";
    echo $linha ['id'] . "<br>";
    echo "</td>";
    echo "<td>";
    echo $linha['nome'] . "<br>";
    echo "</td>";
    echo "<td>";
    echo $linha['animal'] . "<br>";
    echo "</td>";
    echo "<td>";
    echo $linha['raca'] . "<br>";
    echo "</td>";
    echo "<td>";
    echo $linha['idade'] . "<br>";
    echo "<td>";
    echo $linha['cor'] . "<br>";
    echo "</td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close($conn);


?>