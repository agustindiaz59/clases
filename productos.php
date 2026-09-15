<?php

include_once("bd.php");

$productosbd = select("SELECT * FROM productos");



$productos = select("SELECT * FROM productos");
$totalProductos = count($productos);

//var_dump($_POST['nombre']);
if (!empty($_POST['nombre']))
{
    $productos = select("SELECT * FROM productos WHERE productos.nombre = '".$_POST['nombre']."' ");
    if ($productos) {
        $totalProductos = count($productos);
    } else {
        $productos = [];
        $totalProductos = 0;
    }
    $totalProductos = count($productos);
}

var_dump($_POST['categoria']);
if (!empty($_POST['categoria']))
{
    $productos = select("SELECT * FROM productos WHERE productos.categoria = '".$_POST['categoria']."' ");
    if ($productos) {
        $totalProductos = count($productos);
    } else {
        $productos = [];
        $totalProductos = 0;
    }
    $totalProductos = count($productos);
}

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>
        Productos - V4p3ando Bella Vista
    </title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js">
    </script>

    <link
        rel="stylesheet"
        href="./styles.css">

    <style>
        body {
            background-color: #f5f5f5;
        }

        .productos-header {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .filtros {
            background: white;
            border-radius: 10px;
            padding: 20px;
            height: fit-content;
        }

        .filtro-titulo {
            font-weight: 700;
            margin-bottom: 12px;
        }

        .filtro-seccion {
            border-bottom: 1px solid #e5e5e5;
            padding-bottom: 18px;
            margin-bottom: 18px;
        }

        .producto-card {
            background: white;
            border: none;
            border-radius: 10px;
            overflow: hidden;
            height: 100%;
            transition: 0.2s;
        }

        .producto-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, .12);
        }

        .producto-imagen {
            height: 230px;
            width: 100%;
            object-fit: contain;
            padding: 15px;
            background: white;
        }

        .producto-contenido {
            padding: 16px;
        }

        .producto-nombre {
            font-size: 16px;
            font-weight: 500;
            min-height: 48px;
        }

        .producto-precio {
            font-size: 26px;
            font-weight: 500;
        }

        .precio-anterior {
            color: #888;
            text-decoration: line-through;
            font-size: 14px;
        }

        .descuento {
            color: #00a650;
            font-size: 14px;
            font-weight: 600;
        }

        .envio {
            color: #00a650;
            font-weight: 600;
            font-size: 14px;
        }

        .rating {
            color: #3483fa;
            font-size: 14px;
        }

        .ordenar {
            min-width: 210px;
        }

        .breadcrumb a {
            text-decoration: none;
        }

        .badge-oferta {
            position: absolute;
            top: 12px;
            left: 12px;
            z-index: 2;
        }

        .btn-carrito {
            width: 100%;
        }

        @media (max-width: 991px) {

            .filtros {
                margin-bottom: 20px;
            }

        }
    </style>

</head>


