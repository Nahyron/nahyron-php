<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulario pra banco de dados</title>
</head>
<body>
    <form method="POST">
    <fieldset style="width: 30px; text-align: center;position: absolute; right: 50%;">
    <legend>formulario para DB</legend>
    <br>

    <label name="name">Coloque seu nome</label>
    <input type="text" name="name">
    <br>
    <br>

    <label name="cpf">Coloque seu cpf</label>
    <input type="number" name="cpf">
    <br>
    <br>

    <label name="rg">Coloque eu RG</label>
    <input type="number" name="rg">
    <br>
    <br>

    <label name="ender">Coloque seu endereço</label>
    <input type="text" name="ender">
    <br>
    <br>

    <label name="bairro">Coloque seu bairro</label>
    <input type="text" name="bairro">
    <br>
    <br>

    <label name="cep">Coloque seu CEP</label>
    <input type="number" name="cep">
    <br>
    <br>

    <input type="submit" value="salve">

    </form>

    </fieldset>
</body>
</html>

 <?php


    if ($_SERVER["REQUEST_METHOD"] == "POST" ){

    $nome = $_POST["name"];
    $cpf = $_POST["cpf"];
    $rg = $_POST ["rg"];
    $endereco = $_POST["ender"];
    $bairro = $_POST["bairro"];
    $cep = $_POST["cep"];
   




$servername = "localhost";
$database = "banco01";
$username = "root";
$password = "";
// Cria conexão
$conn = mysqli_connect($servername, $username, $password, $database);

// Verificar conexão;
if (!$conn){
    die("Falha na conexão: " . mysql_connect_error());
}

echo "Conectado com succes";

$sql = "INSERT INTO teste01 (

pessoanova_nome, 
pessoanova_cpf, 
pessoanova_rg, 
pessoanova_endereco, 
pessoanova_bairro, 
pessoanova_cep
) VALUES (
   '$nome',
   '$cpf',
   '$rg',
   '$endereco',
   '$bairro',
   '$cep'

);   ";

if(mysqli_query($conn, $sql)){
    echo "<br>Comando executado com sucesso";
} else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

}
?>