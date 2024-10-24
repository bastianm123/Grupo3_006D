<?php
include('../../config.php');

$id_usuario = $_POST['id_usuario'];
$nombre_completo = $_POST['nombre_completo'];

$password = $_POST['password'];
$password_verify = $_POST['password_verify'];
$cargo = $_POST['cargo'];

if ($password == "") {
    $sentencia = $pdo->prepare("UPDATE usuarios SET nombre_completo=:nombre_completo, cargo=:cargo, fyh_actualizacion=:fyh_actualizacion WHERE id = :id_usuario");
    $sentencia->bindParam('nombre_completo', $nombre_completo);
    $sentencia->bindParam('cargo', $cargo);
    $sentencia->bindParam('fyh_actualizacion', $fechaHora);
    $sentencia->bindParam('id_usuario', $id_usuario);
    if ($sentencia->execute()) {
        session_start();
        $_SESSION['mensaje'] = "Se actualizo el usuario";
        $_SESSION['icono'] = "success";
        header('Location: ' . $URL . '/admin/usuarios/');
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error al actualizar";
        $_SESSION['icono'] = "error";
        header('Location: ' . $URL . '/admin/usuarios/update.php?id_usuario=' . $id_usuario);
    }
}

if ($password == $password_verify) {
    
    $password = password_hash($password, PASSWORD_DEFAULT);

    $sentencia = $pdo->prepare("UPDATE usuarios SET nombre_completo=:nombre_completo, password=:password, cargo=:cargo, fyh_actualizacion=:fyh_actualizacion WHERE id = :id_usuario");

    $sentencia->bindParam('nombre_completo', $nombre_completo);
    $sentencia->bindParam('password', $password);
    $sentencia->bindParam('cargo', $cargo);
    $sentencia->bindParam('fyh_actualizacion', $fechaHora);
    $sentencia->bindParam('id_usuario', $id_usuario);
    if ($sentencia->execute()) {
        session_start();
        $_SESSION['mensaje'] = "Se actualizo el usuario";
        $_SESSION['icono'] = "success";
        header('Location: ' . $URL . '/admin/usuarios/');
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error al actualizar";
        $_SESSION['icono'] = "error";
        header('Location: ' . $URL . '/admin/usuarios/update.php?id_usuario=' . $id_usuario);
    }
} else {
    session_start();
    $_SESSION['mensaje'] = "Las contrasenas no son iguales";
    $_SESSION['icono'] = "error";
    header('Location: ' . $URL . '/admin/usuarios/update.php?id_usuario=' . $id_usuario);
}
