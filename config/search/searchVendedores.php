<?php
include("../../config/config.php");

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchQuery = $_POST['query'];
    $sql = "SELECT * FROM vendedores WHERE usuario LIKE :query OR cpf LIKE :query OR nome_completo LIKE :query OR email LIKE :query ORDER BY id ASC";
    $stmt = $conexao->prepare($sql);
    $param = "%" . $searchQuery . "%";
    $stmt->bindParam(':query', $param, PDO::PARAM_STR);
    $stmt->execute();
    
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($results as $userData) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($userData['id']) . "</td>";
        echo "<td>" . htmlspecialchars($userData['usuario']) . "</td>";
        echo "<td>" . htmlspecialchars($userData['nome_completo']) . "</td>";
        echo "<td>" . htmlspecialchars($userData['cpf']) . "</td>";
        echo "<td>" . htmlspecialchars($userData['endereco']) . "</td>";
        echo "<td>" . htmlspecialchars($userData['email']) . "</td>";
        echo "</tr>";
    }

    if (empty($results)) {
        echo "<tr><td colspan='6'>Nenhum resultado encontrado.</td></tr>";
    }
}
?>
