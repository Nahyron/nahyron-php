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
 <div class="form-group">
                    <label for="codeA">Id Agencia</label>
                    <select name="codeA">

                        <?php
                        $sv = "localhost";
                        $user = "root";
                        $pass = "";
                        $db = "gerbank";

                        $con = mysqli_connect($sv, $user, $pass, $db);

                        $resulta = "select * from agencia";
                        $consulta = mysqli_query($con, $resulta);

                        while ($linha = mysqli_fetch_array($consulta)) {
                            echo "<option value=". $linha['id'] . ">" . $linha['id'] . "</option>";
                        }

                        mysqli_close($con);

                        ?>

                    </select>
                    </div>
                    <br>

            <div class="form-group">
                    <label for="codeC">Id Cliente</label>
                    <select name="codeC">

                        <?php
                        $sv = "localhost";
                        $user = "root";
                        $pass = "";
                        $db = "gerbank";

                        $con = mysqli_connect($sv, $user, $pass, $db);

                        $resulta = "select * from cliente";
                        $consulta = mysqli_query($con, $resulta);

                        while ($linha = mysqli_fetch_array($consulta)) {
                            echo "<option value=". $linha['id'] . ">" . $linha['id'] . "</option>";
                        }

                        mysqli_close($con);

                        ?>

                    </select>
                    </div>
            
            <input type="submit">
            
        </fieldset>
    </form>
    <button onclick="window.location.href='index.php'">Voltar para menu</button>
</body>

</html>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $numC = $_POST["numC"];
    $idA = $_POST["codeA"];
    $idC = $_POST["codeC"];

    $servername = "localhost";
    $database = "gerbank";
    $username = "root";
    $password = "";
    // Cria conexão
    $conn = mysqli_connect($servername, $username, $password, $database);

    // Verificar conexão;
    if (!$conn) {
        die("Falha na conexão: " . mysqli_connect_error());
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

    if (mysqli_query($conn, $sql)) {
        echo "<br>Comando executado com sucesso<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }







    mysqli_close($conn);

}

?>