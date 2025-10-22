<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>

        table, tr, td, th{
        border: 3px solid black;
        text-align: center;
    }

    table{
        display: flex;
        justify-content: center;
        width: 400px;
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
    <button class="voltar" onclick="window.location.href='index.php'">Voltar para menu</button>
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
    die("Falha na conexão: " . mysqli_connect_error());
}

echo "Conectado com succes<br><br>";



// Verifica escolha de campos

$sql = "SELECT * FROM agencia";
$resultados = mysqli_query($conn, $sql) or die("Erro ao retornar dados");

// loop para ler todos os registros
// $registro = mysqli_fetch_array($resultados);

echo "<table>";
echo "<th>";
echo "id";
echo "</th>";
echo "<th>";
echo "Numero agência";
echo "</th>";
echo "<th>";
echo "Endereço";
echo "</th>";
echo "<th>";
echo "Instituição id";
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
    echo $linha['numagencia'] . "<br>";
    echo "</td>";
    echo "<td>";
    echo $linha['endereco'] . "<br>";
    echo "</td>";
    echo "<td>";
    echo $linha['instituicao_id'] . "<br>";
    echo "</td>";
     echo "<td>";
    echo "<button class='excluir' onclick=\"window.location.href='excluirA.php?id= " . $linha['id'] .  "'\">Excluir</button>";
    echo "</td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close($conn);


?>