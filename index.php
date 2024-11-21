<?php 
require_once 'includes/header.php'; 
?>

<div class="container">
    <h1>🍕 Pizzería PHP</h1>

    <!-- Mostrar errores si existen -->
    <?php if (isset($_SESSION['errores'])): ?>
        <div class='errores'>
            <?php foreach ($_SESSION['errores'] as $error): ?>
                <p>❌ <?= $error ?></p>
            <?php endforeach; ?>
        </div>
        <?php unset($_SESSION['errores']); ?>
    <?php endif; ?>

    <form action="procesar/procesar_pedido.php" method="POST" class="form-pizza">
        <!-- Tamaño de la Pizza -->
        <div class="form-group">
            <label for="tamano">Selecciona el tamaño de tu pizza:</label>
            <select name="tamano" id="tamano" required>
                <option value="">Selecciona un tamaño...</option>
                <?php foreach (PRECIO_BASE as $tamano => $precio): ?>
                    <option value="<?= $tamano ?>">
                        <?= ucfirst($tamano) ?> - $<?= number_format($precio, 2) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Ingredientes -->
        <div class="form-group">
            <label>Ingredientes adicionales ($1.00 c/u):</label>
            <div class="ingredientes-grid">
                <?php foreach (INGREDIENTES as $valor => $info): ?>
                    <div class="ingrediente-item">
                        <input type="checkbox" name="ingredientes[]"
                            value="<?= $valor ?>" id="<?= $valor ?>">
                        <label for="<?= $valor ?>">
                            <?= $info['nombre'] ?>
                        </label>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Método de Pago -->
        <div class="form-group">
            <label for="metodo_pago">Método de Pago:</label>
            <select name="metodo_pago" id="metodo_pago" required>
                <option value="">Selecciona método de pago...</option>
                <?php foreach (METODOS_PAGO as $metodo => $info): ?>
                    <option value="<?= $metodo ?>">
                        <?= $info['nombre'] ?>
                        <?= $info['cargo'] > 0 ? '(+' . ($info['cargo']*100) . '%)' :
                        ($info['cargo'] < 0 ? '(' . ($info['cargo']*100) . '%)' : '') ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Código de Descuento -->
        <div class="form-group">
            <label for="codigo">¿Tienes un código de descuento?</label>
            <input type="text" name="codigo" id="codigo"
                placeholder="Ingresa tu código aquí">
        </div>

        <button type="submit" class="btn-ordenar">
            ¡Ordenar Pizza! 🛒
        </button>
    </form>
</div>

<?php 
require_once 'includes/footer.php'; 
?>