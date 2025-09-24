<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conslutar movimentacoes</title>

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

    .cadastroF {

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


  
    </style>
</head>
<body>


    <button onclick="window.location.href='menu.html'">Voltar para o menu</button>
     <button onclick="window.location.href='CadastroF.php'" class="cadastroF">Cadastrar Movimentos financeiros</button>
    



    <?php


$servername = "localhost";
$database = "movimentacoes";
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

$sql = "SELECT * FROM movimento";
$resultados = mysqli_query($conn, $sql) or die("Erro ao retornar dados");

// loop para ler todos os registros
// $registro = mysqli_fetch_array($resultados);

echo "<table>";
echo "<th>";
echo "id do movimento";
echo "</th>";
echo "<th>";
echo "id do cliente";
echo "</th>";
echo "<th>";
echo "tipo";
echo "</th>";
echo "<th>";
echo "valor";
echo "</th>";
echo "<th>";
echo "data do movimento";
echo "</th>";




while ($linha = mysqli_fetch_assoc($resultados)){
    echo "<tr>";
    echo "<td>";
    echo $linha ['id_movimento'] . "<br>";
    echo "</td>";
    echo "<td>";
    echo $linha['id_cliente'] . "<br>";
    echo "</td>";
    echo "<td>";
    echo $linha['tipo'] . "<br>";
    echo "</td>";
    echo "<td>";
    echo $linha['valor'] . "<br>";
    echo "</td>";
    echo "<td>";
    echo $linha['data_movimento'] . "<br>";
    echo "</td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close($conn);


?>
</body>
</html>