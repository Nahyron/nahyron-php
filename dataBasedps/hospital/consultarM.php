<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar médicos</title>

    <style>

        table, tr, td, th{
        border: 3px solid black;
        text-align: center;
    }

    table{
        display: flex;
        justify-content: center;
        width: 510px;
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

    .cadastroM {

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
    <h1>Consultar dados dos Médicos</h1>
     <button  onclick="window.location.href='menu.html'">Voltar para o menu</button>
     <button  onclick="window.location.href='cadastroM.php'" class="cadastroM">Cadastrar médico</button>




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

$sql = "SELECT * FROM medico";
$resultados = mysqli_query($conn, $sql) or die("Erro ao retornar dados");

// loop para ler todos os registros
// $registro = mysqli_fetch_array($resultados);

echo "<table>";
echo "<th>";
echo "id_médico";
echo "</th>";
echo "<th>";
echo "nome_médico";
echo "</th>";
echo "<th>";
echo "especialidade do médico";
echo "</th>";
echo "<th>";
echo "número de CRM";
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
    echo $linha['especialidade'] . "<br>";
    echo "</td>";
    echo "<td>";
    echo $linha['numeroCrm'] . "<br>";
    echo "</td>";
 
echo "</table>";

mysqli_close($conn);

}
?>


</body>
</html>