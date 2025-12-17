<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca de Derry</title>
    <style>
        /* Configurações Gerais */
        body {
            background-color: #0d0d0d;
            color: #e0e0e0;
            font-family: 'Georgia', serif;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            overflow: hidden;
            background-image: radial-gradient(circle, #1a1a1a 0%, #000 100%);
        }

        header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #8b0000;
            padding-bottom: 10px;
        }

        h1 {
            color: #ff0000;
            text-transform: uppercase;
            letter-spacing: 3px;
            text-shadow: 2px 2px 5px #000;
            margin: 0;
        }

        h2 {
            color: #f1c40f;
            font-style: italic;
            font-weight: lighter;
        }

        /* Container de Botões */
        .btn {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            z-index: 10;
        }

        button {
            padding: 15px 25px;
            background-color: #1a1a1a;
            color: #fff;
            border: 1px solid #444;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            transition: all 0.3s ease;
            text-transform: uppercase;
        }

        button:hover {
            background-color: #8b0000;
            border-color: #ff0000;
            box-shadow: 0 0 15px #ff0000;
            transform: scale(1.05);
        }

        /* Frase Estática */
        p {
            margin-top: 40px;
            font-size: 1.2rem;
            color: #444;
            letter-spacing: 1px;
        }

        .chuvakkj {

            width: 100%;
            height: 100%;
            z-index: -1;
            object-fit: cover;
            position: fixed;
            top: 0px;
            opacity: 10%;
        }

        .ultimo {
            position: relative;
            top: 30%;
            right: -45%;
        }

       

        
            
        }
    </style>
</head>

<body>
    <div class="rain"></div>

    <header>
        <h1>Olá funcionário</h1>
        <h2>Bem-vindo à Biblioteca de Derry</h2>
    </header>

    <div class="btn">
        <button onclick="window.location.href='cadastroP.php'">Cadastrar cidadãos</button>
        <button onclick="window.location.href='cadastroA.php'">Cadastrar autores</button>
        <button onclick="window.location.href='cadastroE.php'">Cadastrar editoras</button>
        <button onclick="window.location.href='cadastroO.php'">Cadastrar obras</button>
        <button onclick="window.location.href='emprestimo.php'">Empréstimos</button>
        <button onclick="window.location.href='devolucao.php'">devolução</button>
        <button onclick="window.location.href='tabela.php'" class="ultimo">Ver Registros</button>
    </div>

    <p>Todos flutuam aqui embaixo...</p>
        
        <img src="_media/2ii5.gif" class="chuvakkj">
   

        
</body>

</html>