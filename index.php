<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'mejoras_cata';

    $conn = mysqli_connect($host, $user, $pass, $db);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>proyectos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.css">
   	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container p-2">
        <div class="row">
            <form class="form-group" action="" method="POST" enctype="multipart/form-data">
                <div class="col-12 p-2">
                    <div class="row">
                        <div class="col p-3">
                            <div class="row">
                                <div class="col-2">
                                    <label class="form-label"><h3>Titulo</h3></label>
                                </div>
                                <div class="col-10">
                                    <input type="text" name="titulo" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col p-3">
                            <label class="form-label"><h3>Descripción</h3></label>
                            <textarea name="descripcion" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3 mx-auto text-center p-3">
                            <label class="form-control"><h3>Categoria</h3></label>
                            <select name="categoria" class="form-control" id="">
                            <?php
                                $result = mysqli_query($conn, 'SELECT * FROM categorias_a');
                                while($row = mysqli_fetch_array($result)){
                                    echo '
                                        <option name="categoria" value="'.$row['id'].'_'.$row["categoria"].'">'.$row["categoria"].'</option>
                                    ';
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 p-3">
                            <label class="form-label"><h3>Imágen</h3></label>
                            <input type="file" name="imagen" id="" class="form-control" data-allowed-file-extensions="png jpg jpeg">
                        </div>
                        <div class="col-6 p-3">
                            <label class="form-label"><h3>Logo</h3></label>
                            <input type="file" name="logo" id="" class="form-control" data-allowed-file-extensions="png jpg jpeg">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 mx-auto text-center">
                            <input type="submit" name="upload" class="form-control">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <div class="container p-5">
        <div class="row">
            <div class="col">
                <?php
                    $titulo = '';
                    $descripcion = '';
                    $categoria = '';
                    $imagen = '';
                    $logo = '';

                    if(isset($_POST['upload'])){
                        if(isset($_POST['titulo'])){
                            $titulo = $_POST['titulo'];
                        }

                        if(isset($_POST['descripcion'])){
                            $descripcion = $_POST['descripcion'];
                        }

                        if(isset($_POST['categoria'])){
                            $categoria = $_POST['categoria'];
                            $cat = explode("_", $categoria);
                            $categoria_p = $cat[0];
                            $categoria_n = $cat[1];
                        }
                        
                        if(isset($_FILES['imagen']['name'])){
                            $imagen = $_FILES['imagen']['name'];  
                            $temp_name_imagen = $_FILES['imagen']['tmp_name'];  
                        
                            if(isset($imagen) and !empty($imagen)){
                                $location = 'imagenes/';      
                                move_uploaded_file($temp_name_imagen, $location.$imagen);
                            }
                        }

                        if(isset($_FILES['logo']['name'])){
                            $logo = $_FILES['logo']['name'];  
                            $temp_name_logo = $_FILES['logo']['tmp_name'];  
                        
                            if(isset($logo) and !empty($logo)){
                                $location_logo = 'imagenes/';      
                                move_uploaded_file($temp_name_logo, $location.$logo);
                            }
                        }
                    }

                    echo '[titulo] = '.(($titulo != '') ? $titulo : 'vacio').'<br>';
                    echo '[descripcion] = '.(($descripcion != '') ? $descripcion : 'vacio').'<br>';
                    echo '[categoria] = '.(($categoria != '') ? $categoria_n : 'vacio').'<br>';
                    echo '[imagen] = '.(($imagen != '') ? $imagen : 'vacio').'<br>';
                    echo '[logo] = '.(($logo != '') ? $logo : 'vacio').'<br>';

                    if($titulo != '' && $descripcion != '' && $categoria_n != '' && $categoria_p != '' && $imagen != '' && $logo != ''){
                        $sql = "
                            INSERT INTO `categorias_proyectos`(`categoria_n`, `titulo`, `descripcion`, `imagen`, `logo`, `categoria_p`) 
                            VALUES ('$categoria_n','$titulo','$descripcion','$imagen','$logo','$categoria_p')
                        ";

                        $res = mysqli_query($conn, $sql);
                    }
                ?>
            </div>
        </div>
    </div>

    <div class="container p-5">
        <div class="row">
            <div class="col">
                <?php
                    $tablasql = "SELECT * FROM categorias_proyectos";
                    $tablasres = mysqli_query($conn, $tablasql);
                    while($row = mysqli_fetch_array($tablasres)){
                        echo '
                            <div class="row py-2 border table-light">
                                <div class="col-2">'. $row["titulo"] .'</div>
                                <div class="col-6">'. $row["descripcion"] .'</div>
                                <div class="col-2"><img src="imagenes/'. $row["imagen"] .'" class="img-fluid" style="height: 200px; width: auto;"></div>
                                <div class="col-2"><img src="imagenes/'. $row["logo"] .'" class="img-fluid" style="height: 200px; width: auto;"></div>
                            </div>
                        ';      
                    }
                ?>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
</body>
</html>