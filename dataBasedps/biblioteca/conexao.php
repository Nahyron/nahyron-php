<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "biblioteca";
$porta = 3309;

$conn = mysqli_connect($servidor, $usuario, $senha, $banco, $porta);

if(!$conn){
    die("falha na conexão " . mysqli_connect_error());
} echo "deu certo patrão";




?>