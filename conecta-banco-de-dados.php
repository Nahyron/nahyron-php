<?php
$servername = "localhost";
$databse = "banco01";
$username = "root";
$password = "";
// Cria conexão
$conn = mysql_connect($servername, $username, $password, $databse);

// Verificar conexão;
if (!$conn){
    die("Falha na conexão: " . mysql_connect_error());
}

echo "Conectado com succes";
?>