<?php
include ("../config/config.php");

session_start();

$consultaClientes = "SELECT * FROM clientes ORDER BY id ASC";
$stmt = $conexao->prepare($consultaClientes);
$stmt->execute();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

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
                        <a class="nav-link" href="#">Sair</a>
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
                    <input class="form-control" type="search" placeholder="Buscar por Razão Social, CNPJ ou Ramo"
                        name="query" aria-label="Search" id="searchQuery">
                    <button class="btn btn-primary" type="submit">Buscar</button>
                </div>
            </form>
        </div>

        <div class="col-12">
            <table class="content-table table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Razão Social</th>
                        <th scope="col">CNPJ</th>
                        <th scope="col">Ramo</th>
                        <th scope="col">Endereço</th>
                        <th scope="col">E-mail</th>
                    </tr>
                </thead>
                <tbody id="results">
                    <?php
                    while ($userData = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($userData['id']) . "</td>";
                        echo "<td>" . htmlspecialchars($userData['razao']) . "</td>";
                        echo "<td>" . htmlspecialchars($userData['cnpj']) . "</td>";
                        echo "<td>" . htmlspecialchars($userData['ramo']) . "</td>";
                        echo "<td>" . htmlspecialchars($userData['endereco']) . "</td>";
                        echo "<td>" . htmlspecialchars($userData['email']) . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script>

        document.getElementById('searchForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const query = document.getElementById('searchQuery').value;

            fetch('../config/search.php', {
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
        
    </script>
</body>

</html>