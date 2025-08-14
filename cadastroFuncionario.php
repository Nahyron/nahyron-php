<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadtastro de funcionario</title>
</head>
<body>

<!-- Os comentários dizem oq os comandos que estão em baixo deles fazem -->



<h1>Cadastro de funcionários</h1>


<!-- Aqui criei um form ja que vou fazer um formulário de perguntas, junto com um fieldset para deixar como um formulário -->
<form method="POST" enctype="multipart/form-data">

<!-- aqui criei uma área para o formulário, e as informações -->

<fieldset style = "width: 500px">

<!-- aqui serve para nomear o formulário -->

<legend>Cadastro de funcionáro</legend>

<!-- Aqui serve para eu solicitar qual informação a pessoa deve colocar -->

<label name="nome">Coloque seu nome completo</label>

<!-- aqui serve para criar um campo para a pessoa colocar a informação que foi solicitado na linha a cima -->

<input type="text" name="nome" placeholder="Seu nome aqui" required>
<br><br>

<!-- Aqui serve para eu solicitar qual informação a pessoa deve colocar -->

<label name="idade">Coloque sua idade</label>

<!-- aqui serve para criar um campo para a pessoa colocar a informação que foi solicitado na linha a cima -->

<input type="number" name="idade" placeholder="Sua idade aqui" required>
<br><br>

<!-- Aqui serve para eu solicitar qual informação a pessoa deve colocar -->

<label name="cep">Coloque seu CEP</label>

<!-- aqui serve para criar um campo para a pessoa colocar a informação que foi solicitado na linha a cima -->

<input type="number" name="cep" placeholder="Seu cep aqui" required>
<br><br>

<!-- aqui serve para eu mostrar e solicitar para a pessoa colocar o genero dela -->

<label name="genero">Coloque seu gênero:</label>

<!-- aqui serve para criar um campo para a pessoa selecionar (clicar) a informação que foi solicitado na linha a cima (label mostra, input é a ação que a pessoa vai fazer (clicar)) -->

<label for="option1">Masculino</label>
<input type="radio" name="genero" value="Masculino" required>
<label for="option2">Feminino</label>
<input type="radio" name="genero" value="Feminino" required>
<br><br>

<!-- Aqui serve para eu solicitar qual informação a pessoa deve colocar -->

<label name="dinheiro">Quantos reais você recebe por hora?</label>

<!-- aqui serve para criar um campo para a pessoa colocar a informação que foi solicitado na linha a cima -->

<input type="number" name="dinheiro" placeholder="Quantos??" required>
<br><br>

<!-- Aqui serve para eu solicitar qual informação a pessoa deve colocar -->

<label name="horas">Quantas horas você trabalha no mês?</label>

<!-- aqui serve para criar um campo para a pessoa colocar a informação que foi solicitado na linha a cima -->

<input type="number" name="horas" placeholder="Quantas??" required>
<br><br>

<!-- aqui criei uma área para o envio do currículo -->

<fieldset style = "width: 100px">
    
    <!-- o nome da área -->

    <legend>Currículo</legend>

    <!-- o que será solicitado -->
    
    <label name="arquivo">Mande seu currículo</label>
    <br><br>

    <!-- Comando para a pessoa poder enviar um arquivo -->

    <input type="file" name="arquivo">


    <!-- aqui encerra a area do currículo -->

</fieldset>

    <!-- aqui se encerra a area do cadastro -->

</fieldset>

<!-- Criei um botão para enviar -->

<input type="submit" name="enviar">

<!-- e aqui um botão pra limpar os campos de digitação -->

<input type="reset" name="limpar">


<!-- aqui se encerra o formulário (front) -->


</form>



<!-- aqui começa o php -->

<?php


// aqui serve para puxar o html para o php, verificando se quando a pessoa clicar no botão, o php será executado

if ($_SERVER["REQUEST_METHOD"] == "POST"){


    // as variaves do php puxando os inputs do html para guardar no php

$nome = $_POST["nome"];
$idade = $_POST["idade"];
$cep = $_POST ["cep"];
$genero = $_POST["genero"];
$dinheiro = $_POST["dinheiro"];
$horas = $_POST["horas"];
$arquivo = $_FILES["arquivo"];
$pasta_destino = "arquivo/";
$archive = "";
$receber = $horas * $dinheiro;



// aqui criei uma variavel, com as variaveis que puxei do html para o php, que é os campos que serão mostrados no arquivo (.txt)

// aqui eu puxo o arquivo que criei e conecto com o php,assim puxando a variavel ($linha) e as variaveis que estão dentro delas para o arquivo (.txt) 




if($arquivo["error"] === UPLOAD_ERR_OK) {
    $nome_temp = $arquivo["tmp_name"];
    $nome_final = $pasta_destino . basename($arquivo["name"]);
    $archive = basename($arquivo["name"]);
    
    if(!file_exists($pasta_destino)) {
        mkdir($pasta_destino, 0755, true); //Cria pasta se não existir
    }
    
    if(move_uploaded_file($nome_temp, $nome_final)){
        echo "Arquivo enviado com sucesso";
    }else {
        echo "Falha ao mover arquivo";
    }
}else{
    echo "Erro no upload: " . $arquivo["error"];
}


$linha = "$nome | $idade | $cep | $genero | $dinheiro | $horas |$archive\n";
file_put_contents("arquivo/formulario.txt", $linha, FILE_APPEND);

        $arquivo = 'arquivo/formulario.txt';

    if (file_exists($arquivo)) {
        $linhas = file($arquivo);
        $dados_linhas = [];
        $max_campos = 0;
      

    
        foreach ($linhas as $linha) {
            $dados = explode('|', trim($linha));
            $dados_linhas[] = $dados;
            if (count($dados) > $max_campos) {
                $max_campos = count($dados);
            }
        }


      
        echo "<table border='1' cellpadding='8' cellspacing='0' >";

      
        echo "<tr>";
        for ($i = 1; $i <= $max_campos; $i++) {
            echo "<th>Campo $i</th>";
        }
        echo "</tr>";
        
  
        foreach ($dados_linhas as $linha_dados){
            echo "<tr>";
             
            for($i = 0; $i < $max_campos; $i++){
               
                $valor = isset($linha_dados[$i]) ? htmlspecialchars($linha_dados[$i]) : '';
                if($i == 6){
                    echo "<td><img src='arquivo/$valor' alt='$valor'></td>";
                    echo "<td>Você receberá $receber </td>";
                }else{

                    echo "<td>$valor</td>";
                    
        }
            
            }
            echo "</td>";
        }

        echo "</table>";


    } else {
        echo "Arquivo não encontrado";
    }

}




// aqui encerra o php

?>


</body>
</html>