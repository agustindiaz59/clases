<?php
/*  
    cerrar sesion
    

*/

//Importaciones de archivos
include_once("bd.php");

session_start();

if (empty($_SESSION["usuarioBD"])) {
    header("Location: login.php");
    exit;
};



//Verifico que acciones quiero realizar
if ($_POST["nombre_eliminar"]) {
    eliminarProducto();
};
if ($_POST["nombre"]) {
    crearProducto();
};
if ($_POST["EDITAR"]) {
    editarProducto();
}



//Definicion de las funciones
function eliminarProducto()
{
    statement("DELETE FROM producto WHERE nombre = '" . $_POST["nombre_eliminar"] . "';");
}

function crearProducto()
{
    $nombre = $_POST["nombre"];

    $precio = $_POST["precio"];

    $descripcion = $_POST["descripcion"];

    $sabor = $_POST["sabor"];

    $sku = $_POST["sku"];
    $url_foto = $_POST["url_foto"];

    statement("
    INSERT INTO producto (nombre, precio, descripcion, sabor, sku, foto_url)
    VALUES (
    '" . $nombre . "',
    " . $precio . ",
    '" . $descripcion . "',
    '" . $sabor . "',
    '" . $sku . "',
    '" . $url_foto . "')

    ");

    header("Location: " . $_SERVER['PHP_SELF']); //Redirige la solicitud a la misma pagina pero en otra instancuia
    exit; //Corta el flujo en la pagina una vez procesada la solicitud post
}

function editarProducto()
{
    $nombre = $_POST["EDITAR"];

    $precio = $_POST["precio"];

    $descripcion = $_POST["descripcion"];

    $sabor = $_POST["sabor"];

    $sku = $_POST["sku"];
    $url_foto = $_POST["url_foto"];

    statement("
    UPDATE producto 
    SET 
    precio = " . $precio . ",
    descripcion =  '" . $descripcion . "',
    sabor ='" . $sabor . "',
    sku = '" . $sku . "',
    foto_url = '" . $url_foto . "'
    WHERE nombre ='" . $nombre . "'
    ;");

    header("Location: " . $_SERVER['PHP_SELF']); //Redirige la solicitud a la misma pagina pero en otra instancuia
    exit; //Corta el flujo en la pagina una vez procesada la solicitud post
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de Productos</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <!-- HEADER -->
    <header class="bg-dark text-white p-3 shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">

            <h1 class="h3 m-0">
                <a class="navbar-brand fw-bold" href="./detalles.php">
                    💨 V4p3ando Bella Vista
                </a>
            </h1>

            <form class="d-flex w-50">
                <input
                    class="form-control me-2"
                    type="search"
                    placeholder="Buscar productos...">
                <button class="btn btn-primary" type="submit">
                    Buscar
                </button>
            </form>
            

        </div>
    </header>

    <!-- CONTENIDO -->
    <div class="container-fluid mt-4">
        <div class="row">

            <div class="col">
                <?php

                // Verifica si es admin o por defecto un cliente
                if ($_SESSION["usuarioBD"]["rol"] == "ADMIN") {

                    echo '<!-- ASIDE de acciones CRUD -->
                <aside class="">
                    <div class="card shadow-sm">
                        <div class="card-header text-black text-center" style="background-color:#BA9A91">
                            Acciones
                        </div>

                        <div class="card-body d-grid gap-2">
                            <button
                                class="btn" style="background-color:#B7C396"
                                data-bs-toggle="modal"
                                data-bs-target="#modalAgregarProducto">
                                Agregar producto
                            </button>

                            <button class="btn" style="background-color:#CCCCCC"
                                data-bs-toggle="modal"
                                data-bs-target="#modalEditarProducto">
                                Editar producto
                            </button>

                            <button class="btn" style="background-color:#DD3027"
                                data-bs-toggle="modal"
                                data-bs-target="#modalEliminarProducto">
                                Eliminar producto
                            </button>

                            <a class="btn" style="background-color:#DD3027">
                                Cerrar sesion
                            </a>

                        </div>
                    </div>
                </aside>';
                }
                ?>

                <!-- ASIDE de categorias-->
                <aside class="" style="margin-top:2rem">
                    <div class="card shadow-sm">
                        <div class="card-header text-black text-center" style="background-color:#E0E7D7">
                            Categorias
                        </div>

                        <div class="card-body d-grid gap-2">
                            <?php
                            $categorias = select("SELECT * FROM categorias");
                            ?>
                            <a
                                class="btn" style="background-color:#EDECEC"
                                data-bs-toggle="modal"
                                data-bs-target="#modalVapers">
                                Vapers
                            </a>

                            <a class="btn" style="background-color:#EDECEC"
                                data-bs-toggle="modal"
                                data-bs-target="#modalAccesorios">
                                Accesorios
                            </a>

                            <a class="btn" style="background-color:#EDECEC"
                                data-bs-toggle="modal"
                                data-bs-target="#modalBebidas">
                                Bebidas
                            </a>

                        </div>
                    </div>
                </aside>
            </div>

            <!-- PRODUCTOS -->
            <main class="col-md-10">
                <div class="row g-4">



                    <!-- PRODUCTO -->
                    <?php
                    $resultado = select("SELECT * FROM producto;");

                    for ($i = 0; $i < count($resultado); $i++) {
                        echo '
                            <div class="col-md-6 col-lg-4">
                                <div class="card h-100 shadow-sm">

                                    <img 
                                        src="' . $resultado[$i]["foto_url"] . '" 
                                        class="card-img-top"
                                        alt="Producto"
                                    >

                                    <div class="card-body">
                                        <h5 class="card-title">' . $resultado[$i]["nombre"] . '</h5>

                                        <p class="card-text">
                                            ' . $resultado[$i]["descripcion"] . '
                                        </p>

                                        <p class="fw-bold text-primary">
                                            ' . $resultado[$i]["precio"] . '
                                        </p>

                                        <button class="btn btn-outline-primary w-100">
                                            Ver detalles
                                        </button>
                                    </div>
                                </div>
                            </div>';
                    } //Fin del for
                    ?>


                </div>
            </main>

        </div>
    </div>


    <!-- MODAL agregar -->
    <div
        class="modal fade"
        id="modalAgregarProducto"
        tabindex="-1"
        aria-labelledby="modalAgregarProductoLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">

            <div class="modal-content">

                <!-- HEADER -->
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAgregarProductoLabel">
                        Nuevo Producto
                    </h5>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <!-- BODY -->
                <div class="modal-body">

                    <form action="index.php" method="POST">

                        <div class="row">

                            <!-- NOMBRE -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Nombre
                                </label>

                                <input
                                    type="text"
                                    name="nombre"
                                    class="form-control"
                                    required>
                            </div>

                            <!-- PRECIO -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Precio
                                </label>

                                <input
                                    type="number"
                                    step="0.01"
                                    name="precio"
                                    class="form-control"
                                    required>
                            </div>

                        </div>

                        <!-- DESCRIPCION -->
                        <div class="mb-3">
                            <label class="form-label">
                                Descripción
                            </label>

                            <textarea
                                name="descripcion"
                                class="form-control"
                                rows="3"
                                required></textarea>
                        </div>

                        <div class="row">

                            <!-- SABOR -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Sabor
                                </label>

                                <input
                                    type="text"
                                    name="sabor"
                                    class="form-control">
                            </div>

                            <!-- SKU -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    SKU
                                </label>

                                <input
                                    type="text"
                                    name="sku"
                                    class="form-control"
                                    required>
                            </div>

                        </div>

                        <!-- FOTO -->
                        <div class="mb-3">
                            <label class="form-label">
                                URL de la foto
                            </label>

                            <input
                                type="text"
                                name="foto_url"
                                class="form-control">
                        </div>

                        <!-- FOOTER -->
                        <div class="modal-footer px-0">

                            <button
                                type="button"
                                class="btn btn-secondary"
                                data-bs-dismiss="modal">
                                Cancelar
                            </button>

                            <button
                                type="submit"
                                class="btn btn-primary">
                                Guardar producto
                            </button>

                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>

    <!-- MODAL editar -->
    <div
        class="modal fade"
        id="modalEditarProducto"
        tabindex="-1"
        aria-labelledby="modalEditarProductoLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">

            <div class="modal-content">

                <!-- HEADER -->
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditarProductoLabel">
                        Editar producto
                    </h5>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <!-- BODY -->
                <div class="modal-body">

                    <form action="index.php" method="POST">

                        <div class="row">

                            <!-- NOMBRE -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    nombreProductos
                                </label>

                                <input
                                    type="text"
                                    name="EDITAR"
                                    class="form-control"
                                    required>
                            </div>

                            <!-- PRECIO -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Precio
                                </label>

                                <input
                                    type="number"
                                    step="0.01"
                                    name="precio"
                                    class="form-control"
                                    required>
                            </div>

                        </div>

                        <!-- DESCRIPCION -->
                        <div class="mb-3">
                            <label class="form-label">
                                Descripción
                            </label>

                            <textarea
                                name="descripcion"
                                class="form-control"
                                rows="3"
                                required></textarea>
                        </div>

                        <div class="row">

                            <!-- SABOR -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Sabor
                                </label>

                                <input
                                    type="text"
                                    name="sabor"
                                    class="form-control">
                            </div>

                            <!-- SKU -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    SKU
                                </label>

                                <input
                                    type="text"
                                    name="sku"
                                    class="form-control"
                                    required>
                            </div>

                        </div>

                        <!-- FOTO -->
                        <div class="mb-3">
                            <label class="form-label">
                                URL de la foto
                            </label>

                            <input
                                type="text"
                                name="foto_url"
                                class="form-control">
                        </div>

                        <!-- FOOTER -->
                        <div class="modal-footer px-0">

                            <button
                                type="button"
                                class="btn btn-secondary"
                                data-bs-dismiss="modal">
                                Cancelar
                            </button>

                            <button
                                type="submit"
                                class="btn btn-primary">
                                Guardar producto
                            </button>

                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>


    <!-- MODAL eliminar -->
    <div
        class="modal fade"
        id="modalEliminarProducto"
        tabindex="-1"
        aria-labelledby="modalEditarProductoLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">

            <div class="modal-content">

                <!-- HEADER -->
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEliminarProductoLabel">
                        Eliminar producto
                    </h5>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <!-- BODY -->
                <div class="modal-body">

                    <form method="POST" action="/index.php">

                        <div class="row">

                            <!-- NOMBRE -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Nombre del producto
                                </label>

                                <input
                                    type="text"
                                    name="nombre_eliminar"
                                    class="form-control"
                                    required>
                            </div>
                        </div>
                        <!-- FOOTER -->
                        <div class="modal-footer px-0">

                            <button
                                type="button"
                                class="btn btn-secondary"
                                data-bs-dismiss="modal">
                                Cancelar
                            </button>

                            <button
                                class="btn btn-primary"
                                data-bs-dismiss="modal"
                                data-bs-target="#modalConfirmarEliminacionProducto"
                                data-bs-toggle="modal"
                                type="submit">
                                Eliminar producto
                            </button>

                        </div>



                    </form>

                </div>

            </div>
        </div>
    </div>


    <!-- MODAL confirmar eliminacion -->
    <div
        class="modal fade"
        id="modalConfirmarEliminacionProducto"
        tabindex="-1"
        aria-labelledby="modalConfirmarEliminacionProductoLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">

            <div class="modal-content">

                <!-- HEADER -->
                <div class="modal-header">
                    <h5 class="modal-title" id="modalConfirmarEliminacionProductoLabel">
                        Eliminar producto
                    </h5>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <!-- BODY -->
                <div class="modal-body">

                    <form action="agregar_producto.php" method="POST">

                        <div class="row">
                            ¿Estas seguro que deseas eliminar el producto?
                        </div>

                        <!-- FOOTER -->
                        <div class="modal-footer px-0">

                            <button
                                type="button"
                                class="btn btn-secondary"
                                data-bs-dismiss="modal">
                                Cancelar
                            </button>

                            <button
                                type="submit"
                                class="btn btn-primary">
                                Confirmar
                            </button>

                        </div>



                    </form>

                </div>

            </div>
        </div>
    </div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>




    <!-- FOOTER -->
    <footer class="bg-dark text-white mt-5 py-4">
        <div class="container">

            <div class="row">

                <!-- INFO -->
                <div class="col-md-4 mb-3">
                    <h5>Mi Tienda</h5>
                    <p class="small">
                        Sistema de administración y catálogo de productos.
                    </p>
                </div>

                <!-- ENLACES -->
                <div class="col-md-4 mb-3">
                    <h5>Enlaces</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#" class="text-decoration-none text-white">
                                Inicio
                            </a>
                        </li>

                        <li>
                            <a href="#" class="text-decoration-none text-white">
                                Productos
                            </a>
                        </li>

                        <li>
                            <a href="#" class="text-decoration-none text-white">
                                Contacto
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- CONTACTO -->
                <div class="col-md-4 mb-3">
                    <h5>Contacto</h5>

                    <p class="small mb-1">
                        Email: contacto@mitienda.com
                    </p>

                    <p class="small mb-0">
                        Tel: +54 381 000000
                    </p>
                </div>

            </div>

            <hr class="border-light">

            <div class="text-center small">
                © 2026 Mi Tienda - Todos los derechos reservados
            </div>

        </div>
    </footer>


</body>

</html>