<?php
// Incluir el archivo de conexión
include 'conexion.php';

try {
    // Ejecutar una consulta SQL para seleccionar información de la base de datos
    $stmt = $conn->query("SELECT id, nombre, email FROM usuarios");

    // Almacenar la información recuperada en un array
    $resultados = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $resultados[] = $row;
    }
} catch(PDOException $e) {
    echo "Error al ejecutar la consulta: " . $e->getMessage();
}
?>
