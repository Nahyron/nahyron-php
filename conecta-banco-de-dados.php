<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulario pra banco de dados</title>
</head>
<body>
    <fieldset style="width: 30px; text-align: center;position: absolute; right: 50%; top: 40px;">
    <legend>formulario para DB</legend>
    <br>
    <label name="id">Coloque o id do cliente</label>
    <input type="number" name="id">
    <br>
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

    




    </fieldset>
</body>
</html>

 <?php






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

//$sql = "INSERT INTO teste01 (

// idpessoanovaTeste, 
// pessoanova_nome, 
// pessoanova_cpf, 
// pessoanova_rg, 
// pessoanova_endereco, 
// pessoanova_bairro, 
// pessoanova_cep
// ) VALUES (
//     3,
//    'parafal',
//    '92846295874',
//    '47384374323',
//    'rua das paineiras',
//    'bairro do escuro',
//    '15503-022'

// );   ";

if(mysqli_query($conn, $sql)){
    echo "<br>Comando executado com sucesso";
} else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>