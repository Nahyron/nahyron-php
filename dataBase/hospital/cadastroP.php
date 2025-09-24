<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro do paciente</title>

    <style>


    
        fieldset {
            position: absolute;
            top: 25%;
            left: 40%;
            background-color: wheat;
        }

    table{
        display: flex;
        justify-content: center;
        width: 510px;
        margin: 12% auto;
        background-color: skyblue;
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
    <h1>Cadastro de paciente</h1>
    
    <fieldset>
        <legend>Cadastro de Paciente</legend>
        
        <label name="nome">Nome do Paciente:</label><br>
        <input name="nome" type="text" placeholder="Digite seu nome"><br><br>
        
        <label name="cpf">Cpf do paciente:</label><br>
        <input name="cpf" type="number" placeholder="Digite seu cpf"><br><br>
        
        <label name="nomeM">Nome da mãe do paciente:</label><br>
        <input name="nomeM" type="text" placeholder="Digite o nome"><br><br>
        
        <label name="dataN">Digite a data do nascimento do paciente:</label><br>
        <input name="dataN" type="date" placeholder="Digite a data:"><br><br>
        
        <input type="submit" value="Enviar">
    </fieldset>

    
    
</form>
<button  onclick="window.location.href='menu.html'">Voltar para o menu</button>
<button  onclick="window.location.href='consultarP.php'" class="consultP">Consultar dados do Paciente</button>



        <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST" ){

    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $nomeM = $_POST ["nomeM"];
    $dataN = $_POST["dataN"];
    
$servername = "localhost";
$database = "hospital";
$username = "root";
$password = "";
// Cria conexão
$conn = mysqli_connect($servername, $username, $password, $database);

// Verificar conexão;
if (!$conn){
    die("Falha na conexão: " . mysql_connect_error());
}

echo "Conectado com succes";

$sql = "INSERT INTO paciente (

nome, 
cpf, 
nomeMae, 
dataNascimento 
) VALUES (
   '$nome',
   '$cpf',
   '$nomeM',
   '$dataN'
    
);   ";

if(mysqli_query($conn, $sql)){
    echo "<br>Comando executado com sucesso<br>";
} else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}







mysqli_close($conn);

}
?>

</body>
</html>