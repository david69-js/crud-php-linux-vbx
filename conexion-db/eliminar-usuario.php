<?php
    // Verificar si se ha enviado el parámetro para eliminar un usuario
    if (isset($_GET['eliminar'])) {
        $id = $_GET['eliminar'];

        try {
            // Preparar la consulta SQL para eliminar el usuario
            $stmt = $conn->prepare("DELETE FROM usuarios WHERE id = :id");
            // Vincular parámetros
            $stmt->bindParam(':id', $id);
            // Ejecutar la consulta
            $stmt->execute();

            // Redirigir de nuevo a index.php después de eliminar
            header('Location: index.php');
            exit;
        } catch(PDOException $e) {
            echo "Error al eliminar usuario: " . $e->getMessage();
        }
    }
    ?>