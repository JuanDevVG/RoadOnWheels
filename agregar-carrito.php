<?php
    require 'php/Carrito.php'; 
    $carrito = new Carrito();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar carrito</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="cabecera">
        <div class="logo">
            <img class="logo__img" src="img/fondo-consultar.jpg" alt="logo pagina">
            <p class="logo__text">Road On Wheels</p>
        </div>
        <h1 class="cabecera__titulo">Agregar Carrito</h1>
        <div class="contenedor__icono-logOut">
            <a href="index.html">
                <div class="caja__icono-logOut">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"><path class="icono-logOut" d="M16 13L16 11 7 11 7 8 2 12 7 16 7 13z"/><path class="icono-logOut" d="M20,3h-9C9.897,3,9,3.897,9,5v4h2V5h9v14h-9v-4H9v4c0,1.103,0.897,2,2,2h9c1.103,0,2-0.897,2-2V5C22,3.897,21.103,3,20,3z"/></svg>
                </div>
            </a>
        </div>
    </header>

    <nav class="navegacion">
        <ul class="navegacion__enlaces contenedor">
            <li>
                <a class="navegacion__enlace" href="catalogo.php">Catalogo</a>
            </li>
            <li>
                <a class="navegacion__enlace" href="consultar.html">Consultar</a>
            </li>
            <li>
                <a class="navegacion__enlace" href="modificar.html">Modificar</a>
            </li>
            <li>
                <a class="navegacion__enlace" href="eliminar.html">Eliminar</a>
            </li>
        </ul>    
    </nav>
    <main class="contenedor carrito-agregar">
        <div class="agregar-carrito">
            <form action="" class="agregar-carrito__form" method="POST">
                <div class="form-modificar__campo">
                    <label class="form-renta__label" for="placa">Placa:</label>
                    <input class="form-renta__input form-renta__input--placa" type="text" name="placa" id="placa" placeholder="Ingrese la placa">
                </div>
                <div class="form-modificar__campo">
                    <label class="form-renta__label" for="costoAlquiler">Costo alquiler:</label>
                    <input class="form-renta__input" type="number" name="costoAlquiler" id="costoAlquiler">
                </div>
                <div class="form-modificar__campo">
                    <label class="form-renta__label" for="imagen">Imagen:</label>
                    <input class="form-renta__input" type="file" name="imagen" id="imagen">
                </div>
                <div class="form-modificar__campo">
                    <label class="form-renta__label">Estado del vehiculo:</label>

                    <select class="form-renta__input" name="estadoVehiculo">
                        <option selected disabled>-- Seleccione Estado --</option>
                        <option>Bueno</option>
                        <option>Regular</option>
                        <option>Malo</option>
                    </select>
                </div>

                <h3 class="info-carrito__subtitulo">Especificaci??n</h3>

                <div class="form-modificar__campo">
                    <label class="info-carrito__label" for="color">Color:</label>
                    <input class="info-carrito__input" type="text" name="color" id="color">
                </div>
                <div class="form-modificar__campo">
                    <label class="info-carrito__label" for="cilindraje">Cilindraje:</label>
                    <input class="info-carrito__input" type="text" name="cilindraje" id="cilindraje">
                </div>
                <div class="form-modificar__campo">
                    <label class="info-carrito__label" for="numeroPasajeros">Numero de pasajeros:</label>
                    <input class="info-carrito__input" type="number" name="numeroPasajeros" id="numeroPasajeros">
                </div>
                <div class="form-modificar__campo">
                    <label class="info-carrito__label" for="modelo">Modelo:</label>
                    <input class="info-carrito__input" type="text" name="modelo" id="modelo">
                </div>
                <div class="form-modificar__campo">
                    <label class="info-carrito__label" for="kilometraje">Kilometraje:</label>
                    <input class="info-carrito__input" type="number" name="kilometraje" id="kilometraje">
                </div>
                <div class="form-modificar__campo">
                    <label class="info-carrito__label" for="velocidadMax">Maxima velociad:</label>
                    <input class="info-carrito__input" type="number" name="velocidadMax" id="velocidadMax">
                </div>
                <div class="info-carrito__campo">
                    <label class="info-carrito__label" for="disponibilidad">Disponibilidad:</label>
                    <div class="info-carrito__campo--disponibilidad">
                        <label for="disponibilidad-si" class="info-carrito__label">Si</label>
                        <input class="info-carrito__input info-carrito__input--radio" type="radio" name="disponibilidad" id="disponibilidad-si" checked>
                        <label for="disponibilidad-no" class="info-carrito__label">No</label>
                        <input class="info-carrito__input info-carrito__input--radio" type="radio" name="disponibilidad" id="disponibilidad-no">
                    </div>
                </div>
                
                <input class="form-renta-modificar__boton" type="submit" id="agregar" name="agregar" value="Agregar">
            </form>
        </div>
    </main>
</body>
</html>
<?php 

if (isset($_POST['agregar']) && !empty($_POST['placa']) && !empty($_POST['costoAlquiler']) && !empty($_POST['imagen']) && !empty($_POST['estadoVehiculo']) && !empty($_POST['color']) && !empty($_POST['cilindraje']) 
            && !empty($_POST['numeroPasajeros'])  && !empty($_POST['modelo']) && !empty($_POST['kilometraje']) && !empty($_POST['velocidadMax']) && !empty($_POST['disponibilidad'])) { 

    $datosCarrito = array("placa"=>$_POST['placa'], "costoAlquiler"=>$_POST['costoAlquiler'], "kilometraje"=>$_POST['kilometraje'], "estadoVehiculo"=>$_POST['estadoVehiculo'], "color"=>$_POST['color'], "cilindraje"=>$_POST['cilindraje'],
                        "numPasajeros"=>$_POST['numeroPasajeros'], "modelo"=>$_POST['modelo'], "velocidadMax"=>$_POST['velocidadMax'], "FK_Especificacion"=>'');

    $datosEspecificaciones = $carrito->consultarEspecificaciones();

    if ($datosEspecificaciones) {
        while ($especificacion = $datosEspecificaciones->fetch(PDO::FETCH_ASSOC)) {
            
            if ($especificacion["Color"] == $datosCarrito["color"] && $especificacion["Cilindraje"] == $datosCarrito["cilindraje"] && $especificacion["numPasajeros"] == $datosCarrito["numPasajeros"] &&
                $especificacion["Modelo"] == $datosCarrito["modelo"] && $especificacion["velocidadMax"] == $datosCarrito["velocidadMax"]) {
                
                $datosCarrito["FK_Especificacion"] = $especificacion["Id_Especificacion"];
            }
        }
        if ($datosCarrito["FK_Especificacion"]=='') {
            $carrito->agregarEspecificacion($datosCarrito);
            $IdUltimaEspecificacion = $carrito->consultarUltimaFilaEspecificacion(); 
            $datosCarrito["FK_Especificacion"] = $IdUltimaEspecificacion["Id_Especificacion"];
        } 
    } else {
        $carrito->agregarEspecificacion($datosCarrito);
        $IdUltimaEspecificacion = $carrito->consultarUltimaFilaEspecificacion(); 
        $datosCarrito["FK_Especificacion"] = $IdUltimaEspecificacion["Id_Especificacion"];
    }
    $carrito->agregarCarrito($datosCarrito);
}

?>