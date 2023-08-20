<?php

session_start();

// Verificar se o usuário não está logado 
if (!isset($_SESSION["usuario_logado"])) {
    header("Location: Auth/login.php"); // Redireciona para a página de login
    exit(); 
}

if (isset($_GET["acao"]) && $_GET["acao"] == "sair") {
    session_destroy();
    header("Location: Auth/login.php");
    exit();
}

$nomeUsuario = "User"; // Substitua pelo nome do usuário

function createMenuItem($text, $link) {
    echo '<li><a href="' . $link . '">' . $text . '</a></li>';
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Dashboard</title>
</head>
<body>
<div class="content">
        <h1>Bem-vindo ao CRUD :D</h1>
    </div>

    <div class="sidebar">
    <div class="user-info">
        <h2><?php echo $nomeUsuario; ?></h2>
    </div>
    <ul class="menu-list">
      <li><a href="Auth/register.php">Cadastro <i class="icone-arquivo fa fa-file"></i>  </a></li>
        <li><a href="Auth/table.php">Tabela <i class="icone-tabela fa fa-table"></i> </a></li>
        <li><a href="?acao=sair">Sair <i class="icone-sair fa fa-sign-out"></i> </a></li>
    </ul>
</div>
</body>
</html>
