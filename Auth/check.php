<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexão com o banco de dados
    $conn = new mysqli("seu servirdor", "seu nome de usuario", "sua senha", "seu banco de dados");  

    // Verificação do login
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM usuarios WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Usuário autenticado
        $_SESSION["usuario_logado"] = true;
        header("Location: ../index.php"); // Redirecionar para a página de dashboard
        exit();
    } else {
        // Credenciais inválidas, redirecionar de volta para a página de login com mensagem de erro
        header("Location: login.php?erro=1");
        exit();
    }
}
?>
