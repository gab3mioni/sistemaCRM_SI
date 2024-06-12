<?php
include ("../config/config.php");
session_start();
$limit = 15;

$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$start = ($page - 1) * $limit;

$totalQuery = "SELECT COUNT(*) FROM vendas";
$totalStmt = $conexao->prepare($totalQuery);
$totalStmt->execute();
$totalResults = $totalStmt->fetchColumn();

$totalPages = ceil($totalResults / $limit);

$consultaVendas = "SELECT * FROM vendas ORDER BY id ASC LIMIT :start, :limit";
$stmt = $conexao->prepare($consultaVendas);
$stmt->bindParam(':start', $start, PDO::PARAM_INT);
$stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
$stmt->execute();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendas</title>

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
                        <a class="nav-link" aria-current="page" href="">Gráficos</a>
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
        <div class="search mb-4">
            <form id="searchForm">
                <div class="input-group">
                    <input class="form-control" type="search" placeholder="Buscar por Razão Social, CNPJ ou Itens"
                        name="query" aria-label="Search" id="searchQuery">
                    <button class="btn btn-primary" type="submit">Buscar</button>
                </div>
            </form>
        </div>

        <div class="mb-4">
            <!-- Botão "Adicionar Venda" -->
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addVendaModal">Adicionar
                Venda</button>
        </div>

        <div class="col-12">
            <table class="content-table table table-striped">
                <!-- Cabeçalho da tabela -->
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Razão Social</th>
                        <th scope="col">CNPJ</th>
                        <th scope="col">Itens</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Data</th>
                    </tr>
                </thead>
                <tbody id="results">
                    <!-- Corpo da tabela preenchido dinamicamente -->
                    <?php
                    while ($userData = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($userData['id']) . "</td>";
                        echo "<td>" . htmlspecialchars($userData['razao']) . "</td>";
                        echo "<td>" . htmlspecialchars($userData['cnpj']) . "</td>";
                        echo "<td>" . htmlspecialchars($userData['itens']) . "</td>";
                        echo "<td>" . htmlspecialchars($userData['quantidade']) . "</td>";
                        echo "<td>" . htmlspecialchars($userData['valor']) . "</td>";
                        echo "<td>" . htmlspecialchars($userData['data']) . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <nav>
            <!-- Paginação -->
        </nav>
    </div>

    <div class="modal fade" id="addVendaModal" tabindex="-1" aria-labelledby="addVendaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addVendaModalLabel">Adicionar Venda</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addVendaForm">
                    <div class="modal-body">
                        <!-- Formulário para adicionar uma nova venda -->
                        <div class="mb-3">
                            <label for="razao" class="form-label">Razão Social</label>
                            <input type="text" class="form-control" id="razao" name="razao" required>
                        </div>
                        <div class="mb-3">
                            <label for="cnpj" class="form-label">CNPJ</label>
                            <input type="text" class="form-control" id="cnpj" name="cnpj" required>
                        </div>
                        <div class="mb-3">
                            <label for="itens" class="form-label">Itens</label>
                            <input type="text" class="form-control" id="itens" name="itens" required>
                        </div>
                        <div class="mb-3">
                            <label for="quantidade" class="form-label">Quantidade</label>
                            <input type="text" class="form-control" id="quantidade" name="quantidade" required>
                        </div>
                        <div class="mb-3">
                            <label for="valor" class="form-label">Valor</label>
                            <input type="text" class="form-control" id="valor" name="valor" required>
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


    <nav>
        <ul class="pagination">
            <?php if ($page > 1): ?>
                <li class="page-item">
                    <a class="page-link" href="vendas.php?page=<?= $page - 1; ?>">Anterior</a>
                </li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?= ($i == $page) ? 'active' : ''; ?>">
                    <a class="page-link" href="vendas.php?page=<?= $i; ?>"><?= $i; ?></a>
                </li>
            <?php endfor; ?>

            <?php if ($page < $totalPages): ?>
                <li class="page-item">
                    <a class="page-link" href="vendas.php?page=<?= $page + 1; ?>">Próximo</a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script>
        document.getElementById('searchForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const query = document.getElementById('searchQuery').value;

            fetch('../config/search/searchVendas.php', {
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
                .catch(error => console.error('Error:', error));
        });

        document.getElementById('addVendaForm').addEventListener('submit', function (e) {
            e.preventDefault();

            const formData = new FormData(this);

            fetch('../config/add/addVendas.php', {
                method: 'POST',
                body: formData
            })
                .then(response => response.text())
                .then(data => {
                    alert(data);
                    location.reload(); // Recarregar a página para exibir a nova venda
                })
                .catch(error => console.error('Erro:', error));
        });

    </script>
</body>

</html>