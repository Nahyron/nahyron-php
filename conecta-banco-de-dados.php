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

$sql = "INSERT INTO teste01 (

idpessoanovaTeste, 
pessoanova_nome, 
pessoanova_cpf, 
pessoanova_rg, 
pessoanova_endereco, 
pessoanova_bairro, 
pessoanova_cep
) VALUES (
    3,
   'parafal',
   '92846295874',
   '47384374323',
   'rua das paineiras',
   'bairro do escuro',
   '15503-022'

);   ";

if(mysqli_query($conn, $sql)){
    echo "<br>Comando executado com sucesso";
} else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>