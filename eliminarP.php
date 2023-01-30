<?php
    require('connection.php');

    if(isset($_GET['id'])){
        $t_id = $_GET['id'];

        echo $t_id;
    }
?>