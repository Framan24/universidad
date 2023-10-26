<!DOCTYPE html>
<html>
<head>
    <title>Registrar Alumno</title>
</head>
<body>
    <h1>Registrar Alumno</h1>
    <form method="post" action="crearstudiante">
        <label for="first_name">Nombre:</label>
        <input type="text" name="first_name" id="first_name" required><br>

        <label for="email">Correo Electrónico:</label>
        <input type="email" name="email" id="email" required><br>
        
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required><br>

        <label for="role">Rol:</label>
        <select name="role" id="role">
        <option value="teacher">Maestro</option>
        <option value="student">Alumno</option>
        </select>
        <br>
        <button type="submit">Registrar Alumno</button>
    </form>
</body>
</html>