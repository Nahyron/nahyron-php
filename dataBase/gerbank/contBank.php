<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conta bancária</title>
</head>

<body>
    <form method="POST">
        <fieldset>
            <legend>Conta bancária</legend>

            <label for="numC">Número da conta:</label><br>
            <input type="number" name="numC"><br><br>

            <label for="idA">Id Agência:</label><br>
            <input type="number" name="idA"><br><br>

            <label for="idC">Id Cliente:</label> <br>
            <input type="number" name="idC"><br><br>


            <input type="submit">

        </fieldset>
    </form>
</body>

</html>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" ){

    $numC = $_POST["numC"];
    $idA = $_POST["idA"];
    $idC = $_POST["idC"];

$servername = "localhost";
$database = "gerbank";
$username = "root";
$password = "";
// Cria conexão
$conn = mysqli_connect($servername, $username, $password, $database);

// Verificar conexão;
if (!$conn){
    die("Falha na conexão: " . mysql_connect_error());
}

echo "Conectado com succes";

$sql = "INSERT INTO contabanco (

numconta, 
agencia_id,
cliente_id

) VALUES (
   '$numC',
   '$idA',
   '$idC'
    
);   ";

if(mysqli_query($conn, $sql)){
    echo "<br>Comando executado com sucesso<br>";
} else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}







mysqli_close($conn);

}

?>