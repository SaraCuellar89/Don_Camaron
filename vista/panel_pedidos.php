<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Verificar si usuario está logueado
    if (!isset($_SESSION['usuario'])) {
        header("Location: Inicio_sesion.php");
        exit();
    }

    //Obtener las resevas de los clientes
    require_once "../controlador/pedido_controlador.php";
                        
    $pedido_controlador = new Pedido_controlador();
    $lista_pedidos = $pedido_controlador->listar_pedidos();
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
                    <li class="nav-item"><a class="nav-link" href="./panel_sucursal.php">Sucursales</a></li>
                    <li class="nav-item"><a class="nav-link" href="./panel_reservas.php">Reservas</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#">Pedidos</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Formulario de contacto -->
    
    <div class="container mt-3 mb-4">

        <h2 class="text-center mb-4">Pedidos</h2>

        <div class="text-center m-3">
            <a href="../controlador/generar_pdf.php" class="btn btn-danger" target="_blank">
                Descargar PDF
            </a>
        </div>

            <?php
                if (isset($_SESSION['success_message'])) {
                    echo '<div class="alert alert-success">Pedido Cancelado o Editado</div>';
                    unset($_SESSION['success_message']);
                }
            ?>

        <?php
            if (empty($lista_pedidos)) {
                echo '
                    <h2 class="text-center mb-4">No hay Pedidos</h2>
                ';
                return; 
            }

            foreach($lista_pedidos as $p){

                $deshabilitar = $p['estado'] === 'Entregado' ? 'disabled' : '';

                echo '
                    <div class="card shadow p-4">
                        <h2>Pedido: '.$p['codigo'].'</h2> 
                        <h4>Fecha: '.$p['fecha'].'</h4>
                        <h4>Estado: '.$p['estado'].'</h4>

                        <hr>

                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <button class="btn btn-info" onclick="Mostrar('.$p['id_pedido'].')">Ver más</button>
                            </div>
                        </div>

                        <hr>

                        <div id="masInfo_'.$p['id_pedido'].'"  style="display:none;">
                            <h4>Datos Usuario</h4>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Telefono</th>
                                    <th>Direccion</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>'.$p['nombres'].'</td>
                                        <td>'.$p['Correo'].'</td>
                                        <td>'.$p['telefono'].'</td>
                                        <td>'.$p['direccion'].'</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row justify-content-center">

                            <form class="col-auto" method="POST" action="../controlador/acciones_pedido.php?accion=editar_esta_entregado"
                                onsubmit="return editar_estado(\''.$p['id_pedido'].'\', \''.addslashes($p['nombres']).'\')">

                                <input type="hidden" name="id_pedido" value="'.$p['id_pedido'].'">

                                <button type="submit" class="btn btn-success" '.$deshabilitar.'>Entregado</button>
                            </form>

                            <form class="col-auto" method="POST" action="../controlador/acciones_pedido.php?accion=eliminar"
                                onsubmit="return eliminarReserva(\''.$p['id_pedido'].'\', \''.addslashes($p['nombres']).'\')">

                                <input type="hidden" name="id_pedido" value="'.$p['id_pedido'].'">

                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>
                    </div>
                    <br>
                ';
            }

            echo '
                <script>
                    function eliminarReserva(id_pedido, nombre) {
                        return confirm(`¿Estás seguro de cancelar el pedido de ${nombre}?`);
                    }

                    function editar_estado(id_pedido, nombre) {
                        return confirm(`¿Estás seguro de editar el pedido de ${nombre}?`);
                    }
                </script>
            '
        ?>
    </div>

    <script>
        function Mostrar(id_reserva) {
            const div = document.getElementById('masInfo_' + id_reserva);
            div.style.display = div.style.display === 'none' ? 'block' : 'none';
        }
    </script>


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