<?php

$host = 'localhost'; 
$dbname = 'db_prova01'; 
$username = 'root'; 
$password = ''; 

$conn = new mysqli($host, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$feedbackMessage = '';

// Processar o formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);

    if (!empty($nome) && !empty($email)) {
        // Preparar a consulta SQL
        $sql = "INSERT INTO tbl_usuarios (usu_nome, usu_email) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        
        if ($stmt) {
            $stmt->bind_param("ss", $nome, $email);
            if ($stmt->execute()) {
                $feedbackMessage = "Usuário cadastrado com sucesso!";
            } else {
                $feedbackMessage = "Erro ao cadastrar usuário: " . $stmt->error;
            }
            $stmt->close();
        } else {
            $feedbackMessage = "Erro ao preparar a consulta: " . $conn->error;
        }
    } else {
        $feedbackMessage = "Todos os campos devem ser preenchidos.";
    }
}

// Fechar conexão
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Tarefas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #007BFF;
            color: white;
            padding: 10px;
            text-align: left;
        }
        .menu {
            text-align: right;
            padding: 10px 20px;
            background-color: #007BFF;
        }
        .menu a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            font-weight: bold;
        }
        .container {
            margin: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group button {
            width: 100%;
            padding: 10px;
            font-size: 14px;
        }
        button {
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="header">
    <h1>Gerenciamento de Tarefas</h1>
</div>
<div class="menu">
    <a href="cadastro_usuario.php">Cadastro de Usuários</a>
    <a href="index.php">Principal</a>
    <a href="cadastro_tarefas.php">Cadastro de Tarefas</a>
    <a href="gerenciar.php">Gerenciar Tarefas</a>
</div>

<div class="container">
    <h2>Cadastro de Usuários</h2>
    
    <?php if ($feedbackMessage): ?>
        <p style="color: green; font-weight: bold;"><?php echo htmlspecialchars($feedbackMessage); ?></p>
    <?php endif; ?>

    <form action="" method="post"> <!-- Enviar para o mesmo arquivo -->
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <button type="submit">Cadastrar</button>
        </div>
    </form>
</div>

</body>
</html>
