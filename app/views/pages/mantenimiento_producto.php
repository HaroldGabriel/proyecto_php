<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/mantenimiento_producto.css">
</head>
<body>
    <?php
        require_once '../../models/conexion.php';        
        if (isset($_POST['action']) && $_POST['action'] === 'Guardar Producto') {
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $stock = $_POST['stock'];
            $precio = $_POST['precio'];
            require_once '../includes/cn_mantenimiento_producto.php';            
        }
    ?>
    <div class="mantenimiento-producto-page">
        <section class="head-page-mantenimiento-producto">
            <form method="get" class="form-volver-productos">
                <button type="submit" name="action" value="productos" class="btn-volver">← Volver a Productos</button>
            </form>
        </section>
        <section class="main-page-mantenimiento-producto">
            <form action="" method="post" class="form-mantenimiento-producto">
                <label for="nombre">Nombre de producto:</label>
                <input type="text" id="nombre" name="nombre">
                <label for="descripcion">Descripcion del producto:</label>
                <input type="text" id="descripcion" name="descripcion">
                <label for="stock">Stock del producto:</label>
                <input type="text" id="stock" name="stock">
                <label for="precio">Precio del producto:</label>
                <input type="text" id="precio" name="precio">
                <button type="submit" value="Guardar Producto" name="action">Guardar Producto</button>
            </form>
            <div class="contain-image">
                <img src="" alt="img a guardar" class="img-producto">
            </div>
        </section>
    </div>
    <?php mysqli_close($cn); ?>
</body>
</html>