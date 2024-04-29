<?php
include ("../config/config.php");

session_start();

$consultaClientes = "SELECT * FROM leads ORDER BY id ASC";
$stmt = $conexao->prepare($consultaClientes);
$stmt->execute();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="stylesheet" href="../app/class/dashboard.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

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
                        <a class="nav-link" aria-current="page" href="dashboard.php">Etapas de vendas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="clientes.php">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="vendedores.php">Vendedores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="configuracoes.php">Configurações</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sair</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- fim cabeçalho -->

    <div class="colunas">

        <div class="d-flex">

            <div class=" titulo_coluna">
                <h5 class="margin_titulo">Lead In</h5>
                <div class="lead">
                    <?php
                    $stmt1 = $conexao->prepare("SELECT * FROM leads");
                    $stmt1->execute();
                    while ($userData = $stmt1->fetch(PDO::FETCH_ASSOC)) {
                        echo "<div class='lead-card card m-2'>";
                        echo "<div class='border-top border-3 border-secondary fw-bold'><h5><strong>" . $userData['nome_lead'] . "</strong></h5></div>";
                        echo "<div class='h6'><p><strong>Sobre:</strong> " . $userData['interesse'] . "</p></div>";
                        echo "<div class='fs-6 text-light bg-secondary rounded text-center'><p><strong>Valor:</strong> " . $userData['valor'] . "</p></div>";
                        echo "</div>";
                    }
                    ?>
                </div>
                <button class="botao-customizado "><span style="font-weight: bold;">+</span> Nova Negociação</button>
            </div>



            <div class=" titulo_coluna">
                <h5 class="margin_titulo">Contato Feito</h5>
                <div class="lead">
                    <?php
                    $stmt2 = $conexao->prepare("SELECT * FROM contatos");
                    $stmt2->execute();
                    while ($userData = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                        echo "<div class='lead-card card m-2'>";
                        echo "<div class='border-top border-3 border-secondary fw-bold'><h5><strong>" . $userData['lead_nome'] . "</strong></h5></div>";
                        echo "<div class='h6'><p><strong>Negociação:</strong> " . $userData['data_captura'] . "</p></div>";
                        echo "<div class='fs-6 text-light bg-secondary rounded text-center'><p><strong>Detalhes:</strong> " . $userData['detalhes'] . "</p></div>";
                        echo "</div>";
                    }
                    ?>
                </div>
                <button class="botao-customizado"><span style="font-weight: bold;">+</span> Nova Negociação</button>
            </div>


            <div class=" titulo_coluna">
                <h5 class="margin_titulo">Em Progresso</h5>
                <div class="lead">
                    <?php
                    $stmt2 = $conexao->prepare("SELECT * FROM progresso");
                    $stmt2->execute();
                    while ($userData = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                        echo "<div class='lead-card card m-2'>";
                        echo "<div class='border-top border-3 border-secondary fw-bold'><h5><strong>" . $userData['nome_lead_progresso'] . "</strong></h5></div>";
                        echo "<div class='h6'><p><strong>Atividade:</strong> " . $userData['atividade'] . "</p></div>";
                        echo "<div class='fs-6 text-light bg-secondary rounded text-center'><p><strong>Detalhes:</strong> " . $userData['detalhes'] . "</p></div>";
                        echo "</div>";
                    }
                    ?>
                </div>
                <button class="botao-customizado"><span style="font-weight: bold;">+</span> Nova Negociação</button>
            </div>

            <div class=" titulo_coluna">
                <h5 class="margin_titulo">Proposta Feita</h5>
                <div class="lead">
                    <?php
                    $stmt2 = $conexao->prepare("SELECT * FROM propostas");
                    $stmt2->execute();
                    while ($userData = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                        echo "<div class='lead-card card m-2'>";
                        echo "<div class='border-top border-3 border-secondary fw-bold'><h5><strong>" . $userData['nome_proposta'] . "</strong></h5></div>";
                        echo "<div class='h6'><p><strong>Primeiro contato:</strong> " . $userData['data_primeiro_contato'] . "</p></div>";
                        echo "<div class='h6'><p><strong>Data proposta:</strong> " . $userData['data_proposta'] . "</p></div>";
                        echo "<div class='fs-6 text-light bg-secondary rounded text-center'><p><strong>Detalhes:</strong> " . $userData['descricao'] . "</p></div>";
                        echo "</div>";
                    }
                    ?>
                </div>
                <button class="botao-customizado"><span style="font-weight: bold;">+</span> Nova Negociação</button>
            </div>

            <div class=" titulo_coluna">
                <h5 class="margin_titulo">Negociando</h5>
                <div class="lead">
                    <?php
                    $stmt2 = $conexao->prepare("SELECT * FROM negociacoes");
                    $stmt2->execute();
                    while ($userData = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                        echo "<div class='lead-card card m-2'>";
                        echo "<div class='border-top border-3 border-secondary fw-bold'><h5><strong>" . $userData['nome_negociacao'] . "</strong></h5></div>";
                        echo "<div class='h6'><p><strong>Prazo limite:</strong> " . $userData['data_negociacao'] . "</p></div>";
                        echo "<div class='fs-6 text-light bg-secondary rounded text-center'><p><strong>Detalhes:</strong> " . $userData['descricao'] . "</p></div>";
                        echo "</div>";
                    }
                    ?>
                </div>
                <button class="botao-customizado"><span style="font-weight: bold;">+</span> Nova Negociação</button>
            </div>
                

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>