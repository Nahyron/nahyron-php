<?php
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $nacionalidade = $_POST['nacionalidade'];
    $dataN = $_POST['dataN'];
    $email = $_POST['email'];

    $sql = "INSERT INTO autor (
    nome_autor,
    idade_autor,
    nacionalidade,
    data_nascimento,
    email_autor
    )VALUES(
    '$nome',
    '$idade',
    '$nacionalidade',
    '$dataN',
    '$email'
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
    <title>cadastrar autor flutuante</title>
</head>

<body>
    <header>
        <h1>Olá funcionario, deseja cadastrar um autor flutuante?</h1>
    </header>

    <form method="POST">
        <fieldset>
            <legend>
                Cadastrar autor flutuante</legend>

            <label name="nome">Nome:</label><br>
            <input type="text" name="nome" placeholder="Seu nome"><br><br>

            <label name="idade">idade:</label><br>
            <input type="number" name="idade" placeholder="Sua idade"><br><br>

            <label name="nacionalidade">Nacionalidade:</label><br>
            <input type="text" name="nacionalidade" placeholder="Sua nacionalidade"><br><br>

            <label name="dataN">data de nascimento:</label><br>
            <input type="date" name="dataN" placeholder="Sua data de nascimento"><br><br>

            <label name="email">email:</label><br>
            <input type="email" name="email" placeholder="Seu email"><br><br>

            <button type="submit">flutuar</button>

        </fieldset>
    </form>

</body>

</html>