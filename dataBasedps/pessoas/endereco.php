<?php
require_once 'conexao.php';

// --- 1. BUSCAR DADOS PARA O PRIMEIRO SELECT (PESSOAS) ---
// Trazemos todas as pessoas para preencher o dropdown
$sql_pessoas = "SELECT * FROM tab_pessoas";
$query_pessoas = mysqli_query($conn, $sql_pessoas);

// --- 2. BUSCAR DADOS PARA O SEGUNDO SELECT (TIPOS DE ENDEREÇO) ---
// Trazemos os tipos (Ex: Residencial, Comercial) para preencher o dropdown
$sql_tipos_end = "SELECT * FROM pessoa_tipo_endereco";
$query_tipos_end = mysqli_query($conn, $sql_tipos_end);


// --- 3. PROCESSAR O FORMULÁRIO QUANDO ENVIADO ---
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recebendo e limpando os dados (Segurança contra SQL Injection)
    // FK 1: ID da Pessoa
    $id_pessoa = mysqli_real_escape_string($conn, $_POST['id_pessoa']);
    
    // Campos de Texto normais
    $endereco  = mysqli_real_escape_string($conn, $_POST['endereco']);
    $numero    = mysqli_real_escape_string($conn, $_POST['numero']);
    $bairro    = mysqli_real_escape_string($conn, $_POST['bairro']);
    $cidade    = mysqli_real_escape_string($conn, $_POST['cidade']);
    $cep       = mysqli_real_escape_string($conn, $_POST['cep']);
    $obs       = mysqli_real_escape_string($conn, $_POST['obs']);
    
    // FK 2: ID do Tipo de Endereço
    $id_tipo_end = mysqli_real_escape_string($conn, $_POST['id_tipo_end']);

    // Montagem da Query de Inserção usando os nomes exatos da sua imagem
    $sql_insert = "INSERT INTO pessoa_endereco (
        tab_pessoas_pessoa_id,
        pessoa_endereco_end,
        pessoa_endereco_numero,
        pessoa_bairro,
        pessoa_cidade,
        pessoa_cep,
        pessoa_obs,
        pessoa_tipo_endereco_pessoa_tipo_end_id
    ) VALUES (
        '$id_pessoa',
        '$endereco',
        '$numero',
        '$bairro',
        '$cidade',
        '$cep',
        '$obs',
        '$id_tipo_end'
    )";

    // Executa a inserção
    if (mysqli_query($conn, $sql_insert)) {
        echo "<script>alert('Endereço cadastrado com sucesso!'); window.location.href = window.location.href;</script>";
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
    <title>Cadastro de Endereço</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        label { font-weight: bold; display: block; margin-top: 10px; }
        input, select, textarea { width: 100%; max-width: 400px; padding: 8px; margin-top: 5px; }
        input[type="submit"] { margin-top: 20px; cursor: pointer; background-color: #28a745; color: white; border: none; padding: 10px; }
        input[type="submit"]:hover { background-color: #218838; }

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

    <h2>Cadastrar Endereço da Pessoa</h2>

    <form method="POST">
        <fieldset style="max-width: 450px;">
            <legend>Dados do Endereço</legend>

            <label>Selecione a Pessoa:</label>
            <select name="id_pessoa" required>
                <option value="">-- Selecione --</option>
                <?php while ($row = mysqli_fetch_assoc($query_pessoas)): ?>
                    <option value="<?= $row['pessoa_id'] ?>"> <?= $row['pessoa_nome'] ?> </option>
                <?php endwhile; ?>
            </select>

            <label>Endereço (Rua/Av):</label>
            <input type="text" name="endereco" required>

            <label>Número:</label>
            <input type="text" name="numero" required>

            <label>Bairro:</label>
            <input type="text" name="bairro">

            <label>Cidade:</label>
            <input type="text" name="cidade">

            <label>CEP:</label>
            <input type="text" name="cep">

            <label>Tipo de Endereço:</label>
            <select name="id_tipo_end" required>
                <option value="">-- Selecione --</option>
                <?php while ($row = mysqli_fetch_assoc($query_tipos_end)): ?>
                    <option value="<?= $row['pessoa_tipo_end_id'] ?>"> 
                        <?= $row['pessoa_tipo_end_descricao'] ?? $row['descricao'] ?? 'Sem descrição' ?> 
                    </option>
                <?php endwhile; ?>
            </select>

            <label>Observações:</label>
            <textarea name="obs" rows="3"></textarea>

            <input type="submit" value="Salvar Endereço">

        </fieldset>
    </form>

</body>
</html>