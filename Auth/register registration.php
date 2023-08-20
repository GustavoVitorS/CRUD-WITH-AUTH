<?php
// Verificar se o usuário está autenticado, caso contrário redirecionar para a página de login
session_start();
if (!isset($_SESSION["usuario_logado"]) || $_SESSION["usuario_logado"] !== true) {
    header("Location: login.php");
    exit();
}

// Conexão com o banco de dados
$conn = new mysqli("seu servirdor", "seu nome de usuario", "sua senha", "seu banco de dados");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber os dados do formulário
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];
    $endereco = $_POST["endereco"];
    $telefone = $_POST["telefone"];

    // Inserir os dados na tabela registros
    $insertSql = "INSERT INTO registros (nome, idade, endereco, telefone) VALUES ('$nome', $idade, '$endereco', '$telefone')";

    if ($conn->query($insertSql) === TRUE) {
        // Dados inseridos com sucesso
        echo "<script>
                alert('Registro cadastrado com sucesso');
                window.location.href = 'register.php'; // Redirecionar para a página após o alerta
              </script>";
    } else {
        // Tratar caso haja erro na inserção
        echo "<script>
                alert('Erro ao cadastrar registro: " . $conn->error . "');
                window.location.href = 'register.php'; // Redirecionar para a página após o alerta
              </script>";
    }
}
?>
