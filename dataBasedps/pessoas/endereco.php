<?php
require_once 'conexao.php';

// --- 1. BUSCAR DADOS PARA O PRIMEIRO SELECT (PESSOAS) ---
$sql_pessoas = "SELECT * FROM tab_pessoas";
$query_pessoas = mysqli_query($conn, $sql_pessoas);

// --- 2. BUSCAR DADOS PARA O SEGUNDO SELECT (TIPOS DE ENDEREÇO) ---
$sql_tipos_end = "SELECT * FROM pessoa_tipo_endereco";
$query_tipos_end = mysqli_query($conn, $sql_tipos_end);


// --- 3. PROCESSAR O FORMULÁRIO QUANDO ENVIADO ---
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recebendo e limpando os dados (Segurança contra SQL Injection)
    $id_pessoa = mysqli_real_escape_string($conn, $_POST['id_pessoa']);
    $endereco  = mysqli_real_escape_string($conn, $_POST['endereco']);
    $numero    = mysqli_real_escape_string($conn, $_POST['numero']);
    $bairro    = mysqli_real_escape_string($conn, $_POST['bairro']);
    $cidade    = mysqli_real_escape_string($conn, $_POST['cidade']);
    $cep       = mysqli_real_escape_string($conn, $_POST['cep']);
    $obs       = mysqli_real_escape_string($conn, $_POST['obs']);
    $id_tipo_end = mysqli_real_escape_string($conn, $_POST['id_tipo_end']);

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
        /* --- RESET E BASE --- */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
            color: #333;
        }

        /* --- BOTÃO VOLTAR --- */
        .btn-voltar {
            align-self: flex-start;
            margin-bottom: 20px;
            padding: 10px 20px;
            background-color: #6c757d;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            transition: background-color 0.3s;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        @media(min-width: 550px) {
            .btn-voltar {
                align-self: center;
                margin-right: auto;
                margin-left: calc(50% - 250px); /* Alinha com o inicio do form */
            }
        }

        .btn-voltar:hover {
            background-color: #5a6268;
        }

        /* --- FORMULÁRIO (CARD) --- */
        form {
            background-color: #ffffff;
            width: 100%;
            max-width: 500px;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        h2 {
            display: none; /* Oculta o título H2 externo para usar o Legend */
        }

        fieldset {
            border: none;
            padding: 0;
            margin: 0;
        }

        legend {
            font-size: 1.5rem;
            color: #1e272e;
            font-weight: 700;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f0f2f5;
            width: 100%;
            text-align: center;
        }

        /* --- INPUTS, SELECTS E TEXTAREA --- */
        label {
            font-weight: 600;
            color: #555;
            margin-bottom: 5px;
            display: block;
            margin-top: 15px;
        }

        input[type="text"],
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ced4da;
            border-radius: 6px;
            font-size: 14px;
            background-color: #fafafa;
            transition: all 0.3s ease;
            font-family: inherit; /* Para o textarea usar a mesma fonte */
        }

        input[type="text"]:focus,
        select:focus,
        textarea:focus {
            border-color: #28a745;
            background-color: #fff;
            outline: none;
            box-shadow: 0 0 0 3px rgba(40, 167, 69, 0.15);
        }

        /* Estilo específico para a área de texto */
        textarea {
            resize: vertical; /* Permite redimensionar apenas a altura */
            min-height: 80px;
        }

        /* --- BOTÃO SALVAR --- */
        input[type="submit"] {
            width: 100%;
            margin-top: 25px;
            padding: 15px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }

        input[type="submit"]:active {
            transform: scale(0.98);
        }

    </style>
</head>
<body>

    <a href="index.php" class="btn-voltar">⬅ Voltar ao Menu</a>

    <h2>Cadastrar Endereço da Pessoa</h2>

    <form method="POST">
        <fieldset>
            <legend>Dados do Endereço</legend>

            <label>Selecione a Pessoa:</label>
            <select name="id_pessoa" required>
                <option value="">-- Selecione --</option>
                <?php while ($row = mysqli_fetch_assoc($query_pessoas)): ?>
                    <option value="<?= $row['pessoa_id'] ?>"> <?= $row['pessoa_nome'] ?> </option>
                <?php endwhile; ?>
            </select>

            <label>Endereço (Logradouro):</label>
            <input type="text" name="endereco" placeholder="Ex: Rua das Flores" required>

            <label>Número:</label>
            <input type="text" name="numero" placeholder="Ex: 123 ou S/N" required>

            <label>Bairro:</label>
            <input type="text" name="bairro" placeholder="Ex: Centro">

            <label>Cidade:</label>
            <input type="text" name="cidade" placeholder="Ex: São Paulo">

            <label>CEP:</label>
            <input type="text" name="cep" placeholder="00000-000">

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
            <textarea name="obs" rows="3" placeholder="Ponto de referência ou detalhes extras"></textarea>

            <input type="submit" value="Salvar Endereço">

        </fieldset>
    </form>

</body>
</html>