<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/productos.css">
</head>
    <body>
        <?php 
            //require_once '../includes/cn_producto.php';
            require_once '../../models/conexion.php';
            if (isset($_POST['limpiar'])) {
                $_POST = []; // Vacía todo
                $buscar_id = $buscar_nombre = $filtro_stock = $fecha = '';
                $pagina = 1;
            }
            include_once '../includes/productos_controller.php';
         ?>
        <div class="productos-page">
            <section class="head-producto">
                <h1>Productos</h1>
            </section>
            <section class="filtros-producto">
                <form method="POST" action="" class="form-filtros-producto">
                    <div class="buscadores1">
                        <div class="buscador-id">
                            <input type="text" name="buscar_id" placeholder="Buscar id..." value="<?= htmlspecialchars($buscar_id) ?>">
                            <button type="submit" class="btn-buscar-producto">Buscar</button>
                        </div>
                        <div class="buscador-nombre">
                            <input type="text" name="buscar_nombre" placeholder="Buscar productos..." value="<?= htmlspecialchars($buscar_nombre) ?>">
                            <button type="submit" class="btn-buscar-producto">Buscar</button>
                        </div>
                    </div>
                    <div class="buscadores2">
                        <div class="stock">
                            <label for="stock" class="label-stock">Stock:</label>
                            <select name="filtro_stock" id="stock" onchange="this.form.submit()">
                                <option value="todos"  <?= $filtro_stock == 'todos' ? 'selected' : '' ?>>Todos</option>
                                <option value="disponibles" <?= $filtro_stock == 'disponibles' ? 'selected' : '' ?>>Disponibles</option>
                                <option value="agotados" <?= $filtro_stock == 'agotados' ? 'selected' : '' ?>>Agotados</option>
                            </select>
                        </div>
                        <div class="fecha">
                            <label for="fecha" class="label-fecha">Fecha:</label>
                            <input type="date" id="fecha" name="fecha">
                        </div>
                    </div>
                    <div class="limpiar-filtros">
                        <button type="submit" name="limpiar" value="1" class="btn-limpiar-filtros">Limpiar Filtros</button>
                    </div>
                </form>
            </section>
            <section class="mantenedor-producto">
                <div class="btn-crear-producto">
                    <form action="" method="get">
                        <input type="submit" class="btn-crear" value="Crear Producto" name="action">
                    </form>
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
            <?php include_once '../includes/paginacion_productos.php'; ?>
        </div>
        <?php mysqli_close($cn); ?>
    </body>
</html>