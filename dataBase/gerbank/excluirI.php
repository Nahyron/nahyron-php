<?php
$servername = "localhost";
$database = "gerbank";
$username = "root";
$password = "";
// Cria conexão
$conn = mysqli_connect($servername, $username, $password, $database);

// Verificar conexão;
if (!$conn){
    die("Falha na conexão: " . mysql_connect_error());
}

echo "Conectado com succes";


if(isset($_GET["id"])){
$id = $_GET["id"];
$sql = "DELETE FROM instituicao WHERE id = $id";
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Ez game, linha deletada');</script><script>window.location.href='instConsu.php'</script>";
} else {
    echo "Deu erro patrão: " . mysql_error($conn);
}
}


?>