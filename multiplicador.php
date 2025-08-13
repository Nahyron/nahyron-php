<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabuada em php</title>
</head>
<body>
    



<h1>você quer tabuada de qual número?</h1>

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {








$numero = $_POST["numero"];
echo "<h3>Tabuada do $numero:</h3>";
echo "<br> <br>";
echo "<ul>";
for ($i = 1; $i <=10; $i ++ ) {
    $resultado = $numero * $i;
    echo "<li> $numero x $i = $resultado </li>";
}

}
 


echo "</ul>"

 ?>





</form>
</body>
</html>