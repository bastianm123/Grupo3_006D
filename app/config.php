<?php

define('APP_NAME','PetMania');
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '123456');
define('DATABASE', 'veterinaria');

$servidor = "mysql:dbname=" .DATABASE. ";host=".HOST;

try {
    $pdo = new PDO($servidor, USER, PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));                 
} catch (PDOException $e) {
    echo "Error en conexion";
}

$URL = "http://localhost/Veterinaria";

date_default_timezone_set("America/Argentina/Buenos_Aires");

$fechaHora = date('Y-m-d  H:i:s');
?>