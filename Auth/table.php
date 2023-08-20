<?php
// Conexão com o banco de dados
$conn = new mysqli("seu servirdor", "seu nome de usuario", "sua senha", "seu banco de dados");

// Verificação de erros na conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Consulta SQL para obter registros da tabela "registros"
$sql = "SELECT * FROM registros";
$result = $conn->query($sql);

session_start();

if (isset($_GET["acao"]) && $_GET["acao"] == "sair") {
  session_destroy();
  header("Location: login.php");
  exit();
}

$nomeUsuario = "User";

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../CSS/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <title>Document</title>
  <style>
           /* Estilos da tabela */
        body {
            font-family: 'Oswald', sans-serif;
            color:#fff;
        }

        .table-container {
            width: 80%;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 28vh;
            margin-right: 70px; /* Ajustar para centralizar horizontalmente */
            font-size: 20px;
            
        }

        table {
             /* Largura da tabela */
            border-collapse: collapse; /* Colapsar bordas para remover espaços entre células */
            margin: 0 auto; /* Centralizar a tabela */
            
        }

        th, td {
            border: 1px solid #ddd; /* Bordas das células */
            padding: 8px; /* Espaçamento interno das células */
            text-align: center; /* Alinhar o conteúdo ao centro */
            background-color: #50577A;
        }

        th {
            background-color: #50577A; /* Cor de fundo do cabeçalho */
        }

        /* Estilo dos links de ação */
        .action-links a {
            margin-right: 10px; /* Espaçamento entre os links */      
        }

        button {
            border: none;
            background-color: transparent;
            padding: 0;
            margin: 0;
            font: inherit;
            cursor: pointer;
            outline: inherit;
       }

       /* Aplicando o mesmo estilo do link 'a' */
        a, button {
            color: #fff;
            text-decoration: none;
            padding: 5px 10px;
            border: 1px solid #fff;
            border-radius: 3px;
            margin-right: 10px;
       }

       a:hover, a:focus, button:hover, button:focus {
       background-color: rgba(255, 255, 255, 0.177);
       }
    </style>
</head>
<body>
<div class="content">
        <h1 class="Th1"> Visualize, Edite ou Exclua.</h1>
    </div>

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


<table class="table-container">
    <!-- ... Cabeçalho da tabela ... -->
    <?php
    // Loop para exibir registros
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td class='editable' data-field='nome' data-id='" . $row["id"] . "'>" . $row["nome"] . "</td>";
        echo "<td class='editable' data-field='idade' data-id='" . $row["id"] . "'>" . $row["idade"] . "</td>";
        echo "<td class='editable' data-field='endereco' data-id='" . $row["id"] . "'>" . $row["endereco"] . "</td>";
        echo "<td class='editable' data-field='telefone' data-id='" . $row["id"] . "'>" . $row["telefone"] . "</td>";
        echo "<td>";
        echo "<button class='edit-button' data-id='" . $row["id"] . "'><i class='fa fa-pencil'></i></button>";
echo "<button class='cancel-button' data-id='" . $row["id"] . "' style='display: none;'><i class='fa fa-times-circle'></i></button>";
echo "<a class='delete-button' href='delete.php?id=" . $row["id"] . "' onclick='return confirm(\"Tem certeza?\")'><i class='fa fa-trash'></i></a>";
        echo "</td>";
        echo "</tr>";
    }
    ?>
</table>


<script>
$(document).ready(function() {
    $(".edit-button").click(function() {
        var id = $(this).data("id");
        var row = $(this).closest("tr");

        row.find(".edit-button").hide();
        row.find(".delete-button").hide(); // Ocultar botão EXCLUIR
        row.find(".cancel-button").show(); // Mostrar botão CANCELAR

        row.find("td.editable").each(function() {
            var oldValue = $(this).text();
            $(this).data("old-value", oldValue);
            $(this).html("<input type='text' value='" + oldValue + "'>");
        });

        // Adiciona o botão "Salvar" na última célula da linha
        row.find("td:last-child").append("<button class='save-button' data-id='" + id + "'><i class='fa fa-check'></i></button>");
    });

    // Ação para o botão CANCELAR
    $(".cancel-button").click(function() {
        var row = $(this).closest("tr");
        row.find(".edit-button").show();
        row.find(".delete-button").show(); // Mostrar botão EXCLUIR
        row.find(".cancel-button").hide(); // Esconder botão CANCELAR

        row.find("td.editable").each(function() {
            var oldValue = $(this).data("old-value");
            $(this).html(oldValue);
        });

        row.find(".save-button").remove();
    });

    $(document).on("click", ".save-button", function() {
        var id = $(this).data("id");
        var row = $(this).closest("tr");

        var data = {
            id: id,
            nome: row.find("td[data-field='nome'] input").val(),
            idade: row.find("td[data-field='idade'] input").val(),
            endereco: row.find("td[data-field='endereco'] input").val(),
            telefone: row.find("td[data-field='telefone'] input").val()
        };

        $.post("update.php", data, function(response) {
            if (response === "success") {
                row.find("td.editable").each(function() {
                    var newValue = $(this).find("input").val(); // Pega o valor do input
                    $(this).text(newValue); // Define o novo valor do campo
                });

                row.find(".edit-button").show();
                row.find(".delete-button").show(); // Mostrar botão EXCLUIR
                row.find(".cancel-button").hide(); // Esconder botão CANCELAR
                row.find(".save-button").remove(); // Remove o botão "Salvar"
            } else {
                alert("Erro ao atualizar o registro.");
            }
        });
    });
});

</script>

</body>
</html>