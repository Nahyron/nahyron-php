<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar movimentos financeiros</title>
<style>
    button {
        padding: 10px;
        width: 260px;
        background-color: white;
        bottom: 10%;
        position: absolute;
        padding: 20px;

}


    body {
            background-color: lightblue;
        }

        fieldset {
            position: absolute;
            top: 25%;
            left: 40%;
            background-color: wheat;
        }

        

        img {
            width: 25%;
            margin-left: 66%;


        }

        .btn,
        .reset {
            border-radius: 5px;

        }

        h1 {
            text-align: center;
        }

        .consulta {

     padding: 10px;
        width: 260px;
        background-color: white;
        bottom: 3%;
        position: absolute;
      
     
        padding: 20px;

}

     


    </style>
</head>
<body>
    <h1>fazendo transações?</h1>
    
    <fieldset>
    
    <form method="POST">



    <label name="idCliente">Id do cliente</label><br>
    <?php 

    $servername = "localhost";
    $database = "movimentacoes";
    $username = "root";
    $password = "";

    $con = mysqli_connect($servername, $username, $password, $database);

    $sql = "SELECT * FROM cadastroc";
    $resultado = mysqli_query($con, $sql) or die("Erro ao retornar dados");
    echo "<select name='idCliente'>";
    while ($linha = mysqli_fetch_assoc($resultado)){
        echo '<option value="'.$linha["id_cliente"].'">'.$linha["Nome_cliente"].'</option>';
    }
    echo "</select>";
    mysqli_close($con);
    
    
    ?>

    

    
    <select name="tipo">
        <option value="Entrada">Entrada</option>
        <option value="Saída">Saída</option>
    </select>
    
    
    <label name="valor">Valor da transação</label><br>
    <input type="number" name="valor" placeholder="Digite o valor da transação"><br><br>

    <label name="data">Data da transação</label><br>
    <input type="date" name="data"><br><br>

    <input class="btn" type="submit">
    <input class="reset" type="reset">

    </form>
    </fieldset>

   <button onclick="window.location.href='menu.html'">Voltar para o menu</button>
   <button onclick="window.location.href='consultarF.php'" class="consulta">Consultar Movimentos financeiros</button>


    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST" ){

    $idCliente = $_POST["idCliente"];
    $tipo = $_POST ["tipo"];
    $valor = $_POST["valor"];
    $data = $_POST["data"];
    
    
$servername = "localhost";
$database = "movimentacoes";
$username = "root";
$password = "";
// Cria conexão
$conn = mysqli_connect($servername, $username, $password, $database);

// Verificar conexão;
if (!$conn){
    die("Falha na conexão: " . mysql_connect_error());
}

echo "Conectado com succes";

$sql = "INSERT INTO movimento (

id_cliente, 
tipo, 
valor, 
data_movimento
) VALUES (
   '$idCliente',
   '$tipo',
   '$valor',
   '$data'
    
);   ";

if(mysqli_query($conn, $sql)){
    echo "<br>Comando executado com sucesso<br>";
} else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Verifica escolha de campos

$sql = "SELECT * FROM movimento";
$resultados = mysqli_query($conn, $sql) or die("Erro ao retornar dados");

// loop para ler todos os registros
$registro = mysqli_fetch_array($resultados);



mysqli_close($conn);

}
?>


</body>
</html>