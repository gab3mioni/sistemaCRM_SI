<?php
function conectarDB() {
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'sistemacrm';

    try {
        $conexao = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexao;
    } catch (PDOException $e) {
        die("Erro de conexão com o banco de dados: " . $e->getMessage());
    }
}

function verificarCredenciais($usuario, $senha) {
    try {
        $conexao = conectarDB();

        $query = "SELECT id FROM admin WHERE usuario = :usuario AND senha = :senha";
        $stmt = $conexao->prepare($query);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['id'];
        } else {
            return false;
        }
    } catch (PDOException $e) {
        die("Erro ao verificar credenciais: " . $e->getMessage());
    }
}