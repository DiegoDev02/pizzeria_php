<?php

// Función para aplicar código de descuento
/*
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
*/