<!DOCTYPE html>
<html lang="p-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>exemplo upload</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">

    <label>Selecione o arquivo:</label>
    <input type="file" name="arquivo">
    <br><br>
    <input type="submit" value="Enviar">

    </form>

<?php

   if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $pasta_destino = "arquivo/";
    $arquivo = $_FILES["arquivo"];


        if($arquivo["error"] === UPLOAD_ERR_OK) {
            $nome_temp = $arquivo["tmp_name"];
            $nome_final = $pasta_destino . basename($arquivo["name"]);

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
   }
 ?>  


</body>
</html>