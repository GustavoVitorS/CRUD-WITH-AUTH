<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../CSS/style.css">
  <title>Tela de Login</title>
  <style>
        body {
            font-family: 'Oswald', sans-serif;;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
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
            color: #fff; /* Cor do texto */
        }

        input[type="text"] {
          width: 100%;
          padding: 8px;
          border: 1px solid #ccc;
          border-radius: 3px;
        }

        .password{
          width: 100%;
          padding: 8px;
          border: 1px solid #ccc;
          border-radius: 3px;
        }

        a{
          text-decoration: none;
          color:#fff;
          border-bottom: 2px solid #fff; 
          transition: border-color 0.3s;
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
<div class="container">
        <h2 style="color: #fff;">Entre com suas Credenciais</h2>
        <form action="check.php" method="post">
            <div class="form-group">
                <label for="username">Usuário:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Senha:</label>
                <input class="password" type="password" id="password" name="password" required>
            </div>
            <button type="submit">Entrar</button>
        </form>
        <p style="color: #fff;">Ainda não tem uma conta? <a href="sing up.php">Crie uma aqui</a></p>
    </div>
</body>
</html>