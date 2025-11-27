<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar dados do pronturario</title>

    <style>

        table, tr, td, th{
        border: 3px solid black;
        text-align: center;
    }

    table{
        display: flex;
        justify-content: center;
        width: 900px;
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

    .prontuario {

     padding: 10px;
        width: 260px;
        background-color: white;
        bottom: 3%;
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
    <h1>Consultar dados do pronturario</h1>
    <button  onclick="window.location.href='menu.html'">Voltar para o menu</button>
    <button  onclick="window.location.href='prontuario.php'" class="prontuario">Cadastrar Prontuario</button>


    <?php


$servername = "localhost";
$database = "hospital";
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

$sql = "SELECT * FROM prontuario";
$resultados = mysqli_query($conn, $sql) or die("Erro ao retornar dados");

// loop para ler todos os registros
// $registro = mysqli_fetch_array($resultados);

echo "<table>";
echo "<th>";
echo "id";
echo "</th>";
echo "<th>";
echo "id_paciente";
echo "</th>";
echo "<th>";
echo "id_medico";
echo "</th>";
echo "<th>";
echo "data de consulta";
echo "</th>";
echo "<th>";
echo "data de registro";
echo "</th>";
echo "<th>";
echo "descrição dos sintomas";
echo "</th>";
echo "<th>";
echo "prescrição";
echo "</th>";
echo "<th>";
echo "observação";
echo "</th>";




while ($linha = mysqli_fetch_assoc($resultados)){
    echo "<tr>";
    echo "<td>";
    echo $linha ['id'] . "<br>";
    echo "</td>";
    echo "<td>";
    echo $linha['id_paciente'] . "<br>";
    echo "</td>";
    echo "<td>";
    echo $linha['id_medico'] . "<br>";
    echo "</td>";
    echo "<td>";
    echo $linha['dataConsulta'] . "<br>";
    echo "</td>";
    echo "<td>";
    echo $linha['dataRegistro'] . "<br>";
    echo "</td>";
    echo "<td>";
    echo $linha['descSintomas'] . "<br>";
    echo "</td>";
    echo "<td>";
    echo $linha['prescricao'] . "<br>";
    echo "</td>";
    echo "<td>";
    echo $linha['observacao'] . "<br>";
    echo "</td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close($conn);


?>
</body>
</html>