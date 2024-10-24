<?php
include('../../config.php');

$email = $_POST ['email'];
$password = $_POST ['password'];

$sql = "SELECT * FROM usuarios WHERE email = '$email'";
$query = $pdo->prepare($sql);
$query->execute();
$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);

$contador = 0;

foreach ($usuarios as $usuario) {
    $contador = $contador + 1;
    $password_tb = $usuario['password'];
}

$hash = $password_tb;
if (($contador >0) && password_verify($password, $hash)) {
    echo "Bienvenido";
    session_start();
    $_SESSION['sesion_email'] = $email;
    header('Location: ' .$URL);
}else{
    echo "Error";
    header('Location: '.$URL.'/login');
}




?>