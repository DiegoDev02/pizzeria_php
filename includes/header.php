<?php
require_once __DIR__ . '/config.php';
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🍕 Pizzería PHP</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <nav class="navbar">
        <div class="nav-container">
            <a href="/" class="nav-logo">🍕 Pizzería PHP</a>
            <ul class="nav-menu">
                <li><a href="/index.php">Inicio</a></li>
                <li><a href="/index.php#menu">Ordenar</a></li>
            </ul>
        </div>
    </nav>