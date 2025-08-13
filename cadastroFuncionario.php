<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadtastro de funcionario</title>
</head>
<body>

<!-- Os comentários dizem oq os comandos que estão em baixo deles fazem -->


<!-- Aqui criei um form ja que vou fazer um formulário de perguntas, junto com um fieldset para deixar como um formulário -->
<form method="POST">

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



</fieldset>



<input type="submit" name="enviar">
<input type="reset" name="limpar">

</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){

$nome = $_POST["nome"];
$idade = $_POST["idade"];
$cep = $_POST ["cep"];
$genero = $_POST["genero"];
$dinheiro = $_POST["dinheiro"];
$horas = $_POST["horas"];


 $linha = "$nome | $idade | $cep | $genero | $dinheiro | $horas \n";

  file_put_contents("arquivo/formulario.txt", $linha, FILE_APPEND);


}






?>


</body>
</html>