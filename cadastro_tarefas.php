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

// Verificar se a tabela 'tarefas' existe e criar se não existir
$tableCheckQuery = "CREATE TABLE IF NOT EXISTS tarefas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(255) NOT NULL,
    setor VARCHAR(100) NOT NULL,
    usuario VARCHAR(100) NOT NULL,
    prioridade ENUM('Baixa', 'Média', 'Alta') NOT NULL,
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$conn->query($tableCheckQuery);

$feedbackMessage = '';

// Processar o formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $descricao = trim($_POST['descricao']);
    $setor = trim($_POST['setor']);
    $usuario = trim($_POST['usuario']);
    $prioridade = trim($_POST['prioridade']);

    if (!empty($descricao) && !empty($setor) && !empty($usuario) && !empty($prioridade)) {
        $sql = "INSERT INTO tarefas (descricao, setor, usuario, prioridade) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        
        if ($stmt) {
            $stmt->bind_param("ssss", $descricao, $setor, $usuario, $prioridade);
            if ($stmt->execute()) {
                $feedbackMessage = "Tarefa cadastrada com sucesso!";
            } else {
                $feedbackMessage = "Erro ao cadastrar tarefa: " . $stmt->error;
            }
            $stmt->close();
        } else {
            $feedbackMessage = "Erro ao preparar a consulta: " . $conn->error;
        }
    } else {
        $feedbackMessage = "Todos os campos devem ser preenchidos.";
    }
}

// Carregar usuários para o dropdown (opcional)
$userList = ["Julia Mendes", "Maria Oliveira", "Laura Silva"]; // Você pode substituir isso pela consulta ao banco de dados

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
        .form-group input, .form-group select, .form-group button {
            width: calc(100% - 22px); /* Ajuste para o tamanho do padding */
            padding: 8px; /* Diminui o padding para inputs menores */
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
    <h2>Cadastro de Tarefas</h2>
    
    <?php if ($feedbackMessage): ?>
        <p style="color: green; font-weight: bold;"><?php echo htmlspecialchars($feedbackMessage); ?></p>
    <?php endif; ?>

    <form action="" method="post"> <!-- Alterado para enviar para o mesmo arquivo -->
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <input type="text" id="descricao" name="descricao" required>
        </div>
        <div class="form-group">
            <label for="setor">Setor:</label>
            <input type="text" id="setor" name="setor" required>
        </div>
        <div class="form-group">
            <label for="usuario">Usuário:</label>
            <select id="usuario" name="usuario" required>
                <option value="">Selecione um usuário</option>
                <?php foreach ($userList as $user): ?>
                    <option value="<?php echo htmlspecialchars($user); ?>"><?php echo htmlspecialchars($user); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="prioridade">Prioridade:</label>
            <select id="prioridade" name="prioridade" required>
                <option value="">Selecione a prioridade</option>
                <option value="Baixa">Baixa</option>
                <option value="Média">Média</option>
                <option value="Alta">Alta</option>
            </select>
        </div>
        <div class="form-group">
            <button type="submit">Cadastrar</button>
        </div>
    </form>
</div>

</body>
</html>
