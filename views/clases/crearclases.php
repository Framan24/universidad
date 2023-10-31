<!DOCTYPE html>
<html>

<head>
    <title>Crear Materia</title>
</head>

<body>
    <h1>Crear Nueva Materia</h1>
    <form method="post" action="/crearMateria">
        <label for="nombre_materia">Nombre de la Materia:</label>
        <input type="text" name="nombre_materia" id="nombre_materia" required>
        <br>

        <label for="maestro_id">Maestro:</label>
        <select name="maestro_id" id="maestro_id">
           
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
        
        </select>
        <br>

        <input type="submit" value="Crear Materia">
    </form>
</body>

</html>
