<?php
    session_start();

    // Verificar si usuario está logueado
    if (isset($_SESSION['usuario'])) {
        // Obtener datos del usuario desde sesión
        $usuario = $_SESSION['usuario'];
        $rol = isset($usuario['rol']) ? $usuario['rol'] : 'Rol no disponible';
        $id_usuario = isset($usuario['id_usuario']) ? $usuario['id_usuario'] : 'ID no disponible';
    }

    $mesasStr = $_GET['mesas'];
    $id_sucursal = $_GET['id_sucursal'];

    // Convertimos el string en un array
    $mesasSeleccionadas = explode(',', $mesasStr);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas</title>
    <link rel="stylesheet" href="./bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <script src="./bootstrap-5.0.2-dist/js/bootstrap.bundle.js"></script>
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
                    <li class="nav-item"><a class="nav-link active" href="./sucursales.php">Sucursales</a></li>
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

    <!-- Formulario de Reserva -->
    
    <div style="margin: 50px;">
        <div class="container">
            <div class="row">

                <!-- Datos de la reserva -->
                <div class="col-md">
                    <div class="card shadow p-4">
                        <h2 class="text-center mb-4">Datos de reserva</h2>

                        <?php
                            $visible = false;

                            if (isset($_SESSION['success_message'])) {
                                echo '<div class="alert alert-success">Reserva creada - <a href="./reservas_cliente.php">Ver Reserva</a></div>';
                                unset($_SESSION['success_message']);
                                $visible = true;
                            }
                        ?>

                        <form action="../controlador/acciones_reserva.php?accion=crear" method="POST">
                            <div class="mb-3">
                                <label for="fecha" class="form-label">Fecha:</label>
                                <input type="date" class="form-control" id="fecha" name="fecha" required min="<?php echo date('Y-m-d'); ?>">
                            </div>
                            <div class="mb-3">
                                <label for="hora" class="form-label">Hora:</label>
                                <input type="time" class="form-control" id="hora" name="hora" required min="09:00" max="21:00">
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">
                                    Recordarme
                                </label>
                            </div>

                            <input type="text" name="id_usuario" id="id_usuario" value="<?php echo $id_usuario; ?>" hidden>
                            <input type="text" name="id_sucursal" id="id_sucursal" value="<?php echo $id_sucursal ?>" hidden>
                            <?php foreach($mesasSeleccionadas as $mesa): ?>
                                <input type="hidden" name="mesas[]" value="<?php echo $mesa; ?>">
                            <?php endforeach; ?>

                            <?php if(!$visible): ?>
                                <button type="submit" class="btn btn-info w-100">Reservar</button>
                                <a href="sucursales.php" class="btn btn-danger w-100">Cancelar</a>
                            <?php else: ?>
                                <button type="submit" class="btn btn-info w-100" disabled>Reservar</button>
                            <?php endif; ?>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <!-- Modal de boton de reserva -->
    <div class="modal" id="myModal">
    <div class="modal-dialog mx-auto d-block">
      <div class="modal-content">
  
        <div class="modal-header">
          <h4 class="modal-title">Reserva exitosa</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
          Le llegara un correo de confirmación.
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
        </div>
  
      </div>
    </div>
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

</body>
</html>