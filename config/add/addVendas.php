<?php
include ("../config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $razao = $_POST['razao'];
    $cnpj = $_POST['cnpj'];
    $itens = $_POST['itens'];
    $quantidade = $_POST['quantidade'];
    $valor = $_POST['valor'];

    try {
        $query = "INSERT INTO vendas (razao, cnpj, itens, quantidade, valor) VALUES (:razao, :cnpj, :itens, :quantidade, :valor)";
        $stmt = $conexao->prepare($query);
        $stmt->bindParam(':razao', $razao);
        $stmt->bindParam(':cnpj', $cnpj);
        $stmt->bindParam(':itens', $itens);
        $stmt->bindParam(':quantidade', $quantidade);
        $stmt->bindParam(':valor', $valor);

        if ($stmt->execute()) {
            echo "Nova venda adicionado com sucesso!";
        } else {
            echo "Erro ao adicionar nova venda.";
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>
