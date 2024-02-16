<?php
// Verificar si se ha solicitado la edición de un usuario
if (isset($_GET['editar'])) {
    $id_editar = $_GET['editar'];

    // Obtener los datos del usuario a editar
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE id = :id");
    $stmt->bindParam(':id', $id_editar);
    $stmt->execute();
    $usuario_editar = $stmt->fetch(PDO::FETCH_ASSOC);

    // Llenar el formulario con los datos del usuario
    $nombre_editar = $usuario_editar['nombre'];
    $email_editar = $usuario_editar['email'];
}

?>