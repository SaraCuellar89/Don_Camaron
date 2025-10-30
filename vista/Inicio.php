<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="./bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <script src="./bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="./Js/jquery-3.7.1.min.js"></script>
</head>
<body>
    <style>
        body{
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
    </style>
    
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
                           <li class="nav-item"><a class="nav-link" href="./reservas.php">Reservas</a></li>
                           <li class="nav-item"><a class="nav-link active" href="#">Ordena Online</a></li>
                           <li class="nav-item"><a class="nav-link" href="./Inicio_sesion.php">Inicio de sesion</a></li>
                            <li class="nav-item"><a class="nav-link" href="./perfil.php">Perfil</a></li>
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
                        <li class="nav-item"><a class="nav-link active" href="#">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="./menu_online.php">Menú</a></li>
                        <li class="nav-item"><a class="nav-link" href="./carrito.php">Carrito</a></li>
                        <li class="nav-item"><a class="nav-link" href="./historial.php">Historial de Pedidos</a></li>
                        <li class="nav-item" id="bot_per"><a class="nav-link" href="#">Perfil</a></li>
                    </ul>
                </div>
            </div>
            </nav>
    
            
            
            <!-- Perfil -->
            <div id="perfil" class="container bg-light" style="display: none; border-radius: 30px; border: solid 2px rgb(130, 131, 134);">
                <div class="d-flex" style=" align-items: center; gap: 50px; padding: 20px;">
                    <img class="rounded-pill" src="./img/perfil.png" alt="perfil" style="width: 120px;">
                    <div>
                        <h2>Roberto Gomez</h2>
                        <hr>
                        <p>Usuario antiguo</p>
                    </div>
                </div>
            </div>
    
            <script>
               $(document).ready(function(){
                            var x=document.getElementById("bot_per")
                        x.addEventListener("click", guardar)
                        })
    
                        function guardar(){
                            $("#perfil").toggle(1000)
                        }
            </script>



        <!-- Cuerpo -->

        <div class="container" style="margin-bottom: 50px;">
            <div style="background-color: aliceblue; padding: 20px; margin-top: 50px; border-radius: 20px; border: dashed 6px rgb(110, 135, 143);">
                <h1 class="h1 text-center">¡Entra Ya!</h1>
                <h2 class="h2 text-center">Y</h2>
                <h1 class="h1 text-center">¡Disfruta de nuestros servicios online!</h1>
            </div>
            <img class="mx-auto d-block" src="./img/slogan.png" alt="eslogan" style="filter: drop-shadow(10px 10px 10px black);">
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