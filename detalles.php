<?php
// Your PHP code here
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vapeando Bella vista</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./styles.css">
</head>


<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow sticky-top">
    <div class="container">

      <a class="navbar-brand fw-bold" href="./detalles.php">
        💨 V4p3ando Bella Vista
      </a>

      <button class="navbar-toggler" type="button"
        data-bs-toggle="collapse"
        data-bs-target="#menu">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="menu">

        <ul class="navbar-nav ms-auto">

          <li class="nav-item">
            <a class="nav-link active" href="./detalles.php">Inicio</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#productos">Productos</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#contacto">Contacto</a>
          </li>

        </ul>

        <form class="d-flex ms-3">
          <input class="form-control me-2"
            type="search"
            placeholder="Buscar...">

          <button class="btn btn-primary">
            Buscar
          </button>
        </form>

        <a href="./login.php" class="p-2">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="white" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
          </svg>
        </a>

      </div>

    </div>
  </nav>

  <section class="banner">
    <div class="container">
      <div class="banner-contenido">
        <h1>🔥 Promociones Exclusivas 🔥</h1>

        <p>
          Encontrá los mejores vapeadores, sabores y accesorios
          al mejor precio.
        </p>

        <a href="#productos" class="btn btn-primary me-2">
          Ver productos
        </a>

        <a href="https://wa.me/543815846507"
          target="_blank"
          class="btn btn-success">
          Contactar
        </a>
      </div>
    </div>
  </section>

  <!-- Example single danger button -->
  <div class="btn-group">
    <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
      Categorías
    </button>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="#">Todas las categorías</a></li>
      <li><a class="dropdown-item" href="#">Vapers</a></li>
      <li><a class="dropdown-item" href="#">Accesorios</a></li>
      <li><a class="dropdown-item" href="#">Cargadores</a></li>
      <li>
        <hr class="dropdown-divider">
      </li>
      <li><a class="dropdown-item" href="#">Separated link</a></li>
    </ul>
  </div>

  <div class="container my-5">
    <div id="carouselExampleIndicators"
      class="carousel slide mx-auto"
      style="max-width: 400px;">


      <div class="d-flex justify-content-center">
        <div id="carouselExampleIndicators" class="carousel slide w-50 h-30">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="assets/images.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="assets/elfbar-ice-king-40000-grape-ice-409c0b70d9771963c217629021601273-640-0.webp" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="assets/Lost-Angel-Pro-Max-20K-430x347.webp" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="assets\vapers.webp" class="d-block w-100" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>

    </div>
  </div>

  <section class="container my-5">

    <h2 class="text-center mb-4">
      Nuestras Marcas
    </h2>

    <div class="row text-center">

      <div class="col-md-6">
        <div class="marca">
          <img src="assets/elfbar-ice-king-40000-grape-ice-409c0b70d9771963c217629021601273-640-0.webp" class="img-fluid" width="180">
          <h4 class="mt-3">ELFBAR</h4>
        </div>
      </div>

      <div class="col-md-6">
        <div class="marca">
          <img src="assets/Lost-Angel-Pro-Max-20K-430x347.webp" class="img-fluid" width="180">
          <h4 class="mt-3">LOST ANGEL</h4>
        </div>
      </div>

    </div>

  </section>

  <div class="container mt-5">
    <div class="card shadow-lg p-4">
      <div class="row align-items-center">
        <div class="col-md-4">
          <img src="assets/Lost-Angel-Pro-Max-20K-430x347.webp"
            class="img-fluid">
        </div>
        <div class="col-md-8">
          <h2>Vaper Lost Angel Pro Max</h2>
          <p>
            Vaper descartable, ideal para usuarios que buscan una
            experiencia de vapeo sencilla y conveniente.
          </p>
          <h3 class="text-success">$30.000</h3>
          <button class="btn btn-primary">
            🛒 Agregar al carrito
          </button>
        </div>
      </div>
    </div>
  </div>

  <div class="container mt-5">
    <div class="card shadow-lg p-4">
      <div class="row align-items-center">
        <div class="col-md-4">
          <img src="assets/fdfdfd-a152ce99787386b96717445239911455-1024-1024.webp"
            class="img-fluid">
        </div>
        <div class="col-md-8">
          <h2>Vaper ELFBAR</h2>
          <p>
            Vaper descartable, ideal para usuarios que buscan una
            experiencia de vapeo sencilla y conveniente.
          </p>
          <h3 class="text-success">$35.000</h3>
          <button class="btn btn-primary">
            🛒 Agregar al carrito
          </button>
        </div>
      </div>
    </div>
  </div>

  <div class="container mt-5">
    <div class="card shadow-lg p-4">
      <div class="row align-items-center">
        <div class="col-md-4">
          <img src="assets/elfbar-ice-king-40000-grape-ice-409c0b70d9771963c217629021601273-640-0.webp"
            class="img-fluid">
        </div>
        <div class="col-md-8">
          <h2>Vaper ELFBAR</h2>
          <p>
            Vaper descartable, ideal para usuarios que buscan una
            experiencia de vapeo sencilla y conveniente.
          </p>
          <h3 class="text-success">$35.000</h3>
          <button class="btn btn-primary">
            🛒 Agregar al carrito
          </button>
        </div>
      </div>
    </div>
  </div>

  <div class="container mt-5">
    <div class="card shadow-lg p-4">
      <div class="row align-items-center">
        <div class="col-md-4">
          <img src="assets/vapers.webp"
            class="img-fluid">
        </div>
        <div class="col-md-8">
          <h2>Vaper ELFBAR</h2>
          <p>
            Vaper descartable, ideal para usuarios que buscan una
            experiencia de vapeo sencilla y conveniente.
          </p>
          <h3 class="text-success">$40.000</h3>
          <button class="btn btn-primary">
            🛒 Agregar al carrito
          </button>
        </div>
      </div>
    </div>
  </div>

  <nav aria-label="Page navigation example">
    <ul class="pagination">
      <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item"><a class="page-link" href="#">Siguiente</a></li>
    </ul>
  </nav>
  <a href="https://wa.me/543815846507" target="_blank" class="wsp">
    <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png"
      width="60"
      height="60"
      alt="WhatsApp">
  </a>


  <!-- FOOTER -->
  <footer class="bg-dark text-white mt-5 py-4">
    <div class="container">

      <div class="row">
        <div class="col-md-4 mb-3">
          <h5>Vapeando Bella Vista</h5>

          <p class="small">
            Tu tienda de confianza para encontrar los mejores
            vapeadores y accesorios, con atención personalizada
            y productos de calidad.
          </p>
        </div>

        <div class="col-md-4 mb-3">
          <h5>Enlaces</h5>

          <ul class="list-unstyled">
            <li><a href="#" class="text-decoration-none text-white">Inicio</a></li>
            <li><a href="#" class="text-decoration-none text-white">Productos</a></li>
            <li><a href="#" class="text-decoration-none text-white">Contacto</a></li>
          </ul>
        </div>

        <div class="col-md-4 mb-3">
          <h5>Contacto y Ubicación</h5>

          <p class="small mb-1">
            📍 Bella Vista, Tucumán, Argentina
          </p>

          <p class="small mb-1">
            📞 +54 381 000000
          </p>

          <p class="small mb-1">
            📷 Instagram: @V4p3ando_bellavista
          </p>

          <p class="small mb-0">
            🕒 Lunes a Sábado de 9:00 a 21:00 hs
          </p>
        </div>

      </div>

      <hr class="border-light">

      <div class="text-center small">
        © 2026 Vapeando Bella Vista - Todos los derechos reservados.
      </div>

      <a href="https://maps.google.com"
        target="_blank"
        class="btn btn-outline-light btn-sm mt-2">
        📍 Ver ubicación
      </a>

    </div>
  </footer>

</body>

</html>