<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>roupas pra enviar no banco de dados</title>
    <link rel="stylesheet" href="_css/main.css">
  
</head>
<body>
    <div class="container">
    <form method="POST">
    <fieldset style="width: 18%; text-align: center;position: absolute; right: 50%;" class="field">
    <legend>loja de roupa basica sem nada, atividade raynner</legend>
    <br>

    <label name="blusa">Coloque a cor da blusa que deseja</label>
    <input type="text" name="blusa">
    <br>
    <br>

    <label name="medidaB">Coloque a medida da blusa</label>
    <input type="text" name="medidaB">
    <br>
    <br>

    <label name="short">Coloque a cor do short que tu quieres</label>
    <input type="text" name="short">
    <br>
    <br>

    <label name="medidaS">Coloque a medida do short que quieres mucho</label>
    <input type="text" name="medidaS">
    <br>
    <br>

    <label name="entoubusc">Você quer que entregue in hour house, ou você quer buscar na loja mais próxima? (enviar terá taxas)</label>
    <input type="text" name="entoubusc">
    <br>
    <br>

    <!-- <input class="btn" type="submit" value="comprar (nao fazemos reembolso KKJ)"> -->

    <button onclick(teste())>compra</button>
     

    </form>

    </fieldset>
    </div>
    <div class="image">
        <img src="_images/seta.png" >
       
    </div>
</body>
</html>

 <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST" ){

    $blusa = $_POST["blusa"];
    $medidaBlusa = $_POST["medidaB"];
    $short = $_POST ["short"];
    $medidaShort = $_POST["medidaS"];
    $entoubusc = $_POST["entoubusc"];
    
$servername = "localhost";
$database = "banco01";
$username = "root";
$password = "";
// Cria conexão
$conn = mysqli_connect($servername, $username, $password, $database);

// Verificar conexão;
if (!$conn){
    die("Falha na conexão: " . mysqli_connect_error());
}

echo "Conectado com succes";

$sql = "INSERT INTO roupas (

corBlusa, 
medidaBlusa, 
corShort, 
medidaShort, 
entregarOubuscar 
) VALUES (
   '$blusa',
   '$medidaBlusa',
   '$short',
   '$medidaShort',
   '$entoubusc'
    
);   ";

if(mysqli_query($conn, $sql)){
    echo "<br>Comando executado com sucesso<br>";
} else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Verifica escolha de campos

$sql = "SELECT * FROM roupas";
$resultados = mysqli_query($conn, $sql) or die("Erro ao retornar dados");

// loop para ler todos os registros
$registro = mysqli_fetch_array($resultados);

while ($linha = mysqli_fetch_assoc($resultados)){
    echo $linha['corBlusa'] . "<br>";
    echo $linha['medidaBlusa'] . "<br>";
    echo $linha['corShort'] . "<br>";
    echo $linha['medidaShort'] . "<br>";
    echo $linha['entregarOubuscar'] . "<br>";
}

mysqli_close($conn);

}
?>