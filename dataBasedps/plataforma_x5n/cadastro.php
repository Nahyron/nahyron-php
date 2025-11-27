<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <style>
        fieldset {
            position: absolute;
            top: 25%;
            left: 40%;
            background-color: wheat;
        }

        button {
            padding: 10px;
            width: 260px;
            background-color: white;
            bottom: 10%;
            position: absolute;
            padding: 20px;
        }

        .consultP {
            padding: 10px;
            width: 260px;
            background-color: white;
            bottom: 3%;
            position: absolute;
            padding: 20px;
        }

        body {
            background-color: lightblue;
        }

        h1 {
            text-align: center;
        }
    </style>
</head>

<body>
    <form method="POST">
        <fieldset>
            <legend>cadastro BD experimental umbrella</legend><br>
            <label for="nome">Nome Completo:</label><br>
            <input type="text" name="nome" id="nome" required><br><br>
            <label for="cpf">CPF:</label><br>
            <input type="text" name="cpf" id="cpf" required><br><br>
            <label for="email_user">Email:</label><br>
            <input type="email" name="email_user" id="email_user" required><br><br>
            <label for="telefone">Telefone:</label><br>
            <input type="tel" name="telefone" id="telefone" required><br><br>
            <label for="senha">Senha:</label><br>
            <input type="password" name="senha" id="senha" required><br><br>
            <input type="submit" value="enviar">
        </fieldset>
    </form>
    <button onclick="window.location.href='index.php'">Voltar para menu</button>
</body>
</html>




<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validação básica
    if (empty($_POST["nome"]) || empty($_POST["cpf"]) || empty($_POST["email_user"]) || empty($_POST["telefone"]) || empty($_POST["senha"])) {
        die("Todos os campos são obrigatórios.");
    }

    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $email = $_POST["email_user"];
    $telefone = $_POST["telefone"];
    $senha = $_POST["senha"];
    $port = 3309;

    $servername = "localhost";
    $database = "plataformax";
    $username = "root";
    $password = "";
    // Cria conexão
    $conn = mysqli_connect($servername, $username, $password, $database, $port);

    // Verificar conexão;
    if (!$conn) {
        die("Falha na conexão: " . mysqli_connect_error());
    }

    echo "Conectado com sucesso";

    $senhaUser = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 8);
    $nomeUser = strtolower(str_replace(' ', '', $nome)); // Define nomeUser baseado no nome

    // Usar prepared statements para prevenir SQL injection
    $stmt = mysqli_prepare($conn, "INSERT INTO usuario (nome_completo, cpf_user, email_user, telefone_user, nome_user_banco, senha_user_banco, senha_user) VALUES (?, ?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sssssss", $nome, $cpf, $email, $telefone, $nomeUser, $senhaUser, $senha);

    if (mysqli_stmt_execute($stmt)) {
        echo "<br>Comando executado com sucesso<br>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Cria usuário e dá permissões para ele
    $nomeUser_escaped = mysqli_real_escape_string($conn, $nomeUser);
    $senha_escaped = mysqli_real_escape_string($conn, $senha);
    $sql_create_user = "CREATE USER '$nomeUser_escaped'@'localhost' IDENTIFIED BY '$senha_escaped'";
    if (mysqli_query($conn, $sql_create_user)) {
        $sql_grant = "GRANT INSERT, SELECT, DELETE, UPDATE ON plataformax.* TO '$nomeUser_escaped'@'localhost'";
        if (mysqli_query($conn, $sql_grant)) {
            echo "<div class='alert alert-success'>Usuário criado com sucesso</div>";
        } else {
            echo "<div class='alert alert-danger'>Erro ao conceder permissões: " . mysqli_error($conn) . "</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Erro ao criar usuário: " . mysqli_error($conn) . "</div>";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
    



?>