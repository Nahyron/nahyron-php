<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Cadastros</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        h1 {
            color: #333;
            margin-bottom: 30px;
        }

        .menu-container {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            display: grid;
            grid-template-columns: repeat(2, 1fr); /* Duas colunas */
            gap: 20px;
            max-width: 600px;
            width: 100%;
        }

        .btn-menu {
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: white;
            font-size: 18px;
            font-weight: bold;
            padding: 20px;
            border-radius: 8px;
            transition: transform 0.2s, box-shadow 0.2s;
            text-align: center;
        }

        .btn-menu:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        /* Cores específicas para cada botão */
        .btn-pessoa { background-color: #007bff; }   /* Azul */
        .btn-endereco { background-color: #28a745; } /* Verde */
        .btn-banco { background-color: #6610f2; }    /* Roxo */
        .btn-documento { background-color: #fd7e14; } /* Laranja */

        /* Responsivo para celular */
        @media (max-width: 500px) {
            .menu-container {
                grid-template-columns: 1fr; /* Uma coluna no celular */
            }
        }
    </style>
</head>
<body>

    <h1>Painel de Controle</h1>

    <div class="menu-container">
        <!-- Botão para Cadastro de Pessoas -->
        <a href="cadastroP.php" class="btn-menu btn-pessoa">
            👤 Cadastrar Pessoas
        </a>

        <!-- Botão para Cadastro de Endereços -->
        <a href="endereco.php" class="btn-menu btn-endereco">
            🏠 Cadastrar Endereços
        </a>

        <!-- Botão para Contas Bancárias -->
        <a href="banco.php" class="btn-menu btn-banco">
            🏦 Contas Bancárias
        </a>

        <!-- Botão para Documentos (Supondo que você tenha essa página) -->
        <a href="documento.php" class="btn-menu btn-documento">
            📄 Documentos
        </a>
    </div>

</body>
</html>