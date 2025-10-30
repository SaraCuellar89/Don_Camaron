<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú</title>
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
                    <li class="nav-item"><a class="nav-link active" href="#">Menú</a></li>
                    <li class="nav-item"><a class="nav-link" href="./sucursales.php">Sucursales</a></li>
                    <li class="nav-item"><a class="nav-link" href="./Inicio_sesion.php">Inicio de sesion</a></li>
                    <li class="nav-item"><a class="nav-link" href="./perfil.php">Perfil</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Tarjetas del Menú -->
    <div class="container mt-4">
        <h1 class="text-center mb-4">Menú</h1>

        <form>
            <div class="row">
                <div class="mb-3 mt-3">
                    <select name="" id="" class="form-control" required>
                        <option value="" hidden>Filtrar...</option>
                        <option value="">Entradas</option>
                        <option value="">Platos Fuertes</option>
                        <option value="">Bebidas</option>
                    </select>
                </div>
                <div align="center" class="p-3 ">
                    <button type="submit" class="btn btn-info btn-lg shadow" align="center">Filtrar</button>
                </div>
            </div>
        </form>

        <div id="accordion">
            <!-- Menú -->
            <div class="card-header text-center bg-info" style="border-radius: 20px; border: dashed 3px #1578a9; margin-bottom: 30px;">

            <!-- Entradas -->
                <a class="btn" data-bs-toggle="collapse" href="#collapseOne">
                    <h2 class="h2">Entradas</h2>
                </a>
            </div>
            <div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
                <div class="card-body">

                     <div class="row justify-content-center">
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img class="card-img-top" src="./img/ceviche_mixto.avif" alt="Cazuela de mariscos">
                                <div class="card-body text-center">
                                    <h4 class="card-title">Ceviche mixto</h4>
                                    <h5 class="text-primary">$24.900</h5>
                                    <p class="card-text">Camarones y pescado en salsa de
                                        la casa y leche de tigre con cebolla,
                                        camote, maíz y aguacate.</p>
                                    <a href="#" class="btn btn-info">Ordenar</a>
                                </div>
                            </div>
                        </div>
        
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img class="card-img-top" src="./img/Ceviche.jpg" alt="Ceviche">
                                <div class="card-body text-center">
                                    <h4 class="card-title">Ceviche de la casa</h4>
                                    <h5 class="text-primary">$25.900</h5>
                                    <p class="card-text">Plato de pescado o marisco crudo marinado en jugo de limón o lima, y acompañado de otros ingredientes. Su sabor picante lo hace irresistible.</p>
                                    <a href="#" class="btn btn-info">Ordenar</a>
                                </div>
                            </div>
                        </div>
        
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img class="card-img-top" src="./img/ceviche_camarones.jpg" alt="Camarones al ajillo">
                                <div class="card-body text-center">
                                    <h4 class="card-title">Ceviche de camarón</h4>
                                    <h5 class="text-primary">$24.900</h5>
                                    <p class="card-text">Nuestro ceviche de siempre.
                                        Camarones en salsa de la casa, con
                                        cebolla y encurtidos.</p>
                                    <a href="#" class="btn btn-info">Ordenar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                <div class="card-header text-center bg-info" style="border-radius: 20px; border: dashed 3px #1578a9; margin-bottom: 30px;">

                <!-- Plato fuertes -->
                    <a class="btn" data-bs-toggle="collapse" href="#collapseTwo">
                        <h2 class="h2">Platos Fuertes</h2>
                    </a>
                </div>
                <div id="collapseTwo" class="collapse show" data-bs-parent="#accordion">
                    <div class="card-body">
    
                         <!-- Mariscos -->
    +
                         <div class="row justify-content-center">
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <img class="card-img-top" src="./img/parri_mariscox.jpg" alt="Cazuela de mariscos">
                                    <div class="card-body text-center">
                                        <h4 class="card-title">Parrilada de Mariscos</h4>
                                        <h5 class="text-primary">$46.500</h5>
                                        <p class="card-text">Langostino, camarones, filete de salmón, filete blanco, calamar blanco
                                            y palmitos de cangrejo, todo en salsa BBQ. Acompañado de puré de papa y ensalada. </p>
                                        <a href="#" class="btn btn-info">Ordenar</a>
                                    </div>
                                </div>
                            </div>
            
                            <!-- Arroces -->
                            <div class="col-md-4 mb-4" >
                                <div class="card">
                                    <img class="card-img-top" src="./img/arroz_marinera.jpeg" alt="Ceviche">
                                    <div class="card-body text-center">
                                        <h4 class="card-title">Arroz a la Marinera</h4>
                                        <h5 class="text-primary">$48.900</h5>
                                        <p class="card-text">Mariscos seleccionados de la casa.
                                            Acompañado de papa a la francesa.</p>
                                        <a href="#" class="btn btn-info">Ordenar</a>
                                    </div>
                                </div>
                            </div>
            
                            <!-- Salmon -->
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <img class="card-img-top" src="./img/salmon_ty.jpg" alt="Camarones al ajillo">
                                    <div class="card-body text-center">
                                        <h4 class="card-title">Salmón Teriyaki</h4>
                                        <h5 class="text-primary">$53.900</h5>
                                        <p class="card-text">Salmón a la plancha con salsa teriyaki, servido sobre una cama de verduras
                                            asadas. Acompañado de puré de papa.</p>
                                        <a href="#" class="btn btn-info">Ordenar</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                         <!-- Cazuelas -->
    
                         <div class="row justify-content-center">
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <img class="card-img-top" src="./img/anillos_cama.avif" alt="Cazuela de mariscos">
                                    <div class="card-body text-center">
                                        <h4 class="card-title">Anillos de Calamar</h4>
                                        <h5 class="text-primary">$50.000</h5>
                                        <p class="card-text">Camarones salteados en su base. Acompañada de arroz coco y patacón.</p>
                                        <a href="#" class="btn btn-info">Ordenar</a>
                                    </div>
                                </div>
                            </div>
            
                            <!-- Filetes -->
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <img class="card-img-top" src="./img/pesca_dia.jpg" alt="Ceviche" style="height: 280px;">
                                    <div class="card-body text-center">
                                        <h4 class="card-title">Pesca del día en salsa de coco</h4>
                                        <h5 class="text-primary">$46.900</h5>
                                        <p class="card-text">Pescado fresco y platano dulce gratina- do, bañados en salsa a base de leche de coco. Acompañado de arroz.</p>
                                        <a href="#" class="btn btn-info">Ordenar</a>
                                    </div>
                                </div>
                            </div>
            
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <img class="card-img-top" src="./img/file_cama.jpg" alt="Camarones al ajillo">
                                    <div class="card-body text-center">
                                        <h4 class="card-title">Filete con camarones gratinados</h4>
                                        <h5 class="text-primary">$57.900</h5>
                                        <p class="card-text">Pescado fresco a la plancha, cubierto con camarones, salsa blanca y queso gratinado. Acompañado de arroz y verdura.</p>
                                        <a href="#" class="btn btn-info">Ordenar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-header text-center bg-info" style="border-radius: 20px; border: dashed 3px #1578a9; margin-bottom: 30px;">

                <!-- Bebidas -->
                    <a class="btn" data-bs-toggle="collapse" href="#collapseThree">
                        <h2 class="h2">Bebidas</h2>
                    </a>
                </div>
                <div id="collapseThree" class="collapse show" data-bs-parent="#accordion">
                    <div class="card-body">
    
                         <!-- Jugos naturales -->
    
                         <div class="row justify-content-center">
                            <div class="col-md-4 mb-4" >
                                <div class="card">
                                    <img class="card-img-top" src="./img/frutos_rojos.jpg" alt="Cazuela de mariscos">
                                    <div class="card-body text-center">
                                        <h4 class="card-title">Frutos Rojos</h4>
                                        <h5 class="text-primary">$9.600</h5>
                                        <a href="#" class="btn btn-info">Ordenar</a>
                                    </div>
                                </div>
                            </div>
       
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <img class="card-img-top" src="./img/piña.jpg" alt="Ceviche">
                                    <div class="card-body text-center">
                                        <h4 class="card-title">Piña con hierbabuena</h4>
                                        <h5 class="text-primary">$8.100</h5>
                                        <a href="#" class="btn btn-info">Ordenar</a>
                                    </div>
                                </div>
                            </div>
            
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <img class="card-img-top" src="./img/mandarina.jpg" alt="Camarones al ajillo">
                                    <div class="card-body text-center">
                                        <h4 class="card-title">Mandarina</h4>
                                        <h5 class="text-primary">$9.500</h5>
                                        <a href="#" class="btn btn-info">Ordenar</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                         <!-- Limonadas -->
    
                         <div class="row justify-content-center">
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <img class="card-img-top" src="./img/limo_coco.jpg" alt="Cazuela de mariscos">
                                    <div class="card-body text-center">
                                        <h4 class="card-title">Limonada de coco</h4>
                                        <h5 class="text-primary">$11.900</h5>
                                        <a href="#" class="btn btn-info">Ordenar</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <img class="card-img-top" src="./img/limonada.jpg" alt="Ceviche" style="height: 280px;">
                                    <div class="card-body text-center">
                                        <h4 class="card-title">Limonada Natural</h4>
                                        <h5 class="text-primary">$7.100</h5>
                                        <a href="#" class="btn btn-info">Ordenar</a>
                                    </div>
                                </div>
                            </div>
            
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <img class="card-img-top" src="./img/limo_cere.webp" alt="Camarones al ajillo" style="height: 280px;">
                                    <div class="card-body text-center">
                                        <h4 class="card-title">Limonada cerezada</h4>
                                        <h5 class="text-primary">$7.700</h5>
                                        <a href="#" class="btn btn-info">Ordenar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
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
      

<script src="./bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>