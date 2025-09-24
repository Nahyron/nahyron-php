<!DOCTYPE html>
<html lang="en">
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
        width: 1100px;
        margin: 12% auto;
        background-color: skyblue;

   
}

body{
    background-color: lightblue;
}


button {
        padding: 10px;
        width: 260px;
        background-color: white;
        bottom: 10%;
        position: absolute;
      
     
        padding: 20px;

}
.consultac {
        padding: 10px;
        width: 260px;
        background-color: white;
        bottom: 3%;
        position: absolute;
      
     
        padding: 20px;

}

    
</style>

</head>
<body>
    <button onclick="window.location.href='menu.html'">Voltar para o menu</button>
    <button onclick="window.location.href='CadastroC.php'" class="consultac" >Cadastrar cliente</button>
</body>
</html>






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

$sql = "SELECT * FROM cadastroc";
$resultados = mysqli_query($conn, $sql) or die("Erro ao retornar dados");

// loop para ler todos os registros
// $registro = mysqli_fetch_array($resultados);

echo "<table>";
echo "<th>";
echo "id_cliente";
echo "</th>";
echo "<th>";
echo "Nome_Cliente";
echo "</th>";
echo "<th>";
echo "Email_cliente";
echo "</th>";
echo "<th>";
echo "Telefone_cliente";
echo "</th>";
echo "<th>";
echo "Endereco_cliente";
echo "</th>";
echo "<th>";
echo "Cidade_cliente";
echo "</th>";
echo "<th>";
echo "Estado_cliente";
echo "</th>";



while ($linha = mysqli_fetch_assoc($resultados)){
    echo "<tr>";
    echo "<td>";
    echo $linha ['id_cliente'] . "<br>";
    echo "</td>";
    echo "<td>";
    echo $linha['Nome_cliente'] . "<br>";
    echo "</td>";
    echo "<td>";
    echo $linha['Email_cliente'] . "<br>";
    echo "</td>";
    echo "<td>";
    echo $linha['Telefone_cliente'] . "<br>";
    echo "</td>";
    echo "<td>";
    echo $linha['Endereco_cliente'] . "<br>";
    echo "</td>";
    echo "<td>";
    echo $linha['Cidade_cliente'] . "<br>";
    echo "</td>";
    echo "<td>";
    echo $linha['Estado_cliente'] . "<br>";
    echo "</td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close($conn);


?>