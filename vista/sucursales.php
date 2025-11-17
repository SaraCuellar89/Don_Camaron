<?php
    session_start();

    // Verificar si usuario está logueado
    if (isset($_SESSION['usuario'])) {
        // Obtener datos del usuario desde sesión
        $usuario = $_SESSION['usuario'];
        $rol = isset($usuario['rol']) ? $usuario['rol'] : 'Rol no disponible';
    }

    require_once "../controlador/sucursal_controlador.php";
                        
    $sucursal_controlador = new Sucursal_controlador();
    $lista_sucursal = $sucursal_controlador->listar_sucursales();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre nosotros</title>
    <link rel="stylesheet" href="./bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<style> 
    body{
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }
</style>
<body>

    <!-- Fondo -->
    <img id="fondo" src="./img/fondo.jpg" alt="Fondo del menú" class="w-100">

    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg bg-info navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="./img/doncamaron.png" alt="logo" style="width: 150px;" class="rounded-pill">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="../index.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="./menu.php">Menú</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#">Sucursales</a></li>
                    <li class="nav-item"><a class="nav-link" href="./Inicio_sesion.php">Inicio de sesion</a></li>
                    <?php
                        if(isset($usuario) && isset($usuario['rol']) && $usuario['rol'] === 'Administrador'){
                            echo '
                                <li class="nav-item"><a class="nav-link" href="./perfil_admin.php">Perfil</a></li>
                            ';
                        }
                        else{
                            echo '
                                <li class="nav-item"><a class="nav-link" href="./perfil.php">Perfil</a></li>
                            ';
                        }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

   
    <!-- Tarjetas del Menú -->
    <div class="container mt-4">
        <h1 class="text-center mb-4">Sucursales</h1>
        <div class="row justify-content-center">
            <?php
                foreach ($lista_sucursal as $s) {
                    echo '
                        <!-- Tarjeta sucursal -->
                        <div class="col-md-8 mb-4">
                            <div class="card d-flex flex-row align-items-stretch shadow-sm" 
                                style="max-width: 900px; margin: 0 auto; border-radius: 10px; overflow: hidden;">
                                
                                <!-- Imagen -->
                                <div style="flex: 1;">
                                    <img class="img-fluid" 
                                        src="../uploads/' . htmlspecialchars($s['imagen']) . '" 
                                        alt="Imagen de sucursal" 
                                        style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                                
                                <!-- Contenido -->
                                <div class="card-body text-center d-flex flex-column justify-content-center" 
                                    style="flex: 1.2; padding: 30px;">
                                    <h4 class="card-title mb-2">' . htmlspecialchars($s['nombre']) . '</h4>
                                    <h5 class="text-primary mb-3">' . htmlspecialchars($s['direccion']) . '</h5>
                                    <a href="./mesas.php?id_sucursal=' . htmlspecialchars($s['id_sucursal']) . '" 
                                        class="btn btn-info w-50 mx-auto">Reservar</a>
                                </div>
                            </div>
                        </div>
                    ';
                    }
                ?>
        </div>
    </div>


    <!-- Footer -->

<footer class="text-center footer-style"  style="border: solid lightcyan; border-style: double; border-radius: 20px; border-width: 7px; background:rgba(0, 191, 255, 0.5);">
  <div class="container">
    <div class="row">
   
   <div class="col-md-4 footer-col">
   <h4><b>Contacto</b></h4>
   <p>
      <b>Correo:</b> donkamaronmariscos@restaurante.com
      <br>      
      <br>
      <b>Celular:</b> 316 4020478 
      <br>
      <br>
      <b>Número telefónico:</b> (061) 01001 678594
   </p>
    </div>

    <div class="col-md-4 footer-col">
        <h4><b>Punto de venta</b></h4>
        <p>
            <b>Bogotá</b> Cra. 7 #158 - 03
            <br>
            <br>
            <b>Lunes - Viernes:</b> 7am - 4pm
            <br>
            <br>
            <b>Sábado:</b> 7am - 2pm
        </p>
    </div>

    <div class="col-md-4 footer-col">
        <h4><b>Nuestras redes</b></h4>
        <ul class="list-inline d-flex" style="justify-content: center; align-items: center; padding: 10px;">
            <li>
                <img src="../vista/img/feis.png"  type="button" title="www.facebook.com" alt="feis" style="width: 80px; margin-right: 10px;">
            </li>
            <li>
                <img src="../vista/img/insta.png" type="button" title="www.instagram.com" alt="insta" style="width: 80px; margin-left: 10px; margin-right: 10px;">
            </li>
            <li>
                <img src="../vista/img/wasat.png" type="button" title="wwww.wa.me.325346.com" alt="wasat" style="width: 80px; margin-left: 10px;">
            </li>
        </ul>
    </div>
</footer>
       </div>
      </div>

      <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>

<script src="./bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>