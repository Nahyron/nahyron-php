<?php
require_once 'conexao.php';

// ERRO 1 REMOVIDO: A linha "$query = mysqli_query($conn, $sql);" foi apagada
// porque a variável $sql não existia aqui.

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
    // É importante limpar os dados para evitar erros com aspas ou SQL Injection
    $rg     = mysqli_real_escape_string($conn, $_POST['rg']);
    $cpf    = mysqli_real_escape_string($conn, $_POST['cpf']);
    $titulo = mysqli_real_escape_string($conn, $_POST['titulo']);
    $cnh    = mysqli_real_escape_string($conn, $_POST['cnh']);
    $cnpj   = mysqli_real_escape_string($conn, $_POST['cnpj']);
    $insM   = mysqli_real_escape_string($conn, $_POST['insM']);
    $insE   = mysqli_real_escape_string($conn, $_POST['insE']);

    // ERRO 2 CORRIGIDO: A ordem dos valores agora bate com a ordem das colunas
    // Colunas: _ins_est, _ins_mun
    // Valores: $insE,    $insM
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
    
    // ERRO 3 REMOVIDO: Não fechamos a conexão aqui dentro, deixamos para o final do arquivo
    // ou deixamos o PHP fechar sozinho ao terminar o script.
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Documentos</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        label { font-weight: bold; }
        input { margin-bottom: 10px; width: 100%; max-width: 300px; padding: 5px; }
        input[type="submit"] { width: auto; background-color: #28a745; color: white; border: none; padding: 10px 20px; cursor: pointer; }
        
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
            <legend>Documentar documentos</legend>

            <label>RG:</label><br>
            <input type="text" placeholder="Seu RG" name="rg"><br>
            
            <label>CPF:</label><br>
            <input type="text" placeholder="Seu CPF" name="cpf"><br>
            
            <label>Título de Eleitor:</label><br>
            <input type="text" placeholder="Seu Título" name="titulo"><br>
            
            <label>CNH:</label><br>
            <input type="text" placeholder="Sua CNH" name="cnh"><br>
            
            <label>CNPJ:</label><br>
            <input type="text" placeholder="Seu CNPJ" name="cnpj"><br>
            
            <label>Inscrição Municipal:</label><br>
            <input type="text" placeholder="Sua Inscrição Municipal" name="insM"><br>
            
            <label>Inscrição Estadual:</label><br>
            <input type="text" placeholder="Sua Inscrição Estadual" name="insE"><br>
            
            <br>
            <input type="submit" value="Cadastrar">
        </fieldset>
    </form>
</body>
</html>