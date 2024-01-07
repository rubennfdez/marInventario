<?php
if (!empty($_GET["id"])) {
    $id = $_GET["id"];

    // Sentencia para eliminar
    $sql = $conn->query("DELETE FROM inventario_cocina
    WHERE idcocina_inventario = $id");

?>
    <!-- SCRIPT para quitar el ID de la URL cuando se elimine el registro -->
    <script>
        setTimeout(() => {
            window.history.replaceState(null, null, window.location.pathname);
        }, 0);
    </script>
<?php
}
