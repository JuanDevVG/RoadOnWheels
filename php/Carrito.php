<?php 

class Carrito {


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

    public function agregarCarrito($datosCarrito){
        require 'connectdb.php';
        $sql = "INSERT INTO carritos VALUES (:placa, :kilometraje, 'Si', '', :estadoVehiculo, :FK_Especificacion, :costoAlquiler, 1)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':placa', $datosCarrito['placa']);
        $stmt->bindParam(':kilometraje', $datosCarrito['kilometraje']);
        $stmt->bindParam(':estadoVehiculo', $datosCarrito['estadoVehiculo']);
        $stmt->bindParam(':FK_Especificacion', $datosCarrito['FK_Especificacion']);
        $stmt->bindParam(':costoAlquiler', $datosCarrito['costoAlquiler']);
        
        if ($stmt->execute()) {
            $mensaje = "Se ha registrado con exito";
        } else {
            $mensaje = "No se pudo registrar";
        } 

        return $mensaje;
    }

    public function consultarEspecificaciones(){
        require 'connectdb.php';
        $sql = "SELECT * FROM especificacion";
        $stmt = $conn->prepare($sql);
        $stmt->execute(); 

        return $stmt;
    }

    public function agregarEspecificacion($datosCarrito){
        require 'connectdb.php';
        $sql = "INSERT INTO especificacion VALUES ('',:color, :cilindraje, :numPasajeros, :modelo, :velocidadMax)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':color', $datosCarrito['color']);
        $stmt->bindParam(':cilindraje', $datosCarrito['cilindraje']);
        $stmt->bindParam(':numPasajeros', $datosCarrito['numPasajeros']);
        $stmt->bindParam(':modelo', $datosCarrito['modelo']);
        $stmt->bindParam(':velocidadMax', $datosCarrito['velocidadMax']);
        if ($stmt->execute()) {
            $mensaje = "Se ha registrado con exito";
        } else {
            $mensaje = "No se pudo registrar";
        } 

        return $mensaje;
    }

    public function consultarUltimaFilaEspecificacion(){
        require 'connectdb.php';
        $sql = "SELECT MAX(Id_Especificacion) as Id_Especificacion FROM especificacion";
        $stmt = $conn->prepare($sql);
        $IdUltimaEspecificacion = $stmt->execute(); 
        $IdUltimaEspecificacion = $stmt->fetch(PDO::FETCH_ASSOC);

        return $IdUltimaEspecificacion;
    }
}
