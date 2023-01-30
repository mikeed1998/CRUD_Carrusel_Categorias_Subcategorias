<?php
    require('connection.php');

    if(isset($_GET['id'])){
        $t_id = $_GET['id'];

        $dat = mysqli_query($conn, "SELECT * FROM categorias_proyectos WHERE id=$t_id");
        $datRow = mysqli_fetch_array($dat);

        $img = 'imagenes/'.$datRow['imagen'];
        $log = 'imagenes/'.$datRow['logo'];
        
        unlink($img);
        unlink($log);

        $sql = mysqli_query($conn, "DELETE FROM categorias_proyectos WHERE id=$t_id");

        header("Location: index.php");
    }
?>