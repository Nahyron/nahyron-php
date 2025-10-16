<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>consulttar veterinario</title>

     <style>

        table, tr, td, th{
        border: 3px solid black;
        text-align: center;
    }

    table{
        display: flex;
        justify-content: center;
        width: 800px;
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
    die("Falha na conexão: " . mysql_connect_error());
}

echo "Conectado com succes<br><br>";



// Verifica escolha de campos

$sql = "SELECT * FROM infoConsulta";
$resultados = mysqli_query($conn, $sql) or die("Erro ao retornar dados");

// loop para ler todos os registros
// $registro = mysqli_fetch_array($resultados);

echo "<table>";
echo "<th>";
echo "id";
echo "</th>";
echo "<th>";
echo "nome_dono";
echo "</th>";
echo "<th>";
echo "nomePet";
echo "</th>";
echo "<th>";
echo "nomeMédico";
echo "</th>";
echo "<th>";
echo "descrição do dono";
echo "</th>";
echo "<th>";
echo "data de consulta";
echo "</th>";
echo "<th>";
echo "imagem do animal";
echo "</th>";




while ($linha = mysqli_fetch_assoc($resultados)){
    echo "<tr>";
    echo "<td>";
    echo $linha ['id'] . "<br>";
    echo "</td>";
    echo "<td>";
    echo $linha['nomeDono'] . "<br>";
    echo "</td>";
    echo "<td>";
    echo $linha['nomePet'] . "<br>";
    echo "</td>";
    echo "<td>";
    echo $linha['nomeMedico'] . "<br>";
    echo "</td>";
    echo "<td>";
    echo $linha['descDono'] . "<br>";
    echo "</td>";
    echo "<td>";
    echo $linha['dataConsu'] . "<br>";
    echo "</td>";
    echo "<td><img src='";
    echo $linha['imagem'] . "' width='300px'><br>";
    echo "</td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close($conn);


?>

