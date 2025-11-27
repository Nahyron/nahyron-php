<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações de consulta</title>



    <style>
          fieldset {
            position: absolute;
            top: 25%;
            left: 40%;
            background-color: wheat;
        }

        button {
            padding: 10px;
            width: 260px;
            background-color: white;
            bottom: 10%;
            position: absolute;
            padding: 20px;
        }

        .prontuConsu {

            padding: 10px;
            width: 260px;
            background-color: white;
            bottom: 3%;
            position: absolute;
            padding: 20px;
        }

        body {
            background-color: lightblue;
        }

        h1 {
            text-align: center;
        }
    </style>

</head>
<body>
     <form method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>informações de consulta</legend><br>
        <label name="nome">Nome do Dono:</label><br>
        <input type="text" name="nome"><br><br>
        <label name="nomeC">Nome do cachorro:</label><br>
        <input type="text" name="nomeC"><br><br>
        <label name="nomeM">Nome do médico:</label><br>
        <input type="text" name="nomeM"><br><br>
        <label name="descD">descrição do dono sobre o animal:</label><br>
        <input type="text" name="descD"><br><br>
        <label name="dataC">Data de consulta:</label><br>
        <input type="date" name="dataC"><br><br>
        <label name="idA">id animal:</label><br>
        <input type="number" name="idA"><br><br>
        <label name="idV">id veterinario:</label><br>
        <input type="number" name="idV"><br><br>
        <label name="idD">id dono:</label><br>
        <input type="number" name="idD"><br><br>
        <label name="foto">foto animal:</label><br>
        <input type="file" name="foto"><br><br>
        <input type="submit">
        </fieldset>
        </form>

        <button onclick="window.location.href='index.html'">Voltar para menu</button>

</body>
</html>



<?php


if ($_SERVER["REQUEST_METHOD"] == "POST" ){

    $nome = $_POST["nome"];
    $nomeC = $_POST["nomeC"];
    $nomeM = $_POST ["nomeM"];
    $descD  = $_POST["descD"];
    $dataC  = $_POST["dataC"];
    $arquivo = $_FILES["foto"];
    $idA = $_POST["idA"];
    $idV = $_POST["idV"];
    $idD = $_POST["idD"];
    
$servername = "localhost";
$database = "pet1";
$username = "root";
$password = "";
// Cria conexão
$conn = mysqli_connect($servername, $username, $password, $database);

// Verificar conexão;
if (!$conn){
    die("Falha na conexão: " . mysqli_connect_error());
}

echo "Conectado com succes";





if($arquivo["error"] === UPLOAD_ERR_OK) {
            $nome_temp = $arquivo["tmp_name"];
            $nome_final = "_images/" . basename($arquivo["name"]);
            
            if(!file_exists("_images/")) {
                mkdir("_images/", 0755, true); //Cria pasta se não existir
            }
            
            if(move_uploaded_file($nome_temp, $nome_final)){
                $sql = "INSERT INTO consulta (
                    nome_dono, 
                    nome_animal, 
                    nome_medico, 
                    desc_animal,
                    data_consulta,
                    foto_animal,
                    animal_id_animal,
                    veterinario_id_veterinario,
                    dono_id_dono

                ) VALUES (
                   '$nome',
                   '$nomeC',
                   '$nomeM',
                   '$descD',
                   '$dataC',
                   '$nome_final',
                   '$idA',
                   '$idV',
                   '$idD'

                );";

            if(mysqli_query($conn, $sql)){
                echo "<br>Comando executado com sucesso<br>";
            } else{
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
                echo "Arquivo enviado com sucesso";
            }else {
                echo "Falha ao mover arquivo";
            }
}
mysqli_close($conn);
}





?>

