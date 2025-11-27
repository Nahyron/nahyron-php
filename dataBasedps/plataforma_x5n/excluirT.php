<?php
$servername = "localhost";
$database = "plataformax";
$username = "root";
$password = "";
$port = 3309;
// Cria conexão
$conn = mysqli_connect($servername, $username, $password, $database, $port);

// Verificar conexão;
if (!$conn){
    die("Falha na conexão: " . mysqli_connect_error());
}

echo "Conectado com succes";


if(isset($_GET["id"])){
$id = $_GET["id"];
$sql = "DELETE FROM usuario WHERE id_user = $id";
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Ez game, linha deletada');</script><script>window.location.href='index.php'</script>";
} else {
    echo "Deu erro patrão: " . mysqli_error($conn);
}
}


?>