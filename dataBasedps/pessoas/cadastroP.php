<?php
require_once 'conexao.php';

// --- CONSULTA 1: Busca os tipos de pessoa ---
$sql_tipo = "SELECT * FROM tab_tipo_pessoa";
$query_tipo = mysqli_query($conn, $sql_tipo);

// --- CONSULTA 2: Busca os documentos (CPFs) ---
$sql_docs = "SELECT * FROM pessoa_documento";
$query_docs = mysqli_query($conn, $sql_docs);

// --- CONSULTA 3: Busca as situações ---
$sql_situ = "SELECT * FROM pessoa_situacao";
$query_situ = mysqli_query($conn, $sql_situ);


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Limpeza e segurança dos dados
    $nome      = mysqli_real_escape_string($conn, $_POST['nome']);
    $tipo      = mysqli_real_escape_string($conn, $_POST['tipo']);
    $documento = mysqli_real_escape_string($conn, $_POST['documento']);
    $situacao  = mysqli_real_escape_string($conn, $_POST['situacao']);
    $telefone  = mysqli_real_escape_string($conn, $_POST['tel']);
    $celular   = mysqli_real_escape_string($conn, $_POST['cell']);
    $email     = mysqli_real_escape_string($conn, $_POST['email']);
    $data      = mysqli_real_escape_string($conn, $_POST['data']);


    $sql = "INSERT INTO tab_pessoas(
        pessoa_nome,
        tab_tipo_pessoa_tipo_pessoa_id,
        pessoa_documento_id_pessoa_documento,
        pessoa_situacao_pessoa_situacao_id,
        pessoa_telefone,
        pessoa_celular,
        pessoa_email,
        pessoa_data_cadastro
    ) VALUES (
        '$nome',
        '$tipo',
        '$documento',
        '$situacao',
        '$telefone',
        '$celular',
        '$email',
        '$data'
    )";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Pessoa cadastrada com sucesso!'); window.location.href = window.location.href;</script>";
    } else {
        echo "Erro ao cadastrar: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pessoas</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        label { font-weight: bold; margin-top: 10px; display: block; }
        input, select { margin-bottom: 10px; width: 100%; max-width: 300px; padding: 5px; }
        input[type="submit"] { width: auto; background-color: #007bff; color: white; border: none; padding: 10px 20px; cursor: pointer; }
        
        /* Estilo do botão de voltar */
        .btn-voltar {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 15px;
            background-color: #6c757d; /* Cinza */
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
        }
        .btn-voltar:hover {
            background-color: #5a6268;
        }
    </style>
</head>

<body>
    
    <!-- Botão de Voltar -->
    <a href="index.php" class="btn-voltar">⬅ Voltar ao Menu</a>

    <form method="POST">
        <fieldset style="max-width: 400px;">
            <legend>Cadastrar pessoas humanas ser vivo</legend>

            <label>Nome:</label>
            <input type="text" name="nome" placeholder="Coloca seu nome ai atumalaka" required>

            <label>Tipo:</label>
            <select name="tipo">
                <?php while ($row = mysqli_fetch_assoc($query_tipo)): ?>
                    <option value="<?= $row['tipo_pessoa_id'] ?>">
                        <?= $row['tipo_pessoa_descricao'] ?>
                    </option>
                <?php endwhile; ?>
            </select>

            <label>Documento (CPF):</label>
            <select name="documento">
                <?php while ($row = mysqli_fetch_assoc($query_docs)): ?>
                    <option value="<?= $row['id_pessoa_documento'] ?>">
                        <?= $row['pessoa_documento_cpf'] ?>
                    </option>
                <?php endwhile; ?>
            </select>

            <label>Situação:</label>
            <select name="situacao">
                <?php while ($row = mysqli_fetch_assoc($query_situ)): ?>
                    <option value="<?= $row['pessoa_situacao_id'] ?>">
                        <?= $row['pessoa_situacao_obs'] ?>
                    </option>
                <?php endwhile; ?>
            </select>

            <label>Coloque seu telefone</label>
            <input type="tel" name="tel" placeholder="Seu telefone">
            
            <label>Coloque seu celular</label>
            <input type="tel" name="cell" placeholder="Seu celular">
            
            <label>Coloque seu email</label>
            <input type="email" name="email" placeholder="Seu email">
            
            <label>Coloque sua data de cadastro</label>
            <input type="date" name="data" placeholder="sua data de cadastro">

            <br><br>
            <input type="submit" value="Cadastrar">

        </fieldset>
    </form>
</body>

</html>