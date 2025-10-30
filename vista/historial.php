<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurante</title>
    <link rel="stylesheet" href="./bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <script src="./bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="./Js/jquery-3.7.1.min.js"></script>
</head>
<style> 
    body{
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
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
                    <li class="nav-item"><a class="nav-link active" href="">Perfil</a></li>
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
                    <li class="nav-item"><a class="nav-link active" href="#">Historial de Pedidos</a></li>
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





    <!-- Historial -->

    <div class="container p-5 my-5 border d-flex" style="background-color:rgba(0, 174, 255, 0.842); opacity: 1; display: block; border-radius: 20px; width: 60%;">
        <div class="p-3">
        <img src="./img/anillos_cama.avif" alt="bogota" style="width: 350px; height: 250px; border-radius: 20px;">
     </div>
     <div>
        <h3 class="ps-5"><b>Anillos de camarón</b></h3>
        <br>
        <p>
            <b>Fecha de compra:</b> 11-03-2025
            <br>
            <br>
            <b>Hora de compra:</b> 11:59
            <br>
            <br>
            <b>Precio:</b> $50.000
        </p>
    </div>
    </div>

    <div class="container p-5 my-5 border d-flex" style="background-color:rgba(0, 174, 255, 0.842); opacity: 1; display: block; border-radius: 20px; width: 60%">
        <div class="p-3">
        <img src="./img/ceviche_mixto.avif" alt="bogota" style="width: 350px; height: 250px; border-radius: 20px;">
     </div>
     <div>
        <h3 class="ps-5"><b>Ceviche Mixto</b></h3>
        <br>
        <p>
            <b>Fecha de compra:</b> 01-03-2025
            <br>
            <br>
            <b>Hora de compra:</b> 13:45
            <br>
            <br>
            <b>Precio:</b> $24.900
        </p>
    </div>
    </div>

    <div class="container p-5 my-5 border d-flex" style="background-color:rgba(0, 174, 255, 0.842); opacity: 1; display: block; border-radius: 20px; width: 60%">
        <div class="p-3">
        <img src="./img/limo_cere.webp" alt="" style="width: 350px; height: 250px; border-radius: 20px;">
     </div>
     <div>
        <h3 class="ps-5"><b>Limonada Cerezada</b></h3>
        <br>
        <p>
            <b>Fecha de compra:</b> 24-01-2025
            <br>
            <br>
            <b>Hora de compra:</b> 17:46
            <br>
            <br>
            <b>Precio:</b> $7.700
        </p>
    </div>
    </div>


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

</body>
</html>