<?php
    // Verificar si se ha enviado el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        // Obtener los datos del formulario
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $contrasenia = $_POST["contrasenia"];

        try {
            // Preparar la consulta SQL para insertar un nuevo usuario
            $stmt = $conn->prepare("INSERT INTO usuarios (nombre, email, contraseña) VALUES (:nombre, :email, :contrasenia)");
            // Vincular parámetros
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':contrasenia', $contrasenia);
            // Ejecutar la consulta
            $stmt->execute();

            echo "Usuario creado exitosamente";
        } catch(PDOException $e) {
            echo "Error al crear usuario: " . $e->getMessage();
        }
    }
    ?>