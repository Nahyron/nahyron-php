<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registra dono</title>

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
            <legend>Registrar Dono</legend><br>
        <label name="nome">Nome:</label><br>
        <input type="text" name="nome"><br><br>
        <label name="cpf">cpf:</label><br>
        <input type="number" name="cpf"><br><br>
        <label name="endereco">endereço:</label><br>
        <input type="text" name="endereco"><br><br>
        <label name="idade">idade:</label><br>
        <input type="number" name="idade"><br><br>
        <input type="submit" value="Enviar">
        </fieldset>
        </form>
        <button onclick="window.location.href='index.html'">Voltar para menu</button>

</body>
</html>


<?php


if ($_SERVER["REQUEST_METHOD"] == "POST" ){

    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $idade = $_POST ["idade"];
    $endereco  = $_POST["endereco"];
    
$servername = "localhost";
$database = "pet1";
$username = "root";
$password = "";
// Cria conexão
$conn = mysqli_connect($servername, $username, $password, $database);

// Verificar conexão;
if (!$conn){
    die("Falha na conexão: " . mysql_connect_error());
}

echo "Conectado com succes";

$sql = "INSERT INTO dono (

nome, 
cpf, 
endereco,
idade
) VALUES (
   '$nome',
   '$cpf',
   '$endereco',
   '$idade'
    
);   ";

if(mysqli_query($conn, $sql)){
    echo "<br>Comando executado com sucesso<br>";
} else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}







mysqli_close($conn);

}






?>