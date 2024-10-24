<?php


include('/xampp/htdocs/Veterinaria/app/config.php');
include ('/xampp/htdocs/Veterinaria/admin/layout/mensaje.php');

$id_usuario = $_POST['id_usuario'];
$nombre_mascota = $_POST['nombre_mascota'];
$tipo_servicio = $_POST['tipo_servicio'];
$fecha_cita = $_POST['fecha_cita'];
$hora_cita = $_POST['hora_cita'];
$title = $tipo_servicio;
$start = $fecha_cita;
$end = $fecha_cita;
$color = "#1842d9";

$sentencia = $pdo->prepare('INSERT INTO reservas
(id_usuario,nombre_mascota,tipo_servicio,fecha_cita,hora_cita,title,start,end,color, fyh_creacion)
VALUES ( :id_usuario,:nombre_mascota,:tipo_servicio,:fecha_cita,:hora_cita,:title,:start,:end,:color,:fyh_creacion)');

$sentencia->bindParam(':id_usuario', $id_usuario);
$sentencia->bindParam(':nombre_mascota', $nombre_mascota);
$sentencia->bindParam(':tipo_servicio', $tipo_servicio);
$sentencia->bindParam(':fecha_cita', $fecha_cita);
$sentencia->bindParam(':hora_cita', $hora_cita);
$sentencia->bindParam(':title', $title);
$sentencia->bindParam(':start', $start);
$sentencia->bindParam(':end', $end);
$sentencia->bindParam(':color', $color);
$sentencia->bindParam('fyh_creacion', $fechaHora);


if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Se registró tu cita";
    $_SESSION['icono'] = 'success';
    header('Location:' . $URL . '/reservar.php');
    exit(); // Siempre coloca exit() después de una redirección
} else {
    session_start();
    $_SESSION['mensaje'] = "Error, no se pudo registrar tu cita";
    $_SESSION['icono'] = 'error';
    header('Location:' . $URL . '/reservar.php');  
    exit(); // Siempre coloca exit() después de una redirección
}
?>