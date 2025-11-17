<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Verificar si usuario está logueado
    if (!isset($_SESSION['usuario'])) {
        header("Location: Inicio_sesion.php");
        exit();
    }

    $usuario = $_SESSION['usuario'];
    $id_usuario = isset($usuario['id_usuario']) ? $usuario['id_usuario'] : 'ID no disponible';

    //Obtener las resevas de los clientes
    require_once "../controlador/reservas_controlador.php";
                        
    $reservas_controlador = new Reservas_controlador();
    $lista_reservas = $reservas_controlador->listar_reservas_usuario($id_usuario);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="./bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<style> 
    body {
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }
    .contact-container {
        max-width: 600px;
        margin: 50px auto;
    }

</style>
<body>
    <!-- Fondo -->
   
    <img id="fondo" src="./img/fondo.jpg" alt="">

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
                    <li class="nav-item"><a class="nav-link" href="./sucursales.php">Sucursales</a></li>
                    <li class="nav-item"><a class="nav-link" href="./Inicio_sesion.php">Inicio de sesion</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#">Perfil</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Segunda barra de navegacion -->        
    <nav class="navbar navbar-expand-lg bg-info navbar-dark" style="margin:10px 20px; border-radius: 20px; border: solid 2px rgb(13, 56, 94);">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav2">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav2">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="./perfil.php">Perfil</a></li>
                    <li class="nav-item"><a class="nav-link" href="./carrito.php">Carrito</a></li>
                    <li class="nav-item"><a class="nav-link" href="./historial.php">Historial de Pedidos</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#">Reservas</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Contenedor con informarcion del usuario -->
    <div class="container contact-container">
        <?php
            if (empty($lista_reservas)) {
                echo '
                    <h2 class="text-center mb-4">No tienes reservas</h2>
                ';
                return; 
            }

            foreach($lista_reservas as $r){
                echo '
                    <div class="card shadow p-4">
                        <h2 class="text-center mb-4">Reserva: '.$r['codigo_reserva'].'</h2>
                        <h4 class="text-center mb-4">Fecha: '.$r['fecha'].'</h4>
                        <h4 class="text-center mb-4">Hora: '.$r['hora'].'</h4>

                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <a href="#" class="btn btn-danger" onclick="eliminarReserva('.$r['id_reserva'].')">Cancelar</a>
                            </div>
                        </div>
                    </div>
                    <br>
                ';
            }

            echo '
                <script>
                    function eliminarReserva(id_reserva) {
                        if (confirm("¿Estás seguro de eliminar esta reserva?")) {
                            window.location.href = "../controlador/acciones_reserva.php?accion=cancelar&id_reserva=" + id_reserva;
                        }
                    }
                </script>
            '
        ?>
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
              <ul class="list-inline d-flex" style="align-items: center; padding: 10px;">
                  <li>
                      <img src="./img/feis.png" class="img-fluid" alt="feis" style="width: 80px; margin-right: 10px;">
                  </li>
                  <li>
                      <img src="./img/insta.png" class="img-fluid" alt="insta" style="width: 80px; margin-left: 10px; margin-right: 10px;">
                  </li>
                  <li>
                      <img src="./img/wasat.png" class="img-fluid" alt="yutu" style="width: 80px; margin-left: 10px;">
                  </li>
              </ul>
          </div>
      </footer>
       </div>
      </div>
      

<script src="./bootstrap-5.0.2-dist/js/bootstrap.bundle.js"></script>
</body>
</html>