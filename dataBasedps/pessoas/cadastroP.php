<?php
require_once 'conexao.php';

$sql = "SELECT * FROM tab_tipo_pessoa LIMIT 2";
$query = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro de pessoas porque somos pessoas</title>
</head>
<body>
    <form method="POST">
        <fieldset>
            <legend>Cadastrar pessoas humanas ser vivo</legend>
            <label name="nome">Nome:</label><br>
            <input type="text" name="nome" placeholder="Coloca seu nome ai atumalaka"><br><br>
           <select name="tipo">
    <?php while($row = mysqli_fetch_assoc($query)): ?>
        <option value="<?= $row['tipo_pessoa_id'] ?>">
            <?= $row['tipo_pessoa_descricao'] ?>
        </option>
    <?php endwhile; ?>
</select>



        </fieldset>
    </form>

    <? mysqli_close($conn) ?>
</body>
</html>