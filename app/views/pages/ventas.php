<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/ventas.css">
</head>
<body>
    <?php 
        require_once '../../models/conexion.php'; 
        $result_total = mysqli_query($cn, "SELECT COUNT(*) AS total FROM docventa");

        $por_pagina = 5;
        $pagina = isset($_POST['pagina']) ? (int)$_POST['pagina'] : 1;
        $inicio = ($pagina - 1) * $por_pagina;
        $result_head = mysqli_query($cn,"SELECT * FROM docventa LIMIT $inicio, $por_pagina");

        $result = mysqli_query($cn,"SELECT * FROM docventa LIMIT $inicio, $por_pagina");

        $fila_total = mysqli_fetch_assoc($result_total);
        $total_registros = $fila_total['total'];
        $total_paginas = ceil($total_registros / $por_pagina);
        $index = 0;
    ?>
    <div class="ventas-page">
        <section class="head-venta">
            <h1>Ventas</h1>
        </section>
        <section class="filtros-venta">
            <div class="buscadores1">
                <div class="buscador-id">
                    <input type="text" placeholder="Buscar id...">
                    <button type="submit" class="btn-buscar-venta">Buscar</button>
                </div>
                <div class="buscador-nombre">
                    <input type="text" placeholder="Buscar usuario...">
                    <button type="submit" class="btn-buscar-venta">Buscar</button>
                </div>
            </div>
            <div class="buscadores2">
                <div class="generico">
                    <label for="pendiente" class="label-pendiente">Estado:</label>
                    <select name="pendiente">
                        <option value="null">Seleccionar</option>
                        <option value="pendiente">pendiente</option>
                        <option value="finalizado">finalizado</option>
                        <option value="en_proceso">en proceso</option>
                    </select>
                </div>
                <div class="generico">
                    <label for="pendiente" class="label-pendiente">Pago:</label>
                    <select name="pendiente">
                        <option value="null">Seleccionar</option>
                        <option value="pendiente">Tarjeta</option>
                        <option value="finalizado">Efectivo</option>
                        <option value="en_proceso">Transferencia</option>
                    </select>
                </div>
            </div>
            <div class="buscadores2">
                <div class="generico">
                    <label for="pendiente" class="label-pendiente">Pendiente:</label>
                    <select name="pendiente">
                        <option value="null">Seleccionar</option>
                        <option value="pendiente">pendiente</option>
                        <option value="finalizado">finalizado</option>
                        <option value="en_proceso">en proceso</option>
                    </select>
                </div>
                <div class="fecha">
                    <label for="fecha" class="label-fecha">Fecha:</label>
                    <input type="date" id="fecha" name="fecha">
                </div>
            </div>
            <div class="limpiar-filtros">
                <button type="button" class="btn-limpiar-filtros">Limpiar Filtros</button>
            </div>
        </section>
        <section class="table-productos">
            <table class="productos-table-main">
                <thead>
                    <tr>
                        <?php while ($row = mysqli_fetch_field($result_head)): ?>
                            <th><?php echo $row->name; ?></th>
                        <?php endwhile; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <?php foreach ($row as $value): ?>
                                <td><?php echo htmlspecialchars($value); ?></td>
                            <?php endforeach; ?>                            
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </section>
        <?php echo "<!-- PAGINACIÓN RENDERIZADA -->"; ?>
        <div class="pagination">
            <p>Pagina Nº <?= $pagina ?> de <?= $total_paginas ?></p>
            <?php if ($pagina > 1): ?>
                <form method="post" style="display:inline;">
                    <input type="hidden" name="action" value="ventas">
                    <input type="hidden" name="pagina" value="<?= $pagina - 1 ?>">
                    <button type="submit">« Anterior</button>
                </form>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
                <form method="post" style="display:inline;">
                    <input type="hidden" name="action" value="ventas">
                    <input type="hidden" name="pagina" value="<?= $i ?>">
                    <button type="submit" <?= $i == $pagina ? 'style="font-weight:bold;"' : '' ?>><?= $i ?></button>
                </form>
            <?php endfor; ?>

            <?php if ($pagina < $total_paginas): ?>
                <form method="post" style="display:inline;">
                    <input type="hidden" name="action" value="ventas">
                    <input type="hidden" name="pagina" value="<?= $pagina + 1 ?>">
                    <button type="submit">Siguiente »</button>
                </form>
            <?php endif; ?>           
        </div>
    </div>
    <?php mysqli_close($cn); ?>
</body>
</html>