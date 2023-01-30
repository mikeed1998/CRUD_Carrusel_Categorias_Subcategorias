<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<?php
    require('connection.php');

    $t_id = '';

    if(isset($_GET['id'])){
        $t_id = $_GET['id'];

        $result = mysqli_query($conn, "SELECT * FROM categorias_proyectos WHERE id=$t_id");
        $row = mysqli_fetch_array($result);

        echo '
            <div class="container p-5">
                <div class="row">
                    <div class="col-2">
                        Titulo
                    </div>
                    <div class="col-6">
                        Descripción
                    </div>
                    <div class="col-2">
                        Imágen
                    </div>
                    <div class="col-2">
                        Logo
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        '. $row["titulo"] .'
                    </div>
                    <div class="col-6">
                        '. $row["descripcion"] .'
                    </div>
                    <div class="col-2">
                        <img src="imagenes/'. $row["imagen"] .'" class="img-fluid" style="height: 200px; width: auto;">
                    </div>
                    <div class="col-2">
                        <img src="imagenes/'. $row["logo"] .'" class="img-fluid" style="height: 200px; width: auto;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <form action="editarP.php" method="POST">
                            <input type="text" name="tit" class="form-control"/>
                            <input type="submit" class="form-control" value="Actualizar"/>
                        </form>
                    </div>
                    <div class="col-6">
                        <form action="" method="POST">
                            <textarea name="desc" class="form-control"></textarea>
                            <input type="submit" class="form-control" value="Actualizar"/>
                        </form>
                    </div>
                    <div class="col-2">
                        <form action="" method="POST">
                            <input type="file" name="ima" id="" class="form-control" data-allowed-file-extensions="png jpg jpeg">
                            <input type="submit" class="form-control" value="Actualizar"/>
                        </form>
                    </div>
                    <div class="col-2">
                        <form action="" method="POST">
                            <input type="file" name="log" id="" class="form-control" data-allowed-file-extensions="png jpg jpeg">
                            <input type="submit" class="form-control" value="Actualizar"/>
                        </form>
                    </div>
                </div>
            </div>
        ';
    }

    if(isset($_POST['tit'])){
        $tit = $_POST['tit'];
        $sqltit = "UPDATE categorias_proyectos SET titulo=$tit WHERE id=$t_id";
        $restit = mysqli_query($conn, $sqltit);
    }
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>