<?php
$nomeUsuario = "User"; // Substitua pelo nome do usuário

function createMenuItem($text, $link) {
    echo '<li><a href="' . $link . '">' . $text . '</a></li>';
}

session_start();

if (isset($_GET["acao"]) && $_GET["acao"] == "sair") {
  session_destroy();
  header("Location: login.php");
  exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../CSS/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Cadastro</title>
  <style>
        body {
            font-family: 'Oswald', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color:#fff;
        }

        .container {
            background-color: #50577A;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            width: 400px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button {
            display: block;
            background-color: #50577A;
            color: #fff;
            border: 1px solid #ffffff;
            border-radius: 5px;
            padding: 10px 20px;
            border-radius: 3px;
            transition: background-color 0.3s;
            cursor: pointer;
            font-family: 'Oswald', sans-serif;
            font-size: 20px;
            box-sizing: border-box;
        }

        button:hover {
            background-color: rgba(255, 255, 255, 0.177);
        }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="user-info">
        <h2><?php echo $nomeUsuario; ?></h2>
    </div>
    <ul class="menu-list">
      <li><a href="register.php">Cadastro <i class="icone-arquivo fa fa-file"></i>  </a></li>
        <li><a href="table.php">Tabela <i class="icone-tabela fa fa-table"></i> </a></li>
        <li><a href="?acao=sair">Sair <i class="icone-sair fa fa-sign-out"></i> </a></li>
    </ul>
</div>

<div class="container">
        <h2>Cadastro de Usuário</h2>
        <form action="register registration.php" method="POST">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="idade">Idade:</label>
                <input type="text" id="idade" name="idade" required>
            </div>
            <div class="form-group">
                <label for="endereco">Endereço:</label>
                <input type="text" id="endereco" name="endereco" required>
            </div>
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="text" id="telefone" name="telefone" required>
            </div>
            <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>
</html>