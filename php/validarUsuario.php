<?php
require 'Usuario.php';

if (!empty($_POST['username']) && !empty($_POST['password'])) {
    
    $usuario = new Usuario($_POST['username'], $_POST['password']);
    
    if ($usuario->existeUsuario()) {
        header('Location: ../catalogo.php');
    } else {
        header('Location: ../index.html');
    }
} else {
    header('Location: ../index.html');
}

