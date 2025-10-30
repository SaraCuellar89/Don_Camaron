<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurante</title>
    <link rel="stylesheet" href="./vista/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./vista/css/style.css">
</head>
<style> 
    body{
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }
</style>
<body>

    <!-- Fondo -->

    <img id="fondo" src="./vista/img/fondo.jpg" alt="">

    <!-- Barra de navegación -->

    <nav class="navbar navbar-expand-lg bg-info navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="./vista/img/doncamaron.png" alt="logo" style="width: 150px;" class="rounded-pill">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="#">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="./vista/menu.php">Menú</a></li>
                    <li class="nav-item"><a class="nav-link" href="./vista/sucursales.php">Sucursales</a></li>
                    <li class="nav-item"><a class="nav-link" href="./vista/Inicio_sesion.php">Inicio de sesion</a></li>
                    <li class="nav-item"><a class="nav-link" href="./vista/perfil.php">Perfil</a></li>
                </ul>
            </div>
        </div>
    </nav>

   <!-- Contenido -->


    <!-- Inicio carrusel -->


    <div class="container" style="padding: 40px;">
    <div id="demo" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
        </div>
        
    
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./vista/img/coso4.jpg" alt="imagen1" data-bs-interval="2000" class="d-block w-100" style="width: 500px; height: 650px;">
            </div>
            <div class="carousel-item">
                <img src="./vista/img/restaurante.jpg" alt="imagen2" data-bs-interval="2000" class="d-block w-100" style="width: 500px; height: 650px;">
            </div>
            <div class="carousel-item">
                <img src="./vista/img/coso1.jpg" alt="imagen3" data-bs-interval="2000" class="d-block w-100" style="width: 500px; height: 650px;">
            </div>
            <div class="carousel-item">
                <img src="./vista/img/restauranteepordos.jpg" alt="imagen4" data-bs-interval="2000" class="d-block w-100" style="width: 500px; height: 650px;">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
          <span class="carousel-control-prev-icon"></span>        
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
          <span class="carousel-control-next-icon"></span>
        </button>
        
    </div>
</div>


    <!-- Tarjetas del Menú -->
    <div class="container mt-4">
        <h2 class="text-center mb-4"><b>¡Menú del día!</b></h2>
        <div class="row justify-content-center">
            <!-- Cazuela de mariscos -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img class="card-img-top" src="./vista/img/cazuela.jpg" alt="Cazuela de mariscos">
                    <div class="card-body text-center">
                        <h4 class="card-title">Cazuela de Mariscos</h4>
                        <h5 class="text-primary">$25.000</h5>
                        <p class="card-text">Delicioso plato que combina mariscos, pescado, mejillones y una exquisita salsa 100% natural de la casa.</p>
                        <a href="./vista/menu_online.php" class="btn btn-info">Comprar online</a>
                    </div>
                </div>
            </div>

            <!-- Ceviche -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img class="card-img-top" src="./vista/img/Ceviche.jpg" alt="Ceviche">
                    <div class="card-body text-center">
                        <h4 class="card-title">Ceviche</h4>
                        <h5 class="text-primary">$30.000</h5>
                        <p class="card-text">Plato de pescado o marisco crudo marinado en jugo de limón o lima, y acompañado de otros ingredientes. Su sabor picante lo hace irresistible.</p>
                        <a href="./vista/menu_online.php" class="btn btn-info">Comprar online</a>
                    </div>
                </div>
            </div>

            <!-- Camarones al ajillo -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img class="card-img-top" src="./vista/img/camarones.jpg" alt="Camarones al ajillo">
                    <div class="card-body text-center">
                        <h4 class="card-title">Camarones al Ajillo</h4>
                        <h5 class="text-primary">$45.000</h5>
                        <p class="card-text">Platillo que combina a la perfección los sabores intensos del ajo con la frescura de los camarones en una salsa deliciosa.</p>
                        <a href="./vista/menu_online.php" class="btn btn-info">Comprar online</a>
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
        <ul class="list-inline d-flex" style="justify-content: center; align-items: center; padding: 10px;">
            <li>
                <img src="./vista/img/feis.png"  type="button" class="btn btn-primary" data-bs-toggle="tooltip" title="www.facebook.com" alt="feis" style="width: 80px; margin-right: 10px;">
            </li>
            <li>
                <img src="./vista/img/insta.png" type="button" class="btn btn-primary" data-bs-toggle="tooltip" title="www.instagram.com" alt="insta" style="width: 80px; margin-left: 10px; margin-right: 10px;">
            </li>
            <li>
                <img src="./vista/img/wasat.png" type="button" class="btn btn-primary" data-bs-toggle="tooltip" title="wwww.wa.me.325346.com" alt="wasat" style="width: 80px; margin-left: 10px;">
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

<script src="./vista/bootstrap-5.0.2-dist/js/bootstrap.bundle.js"></script>
</body>
</html>