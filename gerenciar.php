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
        }

        h2 {
            text-align: center;
        }

        .tarefas {
            display: flex; 
            justify-content: space-around; 
        }

        .tarefa {
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 15px;
            margin-bottom: 15px;
            width: 300px; 
        }

        button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #2980b9;
        }

        select {
            margin-top: 10px; 
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="cadastro_usuario.php">Cadastro de Usuários</a></li>
                <li><a href="index.php">Principal</a></li>
                <li><a href="cadastro_tarefas.php">Cadastro de Tarefas</a></li>
                <li><a href="gerenciar.php">Gerenciar Tarefas</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Gerenciamento de Tarefas</h2>
        <section class="tarefas">
             <div class="tarefa">
                <h3>A Fazer</h3>
                <p>Descrição: Tarefa 1</p>
                <button onclick="editTask()">Editar</button>
                <button onclick="deleteTask()">Excluir</button>
                <select onchange="changeStatus(this)">
                    <option value="A Fazer">A Fazer</option>
                    <option value="Fazendo">Fazendo</option>
                    <option value="Pronto">Pronto</option>
                </select>
                <button onclick="updateStatus()">Alterar Status</button>
             </div>

             <div class="tarefa">
                <h3>Fazendo</h3>
                <p>Descrição: Tarefa 2</p>
                <button onclick="editTask()">Editar</button>
                <button onclick="deleteTask()">Excluir</button>
                <select onchange="changeStatus(this)">
                    <option value="A Fazer">A Fazer</option>
                    <option value="Fazendo">Fazendo</option>
                    <option value="Pronto">Pronto</option>
                </select>
                <button onclick="updateStatus()">Alterar Status</button>
             </div>

             <div class="tarefa">
                 <h3>Pronto</h3>
                 <p>Descrição: Tarefa 3</p>
                 <button onclick="editTask()">Editar</button>
                 <button onclick="deleteTask()">Excluir</button>
                 <select onchange="changeStatus(this)">
                     <option value="A Fazer">A Fazer</option>
                     <option value="Fazendo">Fazendo</option>
                     <option value="Pronto">Pronto</option>
                 </select>
                 <button onclick="updateStatus()">Alterar Status</button>
             </div>

             <div class="tarefa">
                 <h3>Adicionar Nova Tarefa</h3>
                 <input type="text" id="newTaskDescription" placeholder="Descrição da nova tarefa" required />
                 <button onclick="addTask()">Adicionar Tarefa</button>
             </div>

        </section>

    </main>

    <script>
        function editTask() {
            alert('Função de edição não implementada.');
        }

        function deleteTask() {
            alert('Função de exclusão não implementada.');
        }

        function changeStatus(selectElement) {
            const status = selectElement.value;
            alert('Status alterado para ' + status);
        }

        function updateStatus() {
           alert('Função de atualização de status não implementada.');
        }

        function addTask() {
           const taskDescription = document.getElementById('newTaskDescription').value;
           if (taskDescription) {
               alert('Nova tarefa adicionada: ' + taskDescription);
               document.getElementById('newTaskDescription').value = ''; 
           } else {
               alert('Por favor, insira uma descrição da tarefa.');
           }
       }
    </script>

</body>
</html>  