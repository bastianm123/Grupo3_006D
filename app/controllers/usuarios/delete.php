<?php
include('../../config.php');

$id_usuario = $_POST['id_usuario'];


$sentencia = $pdo->prepare("DELETE FROM usuarios WHERE id = '$id_usuario'");

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Usuario Eliminado ";
    $_SESSION['icono'] = 'success';
    header('Location: ' . $URL . '/admin/usuarios');
} else {
    session_start();
    $_SESSION['mensaje'] = "No se pudo eliminar ";
    $_SESSION['icono'] = 'error';
    header('Location: ' . $URL . '/admin/usuarios');
}
