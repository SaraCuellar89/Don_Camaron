<?php
session_start();
require_once "../controlador/menu_controlador.php";

$menuControlador = new Menu_controlador();
$lista_menu = $menuControlador->listar_menu();

// Verificar si el usuario está logueado
$usuario = $_SESSION['usuario'] ?? null;
$rol = $usuario['rol'] ?? 'Invitado';

// Agrupar por tipo de menú
$tipos = [];
foreach ($lista_menu as $plato) {
    $tipos[$plato['tipo_menu']][] = $plato;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menú | Don Camarón</title>
  <link rel="stylesheet" href="./bootstrap-5.0.2-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/style.css">
</head>

<body>

  <img id="fondo" src="./img/fondo.jpg" alt="Fondo del menú">

  <!-- Navbar -->
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
          <li class="nav-item"><a class="nav-link" href="./Inicio_sesion.php">Inicio de sesión</a></li>
          <?php if ($rol === 'Administrador'): ?>
            <li class="nav-item"><a class="nav-link" href="./perfil_admin.php">Perfil</a></li>
          <?php else: ?>
            <li class="nav-item"><a class="nav-link" href="./perfil.php">Perfil</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Contenido -->
  <div class="container mt-4">
    <h1 class="text-center mb-4">Menú</h1>

    <!-- Filtro -->
    <div class="text-center mb-5">
      <label class="me-2 h5">Filtrar por tipo:</label>
      <select id="filtro" class="form-select d-inline-block w-auto border-info">
        <option value="todos">Todos</option>
        <?php foreach (array_keys($tipos) as $tipo): ?>
          <option value="<?= strtolower(str_replace(' ', '_', $tipo)) ?>">
            <?= htmlspecialchars($tipo) ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <!-- Secciones del menú -->
    <?php foreach ($tipos as $tipo => $platos): 
      $idTipo = strtolower(str_replace(' ', '_', $tipo));
    ?>
      <div class="seccion-menu" id="seccion_<?= $idTipo ?>">

        <div class="card-header text-center bg-info text-white rounded-pill mb-4">
          <h2 class="h4 my-2"><?= htmlspecialchars($tipo) ?></h2>
        </div>

        <div class="row justify-content-center">

        <?php foreach ($platos as $p): ?>
          <div class="col-md-4 mb-4">

            <div class="card shadow"
                 data-id="<?= $p['id_menu'] ?>"
                 data-nombre="<?= htmlspecialchars($p['nombre']) ?>"
                 data-precio="<?= $p['precio'] ?>"
                 data-imagen="<?= htmlspecialchars($p['imagen']) ?>">

              <img class="card-img-top"
                   src="../uploads/<?= htmlspecialchars($p['imagen']) ?>"
                   alt="<?= htmlspecialchars($p['nombre']) ?>"
                   style="height: 250px; object-fit: cover; border-top-left-radius:15px; border-top-right-radius:15px;">

              <div class="card-body text-center">

                <h4 class="card-title"><?= htmlspecialchars($p['nombre']) ?></h4>
                <h5 class="text-primary">$<?= number_format($p['precio'], 0, ',', '.') ?></h5>
                <p class="card-text"><?= htmlspecialchars($p['descripcion']) ?></p>

                <div class="d-flex justify-content-center mt-3">
                  <button class="btn btn-outline-info btn-sm menos">−</button>
                  <input type="text" class="form-control text-center mx-2 cantidad" value="0" style="width: 50px;" readonly>
                  <button class="btn btn-outline-info btn-sm mas">+</button>
                </div>

                <button class="btn btn-ordenar bg-info mt-3" style="display:none;">Añadir al pedido</button>

              </div>

            </div>

          </div>
        <?php endforeach; ?>

        </div>
      </div>
    <?php endforeach; ?>

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

  <script src="./bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>

  <script>
    // --- Filtro funcional ---
    const filtro = document.getElementById('filtro');
    const secciones = document.querySelectorAll('.seccion-menu');

    filtro.addEventListener('change', () => {
      const valor = filtro.value;
      secciones.forEach(sec => {
        sec.style.display = (valor === 'todos' || sec.id === 'seccion_' + valor)
          ? 'block'
          : 'none';
      });
    });

    // --- Control de cantidades ---
    document.querySelectorAll('.card').forEach(card => {
      const mas = card.querySelector('.mas');
      const menos = card.querySelector('.menos');
      const cantidad = card.querySelector('.cantidad');
      const boton = card.querySelector('.btn-ordenar');

      mas.addEventListener('click', () => {
        cantidad.value = parseInt(cantidad.value) + 1;
        boton.style.display = "inline-block";
      });

      menos.addEventListener('click', () => {
        if (cantidad.value > 0) cantidad.value--;
        if (cantidad.value == 0) boton.style.display = "none";
      });
    });

    // --- Agregar al carrito ---
    document.querySelectorAll('.card').forEach(card => {
      const boton = card.querySelector('.btn-ordenar');

      boton.addEventListener('click', () => {
        const cantidad = card.querySelector('.cantidad').value;

        if (cantidad <= 0) return alert("Selecciona una cantidad");

        fetch('../controlador/carrito_controlador.php', {
          method: "POST",
          headers: { "Content-Type": "application/x-www-form-urlencoded" },
          body: new URLSearchParams({
            accion: "agregar",
            id: card.dataset.id,
            nombre: card.dataset.nombre,
            precio: card.dataset.precio,
            cantidad: cantidad,
            imagen: card.dataset.imagen
          })
        })
        .then(r => r.json())
        .then(() => {
          alert(card.dataset.nombre + " añadido al carrito");
        });
      });
    });
  </script>

</body>
</html>
