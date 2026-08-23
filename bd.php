<?php

  $host = "localhost";
  $user = "clases";
  $pass = "clases";
  $dbname = "punto_de_venta";

  // Create connection using MySQLi
  $conn = new mysqli($host, $user, $pass, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Conexion fallida: " . $conn->connect_error);
  }

  

  function select(string $sql): ?array {
    global $conn;

    $rows = [];

    $result = mysqli_query($conn, $sql);

    // Verifica si la consulta falló
    if (!$result) {
        return null;
    }

    // Obtener filas
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    // Si no hay resultados
    if (count($rows) === 0) {
        return null;
    }

    return $rows;
}



  function statement(string $sql){
    global $conn;

    $conn -> query($sql);
  }