<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Cliente</title>

    <style>
        table,
        tr,
        td,
        th {
            border: 3px solid black;
            text-align: center;
        }

        table {
            display: flex;
            justify-content: center;
            width: 570px;
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

        body {
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



$port = 3309;
$servername = "localhost";
$database = "gerbank";
$username = "nahyron3";
$password = "raynner3";







// Cria conexão
$conn = mysqli_connect($servername, $username, $password, $database, $port);

// Verificar conexão;
if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}

echo "Conectado com succes<br><br>";



// Verifica escolha de campos

$sql = "
select contabanco.cliente_id,
contabanco.numconta,
contabanco.agencia_id,
agencia.enderecoA,
cliente.nome,
cliente.endereco
from
	contabanco
inner join
 cliente on contabanco.cliente_id = 
 cliente.id
 
inner join
agencia on contabanco.agencia_id = agencia.id;";
$resultados = mysqli_query($conn, $sql) or die("Erro ao retornar dados");

// loop para ler todos os registros
// $registro = mysqli_fetch_array($resultados);

echo "<table>";
echo "<th>";
echo "cliente id";
echo "</th>";
echo "<th>";
echo "numero conta";
echo "</th>";
echo "<th>";
echo "id agencia";
echo "</th>";
echo "<th>";
echo "endereço agencia";
echo "</th>";
echo "<th>";
echo "nome";
echo "</th>";
echo "<th>";
echo "endereço cliente";
echo "</th>";



while ($linha = mysqli_fetch_assoc($resultados)) {
    echo "<tr>";
    echo "<td>";
    echo $linha['cliente_id'] . "<br>";
    echo "</td>";
    echo "<td>";
    echo $linha['numconta'] . "<br>";
    echo "</td>";
    echo "<td>";
    echo $linha['agencia_id'] . "<br>";
    echo "</td>";
    echo "<td>";
    echo $linha['enderecoA'] . "<br>";
    echo "</td>";
    echo "<td>";
    echo $linha['nome'] . "<br>";
    echo "</td>";
    echo "<td>";
    echo $linha['endereco'] . "<br>";
    echo "</td>";
    // echo "<td>";
    // echo "<button class='excluir' onclick=\"window.location.href='excluirT.php?id= " . $linha['id'] .  "'\">Excluir</button>";
    // echo "</td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close($conn);


?>