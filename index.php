<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudiantes</title>
    <!-- Agrega enlaces a los archivos CSS de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        /* Estilo personalizado para el footer */
        .footer {
            background-color: #333;
            color: white;
            padding: 10px 0;
            margin-top: 20px;
        }

        .header{
            background-color: #333;
            color: white;
            padding: 20px 0;
        }
    </style>
</head>

<header class="d-flex justify-content-center py-3">
    <ul class="nav nav-pills">
        <li class="nav-item">Jordy José Orantes Castañeda </li>
        <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Inicio</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Características</a></li>
        <li class="nav-item"><a href="lista_estudiantes.ejs" class="nav-link">Listado de estudiantes</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Tipos de sangre</a></li>
    </ul>
</header>
<body>
    <div class="container mt-5">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Nuevo</button>
        <h2>Tabla de Estudiantes</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Carnet</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Correo Electrónico</th>
                    <th>Tipo de Sangre</th>
                    <th>Fecha de Nacimiento</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($estudiantes as $estudiante): ?>
                    <tr>
                        <td><?php echo $estudiante['id_estudiante']; ?></td>
                        <td><?php echo $estudiante['carne']; ?></td>
                        <td><?php echo $estudiante['nombres']; ?></td>
                        <td><?php echo $estudiante['apellidos']; ?></td>
                        <td><?php echo $estudiante['direccion']; ?></td>
                        <td><?php echo $estudiante['telefono']; ?></td>
                        <td><?php echo $estudiante['correo_electronico']; ?></td>
                        <td><?php echo $estudiante['id_tipo_sangre']; ?></td>
                        <td><?php echo $estudiante['fecha_nacimiento']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </div>


    <!-- Ventana Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Datos del estudiante</h5>
                    
                </div>
                <div class="modal-body">
                    <div class="container mt-5">
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" id="txt_id" name="txt_id" placeholder="Id estudiante">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="txt_carne" name="txt_carne" placeholder="Ingresa tu carnet">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="txt_nombres" name="txt_nombres" placeholder="Ingresa tus nombres">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="txt_apellidos" name="txt_apellidos" placeholder="Ingresa tus apellidos">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="txt_direccion" name="txt_direccion" placeholder="Ingresa tu dirección">
                            </div>
                            <div class="form-group">
                                <input type="tel" class="form-control" id="txt_telefono" name="txt_telefono" placeholder="Ingresa tu teléfono">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="txt_correo" name="txt_correo" placeholder="Ingresa tu correo electrónico">
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" id="txt_tipo_sangre" name="txt_tipo_sangre" placeholder="Ingresa tu tipo de sangre">
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-control" id="txt_fecha_nacimiento" name="txt_fecha_nacimiento">
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-info" id="btn_crear" name="btn_crear" value="crear">Agregar</button>
                                <button type="submit" class="btn btn-primary" id="btn_actualizar" name="btn_actualizar" value="actualizar">Modificar</button>
                                <button type="submit" class="btn btn-danger" id="btn_borrar" 
                                name="btn_borrar" value="borrar" onclick="confirmarEliminacion()">Eliminar</button>
                            </div>

                            <script>
                                const carnetInput = document.getElementById('txt_carne');
                                const btnCrear = document.getElementById('btn_crear');
                                const btnActualizar = document.getElementById('btn_actualizar');
                            
                                document.querySelector('form').addEventListener('submit', function (event) {
                                    const carnetValue = carnetInput.value;
                                    const carnetRegex = /^E\d{3}$/;
                            
                                    if ((btnCrear && btnCrear.clicked) || (btnActualizar && btnActualizar.clicked)) {
                                        if (!carnetRegex.test(carnetValue)) {
                                            event.preventDefault();
                                            alert('El carnet debe tener el formato E001 hasta E999');
                                        }
                                    }
                                });
                            
                                btnCrear.addEventListener('click', function () {
                                    btnCrear.clicked = true;
                                    btnActualizar.clicked = false;
                                });
                            
                                btnActualizar.addEventListener('click', function () {
                                    btnActualizar.clicked = true;
                                    btnCrear.clicked = false;
                                });

                                function confirmarEliminacion() {
                                    const confirmacion = confirm('¿Estás seguro de que deseas eliminar este elemento?');
                                    
                                    if (!confirmacion) {
                                        event.preventDefault(); // Cancelar el envío del formulario si se selecciona "Cancelar"
                                    }
                                }
                            </script>

                            
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <?php
        // Incluye el archivo de conexión a la base de datos
        include("datos_conexion.php");

        // Verifica si se ha enviado el formulario
        if(isset($_POST['btn_crear'])) {
            // Recuperar los datos del formulario
            $carne = $_POST['txt_carne'];
            $nombres = $_POST['txt_nombres'];
            $apellidos = $_POST['txt_apellidos'];
            $direccion = $_POST['txt_direccion'];
            $telefono = $_POST['txt_telefono'];
            $correo_electronico = $_POST['txt_correo'];
            $id_tipo_sangre = $_POST['txt_tipo_sangre'];
            $fecha_nacimiento = $_POST['txt_fecha_nacimiento'];

            // Conectar a la base de datos
            $conexion = mysqli_connect($db_host, $db_user, $db_pass, $db_nombre);

            if (!$conexion) {
                die("Error al conectar a la base de datos: " . mysqli_connect_error());
            }

            // Crear la consulta SQL para insertar los datos
            $consulta = "INSERT INTO estudiantes (carne, nombres, apellidos, direccion, telefono, correo_electronico, id_tipo_sangre, fecha_nacimiento)
                        VALUES ('$carne', '$nombres', '$apellidos', '$direccion', '$telefono', '$correo_electronico', '$id_tipo_sangre', '$fecha_nacimiento')";

            // Ejecutar la consulta
            if (mysqli_query($conexion, $consulta)) {
                // La inserción fue exitosa
                header("Location: index.php"); // Redirigir a una página después de la inserción
                exit();
            } else {
                // Si hay un error en la consulta
                echo "Error al insertar datos: " . mysqli_error($conexion);
            }

            // Cerrar la conexión a la base de datos
            mysqli_close($conexion);
        }

        if (isset($_POST["btn_actualizar"])) {
            // Obtiene los valores enviados desde el formulario
            $id_estudiante = $_POST["txt_id"];
            $carne = $_POST["txt_carne"];
            $nombres = $_POST["txt_nombres"];
            $apellidos = $_POST["txt_apellidos"];
            $direccion = $_POST["txt_direccion"];
            $telefono = $_POST["txt_telefono"];
            $fecha_nacimiento = $_POST["txt_fecha_nacimiento"];
        
            // Consulta SQL para actualizar el estudiante
            $sql = "UPDATE estudiantes SET carne = '$carne', nombres = '$nombres', apellidos = '$apellidos', direccion = '$direccion', telefono = '$telefono', fecha_nacimiento = '$fecha_nacimiento' WHERE id_estudiante = $id_estudiante";
        
            // Ejecuta la consulta
            if (mysqli_query($db_conexion, $sql)) {
                echo "Estudiante actualizado correctamente.";

            } else {
                echo "Error al actualizar el estudiante: " . mysqli_error($db_conexion);
            }
        }

        if (isset($_POST["btn_borrar"])) {
            // Obtiene el ID del estudiante a eliminar
            $id_estudiante = $_POST["txt_id"];
        
            // Consulta SQL para eliminar el estudiante
            $sql = "DELETE FROM estudiantes WHERE id_estudiante = $id_estudiante";
        
            // Ejecuta la consulta
            if (mysqli_query($db_conexion, $sql)) {
                echo "Estudiante eliminado correctamente.";
                // Puedes redirigir al usuario a la página de lista de estudiantes u otro lugar según tus necesidades.
            } else {
                echo "Error al eliminar el estudiante: " . mysqli_error($db_conexion);
            }
        }
    ?>

    <!-- Agrega enlaces a los archivos JavaScript de Bootstrap (opcional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

<!-- Footer -->
<footer class="footer text-center">
    <div class="container">
        <p>Desarrollo web: Augusto Armando Cardona Paiz</p>
        <p>Derechos Reservados &copy; 2023</p>
    </div>
</footer>

</html>