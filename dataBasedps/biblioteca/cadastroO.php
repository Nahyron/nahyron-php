<?php
require_once 'conexao.php';

$sqla = "SELECT * FROM autor";
$sqle = 'SELECT *FROM editora';

$querya = mysqli_query($conn, $sqla);
$querye = mysqli_query($conn, $sqle);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $genero = $_POST['genero'];
    $idade = $_POST['idade'];
    $idioma = $_POST['idioma'];
    $paginas = $_POST['paginas'];
    $autor = $_POST['autor'];
    $editora = $_POST['editora'];

    $sql = "INSERT INTO cadastro_obra(
     nome_obra,
    genero,
    faixa_etaria,
    idioma,
    paginas,
    autor_id,
    editora_id
    )VALUES(
   '$nome',
   '$genero',
   '$idade',
   '$idioma',
   '$paginas',
   '$autor',
   '$editora'
    );";


    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('deu certo 🎈');</script>";
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
    <title>cadastro de obras Livro</title>
</head>

<body>
    <form method="POST">
        <fieldset>
            <legend>Cadastrode obras</legend>

            <label name="nome">Nome do livro</label><br>
            <input type="text" name="nome" placeholder="nome do livro"><br><br>

            <label name="genero">genero</label><br>
            <input type="text" name="genero"><br><br>

            <label name="idade">faixa_etaria</label><br>
            <input type="number" name="idade"><br><br>

            <label name="idioma">idioma</label><br>
            <input type="text" name="idioma"><br><br>

            <label name="paginas">paginas</label><br>
            <input type="number" name="paginas"><br><br>


            


            <label name="autor">autor</label>

            <div id="autor-div" class="oculto">
                <label>Selecione o autor:</label>
                <select name="autor" id="autor-id">
                    <option value="">ver autores</option>
                    <?php while ($row = mysqli_fetch_assoc($querya)): ?>
                        <option value="<?= $row['id_autor'] ?>">
                            <?= $row['nome_autor'] ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div><br>


            <label name="editora">editora</label>

            <div id="editora-div" class="oculto">
                <label>Selecione a editora:</label>
                <select name="editora" id="editora-id">
                    <option value="">ver editoras</option>
                    <?php while ($row = mysqli_fetch_assoc($querye)): ?>
                        <option value="<?= $row['id_editora'] ?>">
                            <?= $row['nome_editora'] ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div><br><br>




            <button type="submit">Enviar para derry</button>
        </fieldset>
    </form>

    <button onclick="window.location.href='index.php'">voltar</button>
</body>

</html>