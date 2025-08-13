<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calculadora</title>
</head>
<body>


<form method = "post">
    Digite um número: <input type="number" name="numero" placeholder= "coloque o 1° número">
    <br>
    <br>
    Digite a operação (+; -; *; /): <input type="text" name="operação" placeholder= "coloque a operação">
    <br>
    <br>
    Digite um número: <input type="number" name="numero2" placeholder= "coloque o 2° número">
    <br>
    
    <input type="submit" value="Gerar resultado">

    <br>
    <br>

    <?php
    if{
     ($_SERVER["REQUEST_METHOD"] == "POST") {





    $numero = $_POST ["numero"];
    $numero2 = $_POST ["numero2"];
    $op = $_POST ["operação"];

if ($op == "*"){
    $results =  $numero * $numero2;
    echo "o resultado será $results";
} 
elseif ($op == "+"){
    $results =  $numero + $numero2;
    echo "o resultado será $results";
} 
elseif ($op == "-"){
    $results =  $numero - $numero2;
    echo "o resultado será $results";
} 
elseif ($op == "/")
    if ($numero && $numero2 != 0){

    
    $results =  $numero / $numero2;
    echo "o resultado será $results";
    }else {
        echo "0 não é válido nesta operação";
    } else {
        echo "coloque apenas números";
    }
    }  
    }

    ?>
</body>
</html>