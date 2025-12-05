<?php
require_once 'conexao.php';

// --- CONSULTA 1: Busca os tipos de pessoa ---
$sql_tipo = "SELECT * FROM tab_tipo_pessoa";
$query_tipo = mysqli_query($conn, $sql_tipo);

// --- CONSULTA 2: Busca APENAS CPFs (Pessoa Física) ---
// Filtramos onde o CPF não é vazio
$sql_cpf = "SELECT id_pessoa_documento, pessoa_documento_cpf 
            FROM pessoa_documento 
            WHERE pessoa_documento_cpf IS NOT NULL AND pessoa_documento_cpf != ''";
$query_cpf = mysqli_query($conn, $sql_cpf);

// --- CONSULTA 3: Busca APENAS CNPJs (Pessoa Jurídica) ---
// Filtramos onde o CNPJ não é vazio
$sql_cnpj = "SELECT id_pessoa_documento, pessoa_documento_cnpj 
             FROM pessoa_documento 
             WHERE pessoa_documento_cnpj IS NOT NULL AND pessoa_documento_cnpj != ''";
$query_cnpj = mysqli_query($conn, $sql_cnpj);

// --- CONSULTA 4: Situações (mantida do seu código anterior) ---
$sql_situ = "SELECT * FROM pessoa_situacao";
$query_situ = mysqli_query($conn, $sql_situ);


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // --- LÓGICA DE RECEBIMENTO INTELIGENTE ---
    // O PHP precisa saber qual dos dois selects ele deve pegar.
    // Se o select de CPF estiver visível, pegamos ele. Se for o de CNPJ, pegamos o outro.
    
    // Supondo que o ID 1 seja Física e 2 seja Jurídica (CONFIRA SEUS IDs NO BANCO)
    $tipo_escolhido = $_POST['tipo'];
    
    $documento_id = null; // Variável que vai guardar o ID final

    if (isset($_POST['doc_fisica']) && !empty($_POST['doc_fisica'])) {
        $documento_id = $_POST['doc_fisica'];
    } elseif (isset($_POST['doc_juridica']) && !empty($_POST['doc_juridica'])) {
        $documento_id = $_POST['doc_juridica'];
    }

    // Resto das variáveis
    $nome     = mysqli_real_escape_string($conn, $_POST['nome']);
    $tipo     = mysqli_real_escape_string($conn, $tipo_escolhido);
    $documento = mysqli_real_escape_string($conn, $documento_id); // Usamos o ID decidido acima
    $situacao = mysqli_real_escape_string($conn, $_POST['situacao']);
    $telefone = mysqli_real_escape_string($conn, $_POST['tel']);
    $celular  = mysqli_real_escape_string($conn, $_POST['cell']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $data     = mysqli_real_escape_string($conn, $_POST['data']);

    $sql = "INSERT INTO tab_pessoas(
        pessoa_nome,
        tab_tipo_pessoa_tipo_pessoa_id,
        pessoa_documento_id_pessoa_documento,
        pessoa_situacao_pessoa_situacao_id,
        pessoa_telefone,
        pessoa_celular,
        pessoa_email,
        pessoa_data_cadastro
    ) VALUES (
        '$nome',
        '$tipo',
        '$documento',
        '$situacao',
        '$telefone',
        '$celular',
        '$email',
        '$data'
    )";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Pessoa cadastrada com sucesso!'); window.location.href = window.location.href;</script>";
    } else {
        echo "Erro ao cadastrar: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Dinâmico</title>
    <style>
        /* (Seu CSS anterior mantido e resumido) */
        body { font-family: 'Segoe UI', sans-serif; background-color: #f0f2f5; display: flex; flex-direction: column; align-items: center; padding: 20px; }
        form { background-color: #ffffff; max-width: 500px; padding: 30px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); width: 100%; }
        label { font-weight: 600; color: #555; margin-top: 15px; display: block; }
        input, select { width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 6px; margin-top: 5px; }
        input[type="submit"] { background-color: #28a745; color: white; border: none; padding: 15px; margin-top: 25px; cursor: pointer; font-weight: bold; border-radius: 6px; }
        .btn-voltar { text-decoration: none; color: #555; margin-bottom: 20px; display: inline-block; }
        
        /* CLASSE PARA ESCONDER OS CAMPOS */
        .oculto {
            display: none;
        }
    </style>
</head>

<body>
    
    <a href="index.php" class="btn-voltar">⬅ Voltar ao Menu</a>

    <form method="POST">
        <fieldset style="border:none;">
            <legend style="text-align:center; font-weight:bold; font-size:1.5em; margin-bottom:20px;">Cadastro de Pessoa</legend>

            <label>Nome:</label>
            <input type="text" name="nome" placeholder="Nome completo" required>

            <label>Tipo de Pessoa:</label>
            <select name="tipo" id="selectTipo" required onchange="mudarDocumento()">
                <option value="">Selecione...</option>
                <?php while ($row = mysqli_fetch_assoc($query_tipo)): ?>
                    <option value="<?= $row['tipo_pessoa_id'] ?>" data-desc="<?= strtolower($row['tipo_pessoa_descricao']) ?>">
                        <?= $row['tipo_pessoa_descricao'] ?>
                    </option>
                <?php endwhile; ?>
            </select>

            <div id="divFisica" class="oculto">
                <label>Selecione o CPF:</label>
                <select name="doc_fisica" id="inputFisica">
                    <option value="">-- Escolha um CPF --</option>
                    <?php while ($row = mysqli_fetch_assoc($query_cpf)): ?>
                        <option value="<?= $row['id_pessoa_documento'] ?>">
                            <?= $row['pessoa_documento_cpf'] ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div id="divJuridica" class="oculto">
                <label>Selecione o CNPJ:</label>
                <select name="doc_juridica" id="inputJuridica">
                    <option value="">-- Escolha um CNPJ --</option>
                    <?php while ($row = mysqli_fetch_assoc($query_cnpj)): ?>
                        <option value="<?= $row['id_pessoa_documento'] ?>">
                            <?= $row['pessoa_documento_cnpj'] ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <label>Situação:</label>
            <select name="situacao">
                <?php while ($row = mysqli_fetch_assoc($query_situ)): ?>
                    <option value="<?= $row['pessoa_situacao_id'] ?>">
                        <?= $row['pessoa_situacao_obs'] ?>
                    </option>
                <?php endwhile; ?>
            </select>

            <label>Telefone:</label>
            <input type="tel" name="tel">
            
            <label>Celular:</label>
            <input type="tel" name="cell">
            
            <label>Email:</label>
            <input type="email" name="email">
            
            <label>Data Cadastro:</label>
            <input type="date" name="data">

            <input type="submit" value="Cadastrar">

        </fieldset>
    </form>

    <script>
        function mudarDocumento() {
            var selectTipo = document.getElementById('selectTipo');
            var divFisica = document.getElementById('divFisica');
            var divJuridica = document.getElementById('divJuridica');
            var inputFisica = document.getElementById('inputFisica');
            var inputJuridica = document.getElementById('inputJuridica');

            // Pega o texto da opção selecionada (Ex: "Pessoa Física" ou "Pessoa Jurídica")
            var textoSelecionado = selectTipo.options[selectTipo.selectedIndex].text.toLowerCase();

            // Esconde ambos primeiro
            divFisica.classList.add('oculto');
            divJuridica.classList.add('oculto');
            
            // Limpa a obrigatoriedade dos campos para não dar erro ao enviar
            inputFisica.required = false;
            inputJuridica.required = false;

            // Verifica se o texto contém "física" ou "jurídica"
            if (textoSelecionado.includes('física') || textoSelecionado.includes('fisica')) {
                divFisica.classList.remove('oculto');
                inputFisica.required = true; // Torna obrigatório escolher um CPF
            } 
            else if (textoSelecionado.includes('jurídica') || textoSelecionado.includes('juridica')) {
                divJuridica.classList.remove('oculto');
                inputJuridica.required = true; // Torna obrigatório escolher um CNPJ
            }
        }
    </script>
</body>

</html>