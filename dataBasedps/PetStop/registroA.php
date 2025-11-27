<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro animal</title>

    <style>
             fieldset {
            position: absolute;
            top: 25%;
            left: 40%;
            background-color: wheat;
        }

 button {
        padding: 10px;
        width: 260px;
        background-color: white;
        bottom: 10%;
        position: absolute;
        padding: 20px;
    }

    .consultP {

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
     <form method="POST">
        <fieldset>
            <legend>Registrar Animal</legend><br>
        <label name="nome">Nome:</label><br>
        <input type="text" name="nome"><br><br>
        <label name="animal">animal:</label><br>
        <input type="text" name="animal"><br><br>
        <label name="raca">raça:</label><br>
        <input type="text" name="raca"><br><br>
        <label name="idade">idade:</label><br>
        <input type="number" name="idade"><br><br>
        <label name="cor">cor:</label><br>
        <input type="text" name="cor"><br><br>
        <input type="submit" value="enviar">

        </fieldset>
    </form>
        <button onclick="window.location.href='index.html'">Voltar para menu</button>

</body>
</html>




<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" ){

    $nome = $_POST["nome"];
    $animal = $_POST["animal"];
    $raca = $_POST ["raca"];
    $idade  = $_POST["idade"];
    $cor  = $_POST["cor"];
    
$servername = "localhost";
$database = "pet1";
$username = "root";
$password = "";
// Cria conexão
$conn = mysqli_connect($servername, $username, $password, $database);

// Verificar conexão;
if (!$conn){
    die("Falha na conexão: " . mysqli_connect_error());
}

echo "Conectado com succes";

$sql = "INSERT INTO animal (

animal, 
raca, 
idade,
cor
) VALUES (
   '$animal',
   '$raca',
   '$idade',
   '$cor'
    
);   ";

if(mysqli_query($conn, $sql)){
    echo "<br>Comando executado com sucesso<br>";
} else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}







mysqli_close($conn);

}

?>