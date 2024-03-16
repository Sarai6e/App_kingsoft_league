<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Competencia</title>
    <!-- Agregar Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <?php
        require_once 'CompetenciaController.php';

        $db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
        $controller = new CompetenciaController($db);

        if(isset($_POST['submit'])) {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $fecha_inicio_inscripcion = $_POST['fecha_inicio_inscripcion'];
            $fecha_fin_inscripcion = $_POST['fecha_fin_inscripcion'];
            $fecha_compentencia = $_POST['fecha_compentencia'];
            $tipo_competencia = $_POST['tipo_competencia'];

            if($controller->updateCompetencia($id, $nombre, $fecha_inicio_inscripcion, $fecha_fin_inscripcion, $fecha_compentencia, $tipo_competencia)) {
                echo "<div class='alert alert-success' role='alert'>Competencia actualizada correctamente.</div>";
            } else {
                echo "<div class='alert alert-danger' role='alert'>Error al actualizar la competencia.</div>";
            }
        }

        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $competencia = $controller->getCompetenciaById($id);
            if ($competencia) {
        ?>
                <h1 class="mt-3">Actualizar Competencia</h1>
                <form method="post" action="">
                    <input type="hidden" name="id" value="<?php echo $competencia['id']; ?>">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $competencia['nombre']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="fecha_inicio_inscripcion" class="form-label">Fecha Inicio Inscripción:</label>
                        <input type="date" class="form-control" id="fecha_inicio_inscripcion" name="fecha_inicio_inscripcion" value="<?php echo $competencia['fecha_inicio_inscripcion']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="fecha_fin_inscripcion" class="form-label">Fecha Fin Inscripción:</label>
                        <input type="date" class="form-control" id="fecha_fin_inscripcion" name="fecha_fin_inscripcion" value="<?php echo $competencia['fecha_fin_inscripcion']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="fecha_compentencia" class="form-label">Fecha Competencia:</label>
                        <input type="date" class="form-control" id="fecha_compentencia" name="fecha_compentencia" value="<?php echo $competencia['fecha_compentencia']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="tipo_competencia" class="form-label">Tipo Competencia:</label>
                        <input type="text" class="form-control" id="tipo_competencia" name="tipo_competencia" value="<?php echo $competencia['tipo_competencia']; ?>">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Actualizar</button>
                </form>
        <?php
            } else {
                echo "<div class='alert alert-warning' role='alert'>Competencia no encontrada.</div>";
            }
        } else {
            echo "<div class='alert alert-danger' role='alert'>ID de competencia no proporcionado.</div>";
        }
        ?>

        <!-- Botón para regresar al inicio -->
        <a href="competenciaView.php" class="btn btn-secondary mt-3">Inicio</a>
    </div>

    <!-- Agregar Bootstrap JS (Opcional, si lo necesitas) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
