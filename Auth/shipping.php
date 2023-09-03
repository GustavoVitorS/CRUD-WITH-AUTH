<?php
// Conexão com o banco de dados
$conn = new mysqli("seu servirdor", "seu nome de usuario", "sua senha", "seu banco de dados");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário
    $newUsername = $_POST["new_username"];
    $newPassword = $_POST["new_password"];

    // Verifique se o nome de usuário é um endereço de e-mail válido
    if (!filter_var($newUsername, FILTER_VALIDATE_EMAIL)) {
        // Nome de usuário não é um e-mail válido
        echo "<script>
                alert('O nome de usuário deve ser um endereço de e-mail válido.');
                window.location.href = '../index.php'; // Redirecionar para a página principal ou outra página após o alerta
              </script>";
        exit; // Encerre o script
    }

    // Verifique se o nome de usuário já existe
    $checkUsernameSql = "SELECT * FROM usuarios WHERE username = '$newUsername'";
    $result = $conn->query($checkUsernameSql);

    if ($result->num_rows > 0) {
        // Nome de usuário já existe
        echo "<script>
                alert('O nome de usuário (e-mail) já está em uso. Escolha outro nome de usuário.');
                window.location.href = '../index.php'; // Redirecionar para a página principal ou outra página após o alerta
              </script>";
        exit; // Encerre o script
    }

    // Validar a senha
    if (strlen($newPassword) < 8 || !preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{8,}$/", $newPassword)) {
        // A senha não atende aos critérios de segurança
        echo "<script>
                alert('A senha deve conter pelo menos 8 caracteres, incluindo pelo menos uma letra maiúscula, uma letra minúscula, um número e um caractere especial.');
                window.location.href = '../index.php'; // Redirecionar para a página principal ou outra página após o alerta
              </script>";
        exit; // Encerre o script
    }

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
