<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>movimentação</title>
</head>

<body>
    <form method="POST">
        <fieldset>
            <legend>movimentações</legend>

            <label for="idA">id da agência:</label><br>
            <input type="text" name="idA"><br><br>

            <label for="desc">descrição:</label><br>
            <input type="text" name="desc"><br><br>

            <label for="valor">Valor:</label><br>
            <input type="number" name="valor"><br><br>

            <label for="data">data:</label><br>
            <input type="date" name="data"><br><br>

            <label for="hora">hora:</label><br>
            <input type="time" name="hora"><br><br>

            <select name="tipo">
                <option value="debito">Débito</option>
                <option value="credito">Crédito</option><br>
                <button onclick="window.location.href='index.php'">Voltar para menu</button>
                <input type="submit" value="submit">
            </select>

        </fieldset>
    </form>
</body>

</html>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $idA = $_POST["idA"];
    $desc = $_POST["desc"];
    $valor = $_POST["valor"];
    $data = $_POST["data"];
    $hora = $_POST["hora"];
    $tipo = $_POST["tipo"];


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

    $sql = "INSERT INTO movimentacoes (

agencia_id, 
descricao,
valor,
dataM,
hora,
tipo
) VALUES (
   '$idA',
   '$desc',
   '$valor',
   '$data',
   '$hora',
   '$tipo'
    
);   ";

    if (mysqli_query($conn, $sql)) {
        echo "<br>Comando executado com sucesso<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }







    mysqli_close($conn);

}

?>