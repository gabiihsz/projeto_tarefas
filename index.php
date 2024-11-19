<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Tarefas</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fa;
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }

        header {
            background-color: #3498db;
            padding: 10px 0;
        }

        nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        main {
            margin-top: 20px;
            text-align: center; /* Centraliza o texto */
        }

        h1 {
            font-size: 2em; /* Aumenta o tamanho do título */
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="cadastro_usuario.php">Cadastro de Usuários</a></li>
                <li><a href="cadastro_tarefas.php">Cadastro de Tarefas</a></li>
                <li><a href="gerenciar.php">Gerenciar Tarefas</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Bem-vindo ao Sistema de Gerenciamento de Tarefas</h1>
        <p>Utilize o menu acima para navegar entre as opções.</p> <!-- Adicionando uma mensagem informativa -->
    </main>
</body>
</html>