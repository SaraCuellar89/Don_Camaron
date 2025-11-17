<?php

require_once "../controlador/usuario_controlador.php";

$usuario_controlador = new Usuario_controlador();
$id_usuario = $_GET['id_usuario'];
$usuario = $usuario_controlador->obtener_usuario_id($id_usuario);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
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
                    <li class="nav-item"><a class="nav-link" href="./sucursal.php">Sucursales</a></li>
                    <li class="nav-item"><a class="nav-link" href="./Inicio_sesion.php">Inicio de sesion</a></li>
                    <li class="nav-item"><a class="nav-link active" href="./perfil.php">Perfil</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Formulario de registro -->
    <div class="container contact-container">
        <div class="card shadow p-4">
            <h2 class="text-center mb-4">Editar Usuario</h2>

            <?php
                if (isset($_SESSION['success_message'])) {
                    echo '<div class="alert alert-success">Informacion actualizada correctamente - <a href="./perfil.php">Ir a tu Perfil</a></div>';
                    unset($_SESSION['success_message']);
                }
            ?>

            <form action="../controlador/acciones_usuario.php?accion=editar" method="POST">
                <input type='hidden' name='id_usuario' value="<?php echo $usuario[0]['id_usuario']; ?>">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" placeholder="Ingrese un nombre" name="nombre" value="<?php echo $usuario[0]['nombres']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="documento" class="form-label">Documento:</label>
                    <input type="number" class="form-control" id="documento" placeholder="Ingrese su documento" name="documento" value="<?php echo $usuario[0]['documento']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="rol" class="form-label">Rol:</label>
                    <select name="rol" id="rol" class="form-control" required>
                        <option value="" hidden>Seleccionar</option>
                        <option value="Cliente" <?php if($usuario[0]['rol'] == 'Cliente') echo 'selected'; ?>>Cliente</option>
                        <option value="Admin" <?php if($usuario[0]['rol'] == 'Admin') echo 'selected'; ?>>Administrador</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo:</label>
                    <input type="email" class="form-control" id="correo" placeholder="Ingrese su correo" name="correo" value="<?php echo $usuario[0]['Correo']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="contrasena" class="form-label">Contraseña:</label>
                    <input type="password" class="form-control" id="contrasena" placeholder="Ingrese la contraseña" name="contrasena" value="<?php echo $usuario[0]['contrasena']; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="telefono" class="form-label">Telefono:</label>
                    <input type="number" class="form-control" id="telefono" placeholder="Ingrese el telefono" name="telefono" value="<?php echo $usuario[0]['telefono']; ?>" required>
                </div>

                <button type="submit" onclick="return confirmar_edicion()" class="btn btn-info w-100">Editar</button>
                <button type="button" onclick="cancelar_edicion()" class="btn btn-danger w-100">Cancelar</button>

                <?php
                    echo '
                        <script>
                            function cancelar_edicion() {
                                var confirmar = confirm("¿Estás seguro de quieres dejar de editar?")

                                if(!confirmar) return
                                
                                window.location.href = "./perfil.php";
                            }

                            function confirmar_edicion() {
                                return confirm("¿Estás seguro de quieres editar este usuario?");
                            }
                        </script>
                    '
                ?>

            </form>
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
      

<script src="./bootstrap-5.0.2-dist/js/bootstrap.bundle.js"></script>
</body>
</html>
