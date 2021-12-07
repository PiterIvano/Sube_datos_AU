<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
            <label>Admin Panel</label>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Carpetas Disponibles</h3>
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
                                        echo '<span class="salto"></span>';
                                        echo "<a class='btn btn-primary' href='$value'>$value</a><br>";
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
