<?php
include ("../config/config.php");

session_start();

$consultaClientes = "SELECT * FROM admin ORDER BY id ASC";
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
                        <a class="nav-link" href="../config/logout.php">Sair</a>
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
                    <th scope="col">Usuário</th>
                    <th scope="col">E-mail</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($userData = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $userData['id'] . "</td>";
                    echo "<td>" . $userData['usuario'] . "</td>";
                    echo "<td>" . $userData['email'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="../app/js/clientes.js"></script>
</body>

</html>