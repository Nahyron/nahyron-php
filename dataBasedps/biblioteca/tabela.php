<?php
require_once 'conexao.php';

$sql = "SELECT * FROM emprestimo";
$resultados = mysqli_query($conn, $sql) or die("Erro ao retornar dados");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Registros de Derry</title>
    <style>
        /* Estilo Biblioteca de Derry - Sombrio */
        body {
            font-family: 'Georgia', serif;
            background-color: #0d0d0d;
            background-image: radial-gradient(circle, #1a1a1a 0%, #000 100%);
            color: #e0e0e0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .table-container {
            width: 95%;
            background: rgba(20, 20, 20, 0.9);
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.8);
            border: 1px solid #333;
        }

        h2 {
            color: #ff0000;
            text-transform: uppercase;
            letter-spacing: 2px;
            border-left: 5px solid #ff0000;
            padding-left: 15px;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px #000;
        }

        /* Botão Voltar (Amarelo Georgie) */
        .btn-voltar {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 20px;
            background-color: #f1c40f;
            color: #000;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            text-transform: uppercase;
            transition: 0.3s;
        }

        .btn-voltar:hover {
            background-color: #d4ac0d;
            box-shadow: 0 0 10px #f1c40f;
            transform: scale(1.05);
        }

        /* Estilização da Tabela */
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #111;
        }

        th {
            background-color: #8b0000; /* Vermelho Escuro */
            color: white;
            text-align: left;
            padding: 15px;
            text-transform: uppercase;
            font-size: 0.8rem;
            border-bottom: 3px solid #000;
        }

        td {
            padding: 12px 15px;
            border-bottom: 1px solid #222;
            color: #ccc;
        }

        tr:hover {
            background-color: #1a1a1a;
        }

        /* Badges de Status Temáticas */
        .status {
            padding: 4px 12px;
            border-radius: 2px;
            font-size: 0.75rem;
            font-weight: bold;
            text-transform: uppercase;
        }

        /* Disponível: Cinza discreto */
        .status-disponivel {
            background-color: #255c03ff;
            color: #aaa;
            border: 1px solid #088c4cff;
        }

        /* Emprestado: Vermelho vivo */
        .status-emprestado {
            background-color: #ff0000;
            color: white;
            box-shadow: 0 0 5px #ff0000;
        }

        strong {
            color: #f1c40f; /* IDs em Amarelo */
        }
    </style>
</head>
<body>

<div class="table-container">
    <a href="index.php" class="btn-voltar">← Sair da Biblioteca</a>

    <h2>Registros de Empréstimos</h2>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Data Saída</th>
                <th>Vencimento</th>
                <th>Situação</th>
                <th>ID Usuário</th>
                <th>ID Obra</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($linha = mysqli_fetch_assoc($resultados)): 
                $status_class = ($linha['status_emprestimo'] == 'não emprestado') ? 'status-disponivel' : 'status-emprestado';
                $data_p = $linha['data_pegada'] ? date('d/m/Y', strtotime($linha['data_pegada'])) : '---';
                $data_v = $linha['data_validade'] ? date('d/m/Y', strtotime($linha['data_validade'])) : '---';
            ?>
                <tr>
                    <td><strong>#<?= $linha['id_emprestimo'] ?></strong></td>
                    <td><?= $data_p ?></td>
                    <td><?= $data_v ?></td>
                    <td>
                        <span class="status <?= $status_class ?>">
                            <?= $linha['status_emprestimo'] ?>
                        </span>
                    </td>
                    <td><?= $linha['usuario_id'] ?></td>
                    <td><?= $linha['cadastro_obra_id_obra'] ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
    

</body>
</html>