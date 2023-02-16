<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <title>Calculadora de Baterías</title>
</head>
<body class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="container bg-white box shadow p-4">
        <h1 class="text-center mb-4">Calculadora de tiempo de uso para batería</h1>
        
        <form method="post">
            <div class="mb-3">
                <label for="voltaje_bateria" class="form-label">Voltaje de la batería (V):</label>
                <input type="number" class="form-control" name="voltaje_bateria" id="voltaje_bateria" required>
            </div>
            <div class="mb-3">
                <label for="capacidad_bateria" class="form-label">Capacidad de la batería (Ah):</label>
                <input type="number" class="form-control" name="capacidad_bateria" id="capacidad_bateria" required>
            </div>
            <div class="mb-3">
                <label for="consumo_dispositivo" class="form-label">Consumo del dispositivo (W):</label>
                <input type="number" class="form-control" name="consumo_dispositivo" id="consumo_dispositivo" required>
            </div>
            <div class="d-flex justify-content-center mb-4">
                <input type="submit" button style="background-color:purple; border-color: black" class="btn btn-primary btn-lg" value="Calcular">
            </div>
        </form>
	<?php
	// Verificar si se han enviado los valores del formulario, para mostrarlos una vez se realice el cálculo
    if (isset($_POST["voltaje_bateria"]) && isset($_POST["capacidad_bateria"]) && isset($_POST["consumo_dispositivo"])) {
        // Obtener los valores ingresados por el usuario en el formulario
        $voltaje_bateria = $_POST["voltaje_bateria"];
        $capacidad_bateria = $_POST["capacidad_bateria"];
        $consumo_dispositivo = $_POST["consumo_dispositivo"];

        // Calcular la capacidad de la batería en vatios-hora
        $capacidad_bateria_wh = $voltaje_bateria * $capacidad_bateria;

        // Calcular el tiempo de uso de la batería en horas
        $tiempo_uso_horas = $capacidad_bateria_wh / $consumo_dispositivo;

        // Calcular el tiempo de uso de la batería en minutos (para hacerlo mas preciso)
        $tiempo_uso_minutos = $tiempo_uso_horas * 60;

        // Mostrar los resultados
        echo "<p>Con una batería de " . $voltaje_bateria . " voltios y " . $capacidad_bateria . " amperios, se tiene una capacidad de " . $capacidad_bateria_wh . " vatios-hora.</p>";
        echo "<p>Con un consumo de " . $consumo_dispositivo . " vatios, la batería proporcionará aproximadamente " . round($tiempo_uso_horas, 2) . " horas (" . round($tiempo_uso_minutos, 2) . " minutos) de uso.</p>";
    }
	?>
</body>
<footer>
    <div style="text-align: center;">
        <a href="https://github.com/ignaciodlopez" target="_blank">Ignacio D. López</a>
    </div>
</footer>
</html>


<!-- 
Este programa utiliza un formulario HTML para que el usuario pueda
ingresar los valores de voltaje de la batería, capacidad de la batería
y consumo de un dispositivo en particular. Luego, se utiliza el método POST de PHP para
enviar los valores ingresados donde se realiza el cálculo del tiempo de uso de la batería.
Los resultados se muestran en la página web con al finalidad de saber cuanto tiempo
de uso se le puede dar a un dispositivo con una determinada batería.
-->
