<?php
include ("../config/config.php");

session_start();

$consultaVendedores = "SELECT * FROM vendedores ORDER BY id ASC";
$stmt = $conexao->prepare($consultaVendedores);
$stmt->execute();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendedores</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="../app/class/table/table.css">
    <link rel="stylesheet" href="../app/class/style.css">
</head>

<body>

<!-- cabeçalho -->
<nav class="navbar navbar-expand-lg" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="dashboard.php">CRM FATEC</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="dashboard.php">Gráficos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="vendas.php">Vendas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="clientes.php">Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="vendedores.php">Vendedores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="configuracoes.php">Configurações</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../config/logout.php">Sair</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- fim cabeçalho -->

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <form id="searchForm" class="d-flex">
            <div class="input-group">
                <input class="form-control" type="search" placeholder="Buscar por Usuário, CPF, Nome Completo ou E-mail"
                    name="query" aria-label="Search" id="searchQuery">
                <button class="btn btn-primary" type="submit">Buscar</button>
            </div>
        </form>
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addVendedorModal">Adicionar Vendedor</button>
    </div>

    <div class="col-12">
        <table class="content-table table table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Usuário</th>
                    <th scope="col">Nome Completo</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">E-mail</th>
                </tr>
            </thead>
            <tbody id="results">
                <?php
                while ($userData = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($userData['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($userData['usuario']) . "</td>";
                    echo "<td>" . htmlspecialchars($userData['nome_completo']) . "</td>";
                    echo "<td>" . htmlspecialchars($userData['cpf']) . "</td>";
                    echo "<td>" . htmlspecialchars($userData['endereco']) . "</td>";
                    echo "<td>" . htmlspecialchars($userData['email']) . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal para Adicionar Vendedor -->
<div class="modal fade" id="addVendedorModal" tabindex="-1" aria-labelledby="addVendedorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addVendedorModalLabel">Adicionar Vendedor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addVendedorForm">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="usuario" class="form-label">Usuário</label>
                        <input type="text" class="form-control" id="usuario" name="usuario" required>
                    </div>
                    <div class="mb-3">
                        <label for="nome_completo" class="form-label">Nome Completo</label>
                        <input type="text" class="form-control" id="nome_completo" name="nome_completo" required>
                    </div>
                    <div class="mb-3">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" required>
                    </div>
                    <div class="mb-3">
                        <label for="endereco" class="form-label">Endereço</label>
                        <input type="text" class="form-control" id="endereco" name="endereco" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Adicionar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
<script>
    document.getElementById('searchForm').addEventListener('submit', function (e) {
        e.preventDefault();
        const query = document.getElementById('searchQuery').value;

        fetch('../config/search/searchVendedores.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `query=${encodeURIComponent(query)}`
        })
        .then(response => response.text())
        .then(data => {
            document.getElementById('results').innerHTML = data;
        })
        .catch(error => console.error('Erro:', error));
    });

    document.getElementById('addVendedorForm').addEventListener('submit', function (e) {
        e.preventDefault();

        const formData = new FormData(this);

        fetch('../config/add/addVendedor.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            alert(data);
            location.reload(); // Recarregar a página para exibir o novo vendedor
        })
        .catch(error => console.error('Erro:', error));
    });
</script>
</body>
</html>
