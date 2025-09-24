<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de médico</title>

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

    .consultM {

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
        <legend>Cadastro do médico</legend>
        
        <label name="nome">Nome do médico:</label><br>
        <input name="nome" type="text" placeholder="Digite seu nome"><br><br>
        
        <label name="espec">especialidade do médico:</label><br>
        <input name="espec" type="text" placeholder="Digite a especialidade"><br><br>
        
        <label name="crm">Número CRM:</label><br>
        <input name="crm" type="number" placeholder="Digite o CRM"><br><br>
        
        <input type="submit" value="Enviar">
    </fieldset>

    
    
</form>
<button  onclick="window.location.href='menu.html'">Voltar para o menu</button>
<button  onclick="window.location.href='consultarM.php'" class="consultM">Consultar dados dos médicos</button>



  <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST" ){

    $nome = $_POST["nome"];
    $espec = $_POST["espec"];
    $crm = $_POST ["crm"];
    
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

$sql = "INSERT INTO medico (

nome, 
especialidade, 
numeroCrm
) VALUES (
   '$nome',
   '$espec',
   '$crm'
    
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