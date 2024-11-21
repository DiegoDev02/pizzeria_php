<?php
// Configuracion de la aplicacion
define('PRECIO_BASE', [
    'personal' => 8.00,
    'mediana' => 12.00,
    'familiar' => 16.00
]);

define('INGREDIENTES', [
    'jamon' => ['nombre' => 'Jamón', 'precio' => 1.00],
    'pina' => ['nombre' => 'Piña', 'precio' => 5.00],
    'champinones' => ['nombre' => 'Champiñones', 'precio' => 1.00],
    'aceitunas' => ['nombre' => 'Aceitunas', 'precio' => 1.00]
]);

define('METODOS_PAGO', [
    'efectivo' => ['cargo' => 0, 'nombre' => 'Efectivo'],
    'tarjeta' => ['cargo' => 0.05, 'nombre' => 'Tarjeta de Credito'],
    'cripto' => ['cargo' => -0.10, 'nombre' => 'Criptomoneda']
]);

define('CODIGOS_DESCUENTOS', [
    'PIZZA50' => ['descuento' => 0.50, 'tipo' => 'segunda_pizza'],
    'FAMILIA' => ['descuento' => 0.10, 'tipo' => 'familiar'],
    'ESTUDIANTE' => ['descuento' => 0.15, 'tipo' => 'general']
]);