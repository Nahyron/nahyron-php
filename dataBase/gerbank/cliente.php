<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente</title>
</head>

<body>
    <form method="POST">
        <fieldset>
            <legend>Cliente</legend>

            <label for="nome">Nome:</label><br>
            <input type="text" name="nome"><br><br>

            <label for="end">endereço:</label> <br>
            <input type="text" name="end"><br><br>

            <label for="cpf">cpf:</label><br>
            <input type="number" name="cpf"><br><br>

            <label for="telefone">telefone:</label><br>
            <input type="text" name="telefone"><br><br>

            <label for="dataN">data de nascimento:</label><br>
            <input type="date" name="dataN"><br><br>

            <input type="submit" value="submit">
            <button onclick="window.location.href='index.php'">Voltar para menu</button>

        </fieldset>
    </form>
</body>
</html>



<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $end = $_POST["end"];
    $cpf = $_POST["cpf"];
    $telefone = $_POST["telefone"];
    $dataN = $_POST["dataN"];

    $servername = "localhost";
    $database = "gerbank";
    $username = "root";
    $password = "";
    // Cria conexão
    $conn = mysqli_connect($servername, $username, $password, $database);

    // Verificar conexão;
    if (!$conn) {
        die("Falha na conexão: " . mysql_connect_error());
    }

    echo "Conectado com succes";

    $sql = "INSERT INTO cliente (

nome, 
endereco,
cpf,
telefone,
dataN
) VALUES (
   '$nome',
   '$end',
   '$cpf',
   '$telefone',
   '$dataN'
    
);   ";

    if (mysqli_query($conn, $sql)) {
        echo "<br>Comando executado com sucesso<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }







    mysqli_close($conn);

}

?>