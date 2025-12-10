<?
require_once 'conexao.php';
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>biblioteca de derry</title>
</head>
<body>
    <header>
    <h1>Olá funcionario, Bem-Vindo a biblioteca de derry</h1>
    <h2>O que deseja fazer?</h2>
    </header>


    <div class="btn">
    <button onclick="window.location.href='cadastroP.php'">Cadastrar usuarios em derry</button>
    <button onclick="window.location.href='cadastroA.php'">Cadastrar autores</button>
    <button onclick="window.location.href='cadastroE.php'">Cadastrar editoras</button>
    <button onclick="window.location.href='emprestimo.php'">emprestimo</button>
    </div>


    <p>Quer flutuar também?</p>





</body>
</html>