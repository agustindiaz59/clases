<?php

$carrito = [
    [
        'id' => 1,
        'nombre' => 'Vaper Lost Angel Pro Max',
        'precio' => 30000,
        'cantidad' => 1,
        'imagen' => 'assets/Lost-Angel-Pro-Max-20K-430x347.webp'
    ],
    [
        'id' => 2,
        'nombre' => 'Vaper ELFBAR',
        'precio' => 35000,
        'cantidad' => 2,
        'imagen' => 'assets/fdfdfd-a152ce99787386b96717445239911455-1024-1024.webp'
    ]
];

$subtotal = 0;

foreach ($carrito as $producto) {
    $subtotal += $producto['precio'] * $producto['cantidad'];
}

$total = $subtotal;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Carrito - V4p3ando Bella Vista</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js">
    </script>

    <link rel="stylesheet" href="./styles.css">
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow sticky-top">

        <div class="container">

            <a class="navbar-brand fw-bold" href="./detalles.php">
                💨 V4p3ando Bella Vista
            </a>

            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#menu">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse" id="menu">

                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link text-white" href="./detalles.php">
                            Inicio
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white" href="./detalles.php#productos">
                            Productos
                        </a>
                    </li>

                    <li class="nav-item btn-group">

                        <button
                            type="button"
                            class="btn dropdown-toggle text-white"
                            style="border: none;"
                            data-bs-toggle="dropdown">

                            Categorías

                        </button>

                        <ul class="dropdown-menu">

                            <li>
                                <a class="dropdown-item" href="#">
                                    Todas las categorías
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="#">
                                    Vapers
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="#">
                                    Accesorios
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="#">
                                    Cargadores
                                </a>
                            </li>

                        </ul>

                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white" href="#contacto">
                            Contacto
                        </a>
                    </li>

                </ul>

                <form class="d-flex ms-3">

                    <input
                        class="form-control me-2"
                        type="search"
                        placeholder="Buscar...">

                    <button class="btn btn-primary">
                        Buscar
                    </button>

                </form>

                <!-- USUARIO -->

                <a href="./login.php" class="p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="white" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                    </svg>
                </a>

                <!-- CARRITO -->
                <a
                    href="./carrito.php"
                    class="btn btn-primary position-relative ms-2">

                    🛒

                </a>

            </div>

        </div>

    </nav>


    <!-- CONTENIDO -->

    <main class="container my-5">

        <div class="mb-4">

            <h1 class="fw-bold">
                🛒 Mi carrito
            </h1>

            <p class="text-muted">
                Revisá tus productos antes de finalizar la compra.
            </p>

        </div>


        <?php if (empty($carrito)): ?>

            <!-- CARRITO VACÍO -->

            <div class="card shadow-lg border-0 p-5 text-center">

                <div style="font-size: 70px;">
                    🛒
                </div>

                <h2 class="mt-3">
                    Tu carrito está vacío
                </h2>

                <p class="text-muted">
                    Todavía no agregaste ningún producto.
                </p>

                <div>

                    <a
                        href="./detalles.php#productos"
                        class="btn btn-primary">

                        Ver productos

                    </a>

                </div>

            </div>


        <?php else: ?>


            <div class="row g-4">


                <!-- PRODUCTOS -->

                <div class="col-lg-8">

                    <?php foreach ($carrito as $producto): ?>

                        <div
                            class="card shadow-lg border-0 mb-4">

                            <div class="card-body">

                                <div class="row align-items-center">


                                    <!-- IMAGEN -->

                                    <div class="col-md-3 text-center">

                                        <img
                                            src="<?php echo $producto['imagen'] ?>"
                                            class="img-fluid"
                                            style="max-height: 150px; object-fit: contain;"
                                            alt="<?php echo $producto['nombre'] ?>">

                                    </div>


                                    <!-- INFORMACIÓN -->

                                    <div class="col-md-4">

                                        <h4 class="fw-bold">

                                            <?php echo $producto['nombre']; ?>

                                        </h4>

                                        <p class="text-muted mb-2">
                                            Producto disponible
                                        </p>

                                        <h5 class="text-success fw-bold">

                                            $<?php echo $producto['precio'] ?>

                                        </h5>

                                    </div>


                                    <!-- CANTIDAD -->

                                    <div class="col-md-3">

                                        <label class="form-label fw-bold">
                                            Cantidad
                                        </label>

                                        <div class="input-group">

                                            <button
                                                class="btn btn-outline-secondary"
                                                type="button"
                                                onclick="cambiarCantidad(
                                                <?php echo $producto['id'] ?>,
                                                -1
                                            )">

                                                −

                                            </button>

                                            <input
                                                type="text"
                                                class="form-control text-center"
                                                value="<?= $producto['cantidad'] ?>"
                                                id="cantidad-<?= $producto['id'] ?>"
                                                readonly>

                                            <button
                                                class="btn btn-outline-secondary"
                                                type="button"
                                                onclick="cambiarCantidad(
                                                <?= $producto['id'] ?>,
                                                1
                                            )">

                                                +

                                            </button>

                                        </div>

                                    </div>


                                    <!-- ELIMINAR -->

                                    <div class="col-md-2 text-end">

                                        <button
                                            class="btn btn-outline-danger"
                                            onclick="eliminarProducto(
                                            <?= $producto['id'] ?>
                                        )">

                                            🗑️

                                        </button>

                                    </div>


                                </div>

                            </div>

                        </div>

                    <?php endforeach; ?>


                    <!-- SEGUIR COMPRANDO -->

                    <a
                        href="./detalles.php#productos"
                        class="btn btn-outline-primary">

                        ← Seguir comprando

                    </a>

                </div>


                <!-- RESUMEN -->

                <div class="col-lg-4">

                    <div
                        class="card shadow-lg border-0">

                        <div class="card-body p-4">

                            <h3 class="fw-bold mb-4">
                                Resumen de compra
                            </h3>


                            <div
                                class="d-flex justify-content-between mb-3">

                                <span>
                                    Subtotal
                                </span>

                                <strong>

                                    $<?= number_format(
                                            $subtotal,
                                            0,
                                            ',',
                                            '.'
                                        ) ?>

                                </strong>

                            </div>


                            <div
                                class="d-flex justify-content-between mb-3">

                                <span>
                                    Envío
                                </span>

                                <span class="text-success fw-bold">
                                    A coordinar
                                </span>

                            </div>


                            <hr>


                            <div
                                class="d-flex justify-content-between align-items-center mb-4">

                                <span class="fs-5 fw-bold">
                                    Total
                                </span>

                                <span class="fs-3 text-success fw-bold">

                                    $<?= number_format(
                                            $total,
                                            0,
                                            ',',
                                            '.'
                                        ) ?>

                                </span>

                            </div>


                            <a
                                href="https://wa.me/543815846507?text=hola%20me%20interesa%20el%20producto%20<?= urlencode($carrito[0]['nombre']) ?>"
                                target="_blank"
                                class="btn btn-success btn-lg w-100">

                                📱 Consultar por WhatsApp

                            </a>


                            <p
                                class="text-muted text-center small mt-3 mb-0">

                                Podés consultar disponibilidad y coordinar
                                el método de pago.

                            </p>

                        </div>

                    </div>

                </div>

            </div>


        <?php endif; ?>

    </main>


    <!-- FOOTER -->

    <footer
        class="bg-dark text-white mt-5 py-4">

        <div class="container">

            <div class="row">


                <div class="col-md-4 mb-3">

                    <h5>
                        Vapeando Bella Vista
                    </h5>

                    <p class="small">

                        Tu tienda de confianza para encontrar
                        los mejores vapeadores y accesorios,
                        con atención personalizada y productos
                        de calidad.

                    </p>

                </div>


                <div class="col-md-4 mb-3">

                    <h5>
                        Enlaces
                    </h5>

                    <ul class="list-unstyled">

                        <li>
                            <a
                                href="./detalles.php"
                                class="text-decoration-none text-white">

                                Inicio

                            </a>
                        </li>

                        <li>
                            <a
                                href="./detalles.php#productos"
                                class="text-decoration-none text-white">

                                Productos

                            </a>
                        </li>

                        <li>
                            <a
                                href="#contacto"
                                class="text-decoration-none text-white">

                                Contacto

                            </a>
                        </li>

                    </ul>

                </div>


                <div class="col-md-4 mb-3">

                    <h5>
                        Contacto y Ubicación
                    </h5>

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

                © 2026 Vapeando Bella Vista -
                Todos los derechos reservados.

            </div>


            <a
                href="https://maps.google.com"
                target="_blank"
                class="btn btn-outline-light btn-sm mt-2">

                📍 Ver ubicación

            </a>

        </div>

    </footer>


    <script>
        function cambiarCantidad(id, cambio) {

            const input = document.getElementById(
                'cantidad-' + id
            );

            let cantidad = parseInt(input.value);

            cantidad += cambio;

            if (cantidad < 1) {
                cantidad = 1;
            }

            input.value = cantidad;

            /*
             * Acá posteriormente podés hacer un fetch()
             * hacia PHP para actualizar $_SESSION['carrito'].
             */

        }


        function eliminarProducto(id) {

            if (
                confirm('¿Querés eliminar este producto del carrito?')
            ) {

                /*
                 * Posteriormente:
                 *
                 * fetch('eliminar_carrito.php?id=' + id)
                 *     .then(() => location.reload());
                 */

                alert(
                    'Producto eliminado. Conectá esta función con tu backend.'
                );

            }

        }
    </script>

</body>

</html>