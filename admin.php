<?php 
session_start();
if(!isset($_SESSION['admin'])){ ?>
    <!DOCTYPE html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <style>            
        .salto {
            display: block;
            margin-top: 10px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
    <spam class="salto"></spam>
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Login Access</h3>
                        </div>
                        <div class="card-body">
                            <form method="post">
                                <div class="form-group">
                                    <spam class="salto">
                                    <input type="text" class="form-control" id="user" name="user" placeholder="User">
                                </div>
                                <div class="form-group">
                                <spam class="salto">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                <spam class="salto">
                                    <button type="submit" name="submit" class="btn btn-primary">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <?php 
    if(isset($_POST['submit'])){
        if (isset($_POST['user']) && isset($_POST['password'])){
            $user = $_POST['user'];
            $password = $_POST['password'];
            if($user == 'admin' && $password == 'admin'){
                $_SESSION['admin'] = $user; 
                header('Location: admin.php');
                echo '<script>window.location.href = "admin.php";</script>';
            }
        }
    }
    ?>
<?php }else{ ?>

<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Admin</title>
<style>            
    .salto {
        display: block;
        margin-top: 10px;
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Dispositivos Disponibles</h3>
                    </div>
                    <div class="card-body">
                            <div class="form-group">
                            <!--Crear una tabla-->
                            <table  class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Iniciar</th>
                                        <th>Eliminar</th>
                                        <th>Ver Images</th>
                                        <th>Ver Documents</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $directorio = opendir('./');
                                    while ($archivo = readdir($directorio)){
                                        if($archivo != '.' && $archivo != '..'&& $archivo != 'index.php' && $archivo != 'admin.php'&& $archivo != 'actualizacion'&& $archivo != 'success' && $archivo != '.htaccess' && $archivo != 'url.txt'){
                                            echo '<tr>';
                                            echo '<td>'.$archivo.'</td>';
                                            echo '<td><a class="btn btn-primary" href="'.$archivo.'">Ver</a></td>';
                                            echo "<form method='post'>";
                                            echo "<input type='hidden' name='archivo' value='$archivo'>";
                                            echo "<td><input type='submit' name='eliminar' value='Eliminar' class='btn btn-danger'></td>";
                                            echo "<td><a class='btn btn-success' href='$archivo/images'>Imagenes</a></td>";
                                            echo "<td><a class='btn btn-success' href='$archivo/documents'>Documents</a></td>";
                                            echo "</form>";
                                            #boton eliminar carpeta
                                            if (isset($_POST['eliminar'])) {
                                                $archivo = $_POST['archivo'];
                                                $carpetaimg = $archivo . "/images";
                                                $carpetadoc = $archivo . "/documents";
                                                #revisa si alguna de estas carpetas existen estas carpetas existen
                                                if (file_exists($carpetaimg) || file_exists($carpetadoc)) {
                                                    #si existen las elimina
                                                    if (file_exists($carpetaimg)) {
                                                        $directorioimg = opendir($carpetaimg);
                                                        while ($archivoimg = readdir($directorioimg)) {
                                                            if ($archivoimg != '.' && $archivoimg != '..') {
                                                                unlink($carpetaimg . "/" . $archivoimg);
                                                            }
                                                        }
                                                        rmdir($carpetaimg);
                                                    }
                                                    if (file_exists($carpetadoc)) {
                                                        $directoriodoc = opendir($carpetadoc);
                                                        while ($archivodoc = readdir($directoriodoc)) {
                                                            if ($archivodoc != '.' && $archivodoc != '..') {
                                                                unlink($carpetadoc . "/" . $archivodoc);
                                                            }
                                                        }
                                                        rmdir($carpetadoc);
                                                    }
                                                }
                                                if (isset($_POST['archivo'])) {
                                                    #eliminar todos los archivos de la carpeta
                                                    $archivos = scandir($archivo);
                                                    foreach ($archivos as $key => $value) {
                                                        if ($key > 1) {
                                                            unlink($archivo.'/'.$value);
                                                            
                                                        }
                                                    }
                                                    #eliminar carpeta
                                                    rmdir($archivo);
                                                    echo '<script>window.location.href = "admin.php";</script>';
                                                }
                                            }
                                            echo '</tr>';
                                        }
                                    }
                                    ?>
                                </tbody>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</body>
</html>
<?php } ?>