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
       <div class="container bg-light rounded" style="padding: 30px; margin-top: 30px;">

            <div style="display: flex; justify-content: center; align-items: center; margin: 30px;">
                <h1 class="h1 bg-info text-center" style=" padding: 20px; border-radius: 20px; border: solid 5px rgb(43, 101, 148);">Carrito de compras</h1>
            </div>

            <!-- objeto 1 -->
            <div id="pedido1" class="row" style="display: flex; align-items: center; border: dashed 4px rgb(26, 69, 104); padding: 30px; margin: 10px;">
                <div class="col-md">
                    <h3 class="text-center">Parrillada de Mariscos</h3>
                    <img class="card-img-top" src="./img/parri_mariscox.jpg" alt="Cazuela de mariscos">
                </div>

                <div class="col-md">
                    <h5 class="text-primary">$46.500</h5>
                    <p class="card-text">Langostino, camarones, filete de salmón, filete blanco, calamar blanco
                    y palmitos de cangrejo, todo en salsa BBQ. Acompañado de puré de papa y ensalada. </p>
                </div>

                <div class="col-md">
                    <div style="display: flex; justify-content: center; flex-direction: column; gap: 30px;">
                        <button id="bot1" type="button" class="btn btn-primary text-light" style="background-color: rgb(151, 49, 49); border-radius: 20px; border: dashed 3px rgb(94, 13, 13);"><h2>Eliminar</h2></button>

                        <button id="bot1_2" type="button" class="btn btn-primary text-dark bg-info" style="border-radius: 20px; border: dashed 3px rgb(28, 29, 88);"><h2>Cambiar</h2></button>
                    </div>
                </div>

                <!-- js de boton eliminar objeto 1-->
                 <script>
                    $(document).ready(function(){
                        var p1=document.getElementById("bot1")
                    p1.addEventListener("click", eliminar1)
                    })

                    function eliminar1(){
                        $("#pedido1").remove()
                        alert("Se eliminara Parrillada de Mariscos de carrito")
                    }

                    $(document).ready(function(){
                        var p1=document.getElementById("bot1_2")
                    p1.addEventListener("click", cambiar1)
                    })

                    function cambiar1(){
                        alert("En este momento no se pueden cambiar objetos, intentelo mas tarde")
                    }
                 </script>

            </div>


            <!-- Objeto 2 -->

            <div id="pedido2" class="row" style="display: flex; align-items: center; border: dashed 4px rgb(26, 69, 104); padding: 30px; margin: 10px;">
                <div class="col-md">
                    <h3 class="text-center">Salmón Teriyaki</h3>
                    <img class="card-img-top" src="./img/salmon_ty.jpg" alt="Camarones al ajillo">
                </div>

                <div class="col-md">
                    <h5 class="text-primary">$53.900</h5>
                    <p class="card-text">Salmón a la plancha con salsa teriyaki, servido sobre una cama de verduras asadas. Acompañado de puré de papa.</p>
                </div>

                <div class="col-md">
                    <div style="display: flex; justify-content: center; flex-direction: column; gap: 30px;">
                        <button id="bot2" type="button" class="btn btn-primary text-light" style="background-color: rgb(151, 49, 49); border-radius: 20px; border: dashed 3px rgb(94, 13, 13);"><h2>Eliminar</h2></button>

                        <button id="bot2_2" type="button" class="btn btn-primary text-dark bg-info" style="border-radius: 20px; border: dashed 3px rgb(28, 29, 88);"><h2>Cambiar</h2></button>
                    </div>
                </div>

                <!-- js de boton eliminar objeto 2-->
                 <script>
                    $(document).ready(function(){
                        var p2=document.getElementById("bot2")
                    p2.addEventListener("click", eliminar2)
                    })

                    function eliminar2(){
                        $("#pedido2").remove()
                        alert("Se eliminara Salmón Teriyaki de carrito")
                    }

                    $(document).ready(function(){
                        var p2=document.getElementById("bot2_2")
                    p2.addEventListener("click", cambiar2)
                    })

                    function cambiar2(){
                        alert("En este momento no se pueden cambiar objetos, intentelo mas tarde")
                    }
                 </script>

            </div>
       </div>

       <!-- Domicilio -->
        
       <div class="container" style="width: 20%; margin-top: 40px; margin-bottom: 100px; padding: 30px;">
        <div style="display: flex; justify-content: center;">
            <button type="button" class="btn btn-primary bg-info text-dark" data-bs-toggle="modal" data-bs-target="#myModal" style="padding: 30px; border-radius: 20px; border: dashed 5px rgb(62, 128, 204);"><h2>Comprar</h2></button>
        </div>
        </div>

        <!-- Modal de boton de reserva -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
            <div class="modal-content">
        
                <div class="modal-header">
                <h4 class="modal-title">Compra:</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
        
                <div class="modal-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th>Total de la compra</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>$xxx.xxxx</td>
                          </tr>
                        </tbody>
                      </table>

                      <table class="table">
                        <thead>
                          <tr>
                            <th>Pedido</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><input type="radio" name="opcion" value="opcion1">Llegar a domicilio</td>
                            <td><input type="radio" name="opcion" value="opcion2">Recoger en restaurante</td>
                          </tr>
                        </tbody>
                      </table>
                </div>
        
                <div class="modal-footer">
                    <a href="./pagos.php">  <button type="button" class="btn btn-danger" data-bs-dismiss="modal" >Ir a metodos de pago</button></a>
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