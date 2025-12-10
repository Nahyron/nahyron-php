<?php
require_once 'conexao.php';


if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
    // É importante limpar os dados para evitar erros com aspas ou SQL Injection
    $rg     = mysqli_real_escape_string($conn, $_POST['rg']);
    $cpf    = mysqli_real_escape_string($conn, $_POST['cpf']);
    $titulo = mysqli_real_escape_string($conn, $_POST['titulo']);
    $cnh    = mysqli_real_escape_string($conn, $_POST['cnh']);
    $cnpj   = mysqli_real_escape_string($conn, $_POST['cnpj']);
    $insM   = mysqli_real_escape_string($conn, $_POST['insM']);
    $insE   = mysqli_real_escape_string($conn, $_POST['insE']);

    $sql = "INSERT INTO pessoa_documento (
        pessoa_documento_rg,
        pessoa_documento_cpf,
        pessoa_documento_titulo,
        pessoa_documento_cnh,
        pessoa_documento_cnpj,
        pessoa_documento_ins_est,
        pessoa_documento_ins_mun
    ) VALUES (
        '$rg',
        '$cpf',
        '$titulo',
        '$cnh',
        '$cnpj',
        '$insE', 
        '$insM' 
    )";

    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Documentos cadastrados com sucesso!'); window.location.href = window.location.href;</script>";
    } else {
        echo "Erro: " . mysqli_error($conn);
    }
    
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Documentos</title>
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

        /* Ajuste para centralizar o botão voltar em telas grandes */
        @media(min-width: 550px) {
            .btn-voltar {
                align-self: center;
                margin-right: auto;
                margin-left: calc(50% - 225px); /* Alinha com o início do form */
            }
        }

        .btn-voltar:hover {
            background-color: #5a6268;
        }

        /* --- FORMULÁRIO (CARD) --- */
        form {
            background-color: #ffffff;
            width: 100%;
            max-width: 450px;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        fieldset {
            border: none;
            padding: 0;
            margin: 0;
            width: 100%;
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

        /* --- INPUTS E LABELS --- */
        label {
            font-weight: 600;
            color: #555;
            margin-bottom: 5px;
            display: block;
            margin-top: 15px;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ced4da;
            border-radius: 6px;
            font-size: 14px;
            background-color: #fafafa;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus {
            border-color: #28a745; /* Foco Verde */
            background-color: #fff;
            outline: none;
            box-shadow: 0 0 0 3px rgba(40, 167, 69, 0.15);
        }

        /* --- BOTÃO CADASTRAR --- */
        input[type="submit"] {
            width: 100%;
            margin-top: 25px;
            padding: 15px;
            background-color: #28a745; /* Verde Sucesso */
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

        /* Remove margem extra dos BRs no layout antigo */
        br {
            display: none;
        }

    </style>
</head>
<body>
    
    <a href="index.php" class="btn-voltar">⬅ Voltar ao Menu</a>

    <form method="POST">
        <fieldset>
            <legend>Registro de Documentos</legend>

            <label>RG:</label>
            <input type="text" placeholder="Digite seu RG" name="rg">
            
            <label>CPF: (caso for fisico)</label>
            <input type="text" placeholder="Digite seu CPF" name="cpf">
            
            <label>Título de Eleitor:</label>
            <input type="text" placeholder="Digite seu Título" name="titulo">
            
            <label>CNH:</label>
            <input type="text" placeholder="Digite sua CNH" name="cnh">
            
            <label>CNPJ: (caso for juridico)</label>
            <input type="text" placeholder="Digite seu CNPJ" name="cnpj">
            
            <label>Inscrição Municipal:</label>
            <input type="numberko" placeholder="Inscrição Municipal" name="insM">
            
            <label>Inscrição Estadual:</label>
            <input type="number" placeholder="Inscrição Estadual" name="insE">
            
            <input type="submit" value="Salvar Documentos">
        </fieldset>
    </form>
</body>
</html>