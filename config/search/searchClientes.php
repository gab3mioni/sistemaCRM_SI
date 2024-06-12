<?php
include("../../config/config.php");

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchQuery = $_POST['query'];
    $sql = "SELECT * FROM clientes WHERE razao LIKE :query OR cnpj LIKE :query OR ramo LIKE :query ORDER BY id ASC";
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
        echo "<td>" . htmlspecialchars($userData['ramo']) . "</td>";
        echo "<td>" . htmlspecialchars($userData['endereco']) . "</td>";
        echo "<td>" . htmlspecialchars($userData['email']) . "</td>";
        echo "</tr>";
    }

    if (empty($results)) {
        echo "<tr><td colspan='6'>Nenhum resultado encontrado.</td></tr>";
    }
}