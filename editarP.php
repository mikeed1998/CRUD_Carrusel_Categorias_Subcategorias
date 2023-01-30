<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<?php
    require('connection.php');

    if(isset($_GET['id'])){
        $t_id = $_GET['id'];
        $t = '';

        $mostrar = mysqli_query($conn, "SELECT * FROM categorias_proyectos WHERE id=$t_id");
        $row = mysqli_fetch_array($mostrar);

        echo '
            <div class="container">
            
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
                        '. $row['titulo'] .'
                    </div>
                    <div class="col-6">
                        '. $row['descripcion'] .'
                    </div>
                    <div class="col-2">
                        <img src="imagenes/'. $row['imagen'] .'" class="img-fluid" style="height: 200px; width: auto;" />
                    </div>
                    <div class="col-2">
                        <img src="imagenes/'. $row['logo'] .'" class="img-fluid" style="height: 200px; width: auto;" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <input type="text" name="mTitulo" class="form-control"/>
                            <input type="submit" name="enviar" class="form-control"/>
                        </form>
                        ';
                        if(isset($_POST['enviar'])){
                            $t = $_POST['mTitulo'];
                            $res = mysqli_query($conn, "UPDATE categorias_proyectos SET titulo='$t' WHERE id=$t_id");
                            header('Location: index.php');
                        }   
                        echo '
                    </div>
                    <div class="col-6">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <input type="text" name="mDescripcion" class="form-control"/>
                            <input type="submit" name="enviar2" class="form-control"/>
                        </form>
                        ';
                        if(isset($_POST['enviar2'])){
                            $d = $_POST['mDescripcion'];
                            $res = mysqli_query($conn, "UPDATE categorias_proyectos SET descripcion='$d' WHERE id=$t_id");
                            header('Location: index.php');
                        }   
                        echo '
                    </div>
                    <div class="col-2">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <input type="file" name="mImagen" class="form-control"/>
                            <input type="submit" name="enviar3" class="form-control"/>
                        </form>
                        ';
                        if(isset($_POST['enviar3'])){
                            $i = $_POST['mImagen'];
                            $anterior = 'imagenes/'.$row['imagen'];
                            unlink($anterior);

                            if(isset($_FILES['mImagen']['name'])){
                                $imagen = $_FILES['mImagen']['name'];  
                                $temp_name_imagen = $_FILES['mImagen']['tmp_name'];  
                            
                                if(isset($imagen) and !empty($imagen)){
                                    $location = 'imagenes/';      
                                    move_uploaded_file($temp_name_imagen, $location.$imagen);
                                }
                            }

                            $res = mysqli_query($conn, "UPDATE categorias_proyectos SET imagen='$i' WHERE id=$t_id");
                            header('Location: index.php');
                        }   
                        echo '
                    </div>
                    <div class="col-2">

                    </div>
                </div>
                
                
            </div>
        ';

    
    }
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>