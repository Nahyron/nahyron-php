<?php
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = $_POST ['nomeE'];
    $data = $_POST ['dataC'];
    $tel = $_POST ['tel'];
    $spec = $_POST ['spec'];

    $sql = "INSERT INTO editora(
    nome_editora,
    data_criação,
    tel_suporte,
    especializacao
    )VALUE(
    '$nome',
    '$data',
    '$tel',
    '$spec'
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
    <title>cadastrar editora</title>
</head>

<body>
    <form method="post">
        <fieldset>
            <legend>cadastrar editora dentro</legend>
            <label name="nomeE">Nome da nome editora</label><br>
            <input type="text" name="nomeE"><br><br>

            <label name="dataC">data criação</label><br>
            <input type="date" name="dataC"><br><br>

            <label name="tel">telefone de contato</label><br>
            <input type="tel" name="tel"><br><br>

            <label name="spec">especialização</label><br>
            <input type="text" name="spec"><br><br>

            <button type="submit">Enviar pro esgoto</button>

        </fieldset>
    </form>
</body>

</html>