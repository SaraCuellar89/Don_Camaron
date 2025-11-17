<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
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
                    <li class="nav-item"><a class="nav-link active" href="#">Carrito</a></li>
                    <li class="nav-item"><a class="nav-link" href="./historial.php">Historial de Pedidos</a></li>
                    <li class="nav-item"><a class="nav-link" href="./reservas_cliente.php">Reservas</a></li>
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

        <!-- Carrito -->
       <?php
            require_once "../modelo/carrito.php";
            $carritoModelo = new Carrito_modelo();

            $id_usuario = $_SESSION["usuario"]["id_usuario"];
            $carrito = $carritoModelo->listar($id_usuario);
        ?>
        
        <div class="container bg-light rounded mb-4" style="padding: 30px; margin-top: 30px;">
            <h1 class="text-center mb-4">Carrito de Compras</h1>
        
            <?php if (empty($carrito)): ?>
                <h3 class="text-center text-danger">Tu carrito está vacío</h3>
            
            <?php else: ?>
            
                <?php foreach ($carrito as $item): ?>
                <div class="row mb-4 p-3" id="item-<?php echo $item['id_menu']; ?>" style="border: 2px dashed rgb(26, 69, 104); border-radius: 10px;">
                    <div class="col-md-3 text-center">
                        <img src="../uploads/<?php echo $item['imagen']; ?>" class="img-fluid rounded" style="width: 100px;">
                        <h4><?php echo $item['nombre']; ?></h4>
                    </div>
                
                    <div class="col-md-6">
                        <h4>Cantidad: <?php echo $item['cantidad']; ?></h4>
                        <h5 class="text-success precio-item"
                            data-precio="<?php echo $item['precio']; ?>"
                            data-cantidad="<?php echo $item['cantidad']; ?>">Total:
                            $<?php echo number_format($item['precio'] * $item['cantidad'], 0, ',', '.'); ?>
                        </h5>
                    </div>
                
                    <div class="col-md-3 text-center">
                        <button class="btn btn-danger eliminar" data-id="<?php echo $item['id_menu']; ?>">Eliminar</button>
                    </div>
                </div>
                <?php endforeach; ?>
                
                <hr>
                <h3 id="totalCarrito" class="text-end text-success">
                    Total general: 
                    $<?php 
                        echo number_format(array_sum(array_map(fn($i)=>$i['precio']*$i['cantidad'], $carrito)), 0, ',', '.');
                    ?>
                </h3>

                <div class="d-flex justify-content-end">
                    <a href="./pagos.php?total=<?php echo array_sum(array_map(fn($i)=>$i['precio']*$i['cantidad'], $carrito)); ?>" 
                    class="btn btn-primary btn-lg">
                        Hacer Compra
                    </a>
                </div>
                
            <?php endif; ?>


        </div>
                
        <script>

        function actualizarTotalCarrito() {
            let total = 0;

            document.querySelectorAll(".precio-item").forEach(pre => {
                const precio = parseInt(pre.dataset.precio);
                const cantidad = parseInt(pre.dataset.cantidad);
                total += precio * cantidad;
            });

            const totalElement = document.getElementById("totalCarrito");
            if (totalElement) {
                totalElement.textContent = "Total general: $" + total.toLocaleString();
            }
        }

        document.querySelectorAll(".eliminar").forEach(btn => {
            btn.addEventListener("click", () => {

                const id = btn.dataset.id;

                fetch("../controlador/carrito_controlador.php", {
                    method: "POST",
                    headers: { "Content-Type": "application/x-www-form-urlencoded" },
                    body: new URLSearchParams({
                        accion: "eliminar",
                        id: id
                    })
                })
                .then(r => r.json())
                .then(resp => {

                    if (resp.status === "ok") {

                        // Quitar visualmente el item del carrito
                        const item = document.getElementById("item-" + id);
                        if (item) item.remove();

                        // Recalcular total general
                        actualizarTotalCarrito();
                        window.location.reload()
                    }
                });

            });
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