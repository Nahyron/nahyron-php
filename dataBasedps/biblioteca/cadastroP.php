<?php
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];

    $sql = "INSERT INTO usuario (
    nome_usuario,
    idade_usuario,
    email_usuario,
    tel_usuario
    )VALUES(
    '$nome',
    '$idade',
    '$email',
    '$tel'
    );";

       if (mysqli_query($conn, $sql)) {
        echo "<script>alert('quer flutuar? 🎈');</script>";
    } else {
        // Adicionei o 'echo' para o erro aparecer na tela
        echo "Erro ao cadastrar: " . mysqli_error($conn);
    }

}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar usuarios em derry</title>
</head>

<body>
    <form method="POST">
        <fieldset>
            <legend>que você deseja cadastrar? 🎈</legend>
            <label name="nome">Nome:</label><br>
            <input type="text" name="nome" placeholder="Seu nome aqui"><br><br>

            <label name="idade">idade:</label><br>
            <input type="number" name="idade" placeholder="sua idade aqui"><br><br>

            <label name="email">email:</label><br>
            <input type="email" name="email" placeholder="Seu email aqui"><br><br>

            <label name="tel">telefone:</label><br>
            <input type="tel" name="tel" placeholder="Seu nome aqui"><br><br>
            <input type="submit">
        </fieldset>
    </form>


</body>

</html>