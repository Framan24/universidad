<!DOCTYPE html>
<html>

<head>
    <link href="/dist/output.css" rel="stylesheet">
    <title>Panel de Maestros</title>
</head>

<body>
    <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
            <div class="flex items-center pl-2.5 mb-5">
                <img src="/src/logo.jpg" class="h-10 mr-6 sm:h-10" alt=" Logo" />
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">universidad</span>
            </div>
            <ul class="space-y-2 font-medium">

                <li>
                    <a href="/OnMaestro" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                            <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Mestros</span>
                    </a>
                </li>
                <li>
                    <a href="/config/logaut.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3" />
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Cerrar Sesion</span>
                    </a>
                </li>
              
            </ul>
        </div>
    </aside>

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="">
                <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">
                      Lista de Maestros <br/>
                      
                    </p>
                </div>
            </div>
        </div>
        <br>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            DNI
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Apellido
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Correo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            clase
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <?php foreach ($teacher as $teacher) : ?>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?php echo $teacher['dni']; ?>
                            </th>
                            <td class="px-6 py-4">
                                <?php echo $teacher['nombre']; ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php echo $teacher['apellido']; ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php echo $teacher['correo']; ?>
                            </td>
                            <td class="px-6 py-4">
                            <?php echo $teacher['clase']; ?>
                            </td>
                            <td class="px-6 py-4">
                                <form action="/eliminar-maestro" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar a este estudiante?')">
                                    <input type="hidden" name="dni" value="<?php echo $teacher['dni']; ?>">
                                    <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                                </form>
                            </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>
