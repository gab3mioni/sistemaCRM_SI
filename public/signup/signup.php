<?php

if(isset($_POST['submit']))
{

    include_once('../../config/config.php');

    $razao = $_POST['razao'];
    $cnpj = $_POST['cnpj'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $pdoQuery = "INSERT INTO `cliente`(`razao`, `cnpj`, `email`, `password`) VALUES (:razao,:cnpj,:email,:senha)";

    $pdoResult = $conexao->prepare($pdoQuery);

    $pdoExec = $pdoResult->execute (array(":razao"=>$razao,":cnpj"=>$cnpj,":email"=>$email,":senha"=>$senha));
    
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/style.css">

    <title>Cadastro Enviado</title>
</head>

<body>

    <div class="container">
        <div class="row">

            <div class=" col-12 p-4 my-5">
                <div class="text-center text-blue fw-bolder">

                <h2>CADASTRO ENVIADO</h2>

                <p class="my-4">Suas informações foram enviadas para análise e serão validadas em até 48 horas úteis.</p>

                <div class="mt-5">
                    <a href="../../index.php" class="text-decoration-none text-blue fw-bolder">VOLTAR</a>
                </div>
            </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>