<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../CSS/style.css">
  <title>Página de Cadastro</title>
  <style>
    body {
        font-family: 'Oswald', sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        color:#fff;
    }

    form {
        border: 1px solid #ccc;
        padding: 20px;
        border-radius: 5px;
        width: 400px;
        background-color: #50577A;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    }

     input {
        display: block;
        margin-bottom: 10px;
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

    p {
        text-align: center;
        margin-top: 10px;
        }

    a{
        text-decoration: none;
        color:#fff;
        border-bottom: 2px solid #fff; 
        transition: border-color 0.3s;
        }
  </style>
</head>
<body>
    <form action="shipping.php" method="post">
    <h2>Cadastre-se</h2>
        <label for="new_username">Novo Usuário:</label>
        <input type="text" id="new_username" name="new_username" required><br>
        <label for="new_password">Nova Senha:</label>
        <input type="password" id="new_password" name="new_password" required><br>
        <button type="submit">Criar Conta</button>
        <p>Já tem uma conta? <a href="../index.php">Faça login aqui</a></p>
    </form>
</body>
</html>