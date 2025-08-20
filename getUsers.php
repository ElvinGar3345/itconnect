<?php
// getUsers.php
session_start();
require 'config.php';

// Consideramos online a quien actualizó actividad en los últimos 60s
$stmt = $pdo->query("
    SELECT username
    FROM online_users
    WHERE last_activity > (NOW() - INTERVAL 60 SECOND)
");
echo json_encode($stmt->fetchAll());
