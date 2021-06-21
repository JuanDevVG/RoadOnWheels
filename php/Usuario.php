<?php

class Usuario {
    private $username;
    private $password;

    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }

    public function existeUsuario() {
        require 'connectdb.php';
        $sql = "SELECT nomUsuario, contraseña FROM usuarios WHERE nomUsuario = :username && contraseña = :password";
        $sta = $conn->prepare($sql);
        $sta->bindParam(':username', $this->username);
        $sta->bindParam(':password', $this->password);
        $sta->execute();
        $datosUsuario = $sta->fetch(PDO::FETCH_ASSOC);

        if ($datosUsuario && $this->username == $datosUsuario['nomUsuario'] && $this->password == $datosUsuario['contraseña']){
            $respuesta = true;
        } else {
            $respuesta = false;
        }
        return $respuesta;
    }

}