<?php
require_once 'conexao.php';

// 1. Busca Usuários
$sqlU = 'SELECT * FROM usuario';
$queryU = mysqli_query($conn, $sqlU);

// 2. Busca Obras
$sqlO = 'SELECT * FROM cadastro_obra';
$queryO = mysqli_query($conn, $sqlO);

// 3. Processa o formulário
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST["user"];
    $livro = $_POST["livro"];
    $data_emprestimo = $_POST["data"];
    $data_validade = date('Y-m-d', strtotime($data_emprestimo . " + 11 days"));
    $status = "emprestado";

    // --- NOVA VERIFICAÇÃO: O LIVRO ESTÁ COM OUTRA PESSOA? ---
    // Procuramos se o livro já está 'emprestado' para alguém que NÃO seja o usuário atual
    $sql_disponibilidade = "SELECT * FROM emprestimo 
                            WHERE cadastro_obra_id_obra = '$livro' 
                            AND status_emprestimo = 'emprestado' 
                            AND usuario_id != '$user'";
    
    $res_disponibilidade = mysqli_query($conn, $sql_disponibilidade);

    if (mysqli_num_rows($res_disponibilidade) > 0) {
        // Se encontrou um registro, o livro está ocupado
        echo "<script>alert('Atenção: Este livro já está emprestado para outra pessoa e não pode ser retirado agora! ❌');</script>";
    } else {
        // Se o livro estiver livre (ou já estiver com o próprio usuário tentando renovar), prossegue:

        // --- VERIFICAÇÃO SE O USUÁRIO JÁ TEVE ESSE LIVRO (Lógica de Update ou Insert) ---
        $sql_check = "SELECT id_emprestimo FROM emprestimo 
                      WHERE  cadastro_obra_id_obra = '$livro'";
                      
        
        $res_check = mysqli_query($conn, $sql_check);

        if (mysqli_num_rows($res_check) > 0) {
            // Se o registro já existe para esse par usuário/livro, apenas ATUALIZA
            $sql_final = "UPDATE emprestimo SET 
                          data_pegada = '$data_emprestimo',
                          data_validade = '$data_validade',
                          status_emprestimo = '$status'
                          WHERE usuario_id = '$user' 
                          AND cadastro_obra_id_obra = '$livro'";
            $mensagem = "Empréstimo atualizado 🎈";
        } else {
            // Se é a primeira vez desse usuário com esse livro, CRIA um novo registro
            $sql_final = "INSERT INTO emprestimo (data_pegada, data_validade, status_emprestimo, usuario_id, cadastro_obra_id_obra)
                          VALUES ('$data_emprestimo', '$data_validade', '$status', '$user', '$livro')";
            $mensagem = "Novo empréstimo cadastrado 🎈";
        }

        // Executa a query final (Update ou Insert)
        if (mysqli_query($conn, $sql_final)) {
            echo "<script>alert('$mensagem');</script>";
        } else {
            echo "Erro na operação: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Empréstimo de Livro</title>
</head>
<body>
    <form method="post">
        <fieldset>
            <legend>Emprestar Livros</legend>
            
            <label>Selecione usuario</label><br>
            <select name="user" id="user" required>
                <option value="">Escolher usuário</option>
                <?php while ($rowU = mysqli_fetch_assoc($queryU)): ?>
                    <option value="<?= $rowU['id_usuario'] ?>">
                        <?= $rowU['nome_usuario'] ?>
                    </option>
                <?php endwhile; ?>
            </select>
            <br><br>

            <label>Selecione o livro</label><br>
            <select name="livro" id="livro" required>
                <option value="">Escolher livro</option>
                <?php while ($rowO = mysqli_fetch_assoc($queryO)): ?>
                    <option value="<?= $rowO['id_obra'] ?>">
                        <?= $rowO['nome_obra'] ?>
                    </option>
                <?php endwhile; ?>
            </select>
            <br><br>

            <label name="data">data de empréstimo do livro</label><br>
            <input type="date" name="data">        
            
            <br><br>

            <button type="submit">Confirmar Empréstimo</button>
        </fieldset>
    </form>

    <button onclick="window.location.href='index.php'">voltar</button>
</body>
</html>