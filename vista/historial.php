<?php
    session_start();
    require_once "../controlador/pedido_controlador.php";

    $controlador = new Pedido_controlador();

    $id_usuario = $_SESSION['usuario']['id_usuario'] ?? 0;

    $pedidos = $controlador->listar_pedidos_usuario($id_usuario);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Pedidos</title>
    <link rel="stylesheet" href="./bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<style> 
    body { font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; }
</style>
<body>

<img id="fondo" src="./img/fondo.jpg" alt="">

<nav class="navbar navbar-expand-lg bg-info navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="#"><img src="./img/doncamaron.png" style="width: 150px;" class="rounded-pill"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="../index.php">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="./menu.php">Menú</a></li>
                <li class="nav-item"><a class="nav-link" href="./sucursales.php">Sucursales</a></li>
                <li class="nav-item"><a class="nav-link" href="./Inicio_sesion.php">Inicio de sesión</a></li>
                <li class="nav-item"><a class="nav-link active" href="">Perfil</a></li>
            </ul>
        </div>
    </div>
</nav>

<nav class="navbar navbar-expand-lg bg-info navbar-dark" 
     style="margin:10px 20px; border-radius: 20px; border: solid 2px rgb(13,56,94);">
    <div class="container">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item"><a class="nav-link" href="./perfil.php">Perfil</a></li>
            <li class="nav-item"><a class="nav-link" href="./carrito.php">Carrito</a></li>
            <li class="nav-item"><a class="nav-link active" href="#">Historial de Pedidos</a></li>
            <li class="nav-item"><a class="nav-link" href="./reservas_cliente.php">Reservas</a></li>
        </ul>
    </div>
</nav>

<!-- HISTORIAL -->
<div class="container mt-5">
    <h2 class="text-center mb-4">Historial de pedidos</h2>

    <?php if (empty($pedidos)): ?>
        <div class="alert alert-warning text-center">No tienes pedidos aún.</div>
    <?php endif; ?>
    
    <?php foreach ($pedidos as $p): ?>

        <?php if ($p['estado'] == 'En proceso'): ?>
        
            <div class="container my-4 bg-warning">
                <div class="card shadow-lg">
                    <div class="card-body p-4">
                        <h3 class="text-info"><b>Pedido #<?= $p['codigo'] ?></b></h3>
                        <hr>

                        <p style="font-size: 18px;">
                            <b>Código:</b> <?= $p['codigo'] ?><br><br>
                            <b>Fecha:</b> <?= $p['fecha'] ?><br><br>
                            <b>Estado:</b> <?= $p['estado'] ?><br><br>
                        </p>
                    </div>
                </div>
            </div>

        <?php else: ?>

            <div class="container my-4 bg-success">
                <div class="card shadow-lg">
                    <div class="card-body p-4">
                        <h3 class="text-info"><b>Pedido #<?= $p['codigo'] ?></b></h3>
                        <hr>

                        <p style="font-size: 18px;">
                            <b>Código:</b> <?= $p['codigo'] ?><br><br>
                            <b>Fecha:</b> <?= $p['fecha'] ?><br><br>
                            <b>Estado:</b> <?= $p['estado'] ?><br><br>
                        </p>
                    </div>
                </div>
            </div>

        <?php endif; ?>

    <?php endforeach; ?>

</div>

<!-- FOOTER -->
<footer class="text-center footer-style py-2"
        style="border: solid lightcyan; border-style: double; border-radius: 20px;
               border-width: 7px; background:rgba(0,162,255,0.712);">

    <div class="container">
        <div class="row">

            <div class="col-md-4 footer-col">
                <h4><b>Contacto</b></h4>
                <p><b>Correo:</b> donkamaronmariscos@restaurante.com<br><br>
                   <b>Celular:</b> 316 4020478<br><br>
                   <b>Teléfono:</b> (061) 01001 678594</p>
            </div>

            <div class="col-md-4 footer-col">
                <h4><b>Punto de venta</b></h4>
                <p><b>Bogotá</b> Cra. 7 #158 - 03<br><br>
                   <b>Lunes - Viernes:</b> 7am - 4pm<br><br>
                   <b>Sábado:</b> 7am - 2pm</p>
            </div>

            <div class="col-md-4 footer-col">
                <h4><b>Nuestras redes</b></h4>
                <ul class="list-inline d-flex" style="justify-content: center;">
                    <li><img src="./img/feis.png" style="width: 80px; margin: 0 10px;"></li>
                    <li><img src="./img/insta.png" style="width: 80px; margin: 0 10px;"></li>
                    <li><img src="./img/wasat.png" style="width: 80px; margin: 0 10px;"></li>
                </ul>
            </div>

        </div>
    </div>
</footer>

</body>
</html>