<body>


    <!-- NAVBAR -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow sticky-top">

        <div class="container">

            <a
                class="navbar-brand fw-bold"
                href="./detalles.php">
                💨 V4p3ando Bella Vista
            </a>


            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#menu">

                <span class="navbar-toggler-icon"></span>

            </button>


            <div
                class="collapse navbar-collapse"
                id="menu">

                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">

                        <a
                            class="nav-link text-white"
                            href="./detalles.php">
                            Inicio
                        </a>

                    </li>


                    <li class="nav-item">

                        <a
                            class="nav-link active text-white"
                            href="./productos.php">
                            Productos
                        </a>

                    </li>


                    <li class="nav-item dropdown">

                        <a
                            class="nav-link dropdown-toggle text-white"
                            href="#"
                            role="button"
                            data-bs-toggle="dropdown">
                            Categorías
                        </a>

                        <ul class="dropdown-menu">

                        <form action="./productos.php" method="POST">
                            <input name="categoria" type="hidden" value="*">
                            <button type="submit" class="dropdown-item" >
                                Todas   
                            </button>
                        </form>

                            <form action="./productos.php" method="POST">
                            <input name="categoria" type="hidden" value="vaper">
                            <button type="submit" class="dropdown-item" >
                                Vapers   
                            </button>
                        </form>

                            <form action="./productos.php" method="POST">
                            <input name="categoria" type="hidden" value="Accesorios">
                            <button type="submit" class="dropdown-item" >
                                Accesorios   
                            </button>
                        </form>

                            <form action="./productos.php" method="POST">
                            <input name="categoria" type="hidden" value="Cargadores">
                            <button type="submit" class="dropdown-item" >
                                Cargadores   
                            </button>
                        </form>

                        </ul>

                    </li>


                    <li class="nav-item">

                        <a
                            class="nav-link text-white"
                            href="#contacto">
                            Contacto
                        </a>

                    </li>

                </ul>


                <!-- BUSCADOR -->

                <form
                    class="d-flex ms-3"
                    action="./productos.php"
                    method="POST">

                    <input
                        class="form-control me-2"
                        type="search"
                        name="nombre"
                        placeholder="Buscar...">

                    <button class="btn btn-primary">
                        Buscar
                    </button>

                </form>


                <!-- USUARIO -->

                <a
                    href="./login.php"
                    class="p-2">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="32"
                        height="32"
                        fill="white"
                        viewBox="0 0 16 16">

                        <path
                            d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />

                        <path
                            fill-rule="evenodd"
                            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 8 0m0 1a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />

                    </svg>

                </a>


                <!-- CARRITO -->

                <a
                    href="./carrito.php"
                    class="btn btn-primary position-relative ms-2">

                    🛒

                    <span
                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        0
                    </span>

                </a>

            </div>

        </div>

    </nav>


    <!-- CONTENIDO -->

    <main class="container my-4">


        <!-- BREADCRUMB -->

        <nav aria-label="breadcrumb">

            <ol class="breadcrumb">

                <li class="breadcrumb-item">
                    <a href="./detalles.php">
                        Inicio
                    </a>
                </li>

                <li class="breadcrumb-item active">
                    Productos
                </li>

            </ol>

        </nav>


        <!-- TITULO -->

        <div class="productos-header">

            <h1 class="mb-1">
                Productos
            </h1>

            <p class="text-muted mb-0">
                Encontrá los productos disponibles en nuestra tienda.
            </p>

        </div>


        <div class="row g-4">


            <!-- FILTROS -->

            <aside class="col-lg-3">

                <div class="filtros shadow-sm">


                    <h5 class="filtro-titulo">
                        Filtrar productos
                    </h5>


                    <!-- CATEGORÍAS -->

                    <div class="filtro-seccion">

                        <h6>
                            Categoría
                        </h6>

                        <div class="form-check">

                            <input
                                class="form-check-input"
                                type="checkbox"
                                id="cat1">

                            <label
                                class="form-check-label"
                                for="cat1">
                                Vapers
                            </label>

                        </div>


                        <div class="form-check">

                            <input
                                class="form-check-input"
                                type="checkbox"
                                id="cat2">

                            <label
                                class="form-check-label"
                                for="cat2">
                                Accesorios
                            </label>

                        </div>


                        <div class="form-check">

                            <input
                                class="form-check-input"
                                type="checkbox"
                                id="cat3">

                            <label
                                class="form-check-label"
                                for="cat3">
                                Cargadores
                            </label>

                        </div>

                    </div>


                    <!-- MARCA -->

                    <div class="filtro-seccion">

                        <h6>
                            Marca
                        </h6>

                        <div class="form-check">

                            <input
                                class="form-check-input"
                                type="checkbox"
                                id="marca1">

                            <label
                                class="form-check-label"
                                for="marca1">
                                ELFBAR
                            </label>

                        </div>


                        <div class="form-check">

                            <input
                                class="form-check-input"
                                type="checkbox"
                                id="marca2">

                            <label
                                class="form-check-label"
                                for="marca2">
                                Lost Angel
                            </label>

                        </div>

                    </div>


                    <!-- PRECIO -->

                    <div class="filtro-seccion">

                        <h6>
                            Precio
                        </h6>

                        <div class="input-group mb-2">

                            <span class="input-group-text">
                                $
                            </span>

                            <input
                                type="number"
                                class="form-control"
                                placeholder="Mínimo">

                        </div>


                        <div class="input-group">

                            <span class="input-group-text">
                                $
                            </span>

                            <input
                                type="number"
                                class="form-control"
                                placeholder="Máximo">

                        </div>

                        <button
                            class="btn btn-outline-primary w-100 mt-3">
                            Aplicar
                        </button>

                    </div>


                    <!-- DISPONIBILIDAD -->

                    <div>

                        <h6>
                            Disponibilidad
                        </h6>

                        <div class="form-check">

                            <input
                                class="form-check-input"
                                type="checkbox"
                                id="stock">

                            <label
                                class="form-check-label"
                                for="stock">
                                Solo disponibles
                            </label>

                        </div>

                    </div>

                </div>

            </aside>


            <!-- RESULTADOS -->

            <section class="col-lg-9">


                <!-- ORDEN -->

                <div
                    class="d-flex justify-content-between align-items-center mb-3">

                    <div>

                        <strong>
                            <?= $totalProductos ?>
                        </strong>

                        productos encontrados

                    </div>


                    <select
                        class="form-select ordenar">

                        <option>
                            Más relevantes
                        </option>

                        <option>
                            Menor precio
                        </option>

                        <option>
                            Mayor precio
                        </option>

                        <option>
                            Más vendidos
                        </option>

                        <option>
                            Mejor valorados
                        </option>

                    </select>

                </div>


                <!-- GRILLA -->

                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-3">

                    <?php if ($totalProductos > 0 ): ?>
                    <?php foreach ($productos as $producto): ?>

                        <div class="col">

                            <div class="producto-card shadow-sm position-relative">

                                <!-- IMAGEN -->

                                <img
                                    src="<?= htmlspecialchars($producto['foto_url']) ?>"
                                    class="producto-imagen"
                                    alt="<?= htmlspecialchars($producto['nombre']) ?>">


                                <!-- INFORMACIÓN -->

                                <div class="producto-contenido">


                                    <div class="text-muted small mb-1">

                                        <?= htmlspecialchars($producto['marca']) ?>

                                    </div>


                                    <div class="producto-nombre">

                                        <?= htmlspecialchars($producto['nombre']) ?>

                                    </div>


                                    <!-- PRECIO -->

                                    <div class="mt-2">

                                        <?php if ($producto['precio']): ?>

                                            <div class="precio-anterior">

                                                $<?= $producto['precio'] ?>

                                            </div>

                                        <?php endif; ?>


                                        <span class="producto-precio">

                                            $<?=
                                                $producto['precio']

                                                ?>

                                        </span>

                                    </div>


                                    <!-- ENVÍO -->

                                    <div class="envio mt-2">

                                        Envío a coordinar

                                    </div>

                                    <!-- BOTONES -->

                                    <div class="mt-3">

                                        <a
                                            href="./producto.php?id=<?= $producto['id_producto'] ?>"
                                            class="btn btn-outline-primary w-100 mb-2">
                                            Ver producto
                                        </a>


                                        <button
                                            class="btn btn-primary btn-carrito"
                                            onclick="agregarCarrito(<?= $producto['id_producto'] ?>)">

                                            🛒 Agregar al carrito

                                        </button>

                                    </div>

                                </div>

                            </div>

                        </div>

                    <?php endforeach; ?>
                    <?php else: ?>
                        
                        <div class="col">

                            <div class="alert alert-warning">

                                No se encontraron productos
                                que coincidan con la búsqueda.

                            </div>

                        </div>
                    <?php endif; ?>

                </div>


                <!-- PAGINACIÓN -->

                <nav
                    class="mt-5"
                    aria-label="Paginación">

                    <ul class="pagination justify-content-center">

                        <li class="page-item disabled">

                            <a
                                class="page-link"
                                href="#">
                                Anterior
                            </a>

                        </li>


                        <li class="page-item active">

                            <a
                                class="page-link"
                                href="#">
                                1
                            </a>

                        </li>


                        <li class="page-item">

                            <a
                                class="page-link"
                                href="#">
                                2
                            </a>

                        </li>


                        <li class="page-item">

                            <a
                                class="page-link"
                                href="#">
                                3
                            </a>

                        </li>


                        <li class="page-item">

                            <a
                                class="page-link"
                                href="#">
                                Siguiente
                            </a>

                        </li>

                    </ul>

                </nav>

            </section>

        </div>

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
                        los mejores productos y accesorios.

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
                                href="./productos.php"
                                class="text-decoration-none text-white">
                                Productos
                            </a>
                        </li>

                        <li>
                            <a
                                href="./carrito.php"
                                class="text-decoration-none text-white">
                                Carrito
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

        </div>

    </footer>


    <script>
        function agregarCarrito(id) {

            /*
             * Acá posteriormente podés hacer:
             *
             * fetch('agregar_carrito.php', {
             *     method: 'POST',
             *     headers: {
             *         'Content-Type': 'application/json'
             *     },
             *     body: JSON.stringify({
             *         id: id
             *     })
             * })
             * .then(() => location.reload());
             */

            alert(
                'Producto agregado al carrito'
            );

        }
    </script>


</body>

</html>