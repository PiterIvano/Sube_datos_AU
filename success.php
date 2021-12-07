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
    <div id="header">
        <div id="left">
            <label>Archivos Descargables</label>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card">
                    <div class="card-header">
                    <h3>Archivos - <a href='admin' class='btn btn-success'>Regresar</a></h3>
                    </div>
                    <div class="card-body">
                            <div class="form-group">
                            <?php 
                                #listar los archivos 
                                $archivos = scandir('./');
                                echo '<pre>';
                                #mostrar resuldato
                                foreach ($archivos as $key => $value) {
                                    if ($key > 1) {
                                        #mostrando solo los 18 ultimos caracteres
                                        $letras = substr($value, -18);
                                        echo '<span class="salto"></span>';
                                        echo "<form method='post'>";
                                        echo "<input type='hidden' name='archivo' value='$value'>";
                                        echo "<a class='btn btn-primary' href='$value'>$letras</a> <a href='$value' class='btn btn-success' download>Descargar</a> <input name='submit' type='submit' class='btn btn-danger' value='Borrar'><br>";
                                        echo "</form>";
                                        if (isset($_POST['submit'])) {
                                            $archivo = $_POST['archivo'];
                                            print_r($archivo);
                                            if (isset($_POST['archivo'])) {
                                                $archivo = $_POST['archivo'];
                                                #borrar archivo
                                                unlink($archivo);
                                                #recargar pagina con js
                                                echo "<script>window.location.href='index'</script>";
                                                
                                            }
                                        }
                                    }
                                }
                                #copiar un archivo a otro directorio


                            ?>
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</html>
                
</body>
