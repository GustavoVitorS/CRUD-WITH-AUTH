<?php
// Conexão com o banco de dados
$conn = new mysqli("seu servirdor", "seu nome de usuario", "sua senha", "seu banco de dados");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário
    $newUsername = $_POST["new_username"];
    $newPassword = $_POST["new_password"];

    // Insere os dados na tabela de usuários
    $insertSql = "INSERT INTO usuarios (username, password) VALUES ('$newUsername', '$newPassword')";

    if ($conn->query($insertSql) === TRUE) {
        // Sucesso
        echo "<script>
                alert('Novo usuário cadastrado com sucesso');
                window.location.href = '../index.php'; // Redirecionar para a página principal ou outra página após o alerta
              </script>";
    } else {
        // Erro
        echo "<script>
                alert('Erro ao cadastrar novo usuário: " . $conn->error . "');
                window.location.href = '../index.php'; // Redirecionar para a página principal ou outra página após o alerta
              </script>";
    }
}
?>
