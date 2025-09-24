<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar prontuario</title>

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

    .prontuConsu {

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
    <h1>Cadastro de prontuario</h1>
    
    <fieldset>
        <legend>Cadastro de Paciente</legend>
        
        <label name="pac">id do paciente:</label><br>
        <input name="pac" type="number" placeholder="Digite o id paciente"><br><br>
        
        <label name="med">id do médico:</label><br>
        <input name="med" type="number" placeholder="Digite o id médico"><br><br>
        
        <label name="dataC">Data de consulta:</label><br>
        <input name="dataC" type="date" placeholder="Digite a data"><br><br>
        
        <label name="dataR">Data de registro</label><br>
        <input name="dataR" type="date" placeholder="Digite a data:"><br><br>

        <label name="desc">Descrição dos sintomas</label><br>
        <input name="desc" type="text" placeholder="Digite os sintomas:"><br><br>

         <label name="presc">prescrição</label><br>
        <input name="presc" type="text" placeholder="Digite a prescrição:"><br><br>

         <label name="obs">observação</label><br>
        <input name="obs" type="text" placeholder="Digite a observação:"><br><br>
        
        
        
        <input type="file" name="arquivo">
        
        <input type="submit" value="Enviar">
        
    </form>

    </fieldset>


    
    
     <button  onclick="window.location.href='menu.html'">Voltar para o menu</button>
     <button  onclick="window.location.href='prontuarioConsu.php'" class="prontuConsu">Consultar Prontuario</button>



      <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST" ){

    $idp = $_POST["pac"];
    $idm = $_POST["med"];
    $dataC = $_POST ["dataC"];
    $dataR = $_POST["dataR"];
    $desc = $_POST["desc"];
    $presc = $_POST["presc"];
    $obs = $_POST["obs"];
    $arquivo = $_POST["arquivo"];
  
    
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

$sql = "INSERT INTO prontuario (

id_paciente, 
id_medico, 
dataConsulta,
dataRegistro,
descSintomas,
prescricao,
observacao,
imagem
) VALUES (
   '$idp',
   '$idm',
   '$dataC',
   '$dataR',
   '$desc',
   '$presc',
   '$obs',
   '$arquivo'
    
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