<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar instituição</title>

    <style>

        table, tr, td, th{
        border: 3px solid black;
        text-align: center;
    }

    table{
        display: flex;
        justify-content: center;
        width: 250px;
        margin: 12% auto;
        background-color: skyblue;
    }


 .voltar {
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

$sql = "SELECT * FROM instituicao";
$resultados = mysqli_query($conn, $sql) or die("Erro ao retornar dados");

// loop para ler todos os registros
// $registro = mysqli_fetch_array($resultados);

echo "<table>";
echo "<th>";
echo "id";
echo "</th>";
echo "<th>";
echo "Nome";
echo "</th>";
echo "<th>";
echo "Código";
echo "</th>";
echo "<th>";
echo "Excluir";
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
    echo $linha['codigo'] . "<br>";
    echo "</td>";
    echo "<td>";
    echo "<button class='excluir' onclick=\"window.location.href='excluirI.php?id= " . $linha['id'] .  "'\">Excluir</button>";
    echo "</td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close($conn);


?>