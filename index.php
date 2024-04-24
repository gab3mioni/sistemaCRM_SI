<?php
session_start();

if (isset($_POST['login'])) {
    $usuario = $_POST['usuario'];
    $senha = $_POST['password'];

    require('config/auth.php');

    $vendedores = verificarCredenciais($usuario, $senha);

    if ($vendedores !== false ) {
        $_SESSION['login'] = $vendedores;
        header('Location: public/dashboard.php');
        exit();
    } else {
        echo '<center>Credenciais incorretas. </center>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Sign In</title>
</head>
<body class="bg-gray">

    <div class="container">
        <div class="row">

                <div class="d-flex justify-content-center">
                    <div class="mt-5">
                        <h2 class="h1 fw-bolder text-blue">SIGN IN</h2>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <div class="mb-3"> 

                    <form action="public/dashboard.php" method="POST">

                    <div class="my-3">
                        Usuário: <input type="text" required class="form-control" name="usuario">
                    </div>

                    <div class="my-3">
                        Senha: <input type="password" required class="form-control" name="senha">
                    </div>

                    <div class="d-flex justify-content-center mt-3">
                        <input class="btn btn-primary btn-lg" type="submit" name="submit" value="Entrar">
                    </div>

                </form>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>