<?php
    require_once '../../models/conexion.php';
    $query = "SELECT * FROM producto";
    $result = mysqli_query($cn, $query);

    
?>