<?php
include ("../config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $razao = $_POST['razao'];
    $cnpj = $_POST['cnpj'];
    $ramo = $_POST['ramo'];
    $endereco = $_POST['endereco'];
    $email = $_POST['email'];

    try {
        $query = "INSERT INTO clientes (razao, cnpj, ramo, endereco, email) VALUES (:razao, :cnpj, :ramo, :endereco, :email)";
        $stmt = $conexao->prepare($query);
        $stmt->bindParam(':razao', $razao);
        $stmt->bindParam(':cnpj', $cnpj);
        $stmt->bindParam(':ramo', $ramo);
        $stmt->bindParam(':endereco', $endereco);
        $stmt->bindParam(':email', $email);

        if ($stmt->execute()) {
            echo "Novo cliente adicionado com sucesso!";
        } else {
            echo "Erro ao adicionar novo cliente.";
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>
