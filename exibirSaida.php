<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>teste</title>
</head>
<body>
    
<style>
.container{
    display:flex;
    flex-direction: row;
    justify-content: space-between ;
}

.container2{
    display:flex;
    justify-content: center;
    
}

.botao{
    text-align: center;
    padding: 50px 25px;
    background-color: pink;
}





</style>


<form method="POST">

    <section class="container">
    <div class="nome">
<fieldset style= "width: 500px; text-align: center;">

<legend>Procurar nome</legend>
<br>
<input type="text" name="nome">
<br><br>

</fieldset>

</div>


    <div class="hora">
<fieldset style= "width: 500px; text-align: center;">

<legend>carga horária</legend>
<br>
<input type="text" name="hora">
<br><br>


</fieldset>

</div>


    <div class="total">
<fieldset style= "width: 500px; text-align: center;">

<legend>salário total</legend>
<br>
<input type="text" name="total">
<br><br>



</fieldset>




</div>

</section>
<br><br>
<div class="container2">

<input type= "submit" value=" Google buscar" style= "width: 150px" class="botao">

</div>

</form>




<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $nome = $_POST["nome"];
    $hora = $_POST["hora"];
    $total = $_POST["total"];

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
            if ($nome == $linha_dados[0] || $nome == null || $hora == $linha_dados[5] || $hora == null || $total == $linha_dados[7]|| $total == null ){
            for($i = 0; $i < $max_campos; $i++){
                $valor = isset($linha_dados[$i]) ? htmlspecialchars($linha_dados[$i]) : '';
                if($i == 6){
                    echo "<td><img src='arquivo/$valor' alt='$valor style = 'width: 100px'></td>";
            }else{
            echo "<td>$valor</td>";
        }
            
            }
            echo "</td>";
            
        
    }
}
        

        echo "</table>";


    } else {
        echo "Arquivo não encontrado";
    }
    $valor = "arquivo/formulario.txt";


    
}

?> 




</body>
</html>