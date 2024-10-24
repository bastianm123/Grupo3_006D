<?php
include('../../config.php');

$nombre_completo = $_POST['nombre_completo'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_verify = $_POST['password_verify'];
$cargo = $_POST['cargo'];

$contador = 0;
$sql = "SELECT * FROM usuarios WHERE email = '$email'";
$query = $pdo->prepare($sql);
$query->execute();
$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($usuarios as $usuario) {
    $contador = $contador + 1;
}
if ($contador > 0) {
    session_start();
    $_SESSION['mensaje'] = "El email" . $email . " ya esta registrado ";
    $_SESSION['icono'] = 'error';
    header('Location: ' . $URL . '/admin/usuarios/create.php');
} else {
    echo "Es nuevo";
    if ($password == $password_verify) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sentencia = $pdo->prepare("INSERT INTO usuarios (nombre_completo,email,password,cargo,fyh_creacion) VALUES (:nombre_completo,:email,:password,:cargo,:fyh_creacion)");
        $sentencia->bindParam('nombre_completo', $nombre_completo);
        $sentencia->bindParam('email', $email);
        $sentencia->bindParam('password', $password);
        $sentencia->bindParam('cargo', $cargo);
        $sentencia->bindParam('fyh_creacion', $fechaHora);
        if ($sentencia->execute()) {
            session_start();
            $_SESSION['mensaje'] = "Registrado Correctamente ";
            $_SESSION['icono'] = 'success';
            header('Location: ' . $URL . '/admin/usuarios');
        } else {
            session_start();
            $_SESSION['mensaje'] = "No se pudo registrar";
            $_SESSION['icono'] = 'error';
            header('Location: ' . $URL . '/admin/usuarios/create.php');
        }
    } else {
        session_start();
        $_SESSION['mensaje'] = "Las contrasenas no son iguales";
        $_SESSION['icono'] = 'error';
        header('Location: ' . $URL . '/admin/usuarios/create.php');
    }
}
