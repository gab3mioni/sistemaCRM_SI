<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../app/class/dashboard.css">

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

    <button id="addLeadBtn" class="btn btn-primary"><span style="font-weight: bold;">+</span> Nova Negociação</button>

    <div class="colunas">
        <div class="d-flex">

            <div class="titulo_coluna lead">
                <h5 class="margin_titulo column">Lead in</h5>
                <div id="leadIn" class="lead" draggable="true">
                    <!-- Cards serão adicionados aqui -->
                </div>
            </div>

            <div class="titulo_coluna lead">
                <h5 class="margin_titulo column">Contato Feito</h5>
                <div id="contatoFeito" class="lead" draggable="true">
                    <!-- Cards serão adicionados aqui -->
                </div>
            </div>

            <div class="titulo_coluna lead">
                <h5 class="margin_titulo column">Em Progresso</h5>
                <div id="emProgresso" class="lead" draggable="true">
                    <!-- Cards serão adicionados aqui -->
                </div>
            </div>

            <div class="titulo_coluna lead">
                <h5 class="margin_titulo column">Proposta Feita</h5>
                <div id="propostaFeita" class="lead" draggable="true">
                    <!-- Cards serão adicionados aqui -->
                </div>
            </div>

            <div class="titulo_coluna lead">
                <h5 class="margin_titulo column">Fechado</h5>
                <div id="fechado" class="lead" draggable="true">
                    <!-- Cards serão adicionados aqui -->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Novo Registro -->
    <div class="modal fade" id="novoRegistroModal" tabindex="-1" aria-labelledby="novoRegistroModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="novoRegistroModalLabel">Novo Registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="novoRegistroForm">
                        <div class="mb-3">
                            <label for="nomeLead" class="form-label">Nome do Lead</label>
                            <input type="text" class="form-control" id="nomeLead" required>
                        </div>
                        <div class="mb-3">
                            <label for="interesse" class="form-label">Interesse</label>
                            <input type="text" class="form-control" id="interesse" required>
                        </div>
                        <div class="mb-3">
                            <label for="valor" class="form-label">Valor</label>
                            <input type="text" class="form-control" id="valor" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Adicionar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Edição de Registro -->
    <div class="modal fade" id="editarRegistroModal" tabindex="-1" aria-labelledby="editarRegistroModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarRegistroModalLabel">Editar Registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editarRegistroForm">
                        <div class="mb-3">
                            <label for="editNomeLead" class="form-label">Nome do Lead</label>
                            <input type="text" class="form-control" id="editNomeLead" required>
                        </div>
                        <div class="mb-3">
                            <label for="editInteresse" class="form-label">Interesse</label>
                            <input type="text" class="form-control" id="editInteresse" required>
                        </div>
                        <div class="mb-3">
                            <label for="editValor" class="form-label">Valor</label>
                            <input type="text" class="form-control" id="editValor" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../app/js/dashboard.js"></script>
</body>

</html>
