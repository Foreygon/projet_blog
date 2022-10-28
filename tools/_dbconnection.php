<?php
$dsn = 'mysql:host=localhost;dbname=blog';
$user = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    // echo "Connexion réussi";
} catch (PDOException $e) {
    echo "connexion échouée : " . $e->getMessage();
}