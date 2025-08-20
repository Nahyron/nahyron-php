<form method="POST">
<fieldset style= "width: 500px; text-align: center;">

<legend>Procurar nome</legend>
<br>
<input type="text" name="nome">
<br><br>

<input type= "submit" value=" Google buscar" style= "width: 150px">



</fieldset>


</form>




<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $nome = $_POST["nome"];

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
            if ($nome == $linha_dados[0] || $nome == null){
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

    if ($nome == null){
        echo "$valor";
    }

    
}

?> 