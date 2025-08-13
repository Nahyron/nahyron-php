<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mostrar variáveis</title>
</head>
<body>
    <?php

    //Integer
    $idade = 30;

    //Float
    $altura = 1.75;

    //String
    $nome = "João";

    //boolean
    $aprovado = true;

    //Array
    $frutas = ["maçã", "banana", "laranja"];

    //NULL
    $semvalor = null;


    echo "aqui está variavel 'idade' que é uma integer, que está com valor de ($idade)<br><br>";
    var_dump($idade);

    echo "<br><br>aqui está variavel 'altura' que é um float, que está com valor de ($altura)<br><br>";
    var_dump($altura);

    echo "<br><br> aqui está variavel 'nome' que é uma string, que está com valor de ($nome)<br><br>";
    var_dump($nome);

    echo "<br><br> aqui está variavel 'aprovado' que é um boolean, que está com valor de ($aprovado)<br><br>";
    var_dump($aprovado);
    
    echo "<br><br> aqui está variavel 'frutas' que é um array, que está com valor de (maçã, banana e laranja) <br><br>";
    var_dump($frutas);

    echo "<br><br> aqui está variavel 'sem valor' que é um NULL, que está com valor de ($semvalor)<br><br>";
    var_dump($semvalor);

    echo "<br><br>Hoje  é: " . date("d/m/Y") . "<br>";
    date_default_timezone_set('America/Sao_Paulo');
    echo "Hora atual " . date("H:i:s") . "<br>";
    
    $amanha = new DateTime();
    $amanha->modify("+1 day");
    echo "Amanhã será: " . $amanha->format("d/m/Y") . "<br>";

    $timestamp = strtotime("last Friday");
    echo "Úlima sexta-feira foi " . date("d/m/Y", $timestamp) . "<br><br>";
        
    
    
    
    print_r($frutas);
    ?>
</body>
</html>