<?php
require_once 'conexao.php';

// --- 1. BUSCAR DADOS PARA O SELECT (FK de Pessoas) ---
// Precisamos listar as pessoas para o usuário escolher de quem é a conta
$sql_pessoas = "SELECT * FROM tab_pessoas";
$query_pessoas = mysqli_query($conn, $sql_pessoas);

// --- 2. PROCESSAR O FORMULÁRIO ---
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recebendo e protegendo os dados
    $id_pessoa = mysqli_real_escape_string($conn, $_POST['id_pessoa']); // A FK
    $banco     = mysqli_real_escape_string($conn, $_POST['banco']);
    $agencia   = mysqli_real_escape_string($conn, $_POST['agencia']);

    // Montando o INSERT com os nomes EXATOS da sua imagem
    // Tabela: pessoa_contas_bancarias (conforme você pediu)
    $sql_insert = "INSERT INTO pessoa_contas_bancarias (
        tab_pessoas_pessoa_id,
        pessoas_conta_banco,
        pessoa_contas_agencia
    ) VALUES (
        '$id_pessoa',
        '$banco',
        '$agencia'
    )";

    // Executando
    if (mysqli_query($conn, $sql_insert)) {
        echo "<script>alert('Conta bancária cadastrada com sucesso!'); window.location.href = window.location.href;</script>";
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
    <title>Cadastro de Contas Bancárias</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        label { font-weight: bold; display: block; margin-top: 10px; }
        input, select { width: 100%; max-width: 400px; padding: 8px; margin-top: 5px; }
        input[type="submit"] { margin-top: 20px; cursor: pointer; background-color: #007bff; color: white; border: none; padding: 10px; }
        input[type="submit"]:hover { background-color: #0056b3; }

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

    <h2>Cadastrar Conta Bancária</h2>

    <form method="POST">
        <fieldset style="max-width: 450px;">
            <legend>Dados Bancários</legend>

            <label>Titular da Conta (Pessoa):</label>
            <select name="id_pessoa" required>
                <option value="">-- Selecione a Pessoa --</option>
                <?php while ($row = mysqli_fetch_assoc($query_pessoas)): ?>
                    <option value="<?= $row['pessoa_id'] ?>">
                        <?= $row['pessoa_nome'] ?>
                    </option>
                <?php endwhile; ?>
            </select>

            <label>Banco / Conta:</label>
            <input type="text" name="banco" placeholder="Ex: Nubank - 12345-6" required>

            <label>Agência:</label>
            <input type="text" name="agencia" placeholder="Ex: 0001">

            <input type="submit" value="Salvar Conta">

        </fieldset>
    </form>

</body>
</html>