<?php
/*
require_once '../includes/funciones.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar datos
    $errores = validarDatos($_POST);

    if (!empty($errores)) {
        $_SESSION['errores'] = $errores;
        header('Location: ../index.php');
        exit;
    }

    // Recoger datos del formulario
    $tamano = $_POST['tamano'];
    $ingredientes = $_POST['ingredientes'] ?? [];
    $metodo_pago = $_POST['metodo_pago'];
    $codigo = $_POST['codigo'] ?? '';

    // Calcular precios
    $subtotal = calcularSubtotal($tamano, $ingredientes);

    // Aplicar descuento si hay código
    $descuento = [];
    if (!empty($codigo)) {
        $descuento = aplicarDescuento($codigo, $subtotal, $tamano);
        $subtotal = $descuento['total'];
    }

    // Aplicar cargo/descuento por método de pago
    $resultado_pago = aplicarCargoPago($subtotal, $metodo_pago);

    // Generar mensajes
    $mensajes = [];
    if (isset($descuento['mensaje'])) {
        $mensajes[] = $descuento['mensaje'];
    }
    $mensajes[] = $resultado_pago['mensaje'];

    // Mostrar resumen
    echo generarResumenPedido($_POST, $resultado_pago['total'], $mensajes);
} else {
    header('Location: ../index.php');
    exit;
}
*/