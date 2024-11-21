<?php
require_once 'config.php';

// Función para validar datos del formulario
function validarDatos($datos) {
    $errores = [];

    if (empty($datos['tamano'])) {
        $errores[] = "Debe seleccionar un tamaño de pizza";
    }

    if (!isset($datos['metodo_pago'])) {
        $errores[] = "Debe seleccionar un método de pago";
    }

    return $errores;
}

// Función para calcular subtotal
function calcularSubtotal($tamano, $ingredientes = []) {
    $subtotal = PRECIO_BASE[$tamano];

    // Sumar precio de ingredientes
    foreach ($ingredientes as $ingrediente) {
        if (isset(INGREDIENTES[$ingrediente])) {
            $subtotal += INGREDIENTES[$ingrediente]['precio'];
        }
    }

    return $subtotal;
}

// Función para aplicar cargos/descuentos según método de pago
function aplicarCargoPago($subtotal, $metodo_pago) {
    if (!isset(METODOS_PAGO[$metodo_pago])) {
        return [
            'total' => $subtotal,
            'mensaje' => 'Método de pago no válido'
        ];
    }

    $cargo = METODOS_PAGO[$metodo_pago]['cargo'];
    $total = $subtotal + ($subtotal * $cargo);

    $mensaje = match($metodo_pago) {
        'tarjeta' => "Cargo por tarjeta: $" . number_format($subtotal * $cargo, 2),
        'cripto' => "¡Descuento crypto: $" . number_format(abs($subtotal * $cargo), 2) . "! 🎉",
        default => "Sin cargos adicionales"
    };

    return [
        'total' => $total,
        'mensaje' => $mensaje
    ];
}

// Función para aplicar código de descuento
function aplicarDescuento($codigo, $subtotal, $tamano) {
    $codigo = strtoupper($codigo);

    if (!isset(CODIGOS_DESCUENTO[$codigo])) {
        return [
            'total' => $subtotal,
            'descuento' => 0,
            'mensaje' => 'Código no válido ❌'
        ];
    }

    $info = CODIGOS_DESCUENTO[$codigo];
    $descuento = 0;

    // Validar según tipo de descuento
    switch ($info['tipo']) {
        case 'familiar':
            if ($tamano !== 'familiar') {
                return [
                    'total' => $subtotal,
                    'descuento' => 0,
                    'mensaje' => 'Código válido solo para pizzas familiares 👨‍👩‍👧‍👦'
                ];
            }
            $descuento = $subtotal * $info['descuento'];
            break;

        case 'general':
            $descuento = $subtotal * $info['descuento'];
            break;
    }

    return [
        'total' => $subtotal - $descuento,
        'descuento' => $descuento,
        'mensaje' => "¡Descuento aplicado: $" . number_format($descuento, 2) . "! 🎉"
    ];
}

// Función para formatear el resumen del pedido
function generarResumenPedido($datos, $total, $mensajes = []) {
    $resumen = "<div class='card'>"; // Cambiado a 'card'
    $resumen .= "<h2>🍕 Resumen de tu Pedido</h2>";

    $resumen .= "<p><strong>Tamaño:</strong> " . ucfirst($datos['tamano']) . "</p>";

    if (!empty($datos['ingredientes'])) {
        $nombres_ingredientes = array_map(function($ing) {
            return INGREDIENTES[$ing]['nombre'];
        }, $datos['ingredientes']);
        $resumen .= "<p><strong>Ingredientes:</strong> " . implode(", ", $nombres_ingredientes) . "</p>";
    }

    foreach ($mensajes as $mensaje) {
        $resumen .= "<p class='mensaje'>$mensaje</p>";
    }

    $resumen .= "<h3>Total a pagar: $" . number_format($total, 2) . "</h3>";
    $resumen .= "<a href='http://localhost/pizzeria_php/index.php' class='btn'>← Ordenar otra pizza</a>"; // Enlace actualizado
    $resumen .= "</div>";

    return $resumen;
}