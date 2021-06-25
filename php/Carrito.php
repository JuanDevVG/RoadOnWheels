<?php 

class Carrito {
    // private $infoCarrito = array();
    
    // public function __construct (){
         
    // }

    public function consultarPorPlaca($placa){
        require 'connectdb.php';
        $sql = "SELECT * FROM carritos WHERE Placa = :placa";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':placa', $placa);
        $stmt->execute();
        $datosCarrito = $stmt->fetch(PDO::FETCH_ASSOC);

        return $datosCarrito;
    }
    public function consultarTodo(){
        require 'connectdb.php';
        $sql = "SELECT * FROM carritos";
        $stmt = $conn->prepare($sql);
        $stmt->execute(); 
        
        return $stmt;
    }
}
