<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            background-color: lightblue;
        }
        fieldset {
            position: absolute;
            top: 30%;
            left: 40%;
            background-color: wheat;
            padding: 20px;
        }
    </style>
</head>
<body>
    <form method="POST">
        <fieldset>
            <legend>Login</legend>

            <label for="nome">Nome completo:</label><br>
            <input type="text" name="nome" id="nome" placeholder="nome aqui" required><br><br>

            <label for="senha">Senha:</label><br>
            <input type="password" name="senha" id="senha" placeholder="senha aqui" required><br><br>

            <input type="submit" name="enviar" value="Entrar">
        </fieldset>
    </form>
    <button onclick="window.location.href='index.php'" style="position: absolute; bottom: 10%; left: 40%;">Voltar para menu</button>
</body>
</html>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validação básica
    if (empty($_POST["nome"]) || empty($_POST["senha"])) {
        die("Nome e senha são obrigatórios.");
    }

    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    $servername = "localhost";
    $database = "plataformax";
    $username = "root";
    $password = "";
    $port = 3309;

    $conn = mysqli_connect($servername, $username, $password, $database, $port);

    if (!$conn) {
        die("Falha na conexão: " . mysqli_connect_error());
    }

    // Usar prepared statement para login seguro
    $stmt = mysqli_prepare($conn, "SELECT * FROM usuario WHERE nome_completo = ? AND senha_user = ?");
    mysqli_stmt_bind_param($stmt, "ss", $nome, $senha);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        echo "<div style='color: green; position: absolute; top: 10%; left: 40%;'>Login realizado com sucesso!</div>";
        // Aqui você pode iniciar sessão ou redirecionar
    } else {
        echo "<div style='color: red; position: absolute; top: 10%; left: 40%;'>Nome ou senha incorretos.</div>";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

?>