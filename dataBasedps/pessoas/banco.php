<?php
require_once 'conexao.php';

// --- 1. BUSCAR DADOS PARA O SELECT (FK de Pessoas) ---
$sql_pessoas = "SELECT * FROM tab_pessoas";
$query_pessoas = mysqli_query($conn, $sql_pessoas);

// --- 2. PROCESSAR O FORMULÁRIO ---
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recebendo e protegendo os dados
    $id_pessoa = mysqli_real_escape_string($conn, $_POST['id_pessoa']); 
    $banco     = mysqli_real_escape_string($conn, $_POST['banco']);
    $agencia   = mysqli_real_escape_string($conn, $_POST['agencia']);

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
        /* --- RESET E ESTRUTURA BÁSICA --- */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6; /* Fundo cinza azulado suave */
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        /* --- BOTÃO DE VOLTAR --- */
        .btn-voltar {
            align-self: flex-start;
            margin-bottom: 20px;
            padding: 10px 20px;
            background-color: #fff;
            color: #555;
            text-decoration: none;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        
        /* Centraliza o botão voltar em telas maiores para alinhar com o form */
        @media(min-width: 600px) {
            .btn-voltar {
                align-self: center;
                margin-right: auto;
                margin-left: calc(50% - 250px);
            }
        }

        .btn-voltar:hover {
            background-color: #e9ecef;
            border-color: #ccc;
            color: #333;
        }

        /* --- ESTILO DO CARTÃO (FORMULÁRIO) --- */
        form {
            background-color: #ffffff;
            width: 100%;
            max-width: 500px;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1); /* Sombra elegante */
        }

        h2 {
            display: none; /* Escondi o H2 original para usar o Legend como título */
        }

        fieldset {
            border: none;
            padding: 0;
            margin: 0;
        }

        legend {
            font-size: 1.6rem;
            color: #2c3e50;
            font-weight: 700;
            margin-bottom: 25px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f0f2f5;
            width: 100%;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* --- INPUTS E LABELS --- */
        label {
            font-size: 0.9rem;
            font-weight: 600;
            color: #495057;
            margin-bottom: 8px;
            display: block;
            margin-top: 15px;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ced4da;
            border-radius: 6px;
            font-size: 1rem;
            background-color: #fff;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        /* Efeito ao clicar no campo */
        input[type="text"]:focus,
        select:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 0 4px rgba(0, 123, 255, 0.15);
        }

        /* Placeholder style */
        ::placeholder {
            color: #adb5bd;
            font-size: 0.9rem;
        }

        /* --- BOTÃO DE SUBMIT --- */
        input[type="submit"] {
            width: 100%;
            margin-top: 30px;
            padding: 15px;
            background-color: #007bff; /* Azul padrão "Link/Ação" */
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        input[type="submit"]:active {
            transform: scale(0.98);
        }

    </style>
</head>
<body>

    <a href="index.php" class="btn-voltar">⬅ Voltar ao Menu</a>

    <form method="POST">
        <fieldset>
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
            <input type="text" name="banco" placeholder="Ex: Nubank - Conta 12345-6" required>

            <label>Agência:</label>
            <input type="text" name="agencia" placeholder="Ex: 0001">

            <input type="submit" value="Salvar Conta">

        </fieldset>
    </form>

</body>
</html>