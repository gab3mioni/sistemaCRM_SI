<?php
include ("../config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $nome_completo = $_POST['nome_completo'];
    $cpf = $_POST['cpf'];
    $endereco = $_POST['endereco'];
    $email = $_POST['email'];

    try {
        $query = "INSERT INTO vendedores (usuario, nome_completo, cpf, endereco, email) VALUES (:usuario, :nome_completo, :cpf, :endereco, :email)";
        $stmt = $conexao->prepare($query);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':nome_completo', $nome_completo);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':endereco', $endereco);
        $stmt->bindParam(':email', $email);

        if ($stmt->execute()) {
            echo "Novo vendedor adicionado com sucesso!";
        } else {
            echo "Erro ao adicionar novo vendedor.";
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}