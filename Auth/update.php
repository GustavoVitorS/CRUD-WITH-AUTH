<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$conn = new mysqli("seu servirdor", "seu nome de usuario", "sua senha", "seu banco de dados");

  if ($conn->connect_error) {
      die("Erro na conexão: " . $conn->connect_error);
  }

  $id = $_POST["id"];
  $nome = $_POST["nome"];
  $idade = $_POST["idade"];
  $endereco = $_POST["endereco"];
  $telefone = $_POST["telefone"];

  $sql = "UPDATE registros SET nome = '$nome', idade = '$idade', endereco = '$endereco', telefone = '$telefone' WHERE id = $id";
  
  if ($conn->query($sql) === TRUE) {
      echo "success";
  } else {
      echo "error";
  }

  $conn->close();
}
?>
