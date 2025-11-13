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
    

   
    <!-- Mesas -->
     <div class="contenedor_mesas">
        <h1>Seleccione su mesa</h1>
        <div id="caja_mesas">
            <div class="mesas"></div>
        </div>

        <button class="boton_siguiente" onclick="Finalizar_Seleccion()">Siguiente</button>
     </div>

     <script>
        const array_mesas = []

        for(let i = 0; i<30; i++){
            array_mesas.push(i+1)
        }

        const caja_mesas = document.getElementById('caja_mesas')

        caja_mesas.innerHTML = array_mesas.map(m => `
            <div class="mesas" onclick="Seleccionar(this, ${m})">${m}</div>
        `).join('')

        
        const mesas_seleccionadas = []

        function Seleccionar(mesa, id_mesa) {
            mesa.classList.toggle('seleccionada');

            if (mesa.classList.contains('seleccionada')) {
                // Si está seleccionada, agregar al array
                mesas_seleccionadas.push(id_mesa);
            } else {
                // Si se deseleccionó, quitar del array
                const index = mesas_seleccionadas.indexOf(id_mesa);
                if (index > -1) {
                    mesas_seleccionadas.splice(index, 1);
                }
            }
        }

        function Finalizar_Seleccion(){
            console.log(mesas_seleccionadas)
        }

     </script>

     


    <!-- Footer -->

    <footer class="text-center footer-style py-2"  style="border: solid lightcyan; border-style: double; border-radius: 20px; border-width: 7px; background:rgba(0, 162, 255, 0.712);">
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
                      <img src="./img/feis.png"  type="button" class="btn btn-primary" data-bs-toggle="tooltip" title="www.facebook.com" alt="feis" style="width: 80px; margin-right: 10px;">
                  </li>
                  <li>
                      <img src="./img/insta.png" type="button" class="btn btn-primary" data-bs-toggle="tooltip" title="www.instagram.com" alt="insta" style="width: 80px; margin-left: 10px; margin-right: 10px;">
                  </li>
                  <li>
                      <img src="./img/wasat.png" type="button" class="btn btn-primary" data-bs-toggle="tooltip" title="wwww.wa.me.325346.com" alt="wasat" style="width: 80px; margin-left: 10px;">
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