<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agência</title>
</head>

<body>
    <form method="POST">
        <fieldset>
            <legend>agência</legend>

         <label for="numA">Número da agência:</label><br>
        <input type="number" name="numA"><br><br>

       <div class="form-group">
                    <label for="code">Instituição</label>
                    <select name="code">

                        <?php
                        $sv = "localhost";
                        $user = "root";
                        $pass = "";
                        $db = "gerbank";

                        $con = mysqli_connect($sv, $user, $pass, $db);

                        $resulta = "select * from instituicao";
                        $consulta = mysqli_query($con, $resulta);

                        while ($linha = mysqli_fetch_array($consulta)) {
                            echo "<option value=". $linha['id'] . ">" . $linha['id'] . "</option>";
                        }

                        mysqli_close($con);

                        ?>

                    </select>
                    <br>
                </div>
        <label for="end">endereço:</label><br>
        <input type="text" name="end"><br><br>

        <input type="submit">
        
    </fieldset>
</form>
<button onclick="window.location.href='index.php'">Voltar para menu</button>
</body>

</html>


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" ){

    $numA = $_POST["numA"];
    $code = $_POST["code"];
    $end = $_POST["end"];
$servername = "localhost";
$database = "gerbank";
$username = "root";
$password = "";
// Cria conexão
$conn = mysqli_connect($servername, $username, $password, $database);

// Verificar conexão;
if (!$conn){
    die("Falha na conexão: " . mysqli_connect_error());
}

echo "Conectado com succes";

$sql = "INSERT INTO agencia (

numagencia, 
enderecoA,
instituicao_id
) VALUES (
   '$numA',
   '$end',
   '$code'
);   ";

if(mysqli_query($conn, $sql)){
    echo "<br>Comando executado com sucesso<br>";
} else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}







mysqli_close($conn);

}

?>