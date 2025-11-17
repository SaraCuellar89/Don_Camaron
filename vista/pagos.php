<?php
  $total = $_GET['total'];

  session_start();

    // Verificar si usuario está logueado
    if (isset($_SESSION['usuario'])) {
        // Obtener datos del usuario desde sesión
        $usuario = $_SESSION['usuario'];
        $rol = isset($usuario['rol']) ? $usuario['rol'] : 'Rol no disponible';
        $id_usuario = isset($usuario['id_usuario']) ? $usuario['id_usuario'] : 'ID no disponible';
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas</title>
    <link rel="stylesheet" href="./bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <script src="./bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="./Js/jquery-3.7.1.min.js"></script>
</head>
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
                    <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="../index.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="./menu.php">Menú</a></li>
                    <li class="nav-item"><a class="nav-link" href="./sucursales.php">Sucursales</a></li>
                    <li class="nav-item"><a class="nav-link" href="./Inicio_sesion.php">Inicio de sesion</a></li>
                    <li class="nav-item"><a class="nav-link active" href="">Perfil</a></li>
                   </ul>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Formulario de compra -->
    
    <div class="container mx-auto d-block" style="margin: 50px; display: flex; justify-content: center; align-items: center;">
        <div class="mx-auto d-block" style="width: 70%;">
            <div class="row">

                <!-- Detos del compra -->
                <div class="col-md">
                    <div class="card shadow p-4">
                        <h2 class="text-center mb-4">Datos de compra</h2>

                        <?php
                            $visible = false;

                            if (isset($_SESSION['success_message'])) {
                                echo '<div class="alert alert-success"><a href="./historial.php">Ver Pedidos</a></div>';
                                unset($_SESSION['success_message']);
                                $visible = true;
                            }
                        ?>

                        <form action="../controlador/acciones_pedido.php?accion=crear" method="POST">

                            <input type="text" name="id_usuario" id="id_usuario" value="<?php echo $id_usuario; ?>" hidden>

                            <div class="modal-body">
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th>Total de la compra</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td class="fw-bold text-success fs-4">
                                            $<?php echo number_format($total, 0, ',', '.'); ?>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
            
                                  <table class="table">
                                    <thead>
                                      <tr>
                                        <th>Pago</th>
                                        <th></th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td><input type="radio" name="opcion" value="opcion1">Contra entrega</td>
                                        <td><input type="radio" name="opcion" value="opcion2" id="op1">Pagar online</td>
                                      </tr>
                                    </tbody>
                                  </table>

                                  <script>
                                        $(document).ready(function(){
                                            var co=document.getElementById("op1")
                                        co.addEventListener("click", esconder)
                                        })

                                        function esconder(){
                                            $(".forma_pago").toggle(500)
                                        }
                                  </script>

                                  <table class="table forma_pago" style="display: none;">
                                    <thead>
                                      <tr>
                                        <th>Tarjeta</th>
                                        <th></th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr class="d-flex">
                                        <td><input type="radio" name="opcion" value="opcion1">Debito</td>
                                        <td><input type="radio" name="opcion" value="opcion2">De credito</td>
                                      </tr>
                                    </tbody>
                                  </table>

                                  <table class="table forma_pago" style="display: none;">
                                    <thead>
                                      <tr>
                                        <th>Otros metodos de pago</th>
                                        <th></th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr class="d-flex">
                                        <td><input type="radio" name="opcion" value="opcion1">PayPal</td>
                                        <td><input type="radio" name="opcion" value="opcion2">Apple Pay</td>
                                        <td><input type="radio" name="opcion" value="opcion2">Google Pay</td>
                                      </tr>
                                    </tbody>
                                  </table>
                            </div>

                            <div class="mb-3">
                                <label for="direccion" class="form-label">Direccion de Entrega:</label>
                                <input type="text" class="form-control" id="direccion" placeholder="Ingrese una direccion" name="direccion" required>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-auto">
                                  <?php if(!$visible): ?>
                                      <button type="button" id="btnFinal" class="btn btn-info">Final Compra</button>
                                      <button type="button" class="btn btn-danger" onclick='return confirmar()'>Cancelar</button>
                                  <?php else: ?>
                                      <button type="button" id="btnFinal" class="btn btn-info" disabled>Final Compra</button>
                                  <?php endif; ?>
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div> 
        </div>   
    </div>
        
    
         

        <!-- Modal de boton de reserva -->
    <div class="modal" id="myModal">
    <div class="modal-dialog mx-auto d-block">
      <div class="modal-content">
  
        <div class="modal-header">
          <h4 class="modal-title">Compra exitosa</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
          Le llegara un correo de confirmación.
          <hr>
          ¡Gracias por confiar en nosotros!
        </div>
  
      </div>
    </div>
    </div>


    <script>
      document.getElementById('btnFinal').addEventListener('click', function(e) {

          const direccion = document.getElementById('direccion').value.trim();

          // Validación direccion
          if (direccion === "") {
              alert("Por favor ingresa una dirección");
              return;
    }
          // Mostrar modal
          var modal = new bootstrap.Modal(document.getElementById('myModal'));
          modal.show();

          setTimeout(() => {
              document.querySelector('form').submit();
          }, 2000);
      });
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

</body>
</html>