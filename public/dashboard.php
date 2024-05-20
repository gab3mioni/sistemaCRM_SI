<?php
include ("../config/config.php");

session_start();

$consultaCards = "SELECT * FROM vendas ORDER BY id ASC";
$stmt = $conexao->prepare($consultaCards);
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
    <link rel="stylesheet" href="../app/class/clientes.css">

</head>

<body>

    <!-- cabeçalho -->

    <nav class="navbar navbar-expand-lg" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="dashboard.php">CRM FATEC</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>]

            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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

    <div class="search">
        <form>
            <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search" id="searchInput">
        </form>
    </div>

    <div class="col-12">
        <table class="content-table small-screen">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Razão Social</th>
                    <th scope="col">CNPJ</th>
                    <th scope="col">Itens</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Dta</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($userData = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $userData['id'] . "</td>";
                    echo "<td>" . $userData['razao'] . "</td>";
                    echo "<td>" . $userData['cnpj'] . "</td>";
                    echo "<td>" . $userData['itens'] . "</td>";
                    echo "<td>" . $userData['quantidade'] . "</td>";
                    echo "<td>" . $userData['valor'] . "</td>";
                    echo "<td>" . $userData['data'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../app/js/dashboard.js"></script>
</body>

</html>