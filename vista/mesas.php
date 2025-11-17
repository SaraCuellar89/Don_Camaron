<?php
    session_start();

    // Verificar si usuario está logueado
    if (isset($_SESSION['usuario'])) {
        // Obtener datos del usuario desde sesión
        $usuario = $_SESSION['usuario'];
        $rol = isset($usuario['rol']) ? $usuario['rol'] : 'Rol no disponible';
    }
    else{
        echo "
            <script>
                alert('No has iniciado sesion')
                window.location.href = '../vista/sucursales.php'
            </script>
        ";
        return;
    }


    $id_sucursal = $_GET['id_sucursal'];
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
    

   
    <!-- Mesas -->
     <div class="contenedor_mesas">
        <h1>Seleccione su mesa</h1>
        <div id="caja_mesas"></div>

        <button class="boton_siguiente" onclick="Finalizar_Seleccion()">Siguiente</button>
     </div>

    <script>

        const id_sucursal = <?= json_encode($id_sucursal) ?>;
        const caja = document.getElementById("caja_mesas");
        const mesas_seleccionadas = [];   // mesas que el usuario elige ahora
        let mesasBD = [];                 // mesas ya guardadas en BD

        mesasBD = [];

        // 1. Traer mesas que están en la BD
        fetch(`../controlador/acciones_mesas.php?accion=listar&id_sucursal=${id_sucursal}&t=${Date.now()}`)
        .then(res => res.json())
        .then(data => {
            console.log("MESAS ACTUALES:", data);
            mesasBD = data.map(m => Number(m.numero_mesa));
            cargarMesas();
        });


        // 2. Generar las 30 mesas y marcar las que están en BD
        function cargarMesas() {

            let html = "";

            for (let i = 1; i <= 30; i++) {
                const estaEnBD = mesasBD.includes(i);

                html += `
                    <div 
                        class="mesas ${estaEnBD ? 'ocupada' : ''}" 
                        onclick="Seleccionar(this, ${i}, ${estaEnBD})"
                    >
                        ${i}
                    </div>
                `;
            }

            caja.innerHTML = html;
        }


        function Seleccionar(div, numero, estaEnBD) {

            // No permitir seleccionar mesas ya registradas en BD
            if (estaEnBD) {
                alert("Esta mesa ya fue reservada.");
                return;
            }

            div.classList.toggle("seleccionada");

            if (div.classList.contains("seleccionada")) {
                mesas_seleccionadas.push(numero);
            } else {
                const index = mesas_seleccionadas.indexOf(numero);
                if (index > -1) mesas_seleccionadas.splice(index, 1);
            }
        }


        function Finalizar_Seleccion() {

            if (mesas_seleccionadas.length === 0) {
                alert("Seleccione al menos una mesa");
                return;
            }

            const mesasStr = mesas_seleccionadas.join(",");

            window.location.href =
                "../vista/reservas.php?id_sucursal=" + id_sucursal +
                "&mesas=" + encodeURIComponent(mesasStr);
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