<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulário</title>
</head>
<body>
    <form method="post">

    <fieldset>
        
     <legend>Informações pessoais</legend>

    <label for="nome">Digite seu nome:</label>
    <input type="text" name="nome" id="nome" placeholder="seu nome">
    <br><br>
    <label for="idade">Coloque sua idade:</label>
    <input type="number" name="idade" placeholder="sua idade">
    <br><br>
    <label for="telefone">Coloque seu telefone:</label>
    <input type="number" name="telefone" placeholder="número de telefone">
    <br><br>
    <label for="cpf">Coloque seu cpf:</label>
    <input type="number" name="cpf" placeholder="seu cpf">
    <br><br>
    <label for="dataN">Coloque sua data de nascimento</label>
    <input type="date" name="dataN" placeholder="sua data de nascimento">
    <br><br>
    <label for="genero">Coloque seu gênero:</label>
    <input type="text" name="rua" placeholder="Sua rua">
    <br><br>
    <label for="rua">Coloque sua Rua e o número:</label>
    <input type="text" name="rua" placeholder="Sua rua e número">
    <br><br>
    <label for="cep">Coloque seu cep</label>
    <input type="number" name="cep" placeholder="Seu cep">
    <br><br>
    <label for="onde">Coloque a onde você estuda, cursa ou onde trabalha</label>
    <input type="text" name="onde" placeholder="Faz o que?">
    <br><br>
    <label for="area">Há quanto tempo você está na sua área (escola, trabalho etc.)</label>
    <input type="text" name="area" placeholder="quanto tempo?">
    <br>

    <input type="submit" value="Confirmar">
    
    </fieldset>

    </form>





    <?php


    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        
        $nome = $_POST["nome"];
        $idade = $_POST["idade"];
        $telefone = $_POST["telefone"];
        $cpf = $_POST["cpf"];
        $dataN = $_POST["dataN"];
        $genero = $_POST["genero"];
        $rua = $_POST["rua"];
        $cep = $_POST["cep"];
        $onde = $_POST["onde"];
        $area = $_POST["area"];


        $datacerta = date("d/m/Y", strtotime($dataN));


        echo "Nome fornecido: $nome <br>";
        echo "idade fornecida: $idade <br>";
        echo "telefone fornecido: $telefone <br>";
        echo "cpf fornecido: $cpf <br>";
        echo "data de nascimento fornecida: $datacerta <br>";
       
        
        
        if ($genero == "masculino" ||  $genero == "Masculino" ||  $genero == "feminino" ||   $genero == "Feminino"){
            echo "gênero fornecido: $genero";
        } else {
            echo "Coloque um gênero válido";
        }

        echo "Nome da rua fornecido: $rua";
        echo "CEP fornecido $cep";
        echo "informações de o que você faz e onde você faz fornecidos: $onde";
        echo "informações sobre o tempo em que você atua na sua area fornecido: $area";


        //Monta linha de registro
        $linha = "$nome | $idade | $telefone | $cpf | $dataN | $genero | $rua | $cep | $onde | $area \n";

        //Grava no arquivo
        file_put_contents("arquivo/registros.txt", $linha, FILE_APPEND);





         $arquivo = 'arquivo/registros.txt';

    if (file_exists($arquivo)) {
        $linhas = file($arquivo);
        $dados_linhas = [];
        $max_campos = 0;

        //processa todas as linhas
        foreach ($linhas as $linha) {
            $dados = explode('|', trim($linha));
            $dados_linhas[] = $dados;
            if (count($dados) > $max_campos) {
                $max_campos = count($dados);
            }
        }


        //gera tabela única
        echo "<table border='1' cellpadding='8' cellspacing='0' >";

        //cabeçalho genérico
        echo "<tr>";
        for ($i = 1; $i <= $max_campos; $i++) {
            echo "<th>Campo $i</th>";
        }
        echo "</tr>";
        
        //linha de dados
        foreach ($dados_linhas as $linha_dados){
            echo "<tr>";
            for($i = 0; $i < $max_campos; $i++){
                $valor = isset($linha_dados[$i]) ? htmlspecialchars ($linha_dados[$i]) : '';
                echo "<td>$valor</td>";
            }
            echo "</td>";
        }

        echo "</table>";


    } else {
        echo "Arquivo não encontrado";
    }







    }






    ?>  
</body>
</html>