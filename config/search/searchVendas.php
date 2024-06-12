<?php
include("../../config/config.php");

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchQuery = $_POST['query'];
    $sql = "SELECT * FROM vendas WHERE razao LIKE :query OR cnpj LIKE :query OR itens LIKE :query ORDER BY id ASC";
    $stmt = $conexao->prepare($sql);
    $param = "%" . $searchQuery . "%";
    $stmt->bindParam(':query', $param, PDO::PARAM_STR);
    $stmt->execute();
    
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($results as $userData) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($userData['id']) . "</td>";
        echo "<td>" . htmlspecialchars($userData['razao']) . "</td>";
        echo "<td>" . htmlspecialchars($userData['cnpj']) . "</td>";
        echo "<td>" . htmlspecialchars($userData['itens']) . "</td>";
        echo "<td>" . htmlspecialchars($userData['quantidade']) . "</td>";
        echo "<td>" . htmlspecialchars($userData['valor']) . "</td>";
        echo "<td>" . htmlspecialchars($userData['data']) . "</td>";
        echo "</tr>";
    }

    if (empty($results)) {
        echo "<tr><td colspan='7'>Nenhum resultado encontrado.</td></tr>";
    }
}
