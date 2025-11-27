<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetStop</title>

    <style>
         body{
            background-color: plum;
        }


        h1{
            text-align: center;
        }

        .container {
        display: flex;
        justify-content: center;
        justify-content: space-around;
        background-color: gray;
        margin: -9px;
        padding: 40px;
    }

    .container2{
         display: flex;
        justify-content: center;
        justify-content: space-around;
        background-color: gray;
        margin: -9px;
        padding: 40px;
    }

    button {
        padding: 20px;
        width: 300px;
        background-color: white;

    }

    button:hover {
        background-color: blueviolet;
        transition: background-color 0.3s;
    }


    button:not(:hover) {
        background-color: #f0f0f0;
        transition: background-color 2s;
    }
    </style>


</head>
<body>
    <h1>Menu</h1>

    <button onclick="window.location.href='cliente.php'">cliente</button>
    <button onclick="window.location.href='agencia.php'">Agência</button>
    <button onclick="window.location.href='instFinan.php'">Instituição financeira</button>
    <button onclick="window.location.href='contBank.php'">conta bancária</button>
    <button onclick="window.location.href='move.php'">movimentação</button>
    <button onclick="window.location.href='clienteConsu.php'">Consultar Cliente</button>
    <button onclick="window.location.href='agenciaConsu.php'">Consultar agência</button>
    <button onclick="window.location.href='instConsu.php'">Consultar Instituição financeira</button>
    <button onclick="window.location.href='bankConsu.php'">Consultar Conta Bancária</button>
    <button onclick="window.location.href='moveConsu.php'">Consultar movimentações</button>
    <button onclick="window.location.href='tudoTable.php'">ver a tudoTable KKJ</button>
</body>
</html>