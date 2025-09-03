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

$sql = "CREATE TABLE teste01 (
idpessoanovaTeste int(11),
pessoanova_nome varchar(100),
pessoanova_cpf varchar(14),
pessoanova_rg varchar(20),
pessoanova_endereco varchar(150),
pessoanova_bairro varchar(100),
pessoanova_cep varchar(9));    ";

if(mysqli_query($conn, $sql)){
    echo "<br>Comando executado com sucesso";
} else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>