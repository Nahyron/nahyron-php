<?php
require_once 'conexao.php';
$sqlU = 'SELECT * FROM usuario';

$queryU = mysqli_query($conn, $sqlU);

$sqlO = 'SELECT * FROM cadastro_obra';

$queryO = mysqli_query($conn, $sqlO);

if($_SERVER['REQUEST_METHOD'] == 'POST'){


if ($query = mysqli_query($conn, $sql)) {
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
    <title>empréstimo de livro</title>
</head>
<body>
    <form method="post">
        <fieldset>
            <legend>emprestar livros</legend>
            <label name="user">pessoa que vai pegar(precisa estar cadastrada)</label><br>

            <div id="usuario-div" class="oculto">
                <label>Selecione usuario</label>
                <select name="user" id="user">
                    <option value="">escolher usuario</option>
                    <?php while ($row = mysqli_fetch_assoc($query)): ?>
                        <option value="<?= $row['id_usuario'] ?>">
                            <?= $row['nome_usuario'] ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div><br><br>

            <label name="livro">Escolher livro</label><br>

            <div id="livro-div" class="oculto">
                <label>Selecione usuario</label>
                <select name="livro" id="livro">
                    <option value="">escolher usuario</option>
                    <?php while ($row = mysqli_fetch_assoc($queryO)): ?>
                        <option value="<?= $row['id_obra'] ?>">
                            <?= $row['nome_obra'] ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>

            

        </fieldset>
    </form>
</body>
</html>