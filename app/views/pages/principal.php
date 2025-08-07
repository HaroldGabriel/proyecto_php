<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../../public/css/principal.css">
    <title>Document</title>
</head>
<body>
    <!----------------------------------------
                    HEADER
    ----------------------------------------->
    <header>
        <div class="main-header">
            <div class="logo">
                <div class="contain-logo">
                    <picture class="logo-img">
                        <source srcset="../../../public/img/img_login/logo.webp" type="image/webp">
                        <source srcset="../../../public/img/img_login/logo.jpg" type="image/jpg">
                        <img src="../../../public/img/img_login/logo.jpg" alt="logo de la empresa">
                    </picture>
                </div>
            </div>
            <div class="barra-busqueda">
                <input type="text" placeholder="Buscar...">
                <button type="submit" class="btn-search"><i class='bx bx-search'></i></button>
            </div>
        </div>
    </header>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0"></script>
    <main>
        <section class="container">
            <aside class="menu-aside">
                <div class="main-menu-aside">
                    <form action="" method="post" class="menu-form">
                        <input type="submit" class="menu-item" value="dashboard" name="action">
                        <input type="submit" class="menu-item" value="productos" name="action">
                        <input type="submit" class="menu-item" value="ventas" name="action">
                        <input type="submit" class="menu-item" value="reportes" name="action">
                    </form>
                </div>
            </aside>
            <div class="content-page">
                <div class="main-content-page">
                    <?php
                        if (isset($_POST['action'])) {
                            switch ($_POST['action']){
                                case 'dashboard':
                                    include_once '../pages/dashboard.php';
                                    break;

                                case 'productos':
                                    include_once '../pages/productos.php';
                                    break;

                                case 'ventas':
                                    include_once '../pages/ventas.php';
                                    break;

                                case 'reportes':
                                    include_once '../pages/reportes.php';
                                    break;

                                case 'Crear Producto':
                                    include_once '../pages/mantenimiento_producto.php';
                                    break;
                                case 'Guardar Producto':
                                include_once '../pages/mantenimiento_producto.php';
                                break;                       
                                default:
                                    echo "<img src='../../../public/img/img_login/img_login.jpg' alt='' class='img-principal'>";
                                    break;
                            }
                        }elseif (isset($_GET['page']) && $_GET['page'] === 'reportes'){
                            include_once '../pages/reportes.php'; 
                        }
                        else {
                            echo "<img src='../../../public/img/img_login/img_login.jpg' alt='' class='img-principal'>";
                        }

                        if (isset($_GET['page'])) {
                            include_once '../pages/reportes.php';
                        }
                    ?>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <div>footer</div>
    </footer>
</body>
</html>