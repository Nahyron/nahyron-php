<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de funcionario</title>
</head>

<body>

    <style>
        body {
            background-color: lightblue;
        }

        fieldset {
            position: absolute;
            top: 25%;
            left: 40%;
            background-color: wheat;
        }

        .image {

            transform: scaleY(-1) scaleX(-1);



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

        button {
        padding: 10px;
        width: 260px;
        background-color: white;
        bottom: 10%;
        position: absolute;
      
     
        padding: 20px;
    }

     .consultarc {

     padding: 10px;
        width: 260px;
        background-color: white;
        bottom: 3%;
        position: absolute;
      
     
        padding: 20px;
    }

    
    </style>

    <form method="POST">
        <h1>Bem vindo ao cadastro de funcionario</h1>

        <fieldset>
            <legend>Cadastro de funcionario</legend>

            <label name="nome">Nome do cliente:</label><br>
            <input name="nome" type="text" placeholder="Digite seu nome"><br><br>

            <label name="Email">Digite seu email</label><br>
            <input name="Email" type="email" placeholder="Digite seu email"><br><br>

            <label name="telefone">Digite seu telefone</label><br>
            <input name="telefone" type="tel" placeholder="Digite seu telefone"><br><br>

            <label name="endereco">Digite seu endereço</label><br>
            <input name="endereco" type="text" placeholder="Digite seu endereço"><br><br>

            <label name="cidade">Digite sua cidade</label><br>
            <input name="cidade" type="text" placeholder="Digite sua cidade"><br><br>

            <label name="estado">Digite seu estado</label><br>
            <input name="estado" type="text" placeholder="Digite seu estado"><br><br>

            <input type="submit" class="btn">
            <input type="reset" class="reset">

        </fieldset>

        
    </form>
    
    <button onclick="window.location.href='menu.html'">Voltar para o menu</button>
    <button onclick="window.location.href='consultarC.php'" class="consultarc" >Consultar dados cadastrados</button>


    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST" ){

    $nome = $_POST["nome"];
    $email = $_POST["Email"];
    $telefone = $_POST ["telefone"];
    $endereco = $_POST["endereco"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    
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

$sql = "INSERT INTO cadastroc (

Nome_cliente, 
Email_cliente, 
Telefone_cliente, 
Endereco_cliente, 
Cidade_cliente,
Estado_cliente
) VALUES (
   '$nome',
   '$email',
   '$telefone',
   '$endereco',
   '$cidade',
   '$estado'
    
);   ";

if(mysqli_query($conn, $sql)){
    echo "<br>Comando executado com sucesso<br>";
} else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Verifica escolha de campos

$sql = "SELECT * FROM cadastroc";
$resultados = mysqli_query($conn, $sql) or die("Erro ao retornar dados");

// loop para ler todos os registros
$registro = mysqli_fetch_array($resultados);



mysqli_close($conn);

}
?>


</body>

</html>