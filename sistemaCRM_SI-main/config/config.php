<?php

$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';

    $conexao = new PDO("mysql:host=$dbHost;dbname=sistemacrm", $dbUsername, $dbPassword);
