<?php
if (isset($_GET["id"])) {
    $registro_id = $_GET["id"];

    // Conexão com o banco de dados
    $conn = new mysqli("seu servirdor", "seu nome de usuario", "sua senha", "seu banco de dados");

    // Consulta SQL para excluir o registro com o ID especificado
    $sql = "DELETE FROM registros WHERE id = $registro_id";
    if ($conn->query($sql) === TRUE) {
        header("Location: table.php"); // Redirecionar para a página da tabela
    } else {
        echo "Erro ao excluir o registro: " . $conn->error;
    }
} else {
    echo "ID do registro não especificado.";
}
?>
