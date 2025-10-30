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
                    <li class="nav-item"><a class="nav-link" href="./sobre.php">Sobre nosotros</a></li>
                    <li class="nav-item"><a class="nav-link" href="./contacto.php">Contacto</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#">Reservas</a></li>
                    <li class="nav-item"><a class="nav-link" href="./Inicio.php">Ordena Online</a></li>
                    <li class="nav-item"><a class="nav-link" href="./Inicio_sesion.php">Inicio de sesion</a></li>
                    <li class="nav-item"><a class="nav-link" href="./perfil.php">Perfil</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Formulario de Reserva -->
    
    <div style="margin: 50px;">
        <div class="container">
            <div class="row">

                <!-- Detos del usuario -->
                <div class="col-md">
                    <div class="card shadow p-4">
                        <h2 class="text-center mb-4">Datos de usuario</h2>
                        <form>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" placeholder="Ingrese su nombre" name="nombre" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo:</label>
                                <input type="email" class="form-control" id="email" placeholder="Ingrese su correo" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="tel" class="form-label">Telefono:</label>
                                <input type="tel" class="form-control" id="telefono" placeholder="Ingrese su número telefonico" name="password" required maxlength="10">
                            </div>
                            <div class="mb-3">
                                <label for="mensaje" class="form-label">Mensaje:</label>
                                <textarea class="form-control" rows="5" id="mensaje" name="mensaje" placeholder="Escribe tu mensaje aquí..." required style="height: 100px;"></textarea>
                            </div>
                            <div class="form-check mb-3">
                            </div>
                            <button type="reset" class="btn btn-info w-100">Reset</button>
                        </form>
                    </div>
                </div>
    
                <!-- Datos de la reserva -->
                <div class="col-md">
                    <div class="card shadow p-4">
                        <h2 class="text-center mb-4">Datos de reserva</h2>
                        <form>
                            <div class="mb-3">
                                <label for="date" class="form-label">Fecha:</label>
                                <input type="date" class="form-control" id="fecha" name="date" required>
                            </div>
                            <div class="mb-3">
                                <label for="time" class="form-label">Hora:</label>
                                <input type="time" class="form-control" id="hora" name="time" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Número de personas:</label>
                                <input type="number" class="form-control" id="numero" placeholder="Maximo 10" name="number" required min="1" max="10">
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">
                                    Recordarme
                                </label>
                            </div>
                            <button type="reset" class="btn btn-info w-100">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

         <!-- Reservar -->
            <div class="container" style="width: 20%; margin-top: 40px; margin-bottom: 100px; padding: 30px;">
                <div style="display: flex; justify-content: center;">
                    <button type="button" class="btn btn-primary bg-info text-dark" data-bs-toggle="modal" data-bs-target="#myModal" style="padding: 30px; border-radius: 20px; border: dashed 5px rgb(62, 128, 204);"><h2>Reservar</h2></button>
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