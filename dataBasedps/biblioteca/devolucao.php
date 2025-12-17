<?php
require_once 'conexao.php';

// Busca para preencher os selects
$sqlB = "SELECT * FROM cadastro_obra";
$queryB = mysqli_query($conn, $sqlB);

$sqlU = "SELECT * FROM usuario";
$queryU = mysqli_query($conn, $sqlU);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_livro = $_POST["id_livro"];
    $id_user = $_POST["id_user"];
    $status_devolvido = "não emprestado";

    // 1. VERIFICAÇÃO: Existe um empréstimo ativo?
    $sqlVerificar = "SELECT * FROM emprestimo 
                     WHERE usuario_id = '$id_user' 
                     AND cadastro_obra_id_obra = '$id_livro' 
                     AND status_emprestimo != 'não emprestado' 
                     LIMIT 1";
    
    $resultadoVerificacao = mysqli_query($conn, $sqlVerificar);

    if (mysqli_num_rows($resultadoVerificacao) > 0) {
        
        // 2. UPDATE: Muda o status e limpa as datas (seta como NULL)
        $sqlUp = "UPDATE emprestimo 
                  SET status_emprestimo = '$status_devolvido',
                      data_pegada = NULL, 
                      data_validade = NULL
                  WHERE usuario_id = '$id_user' 
                  AND cadastro_obra_id_obra = '$id_livro' 
                  AND status_emprestimo != 'não emprestado' 
                  LIMIT 1";

        if (mysqli_query($conn, $sqlUp)) {
            echo "<script>alert('ja vai devolver?? devolvido com sucesso 🎈');</script>";
        } else {
            echo "Erro ao atualizar: " . mysqli_error($conn);
        }

    } else {
        echo "<script>alert('Atenção: Nenhum empréstimo ativo encontrado para limpar.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Devolver Livro</title>
</head>
<body>
    <form method="POST">
        <fieldset>
            <legend>Painel de Devolução</legend>

            <label>Livro:</label><br>
            <select name="id_livro" required>
                <option value="">Selecione o livro</option>
                <?php while ($rowB = mysqli_fetch_assoc($queryB)): ?>
                    <option value="<?= $rowB['id_obra'] ?>"><?= $rowB['nome_obra'] ?></option>
                <?php endwhile; ?>
            </select>
            <br><br>
            
            <label>Usuário:</label><br>
            <select name="id_user" required>
                <option value="">Selecione o usuário</option>
                <?php while ($rowU = mysqli_fetch_assoc($queryU)): ?>
                    <option value="<?= $rowU['id_usuario'] ?>"><?= $rowU['nome_usuario'] ?></option>
                <?php endwhile; ?>
            </select>
            <br><br>

            <button type="submit">Confirmar Devolução</button>
        </fieldset>
    </form>

    <button onclick="window.location.href='index.php'">voltar</button>
</body>
</html>