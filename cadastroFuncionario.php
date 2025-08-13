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
<form method="POST">

<!-- aqui criei uma área para o formulário, e as informações -->

<fieldset>

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

<fieldset>
    
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
$arquivo = $_POST["arquivo"];


// aqui criei uma variavel, com as variaveis que puxei do html para o php, que é os campos que serão mostrados no arquivo (.txt)

 $linha = "$nome | $idade | $cep | $genero | $dinheiro | $horas | $arquivo \n";

// aqui eu puxo o arquivo que criei e conecto com o php,assim puxando a variavel ($linha) e as variaveis que estão dentro delas para o arquivo (.txt) 

  file_put_contents("arquivo/formulario.txt", $linha, FILE_APPEND);


}




// aqui encerra o php

?>


</body>
</html>