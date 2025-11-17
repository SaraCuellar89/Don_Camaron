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
                    <li class="nav-item"><a class="nav-link" href="./sucursales.php">Sucursal</a></li>
                    <li class="nav-item"><a class="nav-link" href="./Inicio_sesion.php">Inicio de sesion</a></li>
                    <li class="nav-item"><a class="nav-link active" href="./perfil.php">Perfil</a></li>
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
                    <li class="nav-item"><a class="nav-link" href="./perfil_admin.php">Perfil</a></li>
                    <li class="nav-item"><a class="nav-link" href="./panel_usuarios.php">Usuarios</a></li>
                    <li class="nav-item"><a class="nav-link" href="./panel_menu.php">Menu</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#">Sucursales</a></li>
                    <li class="nav-item"><a class="nav-link" href="./panel_reservas.php">Reservas</a></li>
                    <li class="nav-item"><a class="nav-link" href="./panel_pedidos.php">Pedidos</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Formulario de contacto -->
    
    <div class="container mt-3 mb-4">
        <div class="card shadow p-4">
            <h2>Sucursal</h2>         
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Imagen</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                    <?php
                        require_once "../controlador/sucursal_controlador.php";
                        
                        $sucursal_controlador = new Sucursal_controlador();
                        $lista_sucursal = $sucursal_controlador->listar_sucursales();

                        foreach($lista_sucursal as $s){
                            echo "
                                <tr>
                                    <td>{$s['id_sucursal']}</td>
                                    <td>{$s['nombre']}</td>
                                    <td>{$s['direccion']}</td>
                                    <td>
                                        <img src='../uploads/{$s['imagen']}' class='img-fluid' alt='' style='width: 80px; height: 80px; object-fit: contain; border-radius: 8px;'>
                                    </td>
                                    <td>
                                        <a href='./editar_sucursal.php?id_sucursal={$s['id_sucursal']}' class='btn btn-info'>Editar</a>
                                    </td>
                                    <td>
                                        <form action='../controlador/acciones_sucursal.php?accion=eliminar'      method='POST' style='display:inline;'>
                                            <input type='hidden' name='id_sucursal' value='{$s['id_sucursal']}'>
                                            <button type='submit' class='btn btn-danger' onclick='return confirmarEliminar()'>Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            ";
                        }

                        echo '
                            <script>
                                function confirmarEliminar() {
                                    return confirm("¿Estás seguro de eliminar esta sucursal?");
                                }
                            </script>
                        ';

                    ?>
                </tbody>
        
            </table>
        </div>
    </div>


    <!-- Formulario de registro de usuarios -->
    <div class="container contact-container">
        <div class="card shadow p-4">
            <h2 class="text-center mb-4">Registrar Sucursal</h2>

            <?php
                if (isset($_SESSION['success_message'])) {
                    echo '<div class="alert alert-success">Sucursal creada</div>';
                    unset($_SESSION['success_message']);
                }
            ?>

            <form action="../controlador/acciones_sucursal.php?accion=crear" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" placeholder="Ingrese el nombre" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="direccion" class="form-label">Direccion:</label>
                    <input type="text" class="form-control" id="direccion" placeholder="Ingrese la direccion" name="direccion" required>
                </div>
                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen:</label>
                    <input type="file" class="form-control" id="imagen" placeholder="Ingrese la imagen" name="imagen" accept="image/*" required>
                </div>
                <button type="submit" class="btn btn-info w-100">Registrar</button>
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