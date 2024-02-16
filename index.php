<?php
include './snippets/header.php'; // incluir el archivo header.php
?>
<?php
include './conexion-db/crear-usuario.php';
?>
<!-- Contenido de la página principal -->
<main>
<?php
    include './conexion-db/consultas.php';
?>
    <table border='1'>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
        </tr>
        <?php foreach ($resultados as $row): ?>
            <tr>
                <td><?= htmlspecialchars($row['id']) ?></td>
                <td><?= htmlspecialchars($row['nombre']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><a href="?eliminar=<?= $row['id'] ?>">Eliminar</a></td>
                <td><a href="?editar=<?= $row['id'] ?>">Editar</a></td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php
        include './conexion-db/eliminar-usuario.php'
    ?>
    <?php
    include './conexion-db/editar-usuario.php'
    ?>
        
    <form action="" method="post">
        <input type="hidden" name="id_editar" value="<?= isset($id_editar) ? $id_editar : '' ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?= isset($nombre_editar) ? $nombre_editar : '' ?>" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= isset($email_editar) ? $email_editar : '' ?>" required><br><br>
        <label for="contrasenia">Contraseña</label>
        <input type="password" id="contrasenia" name="contrasenia" required><br><br>
        <input type="submit" name="submit" value="<?= isset($id_editar) ? 'Actualizar Usuario' : 'Crear Usuario' ?>">
    </form>

</main>

<?php
include './snippets/footer.php'; // incluir el archivo footer.php
?>
