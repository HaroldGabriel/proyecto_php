<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/reportes.css">
</head>
<body>
    <?php 
        require_once '../../models/conexion.php';
        $ruta = 'reportes';
        $reporte = $_GET['reporte'] ?? '';
        $pagina = isset($_POST['pagina']) ? (int)$_POST['pagina'] : 1;
        $por_pagina = 5;
        $inicio = ($pagina - 1) * $por_pagina;
        switch ($reporte) {
            case '✔️ Ventas':
                $tabla = 'docventa';
                $query = "SELECT fecha, subtotal, total FROM docventa LIMIT $inicio, $por_pagina";
                break;
            case '🛒 Compras':
                $tabla = 'doccompra';
                $query = "SELECT id_doc_compra,id_usuario,fecha,subtotal,total FROM doccompra LIMIT $inicio, $por_pagina";
                break;
            case '📦 Mov. Inventario':
                $tabla = 'producto';
                $query = "SELECT id_producto,stock_inicial,stock FROM producto LIMIT $inicio, $por_pagina";
                break;
            default:
                $tabla = 'docventa';
                $query = "SELECT fecha, subtotal, total FROM docventa LIMIT $inicio, $por_pagina";
                break;
        }

        $result_total = mysqli_query($cn, "SELECT COUNT(*) AS total FROM $tabla");       
        $result = $query ? mysqli_query($cn, $query) : null;
        $fila_total = mysqli_fetch_assoc($result_total);
        $total_registros = $fila_total['total'];
        $total_paginas = ceil($total_registros / $por_pagina);
        $index = 0;

    ?>
    <div class="reportes-pages">
        <section class="head-reporte">
            <nav>
                <form action="" method="get">
                    <input type="hidden" name="page" value="reportes"> 
                    <input type="submit" class="menu-item" name="reporte" value="✔️ Ventas">               
                    <input type="submit" class="menu-item" name="reporte" value="🛒 Compras">
                    <input type="submit" class="menu-item" name="reporte" value="📦 Mov. Inventario">
                </form>
            </nav>
        </section>
        <section class="main-page-ventas">
            <div class="main-table-ventas">
                <table class="table-ventas">
                    <thead>
                        <tr>
                            <?php while ($row = mysqli_fetch_field($result)): ?>
                            <th><?php echo $row->name; ?></th>
                            <?php endwhile; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <?php foreach ($row as $value): ?>
                                <td><?php echo htmlspecialchars($value); ?></td>
                            <?php endforeach; ?>                            
                        </tr>
                        <?php endwhile; ?>
                        </tr>
                    </tbody>
                </table>
                <?php include_once '../includes/paginacion.php' ?>
            </div>
            <div class="grafico1">
                <?php include_once '../../../public/chartjs/char3.html'; ?>
            </div>
            <div class="grafico2">
                <?php include_once '../../../public/chartjs/char4.html'; ?>
            </div>
        </section>
        
    </div>
    <?php mysqli_close($cn); ?>
</body>
</html>